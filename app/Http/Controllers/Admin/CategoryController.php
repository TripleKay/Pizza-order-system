<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //category
    public function category(){
        $data = Category::select('categories.*',DB::raw('COUNT(pizzas.category_id) as count'))
                ->leftJoin('pizzas','pizzas.category_id','categories.category_id')
                ->groupBy('categories.category_id')
                ->paginate(5);
                // dd($data->toArray());
        return view('admin.category.list')->with(['categories'=>$data]);
    }

    //searchcateogry
    public function searchCategory(Request $request){
        $data = Category::where('category_name','like','%'.$request->search.'%')->paginate(5);
        $data->appends($request->all());//fixed search error when paginate
        return view('admin.category.list')->with(['categories'=>$data]);
    }

    //deletecategory
    public function deleteCategory($id){
        Category::where('category_id',$id)->delete();
        return back()->with(['success'=>'Category Deleted...']);
    }

    //updatecategory
    public function updateCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'categoryName'=> 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'category_name'=>$request->categoryName,
        ];
        Category::where('category_id',$request->id)->update($data);
        return redirect()->route('admin#category')->with(['success'=>'Category Updated....']);

    }

    //editcategory
    public function editCategory($id){
        $data = Category::where('category_id',$id)->first();
        return view('admin.category.editCategory')->with(['category'=>$data]);
    }

    //addcategory
     public function addCategory(){
        return view('admin.category.addCategory');
    }

    //createcategory
    public function createCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'categoryName'=> 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'category_name' =>  $request->categoryName,
        ];
        Category::create($data);
        return redirect()->route('admin#category')->with(['success'=>'Category Added.....']);
    }



}