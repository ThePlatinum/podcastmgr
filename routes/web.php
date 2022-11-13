<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SubscribeController;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
  $podcasts = Podcast::latest()->paginate(8);
  return view('welcome', compact('podcasts'));
})->name('home');

Auth::routes(['register' => false]);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(PodcastController::class)->middleware('auth')->group(function () {
  Route::get('/_new/episode', 'create')->name('create.episode');
  Route::post('/_store/episode', 'store')->name('store.episode');
});

Route::get('/episode/{slug}', [PodcastController::class, 'index'])->name('episode');
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');

Route::get('/onichapodcastrss', FeedController::class);
