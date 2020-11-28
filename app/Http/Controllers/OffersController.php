<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\offers;
use App\Models\cities;
use App\Models\branches;

class OffersController extends Controller
{
    
    public $cities = [];
    public $branches = [];

    public function __construct()
    {
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

        return view('offers.index', compact('branches','cities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(offers::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(offers::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(offers $offer) {
                        $button = '<button type="button" name="edit" id="'.$offer->id.'" onclick="window.location='."'offers/edit/$offer->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$offer->id.'" onclick="window.location='."'offers/delete/$offer->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('offers.index');
    }


    public function create()
    {

        $action = 'offers/store';
        $status = 'add';

        $cities = $this->cities;
        $branches = $this->branches;

        return view('offers.edit', compact('action','status','branches','cities'));
    }


    public function edit($id)
    {
        //
        $action = 'offers/update';
        $offer = offers::where('id' , $id)->get();

        $cities = $this->cities;
        $branches = $this->branches;

        $status = 'edit';

        return view('offers.edit', compact('offer','action','status','branches','cities'));
    }

    public function store(Request $request)
    {

            $request['user_id'] = auth()->user()->id;
            if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

                $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                $branch_id = $user_branch[0]->branch_id;
                $branch_city = $user_branch[0]->branch_city;
                $request['city_id'] = $branch_city;
                $request['branch_id'] = $branch_id;

            }


            $rules = [
                //'city_id' => 'required',
                //'branch_id' => 'required',
                'single_or_multi' => 'required',
                'offer_name_ar' => 'required',
                'offer_name' => 'required',
                'offer_products' => 'required|array|min:1',
                'offer_main_image' => 'required',
                'offer_from' => 'required',
                'offer_to' => 'required',
                'offer_details'=> 'required',
                'offer_details_ar'=> 'required',
            ];
            $validator = Validator::make($request->except('_token','save','offer_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                offers::create($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/offers');

            }


    }

    public function update(Request $request)
    {

            $request['user_id'] = auth()->user()->id;
            if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

                $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
                $branch_id = $user_branch[0]->branch_id;
                $branch_city = $user_branch[0]->branch_city;
                $request['city_id'] = $branch_city;
                $request['branch_id'] = $branch_id;

            }


            $rules = [
                //'city_id' => 'required',
                //'branch_id' => 'required',
                'single_or_multi' => 'required',
                'offer_name_ar' => 'required',
                'offer_name' => 'required',
                'offer_products' => 'required|array|min:1',
                'offer_main_image' => 'required',
                'offer_from' => 'required',
                'offer_to' => 'required',
                'offer_details'=> 'required',
                'offer_details_ar'=> 'required',
            ];
            $validator = Validator::make($request->except('_token','save','offer_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $offer_id = $request->offer_id;
                $offer = offers::find($offer_id);
                $offer->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function delete($id){

        offers::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/offers');
    }

}
