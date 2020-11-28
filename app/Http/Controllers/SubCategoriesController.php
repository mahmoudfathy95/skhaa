<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\categories;
use App\Models\sub_categories;

class SubCategoriesController extends Controller
{

    public $categories = [];

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin']);

        $categories = categories::all()->pluck('category_name','id')->toArray();
        $this->categories = $categories;

    }


    public function show()
    {

        return view('subcategories.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datatable = datatables()->of(sub_categories::latest()->get());

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(sub_categories $sub_category) {
                        $button = '<button type="button" name="edit" id="'.$sub_category->id.'" onclick="window.location='."'subcategories/edit/$sub_category->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$sub_category->id.'" onclick="window.location='."'subcategories/delete/$sub_category->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('subcategories.index');

    }

    public function create()
    {

        $action = 'subcategories/store';
        $status = 'add';
        $categories = $this->categories;

        return view('subcategories.edit', compact('action','status','categories'));
    }

    public function edit($id)
    {
        $action = 'subcategories/update';
        $categories = $this->categories;
        $sub_category = sub_categories::where('id' , $id)->get();

        $status = 'edit';

        return view('subcategories.edit', compact('sub_category','action','status','categories'));
    }

    public function store(Request $request)
    {

            $rules = [
                'category_id' => 'required',
                'subcategory_name_ar' => 'required',
                'subcategory_name' => 'required',
                'subcategory_image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','subcategory_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                sub_categories::create($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة القسم بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/subcategories');

            }


    }



    public function update(Request $request)
    {


            $rules = [
                'category_id' => 'required',
                'subcategory_name_ar' => 'required',
                'subcategory_name' => 'required',
                'subcategory_image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','subcategory_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $subcategory_id = $request->subcategory_id;
                $subcategory = sub_categories::find($subcategory_id);
                $subcategory->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث القسم بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }


    }
    
    public function delete($id){

        sub_categories::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/subcategories');
    }





}
