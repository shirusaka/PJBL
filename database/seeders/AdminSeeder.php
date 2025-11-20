<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin01',
            'password' => Hash::make('12341234'),
            'nama' => 'Zahran',
            'alamat' => 'Aeon Tanjung Barat',
            'no_telp' => '628118509743',
        ]);
    }
}
