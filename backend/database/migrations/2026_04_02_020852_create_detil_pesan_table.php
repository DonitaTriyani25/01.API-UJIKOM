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
        Schema::create('detil_pesan', function (Blueprint $table) {
            $table->integer('id_pesan');
            $table->string('id_produk', 5);
            $table->integer('jumlah')->nullable();
            $table->decimal('harga', 10, 0)->nullable();

            // 1.Menentukan Primary Key Gabungan (Composite Key)
            $table->primary(['id_pesan', 'id_produk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_pesan');
    }
};
