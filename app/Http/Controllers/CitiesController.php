<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\cities;

class CitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin']);

    }


    public function show()
    {
        return view('cities.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){

            $datatable = datatables()->of(cities::latest()->get());

            if(request()->ajax())
            {

                return  $datatable->addColumn('action', function(cities $city) {
                            $button = '<button type="button" name="edit" id="'.$city->id.'" onclick="window.location='."'cities/edit/$city->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$city->id.'" onclick="window.location='."'cities/delete/$city->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                            return $button;
                        })

                        ->rawColumns(['action'])
                        ->make(true);
            }

        }

        return view('cities.index');
    }

    public function create()
    {

        $action = 'cities/store';
        $status = 'add';

        return view('cities.edit', compact('action','status'));
    }

    public function edit($id)
    {
        $action = 'cities/update';
        $city = cities::where('id' , $id)->get();

        $status = 'edit';

        return view('cities.edit', compact('city','action','status'));
    }

    public function store(Request $request)
    {

            $rules = [
                'city_name_ar' => 'required',
                'city_name' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','city_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                cities::create($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة المدينة بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/cities');

            }


    }

    public function update(Request $request)
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){

            $rules = [
                'city_name_ar' => 'required',
                'city_name' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','city_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $city_id = $request->city_id;
                $city = cities::find($city_id);
                $city->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث المدينة بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }
        }

    }

    public function delete($id){

        cities::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/cities');
    }


}
