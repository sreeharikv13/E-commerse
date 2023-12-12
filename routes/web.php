<?php


use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\User\HomePageController;


Auth::routes();

Route::get('/', function () {
    return view('users.home');
});
