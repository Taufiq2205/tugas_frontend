<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = BookModel::all();
        return view('data',compact("books"));
    }
}
