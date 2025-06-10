<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Tambahkan kolom komentar_admin ke tabel surat_masuk
     */
    public function up(): void
    {
        Schema::table('surat_masuk', function (Blueprint $table) {
            $table->text('komentar_admin')->nullable()->after('lampiran');
        });
    }

    /**
     * Hapus kolom komentar_admin dari tabel surat_masuk
     */
    public function down(): void
    {
        Schema::table('surat_masuk', function (Blueprint $table) {
            $table->dropColumn('komentar_admin');
        });
    }
};
