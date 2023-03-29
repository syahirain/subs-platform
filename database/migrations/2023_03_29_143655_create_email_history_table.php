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
        Schema::create('email_history', function (Blueprint $table) {
            $table->id();
            $table->integer('website_id');
            $table->integer('newsletter_id');
            $table->integer('subscriber_id');
            $table->string('status')->default('PENDING');
            $table->dateTime('send_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
