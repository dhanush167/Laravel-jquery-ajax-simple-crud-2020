<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();

		for ($i=0; $i<10;$i++) {
			DB::table('posts')->insert([
				'title' => $faker->title,
				'author' => $faker->name,
				'description' => $faker->text,
			]);
		}
    }
}
