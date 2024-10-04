<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/example', function () {
    return response()->json(['name' => 'zain']);
});

Route::get('/checkbalance/{contact}', function () {
    return response()->json(['name' => 'zain']);
});
