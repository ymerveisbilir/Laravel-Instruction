<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list(){
        //Categories Model da aktif kategori koşulu tanımlandı.
        $categories = Categories::activeCategories()->get();
        return view('admin/category/list' , compact('categories'));
    }

    public function create(){
        return view('admin/category/create');
    }
    public function store(Request $request){
        $category = new Categories();
        $category->name = $request->cat_name;
        $category->slug = $request->cat_slug;
        $category->status = $request->cat_status;
        $category->meta_title = $request->cat_title;
        $category->meta_description = $request->cat_description;
        $category->save();

        return redirect()->back();
    }

    public function delete($id){
        $categories = Categories::findOrFail($id)->delete(); 
        return redirect()->back(); 
    }

    public function edit($id){
        $category = Categories::findOrFail($id);
        return view('admin/category/edit' , compact('category'));
    }

    public function update(Request $request,$id){

        $category = Categories::findOrFail($id);

        $category->name = $request->cat_name;
        $category->slug = $request->cat_slug;
        $category->status = $request->cat_status;
        $category->meta_title = $request->cat_title;
        $category->meta_description = $request->cat_description;
        $category->save();

        return redirect()->back();
    }
}
