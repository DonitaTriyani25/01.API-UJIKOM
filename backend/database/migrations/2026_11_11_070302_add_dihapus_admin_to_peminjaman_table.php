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
        Schema::table('peminjaman', function (Blueprint $table) {
            if (! Schema::hasColumn('peminjaman', 'dihapus_admin')) {
                // Penanda bahwa data sudah "dihapus" dari daftar admin.
                // Data tetap disimpan agar riwayat peminjam tidak ikut hilang.
                $table->boolean('dihapus_admin')->default(false)->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            if (Schema::hasColumn('peminjaman', 'dihapus_admin')) {
                $table->dropColumn('dihapus_admin');
            }
        });
    }
};