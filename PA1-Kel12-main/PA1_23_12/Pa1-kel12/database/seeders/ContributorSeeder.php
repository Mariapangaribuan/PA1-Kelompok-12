<?php

namespace Database\Seeders;
use App\Models\Contributor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contributors = [
            [
                'name' => 'Hasan',
                'email' => 'hasan@gmail.com',
                'password' => Hash::make('hasan123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($contributors as $contributor) {
            Contributor::create($contributor);
        }
    }
}
