<?php

use App\Http\Controllers\CustomPostTypeController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::prefix('front')->group(function () {
    Route::get('sign-in', [LoginController::class, 'sign_in'])->name('frontend.sign_in');
    Route::get('sign-up', [LoginController::class, 'sign_up'])->name('frontend.sign_up');
});






// Route::get('customPostType',[CustomPostTypeController::class,'create'])->name('customPostType.careate');
// Route::get('customPostType',[CustomPostTypeController::class,'index'])->name('customPostType.index');
// Route::post('customPostType',[CustomPostTypeController::class,'store'])->name('customPostType.store');
// Route::get('customPostType/{id}',[CustomPostTypeController::class,'show'])->name('customPostType.show');
// Route::get('customPostType/{id}/edit',[CustomPostTypeController::class,'edit'])->name('customPostType.edit');
// Route::put('customPostType/{id}',[CustomPostTypeController::class,'update'])->name('customPostType.update');
// Route::delete('customPostType/{id}',[CustomPostTypeController::class,'destroy'])->name('customPostType.destroy');

// Route::resource('Entity',EntityControer::class);




Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [StoreController::class, 'dashboard'])->name('dashboard');

    Route::resource('customPostType', CustomPostTypeController::class);

    Route::get('entity/{entity}/add', [EntityController::class, 'create'])->name('entity.create');
    Route::post('entity/store', [EntityController::class, 'store'])->name('entity.store');
    Route::get('entity/{id}/edit', [EntityController::class, 'edit'])->name('entity.edit');
    Route::post('entity/update', [EntityController::class, 'update'])->name('entity.update');
    Route::delete('entity/{id}/delete', [EntityController::class, 'destroy'])->name('entity.destroy');


    Route::get('{custom_post_type_slug}/index', [StoreController::class, 'index'])->name('store.index');
    Route::get('{custom_post_type_slug}/add', [StoreController::class, 'create'])->name('store.create');
    Route::post('{custom_post_type_slug}/store', [StoreController::class, 'store'])->name('store.store');
    Route::get('{custom_post_type_slug}/edit/{key}', [StoreController::class, 'edit'])->name('store.edit');
    Route::post('{custom_post_type_slug}/update/{key}', [StoreController::class, 'update'])->name('store.update');
    Route::get('{custom_post_type_slug}/delete/{key}', [StoreController::class, 'delete'])->name('store.delete');
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
});




Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_ad min');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
