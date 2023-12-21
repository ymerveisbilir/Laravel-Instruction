<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['is_deleted'];

    public function scopeNotDeleteds($query){
        return $query->where('is_deleted',0);
    }
}
