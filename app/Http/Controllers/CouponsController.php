<?php

namespace App\Http\Controllers;

use App\Models\coupon;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    public function show()
    {

        return view('coupons.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(coupon::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(coupon::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(coupon $coupon) {
                        $button = '<button type="button" name="edit" id="'.$coupon->id.'" onclick="window.location='."'coupons/edit/$coupon->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$coupon->id.'" onclick="window.location='."'coupons/delete/$coupon->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('coupons.index');
    }


    public function create()
    {

        $action = 'coupons/store';

        $status = 'add';

        return view('coupons.edit', compact('action','status'));
    }

    public function edit($id)
    {
        //
        $action = 'coupons/update';
        //$product = products::where('id' , $id)->get();
        $coupon = coupon::find($id);

        $status = 'edit';

        return view('coupons.edit', compact('coupon','action','status'));
    }

    public function store(Request $request)
    {

        $rules = [
            'type' => 'required',
            'value' => 'required',
            'code' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ];
        $validator = Validator::make($request->except('_token','save'), $rules);

        if ($validator->fails()) {
            session()->flash('msg', 'فشلت المحاوله , لم يتم انشاء الكود!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $data = $validator->valid();
            coupon::create($data);

            session()->flash('msg', 'تم انشاء الكود بنجاح');
            session()->flash('class', 'alert-success');
            return redirect::to('backend/coupons');
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'type' => 'required',
            'value' => 'required',
            'code' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ];
        $validator = Validator::make($request->except('_token','save','coupon_id'), $rules);

        if ($validator->fails()) {
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث الكود!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $data = $validator->valid();
            $coupon = coupon::find($request->coupon_id);
            $coupon->update($data);

            session()->flash('msg', 'تم تحديث الكود بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
        }
    }
    
    public function delete($id){

        coupon::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/coupons');
    }

}
