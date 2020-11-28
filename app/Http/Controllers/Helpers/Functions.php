<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Intervention\Image\Image;
use Intervention\Image\Facades\Image;

class Functions extends Controller {

    static function getCurrent() {
        $ip = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $url = "http://api.ipstack.com/$ip?access_key=7d1dcef7183f759eb56a340487c882d7";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
$arr['status']=TRUE;

        if ($data) {
            $location = json_decode($data);

            $lat = $location->latitude;
            $lon = $location->longitude;
$arr['status']=TRUE;
$arr['lat']=$lat;
$arr['lng']=$lon;

        }
        return $arr;
    }

    public static function getAddress($latitude, $longitude) {
        $geolocation = $latitude . ',' . $longitude;
        $request = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCKsgOITWZiVUZtrdCZ-3VUNgAKTAzQmwY&latlng=' . $geolocation . '&sensor=false';

        $file_contents = file_get_contents($request);

        $json_decode = json_decode($file_contents);
        dd($json_decode);
//        dd($json_decode);
        if ($json_decode->status = "OK") {
            $data = $json_decode->results;
            return $data[0]->formatted_address;
        }
        return '';
        if (isset($json_decode->results[0])) {
            $response = array();
            foreach ($json_decode->results[0]->address_components as $addressComponet) {
                if (in_array('political', $addressComponet->types)) {
                    $response[] = $addressComponet->long_name;
                }
            }

            if (isset($response[0])) {
                $first = $response[0];
            } else {
                $first = 'null';
            }
            if (isset($response[1])) {
                $second = $response[1];
            } else {
                $second = 'null';
            }
            if (isset($response[2])) {
                $third = $response[2];
            } else {
                $third = 'null';
            }
            if (isset($response[3])) {
                $fourth = $response[3];
            } else {
                $fourth = 'null';
            }
            if (isset($response[4])) {
                $fifth = $response[4];
            } else {
                $fifth = 'null';
            }

            if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null') {
                echo "<br/>Address:: " . $first;
                echo "<br/>City:: " . $second;
                echo "<br/>State:: " . $fourth;
                echo "<br/>Country:: " . $fifth;
            } else if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null') {
                echo "<br/>Address:: " . $first;
                echo "<br/>City:: " . $second;
                echo "<br/>State:: " . $third;
                echo "<br/>Country:: " . $fourth;
            } else if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null') {
                echo "<br/>City:: " . $first;
                echo "<br/>State:: " . $second;
                echo "<br/>Country:: " . $third;
            } else if ($first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null') {
                echo "<br/>State:: " . $first;
                echo "<br/>Country:: " . $second;
            } else if ($first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null') {
                echo "<br/>Country:: " . $first;
            }
        }
    }

    public static function selectedPost($name, $value, $option2) {
        if (isset($_POST[$name])) {
            if ($_POST[$name] == $option2) {
                return "selected='selected'";
            }
        } else {
            if ($value == $option2) {
                return "selected='selected'";
            }
        }
    }

    public static function selectedGet($name, $value, $option2) {
        if (isset($_GET[$name])) {
            if ($_GET[$name] == $option2) {
                return "selected='selected'";
            }
        } else {
            if ($value == $option2) {
                return "selected='selected'";
            }
        }
    }

    public static function selectedArrayPost($name, $option2) {
        if (is_array($_POST[$name])) {
            if (in_array($option2, $_POST[$name]))
                return "selected='selected'";
        }
        else
        if ($name = $option2)
            return "selected='selected'";
    }

    public static function selectedArrayGet($name, $option2) {
        if (isset($_GET[$name]) && is_array($_GET[$name])) {
            if (in_array($option2, $_GET[$name]))
                return "selected='selected'";
        }
    }

    public static function selectedArray($option1, $option2) {
        if (is_array($option2)) {
            if (in_array($option1, $option2))
                return "selected='selected'";
        }
        else
        if ($option1 == $option2) {
            return "selected='selected'";
        }
    }

    public static function selected($option1, $option2) {
        if (is_array($option2)) {
            if (in_array($option1, $option2))
                return "selected='selected'";
        }
        else
        if ($option1 == $option2) {
            return "selected='selected'";
        }
    }

    public static function checkedPost($name, $value, $option2) {
        if (isset($_POST[$name])) {
            if ($_POST[$name] == $option2) {
                return "checked='checked'";
            }
        } else {
            if ($value == $option2) {
                return "checked='checked'";
            }
        }
    }

    public static function checkedGet($name, $value, $option2) {
        if (isset($_GET[$name])) {
            if ($_GET[$name] == $option2) {
                return "checked='checked'";
            }
        } else {
            if ($value == $option2) {
                return "checked='checked'";
            }
        }
    }

    public static function checked($option1, $option2) {
        if (is_array($option2)) {
            if (in_array($option1, $option2))
                return "checked='checked'";
        }
        else
        if ($option1 == $option2) {
            return "checked='checked'";
        }
    }

    public static function genrateRegistartionCode() {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789!@$';
        $string = '';
        for ($i = 0; $i < 9; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    public static function createThumb($path, $image, $dest, $width = 150, $height = 150) {
        $img = \Intervention\Image\Facades\Image::make($path . '/' . $image)->resize($width, $height);
        $img->save($dest . '/' . $image);
        return $dest . '/' . $image;
    }

    public static function makeThumb($src, $dest, $desired_width, $desired_height = 'auto') {
        //if (!file_exists($src))
        //    return false ;
        // image type
        $ext = exif_imagetype($src);

        /* read the source image */
        //if($ext!="JPG" || $ext!="JPEG" || $ext!="jpg")
        if ($ext == '1') //GIF
            $source_image = @imagecreatefromgif($src);
        elseif ($ext == "2") //jpg
            $source_image = @imagecreatefromjpeg($src);
        elseif ($ext == "3") //png
            $source_image = @imagecreatefrompng($src);
        else
            $source_image = $src;
        $width = @imagesx($source_image);
        $height = @imagesy($source_image);
        if ($desired_height == 'auto') {
            /* find the "desired height" of this thumbnail, relative to the desired width  */
            $desired_height = @floor($height * ($desired_width / $width));
        }

        /* create a new, "virtual" image */
        $virtual_image = @imagecreatetruecolor($desired_width, $desired_height);
        /* copy source image at a resized size */
        @imagecopyresized($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        /* create the physical thumbnail image to its destination */
        @imagejpeg($virtual_image, $dest);
    }

    public static function issetPost($name, $value) {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        } else {
            return $value;
        }
    }

    public static function issetGet($name, $value) {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        } else {
            return $value;
        }
    }

    public static function issetLang($name, $lang_id, $value) {
        if (isset($_POST['lang'])) {
            return $_POST['lang'][$lang_id][$name];
        } else {
            return $value;
        }
    }

    public static function issetArrayPost($name) {
        if (is_array($_POST[$name])) {
            foreach ($_POST[$name] as $post) {
                if (in_array($_POST[$name], $post))
                    return $post;
            }
        }
    }

    public static function calculateTime($time) {
        $starttime = $time;
        $stoptime = date('Y-m-d H:i:s');
        $diff = (strtotime($stoptime) - strtotime($starttime));
        $total = $diff / 60;
        return $result_hours = sprintf("%02dH %02dM", floor($total / 60), $total % 60);
    }

    public static function calculateDate($date) {
        $timestamp = strtotime($date);
        $datetime1 = date_create(date('Y-m-d', $timestamp));
        $datetime2 = date_create(date('Y-m-d'));
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format('%a Days');
    }

    public static function createWaterMark($pathImage, $pathLogo = '', $pathSave, $width = null, $height = null) {
        $img = \Intervention\Image\Facades\Image::make($pathImage);

        if ($width != null && $height != null)
            $img->resize($width, $height);

        if ($pathLogo != '')
            $img->insert($pathLogo, 'bottom-left', 10, 10);

        $img->save($pathSave);
    }

    public static function resizeImage($pathImage, $pathSave, $width = null, $height = null) {
        $img = \Intervention\Image\Facades\Image::make($pathImage);

        if ($width != null && $height != null)
            $img->resize($width, $height);

        $img->save($pathSave);
    }

    public static function viewImageBySize($pathImage, $width) {
        $img = \Intervention\Image\Facades\Image::make($pathImage);

        $img->fit(300, 200);

        return $img->save($pathImage);
    }

    public static function viewImageHeight($pathImage) {
        $img = \Intervention\Image\Facades\Image::make($pathImage)->height();

        return $img;
    }

    public static function viewImageWidth($pathImage) {
        $img = \Intervention\Image\Facades\Image::make($pathImage)->width();

        return $img;
    }

    public static function sendEmail($fromName, $from, $to, $cc = '', $bcc = '', $subject, $message) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $headers .= header("Cache-Control: post-check=0, pre-check=0", false);
        $headers .= header("Pragma: no-cache");
//        $headers .= 'To: <' . $to . '>' . "\r\n";
        $headers .= 'From: ' . $fromName . ' <' . $from . '>' . "\r\n";
        if ($cc != '')
            $headers .= 'Cc: ' . $cc . "\r\n";
        if ($bcc != '')
            $headers .= 'Bcc: ' . $bcc . "\r\n";

        $email = mail($to, $subject, $message, $headers, '-freturn@corona-1919.com');

        return $email;
    }

    public static function getCountry() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $jsonData = file_get_contents('https://ipstack.com/ipstack_api.php?ip=' . $ip);
        $countryInfo = json_decode($jsonData, true);
        return $countryInfo;
    }

    public static function getCountryIP() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $jsonData = file_get_contents('https://ipstack.com/ipstack_api.php?ip=' . $ip);
        $countryInfo = json_decode($jsonData, true);
        return $countryInfo['ip'];
    }

    public static function getCountrySymbol() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $jsonData = file_get_contents('https://api.ipstack.com/' . $ip . "?access_key=18c021f0a80e752279f226b31aac4e04");
        $countryInfo = json_decode($jsonData, true);
        return $countryInfo['country_code'];
    }

    public static function getCountryName() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $jsonData = file_get_contents('http://api.ipstack.com/' . $ip . "?access_key=18c021f0a80e752279f226b31aac4e04");
        $countryInfo = json_decode($jsonData, true);
        if (array_key_exists('country_name', $countryInfo)) {
            return $countryInfo['country_name'];
        }
        return '';
    }

    public static function getLatLong($address) {
        preg_match('#@(\d+.\d+),(\d+.\d+)#', $_POST['map'], $latlng);

        $lat = $latlng[1];
        $long = $latlng[2];

        return [$lat, $long];
    }

    public static function getYoutubeStream($url, $width = 200, $height = 100) {
        return'<iframe width="' . $width . '" height="' . $height . '" src="' . $url . '" frameborder="0" allowfullscreen></iframe>';
    }

    public static function getYoutubeStreamLink($url) {
        $id = self::getYoutubeId($url);
        $stream = "https://www.youtube.com/embed/" . $id;
        return $stream;
    }

    public static function getYoutubeImg($url) {
        $id = self::getYoutubeId($url);
        $img = "http://img.youtube.com/vi/" . $id . "/0.jpg";
        return $img;
    }

    public static function getYoutubeId($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
        return $my_array_of_vars['v'];
    }

    public static function selectedArrayDisabled($option1, $option2) {
        if (is_array($option2)) {
            if (in_array($option1, $option2))
                return "disabled";
        }
        else
        if ($option1 == $option2) {
            return "disable";
        }
    }

    public static function getTranslateText($text, $to, $from = 'en') {
        $url = 'http://www.transltr.org/api/translate?text=' . $text . '&to=' . $to . '&from=' . $from;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curlX = curl_exec($ch);
        $data = json_decode($curlX);
        if ($data != null)
            return $data->translationText;
        else
            return null;
    }

    public static function fileToArray(\SplFileInfo $file) {
        if (!$file->isFile())
            return [];
        $file_arr = null;
        $file_syntax = shell_exec('php -l ' . $file->getPathname());
        if (strpos($file_syntax, 'No syntax errors detected') === 0) {
            $file_arr = \File::getRequire($file->getPathname());
        }
        return $file_arr;
    }

    public static function MultiArrayToArray($array, $ret = array(), $index = '') {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $index .= $key . '.';
                $ret = self::MultiArrayToArray($value, $ret, $index);
                $index = '';
            } else {
                $ret[$index . $key] = $value;
            }
        }
        return $ret;
    }

    public static function ArrayToMultiArray($array, $ret = array(), $index = '') {
        $arr_i = 0;
        foreach ($array as $key => $value) {
            $arr_k = array();
            if (strpos($key, '.') > 0) {
                $arr_key = explode('.', $key);
                $arr_key = array_reverse($arr_key);
                $main_key = array_pop($arr_key);
                $arr_k[$arr_i] = &$ret[$main_key];

                $arr_key = array_reverse($arr_key);
                foreach ($arr_key as $i => $index) {
                    $arr_k[$arr_i][$index] = isset($arr_k[$arr_i][$index]) ?
                            $arr_k[$arr_i][$index] : array();
                    $arr_k[$arr_i] = &$arr_k[$arr_i][$index];
                }
                $arr_k[$arr_i] = $value;
                $i++;
            } else {
                $ret[$key] = $value;
            }
        }
        return $ret;
    }

}
