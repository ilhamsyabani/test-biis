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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('photo')->nullable();
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('document')->nullable();
            $table->unsignedBigInteger('id_departemen');
            $table->unsignedBigInteger('id_role');
            $table->date('joining_date');
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->timestamps();

            $table->foreign('id_departemen')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
