<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'description' => 'level tertinggi sebuah membership'
            ],
            [
                'name' => 'moderator',
                'description' => 'level untuk manage psotingan dan manage member'
            ],
            [
                'name' => 'member',
                'description' => 'rakyat jelata'
            ]
        ];

        foreach ($data as $key) {
            Level::insert($key);
        }
    }
}
