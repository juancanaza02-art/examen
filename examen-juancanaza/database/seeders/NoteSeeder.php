<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $user = \App\Models\User::create([
        'name' => 'Juan David Canaza',
        'email' => 'juandavid@uatf.edu.bo',
        'password' => bcrypt('123456'), 
    ]);

    
    $cat = \App\Models\Category::create(['name' => 'Exámenes']);

    $nota = \App\Models\Note::create([
        'title' => 'Proyecto Final Backend',
        'content' => 'Terminar las relaciones de Eloquent',
        'priority' => 1,
        'category_id' => $cat->id
    ]);

    $user->notes()->attach($nota->id, ['role' => 'owner']);
}
}
