<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\newproducts;
use App\Models\cities;
use App\Models\branches;

class NewProductsController extends Controller
{
    
    public $cities = [];
    public $branches = [];


    public function __construct()
    {
        $this->middleware(['role:owner|super_admin'])->except('edit','update');
        
        $cities = cities::all()->pluck('city_name','id')->toArray();
        $this->cities = $cities;

        foreach ($cities as $city_id => $city) {
            //$city_id = $city->id;
            $branches = branches::where('city_id',$city_id)->pluck('branch_name','id')->toArray();
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

        return view('newproducts.index', compact('branches','cities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(newproducts::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(newproducts::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(newproducts $newproduct) {
                        $button = '<button type="button" name="edit" id="'.$newproduct->id.'" onclick="window.location='."'newproducts/edit/$newproduct->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$newproduct->id.'" onclick="window.location='."'newproducts/delete/$newproduct->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('newproducts.index');
    }

    public function create()
    {
        
        $action = 'newproducts/store';
        $status = 'add';

        $cities = $this->cities;
        $branches = $this->branches;

        return view('newproducts.edit', compact('action','status','branches','cities'));
    }


    public function edit()
    {
        //
        $action = 'newproducts/update';
        /*
        if(!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))){
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $newproduct = newproducts::where('branch_id' , $branch_id)->get();
        }else{
            $newproduct = newproducts::where('id' , $id)->get();
        }
        */
        $newproducts = newproducts::all();

        $cities = $this->cities;
        $branches = $this->branches;
        
        //$new_products_arr = $newproducts->pluck('product_id')->toArray();
        //dd($new_products_arr);

        $status = 'edit';

        return view('newproducts.edit', compact('newproducts','action','status','branches','cities'));
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
                //'name' => 'required',
                //'new_products' => 'required',
                'new_products' => 'required|array|min:1',
            ];
            $validator = Validator::make($request->except('_token','save','newproduct_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة المنتج!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                
                $check_branch = newproducts::find($request->branch_id);
                if(! empty($check_branch)){
                    session()->flash('msg', 'فشلت المحاوله , موجود بالفعل!');
                    session()->flash('class', 'alert-danger');
                    return Redirect::back();
                }else{
                    newproducts::create($validator->valid());
                    //dd($validator->valid());
                    session()->flash('msg', 'تم اضافة المنتج بنجاح');
                    session()->flash('class', 'alert-success');
                    return redirect::to('backend/newproducts');
                }
                

            }


    }

    public function update(Request $request)
    {

            //$request['user_id'] = auth()->user()->id;
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
                //'name' => 'required',
                'new_products' => 'required|array|min:1',
            ];
            $validator = Validator::make($request->except('_token','save','newproduct_id'), $rules);

            $user_id = auth()->user()->id;

            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث المنتج!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                //dd($validator->valid());
                //$newproduct_id = $request->newproduct_id;
                //$newproduct = newproducts::find($newproduct_id);
                
                $data = $validator->valid()['new_products'];
                $checkProducts = newproducts::all()->pluck('product_id')->toArray();
                $insert_arr = array_diff($data,$checkProducts);
                $deleted_arr = array_diff($checkProducts,$data);
                //dd($deleted_arr);
                newproducts::whereIn('product_id',$deleted_arr)->delete();
                //$allArr = array_merge($diff_arr1,$diff_arr2);
                //dd($allArr);
                $created_arr = [];
                if(count($insert_arr) != 0){
                    foreach($insert_arr as $product_id){
                        $created_arr[] = ['user_id' => $user_id, 'product_id' => $product_id];
                    }
                    //dd($created_arr);
                    newproducts::insert($created_arr);
                }
   
                session()->flash('msg', 'تم تحديث المنتج بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function delete($id){

        newproducts::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/newproducts');
    }



}
