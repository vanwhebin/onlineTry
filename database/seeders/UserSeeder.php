<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (DB::table('users')->exists()) {
            $this->command->getOutput()->writeln('<question>Skipping: '.__CLASS__.'</question>');

            return;
        }
        // 清空一数据表
        User::truncate();
        \App\Models\User::factory(100)->create();
        DB::table('users')->where('id', '=', 1)
            ->update(['password' => bcrypt(123456)]);
    }
}
