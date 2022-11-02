<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {
        if(\Auth::user()->role == 'admin'&&$id!=null){
            $user = User::find($id);
            return view('home',compact('id','user'));
        }elseif(\Auth::user()->role == 'admin'){
            $categories = Category::whereNull('parent_id')->get();
            return view('home',compact('categories'));
        }else{
            $user = \Auth::user();
            return view('home',compact('user'));
        }
    }
}
