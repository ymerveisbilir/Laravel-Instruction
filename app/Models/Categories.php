<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['status' , 'id'];

    public function scopeActiveCategories($query){
        return $query->where('status',0);
    }

    public function books(){
        //Bir kategoride birden fazla kitap olabilir.
        return $this->hasMany(Book::class);
    }

    
}
