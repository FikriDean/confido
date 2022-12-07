<?php

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPriceController;
use App\Http\Controllers\AdminTrackController;
use App\Http\Controllers\AdminMethodController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminAirlineController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\UserController;

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

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'can:isAdmin']);

// Route::get('/authentication', function () {
//     return view('auth.authentication');
// });

// Order Route
Route::resource('/orders', OrderController::class)->middleware(['auth']);

// User Route
Route::resource('/user', UserController::class)->middleware(['auth']);

// Print Testing Route
Route::get('/print', [PrintController::class, 'index'])->middleware(['auth']);

Route::get('/printpdf', [PrintController::class, 'print'])->middleware(['auth']);

// Order Route
Route::resource('/transactions', TransactionController::class)->middleware(['auth']);

// Ticket Route
Route::resource('/tickets', TicketController::class);

// Admin Order Route
Route::resource('/admin/orders', AdminOrderController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Transaction Route
Route::resource('/admin/transactions', AdminTransactionController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Airline Route
Route::resource('/admin/airlines', AdminAirlineController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Type Route
Route::resource('/admin/types', AdminTypeController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Track Route
Route::resource('/admin/tracks', AdminTrackController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Ticket Route
Route::resource('/admin/tickets', AdminTicketController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Price Route
Route::resource('/admin/prices', AdminPriceController::class)->middleware(['auth', 'can:isAdmin']);

// Admin Method Route
Route::resource('/admin/methods', AdminMethodController::class)->middleware(['auth', 'can:isAdmin']);

// Admin User Route
Route::resource('/admin/users', AdminUserController::class)->middleware(['auth', 'can:isAdmin']);

// Route::resource('/testings', TestingController::class)->middleware('auth');

// Route::resource('/prices', PriceController::class);

// Route::get('/checkprice', [OrderController::class, 'checkprice']);

Route::get('/admin/checkprice', [AdminOrderController::class, 'checkprice']);

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
