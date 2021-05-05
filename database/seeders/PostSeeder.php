<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        if (DB::table('posts')->exists()) {
//            $this->command->getOutput()->writeln('<question>Skipping: ' . __CLASS__ . '</question>');
//
//            return;
//        }
        Post::truncate();
        Post::factory(100)->create();
    }
}
