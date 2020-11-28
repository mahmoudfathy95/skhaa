<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use App\Models\orders;
use App\Models\Notification;
use App\Models\order_histories;
use App\Models\order_statuses;
use App\Models\OrderStatusTranslation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function show()
    {

        return view('orders.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(orders::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(orders::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(orders $order) {
                        $button = '<button type="button" name="edit" id="'.$order->id.'" onclick="window.location='."'orders/edit/$order->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$order->id.'" onclick="window.location='."'orders/delete/$order->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('orders.index');
    }


    public function create()
    {

        $action = 'orders/store';

        $status = 'add';

        return view('orders.edit', compact('action','status'));
    }

    public function edit($id)
    {
        //
        $action = 'orders/update';
        //$product = products::where('id' , $id)->get();
        $order = orders::find($id);
        
        //dd($order);

        $status = 'edit';

        return view('orders.edit', compact('order','action','status'));
    }

    public function updateOrderStatus(Request $request)
    {
        $request->validate([
            'order_id'=>'required|numeric',
            'order_status_id'=>'required|numeric',
        ]);

        $data = $request->only('order_id','order_status_id');
        $order = orders::find($request->order_id);
        if($order->order_status_id != $request->order_status_id){
            $status = order_statuses::find($request->order_status_id);
            //$order->order_status_type_id = $status->order_status_type_id;
            $order->order_status_id = $status->id;
            $order->update();
            order_histories::create($data);
            $orderstatustrans = OrderStatusTranslation::where('order_status_id',$order->orderstatus->id)->get()[0];
            //dd($orderstatustrans->name);
            Notification::create([
                'client_id'=>$order->client_id,
                'order_id'=>$order->id,
                'title'=> 'Your Order Number ' . $order->id,
                'message'=>$orderstatustrans->name
            ]);
            //dd($order->client->firebase_token);
            $this->notification($order->client->firebase_token,$orderstatustrans->name, 'Your Order Number' . $order->id);
        }

        //Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        //return redirect()->route('orders.show',$request->order_id);

        session()->flash('msg', 'تم تعديل البيانات بنجاح');
        session()->flash('class', 'alert-success');
        return redirect()->back();

    }

    public function notification($firebase,$body,$title)
    {
       $authToken = 'key=AAAAkCvIsp8:APA91bFQ2D6DEKewieU7gnxUwxn5qSgEakO8DoearpAdOfgI_-vtkTFOypO4dGeoEB6HGwsJQITHRDrcypOA2jDOepX1-H-n8dyF7TtYzNixonHovwUZntMw3IQJ2kb22X1tfJKYegyE';

        // The data to send to the API
        $postData = array(
            'priority' => 'HIGH',
            'to' => $firebase,
            'notification' =>array('body' =>$body ,'title'=>$title ),
            'data' =>array('body' =>$body ,'title'=>$title )
        );

        // Setup cURL
        $ch = curl_init('https://fcm.googleapis.com/fcm/send');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$authToken,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }else
        {

            return $response;
        }
    }

    public function delete($id){

        orders::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/orders');
    }

}
