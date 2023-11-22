
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Rascan\Hela\ConstantManager;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hela_logs', function (Blueprint $table) {
            $table->id();
            $table->string('hela_log_uid')->unique();
            $table->boolean('status');
            $table->string('service')->index();
            $table->string('method')->index();
            $table->text('endpoint');
            $table->text('message');
            $table->json('request_payload');
            $table->json('service_response');
            $table->string('error_code')->nullable();
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
