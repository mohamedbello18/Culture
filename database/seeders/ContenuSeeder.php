<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contenu;
use App\Models\User; // Assuming User model maps to utilisateurs table
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Support\Facades\DB; // Import DB facade for raw queries if needed

class ContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find Mohamed BELLO's user ID
        $mohamedBello = User::where('email', 'mohamedbello717@gmail.com')->first();

        if (!$mohamedBello) {
            $this->command->info('Mohamed BELLO user not found. Please ensure UserSeeder runs first and creates this user.');
            return;
        }

        // Get some existing TypeContenu, Region, and Langue IDs
        // Ensure these seeders run before ContenuSeeder
        $typeContenuIds = TypeContenu::pluck('id_type')->toArray();
        $regionIds = Region::pluck('id_region')->toArray();
        $langueIds = Langue::pluck('id_langue')->toArray();

        // Check if we have enough IDs to create content
        if (empty($typeContenuIds) || empty($regionIds) || empty($langueIds)) {
            $this->command->info('Missing TypeContenu, Region, or Langue data. Please ensure their seeders run first.');
            return;
        }

        // Create 10 Contenu entries for Mohamed BELLO
        for ($i = 1; $i <= 10; $i++) {
            Contenu::create([
                'titre' => 'Contenu de Mohamed BELLO ' . $i,
                'id_type_contenu' => $typeContenuIds[array_rand($typeContenuIds)],
                'id_auteur' => $mohamedBello->id_utilisateur,
                'id_region' => $regionIds[array_rand($regionIds)],
                'id_langue' => $langueIds[array_rand($langueIds)],
                'id_parent' => null, // No parent for these seeded contents
                'id_moderateur' => null,
                'texte' => 'Ceci est le texte détaillé du contenu numéro ' . $i . ' créé par Mohamed BELLO. Il explore divers aspects de la culture béninoise, son histoire, ses traditions et son impact contemporain. Ce contenu est un exemple de la richesse de notre patrimoine. ' . str_repeat('Plus de texte pour remplir un peu plus. ', 10),
                'date_creation' => now()->subDays(rand(1, 30)),
                'statut' => (rand(0, 1) == 1) ? 'publie' : 'en_attente', // Randomly published or pending
                'date_validation' => (rand(0, 1) == 1) ? now()->subDays(rand(1, 5)) : null,
                'views' => rand(100, 5000),
            ]);
        }

        $this->command->info('10 Contenus created for Mohamed BELLO.');
    }
}
