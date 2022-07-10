<?php

use App\Http\Controllers\auth\admin\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FanpageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('auth:admin')->group(function (){
	Route::get('/', [HomeController::class, 'index'])->name('dashboard');
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

	//config
	Route::get('/config/edit', [ConfigController::class, 'edit'])->name('config.edit');
	Route::post('/config/edit', [ConfigController::class, 'update'])->name('config.update');

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

	//video
	Route::get('/video', [VideoController::class, 'index'])->name('video');
	Route::get('/video/add', [VideoController::class, 'store'])->name('video.add');
	Route::post('/video/add', [VideoController::class, 'create'])->name('video.create');
	Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
	Route::post('/video/edit/{id}', [VideoController::class, 'update'])->name('video.update');
	Route::get('/video/delete/{id}', [VideoController::class, 'delete'])->name('video.delete');

	//map
	Route::get('/map', [MapController::class, 'index'])->name('map');
	Route::get('/map/add', [MapController::class, 'store'])->name('map.add');
	Route::post('/map/add', [MapController::class, 'create'])->name('map.create');
	Route::get('/map/edit/{id}', [MapController::class, 'edit'])->name('map.edit');
	Route::post('/map/edit/{id}', [MapController::class, 'update'])->name('map.update');
	Route::get('/map/delete/{id}', [MapController::class, 'delete'])->name('map.delete');

	//fanpage
	Route::get('/fanpage', [FanpageController::class, 'index'])->name('fanpage');
	Route::get('/fanpage/add', [FanpageController::class, 'store'])->name('fanpage.add');
	Route::post('/fanpage/add', [FanpageController::class, 'create'])->name('fanpage.create');
	Route::get('/fanpage/edit/{id}', [FanpageController::class, 'edit'])->name('fanpage.edit');
	Route::post('/fanpage/edit/{id}', [FanpageController::class, 'update'])->name('fanpage.update');
	Route::get('/fanpage/delete/{id}', [FanpageController::class, 'delete'])->name('fanpage.delete');

	//social
	Route::get('/social', [SocialController::class, 'index'])->name('social');
	Route::get('/social/add', [SocialController::class, 'store'])->name('social.add');
	Route::post('/social/add', [SocialController::class, 'create'])->name('social.create');
	Route::get('/social/edit/{id}', [SocialController::class, 'edit'])->name('social.edit');
	Route::post('/social/edit/{id}', [SocialController::class, 'update'])->name('social.update');
	Route::get('/social/delete/{id}', [SocialController::class, 'delete'])->name('social.delete');

	//language
	Route::get('/language', [LanguageController::class, 'index'])->name('language');
	Route::get('/language/add', [LanguageController::class, 'store'])->name('language.add');
	Route::post('/language/add', [LanguageController::class, 'create'])->name('language.create');
	Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
	Route::post('/language/edit/{id}', [LanguageController::class, 'update'])->name('language.update');
	Route::get('/language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');

	//Menu
	Route::get('/manage-menus/{id?}',[MenuController::class,'index'])->name('menu');
	Route::post('create-menu',[MenuController::class,'store'])->name('menu.create');
	Route::get('add-categories-to-menu',[MenuController::class,'addCatToMenu']);
	Route::get('add-post-to-menu',[MenuController::class,'addPostToMenu']);
	Route::get('add-custom-link',[MenuController::class,'addCustomLink']);

});