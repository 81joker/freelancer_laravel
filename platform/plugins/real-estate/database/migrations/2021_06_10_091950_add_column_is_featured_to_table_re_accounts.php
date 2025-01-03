<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (Schema::hasColumn('re_accounts', 'is_featured')) {
            return;
        }

        Schema::table('re_accounts', function (Blueprint $table): void {
            $table->boolean('is_featured')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('re_accounts', function (Blueprint $table): void {
            $table->dropColumn('is_featured');
        });
    }
};
