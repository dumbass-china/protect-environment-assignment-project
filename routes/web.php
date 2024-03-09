<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\WhatWeDoController;
use App\Http\Controllers\Admin\AchievementsController;
use App\Http\Controllers\Admin\RecentCausesController;

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


Route::get('admin/whatwedo', [WhatWeDoController::class, 'index'])->name('admin.whatwedo');
Route::get('admin/whatwedo/create', [WhatWeDoController::class, 'create'])->name('admin.whatwedo.create');
Route::post('admin/whatwedo/store', [WhatWeDoController::class, 'store'])->name('admin.whatwedo.store');
Route::get('admin/whatwedo/show/{id}', [WhatWeDoController::class, 'show'])->name('admin.whatwedo.show');
Route::get('admin/whatwedo/edit/{id}',[WhatWeDoController::class,'edit'])->name('admin.whatwedo.edit');
Route::put('admin/whatwedo/update/{id}',[WhatWeDoController::class,'update'])->name('admin.whatwedo.update');
Route::delete('admin/whatwedo/destroy/{id}', [WhatWeDoController::class, 'destroy'])->name('admin.whatwedo.destroy');


Route::get('admin/donation', [DonationController::class, 'index'])->name('admin.donation');
Route::get('admin/donation/create', [DonationController::class, 'create'])->name('admin.donation.create');
Route::post('admin/donation/store', [DonationController::class, 'store'])->name('admin.donation.store');
Route::get('admin/donation/show/{id}', [DonationController::class, 'show'])->name('admin.donation.show');
Route::get('admin/donation/edit/{id}',[DonationController::class,'edit'])->name('admin.donation.edit');
Route::put('admin/donation/update/{id}',[DonationController::class,'update'])->name('admin.donation.update');
Route::delete('admin/donation/destroy/{id}', [DonationController::class, 'destroy'])->name('admin.donation.destroy');

Route::get('admin/achievements', [AchievementsController::class, 'index'])->name('admin.achievements');
Route::get('admin/achievements/create', [AchievementsController::class, 'create'])->name('admin.achievements.create');
Route::post('admin/achievements/store', [AchievementsController::class, 'store'])->name('admin.achievements.store');
Route::get('admin/achievements/show/{id}', [AchievementsController::class, 'show'])->name('admin.achievements.show');
Route::get('admin/achievements/edit/{id}',[AchievementsController::class,'edit'])->name('admin.achievements.edit');
Route::put('admin/achievements/update/{id}',[AchievementsController::class,'update'])->name('admin.achievements.update');
Route::delete('admin/achievements/destroy/{id}', [AchievementsController::class, 'destroy'])->name('admin.achievements.destroy');


Route::get('admin/recentcauses', [RecentCausesController::class, 'index'])->name('admin.recentcauses');
Route::get('admin/recentcauses/create', [RecentCausesController::class, 'create'])->name('admin.recentcauses.create');
Route::post('admin/recentcauses/store', [RecentCausesController::class, 'store'])->name('admin.recentcauses.store');
Route::get('admin/recentcauses/show/{id}', [RecentCausesController::class, 'show'])->name('admin.recentcauses.show');
Route::get('admin/recentcauses/edit/{id}',[RecentCausesController::class,'edit'])->name('admin.recentcauses.edit');
Route::put('admin/recentcauses/update/{id}',[RecentCausesController::class,'update'])->name('admin.recentcauses.update');
Route::delete('admin/recentcauses/destroy/{id}', [RecentCausesController::class, 'destroy'])->name('admin.recentcauses.destroy');






