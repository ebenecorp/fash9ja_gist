<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email', 'admin@admin.com')->first();

        if(!$user){

            User::create([
                'name'=> 'Ebenezer Omeonu',
                'email'=> 'admin@admin.com',
                'password'=>Hash::make('p@ssw0rd'),
                'role'=>'admin'
            ]);

        }
    }
}
