<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	User::create([
    		'email' => 'admin@admin.com',
    		'name' => 'admin',
    		'username' => 'admin',
    		'password' => Hash::make('1234')
    	]);
    }
}
