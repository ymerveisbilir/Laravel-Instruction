<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //Sadece giriş yapan admine ait eklenen kitap sayısını görmek için :
        /*
        $user=auth()->user();
        $book = $user->books()->count();
        */


        
    
        //Tüm kitapların sayısını almak için : 
        $book = DB::table('books')->count();
        return view("admin/dashboard" , compact("book"));
    }
}
