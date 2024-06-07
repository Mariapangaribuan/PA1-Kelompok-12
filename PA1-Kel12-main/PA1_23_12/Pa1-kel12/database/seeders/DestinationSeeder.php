<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = [
            [
                'name' => 'Pemandian Manigom Nauli',
                'slug' => 'Pemandian-Manigom-Nauli',
                'ticket' => '5.000',
                'location' => 'Tiga Dolok, Kecamatan Dolok Panribuan, Kabupaten Simalungun',
                'destination_category_id' => 1,
                'kabupaten_id' => 2,
                'is_share' => 1,
                'description' => 'Meskipun lokasi wisata ini jauh dari pusat Kota Simalungun, namun perjalanan Anda akan terbayar lunas ketika sudah menikmati segarnya air dari mata air alami yang memancar. Airnya yang jernih dan pepohonan yang rindang menambah nyaman ketika Anda berenang atau sekedar duduk-duduk santai ditepian kolam pemandian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pantai Lumban Silintong',
                'slug' => 'pantai-lumban-silintong',
                'ticket' => '10.000',
                'location' => 'Balige',
                'destination_category_id' => 1,
                'kabupaten_id' => 1,
                'is_share' => 1,
                'description' => 'Jadi tempat wisata yang menarik di Sumatera Utara. Terletak di Balige, Tobasa. Tepi laut ini mempunyai ombak yang tidak sangat kokoh, sehingga rata- rata wisatawan turis yang berkunjung sangat cocok buat kegiatan berenang dengan nyaman di air.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air Terjun Sikulikap',
                'slug' => 'air-terjun-sikulikap',
                'ticket' => '5.000',
                'location' => 'Penatapan Doulu,Karo',
                'destination_category_id' => 1,
                'kabupaten_id' => 6,
                'is_share' => 1,
                'description' => 'Air Terjun Sikulikap merupakan wisata air terjun yang berada kabupaten Karo, Sumatera Utara. Berlokasi di bawah daerah Penatapan Doulu, air terjun dengan ketinggian setidaknya 30 meter ini sangat memukau.
                Berwisata ke destinasi alami tersebut, wisatawan bisa merasakan harumnya aroma hutan cemara di sekitarnya. Lokasinya juga menjadi tempat pilihan bagi banyak aktivitas wisata sekaligus olahraga.
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taman hutan raya bukit barisan',
                'slug' => 'Taman-hutan-raya-bukit-barisan',
                'ticket' => '5.000',
                'location' => 'Penatapan Doulu,Karo',
                'destination_category_id' => 1,
                'kabupaten_id' => 6,
                'is_share' => 1,
                'description' => 'Tahura Bukit Barisan merupakan Tahura ketiga di Indonesia yang ditetapkan oleh Presiden dengan Surat Keputusan Presiden R.I. No. 48 Tahun 1988 tanggal 19 Nopember 1988 dengan luas ± 51.600 Ha. Tahura Bukit Barisan secara geografis terletak pada 001’16"-019’37" Lintang Utara dan 9812’16"-9841’00" Bujur Timur. Sedangkan secara administratif termasuk Kecamatan Tiga Panah, Kabupaten Tanah Karo, Propinsi Sumatera Utara. Pembangunan Tahura ini sebagai upaya konservasi sumber daya alam dan pemanfaatan lingkungan melalui peningkatan fungsi dan peranan hutan.
                Tahura Bukit Barisan adalah unit pengelolaan yang berintikan kawasan hutan lindung dan kawasan konservasi denga luas seluruhnya 51.600 Ha. Sebagian besar merupakan hutan lindung berupa hutan alam pegunungan yang ditetapkan sejak jaman Belanda, meliputi Hutan Lindung Sibayak I dan Simancik I, Hutan Lindung Sibayak II dan Simancik II serta Hutan Lindung Sinabung.
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bukit kubu',
                'slug' => 'Bukit-kubu',
                'ticket' => '100.000',
                'location' => 'Berastagi Karo',
                'destination_category_id' => 1,
                'kabupaten_id' => 6,
                'is_share' => 1,
                'description' => 'Bukit Kubu merupakan kawasan wisata taman rekreasi di Berastagi, Karo, Sumatera Utara. Lahan seluas lima hektar ini memiliki bentang padang rumput menghijau dengan kontur bukit landai. Pepohonan pinus berbaris membingkai kawasan yang asri dengan hawa yang sejuk ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemandian air Soda',
                'slug' => 'Pemandian-air-Soda',
                'ticket' => '15.000',
                'location' => 'Tapanuli Utara',
                'destination_category_id' => 1,
                'kabupaten_id' => 3,
                'is_share' => 1,
                'description' => 'Dari namanya saja kamu sudah bisa mengetahui bahwa objek wisata di Tapanuli Utara ini sangat unik. Bagaimana tidak? Berbeda dengan pemandian pada umumnya, di Pemandian Air Soda Parbubu kamu bisa berendam di kolam yang airnya mengeluarkan buih-buih gas layaknya air soda! Pemandian sejenis ini sendiri hanya terdapat dua saja di dunia, lho. Selain di Desa Parbubu, kamu bisa menemukan pemandian air soda di Venezuela.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air panas Sipaholon',
                'slug' => 'Air-panas-Sipaholon',
                'ticket' => '15.000',
                'location' => 'Tapanuli Utara',
                'destination_category_id' => 1,
                'kabupaten_id' => 3,
                'is_share' => 1,
                'description' => 'Pemandian air panas yang terletak di Situmeang Habinsaran, Kecamatan Sipoholon, Tapanuli Utara ini memiliki banyak persamaan dengan Pamukkale. Di setiap sudutnya, ada pegunungan pasir yang memancarkan warna putih bak kapas. Selain itu, aliran air panas dengan suhu 40 hingga 70 derajat celcius menjadikan tempat ini serasa surga lain di tanah Indonesia. Liburan ke sini, dijamin tidak ingin pulang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pulau simamora',
                'slug' => 'Pulau-simamora',
                'ticket' => '0',
                'location' => 'Tapanuli Utara',
                'destination_category_id' => 1,
                'kabupaten_id' => 4,
                'is_share' => 1,
                'description' => 'Pulau Simamora adalah sebuah pulau yang tidak berpenghuni. Bukan karena, kondisi wilayahnya yang kecil. Melainkan, topografi dari pulau ini sendiri yang kurang ramah untuk dihuni. Perbukitan dengan pepohonan dan bebatuan yang begitu banyak menghiasai kawasan ini.
                Sehingga, saat anda mengunjunginya. Anda hanya bisa duduk di sampan dan melihat lebih dekat lagi pesona dari Simamora. Keindahan Pulau Simamora memang mengesankan nurani. Gundukan yang terlihat dari jauh mengingatkan kita akan sebuah gambar pemandangan anak-anak mengenai sebuah pulau. Apalagi, dengan langitnya yang biru mempesona. Waktu berkunjung yang paling tepat adalah pukul 9 hingga 10 pagi.
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taman wisata iman',
                'slug' => 'Taman-wisata-iman',
                'ticket' => '
                Dewasa	: Rp10.000
                Anak-anak	: Rp5.000
                ',
                'location' => 'Tapanuli Utara',
                'destination_category_id' => 3,
                'kabupaten_id' => 5,
                'is_share' => 1,
                'description' => 'Taman Wisata Iman Sitinjo (TWI Sitinjo) merupakan salah satu destinasi wisata unggulan kabupaten Dairi. Destinasi wisata ini disebut-sebut merupakan satu dari tujuh wisata paling unik dan langka di dunia. Kawasannya menyajikan wisata yang menggabungkan konsep wisata religi dengan wisata alam.
                Taman Wisata Iman terletak di sebuah perbukitan di Kecamatan Sitinjo, Sidikalang. Kawasan ini menyuguhkan sejumlah tempat peribadatan dari agama-agama yang ada di Indonesia. Selain itu wisatawan bisa menyaksikan dan menikmati indahnya panorama alam Kabupaten Dairi.
                Jam Buka
                Senin - Minggu : 06.00 - 18.30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // tambahkan data destinasi lainnya sesuai kebutuhan
        ];
        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
