<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;

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

Route::get('/home', function(){
    return "Home Page";
});
Route::get('/about', function(){
    return "About Page";
});

//__Backend Route List__//

//__Category Route__//
Route::resource('/backend/category', CategoryController::class);

//__Subcategory group__//
Route::group(['prefix'=>'backend'], function(){
    Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::get('/subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/{id}/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
});