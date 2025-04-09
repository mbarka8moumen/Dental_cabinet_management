<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajoute une colonne 'role' de type string avec une valeur par défaut
            $table->string('role')->default('user'); // Tu peux définir "user" comme rôle par défaut
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Supprime la colonne 'role' si la migration est annulée
            $table->dropColumn('role');
        });
    }
};
