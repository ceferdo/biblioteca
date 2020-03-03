<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use SoftDeletes;
    protected $fillable = ['title', 'image'];

     protected $dates = ['deleted_at'];

    public function books(){
    	return $this->belongsToMany('App\Models\Book', 'books_authors');
    }
}