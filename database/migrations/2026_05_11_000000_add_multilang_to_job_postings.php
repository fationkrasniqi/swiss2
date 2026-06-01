<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->string('title_de')->nullable()->after('title');
            $table->text('description_de')->nullable()->after('description');
            $table->text('requirements_de')->nullable()->after('requirements');
        });
    }

    public function down(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn(['title_de', 'description_de', 'requirements_de']);
        });
    }
};
