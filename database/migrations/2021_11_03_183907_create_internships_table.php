<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            //$table->foreign('teacher_id')
            //    ->references('id')
            //    ->on('teachers')
            //    ->onDelete('cascade');
            //$table->foreign('user_id')
             //   ->references('id')
             //   ->on('users')
             //   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
