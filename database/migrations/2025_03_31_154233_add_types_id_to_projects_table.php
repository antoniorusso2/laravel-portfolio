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
        Schema::table('projects', function (Blueprint $table) {

            //rimozione colonna category
            $table->dropColumn('category');

            //aggiunta nuova colonna con foreign key in maniera estesa
            // $table->unsignedBigInteger('type_id');
            // $table->foreign('type_id')->references('id')->on('types');

            //aggiunta nuova colonna con foreign key
            $table->foreignId('type_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            //eliminazione nuova colonna
            $table->dropForeign("projects_type_id_foreign");

            //aggiunta colonna category
            $table->string('category', 150)->nullable();
        });
    }
};
