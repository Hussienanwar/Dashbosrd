<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    AdminController,
    CartController,
    CategoryController,
    CheckoutController,
    ContactController,
    FavoriteController,
    OrderController,
    ProfileController, 
    ProudectController,
    SettingsController
};
use App\Models\Contact;

Route::get('/', [ProudectController::class, 'product_category'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});


Route::middleware('auth')->group(function() {
   Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
   Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
   Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
   Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

   Route::post('/product/{id}/review', [ProudectController::class, 'addReview'])->name('product.review');
   Route::get('/product/toprated', [ProudectController::class, 'toprated'])->name('toprated');

    Route::post('/favorites/add/{id}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::delete('/favorites/remove/{id}', [FavoriteController::class, 'remove'])->name('favorites.remove');
    Route::post('/favorites/toggle/{id}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/{item}/update', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/toggle/{productId}', [CartController::class, 'toggleCart'])->name('cart.toggle');
    Route::post('/cart/toggle/{productId}', [CartController::class, 'toggleCart'])->name('cart.toggle');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/allproduct', [ProudectController::class ,'allproducts'])->name('allproducts');
    Route::get('/allcategorys', [CategoryController::class ,'allcategorys'])->name('allcategorys');
    Route::get('/categoreyproudect/{id}', [CategoryController::class ,'details'])->name('category.details');
    Route::get('/aboutus', fn() => view('website.product.aboutus'))->name('about');

    Route::get('/contact', fn() => view('website.contact'))->name('contact');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/details/{id}', [ProudectController::class ,'detailss'])->name('details');
    


// ===================
// Dashboard/Admin
// ===================
Route::prefix('dashboard')->group(function () {
    Route::get('/',[ProudectController::class,'count'])->name('dash');
    Route::prefix('admin')->name('admin.')->group(function(){
        // Orders
        Route::get('/dashboard/users', [AdminController::class, 'index'])->name('users');
        Route::get('orders', [OrderController::class, 'showAll'])->name('orders');
        Route::get('/orders/show/{id}', [OrderController::class, 'showo'])->name('orders.show');
        Route::patch('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');
        
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::patch('/admin/contacts/{id}/status', [ContactController::class, 'updateStatus'])
         ->name('contacts.updateStatus');

        // Products
        Route::controller(ProudectController::class)->name('proudect.')->group(function(){
            Route::get('/proudect','proudects')->name('table_prod');
            Route::get('/proudect/create_proudect','create')->name('create_prod');
            Route::post('/proudect/create_proudect','add')->name('add');
            Route::get('/proudect/archive','archive')->name('archive');

            Route::prefix('/table_prod')->group(function () {
                Route::get('/{id}','show')->whereNumber('id')->name('show');
                Route::get('/{id}/edit','edit')->whereNumber('id')->name('edit');
                Route::put('/{id}','update')->whereNumber('id')->name('update');
                Route::delete('/{id}/destroy','destroy')->whereNumber('id')->name('delete');
                Route::delete('archive/{id}/destroy','forceDestroy')->whereNumber('id')->name('forcedelete');
                Route::get('archive/{id}/restore','restore')->whereNumber('id')->name('restore');
            });   
        });

        // Categories
        Route::controller(CategoryController::class)->name('category.')->group(function(){
            Route::get('/category/table_catg','categorys')->name('table_catg');
            Route::get('/category/create_catg','create')->name('create_catg');
            Route::post('/category/create_catg', 'add_catg')->name('add_catg');
            Route::get('/category/archive','archive')->name('archive');

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
});