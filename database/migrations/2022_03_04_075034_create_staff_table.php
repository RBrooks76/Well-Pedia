<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_staff', function (Blueprint $table) {
            $table->id();
            // $table->string('company_name');
            $table->string('company_code');
            $table->string('staff_number');
            $table->string('deploy');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('birth_year');
            $table->string('birth_month');
            $table->string('birth_day');
            $table->string('email');
            $table->string('password');
            $table->datetime('final_login_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_staff');
    }
}
