<?php

// database/migrations/YYYY_MM_DD_create_entreprises_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepriseTable extends Migration
{
    public function up()
    {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprise');
    }
}
