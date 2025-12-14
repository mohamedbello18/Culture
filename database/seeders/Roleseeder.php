<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update the 'Administrateur' role
        Role::firstOrCreate(['nom_role' => 'Administrateur']);

        // Create or update the 'Manager' role
        Role::firstOrCreate(['nom_role' => 'Manager']);

        // You might also want a default 'Utilisateur' role for regular users
        Role::firstOrCreate(['nom_role' => 'Utilisateur']);
    }
}
