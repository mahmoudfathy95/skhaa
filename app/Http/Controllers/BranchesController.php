<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\cities;
use App\Models\branches;
use App\Models\about;
use App\ouroffers;
use App\newproducts;


class BranchesController extends Controller
{

    public $cities = [];

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin']);

        $cities = cities::all()->pluck('city_name','id')->toArray();
        $this->cities = $cities;

    }


    public function show()
    {
        return view('branches.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datatable = datatables()->of(branches::latest()->get());

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(branches $branch) {
                        $button = '<button type="button" name="edit" id="'.$branch->id.'" onclick="window.location='."'branches/edit/$branch->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$branch->id.'" onclick="window.location='."'branches/delete/$branch->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('branches.index');

    }

    public function create()
    {

        $action = 'branches/store';
        $status = 'add';
        $cities = $this->cities;

        return view('branches.edit', compact('action','status','cities'));
    }

    public function edit($id)
    {
        $action = 'branches/update';
        $cities = $this->cities;
        $branch = branches::where('id' , $id)->get();

        $status = 'edit';

        return view('branches.edit', compact('branch','action','status','cities'));
    }

    public function store(Request $request)
    {

            $rules = [
                'city_id' => 'required',
                'branch_name_ar' => 'required',
                'branch_name' => 'required',
                'branch_email' => 'required',
                'branch_phone' => 'required|numeric',
                'longtitude' => 'required',
                'lat' => 'required',
                'vat' => 'required',
                'street' => 'required',
                'street_description' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','branch_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة الفرع!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $branch = branches::create($validator->valid());
                //about::create(['branch_id' => $branch->id, 'about'=> '' , 'about_ar'=> '']);
                /*
                ouroffers::create([
                    'branch_id' => $branch->id, 
                    'city_id'=> $branch->city_id , 
                    'user_id'=> auth()->user()->id, 
                    'single_or_multi' => 1, 
                    'ouroffer_name' => 1, 
                    'ouroffer_name_ar' => 1, 
                    'ouroffer_products' => [], 
                    'ouroffer_main_image'=>'avatar_image.png',
                    ]);
                newproducts::create([
                    'branch_id' => $branch->id, 
                    'city_id'=> $branch->city_id , 
                    'user_id'=> auth()->user()->id, 
                    'new_products' => [], 
                    ]);
                */
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة الفرع بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/branches');

            }


    }



    public function update(Request $request)
    {


            $rules = [
                'city_id' => 'required',
                'branch_name_ar' => 'required',
                'branch_name' => 'required',
                'branch_email' => 'required',
                'branch_phone' => 'required|numeric',
                'longtitude' => 'required',
                'lat' => 'required',
                'vat' => 'required',
                'street' => 'required',
                'street_description' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','branch_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $branch_id = $request->branch_id;
                $branch = branches::find($branch_id);
                $branch->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث القسم بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }


    public function delete($id){

        branches::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/branches');
    }

}
