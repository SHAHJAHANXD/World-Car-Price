<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'Admin',
            'password' => bcrypt('12345678'),
        ]);
        category::create([
            'category_name' => 'Car',
        ]);
        category::create([
            'category_name' => 'E Car',
        ]);
        category::create([
            'category_name' => 'Bikes',
        ]);
        category::create([
            'category_name' => 'E Bikes',
        ]);
        category::create([
            'category_name' => 'BiCycles',
        ]);
        category::create([
            'category_name' => 'E BiCycles',
        ]);
        category::create([
            'category_name' => 'False Ceiling',
        ]);
    }
}
