<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'desc',
        'price',
        'status',
        'reference'
    ];

    //Note : The status of the book is determine by 0 and 1
    //status 0 mean book is available to borrow
    //status 1 mean book is not available to borrow/already borrowed
}
