<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kokoro_type extends Model
{
    use HasFactory;

    protected $table = "tbl_kokoro_type";
    protected $fillable = [
        'name',
        'priority'
    ];

}
