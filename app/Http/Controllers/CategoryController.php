<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Datatables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->ajax()) {
            return Datatables::of($categories)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    		$btn = '<a href="'.route('category.edit',$row->id).'" class="edit btn btn-info btn-sm">Edit</a>';

                           $btn = $btn.'<a href="'.route('category.delete',$row->id).'" class="edit btn btn-danger btn-sm">Delete</a>';

                            return $btn;
					})
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('category');
    }

    public function create(){
    	$categories = Category::all();
    	return view('category_add',compact('categories'));
    }

    public function store(Request $request){
    	$all = $request->all();
    	Category::create($all);
    	return redirect('category');
    }

    public function edit($id){
    	$category = Category::find($id);
    	$categories = Category::all();
    	return view('category_edit',compact('category','categories'));
    }

    public function update(Request $request, $id){
    	$category = Category::find($id);
    	$all = $request->all();
    	if($category){
    		Category::find($id)->update($all);
    	}
    	return redirect('category');
    }

    public function delete($id){
    	$category = Category::find($id);
    	// print_r($category);exit;
    	if($category){
    		Category::where('id',$id)->delete();
    	}
    	return redirect('category');
    }
}
