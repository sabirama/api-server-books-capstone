<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\BookReview;
use App\Http\Resources\BookReviewResource;


class BookReviewController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $bookReviews = BookReview::query()->paginate($pageSize);

        return [
            'books_reviews' => BookReviewResource::collection($bookReviews),
        ];

    }

    public function perUser(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $userId = $request->user_id ?? "";
        $bookReviews = BookReview::whereIn('user_id',[$userId])->paginate($pageSize);

        return [
            'book_reviews' => BookReviewResource::collection($bookReviews),
        ];
    }

    public function perBook(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $bookId = $request->book_id ?? "";
        $bookReviews = BookReview::whereIn('book_id',[$bookId])->paginate($pageSize);

        return [
            'book_reviews' => BookReviewResource::collection($bookReviews),
        ];
    }

    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 100;
        $bookReviews = BookReview::orderBy('created_at', 'desc')->paginate($pageSize);
        return [
            'books_reviews' => BookReviewResource::collection($bookReviews),
        ];
    }

    //individual book
    public function singleReview($id)
    {
        $bookReview =  BookReview::find($id);
        return [
            'books_reviews' =>  new BookReviewResource($bookReview),
        ];
    }

    //display by user
    public function show(Request $request, $userId)
    {
        $bookReviews = BookReview::wherIn('user_id',$userId);
        return [
            'books_reviews' =>  $bookReviews,
        ];

    }

    //add new book review
    public function store(Request $request)
    {   $bookReviews = BookReview::create($request->all());

        return [
            'books_reviews'=>$bookReviews,
            'message'=>'book review added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $bookReviews = BookReview::find($id);
        $bookReviews->update($request->all());

        return [$bookReviews, "message" => "book reviews updated"];
    }

    //delete
    public function destroy($id)
    {

        $bookReviews = BookReview::find($id);
        $bookReviews->delete();

        return [$bookReviews, 'file removed'];

    }
}
