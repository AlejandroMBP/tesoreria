<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'marcos',
            'username' => 'marcosB',
            'email' => 'marcos@marcos.com',
            'password' => bcrypt('123456789'),
            'estado' => 1,
        ])->assignRole('Admin');
    }
}