<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_content', function (Blueprint $table) {
            $table->id();
            $table->string('concept_image');
            $table->string('concept_filename');
            $table->text('concept_text');
            $table->string('recommendation_image');
            $table->string('recommendation_filename');
            $table->text('recommendation_text');
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
        Schema::dropIfExists('content');
    }
}
