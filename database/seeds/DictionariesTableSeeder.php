<?php

use Illuminate\Database\Seeder;

class DictionariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Taipei');
        DB::table('dictionaries')->truncate();
        $faker = Faker\Factory::create();
        $faker2 = Faker\Factory::create('zh_CN');
        $faker3 = Faker\Factory::create('zh_TW');
        $limit = 100;
        //英文假資料
        for ($i = 0; $i < $limit; $i++) {
            DB::table('dictionaries')->insert([
                'lang' => 'en_US',
                'word' => $faker->unique()->word,
                'founder' =>'user1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
        //中文假資料_zh_CN
        for ($i = 0; $i < $limit; $i++) {
            DB::table('dictionaries')->insert([
                'lang' => 'zh_CN',
                'word' => $faker2->unique()->name,
                'founder' =>'user2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
        //中文假資料_zh_TW
        for ($i = 0; $i < $limit; $i++) {
            DB::table('dictionaries')->insert([
                'lang' => 'zh_TW',
                'word' => $faker3->unique()->name,
                'founder' =>'user3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
    }
}
