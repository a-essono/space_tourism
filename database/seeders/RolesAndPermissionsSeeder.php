<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Toujours vider le cache interne de Spatie avant d'altérer la matrice
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        
        // Permissions liées aux planets/crews/technologies (space_tourism)
        $perms = [
            // Planètes
            'planets.view',
            'planets.create',
            'planets.edit',
            'planets.delete',

            // Équipes
            'crews.view',
            'crews.create',
            'crews.edit',
            'crews.delete',

            // Technologies
            'technologies.view',
            'technologies.create',
            'technologies.edit',
            'technologies.delete',

            // Permissions Admin / Users
            'users.manage',
        ];

        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        //Rôles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $planets_admin = Role::firstOrCreate(['name' => 'planets_admin']);
        $crews_admin = Role::firstOrCreate(['name' => 'crews_admin']);
        $technologies_admin = Role::firstOrCreate(['name' => 'technologies_admin']);

        // Matrice rôles -> permission
        $admin->syncPermissions(Permission::all());
        $planets_admin->syncPermissions(['planets.view', 'planets.create', 'planets.edit', 'planets.delete']);
        $crews_admin->syncPermissions(['crews.view', 'crews.create', 'crews.edit', 'crews.delete']);
        $technologies_admin->syncPermissions(['technologies.view', 'technologies.create', 'technologies.edit', 'technologies.delete']);

        // Rafraîchir le cache des permissions -> update
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
