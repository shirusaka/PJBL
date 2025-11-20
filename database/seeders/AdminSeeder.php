<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin01',
            'password' => Hash::make('12341234'),
            'name' => 'Zahran',
            'address' => 'Aeon Tanjung Barat',
            'email' => 'zahran@gmail.com',
            'phone' => '628118509743',
        ]);
    }
}
