<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SubscribeController;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------
| Web Routes
|--------------
*/

Route::get('/', function () {
  $podcasts = Podcast::latest()->paginate(16);
  return view('welcome', compact('podcasts'));
})->name('home');

Auth::routes(['register' => false]);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(PodcastController::class)->middleware('auth')->group(function () {
  Route::get('_new/episode', 'create')->name('create.episode');
  Route::post('_store/episode', 'store')->name('store.episode');

  Route::get('_edit/{slug}', 'edit')->name('episode.edit');
  Route::post('_update/episode', 'update')->name('episode.update');

  Route::get('episode/{slug}', 'index')->name('episode');
  Route::post('_delete/episode', 'delete')->name('delete.episode');
});

Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe');
Route::get('onichapodcastrss', FeedController::class);
