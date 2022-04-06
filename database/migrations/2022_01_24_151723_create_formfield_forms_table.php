<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormfieldFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained();
            $table->foreignId('form_field_id')->constrained();
            $table->string('name')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('required')->default(0);
            $table->string('caption')->nullable();
            $table->integer('max_length')->nullable();
            $table->text('options')->nullable();
            $table->boolean('split_results')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_field_forms');
    }
}
