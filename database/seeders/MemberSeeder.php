<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('members')->insert([
                'name' => $faker->name,
                'nik' => $this->generateRandomNumber(16),
                'gender' => $faker->randomElement(['P', 'L']),
                'birth_date' => $faker->date(),
                'place_of_birth' => $faker->city,
                'address' => $faker->address,
                'level_id' => $faker->numberBetween(1, 3),
                'status' => $faker->boolean,
                'picture' => $faker->imageUrl(640, 480, 'people', true),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Generate a random number with a specified length.
     *
     * @param int $length
     * @return string
     */

    private function generateRandomNumber($length)
    {
        $number = '';
        for ($i = 0; $i < $length; $i++) {
            $number .= rand(0, 9);
        }
        return $number;
    }
}
