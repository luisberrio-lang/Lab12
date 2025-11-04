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
        // Sub-función movida adentro de comentario para mantener tu estructura original
        // (no se puede declarar un método dentro de otro en PHP)
        // public function up()
        // {
        //     Schema::table('tasks', function (Blueprint $table) {
        //         $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        //     });
        // }

        // Primera parte: crear la tabla tasks
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });

        // Segunda parte: agregar la relación con users
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero eliminar la relación
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Luego eliminar la tabla
        Schema::dropIfExists('tasks');
    }
};
