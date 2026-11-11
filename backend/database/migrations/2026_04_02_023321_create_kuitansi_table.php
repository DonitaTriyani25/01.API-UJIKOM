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
        Schema::create('kuitansi', function (Blueprint $table) {
            $table->string('id_kuitansi', 10)->primary();
            $table->string('id_faktur', 10);
            $table->date('tgl_kuitansi');
            $table->timestamps();

            $table->foreign('id_faktur')
                ->references('id_faktur')
                ->on('faktur')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuitansi');
    }
};
