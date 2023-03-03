<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhonebookController;

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





// Роуты к хэдеру
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/price', [MainController::class, 'price'])->name('price');
Route::get('/faqs', [MainController::class, 'faqs'])->name('faqs');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/review', [MainController::class, 'review'])->name('review');
Route::get('/book', [PhonebookController::class, 'book'])->name('book');

// Роут на отзывы
Route::post('/review/check', [ReviewController::class, 'review_check'])->name('review_check');


// Роут на поиск
Route::get('/search', [SearchController::class, 'search'])->name('search');


// Роуты к авторизации
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Роуты к контактам
// Route::middleware(['auth'])->group(function (){
    
    Route::get('/book/create', [PhonebookController::class, 'create'])->name('phonebook.create');

    Route::post('/book', [PhonebookController::class, 'store'])->name('phonebook.store');

    Route::get('/book/edit', [PhonebookController::class, 'edit'])->name('phonebook.edit');
    
    Route::get('/book/delite', [PhonebookController::class, 'delete'])->name('phonebook.delete');
    Route::delete('/book', [PhonebookController::class, 'destroy'])->name('phonebook.destroy');
// });