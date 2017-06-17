<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id){
        $book = Book::find($id);
        if(!empty($book))
            return response()->json($book);
        else
            return response()->json(['status'=>'fail']);
    }

    public function store(Request $request){
        $inputs = $request->all();
        $rules = [
            'title' => 'required|min:5',
            'author'=>'required|min:5',
            'isbn'=>'required'
        ];
        $validator = $this->validate($request,$rules);
        if($book = Book::create($inputs)){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }

    public function update(Request $request, $id){
        $inputs = $request->all();
        $rules = [
            'title' => 'required|min:5',
            'author'=>'required|min:5',
            'isbn'=>'required'
        ];
        $validator = $this->validate($request,$rules);
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        if($book->save()){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }

    public function delete($id){
        if(Book::find($id)->delete()){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }
}
