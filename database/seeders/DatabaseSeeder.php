<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use App\Models\Dkm;
use App\Models\Event;
use App\Models\Profile;
use App\Models\User;
use App\Models\Ustaz;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Eris Sulistina',
            'image' => 'admin.png',
            'email' => 'derissulistina@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Profile::create([
            'name' => 'Masjid Baiturrahim',
            'logo' => 'assets/logo-masjid.png',
            'description' => 'Masjid Baiturrahim adalah masjid umat yang dibangun oleh umat, dirawat oleh umat, dan dimanfaatkan untuk kemaslahatan umat',
            'hero' => 'jumbotron.jpg',
            'tagline' => 'Perbaiki Sholatmu Maka Allah Akan Perbaiki Hidupmu',
        ]);

        Ustaz::create([
            'name' => 'Ustaz. Abdul Muiz',
            'image' => 'u1.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Ustaz::create([
            'name' => 'Mister. Rangga Saputra',
            'image' => 'u6.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Ustaz::create([
            'name' => 'Ustazah. Santi Mustika Dewi',
            'image' => 'u5.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Ustaz::create([
            'name' => 'Ustazah. Resti Aulia',
            'image' => 'u2.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Ustaz::create([
            'name' => 'Ustazah. Raisya Camelia',
            'image' => 'u7.jpg',
            'link' => '#',
            'description' => 'description',
        ]);

        Dkm::create([
            'name' => 'M Rizal Maulana',
            'position' => 'Ketua',
            'image' => 'DKM1.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Yusuf Ilyas',
            'position' => 'Sekretaris',
            'image' => 'DKM2.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Vina Maryanti',
            'position' => 'Bendahara',
            'image' => 'DKM3.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Bagas Mahardika',
            'position' => 'Bidang Keagamaan',
            'image' => 'DKM4.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Sintya Sari',
            'position' => 'Bidang Kebersihan',
            'image' => 'DKM5.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Fikri Purnama',
            'position' => 'Bidang Keamanan',
            'image' => 'DKM6.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Anwar Fikri',
            'position' => 'Bidang Pemberdayaan Science',
            'image' => 'DKM7.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Mila Nur Jannah',
            'position' => 'Bidang Pemberdayaan Teknologi',
            'image' => 'DKM8.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Annisa Wulandari',
            'position' => 'Bidang Pemberdayaan Perempuan',
            'image' => 'DKM9.jpg',
            'link' => '#',
            'description' => 'description',
        ]);
        Dkm::create([
            'name' => 'Fatin Sholehah',
            'position' => 'Bidang Pemberdayaan Perempuan',
            'image' => 'DKM10.jpg',
            'link' => '#',
            'description' => 'description',
        ]);

        Event::create([
            'event_name' => 'Pengajian Bulanan Kedusunan',
            'time' => Carbon::now(),
            'location' => 'Kp. Cigalontang',
            'participant' => 'Dusun Cigalontang',
        ]);
        Event::create([
            'event_name' => 'Memperingati Maulid Nabi SAW',
            'time' => Carbon::tomorrow(),
            'location' => 'Kp. Jepara',
            'participant' => 'Umum',
        ]);
        Event::create([
            'event_name' => 'Lebaran Idul Fitri',
            'time' => Carbon::tomorrow(),
            'location' => 'Kp. Ciandum',
            'participant' => 'Umum',
        ]);
        Event::create([
            'event_name' => 'Halal bihalal',
            'time' => Carbon::tomorrow(),
            'location' => 'Kp. Kampaan',
            'participant' => 'Umum',
        ]);
        Event::create([
            'event_name' => 'Bulan Depan',
            'time' => Carbon::now()->addMonth(),
            'location' => 'Kp. Kampaan',
            'participant' => 'Umum',
        ]);
        Event::create([
            'event_name' => 'Tahun Depan',
            'time' => Carbon::now()->addYear(),
            'location' => 'Kp. Kampaan',
            'participant' => 'Umum',
        ]);

        Category::create([
            'name' => 'Informasi',
            'slug' => 'informasi',
        ]);
        Category::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan',
        ]);

        Article::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
