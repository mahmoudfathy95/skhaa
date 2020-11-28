<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Functions;

//use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{

    public function upload_main(Request $request)
    {
     $validation = Validator::make($request->all(), [
      'select_main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
     ]);
     if($validation->passes())
     {
        $image = $request->file('select_main_image');
        $folder_path = $request->input('folder_path');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads/' . $folder_path . '/'), $new_name);
        $fpath = '/uploads/' . $folder_path . '/';
        return response()->json([
         'message'   => 'تم رفع صورة المنتج بنجاح',
         'uploaded_image' => '<img src="/uploads/' . $folder_path . '/'.$new_name.'" class="img-thumbnail" width="300" />',
         'class_name'  => 'alert-success',
         'new_name' => $new_name,
        ]);
       }
     else
     {
      return response()->json([
       'message'   => $validation->errors()->all(),
       'uploaded_image' => '',
       'class_name'  => 'alert-danger'
      ]);
     }
    }


    function anyUpload()
    {

        $rules = ['file' => 'required|image'];


        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            $data['status'] = 'error';
            $data['data'] = $validator->errors()->all();
        }
        else
        {
            $destinationPath = 'uploads/temp'; // upload path
            $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
            $fileName = random_int(1, 5000) * (float)microtime().'.'.$extension; // renameing image

            Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
//			$thumb=  Helpers::createThumb('./'.$destinationPath, $fileName, './uploads/thumbs');
            $data['status'] = 'ok';
            $data['data'] = './'.$destinationPath.'/'.$fileName;
            $data['file'] = $fileName;
        }
        return json_encode($data);
    }
function upload(Request $request) {
        $rules = ['files.*' => 'required|image'];


        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $data['status'] = 'error';
            $data['data'] = $validator->errors()->all();
        } else {
            $path = 'uploads/products';
            //dd($request->file('file'));

            /*foreach (Input::file('files') as $file) {

                $datepath = date('m-Y', strtotime(\Carbon\Carbon::now()));
                if (!file_exists($path . '/' . $datepath)) {
                    mkdir($path . '/' . $datepath, 0775);
                }
                $newdir = $path . '/' . $datepath;
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $fileName = random_int(1, 5000) * (float) microtime() . '.' . $extension; // renameing image

                $file->move($newdir, $fileName); // uploading file to given path
//			$thumb=  Helpers::createThumb('./'.$destinationPath, $fileName, './uploads/thumbs');
                $data['data'][] = $newdir . '/' . $fileName;
            }*/
            $data['status'] = 'ok';
            $data['data'] = $request->all();
        }
        return json_encode($data);
    }

    function anyEditorupload()
    {
        $rules = ['file' => 'required|image'];
        //dd($_FILES);

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            $response['status'] = 'error';
            $response['data'] = $validator->errors()->all();
        }
        else
        {
            $destinationPath = 'uploads/editor'; // upload path
            $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
            $fileName = random_int(1, 9) * time().'.'.$extension; // renameing image
            Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
            // Generate response.




            $response = new \StdClass;
            $response->link = './'.$destinationPath.'/'.$fileName;
        }
        return json_encode($response);
    }

    function anyRemoveimage()
    {
        if(isset($_POST['src']))
        {
            if(strstr($_POST['src'], '/uploads/'))
            {
                unlink(getcwd().$_POST['src']);
                unlink(getcwd().str_replace('editor/', 'editor/thumbs/', $_POST['src']));
            }
        }
    }

    function anyBrowse()
    {
        $directory = "./uploads/editor/";
        $images = glob($directory.'*');
        foreach($images as $image)
        {

            if(@is_array(getimagesize($image)))
            {
                $image_properties['url'] = $image;
                $image_properties['thumb'] = str_replace('editor/', 'editor/', $image);
                $image_properties['tag'] = 'general';
                $data[] = $image_properties;
            }
        }
        return json_encode($data);
    }

}
