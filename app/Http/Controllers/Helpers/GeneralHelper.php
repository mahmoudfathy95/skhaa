<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 15/01/18
 * Time: 06:17 م
 */

namespace App\Helpers;


class GeneralHelper
{


    static public function generateToken()
    {

        $token = substr(bin2hex(random_bytes(50)), 0, 40);
        return $token;
    }

    static public function generateSecret()
    {

        $secret = base64_encode(str_random(40));
        return $secret;
    }


}