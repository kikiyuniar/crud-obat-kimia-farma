<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
               'name'       => 'Administrator',
               'email'      => 'admin@gmail.com',
               'password'   => Hash::make('admin'),
               'username'   => 'admin'
            ],
        ];
    
        foreach ($role as $roles) {
            User::create($roles);
            
        }
    }
}
