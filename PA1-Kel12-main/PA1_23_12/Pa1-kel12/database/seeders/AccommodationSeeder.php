<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accommodations = [
            [
                'name' => 'Pemandian Manigom Nauli',
                'slug' => 'pemandian-manigom-nauli',
                'image' => 'image-url-1.jpg',
                'category' => 'Hotel',
                'price' => 'Rp 500.000,-',
                'description' => 'Tea Garden Inn menawarkan akomodasi di Simalungun, Sumatera Utara dan berjarak sejauh 350 meter dari Kebun Teh Bahbutong. Properti ini memiliki akses WiFi gratis dan tempat parkir gratis. Setiap kamar dilengkapi dengan AC dan TV. Shower tersedia di kamar mandi. Tamu dapat menikmati makanan di Warung Makan Muslim Sudi Mampir. Pilihan tempat makan lain juga tersedia di sekitar properti. Fasilitas lain yang tersedia di Tea Garden Inn adalah resepsionis 24 jam dan layanan kamar 24 jam. Bandara terdekat adalah Bandar Udara Sibisa, 52,6 km dari properti.',
                'destination_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pantai Lumban Silintong',
                'slug' => 'pantai-lumban-silintong',
                'image' => 'image-url-2.jpg',
                'category' => 'Hotel',
                'price' => 'Rp 1.500.000,-',
                'description' => 'Labersa Toba Hotel & Convention Centre menjadi salah satu hotel Bintang 4 yang siap memberikan pengalaman menginap terbaik di Kota Toba, Tempat nya yang sangat Strategis tepat di Jalan Lintas Raya Pematangsiantar. Dengan layanan Berkelas internasional, dengan berbagai fasilitas mewah. Labersa Toba Hotel  memiliki 152 kamar yang terdiri dari berbagai macam tipe , antara lain Superior Room, Deluxe Room, Deluxe Premiere, Junior Suite, Toba Suite, Royal suite , President Suite. Setiap kamar dilengkapi dengan furnitur mewah serta dilengkapi dengan fasilitas tambahan seperti AC, Perlengkapan mandi, Shower air panas, Televisi, Meja Kerja, serta Akses Wifi gratis dan Layanan tambahan seperti layanan laundry & dry cleaning,Resepsionis 24 jam. Khusus bagi yang menginap di kamar Toba Suite  Anda dapat menikmati Indah nya panorama Danau Toba dan Perbukitan dan Labersa Toba Hotel juga menawarkan Fasiltas Ruang sesuai dengan kebutuhan  bisnis Anda seperti  Toba Ballroom , dan 3 Ruang meeting Lainnya yang biasanya digunakan Untuk Rapat rapat penting , Gathering, Ulang Tahun, Wedding dll . Selain fasilitas Anda pun bisa menikmati berbagai fasilitas umum yang ada di Labersa toba Hotel Seperti Kolam Berenang dan Waterpark, untuk kolam renang dewasa ini juga sangat berdekatan',
                'destination_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        foreach ($accommodations as $accommodation) {
            Accommodation::create($accommodation);
        }
    }
}
