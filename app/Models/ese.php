<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ese extends Model
{
    use HasFactory;



public function Posts(){
    return $this->hasMany(Posts::class);
}

public function applied(){
    return $this->hasMany(applied::class);
}




}
