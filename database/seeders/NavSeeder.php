<?php

namespace Database\Seeders;

use App\Models\Nav;
use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nav::truncate();
        Nav::factory(15)->create();
    }
}
