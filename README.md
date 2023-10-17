/_
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
_/

    //User Auth Routes
    Route::post - '/register',
    Route::post - '/login',

    //Book Routes
    Route::get - '/books',
    Route::get - '/books:latest',
    Route::get - '/books:name',
    Route::get - '/books/{id}',

    //Author Routes
    Route::get - '/authors',
    Route::get - '/authors:name',
    Route::get - '/authors/{id}',

    //Genre Routes
    Route::get - '/genres',
    Route::get - '/genres:name',
    Route::get - '/genres/{id}',

    //Order Routes
    Route::get - '/orders',
    Route::get - '/orders:user-id',
    Route::get - '/orders/{userId}',
    Route::get - '/orders/{userId}/{id}',

    //Order Details Routes
    Route::get - '/order-details',
    Route::get - '/order-details/{id}',

    //Order Items Routes
    Route::get - '/order-items',
    Route::get - '/order-items/{userId}/{id}',

    //Image Media
    Route::get - '/images',
    Route::get - '/image',

---

// Protected Resource Routes requires bearer token
//Authenticated User

    Route::post - '/logout',

    //User
    Route::get - '/user',

    //Books
    Route::post - '/books',
    Route::put - '/books/{id}',
    Route::delete - '/books/{id}',

    //Author
    Route::post - '/authors',
    Route::put - '/authors/{id}',
    Route::delete - '/authors/{id}',

    //Genre
    Route::post - '/genres',
    Route::put - '/genres/{id}',
    Route::delete - '/genres/{id}',

    //Order
    Route::post - '/orders',
    Route::put - '/orders/{id}',
    Route::delete - '/orders/{id}',

    //Order Items
    Route::post - '/order-items',
    Route::put - '/order-items/{id}',
    Route::delete - '/order-items/{id}',

    //OrderDetails
    Route::post - '/order-details',
    Route::put - '/order-details/{id}',
    Route::delete - '/order-details/{id}',

    //ImageMedia
    Route::post - '/image',
    Route::delete - '/image',

/_
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
_/
