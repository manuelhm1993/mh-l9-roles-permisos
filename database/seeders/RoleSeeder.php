<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles a crear
        $data = ['admin', 'escritor'];

        // Creación de roles usando map
        $roles = array_map(
            function($name) {
                return Role::create([
                    'name' => $name
                ]);
            },
            $data
        );

        // Creación de un usuario admin para pruebas
        $user = User::create([
            'name'     => 'Manuel Henriquez',
            'email'    => 'manuel@pruebas.com',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar el rol admin al usuario
        $user->assignRole($roles[0]);
    }
}
