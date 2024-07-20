<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'password' => '$2a$12$wyeCmTLfo0jTiRYoDhxByeblFpBsCYWnykxPGxDruEn0XCNaPc5me',
            'email' => 'admin@admin.com',
            'member_id' => 1,
            'group_id' => 1
        ]);
    }
}
