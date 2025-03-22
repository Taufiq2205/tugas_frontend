<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //menampilkan semua post
    public function index()
    {
        return response()->json(BookModel::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan post baru
     public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'status'=>'required',
        ]);

        $book = BookModel::create($validated);
        return response()->json($book. 201);
    }

    /**
     * Display the specified resource.
     */
    //Menampilkan satu book dengan 1 id
    public function show(string $id)
    {
        $book = BookModel::find($id);
        if(!$book) {
            return response()->json(['message'=>'Book not found'], 404);
        } else {
            return response()->json($book, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    //memperbarui book
    public function update(Request $request, string $id)
    {
        $book = BookModel::find($id);
        if (!$book) {
            return response()->json(['message'=> 'Book not found']);
        } else {
            $book->update($request->all());
        return response()->json($book, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $book = BookModel::find($id);
        if (!$book){
            return response()->json(['message'=>'Book not found'], 404);
        } else {
            $book->delete();
            return response()->json(['message'=> 'Book Deleted'], 200);
        }
    }
}
