<?php


use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ChanalController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TagController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomePageController::class, 'show'])->name('home');
Route::get('/chanals', [ChanalController::class, 'show']);
Route::get('/courses', [CourseController::class, 'show']);
Route::get('/chanal/create', [ChanalController::class, 'create']);
Route::post('/chanal/create', [ChanalController::class, 'store']);
Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/course/create', [CourseController::class, 'store']);
Route::get('/tag/create', [TagController::class, 'create']);
Route::post('/tag/create', [TagController::class, 'store']);
Route::get('/chanals/{id}', [ChanalController::class, 'detail'])->name('detail');
Route::get('/chanal/{id}/edit', [ChanalController::class, 'edit']);
Route::put('/chanal/{id}', [ChanalController::class, 'update']);
Route::get('/course/{id}/edit', [CourseController::class, 'edit']);
Route::put('/course/{id}', [CourseController::class, 'update']);
Route::get('/tag/{id}/edit', [TagController::class, 'edit']);
Route::put('/tag/{id}', [TagController::class, 'update']);
Route::get('/deleteChanal/{id}', [ChanalController::class, 'delete']);
Route::get('/deleteCourse/{id}', [CourseController::class, 'delete']);
Route::get('/deleteTag/{id}', [TagController::class, 'delete']);






Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');