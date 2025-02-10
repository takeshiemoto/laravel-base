<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 既存のusersテーブルに新しいカラムを追加
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
            $table->foreignId('organization_id')->after('role')->constrained()->cascadeOnDelete();
            $table->softDeletes()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn(['role', 'organization_id']);
            $table->dropSoftDeletes();
        });
    }
};
