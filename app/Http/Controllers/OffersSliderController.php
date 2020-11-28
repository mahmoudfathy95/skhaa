<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\offersslider;
use App\Models\cities;
use App\Models\branches;

class OffersSliderController extends Controller
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

    public function show()
    {
        $branches = $this->branches;
        $cities = $this->cities;

        return view('offersslider.index', compact('branches','cities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(offersslider::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(offersslider::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(offersslider $offerslider) {
                        $button = '<button type="button" name="edit" id="'.$offerslider->id.'" onclick="window.location='."'offersslider/edit/$offerslider->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$offerslider->id.'" onclick="window.location='."'offersslider/delete/$offerslider->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('offersslider.index');
    }


    public function create()
    {

        $action = 'offersslider/store';
        $status = 'add';

        $cities = $this->cities;
        $branches = $this->branches;

        return view('offersslider.edit', compact('action','status','branches','cities'));
    }

    public function edit()
    {
        //
        $action = 'offersslider/update';
        $offerslider = offersslider::all();

        $cities = $this->cities;
        $branches = $this->branches;

        $status = 'edit';

        return view('offersslider.edit', compact('offerslider','action','status','branches','cities'));
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
                'city_id' => 'required',
                'branch_id' => 'required',
                'offer_name_ar' => 'required',
                'offer_name' => 'required',
                'image' => 'required'
            ];
            $validator = Validator::make($request->except('_token','save','offerslider_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                offersslider::create($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/offersslider');

            }


    }

    public function update(Request $request)
    {

            //$request['user_id'] = auth()->user()->id;
            $user_id = auth()->user()->id;
            
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
                //'offer_name_ar' => 'required',
                //'offer_name' => 'required',
                'slider_images' => 'required'
            ];
            $validator = Validator::make($request->except('_token','save', 'offerslider_id'), $rules);
            
            


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث العرض!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $data = $validator->valid()['slider_images'];
                //dd($data);
              
                offersslider::truncate();
                
                $created_arr = [];
                if(count($data) != 0){
                    foreach($data as $image){
                        $created_arr[] = ['user_id' => $user_id , 'image' => $image];
                    }
                    //dd($created_arr);
                    offersslider::insert($created_arr);
                }
                session()->flash('msg', 'تم تحديث العرض بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function uploadmultipleimages(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads/offerssliders'),$imageName);


        return response()->json(['success'=>$imageName]);
        //return view('products.edit', compact('product'));
    }
    
    
    public function delete($id){

        offersslider::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/offersslider');
    }


}
