<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    public function index(){
        //Giriş yapan kullanıcıya ait sepet bilgileri görüntülenmelidir.
        $user = Auth::user();
        $count = DB::table('carts')->where('user_id',$user->id)->count(); 
        $products = Carts::where('user_id',$user->id)->get();
        $totalPrice = Carts::where('user_id', $user->id)->sum('price');
        return view("site.sepet",compact('products','count' ,'totalPrice'));
    }
    public function createCart(Request $request){
        //sepete ekle butonuna tıklandığında ürünler carts tablosuna kaydedilmeli.
        $carts = new Carts();
        $carts->orderID = 5;
        $carts->user_id = $request->user_id;
        $carts->productID = $request->productID;
        $carts->category_id = $request->category_id;
        $carts->product_name = $request->product_name;
        $carts->price = $request->price;
        $carts->save();

        return redirect()->back(); 

    }

    public function deleteProduct($product_id){
        $product = Carts::findOrFail($product_id)->delete();
        return redirect()->back(); 

    }
}
