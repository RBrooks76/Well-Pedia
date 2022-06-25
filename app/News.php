<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "tbl_news";
    protected $fillable = [
        'news_title',
        'news_name',
        'news_url',
        'genre',
        'news_caption',
        'date',
    ];
}
