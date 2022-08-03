<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\auth\user\LoginController;

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
Route::get('/', [FrontController::class, 'home'])->name('home');

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::get('/newscategory/{subject}', [NewsCategoryController::class, 'show'])->name('front.newscategory');
Route::get('/itemcategory/{subject}', [ItemCategoryController::class, 'show'])->name('front.itemscategory');

Route::get('/news/{subject}.html', [NewsController::class, 'show'])->name('front.news');
Route::get('/items/{subject}.html', [ItemsController::class, 'show'])->name('front.items');

Route::get('/xoa', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');

	return "Cleared!";
});