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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2);
            $table->string('tipe_transaksi'); // 'income', 'expense' (pengeluaran), 'transfer'
            $table->string('kategori'); // event , uangkas , donasi, transfer, operasionaol , dll.
            $table->text('description')->nullable();
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('departements_id')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->timestamps();

            $table->foreign('departements_id')->references('id')->on('departements')->onDelete('set null');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};
