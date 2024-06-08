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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name_task');
            $table->text('description')->nullable();
            $table->date('due_date');
            $table->string('status_task'); // e.g., 'pending', 'completed', etc.
            $table->unsignedBigInteger('departements_id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->timestamps();

            $table->foreign('departements_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
