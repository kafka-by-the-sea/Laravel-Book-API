<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use Validator;

class BookController extends Controller
{
    public function index(){
        return Book::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:100',
            'book_description' => 'required|max:2000',
            'book_author' => 'required|max:100',
            'isbn' => 'required|max:13'
        ]);
        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        } else {
            Book::create($request->all());
            return [
                'code' => 0,
                "message" => "The book has been created"
            ];
        }
    }

    public function update(Request $request, $id){

        Book::where('book_id', $id)->update($request->all());
        $message = [
            'code' => 1,
            "message" => "The book has been updated"
        ];
        return response()->json($message, 200);
    }

    public function show($id){
        $book = Book::where('book_id', $id)->first();
        if($book == null)
            abort(404);
        return $book;
    }

    public function delete($id){
        Book::where('book_id', $id)->delete();
        return response()->json(null, 204);
    }
}
