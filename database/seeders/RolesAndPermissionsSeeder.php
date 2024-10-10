<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'tecnico']);

        Permission::create(['name' => 'listar usuarios'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'editar usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'crear usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar usuarios'])->syncRoles([$role1]);
    }
}