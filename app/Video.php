<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = "tbl_video";
    protected $fillable =([
        'video_title',
        'video_name',
        'video_url',
        'genre',
        'point',
        'caption'
    ]);
}
