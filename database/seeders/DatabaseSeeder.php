<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
<<<<<<< HEAD
use App\Models\Kamar;
=======
>>>>>>> 2096dcd649f98d2d5431eff9df48a310e027f355
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama' => 'user1',
            'email' => 'u1@gmail.com',
            'password' => bcrypt('user1'),
            'role' => 'user',
        ]); 
        User::create([
            'nama' => 'admin1',
            'email' => 'a1@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin',
        ]); 
<<<<<<< HEAD
        Hotel::create([
            'nama' => 'Hotel Taman Sari',
            'alamat' => 'di Sukabumi belah kidul dikit',
            'rating' => '3',
            'foto' => 'img/hoteltamansari.jpg',
        ]); 
        Hotel::create([
            'nama' => 'Hotel Horison',
            'alamat' => 'di sukabumi cuma teu apal abdi ge',
            'rating' => '4',
            'foto' => 'img/hotelhorison.jpg',
        ]); 
        Kamar::create([
            'hotel_id' => 1,
            'nama' => 'premium',
            'deskripsi' => 'memiliki fasilitas: Free Wif, AC, TV, Twinbed',
            'foto' => 'img/superiorroom.jpg',
            'harga' => 500000,
        ]); 
        Kamar::create([
            'hotel_id' => 1,
            'nama' => 'reguler',
            'deskripsi' => 'kamar ini memiliki fasilitas: AC, TV, Twinbed',
            'foto' => 'img/juniorsuite.jpg',
            'harga' => 250000,
        ]); 
=======
>>>>>>> 2096dcd649f98d2d5431eff9df48a310e027f355
    }
}
