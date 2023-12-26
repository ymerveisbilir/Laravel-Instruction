<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['is_deleted' , 'user_id'];

    public function scopeNotDeleteds($query){
        return $query->where('is_deleted',0);
    }

    public function user(){
        //Kitabı ekleyen bir kullanıcı olabilir.
        return $this->belongsTo(User::class);
    }
}
