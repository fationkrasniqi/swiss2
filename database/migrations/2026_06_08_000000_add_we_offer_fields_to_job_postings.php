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
        Schema::table('job_postings', function (Blueprint $table) {
            $table->text('we_offer')->nullable()->after('requirements');
            $table->text('we_offer_en')->nullable();
            $table->text('we_offer_de')->nullable();
            $table->text('we_offer_sq')->nullable();
            $table->text('we_offer_fr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn([
                'we_offer',
                'we_offer_en',
                'we_offer_de',
                'we_offer_sq',
                'we_offer_fr',
            ]);
        });
    }
};
