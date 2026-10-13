<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS pgcrypto');

        Schema::table('user', function ($table) {
            $table->uuid('uuid')->nullable();
        });

        DB::statement('UPDATE "user" SET uuid = gen_random_uuid() WHERE uuid IS NULL');
    }

    public function down(): void
    {
        Schema::table('user', function ($table) {
            $table->dropColumn('uuid');
        });
    }
};
