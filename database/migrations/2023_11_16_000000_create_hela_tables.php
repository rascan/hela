
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
            $table->string('method')->index();
            $table->string('service')->index();
            $table->text('endpoint');
            $table->json('payload');
            $table->text('message');
            $table->boolean('status');
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
