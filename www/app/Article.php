<?php

namespace App;
use App\Search\Searchable;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;

    protected $fillable = ['title', 'body', 'tags'];

    protected $casts = [
        'tags' => 'json',
    ];
}
