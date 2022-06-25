<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;
    protected $table = "tbl_health";
    protected $fillable = [
        'company_code',
        'staff_number',
        'height',
        'weight',
        'blood_type',
        'bmi',
        'body_hole',
        'blood_pressure_over',
        'blood_pressure_down',
        'tp',
        'alb',
        'ast',
        'alt',
        'gtp',
        'tc',
        'hdl',
        'ldl',
        'tg',
        'bun',
        'cre',
        'ua',
        'glu',
        'hba1c',
        'sight_left',
        'sight_right',
    ];
}
