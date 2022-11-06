<?php

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\AdminAirlineController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTrackController;

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
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/destination', function () {
    return view('destination');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Order Route
Route::resource('/orders', OrderController::class);

// Admin Airline Route
Route::resource('/admin/airline', AdminAirlineController::class);

// Admin Type Route
Route::resource('/admin/type', AdminTypeController::class);

// Admin Track Route
Route::resource('/admin/track', AdminTrackController::class);

// Route::resource('/testings', TestingController::class)->middleware('auth');

// Route::resource('/prices', PriceController::class);

Route::get('/checkprice', [OrderController::class, 'checkprice']);

// Route::get('/posts', function () {
//     // Tag::create([
//     //     'name' => 'Laravel'
//     // ]);

//     // Tag::create([
//     //     'name' => 'Youtube'
//     // ]);

//     // Tag::create([
//     //     'name' => 'Facebook'
//     // ]);

//     // Post::create([
//     //     'title' => 'Judul Pertama'
//     // ]);

//     // Post::create([
//     //     'title' => 'Judul Kedua'
//     // ]);

//     // Post::create([
//     //     'title' => 'Judul Ketiga'
//     // ]);

//     // $tag = Tag::first();
//     // $post = Post::first();

//     // $post->tags()->attach([3]);
//     // $post->tags()->detach([1, 2, 3]);

//     // $post->tags()->detach();
//     // $post->tags()->attach([1, 2, 3]);

//     // $post->tags()->sync([1, 2]);
//     // $tag->posts()->sync([3, 4]);



//     // return view('testing.index', [
//     //     'posts' => Post::with(['tags'])->get()
//     // ]);
// });

// Route::get('/tags', function () {
//     // $tags = Tag::with('posts')->get();
//     // $tag = Tag::first();
//     // $tag->posts()->sync([1, 2]);

//     return view('testing.index2', [
//         'tags' => Tag::with(['posts'])->get()
//     ]);
// });

require __DIR__ . '/auth.php';
