<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function sendSms(Request $request) {
        $rules = [
            'phone' => 'required|numeric',
        ];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $arr = ['status' => 500, 'errors' => $validator->errors()->all()];

            return response()->json($arr);
        }
        //$code = $this->generatemobie(6);
        $code='5555';
        //$phonecode = new \App\Models\PhoneCode();
        //$phonecode->phone = $request->phone;
        //$phonecode->code = $code;
        //$phonecode->save();
        $res = $this->send($code, $request->phone);
        if (\json_decode($res)->success == 'true') {

            $arr = ['status' => 200, 'message' => 'Success'];

            //$user = User::where('phone', $request->phone)->first();
            /*
            if (is_object($user))
                $arr = ['status' => 200, 'message' => 'Success'];
            else
                $arr = ['status' => 201, 'message' => 'Success'];
            */
        }
        else {
            $arr = ['status' => 500, 'errors' => ['error']];
        }
        return response()->json($arr);
    }

    function send($code, $phone) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.unifonic.com/rest/Messages/Send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "AppSid=U1w8Cgil2muVXYgFWr7wl2rUlQsVRF&Recipient=$phone&Body=Your Verification Code id $code&SenderID=WATNIASAKHA");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
