<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupatens = [
            [
                'name' => 'Toba',
                'slug' => 'kabupaten-toba',
                'logo' => 'kabupaten/logo/Toba.png',
                'description' => 'Kabupaten Toba Samosir ini beribukota di Balige. Penduduk aslinya adalah Suku Batak Toba. Bupati Toba Samosir saat ini adalah Ir Darwin Siagian. Wisata andalan kabupaten ini adalah Pantai Lumban Bulbul dan Air terjun Situmurun.'
            ],
            [
                'name' => 'Simalungun',
                'slug' => 'kabupaten-Simalungun',
                'logo' => 'kabupaten/logo/Simalungun.png',
                'description' => 'Kabupaten Simalungun termasuk kabupaten yang mengeliling danau toba. Suku Batak Simalungun adalah penduduk asli dari yang mendiami kabupaten ini. Bupatinya saat ini adalah J.R Saragih yang sedang bertugas untuk periode kedua 2010–2015. Ibu kota Kabupaten Simalungun adalah Pematang Raya. Parapat adalah daerah wisata utama kabupaten ini.'
            ],
            [
                'name' => 'Tapanuli Utara',
                'slug' => 'kabupaten-Tapanuli-utara',
                'logo' => 'kabupaten/logo/Simalungun.png',
                'description' => 'Kabupaten Tapanuli Utara adalah kabupaten induk dari tiga kabupaten (Kabupaten Toba Samosir, Kabupaten Humbang Hasundutan dan Kabupaten Samosir). Setelah dimekarkan menjadi beberapa kabupaten tersebut, wilayah Tapanuli Utara yang ikut mengelilingi Danau Toba adalah Muara. Kabupaten Tapanuli Utara beribukota di Tarutung '
            ],
            [
                'name' => 'Humbang Hasudutan',
                'slug' => 'kabupaten-Humbang-hasudutan',
                'logo' => 'kabupaten/logo/HumbangHasudutan.png',
                'description' => 'Sungai terbesar yang dominan adalah Aek Silang yang bersumber dari air terjun yang tercurah dari bentangan perbukitan. Sungai kedua yang lebih kecil bernama Aek Simangira. Keduanya mengaliri beberapa desa dan bermuara di Danau Toba. Suku asli kabupaten Humbang Hasundutan adalah suku Batak Toba.'
            ],
            [
                'name' => 'Dairi',
                'slug' => 'kabupaten-Dairi',
                'logo' => 'kabupaten/logo/Dairi.png',
                'description' => 'Kabupaten Dairi beribukota di Sidikalang dengan bupati saat ini adalah KRA Johnny Sitohang Adinegoro, Suku asli yang mendiami daerah kabupaten Dairi adalah suku Batak Pak-pak.'
            ],
            [
                'name' => 'Karo',
                'slug' => 'kabupaten-Karo',
                'logo' => 'kabupaten/logo/Karo.png',
                'description' => 'Kabupaten Karo juga termasuk kabupaten pemilik Danau Toba, ibukota kabupaten ini terletak di Kabanjahe. Bupati saat ini yang menjabat adalah Terkelin Brahmana. Tongging merupakan sebuah Desa yang terletak disebelah utara Danau Toba. Tepatnya terletak di Kecamatan Merek, Kabupaten Karo.'
            ],
            [
                'name' => 'Samosir',
                'slug' => 'kabupaten-Samosir',
                'logo' => 'kabupaten/logo/Samosir.jpeg',
                'description' => 'Seperti yang sudah saya sampaikan sebelumnya, Kabupaten Samosir ini adalah kabupaten yang dimekarkan dari kabupaten Toba Samosir sebagai kabupaten induk'
            ],
        ];

        foreach ($kabupatens as $kabupaten) {
            Kabupaten::create($kabupaten);
        }
    
    }
}
