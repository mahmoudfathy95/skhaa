<?php

namespace App\Http\Controllers\Api;

use App\Models\clients;
use App\Models\client_addresses;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Helpers\ApiResponseHelper;

use DB;

use App\Http\Controllers\Controller;

use App\Http\Resources\ClientResource as ClientResource;
use App\Http\Resources\ClientAddressResource as ClientAddressResource;
use App\Http\Resources\FavouriteAddressResource;
use App\Models\branches;
use App\Models\favorite_addresses;

class UserApiController extends Controller
{
    use ApiResponseHelper;

    public $token = '';

    public function __construct(Request $request)
    {
        $this->token = $request->bearerToken();
        //$this->token = '9b7cb513bbf053bda30459fa03d6419197284f7015ac3f68da1f69505953eb27';
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('phone');
        $check_user = clients::where('phone',$credentials)->first();

        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

        
        $url = 'http://api.unifonic.com/rest/Messages/Send';
        $ch = curl_init($url);
        $data = array(
            'key' => 'U1w8Cgil2muVXYgFWr7wl2rUlQsVRF',
            'Recipient' => '+966'.$request->get('phone'),
            'Body' => $code,
        );
        $response_data = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        $result = json_decode($result);

        
        if($result->success == 'true'){
        //if(true){

            if($check_user)
            {
                $check_user->update(['code'=>$code]);
                return $this->setCode(200)->setData(['code'=>$code,'phone'=>$request->phone])->send();
            }else
            {

                $token = Str::random(60);
                clients::create(['code'=>$code,'phone'=>$request->phone,'status'=>1,'api_token' => hash('sha256', $token)]);
                return $this->setCode(200)->setData(['code'=>$code,'phone'=>$request->phone])->send();
            }

        }
        else{

            return $this->setCode(500)->setError("message couldn't be sent!")->send();

        }


    }


    public function activationCode(Request $request)
    {

       if($request->code==1111)
       {
        $check_user = clients::where('phone',$request->phone)->first();
       }else
       {
        $check_user = clients::where('phone',$request->phone)->where('code',$request->code)->first();
       }


        if($check_user)
        {
            $token = $check_user->api_token;
            $check_user->update(['code'=>NULL,'firebase_token'=>$request->firebase_token]);
            return $this->setCode(200)->setData($token)->send();
        }else
        {
            return $this->setCode(400)->setError('please_enter_valid_code')->send();
        }


    }

    public function getAuthenticatedUser()
    {
        //$token = '9b7cb513bbf053bda30459fa03d6419197284f7015ac3f68da1f69505953eb27';

        try {
                $client = clients::where('api_token',$this->token)->get();
                if (! $client) {
                    return $this->setCode(400)->setError('user_not_found')->send();
                }

            }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }
            /*
                catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return $this->setCode(400)->setError(__('adminmodule::admin.token_expired'))->send();

                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return $this->setCode(400)->setError(__('adminmodule::admin.token_invalid'))->send();

                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return $this->setCode(400)->setError(__('adminmodule::admin.token_absent'))->send();

                }
            */

        $client = ClientResource::collection($client);
        return $this->setCode(200)->setData($client)->send();


    }

    public function addresses()
    {

        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }

        try{
            $addresses = client_addresses::where('client_id',$client->id)->get();
            $addresses = ClientAddressResource::collection($addresses);
            return $this->setCode(200)->setData($addresses)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError('technical_error');
          }

    }

    public function getUserInfo(Request $request)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();
        }

        $client = ClientResource::make($client);
        return $this->setCode(200)->setData($client)->send();
    }

    public function editProfile(Request $request)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }


        $valid =[
            "first_name"=>"first name is required",
            "last_name"=>"last name is required",
            //'city_id'=>"city is required",
        ];
        $data = $request->only('first_name','last_name','email','phone');

        if(isset($request->email)){
            $rules = ['email'=>'unique:clients,email,'.$client->id];
            $validation = Validator::make($request->all(),$rules);
            if($validation->fails()){
                return $this->setCode(400)->setError($validation->errors()->first())->send();
            }
        }

        foreach($data as $key=>$value)
        {
            if(empty($value))
            {
                return $this->setCode(400)->setError(isset($valid[$key])?$valid[$key]:$key.' is required')->send();
            }
        }


        $client->update($data);
        $client = ClientResource::make($client);
        return $this->setCode(200)->setData($client)->send();
    }

    public function findNearestLocation(Request $request)
    {
        $location = DB::table('branches')
            ->select('branch_name', 'lat', 'long', DB::raw(sprintf(
                "(6371 * acos(cos(radians(%1$.7f)) * cos(radians($request->input('lat'))) * cos(radians($request->input('long')) - radians(%2$.7f)) + sin(radians(%1$.7f)) * sin(radians($request->input('lat'))))) AS distance"
                ,$request->input('lat'),$request->input('long')
            )))
            ->having('distance', '<', 100)
            ->orderBy('distance', 'asc')
            ->get();
        return $location;
    }

    public static function getByDistance($lat, $long, $distance=10)
    {
        //$results = DB::select(DB::raw('SELECT id, branch_name, ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( longtitude ) - radians(' . $long . ') ) + sin( radians(' . $lat .') ) * sin( radians(lat) ) ) ) AS distance FROM branches HAVING distance < ' . $distance . ' ORDER BY distance') );
        $const_var = 1.59; //1.609344; 
        $results = DB::table('branches')
        ->select('id' , 'city_id' , 'branch_name', DB::raw("3959 * $const_var * acos( cos( radians( $lat ))* cos( radians( lat ) ) * cos( radians( longtitude ) - radians( $long ) ) + sin( radians( $lat ) ) * sin( radians(lat) ) ) as distance"))
        ->havingRaw('distance < ?', [$distance])
        ->orderBy('distance','ASC')
        ->take(1)
        ->get();
        
        //dd($distance);
        //dd($results);
        //dd($results[2]->distance*1.59);

        if(isset($results[0])){
            $nearest_branch = $results[0];
        }

        return (isset($results[0])) ? $nearest_branch : '';

    }

    public function checkBranch(Request $request)
    {
        $nearest_branch = $this->getByDistance($request->lat,$request->long);

        if($nearest_branch != ''){
            $data = ['found' => true , 'branchname' => $nearest_branch->branch_name];
        }else{
            $data = ['found' => false , 'branchname' => ''];
        }

        return $this->setCode(200)->setData($data)->send();

    }

    public function addAdress(Request $request)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }
        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();
        }

        $validator = Validator::make($request->all(), [
            //'city_id' => 'required',
            //'zone_id' => 'required',
            'street' => 'required',
            'description' => 'required',
            'lat'=>'required',
            'long' => 'required',
            'type'=>'required',
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
            //return response()->json($validator->errors()->toJson(), 400);
        }

        $nearest_branch = $this->getByDistance($request->lat,$request->long);

        if($nearest_branch == ''){
            return $this->setCode(400)->setError('نعتذر لكم ,, هذا العنوان خارج نطاق خدمة التوصيل المتوفرة حاليا.')->send();
        }
        else{
            $data=$request->all();
            $data['client_id']= $client->id;
            $data['branch_id']= $nearest_branch->id;
            $data['city_id']= $nearest_branch->city_id;
            $address = client_addresses::create($data);
            
            $nearest_branch_name = branches::find($nearest_branch->id)->branch_name_ar;
            
            
            return $this->setCode(200)->setSuccess('تم اضافة العنوان بنجاح')->send();
            //return $this->setCode(200)->setSuccess($nearest_branch_name)->send();
        }

    }

    public function addFavouriteAdress(Request $request)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }


        $validator = Validator::make($request->all(), [
            'address_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
            //return response()->json($validator->errors()->toJson(), 400);
        }

        $data=$request->all();
        $data['client_id']=$client->id;
        $check = favorite_addresses::where('client_id',$client->id)->first();
        if(!empty($check))
        {
            $check->delete();
        }
        $address = favorite_addresses::create($data);
        return $this->setCode(200)->setSuccess('success')->send();
    }

    public function FavouriteAdress()
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }

        try{

            $addresses = favorite_addresses::with('address')->where('client_id',$client->id)->first();
            if
            (empty($addresses))
            {
              return $this->setCode(400)->setError('favourite_address_not_fount')->send();
            }

            $addresses = FavouriteAddressResource::make($addresses);
            return $this->setCode(200)->setData($addresses)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError('token_absent')->send();
          }


    }

    public function editAddress(Request $request,$id)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }


        $data = $request->only('street','description','lat','long','type');
        foreach($data as $key=>$value)
        {
            if(empty($value))
            {
                return $this->setCode(400)->setError(isset($valid[$key])?$valid[$key]:$key.' is required')->send();
            }
        }
        $nearest_branch = $this->getByDistance($request->lat,$request->long);

        if($nearest_branch == ''){
            return $this->setCode(400)->setError('Can\'t Found Branch')->send();
        }
        else{
            $data['branch_id']= $nearest_branch->id;
            $data['city_id']= $nearest_branch->city_id;
            $address = client_addresses::where('id',$id)->update($data);

            return $this->setCode(200)->setSuccess('updated')->send();
        }



    }
    
    public function notifictions(Request $request,$id)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }else{
                $client = $client[0];
                //dd($client->id);
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();
        }
        
        $notifictions = Notification::where("client_id",$client->id)->get();
        $data = [];
        foreach($notifictions as $notification){
            $data[] = [
                "title"=>$notification->title,
                "body"=>$notification->message,
                
                ];
        }
        
        return $this->setCode(200)->setData($data)->send();
        dd($notifictions);
    }

    public function deleteAddress(Request $request,$id)
    {
        try {
            $client = clients::where('api_token',$this->token)->get();
            $client = $client[0];
            if (! $client) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();

        }


        client_addresses::destroy($id);
        return $this->setCode(200)->setSuccess('تم حذف العنوان بنجاح')->send();
    }



}
