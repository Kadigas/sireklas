<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PreparedUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_id' => '5025201096',
            'external_id' => '5025201096',
            'name' => 'ANDHIKA DITYA BAGASKARA D',
            'username' => '5025201096',
            'email' => '5025201096@student.its.ac.id',
            'password' => Hash::make('12345678'),
            'phone' => '081234567890',
        ]);

        User::create([
            'user_id' => '5025201097',
            'external_id' => '5025201097',
            'name' => 'User Dummy',
            'username' => '5025201000',
            'email' => 'userdummy@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567888',
        ]);

        User::create([
            'user_id' => '5025200999',
            'external_id' => '5025200999',
            'name' => 'Admin',
            'username' => '5025200999',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567899',
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '5025201888',
            'external_id' => '5025201888',
            'name' => 'Staff 1',
            'username' => '5025201888',
            'email' => 'staff1@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567891',
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '5025201777',
            'external_id' => '5025201777',
            'name' => 'Staff 2',
            'username' => '5025201777',
            'email' => 'staff2@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567892',
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '5025201666',
            'external_id' => '5025201666',
            'name' => 'Staff 3',
            'username' => '5025201666',
            'email' => 'staff3@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567893',
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '5025201555',
            'external_id' => '5025201555',
            'name' => 'Staff 4',
            'username' => '5025201555',
            'email' => 'staff4@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567894',
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '5025201444',
            'external_id' => '5025201444',
            'name' => 'Staff 5',
            'username' => '5025201444',
            'email' => 'staff5@mail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081234567895',
            'role' => 'admin',
        ]);
    }
}
