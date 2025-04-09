<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('phone');
        $table->date('appointment_date');
        $table->time('appointment_time');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
