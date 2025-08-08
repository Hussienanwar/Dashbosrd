<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProudectController;
use App\Http\Controllers\CategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });

  Route::prefix('dashboard')->group(function () {

   Route::get('/', function () {
    return view('dashboard.index');
   })->name('dash');
   
   Route::get('/login', function () {
    return view('dashboard.auth.login');
   })->name('login');

//    Route::get('/table', function () {
//     return view('dashboard.student.table');
//    })->name('student');



Route::prefix('/admin')->name('admin.')->group(function(){

Route::controller(ProudectController::class)->name('proudect.')->group(function(){
   Route::get('/proudect/','proudects')->name('table_prod');
   Route::get('/proudect/create_proudect','create')->name('create_prod');
   Route::post('/proudect/create_proudect' ,'add')->name('add');
   Route::get('/proudect/archive' ,'archive')->name('archive');

   Route::prefix('/table_prod')->group(function () {
      Route::get('/{id}/','show')->whereNumber('id')-> name ('show');
      Route::get('/{id}/edit','edit')->whereNumber('id')->name('edit');
      Route::put('/{id}/','update')->whereNumber('id')->name('update');
      Route::delete('/{id}/destroy','destroy' )->whereNumber('id')->name('delete');
      Route::delete('archive/{id}/destroy','forceDestroy' )->whereNumber('id')->name('forcedelete');
      Route::get('archive/{id}/restore','restore' )->whereNumber('id')->name('restore');
   });   
});   



Route::controller(CategoryController::class)->name('category.')->group(function(){
   Route::get('/category/table_catg','categorys')->name('table_catg');
   Route::get('/category/create_catg','create')->name('create_catg');
   Route::post('/category/create_catg' , 'add_catg')->name('add_catg');
   Route::get('/category/archive' ,'archive')->name('archive');
   
   Route::prefix('table_catg')->group(function () {
      Route::get('/{id}/','show')->whereNumber('id')->name('details');
      Route::get('/{id}/edit_catg','edit')->whereNumber('id')->name('edit');
      Route::put('/{id}/updete','update')->whereNumber('id')->name('update');
      Route::delete('/{id}/destroy','destroy')->whereNumber('id')->name('delete');
      Route::delete('/archive/{id}/destroy','forceDestroy')->whereNumber('id')->name('forcedelete');
      Route::get('/archive/{id}/restore','restore')->whereNumber('id')->name('restore');
         });      
      });
   });
});