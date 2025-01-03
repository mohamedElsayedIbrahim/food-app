<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
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
        $user = User::updateOrCreate([
            'first_name'=>fake()->lastName(),
            'last_name'=>fake()->firstName(),
            'email'=>"customer@mail.com",
            'role'=>'customer',
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
