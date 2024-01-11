<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request){

        $products = Book::where('id', $request->productID)->get();;
        return view("site.sepet",compact('products'));
    }
}
