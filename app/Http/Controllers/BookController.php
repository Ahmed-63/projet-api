<?php

namespace App\Http\Controllers;

use App\Http\Resources\Book as ResourcesBook;
use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();

        return ResourcesBook::collection(book::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (book::create($request->all())){
            return response()->json([
                'success' => 'livre ajouter'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        return new ResourcesBook($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        ;

        if ($book->update($request->all())){
            return response()->json([
                'success' => 'livre modifier'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        $book->delete();
    }
}
