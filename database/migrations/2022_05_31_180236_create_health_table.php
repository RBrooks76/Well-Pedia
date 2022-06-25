<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_health', function (Blueprint $table) {
            $table->id();
            $table->string('company_code');
            $table->string('staff_number');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_type');
            $table->string('bmi');
            $table->string('body_hole');
            $table->string('blood_pressure_over');
            $table->string('blood_pressure_down');
            $table->string('tp');
            $table->string('alb');
            $table->string('ast');
            $table->string('alt');
            $table->string('gtp');
            $table->string('tc');
            $table->string('hdl');//
            $table->string('ldl');
            $table->string('tg');
            $table->string('bun');
            $table->string('cre');
            $table->string('ua');
            $table->string('glu');
            $table->string('hba1c');
            $table->string('sight_left');
            $table->string('sight_right');
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
        Schema::dropIfExists('health');
    }
}
