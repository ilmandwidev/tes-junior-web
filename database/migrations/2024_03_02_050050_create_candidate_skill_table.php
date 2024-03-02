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
        Schema::create('candidate_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('candidate_id');
            $table->unsignedBiginteger('skill_id');


            $table->foreign('candidate_id')->references('id')
                ->on('candidates')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')
                ->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_sets');
    }
};
