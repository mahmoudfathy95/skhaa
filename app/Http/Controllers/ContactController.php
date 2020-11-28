<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\contact;



class ContactController extends Controller
{


    public function show()
    {
        return view('contact.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datatable = datatables()->of(contact::latest()->get());

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(contact $contact) {
                        $button = '<button type="button" name="edit" id="'.$contact->id.'" onclick="window.location='."'contact/edit/$contact->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$contact->id.'" onclick="window.location='."'contact/delete/$contact->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('contact.index');

    }



    public function delete($id){

        contact::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/branches');
    }

}
