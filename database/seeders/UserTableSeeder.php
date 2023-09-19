<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追記

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //userのダミーデータを2つ作成
        DB::table('users')->insert([
            [
                //adminではないユーザー
                'name' => 'test1',
                'email' => 'test1@test',
                'password' => bcrypt('test'),
            ],
            [
                //adminユーザー
                'name' => 'test2',
                'email' => 'test2@test',
                'password' => bcrypt('test'),
            ],
        ]);
    }
}
