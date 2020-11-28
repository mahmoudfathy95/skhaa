<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Yajra\DataTables\DataTables;

use App\Models\products;
use App\Models\discounts;
use App\Models\cities;
use App\Models\branches;
use App\Models\categories;
use App\Models\sub_categories;
use App\Models\product_quantity;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\VarDumper;

use session;

class ProductsController extends Controller
{
    //


    public $cities = [];
    public $branches = [];
    public $categories = [];
    public $sub_categories = [];

    public function __construct()
    {

        //$this->middleware(['auth']);
        $cities = cities::all()->pluck('city_name_ar','id')->toArray();
        $this->cities = $cities;

        foreach ($cities as $city_id => $city) {
            //$city_id = $city->id;
            $branches = branches::where('city_id',$city_id)->pluck('branch_name_ar','id')->toArray();
            //dd($branches);
            $this->branches[$city_id] = $branches;
        }

        $categories = categories::all()->pluck('category_name_ar','id')->toArray();
        $this->categories = $categories;

        foreach ($categories as $category_id => $category) {
            //$city_id = $city->id;
            $sub_categories = sub_categories::where('category_id',$category_id)->pluck('subcategory_name_ar','id')->toArray();
            $this->sub_categories[$category_id] = $sub_categories;
        }
        
        //dd($this->sub_categories);

    }

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


    public function show()
    {
        $branches = $this->branches;
        $cities = $this->cities;

        return view('products.index', compact('branches','cities'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(products::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(products::where('branch_id',$branch_id)->latest()->get());
        }
        */
        
        $datatable = datatables()->of(products::latest()->get());

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(products $product) {
                        $button = '<button type="button" name="edit" id="'.$product->id.'" onclick="window.location='."'products/edit/$product->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$product->id.'" onclick="window.location='."'products/delete/$product->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('products.index');
    }

    public function create()
    {

        $action = 'products/store';

        $cities = $this->cities;
        $branches = $this->branches;
        $categories = $this->categories;
        $sub_categories = $this->sub_categories;
        $status = 'add';

        return view('products.edit', compact('action','status','branches','cities','categories','sub_categories'));
    }


    public function edit($id)
    {
        //
        $action = 'products/update';
        //$product = products::where('id' , $id)->get();
        $product = products::find($id);

        $cities = $this->cities;
        $branches = $this->branches;
        $categories = $this->categories;
        $sub_categories = $this->sub_categories;
        $status = 'edit';

        return view('products.edit', compact('product','action','status','branches','cities','categories','sub_categories'));
    }

    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        //dd($request['product_main_image']);
        $admin_status = 0;
        if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $branch_city = $user_branch[0]->branch_city;
            $request['city_id'] = $branch_city;
            $request['branch_id'] = $branch_id;
        }else{
            $admin_status = 1;
            $branches = $this->branches[$request->city_id];
        }

        $rules = [
            'product_name' => 'required',
            'product_name_ar' => 'required',
            'product_price' => 'required',
            //'quantity' => 'required',
            'product_details' => 'required',
            'product_details_ar' => 'required',
            'city_id' => 'required',
            //'branch_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_number' => 'required',
            'barcode' => 'required',
            'product_unit' => 'required',
            'product_main_image' => 'required',
            'product_images' => 'required|array|min:1',
        ];
        $validator = Validator::make($request->except('_token','save','discount','discount_value'), $rules);


        if ($validator->fails()) {
            session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة المنتج!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            if(! $admin_status){
                $data = $validator->valid();
                $discount = ($request->discount) ? 1 : 0;
                $data['discount'] = $discount;
                $data['branch_id'] = $branch_id;
    
                $product = products::create($data);
    
                if($discount){
                    $discount = 1;
                    $discountStoreData = ['type' => $request->discount, 'value' => $request->discount_value, 'product_id' => $product->id];
                    discounts::create($discountStoreData);
                }
    
                session()->flash('msg', 'تم اضافة المنتج بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/products');
            }else{
                $data = $validator->valid();
                $discount = ($request->discount) ? 1 : 0;
                $data['discount'] = $discount;
                $data['branch_id'] = $branch_id;
    
                $product = products::create($data);
    
                if($discount){
                    $discount = 1;
                    $discountStoreData = ['type' => $request->discount, 'value' => $request->discount_value, 'product_id' => $product->id];
                    discounts::create($discountStoreData);
                    }
                foreach($branches as $branch_id => $branch_name){
                    product_quantity::create(['branch_id' => $branch_id,'product_id' => $product->id, 'quantity' => 0]);
                    
                }
                
                session()->flash('msg', 'تم اضافة المنتج بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/products');
            }
            

        }

        //return view('products.index');
    }
    
   /*
    public function proq(Request $request)
    {
        for($x =5; $x<14; $x++){
            for($i =18; $i<243; $i++){
                product_quantity::create(['branch_id' => $x,'product_id' => $i, 'quantity' => 0]);
            }
            
        }
        
    }
    */

    public function update(Request $request)
    {
        if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {

            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            //$branch_city = $user_branch[0]->branch_city;
            //$request['city_id'] = $branch_city;
            //dd($request->product_id);
            $request['branch_id'] = $branch_id;
            $rules = [
            'branch_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            ];
            
            $product_quantity = product_quantity::where('branch_id',$branch_id)->where('product_id',$request->product_id)->get();
            $quantity_id = $product_quantity[0]->id;
            $validator = Validator::make($request->except('_token','save','discount','discount_value'), $rules);
            

        }else{
            
            $request['user_id'] = auth()->user()->id;
            
            $rules = [
            'product_name' => 'required',
            'product_name_ar' => 'required',
            'product_price' => 'required',
            //'quantity' => 'required',
            'product_details' => 'required',
            'product_details_ar' => 'required',
            'city_id' => 'required',
            //'branch_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_number' => 'required',
            'barcode' => 'required',
            'product_unit' => 'required',
            'product_main_image' => 'required',
            //'product_images' => 'required|array|min:1',
            ];
            $validator = Validator::make($request->except('_token','save','product_id','discount','discount_value'), $rules);
        }

        
        
        //dd($validator);

        if ($validator->fails()) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث المنتج!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            
            $data = $validator->valid();
            //dd($data);
            
            if (!(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))) {
                $quantity = product_quantity::find($quantity_id);
                $quantity->update($data);
            }else{
                
                $pid = $request->product_id;
                $product = products::find($pid);
                $oldDiscount = $product->discount;
                
                $discount = ($request->discount) ? 1 : 0;
                $data['discount'] = $discount;
                if($discount){
                    $discount = 1;
                    $discountStoreData = ['type' => $request->discount, 'value' => $request->discount_value, 'product_id' => $product->id];
                    if($oldDiscount){
                        $discountOptionId = $product->discountOption->id;
                        $discountObj = discounts::find($discountOptionId);
                        $discountObj->update($discountStoreData);
                    }else{
                        discounts::create($discountStoreData);
                    }
    
                }else{
                    if($oldDiscount){
                        $discountOptionId = $product->discountOption->id;
                        discounts::destroy($discountOptionId);
                    }
                }
                $data['branch_id'] = $product->branch_id;
    
                $product->update($data);
            }

            

            session()->flash('msg', 'تم تحديث المنتج بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
            //return redirect()->back()->with('msg', 'تم تحديث المنتج بنجاح');

        }

        //return redirect()->back()->with('msg', 'your message,here');

        //return view('products.index');
    }


    public function uploadmultipleimages(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads/products'),$imageName);


        return response()->json(['success'=>$imageName]);
        //return view('products.edit', compact('product'));
    }



    public function images(Request $request)
    {

        //$files = json_decode($request->all());                 //1
        $files = $request->images;
        $files = explode(",",$files);

        $result = [];
        
        if ( false!==$files && $files[0] != "") {
            foreach ( $files as $file ) {
                if ( '.'!=$file && '..'!=$file) {       //2
                    $obj['name'] = $file;
                    $obj['size'] = 100;//filesize('uploads/' . $file);
                    //$obj['size'] = 88.63;//filesize(asset('uploads/' . $file));
                    $result[] = $obj;
                }
            }
        }

        header('Content-type: text/json');              //3
        header('Content-type: application/json');
        return $result;

    }
    
    public function delete($id){

        products::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/products');
    }


}
