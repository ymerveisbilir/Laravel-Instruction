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
        $user = Auth::user();
        $count = DB::table('carts')->where('user_id',$user->id)->where('productID',$request->productID)->count('productID'); 

        //sepete ekle butonuna tıklandığında ürünler carts tablosuna kaydedilmeli.
        if($count == 0){
            $carts = new Carts();
            $carts->orderID = 5;
            $carts->user_id = $request->user_id;
            $carts->productID = $request->productID;
            $carts->category_id = $request->category_id;
            $carts->product_name = $request->product_name;
            $carts->quantity = 1; //ürün ilk eklenirken quantity = 1
            $carts->price = $request->price;
            $carts->save();
        }else{
            //sepette aynı üründen var ise quantity değerini 1 arttırsın.
            DB::table('carts')
            ->where('user_id', $request->user_id)
            ->where('productID', $request->productID)
            ->increment('quantity', 1); //increment : arttırma
        }


        return redirect()->back(); 

    }

    public function deleteProduct(Carts $product){
        $user = Auth::user();

        $quantity = DB::table('carts')
        ->where('user_id', $user->id)
        ->where('id', $product->id)
        ->first();

        if($quantity->quantity == 1 OR $quantity->quantity == 0){
          $cart = Carts::findOrFail($product->id)->delete(); 
        }else{
         //Adet değeri azaltıldı.
         $cart = Carts::where('id', $product->id)->first();
         if ($cart) {
             $cart->decrement('quantity', 1);  //decrement : azaltma
         }
        }
        return redirect()->back(); 

    }
}
