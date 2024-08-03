<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applied extends Model
{
    use HasFactory;



    public function employees(){
        return $this->belongsTo(employees::class);
    }

    public function ese(){
        return $this->belongsTo(ese::class);
    }


}