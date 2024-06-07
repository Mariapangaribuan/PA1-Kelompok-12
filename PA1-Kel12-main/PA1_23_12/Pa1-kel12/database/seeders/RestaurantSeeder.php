<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'name' => 'Rumah Makan khas batak Lamsiar',
                'kabupaten_id' => 1,
                'location' => 'Lokasi Restoran 1',
                'phone' => '063321516',
                'description' => 'Opsi layanan: Makan di tempat · Bawa pulang · Tidak menyediakan layanan pengiriman
                Alamat: Jl. Mayjend. D. I. Panjaitan No.51, Hutatoruan X, Kec. Tarutung, Kabupaten Tapanuli Utara, Sumatera Utara 22411
                Jam: 
                Buka ⋅ Tutup pukul 22.00'
            ],
            [
                'name' => 'Rumah Makan khas batak Rap Taruli',
                'kabupaten_id' => 6,
                'location' => 'Lokasi Restoran 1',
                'phone' => '081375383485',
                'description' => 'Opsi layanan: Makan di tempat · Bawa pulang
                Alamat: 7263+P48, Silando, Kec. Muara, Kabupaten Tapanuli Utara, Sumatera Utara 22312
                Jam: 
                Buka ⋅ Tutup pukul 00.00'
            ],
            [
                'name' => 'Rumah Makan Muslim Odon',
                'kabupaten_id' => 4,
                'location' => 'Lokasi Restoran 1',
                'phone' => '082160895338',
                'description' => 'Opsi layanan: Makan di tempat · Bawa pulang
                Alamat: 6G4Q+764, Jl. Jamin Ginting, Dolat Rayat, Kec. Dolat Rayat, Kabupaten Karo, Sumatera Utara 22152
                Jam: 
                Buka 24 jam'
            ],
            [
                'name' => 'Deep art Cafe',
                'kabupaten_id' => 4,
                'location' => 'Lokasi Restoran 1',
                'phone' => '082161344954',
                'description' => 'MASAKAN
                Indonesia, Bar, Kafe, Asia, Pub
                DIET KHUSUS
                Sesuai untuk Vegetarian, Pilihan Vegan
                MAKANAN
                Makan Siang, Makan Malam, Brunch, Larut Malam, Minuman
                FITUR
                Tempat Duduk, Menyajikan Alkohol, Bawa Pulang, Tempat Duduk di Area Terbuka, Tersedia Tempat Parkir, Tersedia Kursi Tinggi, Bar Lengkap, Anggur dan Bir, Pelayanan di Meja'
            ],
            [
                'name' => 'Damar Toba',
                'kabupaten_id' => 2,
                'location' => 'Lokasi Restoran 1',
                'phone' => '082161344954',
                'description' => 'Damar Toba is strategically located on the southern shores of Lake Toba, as it can be reached in 40 minutes by road from Silangit International Airport. Established to help unlock the full potential of Lake Toba tourism, Damar Toba is managed by a team of professionals with prior senior exposure at four or 5-star hotels.
                This hotel has quickly become a prime destination for visitors or tourists to Lake Toba. Damar Toba serves guests and visitors with a unique combination of Toba’s lakeside elegant dining, boutique accommodation, and event space in Balige, Toba Regency, North Sumatra.'
            ],
            [
                'name' => 'Rumah Makan Khas Batak Silindung Simalungun',
                'kabupaten_id' => 2,
                'location' => 'Lokasi Restoran 1',
                'phone' => '082161344954',
                'description' => 'Once the promenade around the Vihara Avalokitsvara - Statue of Dewi Kwan Im is over, visit Rumah Makan Khas Batak Silindung Simalungun. This restaurant offers its visitors to degust Indonesian cuisine. Good ikan bakar, kota and Bbq pork might be what you need.
                Rumah Makan Khas Batak Silindung Simalungun has received Google 4.5 according to the guests opinions.'
            ],
            [
                'name' => 'Dope Berastagi',
                'kabupaten_id' => 2,
                'location' => 'Lokasi Restoran 1',
                'phone' => '081365997007',
                'description' => 'Opsi layanan: Makan di tempat · Bawa pulang
                Alamat: jl. Barusjahe, Desa Basam, Jl. Tongkoh, Kec. Berastagi, Sumatera Utara 22171
                Jam: 
                Kamis	12.00-21.00
                Jumat	12.00-21.00
                Sabtu	11.00-22.00
                Minggu	11.00-22.00
                Senin	12.00-21.00
                Selasa	12.00-21.00
                Rabu	12.00-21.00
                Sarankan jam buka baru'
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
