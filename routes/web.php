<?php

use App\Models\AboutUs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Banner;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutUsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index', function () {
    return view('front-protect-environment.index');
});

Route::get('administrator', function () {
    return view('layouts.admin-app-master');
});

Route::get('/', [FrontPageController::class, 'index'])->name('index');
Route::get('/about', [FrontPageController::class, 'about'])->name('front-about');
Route::get('/services', [FrontPageController::class, 'services'])->name('front-services');
Route::get('/causes', [FrontPageController::class, 'causes'])->name('front-causes');
Route::get('/events', [FrontPageController::class, 'events'])->name('front-events');
Route::get('/blog', [FrontPageController::class, 'blog'])->name('front-blog');
Route::get('/gallery', [FrontPageController::class, 'gallery'])->name('front-gallery');
Route::get('/contact', [FrontPageController::class, 'contact'])->name('front-contact');
Route::get('/donation', [FrontPageController::class, 'donation'])->name('front-donation');
Route::get('/volunteers', [FrontPageController::class, 'volunteers'])->name('front-volunteers');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/banners', [BannerController::class, 'index'])->name('admin.banners');
Route::get('admin/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
Route::post('admin/banners/store', [BannerController::class, 'store'])->name('admin.banners.store');
Route::get('admin/banners/show/{id}', [BannerController::class, 'show'])->name('admin.banners.show');
Route::get('admin/banners/edit/{id}',[BannerController::class,'edit'])->name('admin.banners.edit');
Route::put('admin/banners/update/{id}',[BannerController::class,'update'])->name('admin.banners.update');
Route::delete('admin/banners/destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');


Route::get('admin/aboutus', [AboutUsController::class, 'index'])->name('admin.aboutus');
Route::get('admin/aboutus/create', [AboutUsController::class, 'create'])->name('admin.aboutus.create');
Route::post('admin/aboutus/store', [AboutUsController::class, 'store'])->name('admin.aboutus.store');
Route::get('admin/aboutus/show/{id}', [AboutUsController::class, 'show'])->name('admin.aboutus.show');
Route::get('admin/aboutus/edit/{id}',[AboutUsController::class,'edit'])->name('admin.aboutus.edit');
Route::put('admin/aboutus/update/{id}',[AboutUsController::class,'update'])->name('admin.aboutus.update');
Route::delete('admin/aboutus/destroy/{id}', [AboutUsController::class, 'destroy'])->name('admin.aboutus.destroy');












