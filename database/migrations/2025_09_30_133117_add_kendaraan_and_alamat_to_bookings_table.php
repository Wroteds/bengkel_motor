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
        Schema::table('bookings', function (Blueprint $table) {
            // Kolom untuk jenis kendaraan (misal: "Motor", "Mobil Honda Brio")
            $table->string('kendaraan')->nullable()->after('jenis_servis');

            // Kolom untuk alamat lengkap (menggunakan text karena panjang)
            $table->text('alamat')->nullable()->after('kendaraan'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->dropColumn('kendaraan');
        });
    }
};