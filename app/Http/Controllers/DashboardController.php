<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $book = DB::table('books')->count();
        return view("admin/dashboard" , compact("book"));
    }
}
