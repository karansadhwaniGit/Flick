<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"Jimmy Anderson",
            'email'=>'jimmy@anderson.com',
            'password'=>Hash::make('abcd1234')
        ]);
        User::create([
            'name'=>"Struat Broad",
            'email'=>'struct@broad.in',
            'password'=>Hash::make('abcd1234')
        ]);
    }
}
