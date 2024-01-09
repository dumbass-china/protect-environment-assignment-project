<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;

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

Route::get('index',function(){
    return view('front-protect-environment.index');
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
