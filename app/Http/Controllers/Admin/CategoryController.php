<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //index
    public function index(){
        return view('admin.home');
    }

    //searchcateogry
    public function searchCategory(Request $request){
        $data = Category::where('category_name','like','%'.$request->search.'%')->paginate(5);
        return view('admin.category.list')->with(['categories'=>$data]);
    }

    //deletecategory
    public function deleteCategory($id){
        Category::where('category_id',$id)->delete();
        return redirect()->route('admin#category')->with(['success'=>'Category Deleted...']);
    }

    //updatecategory
    public function updateCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'categoryName'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
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
        $data = [
            'category_name' =>  $request->categoryName,
        ];
        Category::create($data);
        return redirect()->route('admin#category')->with(['success'=>'Category Added.....']);
    }

    //category
    public function category(){
        $data = Category::paginate(5);
        return view('admin.category.list')->with(['categories'=>$data]);
    }

   

   //profile
   public function profile(){
    $id = auth()->user()->id;
    $userData = User::where('id',$id)->first();
    return view('admin.profile.index')->with(['userData'=>$userData]);
}
}