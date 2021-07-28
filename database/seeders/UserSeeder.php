<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'psicologo']);
        
        User::create([
            'name' => 'psicologo',
            'email' => 'psicologo@wem.com',
            'password' => Hash::make('psicologo')
        ])->assignRole('psicologo');

        User::create([
            'name' => 'psicologo_admin',
            'email' => 'psicologo_admin@wem.com',
            'password' => Hash::make('psicologo_admin')
        ])->assignRole(['psicologo', 'admin']);

        User::create([
            'name' => 'Wilberth',
            'email' => 'stwilberth@gmail.com',
            'password' => Hash::make('wlor2015')
        ])->assignRole('admin');
    }
}
