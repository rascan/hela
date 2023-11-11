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
        Schema::create('hela_logs', function (Blueprint $table) {
            $table->id();
            $table->string('log_uid')->unique();
            $table->enum('outcome', ['success', 'failure']);
            $table->unsignedInteger('code');
            $table->longText('message')->nullable();
            // $table->json('request_metadata');

            // {
            //     'method': 'GET',
            //     'url': '',
            //     'data': '',
            //     'queries': '',
            //     'headers': '',
            // }

            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hela_logs');
    }
};
