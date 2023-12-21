<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books=Book::get(); //select * from books
        return view("books/index" , compact('books'));
    }

    public function create(){
        return view("books/create");
    }

    public function store(Request $request){
        $book = new Book();
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.
    }

    public function edit($id){
        $book = Book::findOrFail($id); 
        return view("books.edit" , compact('book'));
    }

    public function update(Request $request,$id){
        $book = Book::findOrFail($id); 
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }

    public function delete($id){
        $book = Book::findOrFail($id)->delete(); 
        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }
}
