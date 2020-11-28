<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;

use App\Models\clients;
use App\Models\client_addresses;
use App\Models\products;
use App\Models\coupon;
use App\Models\cities;
use App\Models\OrderStatusTypeTranslation;
use App\Models\OrderStatusTranslation;
use App\Models\product_quantity;

use App\Helpers\ApiResponseHelper;
use App\Http\Resources\OrderApiResource;
use App\Http\Resources\SingleOrderApiResource;
use App\Http\Resources\OrderProductsApiResource;
use App\Models\branches;
use App\Models\orderproducts;
use App\Models\orders;

class OrderApiController extends Controller
{
    use ApiResponseHelper;

    public $token = '';

    public function __construct(Request $request)
    {
        $this->token = $request->bearerToken();
        //dd($this->token);
        //$this->token = '9b7cb513bbf053bda30459fa03d6419197284f7015ac3f68da1f69505953eb27';
    }
    public function checkout(Request $request)
    {
        //dd($request->all());

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

        $validator = Validator::make($request->all(), [
            //'address' => 'required',
            'payment' => 'required',
            'branch_id' => 'required',
            'data'=>'required'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
                //            return response()->json($validator->errors()->toJson(), 400);
        }

        if($request->address == null){
            $address = null;
        }else{
            $address = client_addresses::find($request->address);
        }


        $payment = $request->payment;
        $branch_id = $request->branch_id;

        $dt = date('Y-m-d');

        $products =[];
        $all_products=[];
        $sub_total=0;
        $shipping = 0;
        $branch = branches::all();
        

        foreach($request->data as $key)
        {
            $vat = $branch[0]->vat;
            //dd($request->data);
            $product = products::where('id',$key['product_id'])->first();
            if(!empty($product))
            {
                $products['product_id'] = $key['product_id'];
                $products['quantity'] = $key['quantity'];
                $products['price'] = $product->product_price;

                if($product->quantity < $key['quantity'])
                {
                    return $this->setCode(400)->setError('الكمية المطلوبة غير متوفرة')->send();
                }

                if($product->discount)
                {
                  if($product->discountOption->type==1)
                  {
                    $products['discount'] = $product->discountOption->value;
                  }else
                  {
                    $products['discount'] = ($product->discountOption->value*$product->product_price)/100;
                  }
                }else
                {
                    $products['discount'] = 0;
                }
                

                //$vat = ($product->product_price *$key['quantity'] * $vat)/100;
                $divided_vat = (1 . "." . $vat);
                $vat = $product->product_price - ($product->product_price/$divided_vat);

                $products['vat'] = $vat;
                

                //$sub_total += (($product->product_price*$key['quantity'])+$vat)-($products['discount']*$key['quantity']);

                $sub_total += (($product->product_price*$key['quantity']))-($products['discount']*$key['quantity']);

                array_push($all_products,$products);
            }else
            {
                return $this->setCode(400)->setError('products_not_avilable')->send();

            }
            

        }

        //dd($all_products);

        if(isset($request->coupon) && $request->coupon != null)
        {
            $coupon = $request->coupon;
            $check_coupon = coupon::where('code',$coupon)->where('date_from','<=',$dt)->where('date_to','>=',$dt)->first();
                if(!empty($check_coupon))
                {
                   if($check_coupon->type == 'value')
                   {
                       $coupon_discount = $check_coupon->value;
                       $total = $sub_total - $check_coupon->value;
                   }else
                   {
                    $coupon_discount = ($check_coupon->value*$sub_total)/100;
                    $total = $sub_total - ($check_coupon->value*$sub_total)/100 ;
                   }
                }else{
                    $total = $sub_total;
                    $coupon_discount = 0;
                }
        }else
        {
            $total = $sub_total;
            $coupon = NULL;
            $coupon_discount = 0;

        }

        if($address != null){
            $shipping = cities::where('id',$address->city->id)->first()->shipping_amount;
        }

        $total = $total + $shipping;

        $data = [
            "client_id"=>$client->id,
            "branch_id"=>$branch_id,
            "subTotal"=>"$sub_total",
            "discount"=>"$coupon_discount",
            "coupon"=>"$coupon",
            "total"=>"$total",
            "address_id"=> ($address != null) ? $address->id : null,
            'city'=> ($address != null) ? $address->city->name : null,
            'street'=> ($address != null) ? $address->street : null,
            'street_description'=> ($address != null) ? $address->description : null,
            "payment"=>"$payment",
            "shipping"=>"$shipping",
            "notes" => $request->notes,
        ];
        //$check_client = orders::where('client_id',$client->id)->get();
        
        $data['order_status_type_id'] = ($address != null) ? 1 : 2;

        $order = orders::create($data);
           


        foreach($all_products as $key)
        {
            
            $quantity_update = product_quantity::where('product_id' , $key['product_id'])->where('branch_id' , $branch_id)->get()[0];
            $quantity_update = product_quantity::find($quantity_update->id);
            $quantity_update->update(['quantity'=>$quantity_update->quantity-$key['quantity']]);
            //$product_update->update(['quantity'=>$product_update->quantity-$key['quantity']]);
            $key['order_id']=$order->id;
            orderproducts::create($key);
        }

        //OrderHistory::create(['order_id'=>$order->id, 'order_status_id'=>1,'comment'=>'جديد']);

        $branch = branches::find($branch_id);
        $branch_email = $branch->branch_email;

        $to_name = 'Mahmoud Fathy';
        $to_email = $branch_email;//'mahmoud.fathy0100@gmail.com';
        $data = array('name'=>"test", "body" => "Test mail");

    /*
        \Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('mfmha011@gmail.com','Sakhaa App');
        });
    */
        return $this->setCode(200)->setSuccess('success')->send();

    }


    public function orders()
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


        try{

            $orders = orders::where('client_id',$client->id)->get();
            $orders = OrderApiResource::collection($orders);
            return $this->setCode(200)->setData($orders)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError('technical_error');
          }
    }


    public function singleOrder($id)
    {
        
        try{

            //$orders = orders::where('id',$id)->first();
            $order = orders::find($id);
            //dd($order->id);
            
            $request = request();
            
            if($request->has('locale')){
                App::setLocale($request->locale);
            }
            
           // dd($order);
           
           //dd($order->branch->city_name);
           
           
            $order = [
                    "id"=>$order->id,
                    "subTotal"=>"$order->subTotal",
                    "discountCoupon"=>"$order->discount",
                    "total"=>"$order->total",
                    "user"=>$order->client->first_name,
                    //"city"=>(App::isLocale('en')) ? $order->address->city->city_name??null : $order->address->city->city_name_ar,
                    "city"=> ($order->address) ? ((App::isLocale('en')) ? $order->address->city->city_name : $order->address->city->city_name_ar):$order->branch->city_name,
                    "street"=> ($order->address) ? ((App::isLocale('en')) ? $order->address->street : $order->street):$order->branch->street,
                    "description"=> ($order->address) ? ((App::isLocale('en')) ? $order->address->street_description : $order->street_description):$order->branch->street_description,
                    //"street"=>$order->address->street??null,
                    //"description"=>$order->address->description??null,
                    "long"=>($order->address) ? $order->address->long : $order->branch->longtitude,
                    "lat"=>($order->address) ? $order->address->lat : $order->branch->lat,
                    //"long"=>$order->address->long??null,
                    //"lat"=>$order->address->lat??null,
                    //"addressType"=>($order->address)?($order->address->type==1?'home':'work'):null,
                    "payment"=>$order->payment,
                    "orderStatus_type"=> (App::isLocale('en')) ? OrderStatusTypeTranslation::find($order->orderstatusType->id)->name : OrderStatusTypeTranslation::find($order->orderstatusType->id)->name_ar,
                    "orderStatus"=> (App::isLocale('en')) ? OrderStatusTranslation::find($order->order_status_id)->name : OrderStatusTranslation::find($order->order_status_id)->name_ar,
                    //'orderStatus'=>$order->orderHistory[count($this->orderHistory)-1]->singlestatus->name,
                    "date"=>$order->created_at->format('Y-m-d'),
                    "shipping"=>"$order->shipping",
                    "notes" => ($order->notes != null) ? "$order->notes" : "",
                    //"order_type"=> ($order->address) ? "توصيل" : "استلام من الفرع",
                    'products'=>OrderProductsApiResource::collection($order->orderProduct)
                ];
                //dd($order);

            /*$orders = SingleOrderApiResource::collection($orders);
            dd($orders);*/
            return $this->setCode(200)->setData($order)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError('technical_error');
          }
    }

}
