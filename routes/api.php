<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderReviewController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImageMediaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([], function() {
    //User Auth Routes
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    //Book Routes
    Route::get('/books', [BooksController::class, 'index']);
    Route::get('/books:latest', [BooksController::class, 'latest']);
    Route::get('/books:name', [BooksController::class, 'name']);
    Route::get('/books/{id}', [BooksController::class, 'show']);

    //BookReview Routes
    Route::get('/book-reviews', [BookReviewController::class, 'index']);
    Route::get('/book-reviews/user', [BookReviewController::class, 'perUser']);
    Route::get('/book-reviews/{id}', [BookReviewController::class, 'singleReview']);


    //Author Routes
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors:name', [AuthorController::class, 'name']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);

    //Genre Routes
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres:name', [GenreController::class, 'name']);
    Route::get('/genres/{id}', [GenreController::class, 'show']);

    //Order Routes
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders:user-id', [OrderController::class, 'userId']);
    Route::get('/orders/{userId}', [OrderController::class, 'perUser']);
    Route::get('/orders/{userId}/{id}', [OrderController::class, 'show']);

    //OrderReview Routes
    Route::get('/order-reviews', [OrderReviewController::class, 'index']);
    Route::get('/order-reviews/user', [OrderReviewController::class, 'perUser']);
    Route::get('/order-reviews/{id}', [OrderReviewController::class, 'singleReview']);

    //Order Details Routes
    Route::get('/order-details', [OrderDetailsController::class, 'index']);
    Route::get('/order-details/{id}', [OrderDetailsController::class, 'singleItem']);

    //Order Items Routes
    Route::get('/order-items', [OrderItemController::class, 'index']);
    Route::get('/order-items/{userId}/{id}', [OrderItemController::class, 'singleItem']);

    //Image Media
    Route::get('/images',[ImageMediaController::class, 'index']);
    Route::get('/image',[ImageMediaController::class, 'show']);

//Routes to be put to authentication

});

 // Protected Resource Routes requires bearer token
 Route::group(['middleware' => ['auth:sanctum']], function() {

     //Authenticated User
    Route::post('/logout', [AuthController::class, 'logout']);

    //User
    Route::get('/user', [UserController::class, 'viewUser']);
    Route::get('/users', [UserController::class, 'allUsers']);

    //Books
    Route::post('/books', [BooksController::class, 'store']);
    Route::put('/books/{id}', [BooksController::class, 'update']);
    Route::delete('/books/{id}', [BooksController::class, 'destroy']);

    //BooksReview
    Route::post('/book-reviews', [BooksController::class, 'store']);
    Route::put('/book-reviews/{id}', [BooksController::class, 'update']);
    Route::delete('/book-reviews/{id}', [BooksController::class, 'destroy']);

    //Author
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

    //Genre
    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);

    //Order
    Route::post('/orders', [GenreController::class, 'store']);
    Route::put('/orders/{id}', [GenreController::class, 'update']);
    Route::delete('/orders/{id}', [GenreController::class, 'destroy']);

    //OrderReviews
    Route::post('/order-reviews', [BooksController::class, 'store']);
    Route::put('/order-reviews/{id}', [BooksController::class, 'update']);
    Route::delete('/order-reviews/{id}', [BooksController::class, 'destroy']);

    //Order Items
    Route::post('/order-items', [GenreController::class, 'store']);
    Route::put('/order-items/{id}', [GenreController::class, 'update']);
    Route::delete('/order-items/{id}', [GenreController::class, 'destroy']);

    //OrderDetails
    Route::post('/order-details', [OrderDetailsController::class, 'store']);
    Route::put('/order-details/{id}', [OrderDetailsController::class, 'update']);
    Route::delete('/order-details/{id}', [OrderDetailsController::class, 'destroy']);

    //ImageMedia
    Route::post('/image',[ImageMediaController::class, 'create']);
    Route::delete('/image',[ImageMediaController::class, 'destroy']);

 });
