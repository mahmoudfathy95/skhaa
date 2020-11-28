<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\ouroffers;
use App\Models\cities;
use App\Models\branches;

class OurOffersController extends Controller
{
    
    public $cities = [];
    public $branches = [];

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin'])->except('edit','update');
        
        $cities = cities::all()->pluck('city_name_ar','id')->toArray();
        $this->cities = $cities;

        foreach ($cities as $city_id => $city) {
            //$city_id = $city->id;
            $branches = branches::where('city_id',$city_id)->pluck('branch_name_ar','id')->toArray();
            $this->branches[$city_id] = $branches;
        }

    }

    public function BranchProducts(Request $request)
    {
        if ($request->has('branch_id')) {
            $branch_id = $request->branch_id;
            $products = \App\Models\products::where('branch_id',$branch_id)->pluck('product_name','id')->toArray();
            $response = $products;
        }else{
            $response = 'No Data Available!';
        }
        return $response;
    }

    public function show()
    {
        $branches = $this->branches;
        $cities = $this->cities;

        return view('ouroffers.index', compact('branches','cities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(ouroffers::latest()->get());
        }
        /*
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(ouroffers::where('branch_id',$branch_id)->latest()->get());
        }
        */

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(ouroffers $ouroffer) {
                        $button = '<button type="button" name="edit" id="'.$ouroffer->id.'" onclick="window.location='."'ouroffers/edit/$ouroffer->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$ouroffer->id.'" onclick="window.location='."'ouroffers/delete/$ouroffer->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('ouroffers.index');
    }


    public function create()
    {

        $action = 'ouroffers/store';
        $status = 'add';

        $cities = $this->cities;
        $branches = $this->branches;

        return view('ouroffers.edit', compact('action','status','branches','cities'));
    }


    public function edit($id)
    {
        
        $action = 'ouroffers/update';
        
        if(!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))){
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $ouroffer = ouroffers::where('branch_id' , $branch_id)->get();
        }else{
            $ouroffer = ouroffers::where('id' , $id)->get();
        }
        

        $cities = $this->cities;
        $branches = $this->branches;

        $status = 'edit';

        return view('ouroffers.edit', compact('ouroffer','action','status','branches','cities'));
    }

    public function store(Request $request)
    {

            $request['user_id'] = auth()->user()->id;
            /*
            if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

                $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                $branch_id = $user_branch[0]->branch_id;
                $branch_city = $user_branch[0]->branch_city;
                $request['city_id'] = $branch_city;
                $request['branch_id'] = $branch_id;

            }
            */


            $rules = [
                //'city_id' => 'required',
                //'branch_id' => 'required',
                //'single_or_multi' => 'required',
                //'ouroffer_name_ar' => 'required',
                //'ouroffer_name' => 'required',
                'ouroffer_products' => 'required',
                //'ouroffer_main_image' => 'required'
            ];
            $validator = Validator::make($request->except('_token','save','ouroffer_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $data = $validator->valid();
                //$data['single_or_multi'] = 1;
                ouroffers::create($data);
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/ouroffers');

            }


    }

    public function update(Request $request)
    {

            $request['user_id'] = auth()->user()->id;
            /*
            if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

                $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                $branch_id = $user_branch[0]->branch_id;
                $branch_city = $user_branch[0]->branch_city;
                $request['city_id'] = $branch_city;
                $request['branch_id'] = $branch_id;

            }
            */


            $rules = [
                //'city_id' => 'required',
                //'branch_id' => 'required',
                //'single_or_multi' => 'required',
                //'ouroffer_name_ar' => 'required',
                //'ouroffer_name' => 'required',
                'ouroffer_products' => 'required',
                //'ouroffer_main_image' => 'required'
            ];
            $validator = Validator::make($request->except('_token','save','ouroffer_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $ouroffer_id = $request->ouroffer_id;
                $ouroffer = ouroffers::find($ouroffer_id);
                $data = $validator->valid();
                //$data['single_or_multi'] = 1;
                $ouroffer->update($data);
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    
    public function delete($id){

        ouroffers::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/ouroffers');
    }

}
