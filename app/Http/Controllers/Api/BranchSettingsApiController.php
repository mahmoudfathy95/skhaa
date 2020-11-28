<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\setting;
use App\Models\contact;

use Illuminate\Support\Facades\App;

use App\Helpers\ApiResponseHelper;


use App\Http\Controllers\Controller;

class BranchSettingsApiController extends Controller
{
    use ApiResponseHelper;
    public function about(Request $request)
    {
        if($request->has('locale')){
            App::setLocale($request->locale);
        }
        
        //$branch_id = $request->branch_id;
        $about = setting::where('name', 'about')->get();
        
        if(! empty($about)){
            $about = $about[0];
            $data = ['key' => "$about->id", 'image' => asset('uploads/'.$about->image) , 'value' =>(App::isLocale('en')) ? $about->data : $about->data_ar];
            return $this->setCode(200)->setSuccess('success')->setData($data)->send();
        }else{
            $data = ['code'=>400, 'data' => 'Branch Not Found'];
            return $this->setCode(200)->setError('Error')->setData($data)->send();
        }
        
        //return $data;
    }
    
    public function contact(Request $request)
    {
        if($request->has('locale')){
            App::setLocale($request->locale);
        }
        
        //$branch_id = $request->branch_id;
        $contacts = contact::all();
        //dd(count($contacts));
        $allContactsArr = [];
        
        if(count($contacts) != 0){
            foreach($contacts as $contact){
                $data = ['key' => "$contact->id", 'image' => asset('uploads/'.$contact->image) , 'value' => $contact->link , 'name' =>(App::isLocale('en')) ? $contact->name : $contact->name_ar];
                $allContactsArr[] = $data;
            }
            return $this->setCode(200)->setSuccess('success')->setData($allContactsArr)->send();
        }else{
            $data = ['code'=>400, 'data' => 'Branch Not Found'];
            return $this->setCode(200)->setError('Error')->setData($data)->send();
        }
        
        /*
    
            $branch_id = $request->branch_id;
            $msg = $request->message;
            $client_id = $request->client_id;
            
            $branch = branches::find($branch_id);
            $branch_email = $branch->branch_email;
        
            $to_name = $request->name;//'Mahmoud Fathy';
            $to_email = $branch_email;//'mahmoud.fathy0100@gmail.com';
            $data = array('name'=>"test", "body" => "Test mail");
        
            /*
                \Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                            ->subject('Artisans Web Testing Mail');
                    $message->from('mfmha011@gmail.com','Sakhaa App');
                });
        */
        
    }
    
    public function privacy(Request $request)
    {
        if($request->has('locale')){
            App::setLocale($request->locale);
        }
        
        //$branch_id = $request->branch_id;
        $privacy = setting::where('name', 'privacy')->get();
        
        if(! empty($privacy)){
            $privacy = $privacy[0];
            $data = ['key' => "$privacy->id", 'image' => asset('uploads/'.$privacy->image) , 'value' =>(App::isLocale('en')) ? $privacy->data : $privacy->data_ar];
            return $this->setCode(200)->setSuccess('success')->setData($data)->send();
        }else{
            $data = ['code'=>400, 'data' => 'Branch Not Found'];
            return $this->setCode(200)->setError('Error')->setData($data)->send();
        }
        
        
    }
    
    
}