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
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 30)->unique()->nullable(false);
            $table->string("alt_name", 30);
            $table->string("latitude");
            $table->string("longitude");
            $table->foreignId("provinsi_id")->constrained("provinsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabkotas');
    }
};
