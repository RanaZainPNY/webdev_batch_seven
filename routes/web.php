<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebsiteController;


// Admin Routes
Route::get("/admin/master", [WebsiteController::class, 'adminMasterPage'])->name('admin-master');
Route::get("/admin/products", [ProductController::class, 'productindex'])->name('admin-products');
Route::get("/admin/create/product", [ProductController::class, 'createProductPage'])->name('admin-create-products');
Route::post("/admin/store/product", [ProductController::class, 'storeProductPage'])->name('admin-products-store');
Route::get("/admin/delete/product/{id}", [ProductController::class, 'removeProduct'])->name('admin-products-remove');
Route::get("/admin/edit/form/{id}", [ProductController::class, 'editProductForm'])->name('admin-edit-product-form');
Route::post("/admin/update/product/{id}", [ProductController::class, 'updateProduct'])->name('admin-update-product');


// Website Routes
Route::get('/web/master', [WebsiteController::class, 'webMasterPage'])->name('web-master');
Route::get('/web/index', [WebsiteController::class, 'webIndexPage'])->name('web-index');
Route::get('/web/shop', [WebsiteController::class, 'webShopPage'])->name('web-shop');
Route::get('/web/cart', [WebsiteController::class, 'webCartPage'])->name('web-cart');
Route::get('/web/checkout', [WebsiteController::class, 'webCheckoutPage'])->name('web-checkout');
Route::get('/web/contact', [WebsiteController::class, 'webContact'])->name('web-contact');


// cart routes
Route::get('/addtocart/{id}', [CartController::class, 'addtocart'])->name('add-to-cart');
Route::get('/remove/{id}', [CartController::class, 'removefromcart'])->name('remove-from-cart');
Route::get('/cartstatus', [CartController::class, 'cartstatus'])->name('cart-status');
Route::post('/placeorder', [CartController::class, 'placeorder'])->name('cart-place-order');

Route::get('/', function () {
    return redirect()->route('web-index');
});


Route::get('/hello', action: function () {
    $name = "Saad Chaudhary";
    return "<h1>hello 23393 $name</h1>";
});


// Route parameters
Route::get('/fahad/{id}/book/{bookname?}', action: function ($id, $bookname = '') {
    $name = "Muhammad Fahad";
    return "<h1>hello  $name ===> $id, $bookname</h1>";
});

// Query Params
// Route::get('/fahad', function (Request $request) {
//     return view('welcome');
// });

Route::get('/fahad', [WebsiteController::class, 'fahadPage'])->name('web-fahad');


// Post Method
Route::post('/submitform', function (Request $request) {
    // dd($request);
    $email = $request->email;
    $password = $request->password;

    DB::table(table: 'users')->insert([
        'name' => 'fahad',
        'email' => $email,
        'password' => $password
    ]);


    $users = DB::table('users')->get();


    dump($users);

    // return "Data Inserted Successfully";
    // dump($email, $password);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});






