<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        // サンプル組織の作成のみを行う
        Organization::create([
            'name' => 'Sample Organization',
            'description' => 'This is a sample organization created by seeder.',
        ]);
    }
}
