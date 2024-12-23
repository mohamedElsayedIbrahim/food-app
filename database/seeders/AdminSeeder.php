<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'first_name'=>fake()->lastName(),
            'last_name'=>fake()->firstName(),
            'email'=>"admin@mail.com",
            'role'=>'admin',
            'password'=>Hash::make('123456789')
        ]);
    }
}
