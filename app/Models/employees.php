<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $fillable = [
        'FullName',
        'Email',
        'JobTitle',
        'Country',
        'Password',
    ];
    
    use HasFactory;


public function applied(){
    return $this->hasMany(applied::class);
}



}
