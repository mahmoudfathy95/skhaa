<?php

namespace App\Http\Controllers\Helpers\Html;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class Themes extends Controller
{

    public static function deleteRow($row_id, $url, $attribute = [])
    {
        $html = file_get_contents(__DIR__ . "/delete_row.html");
        $html = str_replace("{row_id}", $row_id, $html);
        $html = str_replace('{url}', $url, $html);
     
        return $html;
    }

    public static function confirmationDelete($row_id, $url, $attribute = [], $message = 'delete this row may be case delete some data also like posts , cities pages and packages')
    {
        $html = file_get_contents(__DIR__ . "/confirmation_delete.html");
        $html = str_replace("{row_id}", $row_id, $html);
        $html = str_replace('{url}', $url, $html);
        foreach($attribute as $key => $attr)
        {
            $_attr[] = "$key" . '=' . "$attr";
        }
        $attr = join($_attr, ' ');
        $html = str_replace('{attribute}', $attr, $html);
        $html = str_replace('{message}', $message, $html);
        return $html;
    }

    public static function deleteForeverRow($row_id, $url, $attribute = [])
    {
        $html = file_get_contents(__DIR__ . "/delete_forever_row.html");
        $html = str_replace("{row_id}", $row_id, $html);
        $html = str_replace('{url}', $url, $html);
        foreach($attribute as $key => $attr)
        {
            $_attr[] = "$key" . '=' . "$attr";
        }
        $attr = join($_attr, ' ');
        $html = str_replace('{attribute}', $attr, $html);
        return $html;
    }

    public static function imageFancy($name, $url)
    {
        $html = file_get_contents(__DIR__ . "/image_fancy.html");
        $html = str_replace("{name}", $name, $html);
        $html = str_replace('{url}', $url, $html);
        return $html;
    }

    public static function checkboxInput($is_active, $id, $url, $checked, $attribute = [])
    {
        $html = file_get_contents(__DIR__ . "/checked.html");
        $html = str_replace("{is_active}", $is_active, $html);
        $html = str_replace('{id}', $id, $html);
        $html = str_replace('{url}', $url, $html);
        $html = str_replace('{checked}', $checked, $html);
        foreach($attribute as $key => $attr)
        {
            $_attr[] = "$key" . '=' . "$attr";
        }
        $attr = join($_attr, ' ');
        $html = str_replace('{attribute}', $attr, $html);
        return $html;
    }

    public static function radioInput($name, $id, $url, $checked, $attribute = [])
    {
        $html = file_get_contents(__DIR__ . "/radio.html");
        $html = str_replace("{name}", $name, $html);
        $html = str_replace('{id}', $id, $html);
        $html = str_replace('{url}', $url, $html);
        $html = str_replace('{checked}', $checked, $html);
        foreach($attribute as $key => $attr)
        {
            $_attr[] = "$key" . '=' . "$attr";
        }
        $attr = join($_attr, ' ');
        $html = str_replace('{attribute}', $attr, $html);
        return $html;
    }

    public static function checkInput($name, $id, $url, $checked, $attribute = [])
    {
        $html = file_get_contents(__DIR__ . "/checkbox.html");
        $html = str_replace("{name}", $name, $html);
        $html = str_replace('{id}', $id, $html);
        $html = str_replace('{url}', $url, $html);
        $html = str_replace('{checked}', $checked, $html);
        foreach($attribute as $key => $attr)
        {
            $_attr[] = "$key" . '=' . "$attr";
        }
        $attr = join($_attr, ' ');
        $html = str_replace('{attribute}', $attr, $html);
        return $html;
    }

}
