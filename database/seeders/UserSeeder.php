<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'name' => 'Test super account',
            'email' => 'super@example.com',
            'password' => Hash::make('test'),
        ]);
        $superAdmin->assignRole('superadmin');

        $admin = User::factory()
            ->admin()
            ->create([
            'name' => 'Test account',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
        ]);
        $admin->assignRole('admin');

        $demo = User::factory()->create([
            'name' => 'Test demo account',
            'email' => 'demo@example.com',
            'password' => Hash::make('test'),
        ]);
        $demo->assignRole('user');

        $admins = User::factory()
            ->count(5)
            ->admin()
            ->create();
        foreach ($admins as $user) {
            $user->assignRole('admin');
        }

        $users = User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    
    }
}
