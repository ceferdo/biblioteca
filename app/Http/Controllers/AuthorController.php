<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

use Validator;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $authors = Author::paginate(15);
        return view('author.index', compact('authors'));
    }

    public function add() 
    {
        return view('author.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
        ]);

        if (!$validator->fails())
        {
            $authors = Author::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname')
            ]);
        }
        return redirect()->route('author.index');
    }

    public function edit($id) 
    {
        $authors = Author::find($id);

        if (!$authors)
        {
            return redirect()->route('author.index');
        }

        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id) {
        Author::find($id)->update($request->all());
        return redirect()->route('author.index');
    }

    public function delete($id) {
        Author::find($id)->delete();
        return redirect()->route('author.index');
    }
    

    public function search(Request $request) {
        $name = $request->input('name');
        $search = true;
        if ($name)
        {
            $authors = Author::where('name', 'like', '%'. $name . '%' )->get();
        }
        return view('author.index', compact('authors', 'search'));

    }
}
