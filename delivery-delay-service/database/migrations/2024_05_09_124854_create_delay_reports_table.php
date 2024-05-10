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
        Schema::create('delay_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained("orders")->cascadeOnDelete();
            $table->enum('status', ["processing", "waiting", "processed"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delay_reports', function (Blueprint $table) {
            //
        });
    }
};
