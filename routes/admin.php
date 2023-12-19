<?php


use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\LoginController;
Use App\Http\Controllers\Admin\DashboardController;
Use App\Http\Controllers\Admin\ProductController;



Auth::routes();

Route::get('/', function () {
    return view('users.home');
});

Route::name('admin.')->group(function(){
    Route::get('admin/login', [LoginController::class,'Login']);
    Route::post('admin/do-login', [LoginController::class,'doLogin'])->name('do.login');

    Route::get('admin/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

    Route::name('product.')->prefix('admin/products')->group(function(){
       Route::get('/', [ProductController::class,'list'])->name('list');
       Route::get('create', [ProductController::class,'create'])->name('create');
       Route::post('save', [ProductController::class,'save'])->name('save');

    });
});

