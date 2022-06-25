<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = "tbl_content";
    protected $fillable = [
            'concept_image',
            'concept_filename',
            'concept_text',
            'recommendation_image',
            'recommendation_filename',
            'recommendation_text'
        ];
}
