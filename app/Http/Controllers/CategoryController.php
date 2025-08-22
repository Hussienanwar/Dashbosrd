<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function categorys(){
    
    // $students=[
    //         ['name'=>'hussien','email'=>'hussien@gmail.com','course'=>'php'],
    //         ['name'=>'mohamed','email'=>'mohamed@gmail.com','course'=>'laravel'],
    //         ['name'=>'ahmed','email'=>'ahmed@gmail.com','course'=>'html'],
    //         ['name'=>'magdy','email'=>'magdy@gmail.com','course'=>'js'],
    //         ['name'=>'zain','email'=>'zain@gmail.com','course'=>'js']
    //     ];
        $categorys = Category::get();
        return view('dashboard.Categorys.table_Category',compact('categorys'));
    }  

    public function allcategorys(){
        $categorys = Category::get();
        return view('website.allcategorys',compact('categorys'));
    }
            
    public function show($id){
        $categorys = Category::find($id);
        return view('dashboard.Categorys.Category_actions.details',compact('categorys')); 
    }
    
    public function create(){
        return view('dashboard.Categorys.create_Category');
    }

    public function add_catg(CategoryRequest $y){
        $data =$y->validated();
        Category::create($data);
        return redirect()->back()->with('msg','Add Category is Success');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('dashboard.Categorys.Category_actions.edit',compact('category'));
    }
    public function update($id,Request $r){
        $categorys = Category::findOrFail($id);
        // $Categorys = Category::get();
        // $proudect -> update([
        // 'name'        => $r->name,
        // ]); 
        $categorys -> update($r->all());
        return redirect()->route('admin.category.table_catg')->with('msg','Update Category is Success');
    }
    
    public function destroy($id){
        $categorys = Category::findOrFail($id);
        $categorys -> delete();
        // $Category :: destroy();
        return redirect()->route('admin.category.table_catg')->with('msg','Delete Category is Success');
    }
    
    public function forceDestroy($id){
        $categorys = Category::withTrashed()->findOrFail($id);
        $categorys ->restore();
        // $Category :: destroy();
        return redirect()->route('admin.category.archive')->with('msg','Delete Category is Success');
    }
    
    public function archive(){
        $categorys = Category::onlyTrashed()->get();
        return view('dashboard.Categorys.archive',compact('categorys'));
    }

    public function restore($id){
        $categorys = Category::withTrashed()->findOrFail($id);
        $categorys ->Restore();
        // $Category :: destroy();
        return redirect()->route('admin.category.archive')->with('msg','Restore Proudect is Success');
    }

     public function details($id){
    $Category = Category::with('proudects')->findOrFail($id);
    return view('website.categoreyproudect', compact('Category'));
    }

}