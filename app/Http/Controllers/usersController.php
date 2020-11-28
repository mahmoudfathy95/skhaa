<?php

namespace App\Http\Controllers;

use App\Models\user_branch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class usersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner'])->except('editUser','showUser','updateUser');
    }

    public function show()
    {
        if(auth()->user()->hasRole('owner')){
            return view('users.index');
        }else{
            return redirect()->to('/backend');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole('owner')){
            $datatable = datatables()->of(User::all()->except(auth()->user()->id));
            if(request()->ajax())
            {

                return  $datatable->addColumn('action', function(User $user) {
                            $button = '<button type="button" name="edit" id="'.$user->id.'" onclick="window.location='."'users/edit/$user->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$user->id.'" onclick="window.location='."'users/delete/$user->id'".'" data-toggle="modal" data-target="#myModal" class="delete btn btn-danger btn-sm">Delete</button>';
                            return $button;
                        })

                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('clients.index');

        }
        else{
            return redirect()->to('/backend');
        }

        



        
    }

    public function create()
    {

        $action = 'users/store';

        $status = 'add';

        return view('users.edit', compact('action','status'));
    }

    public function edit($id)
    {
        //
        $action = 'users/update';
        //$product = products::where('id' , $id)->get();
        $user = User::find($id);

        $status = 'edit';

        return view('users.edit', compact('user','action','status'));
    }


    public function update(Request $request){
        //$request['user_id'] = auth()->user()->id;

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            
        ];
        $validator = Validator::make($request->except('_token','save','roles','user_branch'), $rules);

        if ($validator->fails() || (count($request->roles) == 0 && $request->user_branch != '')) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث البيانات!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{

            $user_id = $request->user_id;
            $user = User::find($user_id);
            $data = $validator->valid();
            $data['encrypted_password'] = encrypt($data['password']);
            $data['password'] = bcrypt($data['password']);
            
            
            $user->update($data);
            $user_branch = user_branch::where('user_id',$user_id)->get()[0];
            $user_branch->update(['branch_id' => $request->user_branch]);
            $user->roles()->sync($request->roles);

            session()->flash('msg', 'تم تحديث البيانات بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
            //return redirect()->back()->with('msg', 'تم تحديث المنتج بنجاح');

        }
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            
        ];
        $validator = Validator::make($request->except('_token','save','roles','user_branch'), $rules);

        if ($validator->fails() || (count($request->roles) == 0 && $request->user_branch != '')) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث البيانات!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{

            $data = $validator->valid();
            $data['encrypted_password'] = encrypt($data['password']);
            $data['password'] = bcrypt($data['password']);
            $email_check = User::where('email',$request->email)->get();
            
            if(count($email_check) != 0){
                session()->flash('msg', 'البريد مسجل بالفعل');
                session()->flash('class', 'alert-danger');
                return redirect()->back();
            }else{
                $user = User::create($data);
                user_branch::create(['user_id' => $user->id , 'branch_id' => $request->user_branch]);
                $user->roles()->attach($request->roles);
    
                session()->flash('msg', 'تم اضافة البيانات بنجاح');
                session()->flash('class', 'alert-success');
                return redirect()->back();
                //return redirect()->back()->with('msg', 'تم تحديث المنتج بنجاح');

            }
            
          
        }
    }
    
    public function editAdmin(Request $request){
        
        $user = User::find(auth()->user()->id);
        $status = 'edit';
        $action = 'users/updateAdmin';
        
        return view('users.adminProfileEdit', compact('user','action','status'));
        
        
    }
    
    public function updateAdmin(Request $request){
        
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ];
        $validator = Validator::make($request->except('_token','save','roles','user_branch'), $rules);

        if ($validator->fails()) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث البيانات!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{

            $data = $validator->valid();
            $data['encrypted_password'] = encrypt($data['password']);
            $data['password'] = bcrypt($data['password']);
            $user = User::find(auth()->user()->id);
            $user->update($data);
            
            session()->flash('msg', 'تم تحديث البيانات بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
            
        }
        
    }
    
    public function showUser(Request $request){
        $user = User::find(auth()->user()->id);
        $status = 'show';
        $action = '';
        
        return view('users.userProfileEdit', compact('user','action','status'));
    }
    
    public function editUser(Request $request){
        $user = User::find(auth()->user()->id);
        $status = 'edit';
        $action = 'users/updateUser';
        
        return view('users.userProfileEdit', compact('user','action','status'));
        
        
    }
    
    public function updateUser(Request $request){
        
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            
        ];
        $validator = Validator::make($request->except('_token','save','roles','user_branch'), $rules);

        if ($validator->fails()) {
            //dd($validator);
            session()->flash('msg', 'فشلت المحاوله , لم يتم تحديث البيانات!!');
            session()->flash('class', 'alert-danger');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{

            $data = $validator->valid();
            $data['encrypted_password'] = encrypt($data['password']);
            $data['password'] = bcrypt($data['password']);
            $user = User::find(auth()->user()->id);
            $user->update($data);
            
            session()->flash('msg', 'تم تحديث البيانات بنجاح');
            session()->flash('class', 'alert-success');
            return redirect()->back();
            
        }
        
    }

    public function delete($id){

        User::destroy($id);

        session()->flash('msg', 'تم تحديث المستخدم بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/users');
    }


}
