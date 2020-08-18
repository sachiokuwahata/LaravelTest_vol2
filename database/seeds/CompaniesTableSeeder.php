<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'name'              => 'admin',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);        
    }
}
