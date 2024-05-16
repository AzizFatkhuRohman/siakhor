<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('nip',25);
            $table->string('name');
            $table->string('front_degree',10);
            $table->string('back_degree',10);
            $table->string('place_of_birth',20);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->string('number_handphone',25);
            $table->string('address',70);
            $table->integer('rt');
            $table->integer('rw');
            $table->string('village',70);
            $table->string('subdistrict',70);
            $table->string('city',70);
            $table->string('province',70);
            $table->string('postal_code',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
