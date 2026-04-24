<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
{
   
    \App\Models\User::factory(4)->create();

    
    \App\Models\User::firstOrCreate(
        ['email' => 'juandavid@uatf.edu.bo'],
        [
            'name' => 'Juan David Canaza',
            'password' => bcrypt('123456'),
        ]
    );

    
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@uatf.bo'],
        [
            'name' => 'Admin UATF',
            'password' => bcrypt('123456'),
        ]
    );
}
}