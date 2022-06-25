<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "tbl_client";
    protected $fillable = [
            'company_name',
            'company_code',
            'phone_number',
            'location',
            'charger_1_first',
            'charger_1_last',
            'charger_2_first',
            'charger_2_last',
            'charger_3_first',
            'charger_3_last',
            'email',
            'password',
            'filename',
            'logo_url'
        ];
}
