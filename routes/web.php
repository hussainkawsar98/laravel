<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
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

//___Admin Route List__//
//__Category Route__//
Route::resource('/admin/category', CategoryController::class);

//__Users Route__//
Route::resource('/admin/user', UserController::class);

//Posts Route__//
Route::resource('/admin/posts', PostController::class);


//__Subcategory group__//
Route::group(['prefix'=>'admin'], function(){
    Route::get('/sub-category', [SubcategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/sub-category/create', [SubcategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/sub-category/store', [SubcategoryController::class, 'store'])->name('sub-category.store');
    Route::delete('/sub-category/delete/{id}', [SubcategoryController::class, 'destroy'])->name('sub-category.destroy');
    Route::put('/sub-category/update/{id}', [SubcategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/{id}/edit', [SubcategoryController::class, 'edit'])->name('sub-category.edit');
});


Route::get('/admin', function(){
    return view('/admin/index');
});

//__Admin Global Controller___//
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [GlobalController::class, 'index'])->name('admin.index');
});