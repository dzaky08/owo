<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Kamar;
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
        Hotel::create([
            'id' => '1',
            'nama' => 'Hotel Taman Sari',
            'alamat' => 'di Sukabumi belah kidul dikit',
            'rating' => '3',
            'foto' => 'img/hoteltamansari.jpg',
        ]); 
        Hotel::create([
            'id' => '2',
            'nama' => 'Hotel Horison',
            'alamat' => 'di sukabumi cuma teu apal abdi ge',
            'rating' => '4',
            'foto' => 'img/hotelhorison.jpg',
        ]); 
        Kamar::create([
            'hotel_id' => '1',
            'nama' => 'Premium',
            'deskripsi' => 'Free Wif, AC, TV, Twinbed',
            'foto_kamar' => 'img/superiorroom.jpg',
            'harga' => 500000,
        ]); 
        Kamar::create([
            'hotel_id' => '1',
            'nama' => 'Reguler',
            'deskripsi' => ' AC, TV, Twinbed',
            'foto_kamar' => 'img/juniorsuite.jpg',
            'harga' => 250000,
        ]); 
        Kamar::create([
            'hotel_id' => '2',
            'nama' => 'Presidential Suite ',
            'deskripsi' => 'Free Wif, AC, TV, Twinbed',
            'foto_kamar' => 'img/presidentialsuite.jpg',
            'harga' => 1000000,
        ]); 
        Kamar::create([
            'hotel_id' => '2',
            'nama' => 'Twin Room',
            'deskripsi' => ' AC, TV, Twinbed',
            'foto_kamar' => 'img/twinroom.jpg',
            'harga' => 650000,
        ]); 
    }
}
