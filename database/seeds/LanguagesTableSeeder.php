<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Taipei');
        DB::table('languages')->truncate();

        DB::table('languages')->insert([
            'lang' => 'ALL',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('languages')->insert([
            'lang' => 'zh_CN',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('languages')->insert([
            'lang' => 'zh_TW',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('languages')->insert([
            'lang' => 'en_US',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }

}
