<?php

use App\Http\Controllers\auth\admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BannerController;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('auth:admin')->group(function (){
	Route::get('/', [HomeController::class, 'index'])->name('dashboard');
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

	//itemcategory
	Route::get('/itemcategory', [ItemCategoryController::class, 'index'])->name('itemcategory');
	Route::get('/itemcategory/add', [ItemCategoryController::class, 'store'])->name('itemcategory.add');
	Route::post('/itemcategory/add', [ItemCategoryController::class, 'create'])->name('itemcategory.create');
	Route::get('/itemcategory/edit/{id}', [ItemCategoryController::class, 'edit'])->name('itemcategory.edit');
	Route::post('/itemcategory/edit/{id}', [ItemCategoryController::class, 'update'])->name('itemcategory.update');
	Route::get('/itemcategory/delete/{id}', [ItemCategoryController::class, 'delete'])->name('itemcategory.delete');

	//newscategory
	Route::get('/newscategory', [NewsCategoryController::class, 'index'])->name('newscategory');
	Route::get('/newscategory/add', [NewsCategoryController::class, 'store'])->name('newscategory.add');
	Route::post('/newscategory/add', [NewsCategoryController::class, 'create'])->name('newscategory.create');
	Route::get('/newscategory/edit/{id}', [NewsCategoryController::class, 'edit'])->name('newscategory.edit');
	Route::post('/newscategory/edit/{id}', [NewsCategoryController::class, 'update'])->name('newscategory.update');
	Route::get('/newscategory/delete/{id}', [NewsCategoryController::class, 'delete'])->name('newscategory.delete');

	//news
	Route::get('/news', [NewsController::class, 'index'])->name('news');
	Route::get('/news/add', [NewsController::class, 'store'])->name('news.add');
	Route::post('/news/add', [NewsController::class, 'create'])->name('news.create');
	Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
	Route::post('/news/edit/{id}', [NewsController::class, 'update'])->name('news.update');
	Route::get('/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

	//slide
	Route::get('/slide', [SlideController::class, 'index'])->name('slide');
	Route::get('/slide/add', [SlideController::class, 'store'])->name('slide.add');
	Route::post('/slide/add', [SlideController::class, 'create'])->name('slide.create');
	Route::get('/slide/edit/{id}', [SlideController::class, 'edit'])->name('slide.edit');
	Route::post('/slide/edit/{id}', [SlideController::class, 'update'])->name('slide.update');
	Route::get('/slide/delete/{id}', [SlideController::class, 'delete'])->name('slide.delete');

	//banner
	Route::get('/banner', [BannerController::class, 'index'])->name('banner');
	Route::get('/banner/add', [BannerController::class, 'store'])->name('banner.add');
	Route::post('/banner/add', [BannerController::class, 'create'])->name('banner.create');
	Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
	Route::post('/banner/edit/{id}', [BannerController::class, 'update'])->name('banner.update');
	Route::get('/banner/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

});