<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Comment;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner|super_admin']);
    }


    public function show()
    {
        return view('comments.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datatable = datatables()->of(Comment::latest()->get());

        if(request()->ajax())
        {

            return  $datatable->addColumn('action', function(Comment $comment) {
                        $button = '<button type="button" name="edit" id="'.$comment->id.'" onclick="window.location='."'comments/edit/$comment->id'".'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$comment->id.'" onclick="window.location='."'comments/delete/$comment->id'".'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('comments.index');

    }
    
    
    public function delete($id){

        Comment::destroy($id);

        session()->flash('msg', 'تم الحذف بنجاح');
        session()->flash('class', 'alert-success');
        return Redirect::to('backend/comments');
    }
    
    
}
