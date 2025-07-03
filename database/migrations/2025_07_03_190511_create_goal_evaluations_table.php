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
        Schema::create('goal_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('employee_goal_assignments')->cascadeOnDelete();
            $table->unsignedTinyInteger('progress'); // ocena tylko w przedziale 0-100
            $table->timestamps();

            $table->unique('assignment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_evaluations');
    }
};
