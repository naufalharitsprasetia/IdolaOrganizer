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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organizations_id');
            $table->unsignedBigInteger('departements_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name_member');
            $table->string('email_member')->nullable();
            $table->string('phone_member')->nullable();
            $table->text('address_member')->nullable();
            $table->boolean('status_active')->default(true);
            $table->foreign('departements_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('organizations_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
