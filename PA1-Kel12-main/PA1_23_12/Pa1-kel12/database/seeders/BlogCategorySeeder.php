<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCategories = [
            [
                'name' => 'Berita',
                'slug' => 'Berita',
                'description' => 'Berisi Informasi mengenai berita sekitaran danau toba'
            ],
            [
                'name' => 'Tips & Tricks',
                'slug' => 'Tips-&-Tricks',
                'description' => 'Berisi informasi mengenai Tips dan tricks ketika berwisata ke sekitaran danau toba'
            ],
            [
                'name' => 'Budaya',
                'slug' => 'Budaya',
                'description' => 'Berisi Informasi mengenai Budaya dan adat di sekitaran danau toba'
            ],
            [
                'name' => 'Kulineran',
                'slug' => 'Kulineran',
                'description' => 'Berisi informasi mengenai kuliner dan makanan khas sekitaran danau toba '
            ],
            [
                'name' => 'Unik',
                'slug' => 'Unik',
                'description' => 'Berisi informasi yang pastinya unik di daerah sekitaran danau toba '
            ],
            [
                'name' => 'Event',
                'slug' => 'Event',
                'description' => 'Berisi informasi Mengenai Event yang terjadi di sekitaran danau toba'
            ],
            ];
            foreach ($blogCategories as $blogCategory) {
                BlogCategory::create($blogCategory);
            }
    }
}
