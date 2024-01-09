<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /* Home sayfası için oturum açılmasına gerek yoktur.
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        /*
        /home sayfası için __construct fonk. oturum kontrolü var.
        */
        $user = Auth::user(); //User'a ait tüm bilgileri çeker. $user->name olarak kullanılabilir.
        $books= $user->books()->notDeleteds()->get(); //2.yol --> Silinmeyen verileri getirme. Modele scope olarak tanımlanmalıdır.
        $categories = Categories::activeCategories()->get();
        return view('home' , compact('user','books','categories'));
    }
}
