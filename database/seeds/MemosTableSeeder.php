<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->insert([
            'title' => "Class ‘Form’ not found",
            'content' => "form",
            'category_id' => 1,
            'user_id' => 1
        ]);
        DB::table('memos')->insert([
            'title' => 'Installation failed, reverting ./composer.json to its original content.',
            'content' => 'composer require laravelcollective/htmlこれでいけない時バージョンがどうたらなエラーだったりするcomposer require "laravelcollective/html":"^5.4"でいけた',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('memos')->insert([
            'title' => "Can't connect to local MySQL server through socket '/tmp/mysql.sock'",
            'content' => "データベースの状態を確認sudo /etc/init.d/mysqld statusデータベース停止していたらこれを実行sudo /etc/init.d/mysqld restart",
            'category_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('memos')->insert([
            'title' => "Can't connect to local MySQL server through socket '/tmp/mysql.sock'",
            'content' => "データベースの状態を確認sudo /etc/init.d/mysqld statusデータベース停止していたらこれを実行sudo /etc/init.d/mysqld restart",
            'category_id' => 1,
            'user_id' => 1,
        ]);
    }
}
