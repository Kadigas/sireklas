<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'user_id' => '5025201888',
            'ruangan_id' => 1
        ]);

        Staff::create([
            'user_id' => '5025201777',
            'ruangan_id' => 2
        ]);

        Staff::create([
            'user_id' => '5025201666',
            'ruangan_id' => 3
        ]);

        Staff::create([
            'user_id' => '5025201555',
            'ruangan_id' => 4
        ]);

        Staff::create([
            'user_id' => '5025201444',
            'ruangan_id' => 5
        ]);
    }
}
