<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $role_admin = Role::where('nom_role', 'Administrateur')->first();
        $role_manager = Role::where('nom_role', 'Manager')->first();
        $role_user = Role::where('nom_role', 'Utilisateur')->first();

        User::create([
                'nom' => 'COMLAN',
                'prenom' => 'Maurice',
                'email' => 'mauricecomlan@uac.bj',
                'mot_de_passe' => Hash::make('eneam123'),
                'id_role' => $role_admin->id_role,
                'sexe' => 'H',
                'statut' => 'actif',
                'date_inscription' => now(),
        ]);

        User::create([
            'nom' => 'BELLO',
            'prenom' => 'Mohamed',
            'email' => 'mohamedbello717@gmail.com',
            'mot_de_passe' => Hash::make('Eneam@123'),
            'id_role' => $role_manager->id_role,
            'sexe' => 'H',
            'statut' => 'actif',
            'date_inscription' => now(),
        ]);
        User::create([
            'nom' => 'BELLO',
            'prenom' => 'Dine',
            'email' => 'dinebello016@gmail.com',
            'mot_de_passe' => Hash::make('Eneam@123'),
            'id_role' => $role_user->id_role,
            'sexe' => 'H',
            'statut' => 'actif',
            'date_inscription' => now(),
        ]);
    }
}
