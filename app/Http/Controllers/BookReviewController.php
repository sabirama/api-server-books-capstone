<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReview;

class BookReviewController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        $bookReviews = BookReview::query()->paginate($pageSize);

        return response([
            'books_reviews' =>  $bookReviews,
        ],201);

    }

    public function perUser(Request $request) {
        $pageSize = $request->page_size ?? 200;
        $userId = $request->user_id ?? "";
        $bookReviews = BookReview::whereIn('user_id',[$userId])->paginate($pageSize);

        return response([
            'book_reviews' => $bookReviews,
        ],201);
    }

    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 200;
        $bookReviews = BookReview::orderBy('created_at', 'desc')->paginate($pageSize);
        return response([
            'books_reviews' =>  $bookReviews,
        ],201);
    }

    //display by name
    public function singleReview($id)
    {
        $bookReviews =  BookReview::find($id);
        return response([
            'books_reviews' =>  $bookReviews,
        ],201);
    }

    //individual book
    public function show(Request $request, $userId)
    {
        $bookReviews = BookReview::wherIn('user_id',$userId);
        return response([
            'books_reviews' =>  $bookReviews,
        ],201);

    }

    //add new book
    public function store(Request $request)
    {   $bookReviews = BookReview::create($request->all());

        return response([
            'books_reviews'=>$bookReviews,
            'message'=>'book review added to database'
        ]);
    }

    //update
    public function update(Request $request, $id)
    {
        $bookReviews = BookReview::find($id);
        $bookReviews->update($request->all());
    }

    //delete
    public function destroy($id)
    {

        $bookReviews = BookReview::find($id);
        $bookReviews->delete();

        return [$bookReviews, 'file removed'];

    }
}
