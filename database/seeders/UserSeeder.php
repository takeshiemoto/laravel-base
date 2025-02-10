<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 最初の組織を取得
        $organization = Organization::first();

        if (!$organization) {
            throw new \RuntimeException('Organization must exist before creating users. Please run OrganizationSeeder first.');
        }

        // 管理者ユーザーの作成
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'organization_id' => $organization->id,
        ]);

        // ユーザーA（投稿、編集、削除権限あり）の作成
        User::create([
            'name' => 'User A',
            'email' => 'user.a@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'organization_id' => $organization->id,
        ]);

        // ユーザーB（閲覧権限のみ）の作成
        User::create([
            'name' => 'User B',
            'email' => 'user.b@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'organization_id' => $organization->id,
        ]);
    }
}
