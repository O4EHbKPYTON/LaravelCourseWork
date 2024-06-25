<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    protected $signature = 'create:admin';
    protected $description = 'Create an admin user';

    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->secret('Password');

        // Проверяем, существует ли пользователь с таким email
        if (User::where('email', $email)->exists()) {
            $this->error('User with this email already exists');
            return;
        }

        // Создаем пользователя
        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Назначаем роль администратора
        $admin->assignRole('admin');

        $this->info('Admin created successfully');
    }
}
