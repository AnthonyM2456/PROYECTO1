<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->decimal('Balance', 10, 2)->change(); // Cambia el tipo a decimal
        });
    }
    
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('Balance')->change(); // Revertir al tipo original
        });
    }
};
