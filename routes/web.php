<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PayMomoController;
use App\Http\Controllers\auth\user\LoginController;
use App\Http\Controllers\auth\user\RegisterController;
use App\Http\Controllers\auth\user\ProfileController;
use App\Http\Controllers\auth\user\ForgotPasswordController;

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
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('front.logout');
Route::get('/doi-mat-khau', [ProfileController::class, 'changePassword'])->name('front.changepass');
Route::post('/doi-mat-khau', [ProfileController::class, 'saveChangePassword'])->name('front.savechangepass');
Route::get('/thong-tin', [ProfileController::class, 'changeProfile'])->name('front.changeprofile');
Route::post('/thong-tin', [ProfileController::class, 'saveChangeProfile'])->name('front.savechangeprofile');
Route::get('/quen-mat-khau', [ForgotPasswordController::class, 'index'])->name('front.forgotpass');
Route::post('/quen-mat-khau', [ForgotPasswordController::class, 'forgotPass'])->name('front.renewpass');
Route::get('/khoi-phuc-mat-khau/{token}', [ForgotPasswordController::class, 'restorePass'])->name('front.restorepass');
Route::post('/luu-khoi-phuc-mat-khau', [ForgotPasswordController::class, 'saveRestorePass'])->name('front.saverestorepass');

Route::post('/search/', [FrontController::class, 'search'])->name('search');

/*category*/
Route::get('/newscategory/{subject}', [NewsCategoryController::class, 'show'])->name('front.newscategory');
Route::get('/itemcategory/{subject}', [ItemCategoryController::class, 'show'])->name('front.itemscategory');
Route::get('/san-pham/', [ItemCategoryController::class, 'showAll'])->name('front.itemscategory');

/*cart*/
Route::post('/add-cart/', [CartController::class, 'saveCart'])->name('cart.add');
Route::post('/delete-cart/', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::post('/delete-cart-all/', [CartController::class, 'deleteAllCart'])->name('cart.delete.all');
Route::post('/update-cart/', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::get('/view-cart.html', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/pay-cart.html', [CartController::class, 'payCart'])->name('cart.pay');
Route::post('/order.html', [CartController::class, 'saveOrder'])->name('cart.order');
Route::post('/district', [CartController::class, 'getDistrict'])->name('cart.district');
Route::post('/ward', [CartController::class, 'getWard'])->name('cart.ward');
Route::get('/thank-you/{orderId}', [CartController::class, 'thanks'])->name('cart.thanks');
Route::get('/pay-momo', [PayMomoController::class, 'payMoMo'])->name('cart.paymomo');

/*item*/
Route::get('/news/{subject}.html', [NewsController::class, 'show'])->name('front.news');
Route::get('/items/{subject}.html', [ItemsController::class, 'show'])->name('front.items');
Route::get('/lien-he.html', [ContactController::class, 'show'])->name('front.contact');
Route::post('/lien-he.html', [ContactController::class, 'save'])->name('front.contact.save');

Route::get('/xoa', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');

	return "Cleared!";
});