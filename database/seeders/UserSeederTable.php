<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'subdomain'      => null,
                'user_type'      => 1,
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('secret'),//secret123
                'remember_token' => null,
            ]
        ];
        User::insert($users);
    }
}
