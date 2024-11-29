<?php

use App\Http\Controllers\v1\OfferController;
use App\Http\Controllers\v1\SubscribeController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\ChefController;
use App\Http\Controllers\v1\RatingController;
use App\Http\Controllers\v1\RecipeCommentsController;
use App\Http\Controllers\v1\StockController;
use App\Http\Controllers\v1\MenuController;
use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|-----------------------------------------
| API Routes ----------------------------|
|-----------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'api' middleware group. Make something great!
|
*/

//? done
Route::get('/auth/user', [AuthController::class, 'user'])->name('user');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth');
Route::post('send-mail', [AuthController::class, 'sendMail'])->name('sendMail');

//? done
// Reservations Routes
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

//? done
// Stock Routes
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{id}', [StockController::class, 'show'])->name('stock.show');
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

//? done
// Recipes Routes
Route::get('/recipes', [MenuController::class, 'index'])->name('recipes.index');
Route::post('/recipes', [MenuController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{id}', [MenuController::class, 'show'])->name('recipes.show');
Route::put('/recipes/{id}', [MenuController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{id}', [MenuController::class, 'destroy'])->name('recipes.destroy');

//? done
// Recipe comments Routes
Route::get('/recipe/{id}/comments', [RecipeCommentsController::class, 'index'])->name('comments.index');
Route::post('/recipe/comments', [RecipeCommentsController::class, 'store'])->name('comments.store');
Route::put('/recipe/{id}/comments', [RecipeCommentsController::class, 'update'])->name('comments.update');
Route::delete('/recipe/{id}/comments', [RecipeCommentsController::class, 'destroy'])->name('comments.destroy');

//? done
// Offers Routes
Route::post('/offers', [OfferController::class, 'store'])->name('offers.store');
Route::get('/offers/{id}', [OfferController::class, 'show'])->name('offers.show');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('/offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');

//? done
// Chefs Routes
Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
Route::post('/chefs', [ChefController::class, 'store'])->name('chefs.store');
Route::get('/chefs/{id}', [ChefController::class, 'show'])->name('chefs.show');
Route::put('/chefs/{id}', [ChefController::class, 'update'])->name('chefs.update');
Route::delete('/chefs/{id}', [ChefController::class, 'destroy'])->name('chefs.destroy');

//? done
// Subscribe Routes
Route::get('/subscribes', [SubscribeController::class, 'index'])->name('subscribes.index');
Route::post('/subscribes', [SubscribeController::class, 'store'])->name('subscribes.store');
Route::get('/subscribes/counter', [SubscribeController::class, 'counter'])->name('subscribes.counter');
Route::get('/subscribes/{id}', [SubscribeController::class, 'show'])->name('subscribes.show');
Route::delete('/subscribes/{id}', [SubscribeController::class, 'destroy'])->name('subscribes.destroy');

// Ratings Routes
Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/ratings/{id}', [RatingController::class, 'show'])->name('ratings.show');
Route::put('/ratings/{id}', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('/ratings/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');

// Orders Routes

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::post('/orders/{id}/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


// // Reviews Routes
// Route::get('/reviews', [ReservationController::class, 'index'])->name('reviews.index');
// Route::post('/reviews', [ReservationController::class, 'store'])->name('reviews.store');
// Route::get('/dishes/{id}/reviews', [ReservationController::class, 'show'])->name('reviews.show');
// Route::put('/reviews/{id}', [ReservationController::class, 'update'])->name('reviews.update');
// Route::delete('/reviews/{id}', [ReservationController::class, 'destroy'])->name('reviews.destroy');

// // User preferences Routes
// Route::get('/client/preferences', [ReservationController::class, 'show'])->name('client.show');
// Route::post('/client/preferences', [ReservationController::class, 'update'])->name('client.update');

// // Payments Routes
// Route::post('/payments', [ReservationController::class, 'initiate'])->name('payments.initiate');
// Route::post('/payments/confirm', [ReservationController::class, 'confirm'])->name('payments.confirm');
// Route::get('/payments/status/{id}', [ReservationController::class, 'show'])->name('payments.show');