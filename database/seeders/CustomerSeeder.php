<?php

namespace Database\Seeders;

use App\Models\Customer;
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
            $user = User::updateOrCreate([
                'name'=>fake()->name(),
                'email'=>"customer$i@mail.com",
                'password'=>Hash::make('123456789')
            ]);
            
            Customer::create([
                'user_id'=>$user->id,
                'customer_address'=>fake()->address(),
                'customer_phone'=>fake()->phoneNumber(),
                'customer_prefrences'=>'healthy Food'
            ]);
        }
    }
}
