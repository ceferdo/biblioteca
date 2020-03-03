<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // private $path = 'images/book';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::paginate(10);
        return view('book.index', compact('books'));
    }

    public function add()
    {
        return view('book.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if (!$validator->fails())
        {
            $books = Book::create([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);
        }
        return redirect()->route('book.index');
    }

    public function edit($id) 
    {
        $books = Book::find($id);

        if (!$books)
        {
            return redirect()->route('book.index');
        }

        return view('book.edit', compact('book'));
    }
}
