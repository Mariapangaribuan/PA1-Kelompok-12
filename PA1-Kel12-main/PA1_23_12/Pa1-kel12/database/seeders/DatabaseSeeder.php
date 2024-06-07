<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KabupatenSeeder::class);
        $this->call(DestinationCategorySeeder::class);
        // $this->call(DestinationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ContributorSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(RestaurantSeeder::class);
        $this->call(BlogCategorySeeder::class);
        // $this->call(BlogSeeder::class);
        // $this->call(Accommodation::class);
    }
}
