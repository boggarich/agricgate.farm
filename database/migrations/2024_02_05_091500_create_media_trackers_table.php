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
        Schema::create('media_trackers', function (Blueprint $table) {
            $table->id();
            $table->text('media_tracker_url');
            $table->bigInteger('media_trackerable_id');
            $table->string('media_trackerable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_trackers');
    }
};
