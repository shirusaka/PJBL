<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tblmenu', function (Blueprint $table) {
            // ubah kolom promo menjadi boolean nullable
            $table->boolean('promo')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('tblmenu', function (Blueprint $table) {
            // rollback: kembali ke boolean NOT NULL (default)
            $table->boolean('promo')->nullable(false)->change();
        });
    }
};
