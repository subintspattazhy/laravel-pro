<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('active')->default(0);
            $table->string('district', 225);
            $table->string('abroad_place', 225);
            $table->date('dob');
            $table->string('father_name', 225);
            $table->date('join_date');
            $table->string('mother_name', 225);
            $table->string('name', 225);
            $table->string('place', 225);
            $table->bigInteger('current_class_room_id');
            $table->bigInteger('teacher_id');
            $table->string('phone');
            $table->string('whatsapp');
            $table->timestamps();
            $table->softDeletes(); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
