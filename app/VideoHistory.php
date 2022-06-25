<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoHistory extends Model
{
    use HasFactory;
    protected $table="tbl_video_history";
    protected $fillable = [
        'staff_number',
        'point',
        'video_id',
        'video_title',
        'date',
        'sort'
    ];
}
