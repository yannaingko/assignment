<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddItemComponent;
use App\Http\Livewire\Admin\CategoryListComponent;
use App\Http\Livewire\Admin\DashboardCompoent;
use App\Http\Livewire\Admin\ItemListComponent;
use App\Http\Livewire\Admin\UpdateCategoryComponent;
use App\Http\Livewire\Admin\UpdateItemComponent;
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


Route::get('/admin/logout',[HomeController::class,'loggout'])->name('loggout');


// main page
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/item/category/{id}',[HomeController::class,'category']);
Route::get('/item/search',[HomeController::class,'search'])->name('item.search');
Route::get('/item/filter',[HomeController::class,'filterItems'])->name('item.filter');
Route::get('/item/detail/{id}',[HomeController::class,'detail']);
Route::get('/filter/clear',[HomeController::class,'clearFilter'])->name('filter.clear');


Route::middleware('auth')->group(function () {
    // admin 
    Route::get('/items-list',ItemListComponent::class)->name('admin.item');
    Route::get('/items-list/add-items',AddItemComponent::class)->name('item.add');
    Route::get('/items-list/update/{id}',UpdateItemComponent::class)->name('item.update');
    Route::post('/items-list/update/{id}',[UpdateItemComponent::class,'update'])->name('item.update');
    Route::post('/items-list/save',[AddItemComponent::class,'save'])->name('item.save');

    Route::get('/categories-list',CategoryListComponent::class)->name('admin.category');
    Route::get('/categories-list/add-categories',AddCategoryComponent::class)->name('category.add');
    Route::get('/categories-list/update/{id}',UpdateCategoryComponent::class)->name('category.update');
    Route::post('/categories-list/update/{id}',[UpdateCategoryComponent::class,'update'])->name('category.update');
    Route::post('/categories-list/save',[AddCategoryComponent::class,'save'])->name('category.save');

});

require __DIR__.'/auth.php';
