<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Member::create(
            [
                "name" => "admin",
                "nik" => "123456789",
                "gender" => "P",
                "birth_date" => "2000-02-01",
                "place_of_birth" => "Merdeka Street No.123",
                "address" => "Medan Johor",
                "status" => 1,
                "picture" => "asset_url",
                "level_id" => 1
            ],
        );
    }
}
