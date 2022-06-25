<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table="tbl_staff";
    protected $fillable = ([
        // 'company_name',
        'company_code',
        'staff_number',
        'deploy',
        'first_name',
        'last_name',
        'gender',
        'birth_year',
        'birth_month',
        'birth_day',
        'email',
        'password',
        'final_login_date'
    ]);

    public function getRouteKey(){
        return $this->slug;
    }
}
