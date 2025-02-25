<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['title', 'body', 'user_id'];

public function user(){
    return $this->belongsto(user::class, 'user_id');
}

}
