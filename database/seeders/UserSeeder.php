<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->first_name = 'Manuel';
        $user->last_name = 'Domínguez';
        $user->document = '123456789';
        $user->email = 'manueld@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        // $user->role_id = $adminRole->id;
        $user->save();


    }
}
