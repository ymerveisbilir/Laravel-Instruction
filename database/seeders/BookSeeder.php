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
        //$users = User::where('role','Admin')->get();   

        $users = User::Admin()->get(); //where('role','Admin') => koşulu UserModel'de scope olarak tanımlandı.
        foreach($users as $user){
            //Role = 'Admin' olan her kullanıcıya 5 adet kitap ekleme
            Book::factory(['user_id' => $user->id])->count(5)->create(); 
        }
    }
}

