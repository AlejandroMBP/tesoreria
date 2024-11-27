<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
            'cargo' => 'defecto',
            'fecha_inicio' => Carbon::now(),
            'fecha_fin' => Carbon::now(),
            'uuid'=>(string) Str::uuid(),
        ])->assignRole('Admin');
    }
}