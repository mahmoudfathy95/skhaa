<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Models\categories;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin']);

    }


    public function show()
    {
        return view('categories.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){

            $datatable = datatables()->of(categories::latest()->get());

            if(request()->ajax())
            {

                return  $datatable->addColumn('action', function(categories $category) {
                            $button = '<button type="button" name="edit" id="'.$category->id.'" onclick="window.location='."'categories/edit/$category->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$category->id.'" onclick="window.location='."'categories/delete/$category->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                            return $button;
                        })

                        ->rawColumns(['action'])
                        ->make(true);
            }

        }

        return view('categories.index');
    }

    public function create()
    {

        $action = 'categories/store';
        $status = 'add';

        return view('categories.edit', compact('action','status'));
    }

    public function edit($id)
    {
        $action = 'categories/update';
        $category = categories::where('id' , $id)->get();

        $status = 'edit';

        return view('categories.edit', compact('category','action','status'));
    }

    public function store(Request $request)
    {

            $rules = [
                'category_name_ar' => 'required',
                'category_name' => 'required',
                'category_image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','city_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم اضافة القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                categories::create($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم اضافة القسم بنجاح');
                session()->flash('class', 'alert-success');
                return redirect::to('backend/categories');

            }


    }

    public function update(Request $request)
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){

            $rules = [
                'category_name_ar' => 'required',
                'category_name' => 'required',
                'category_image' => 'required',
            ];
            $validator = Validator::make($request->except('_token','save','category_id'), $rules);


            if ($validator->fails()) {
                //dd($validator);
                session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث القسم!!');
                session()->flash('class', 'alert-danger');
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $category_id = $request->category_id;
                $category = categories::find($category_id);
                $category->update($validator->valid());
                //dd($validator->valid());
                session()->flash('msg', 'تم تحديث القسم بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();

            }
        }

    }


    public function delete($id){

        categories::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/categories');
    }
    

}
