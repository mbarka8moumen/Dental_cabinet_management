<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nom du médecin
            $table->integer('age');  // Âge du médecin
            $table->string('city');  // Ville du médecin
            $table->string('phone_number');  // Numéro de téléphone du médecin
            $table->timestamps();  // Champs pour created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
