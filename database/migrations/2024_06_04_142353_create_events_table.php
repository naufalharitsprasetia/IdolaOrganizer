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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name_event');
            $table->text('description')->nullable();
            $table->date('event_date_start');
            $table->date('event_date_end');
            $table->string('location')->nullable();
            $table->unsignedBigInteger('departements_id');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('member_id')->nullable(); // Responsible Person
            $table->timestamps();

            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('departements_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
