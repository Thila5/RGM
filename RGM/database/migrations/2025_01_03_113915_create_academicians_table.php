<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiciansTable extends Migration
{
    public function up()
    {
        Schema::create('academicians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Cascade delete
            $table->string('name');
            $table->string('staff_number')->unique();
            $table->string('email')->unique();
            $table->string('college');
            $table->string('department');
            $table->string('position', 255);
            $table->timestamps();

            // Add an index for the users_id column for better performance
            $table->index('users_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('academicians');
    }
}
