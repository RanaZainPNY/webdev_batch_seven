<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
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
Route::get('/fahad', function (Request $request) {
    return view('welcome');
});

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






