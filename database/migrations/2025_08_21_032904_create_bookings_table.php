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
       Schema::create('bookings', function (Blueprint $table) {
         $table->id();
         $table->foreignId('user_id')->constrained()->onDelete('cascade');
         $table->string('jenis_servis');
         $table->date('tanggal_booking');
         $table->text('catatan')->nullable();
         $table->string('status')->default('menunggu');
         $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
