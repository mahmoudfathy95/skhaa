<?php

namespace App\Http\Controllers\Helpers\Html;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Intervention\Image\Image;
use Intervention\Image\Facades\Image;
use App\Http\Middleware\Roles;

class Components extends Controller {

    public static function uploader($image = './assets/images/avatar_image.png', $css_classes = '') {

        if($image == '' || !file_exists($image))
            $image = './assets/images/avatar_image.png';
        $html = file_get_contents(__DIR__ . '/uploader.html');
        $html = str_replace('profile_picture', $image, $html);
        $html = str_replace('{css_classes}', $css_classes, $html);

        return $html;
    }
    public static function upload($image = './assets/images/avatar_image.png', $css_classes = '',$name) {

        if($image == '' || !file_exists($image))
            $image = './assets/images/avatar_image.png';
        $html = file_get_contents(__DIR__ . '/uploader1.html');
        $html = str_replace('profile_picture', $image, $html);
        $html = str_replace('{css_classes}', $css_classes, $html);
        $html = str_replace('{name}', $name, $html);

        return $html;
    }
    public static function customupload($image = './assets/images/avatar_image.png', $class ,$name) {
//        if($image == '' || !file_exists($image))
//            $image = './assets/images/avatar_image.png';
        $html = file_get_contents(__DIR__ . '/customuploader.html');
        $html = str_replace('profile_picture', $image, $html);
        $html = str_replace('{css_classes}', $class, $html);
        $html = str_replace('{name}', $name, $html);

        return $html;
    }

    public static function addGoogleMap() {
        $html = file_get_contents(__DIR__ . "/googlemap.html");
        return $html;
    }
    public static function addGoogleMap1($lat, $lng) {
        if($lat=='')
            $lat=-34.397;
        if($lng=='')
            $lng=-150.644;
        $html = file_get_contents(__DIR__ . "/googlemap_1.html");
        $html = str_replace("{lat}", $lat, $html);
        $html = str_replace('{lng}', $lng, $html);
        return $html;
    }

    public static function addGoogleMapShow($lat, $lng) {
        $html = file_get_contents(__DIR__ . "/googlemapshow.html");
        $html = str_replace("{lat}", $lat, $html);
        $html = str_replace('{lng}', $lng, $html);
        return $html;
    }

    public static function editGoogleMap($lat, $lng, $img, $desc, $zoom) {
        $html = file_get_contents(__DIR__ . "/googlemapedit.html");
        $html = str_replace("{lat}", $lat, $html);
        $html = str_replace('{lng}', $lng, $html);
        $html = str_replace('{img}', $img, $html);
        $html = str_replace('{desc}', $desc, $html);
        $html = str_replace('{zoom}', $zoom, $html);
        return $html;
    }
    public static function editGoogleMap1($lat, $lng,$zoom) {
        if($lat=='')
            $lat=-34.397;
        if($lng=='')
            $lng=-150.644;
                if($zoom=='')
            $zoom=1;
        $html = file_get_contents(__DIR__ . "/googlemapedit_1.html");
        $html = str_replace("{lat}", $lat, $html);
        $html = str_replace('{lng}', $lng, $html);
    $html = str_replace('{zoom}', $zoom, $html);
        return $html;
    }

    public static function showGoogleMap($lat, $lng, $img, $desc, $zoom) {
        $html = file_get_contents(__DIR__ . "/showgooglemap.html");
        $html = str_replace("{lat}", $lat, $html);
        $html = str_replace('{lng}', $lng, $html);
        $html = str_replace('{img}', $img, $html);
        $html = str_replace('{desc}', $desc, $html);
        $html = str_replace('{zoom}', $zoom, $html);
        return $html;
    }

    public static function showGoogleMapMultiple($result, $urlImage) {
        $html = file_get_contents(__DIR__ . "/showgooglemapmultiple.html");
        $html = str_replace('{result}', $result, $html);
        $html = str_replace('{url_image}', $urlImage, $html);
        return $html;
    }

    public static function uploadMultiple($urlUpload, $savePath, $result, $urlDelete) {
        $html = file_get_contents(__DIR__ . "/upload_multiple.html");
        $html = str_replace('{urlUpload}', $urlUpload, $html);
        $html = str_replace('{savePath}', $savePath, $html);
        $html = str_replace('{result}', $result, $html);
        if(Roles::check('sliders.deleteimage'))
            $removeStatus = true;
        else
            $removeStatus = false;
        $html = str_replace('{removeStatus}', $removeStatus, $html);
        $html = str_replace('{urlDelete}', $urlDelete, $html);
        return $html;
    }

    public static function scriptTableLang($url) {
        $html = file_get_contents(__DIR__ . "/script_table_lang.html");
        $html = str_replace('{url}', $url, $html);
        return $html;
    }

}
