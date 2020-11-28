<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\setting;
use App\Models\contact;

class BranchSettingsController extends Controller
{
    
    public function aboutEdit(Request $request)
    {
        //$user_branch_id = auth()->user()->user_branch_id;
        //dd($user_branch_id);
        $action = 'about/update';
        $about = setting::where('name' , 'about')->get()[0];

        $status = 'edit';

        return view('about.edit', compact('about','action','status'));
    }
    
    public function aboutUpdate (Request $request)
    {


            $rules = [
                'data_ar' => 'required',
                'data' => 'required',
                'image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','setting_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث !!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $setting_id = $request->setting_id;
                $setting = setting::find($setting_id);
                $setting->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function privacyEdit(Request $request)
    {
        //$user_branch_id = auth()->user()->user_branch_id;
        //dd($user_branch_id);
        $action = 'privacy/update';
        $privacy = setting::where('name' , 'privacy')->get()[0];

        $status = 'edit';

        return view('privacy.edit', compact('privacy','action','status'));
    }
    
    public function privacyUpdate (Request $request)
    {


            $rules = [
                'data_ar' => 'required',
                'data' => 'required',
                'image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','setting_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث !!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $setting_id = $request->setting_id;
                $setting = setting::find($setting_id);
                $setting->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function contactEdit($id)
    {

        $action = 'contact/update';
        $contact = contact::find($id);
//dd($contact);
        $status = 'edit';

        return view('contact.edit', compact('contact','action','status'));
    }
    
    public function contactUpdate (Request $request)
    {

        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
            'link' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->except('_token','save','setting_id'), $rules);


        if ($validator->fails()) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث !!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $setting_id = $request->setting_id;
            $setting = contact::find($setting_id);
            $setting->update($validator->valid());
            //dd($validator->valid());
            session()->flash('msg', 'تم تحديث بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
        }
    }
    
    public function createContact()
    {

        $action = 'contact/store';
        $status = 'add';

        return view('contact.edit', compact('action','status'));
    }
    
    public function contactStore (Request $request)
    {

        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
            'link' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->except('_token','save','setting_id'), $rules);


        if ($validator->fails()) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث !!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            contact::create($validator->valid());
            //dd($validator->valid());
            session()->flash('msg', 'تم تحديث بنجاح');
            session()->flash('class', 'alert-success');
            return redirect::to('backend/contacts');
        }
    }
    
}