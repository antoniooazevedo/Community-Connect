<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Home

Route::redirect('/', '/login');

// Route::get('/login', function () {
//      return view('auth.login');
//});

//* We can use view for static pages, and get if they require parameters
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::get('/questions', [QuestionController::class, 'showMostLikedQuestions'])->name('questions');
Route::get('/questions/{id}', [QuestionController::class, 'show']);
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit']);
Route::post('/questions/{id}', [QuestionController::class, 'update']);
Route::post('/questions/{id}/delete', [QuestionController::class, 'destroy']);

// Cards
Route::controller(CardController::class)->group(function () {
    Route::get('/cards', 'list')->name('cards');
    Route::get('/cards/{id}', 'show');
});


// API
Route::controller(CardController::class)->group(function () {
    Route::put('/api/cards', 'create');
    Route::delete('/api/cards/{card_id}', 'delete');
});

Route::controller(ItemController::class)->group(function () {
    Route::put('/api/cards/{card_id}', 'create');
    Route::post('/api/item/{id}', 'update');
    Route::delete('/api/item/{id}', 'delete');
});


// Authentication
// Route::controller(LoginController::class)->group(function () {
//     Route::get('/login', 'showLoginForm')->name('login');
//     Route::post('/login', 'authenticate');
//    Route::get('/logout', 'logout')->name('logout');
// });

Route::controller(RegisterController::class)->group(function () {
    // Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});