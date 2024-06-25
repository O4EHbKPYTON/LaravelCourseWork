<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Создаем роли
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Создаем разрешения
        Permission::create(['name' => 'view all credits']);

        // Назначаем разрешения ролям
        $adminRole->givePermissionTo('view all credits');
    }
}
