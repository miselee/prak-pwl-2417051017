<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE "user" DROP CONSTRAINT user_pkey');

        DB::statement('ALTER TABLE "user" RENAME COLUMN id TO legacy_id');

        DB::statement('ALTER TABLE "user" RENAME COLUMN uuid TO id');

        DB::statement('ALTER TABLE "user" ALTER COLUMN id SET NOT NULL');

        DB::statement('ALTER TABLE "user" ADD CONSTRAINT user_pkey PRIMARY KEY (id)');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE "user" DROP CONSTRAINT user_pkey');

        DB::statement('ALTER TABLE "user" RENAME COLUMN id TO uuid');

        DB::statement('ALTER TABLE "user" RENAME COLUMN legacy_id TO id');

        DB::statement('ALTER TABLE "user" ADD CONSTRAINT user_pkey PRIMARY KEY (id)');
    }
};