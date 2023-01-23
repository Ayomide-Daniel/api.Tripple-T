<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottle_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bottle_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->string('description');
            $table->timestamps();

            $table->unique(['bottle_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bottle_variants');
    }
};
