<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\User;
use App\Models\Category;

class NoteSeeder extends Seeder
{
    public function run(): void
{
    $users = \App\Models\User::all();
    $categories = \App\Models\Category::all();
    $admin = \App\Models\User::where('email', 'admin@uatf.bo')->first();

    if ($categories->isEmpty()) {
        $this->command->error("No hay categorías. Ejecuta primero el CategorySeeder.");
        return;
    }

    for ($i = 0; $i < 15; $i++) {
       
        $note = \App\Models\Note::factory()->create([
            'category_id' => $categories->random()->id,
        ]);

        
        $note->users()->attach($admin->id, ['role' => 'owner']);

        
        $otro = $users->where('id', '!=', $admin->id)->random();
        $note->users()->attach($otro->id, ['role' => 'editor']);
    }
    
    $this->command->info("¡Se crearon 15 notas con sus relaciones!");
}
}