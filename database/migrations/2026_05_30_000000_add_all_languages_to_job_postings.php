<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            // Albanian fields
            $table->string('title_sq')->nullable()->after('title_de');
            $table->text('description_sq')->nullable()->after('description_de');
            $table->text('requirements_sq')->nullable()->after('requirements_de');
            
            // French fields
            $table->string('title_fr')->nullable()->after('title_sq');
            $table->text('description_fr')->nullable()->after('description_sq');
            $table->text('requirements_fr')->nullable()->after('requirements_sq');
            
            // English fields (for consistency, renaming default to _en)
            $table->string('title_en')->nullable()->after('title_fr');
            $table->text('description_en')->nullable()->after('description_fr');
            $table->text('requirements_en')->nullable()->after('requirements_fr');
        });
    }

    public function down(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn([
                'title_sq', 'description_sq', 'requirements_sq',
                'title_fr', 'description_fr', 'requirements_fr',
                'title_en', 'description_en', 'requirements_en'
            ]);
        });
    }
};
