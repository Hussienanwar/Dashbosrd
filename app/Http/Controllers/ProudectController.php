<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProudectRequest;
use Illuminate\Http\Request;
use App\Models\proudect;
use App\Models\Category;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;

class ProudectController extends Controller
{
    
    public function proudects(){
    
    // $students=[
    //         ['name'=>'hussien','email'=>'hussien@gmail.com','course'=>'php'],
    //         ['name'=>'mohamed','email'=>'mohamed@gmail.com','course'=>'laravel'],
    //         ['name'=>'ahmed','email'=>'ahmed@gmail.com','course'=>'html'],
    //         ['name'=>'magdy','email'=>'magdy@gmail.com','course'=>'js'],
    //         ['name'=>'zain','email'=>'zain@gmail.com','course'=>'js']
    //     ];
        $proudects = proudect::get();
        return view('dashboard.proudects.table_proudect',compact('proudects'));
    }  
    
    public function count()
    {
        $ordersCount = Order::count();
        $categoriesCount = Category::count();
        $productsCount = Proudect::count();
        $usersCount = User::count();

        return view('dashboard.index', compact('ordersCount', 'categoriesCount', 'productsCount', 'usersCount'));
    }

    public function product_category(){
        $proudects = proudect::take(4)->get();
        $categorys = Category::take(4)->get();
        $topRatedProducts = proudect::with('reviews')
            ->withAvg('reviews', 'rating')
            ->having('reviews_avg_rating', '>', 0) // فقط المنتجات اللي عندها تقييم
            ->orderByDesc('reviews_avg_rating')
            ->take(4)
            ->get();
        return view('website.home',compact('proudects','categorys','topRatedProducts'));
    }
    
    public function toprated(){
        $proudects = proudect::get();
        $topRatedProducts = proudect::with('reviews')
            ->withAvg('reviews', 'rating')
            ->having('reviews_avg_rating', '>', 0) // فقط المنتجات اللي عندها تقييم
            ->orderByDesc('reviews_avg_rating')
            ->take(10)
            ->get();
        return view('website.product.toprated',compact('proudects','topRatedProducts'));
    }



    public function allproducts(){
        $proudects = proudect::get();
        return view('website.product.allproduct',compact('proudects'));
    }
    
    public function detailss($id){
        $proudect = proudect::findOrFail($id);
        return view('website.product.details',compact('proudect'));
    }


    public function show($id){
        $proudect = Proudect::findOrFail($id);
        return view('dashboard.proudects.Proudect_actions.details',compact('proudect')); 
    }
    
    
    public function create(){
        $Categorys = Category::get();
        return view('dashboard.proudects.create_proudect',compact('Categorys'));
        
    }
    
    public function add(ProudectRequest $x ){
        //$proudect=> props (id,name,price,description,category_id,created_it,updated_at)
        //$x => props (id,name,price,description,category_id,)
    // $proudect = new Proudect();
    // $proudect->name=$x->name; 
    // $proudect->price=$x->price; 
    // $proudect->description=$x->description; 
    // $proudect->category_id=$x->category; 
    // $proudect ->save();
    
    $data =$x->validated();
    if($x->hasFile('image')){
        $file=$x->file('image');
        $filename =time()."_". $file->getClientOriginalName();
        $file->storeAs('proudect',$filename,'public');
    }
    $data['image']=$filename;
    Proudect::create($data);
    // Proudect::create($x);
    return redirect()->back()->with('msg','Add Proudect is Success');
}

// public function edit($id){
    //     $Categorys = Category::get();
//     return view('dashboard.Proudects.Proudect_actions.edit',compact('categorys'));
//     // return redirect()->back()->with('msg','Edit Proudect is Success');
// }

public function edit($id){
    $proudect = Proudect::findOrFail($id);
    $Categorys = Category::get();
    return view('dashboard.proudects.Proudect_actions.edit',compact('proudect','Categorys'));
    
}



public function addReview(Request $request, $proudectId) {
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500',
    ]);

    // تحديث التقييم لو موجود أو إنشاء جديد
        Review::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'proudect_id' => $proudectId
        ],
        [
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]
    );

    return redirect()->back()->with('success', 'Review added successfully!');
}



public function update($id,Request $r){
    $proudect = Proudect::findOrFail($id);
    // $Categorys = Category::get();
    // $proudect -> update([
        // 'name'        => $r->name,
        // 'price'       => $r->price,
        // 'description' => $r->description,
        // 'category_id' => $r->category_id 
        // ]); 
        $proudect -> update($r->all());
        return redirect()->route('admin.proudect.table_prod')->with('msg','Update Proudect is Success');
    }
    
    public function destroy($id){
        $proudect = Proudect::findOrFail($id);
        $proudect -> delete();
        // $proudect :: destroy();
        return redirect()->route('admin.proudect.table_prod')->with('msg','Delete Proudect is Success');
   }
   
    public function forceDestroy($id){
        $proudect = Proudect::withTrashed()->findOrFail($id);
        $proudect ->forceDelete();
        // $proudect :: destroy();
        return redirect()->route('admin.proudect.archive')->with('msg','Delete Proudect is Success');
    }
    
    public function archive(){
        $proudects = proudect::onlyTrashed()->get();
        return view('dashboard.proudects.archive',compact('proudects'));
    }
    
    public function restore($id){
        $proudects = proudect::withTrashed()->findOrFail($id);
        $proudects -> restore();
        return redirect()->route('admin.proudect.archive')->with('msg','Restore Proudect is Success');
    }



    }
