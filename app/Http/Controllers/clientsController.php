<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class clientsController extends Controller
{
    public function show()
    {
        return view('clients.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin')){
            $datatable = datatables()->of(clients::latest()->get());
        }
        else{
            $user_branch = \App\Models\user_branch::where('user_id',auth()->user()->id)->get();
            $branch_id = $user_branch[0]->branch_id;
            $datatable = datatables()->of(clients::where('branch_id',$branch_id)->latest()->get());
        }

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(clients $client) {
                        $button = '<button type="button" name="show" id="'.$client->id.'" onclick="window.location='."'clients/show/$client->id'".'" class="edit btn btn-success btn-sm">Show</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$client->id.'" onclick="window.location='."'clients/delete/$client->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }



        return view('clients.index');
    }

    public function clientDetails($id)
    {
        //
        $action = '';
        //$product = products::where('id' , $id)->get();
        $client = clients::find($id);

        $status = 'show';

        return view('clients.edit', compact('client','action','status'));
    }

    public function delete($id){

        clients::destroy($id);

        session()->flash('msg', 'تم تحديث العميل بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/clients');
    }

}
