<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'book_name', 'book_description', 'book_author', 'isbn', 'created_at', 'updated_at'
    ];

    public $timestamps = false;

    public function freshTimestamp()
    {
        return time();
    }

}