|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

    //User Auth Routes
    Route::post - '/register',
    Route::post - '/login',

    //Book Routes
    Route::get - '/books',
    Route::get - '/books:latest',
    Route::get - '/books:name',
    Route::get - '/books/{id}',

     //BookReview Routes
    Route::get - '/book-reviews',
    Route::get - '/book-reviews/user',
    Route::get - '/book-reviews/{id}',


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

    //Order Review Routes
    Route::get - '/order-reviews',
    Route::get -'/order-reviews/user',
    Route::get - '/order-reviews/{id}',

    //Order Details Routes
    Route::get - '/order-details',
    Route::get - '/order-details/{id}',

    //Order Items Routes
    Route::get - '/order-items',
    Route::get - '/order-items/{userId}/{id}',

    //Images
    Route::get - '/images',
    Route::get - '/images/query'
    Route::get - '/images/{id}',

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

     //BooksReview
    Route::post - '/book-reviews',
    Route::put - '/book-reviews/{id}',
    Route::delete - '/book-reviews/{id}',

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

     //Order Review
    Route::post - '/order-reviews',
    Route::put - '/order-reviews/{id}',
    Route::delete - '/order-reviews/{id}',

    //Order Items
    Route::post - '/order-items',
    Route::put - '/order-items/{id}',
    Route::delete - '/order-items/{id}',

    //OrderDetails
    Route::post - '/order-details',
    Route::put - '/order-details/{id}',
    Route::delete - '/order-details/{id}',

    //ImageMedia
    Route::post - '/images',
    Route::delete - '/images',

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

Queries

//for pages
page count - page_size

//for image
image type - image_type
associated id - associated_id

//image types
user_image,
book_image
