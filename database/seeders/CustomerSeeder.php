<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0; $i < 5; $i++) { 
            # code...
            User::create([
                'name'=>fake()->name(),
                'email'=>"customer$i@mail.com",
                'password'=>Hash::make('123456789')
            ]);
        }
    }
}
