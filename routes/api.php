<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\UserController;

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
    Route::get('/books:bylatest', [BooksController::class, 'latest']);
    Route::get('/books:byname', [BooksController::class, 'name']);
    Route::get('/book/{id}', [BooksController::class, 'show']);

    //Author Routes
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors:byname', [AuthorController::class, 'name']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);

    //Genre Routes
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres:byname', [GenreController::class, 'name']);
    Route::get('/genres/{id}', [GenreController::class, 'show']);

    //Order Routes
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order:byuserId', [OrderController::class, 'userId']);
    Route::get('/order/{userId}', [OrderController::class, 'perUser']);
    Route::get('/order/{userId}/{id}', [OrderController::class, 'show']);

    //Order Items Routes
    Route::get('/order-items', [OrderItemController::class, 'index']);
    Route::get('/order-items/{userId}/{id}', [OrderItemController::class, 'singleItem']);


//Routes to be put to authentication

});

 // Protected Resource Routes requires bearer token
 Route::group(['middleware' => ['auth:sanctum']], function() {

     //Authenticated User
    Route::post('/logout', [AuthController::class, 'logout']);

    //User
    Route::get('/user', [UserController::class, 'viewUser']);

    //Books
    Route::post('/books', [BooksController::class, 'store']);
    Route::put('/books/{id}', [BooksController::class, 'update']);
    Route::delete('/books/{id}', [BooksController::class, 'destroy']);

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

 });
