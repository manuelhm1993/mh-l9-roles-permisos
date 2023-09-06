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
        $dataRoles = ['admin', 'escritor'];

        // Usuarios a crear
        $dataUsers = [
            [
                'name'     => 'Manuel Henriquez',
                'email'    => 'manuel@pruebas.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name'     => 'Fanny Carvajal',
                'email'    => 'fanny@pruebas.com',
                'password' => bcrypt('12345678'),
            ],
        ];

        // Creación de roles usando map
        $roles = array_map(
            function($name) {
                return Role::create([
                    'name' => $name
                ]);
            },
            $dataRoles
        );

        // Creación de usuarios para pruebas, admin y escritor
        $users = array_map(
            function ($data) {
                return User::create($data);
            },
            $dataUsers
        );

        // Asignar roles a los usuarios
        foreach ($users as $i => $user) {
            $users[$i]->assignRole($roles[$i]);
        }
    }
}
