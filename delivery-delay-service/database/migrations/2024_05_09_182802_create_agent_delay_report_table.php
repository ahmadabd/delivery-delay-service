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
        Schema::create('agent_delay_report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable()->constrained("agents")->cascadeOnDelete();
            $table->foreignId('delay_report_id')->nullable()->constrained("delay_reports")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_delay_report', function (Blueprint $table) {
            //
        });
    }
};
