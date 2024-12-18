<?php

use App\Http\Controllers\v1\ArticleCommentController;
use App\Http\Controllers\v1\ArticleController;
use App\Http\Controllers\v1\ArticleLikeController;
use App\Http\Controllers\v1\OfferController;
use App\Http\Controllers\v1\SubscribeController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\CartController;
use App\Http\Controllers\v1\ChefController;
use App\Http\Controllers\v1\RatingController;
use App\Http\Controllers\v1\StockController;
use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\RecipeController;
use App\Http\Controllers\v1\RecipeCommentsController;
use App\Http\Controllers\v1\ReservationController;
use App\Http\Controllers\v1\TableController;
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
Route::post('auth/login', [AuthController::class, 'login'])->name('auth');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth');
Route::get('auth/client', [AuthController::class, 'client'])->name('client');
Route::post('send-mail', [AuthController::class, 'sendMail'])->name('sendMail');
Route::post('pusher/auth', [AuthController::class, 'pusher'])->name('pusher.auth');





//? done
// Reservations Routes
Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('reservations/{client_id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::put('reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

//? done
// Stock Routes
Route::get('stock', [StockController::class, 'index'])->name('stock.index');
Route::post('stock', [StockController::class, 'store'])->name('stock.store');
Route::get('stock/{id}', [StockController::class, 'show'])->name('stock.show');
Route::put('stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

//? done
// Recipes Routes
Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::put('recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

// Recipes Comments
Route::get('recipe_comments/{recipe_id}', [RecipeCommentsController::class, 'index'])->name('recipe_comments.get');
Route::get('recipe_comments/client/{client_id}', [RecipeCommentsController::class, 'show'])->name('recipe_comments.show');
Route::post('recipe_comments', [RecipeCommentsController::class, 'store'])->name('recipe_comments.store');
Route::put('recipe_comments/{id}', [RecipeCommentsController::class, 'update'])->name('recipe_comments.update');
Route::delete('recipe_comments/{id}', [RecipeCommentsController::class, 'destroy'])->name('recipe_comments.delete');

//? done
// Recipe comments Routes
// Route::get('recipe/{client_id}/comments', [RecipeCommentsController::class, 'index'])->name('comments.index');
// Route::get('recipe/{id}/comments', [RecipeCommentsController::class, 'index'])->name('comments.index');
// Route::post('recipe/comments', [RecipeCommentsController::class, 'store'])->name('comments.store');
// Route::put('recipe/{id}/comments', [RecipeCommentsController::class, 'update'])->name('comments.update');
// Route::delete('recipe/{id}/comments', [RecipeCommentsController::class, 'destroy'])->name('comments.destroy');

//? done
// Offers Routes
Route::post('offers', [OfferController::class, 'store'])->name('offers.store');
Route::get('offers/{id}', [OfferController::class, 'show'])->name('offers.show');
Route::put('offers/{id}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');

//? done
// Chefs Routes
Route::get('chefs', [ChefController::class, 'index'])->name('chefs.index');
Route::post('chefs', [ChefController::class, 'store'])->name('chefs.store');
Route::get('chefs/{id}', [ChefController::class, 'show'])->name('chefs.show');
Route::put('chefs/{id}', [ChefController::class, 'update'])->name('chefs.update');
Route::delete('chefs/{id}', [ChefController::class, 'destroy'])->name('chefs.destroy');

//? done
// Subscribe Routes
Route::get('subscribes', [SubscribeController::class, 'index'])->name('subscribes.index');
Route::post('subscribes', [SubscribeController::class, 'store'])->name('subscribes.store');
Route::get('subscribes/counter', [SubscribeController::class, 'counter'])->name('subscribes.counter');
Route::get('subscribes/{email}', [SubscribeController::class, 'show'])->name('subscribes.show');
Route::delete('subscribes/{email}', [SubscribeController::class, 'destroy'])->name('subscribes.destroy');

//? done
// Ratings Routes
Route::get('ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::post('ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('ratings/{id}', [RatingController::class, 'show'])->name('ratings.show');
Route::put('ratings/{id}', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('ratings/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');

//? done
// Tables Routes
Route::get('tables', [TableController::class, 'index'])->name('tables.index');
Route::post('tables', [TableController::class, 'store'])->name('tables.store');
Route::get('tables/{id}', [TableController::class, 'show'])->name('tables.show');
Route::put('tables/{id}', [TableController::class, 'update'])->name('tables.update');
// Route::delete('tables/{id}', [TableController::class, 'destroy'])->name('tables.destroy');

//? done
// Orders Routes
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{client_id}', [OrderController::class, 'show'])->name('orders.show');
Route::put('orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::post('orders/{id}/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

// Cart Routes
Route::get('cart/{client_id}', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/{orderid}/{code}', [CartController::class, 'show'])->name('cart.show');
Route::put('cart/{orderid}/{code}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{orderid}/{code}', [CartController::class, 'destroy'])->name('cart.destroy');

//? done
// Articles Routes
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

//? done
// Article Comments
Route::get('article_comments/{article_id}', [ArticleCommentController::class, 'index'])->name('article_comments.get');
Route::get('article_comments/client/{client_id}', [ArticleCommentController::class, 'show'])->name('article_comments.show');
Route::post('article_comments', [ArticleCommentController::class, 'store'])->name('article_comments.store');
Route::put('article_comments/{article_id}', [ArticleCommentController::class, 'update'])->name('article_comments.update');
Route::delete('article_comments/{id}', [ArticleCommentController::class, 'destroy'])->name('article_comments.delete');

//? done
// Article Like
Route::post('article_likes', [ArticleLikeController::class, 'store'])->name('article_likes.store');
Route::get('article_likes/{article_id}', [ArticleLikeController::class, 'show'])->name('article_likes.show',);
Route::delete('article_likes/{article_id}/{client_id}', [ArticleLikeController::class, 'destroy'])->name('article_likes.delete');


// // Reviews Routes
// Route::get('reviews', [ReservationController::class, 'index'])->name('reviews.index');
// Route::post('reviews', [ReservationController::class, 'store'])->name('reviews.store');
// Route::get('dishes/{id}/reviews', [ReservationController::class, 'show'])->name('reviews.show');
// Route::put('reviews/{id}', [ReservationController::class, 'update'])->name('reviews.update');
// Route::delete('reviews/{id}', [ReservationController::class, 'destroy'])->name('reviews.destroy');

// // User preferences Routes
// Route::get('client/preferences', [ReservationController::class, 'show'])->name('client.show');
// Route::post('client/preferences', [ReservationController::class, 'update'])->name('client.update');

// // Payments Routes
// Route::post('payments', [ReservationController::class, 'initiate'])->name('payments.initiate');
// Route::post('payments/confirm', [ReservationController::class, 'confirm'])->name('payments.confirm');
// Route::get('payments/status/{id}', [ReservationController::class, 'show'])->name('payments.show');