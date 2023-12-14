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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // $table->bigInteger('category_id')->unsigned();
            $table->foreignId('category_id');
            $table->bigInteger('company_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location');
            $table->date('expiration_date');
            $table->string('level_career');
            $table->string('salary');
            $table->string('type');
            $table->string('image')->nullable();
            $table->text('body');
            $table->timestamps();
            // $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
