<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 14/01/18
 * Time: 09:28 م
 */

namespace App\Http\Controllers\Helpers;



class Validator
{


    static public function EgyPhone($phoneNumber)
    {
        $pattern="/\b['0']['1']['0']\d{8}\b|\b['0']['1']['1']\d{8}\b|\b['0']['1']['2']\d{8}\b/";

        if(preg_match_all($pattern, $phoneNumber)){
            return true;
        }
        return false;
    }

}