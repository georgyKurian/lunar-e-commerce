<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrolment_settings', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('product_variant_id')
                ->constrained(table:$this->prefix.'product_variants')
                ->onDelete('cascade');
            $table->unsignedInteger('course_id');
            $table->text('selection_type')->default('calendar');
            $table->boolean('is_time_selection_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolment_settings');
    }
};
