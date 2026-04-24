<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        
        $users = User::all();
        $categories = Category::all();
        $primerUsuario = User::first();

        if ($users->count() == 0 || $categories->count() == 0) {
            return; 
        }

        
        for ($i = 0; $i < 15; $i++) {
            $note = Note::create([
                'title' => "Nota de Examen " . ($i + 1),
                'content' => "Contenido de prueba para la nota " . ($i + 1),
                'priority' => 'medium',
                'is_public' => rand(0, 1),
                'category_id' => $categories->random()->id,
            ]);

            
            $note->users()->attach($primerUsuario->id, ['role' => 'owner']);

            
            $colab = $users->where('id', '!=', $primerUsuario->id)->random();
            $note->users()->attach($colab->id, ['role' => 'editor']);
        }
    }
}