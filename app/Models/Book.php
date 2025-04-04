<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'genre_id',
        'subject_id',
        'availability'
    ];

    // Add relationships if needed
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}




