<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DestinationCategory;

class DestinationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinationCategories = [
            [
                'name' => 'Destinasi Alami',
                'slug' => 'destinasi-alami',
                'description' => 'Berisi destinasi alami'
            ],
            [
                'name' => 'Destinasi Buatan',
                'slug' => 'destinasi-buatan',
                'description' => 'Berisi destinasi buatan'
            ],
            [
                'name' => 'Destinasi Religi',
                'slug' => 'destinasi-religi',
                'description' => 'Berisi destinasi religi'
            ],
            [
                'name' => 'Destinasi Budaya',
                'slug' => 'destinasi-budaya',
                'description' => 'Berisi destinasi budaya'
            ],
            ];
            foreach ($destinationCategories as $destinationCategory) {
                DestinationCategory::create($destinationCategory);
            }
    }
}
