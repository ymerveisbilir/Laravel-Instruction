<?php

namespace Database\Seeders;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books=Book::factory()->count(10);
        User::factory()->has($books)->count(10)->create();
    }
}

