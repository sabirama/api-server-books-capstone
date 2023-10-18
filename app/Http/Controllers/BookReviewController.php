<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReview;

class BookReviewController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $bookReviews = BookReview::query()->paginate($pageSize);

        return [
            'books_reviews' =>  $bookReviews,
        ];

    }

    public function perUser(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $userId = $request->user_id ?? "";
        $bookReviews = BookReview::whereIn('user_id',[$userId])->paginate($pageSize);

        return [
            'book_reviews' => $bookReviews,
        ];
    }

    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 100;
        $bookReviews = BookReview::orderBy('created_at', 'desc')->paginate($pageSize);
        return [
            'books_reviews' =>  $bookReviews,
        ];
    }

    //individual book
    public function singleReview($id)
    {
        $bookReviews =  BookReview::find($id);
        return [
            'books_reviews' =>  $bookReviews,
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
    }

    //delete
    public function destroy($id)
    {

        $bookReviews = BookReview::find($id);
        $bookReviews->delete();

        return [$bookReviews, 'file removed'];

    }
}
