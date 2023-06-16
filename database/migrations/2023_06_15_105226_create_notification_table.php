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
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('creneau_id')->constrained('creneau')->onDelete('cascade');
            $table->string('type_notification');
            $table->string('contenue');
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('notification', function (Blueprint $table){
            $table->dropConstrainedForeignId('users_id');
        });
        schema::table('notification', function (Blueprint $table){
            $table->dropConstrainedForeignId('creneau_id');
        });
        Schema::dropIfExists('notification');
    }
};
