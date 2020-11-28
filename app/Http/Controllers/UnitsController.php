<?php

namespace App\Http\Controllers;

use App\Models\units;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class UnitsController extends Controller
{

    public function show()
    {

        return view('units.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(units::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(units::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(units $unit) {
                        $button = '<button type="button" name="edit" id="'.$unit->id.'" onclick="window.location='."'units/edit/$unit->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$unit->id.'" onclick="window.location='."'units/delete/$unit->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('units.index');
    }


    public function create()
    {

        $action = 'units/store';

        $status = 'add';

        return view('units.edit', compact('action','status'));
    }

    public function edit($id)
    {
        //
        $action = 'units/update';
        //$product = products::where('id' , $id)->get();
        $unit = units::find($id);

        $status = 'edit';

        return view('units.edit', compact('unit','action','status'));
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
        ];
        $validator = Validator::make($request->only('name','name_ar'), $rules);

        if ($validator->fails()) {
            session()->flash('msg', 'فشلت المحاوله , لم يتم انشاء الوحدة!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $data = $validator->valid();
            units::create($data);

            session()->flash('msg', 'تم انشاء الوحدة بنجاح');
            session()->flash('class', 'alert-success');
            return redirect::to('backend/units');
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
        ];
        $validator = Validator::make($request->only('name','name_ar'), $rules);

        if ($validator->fails()) {
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث الوحدة!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $data = $validator->valid();
            $unit = units::find($request->unit_id);
            $unit->update($data);

            session()->flash('msg', 'تم تحديث الوحدة بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
        }
    }
    
    public function delete($id){

        units::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/units');
    }

}
