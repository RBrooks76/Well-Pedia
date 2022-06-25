<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_client', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_code');
            $table->string('phone_number');
            $table->string('location');
            $table->string('charger_1_first');
            $table->string('charger_1_last');
            $table->string('charger_2_first');
            $table->string('charger_2_last');
            $table->string('charger_3_first');
            $table->string('charger_3_last');
            $table->string('email');
            $table->string('password');
            $table->string('filename');
            $table->string('logo_url');
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
        Schema::dropIfExists('client');
    }
}
