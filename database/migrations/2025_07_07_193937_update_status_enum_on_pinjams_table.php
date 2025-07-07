<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("ALTER TABLE pinjams MODIFY status ENUM('menunggu', 'disetujui', 'ditolak', 'selesai') DEFAULT 'menunggu'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pinjams MODIFY status ENUM('menunggu', 'disetujui', 'ditolak') DEFAULT 'menunggu'");
    }
};