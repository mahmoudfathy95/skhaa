<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Helpers\ApiResponseHelper;

class ContactApiController extends Controller
{
    
    use ApiResponseHelper;
    
    public function contact(Request $request)
    {
        
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
    
        
        $data = ['key' => '', 'value' => '', 'image' => asset('logo.png')];
        return $this->setCode(200)->setSuccess($data)->send();
    }

}