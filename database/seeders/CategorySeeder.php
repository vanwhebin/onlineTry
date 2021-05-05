<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        if (DB::table('category')->exists()) {
//            $this->command->getOutput()->writeln('<question>Skipping: ' . __CLASS__ . '</question>');
//
//            return;
//        }
        Category::truncate();
        Category::factory(100)->create();


    }
}
