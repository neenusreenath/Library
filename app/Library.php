<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    protected $table = "libraries";
    protected $fillable = ['title','author','price','image'];
}
