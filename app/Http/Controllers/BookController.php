<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        //$books=Book::where('is_deleted',0)->get(); //1.yol --> Silinmeyen verileri getirme.
        $books=Book::notDeleteds()->get(); //2.yol --> Silinmeyen verileri getirme. Modele scope olarak tanımlanmalıdır.
        return view("site/index" , compact('books'));
    }

    public function create(){
        return view("admin/create");
    }

    public function store(BookStoreRequest $request){
        $book = new Book();
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.
    }

    public function edit($id){
        $book = Book::notDeleteds()->findOrFail($id); //URL'den silinmeyen kayıtlara ulaşılıp üzerinde düzenleme yapılamamalı.
        return view("admin.edit" , compact('book'));
    }

    public function update(Request $request,$id){
        $book = Book::notDeleteds()->findOrFail($id); //URL'den silinmeyen kayıtlara ulaşılıp üzerinde düzenleme yapılamamalı.
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }

    public function delete($id){
        // $book = Book::findOrFail($id)->delete(); -> hard delete

        //1.yol -> Yapabilmek için Book modelinde protected olarak 'is_deleted sütunu tanımlanmalıdır.'
        $book = Book::findOrFail($id)->update(['is_deleted' => 1]); 

        /*2.yol
        $book = Book::findOrFail($id); 
        $book->is_deleted = 1; //soft delete işlemi.
        $book->save();
        */
        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }
}
