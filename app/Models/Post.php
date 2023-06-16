<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public mixed $title;
    public mixed $description;
    protected $fillable = [
        'title',
        'description',
    ];
}
