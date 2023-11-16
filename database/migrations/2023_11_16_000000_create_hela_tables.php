
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
            $table->string('service');
            $table->boolean('success');
            $table->enum('log_level', [
                'emergency',
                'alert',
                'critical',
                'error',
                'warning',
                'notice',
                'informational',
                'debug',
            ]);
            $table->unsignedInteger('status_code');
            $table->longText('message')->nullable();
            $table->json('request_details');
            $table->json('payment_details')->nullable();
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
