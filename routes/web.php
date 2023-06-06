<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/admin/logout', 'destroy')->name('logout');
    Route::get('/admin/profile', 'profile')->name('profile');
    Route::get('/admin/edit/profile', 'editProfile')->name('edit.profile');
    Route::POST('/admin/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/admin/change/password', 'changePassword')->name('change.password');
    Route::POST('/admin/update/password', 'updatePassword')->name('update.password');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
