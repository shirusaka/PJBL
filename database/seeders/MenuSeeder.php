<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'nama_menu' => 'Ayam Kampung Goreng Kremes',
            'harga' => 25000,
            'deskripsi' => 'Ayam kampung yang dimarinasi dengan bumbu tradisional bawang putih, ketumbar, dan kunyit. Serta, ditaburi kremes yang menyatu dalam sajian yang sederhana namun istimewa.',
            'promo' => true,
            'gambar' => 'ayam_goreng_kremes.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Ayam Kampung Bakar Kecap',
            'harga' => 90000,
            'deskripsi' => 'Ayam kampung dibakar dengan olesan bumbu kecap manis yang meresap hingga ke dalam daging. Disajikan bersama sambal pedas, lalapan segar, dan nasi putih hangat yang melengkapi kelezatan rasa khas rumahan.',
            'promo' => false,
            'gambar' => 'ayam_kampung_bakar_kecap.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Ayam Kampung Bakar Taliwang',
            'harga' => 90000,
            'deskripsi' => 'Ayam kampung yang dibakar dengan bumbu khas Taliwang yang pedas gurih, meresap hingga ke serat daging. Sajian ini menghadirkan cita rasa autentik Lombok dalam balutan aroma bakaran yang menggoda.',
            'promo' => false,
            'gambar' => 'ayam_bakar_taliwang.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Bebek Goreng Kremes',
            'harga' => 100000,
            'deskripsi' => 'Bebek pilihan digoreng hingga renyah, lalu ditaburi kremesan gurih yang menggoda selera. Disajikan dengan sambal pedas, lalapan segar, dan nasi putih sebagai pelengkap sempurna.',
            'promo' => false,
            'gambar' => 'bebek_goreng_kremes.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Ayam Kampung Ungkep (Frozen)',
            'harga' => 80000,
            'deskripsi' => 'Ayam kampung dimasak dengan bumbu kuning khas, lalu dikemas vacuum dan dibekukan. Praktis dan siap digoreng atau dibakar kapan saja, tetap menghadirkan rasa autentik.',
            'promo' => false,
            'gambar' => 'ayam_frozen_ungkep.png',
            'username' => 'admin01',
        ]);
            
        Menu::create([
            'nama_menu' => 'Ayam Kampung Kecap (Frozen)',
            'harga' => 80000,
            'deskripsi' => 'Ayam kampung yang dimasak dengan perpaduan kecap manis, bawang putih, dan rempah pilihan, lalu dibekukan dan dikemas vacuum untuk kemudahan penyajian. Rasa manis gurihnya tetap terjaga dalam setiap gigitan.',
            'promo' => true,
            'gambar' => 'ayam_frozen_kecap.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Ayam Kampung Taliwang (Frozen)',
            'harga' => 80000,
            'deskripsi' => 'Ayam kampung berbumbu Taliwang yang telah dimarinasi, dibekukan, dan dikemas secara vacuum, siap diolah kapan saja. Praktis tanpa mengurangi kelezatan pedas gurih khas Taliwang yang meresap sempurna.',
            'promo' => false,
            'gambar' => 'nasi_box.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Bebek Ungkep (Frozen)',
            'harga' => 85000,
            'deskripsi' => 'Bebek dimasak dengan bumbu kuning hingga empuk, lalu dikemas vacuum dan dibekukan. Siap digoreng atau dibakar, tetap mempertahankan cita rasa tradisional.',
            'promo' => false,
            'gambar' => 'bebek_frozen_ungkep.png',
            'username' => 'admin01',
        ]);
        
        Menu::create([
            'nama_menu' => 'Nasi Box',
            'harga' => 25000,
            'deskripsi' => 'Paket lengkap berisi nasi putih, ayam, sambal, sayur, lalapan, kerupuk, sambel, dan air mineral. Cocok untuk makanan di berbagai acara yang praktis dengan rasa yang tetap istimewa.',
            'promo' => false,
            'gambar' => 'nasi_box.jpg',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Tumpeng',
            'harga' => 350000,
            'deskripsi' => 'Nasi kuning khas Indonesia disajikan dengan ayam kampung goreng kremes, sambal, lalapan, telur balado, mie goreng, perkedel, dan kerupuk. Cocok untuk perayaan dan acara spesial.',
            'promo' => false,
            'gambar' => 'tumpeng.jpg',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Bento Karakter',
            'harga' => 1,
            'deskripsi' => 'Nasi bento yang disusun menyerupai karakter lucu, lengkap dengan lauk bergizi seperti ayam, telur, dan sayuran. Cocok untuk anak-anak, menghadirkan keceriaan dalam setiap kotak makan.',
            'promo' => false,
            'gambar' => 'nasi_box.jpg',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Bakakak Hampers',
            'harga' => 100000,
            'deskripsi' => 'Ayam bakakak utuh yang dibumbui dan dipanggang hingga empuk, dikemas cantik dalam hampers eksklusif. Cocok sebagai hantaran atau hadiah spesial dengan sentuhan tradisional.',
            'promo' => false,
            'gambar' => 'bakakak_hampers.jpg',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Prasmanan',
            'harga' => 100000,
            'deskripsi' => 'Pilihan menu lengkap yang disajikan secara buffet, terdiri dari lauk pauk khas Indonesia, nasi, sayur, dan pelengkap lainnya. Cocok untuk acara keluarga, arisan, atau perayaan dengan nuansa hangat dan meriah.',
            'promo' => false,
            'gambar' => 'mie_ayam_bakso.png',
            'username' => 'admin01',
        ]);

        Menu::create([
            'nama_menu' => 'Ayam Karkas',
            'harga' => 70000,
            'deskripsi' => 'Ayam kampung mentah yang telah dibersihkan dan dikemas vacuum, siap untuk diolah. Cocok sebagai stok bahan masakan di rumah dengan kualitas terjaga.',
            'promo' => false,
            'gambar' => 'karkas.jpeg',
            'username' => 'admin01',
        ]);

    }
}
