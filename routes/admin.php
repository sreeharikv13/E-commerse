<?php


use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\LoginController;
Use App\Http\Controllers\Admin\DashboardController;


Auth::routes();

Route::get('/', function () {
    return view('users.home');
});

Route::name('admin.')->group(function(){
    Route::get('admin/login', [LoginController::class,'Login']);
    Route::post('admin/do-login', [LoginController::class,'doLogin'])->name('do.login');
    Route::get('admin/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

});

