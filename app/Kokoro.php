<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kokoro extends Model
{
    use HasFactory;
    protected $table = "tbl_kokoro";
    protected $fillable = [
        'title',
        'content',
        'image_url',
        'filename',
        'type',
        'public',
        'date',
    ];

}
