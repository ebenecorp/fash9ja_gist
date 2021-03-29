<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'=> 'Fash9ja Gist',
            'description'=>'Fash9ja Gist BLog is a Fashion blog where you will find all the beautiful things it has to offer, experience to the fashion world and inspiration that you need to keep you on the fab lane.',
            'about'=>'This is the Fash9ja Gist, an indegenious nigerian fashion and lifestyle blog where you find more than enough about the ups and downs in life and all the beautiful things it has to offer,further more you get to experience the fashion world,lifestyle,travels,events and more in whole new dimension,giving you all the help and inspiration that you need to keep you on the fab lane.',
            'email'=>'ebenechi1@gmail.com',
            'phone'=>'+2348163159720',
            'address'=>' 1 Awolowo way, VI, Lagos, Nigeria'
        ]);
        //
    }
}
