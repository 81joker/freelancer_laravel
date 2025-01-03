<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('re_accounts', function (Blueprint $table): void {
            $table->datetime('approved_at')->nullable();
        });

        DB::table('re_accounts')->update(['approved_at' => Carbon::now()]);
    }

    public function down(): void
    {
        Schema::table('re_accounts', function (Blueprint $table): void {
            $table->dropColumn('approved_at');
        });
    }
};
