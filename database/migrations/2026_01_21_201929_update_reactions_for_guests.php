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
        Schema::table('reactions', function (Blueprint $table) {

        // autoriser visiteurs
        if (!Schema::hasColumn('reactions', 'user_id')) {
            $table->foreignId('user_id')->nullable()->after('id');
        } else {
            $table->foreignId('user_id')->nullable()->change();
        }

        if (!Schema::hasColumn('reactions', 'reaction')) {
            $table->string('reaction')->after('video_id');
        }

        if (!Schema::hasColumn('reactions', 'session_id')) {
            $table->string('session_id')->nullable();
        }

        if (!Schema::hasColumn('reactions', 'ip_address')) {
            $table->string('ip_address')->nullable();
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('reactions', function (Blueprint $table) {
        $table->dropColumn(['reaction', 'session_id', 'ip_address']);
    });
    }
};
