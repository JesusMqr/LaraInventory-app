<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CreddentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $user = User::factory()->create([
        //     'name' => 'jesus',
        //     'email' => 'jesus@correo.es',
        //     'password' => Hash::make('password'),
        // ]);
        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@correo.es',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
        $admin->save();

        
        $supervisor = User::factory()->create([
            'name' => 'Supervisor',
            'email' => 'supervisor@correo.es',
            'password' => Hash::make('password'),
        ]);
        $supervisor->assignRole('supervisor');
        $supervisor->save();


        $user = User::factory()->create([
            'name' => 'Usuario',
            'email' => 'user@correo.es',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
        $user->save();





        // $user->save();
    
    }
}
