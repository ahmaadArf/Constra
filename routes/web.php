<?php
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClinetController;

// Dashoard Routes
                //->middleware('auth','check_user')
Route::prefix('admin')->name('admin.')->group(function () {
    //Admin Route
    Route::get('/',[AdminController::class,'index'])->name('index');

    //Clinet Route
    Route::get('clients/trash', [ClinetController::class, 'trash'])->name('clients.trash');
    Route::get('clients/{id}/restore', [ClinetController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/forcedelete', [ClinetController::class, 'forcedelete'])->name('clients.forcedelete');
    Route::resource('clients',ClinetController::class);


});

//->middleware('auth','check_user')
Auth::routes();
Route::view('not','not_allawd');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
