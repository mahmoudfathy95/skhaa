<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 14/01/18
 * Time: 09:19 م
 */

namespace App\Http\Controllers\Helpers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SmsHelper
{
    static function sendhismsSMS($number , $message_text){
       // $this->load->model('Model_main_data');
       // $mainData = $this->Model_main_data->select_all();
       /* if(!empty($mainData)){
            $user_name    = $mainData["sms_user_name"];
            $pass         = $mainData["sms_user_pass"];
            $sender       = $mainData["sms_sender"];
        }else{
        */
            $user_name    = "966534066660"; //  966534066660
            $pass         = "f123456kh";  //  f123456kh
            $sender       = "MARSOOLK";  ///
        //}
        $date         = date("Y-m-d",time());
        $time         = date("h:i",time());

        $api_url  = 'https://www.hisms.ws/api.php?send_sms'  ;
        $api_url .= '&username='.$user_name  ;
        $api_url .= '&password='.$pass  ;
        $api_url .= '&numbers='.$number  ;
        $api_url .= '&sender='.$sender  ;
        $api_url .= '&message='.urlencode($message_text)."&"  ;
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($crl, CURLOPT_URL, $api_url);
        curl_setopt($crl, CURLOPT_TIMEOUT, 10);
        $reply = curl_exec($crl);
        if ($reply === false) {
            return 0;
        }
        //	curl_close($crl);
        return  $reply;
    }

    static public function sendSMS( $apiKey,$phoneNumber, $countryCode)
    {

        $link = "https://api.authy.com/protected/json/phones/verification/start?api_key=$apiKey";
        $param = [
            'json' => [
                'via'   => 'sms',
                'brand' =>   "M3alig APP",
                'country_code' => $countryCode,
                'phone_number' => $phoneNumber,
                'locale' => 'en',
            ]
        ];

        $client = new Client();

        try {

            $res = $client->request('POST', $link, $param);

            return [
                'code' => $res->getStatusCode(),
                'message' => json_decode($res->getBody())->message
            ];

        } catch (ClientException $e) {

            return [
                'code' => $e->getResponse()->getStatusCode(),
                'message' => json_decode($e->getResponse()->getBody())->message
            ];
        }
    }

    static public function  checkSMS($apiKey,$phone,$countryCode,$code){

        $link="https://api.authy.com/protected/json/phones/verification/check?api_key=$apiKey&phone_number=$phone&country_code=$countryCode&verification_code=$code";

        $client = new Client();

        try {

            $res = $client->request('GET', $link);
            return [
                'code' => $res->getStatusCode(),
                'message' => json_decode($res->getBody())->message
            ];
        } catch (ClientException $e) {

            return [
                'code' => $e->getResponse()->getStatusCode(),
                'message' => json_decode($e->getResponse()->getBody())->message
            ];
        }


    }
   
}