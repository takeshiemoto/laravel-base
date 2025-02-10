<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 管理者の権限設定（admin roleのため、実際には権限テーブルは使用しない）
        $admin = User::where('email', 'admin@example.com')->first();
        Permission::create([
            'user_id' => $admin->id,
            'can_create' => true,
            'can_edit' => true,
            'can_delete' => true,
            'can_view' => true,
        ]);

        // ユーザーAの権限設定（全権限あり）
        $userA = User::where('email', 'user.a@example.com')->first();
        Permission::create([
            'user_id' => $userA->id,
            'can_create' => true,
            'can_edit' => true,
            'can_delete' => true,
            'can_view' => true,
        ]);

        // ユーザーBの権限設定（閲覧権限のみ）
        $userB = User::where('email', 'user.b@example.com')->first();
        Permission::create([
            'user_id' => $userB->id,
            'can_create' => false,
            'can_edit' => false,
            'can_delete' => false,
            'can_view' => true,
        ]);
    }
}
