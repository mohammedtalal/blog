<?php

use Illuminate\Database\Eloquent\Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 1000 ; $i++) { 
            /*
            * create first user as admin
            * email: admin@admin.com
            * psw  : 123456
            */
            if ($i < 1) {   
                DB::table('users')->insert([
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'avatar' => $faker->image,
                    'password' => '$2y$10$VFVVE63eCRqZshp9tNlaV.sFeqcxgBzLA82M.eOVZDlMcOWNpz2hK',
                    'remember_token' => 'YLrAjEZOHXVDDQy85p6Kial6K8rXbJq8Ai5u3aCT4CaeeYzwOWiZnv3VOxfT',
                ]);
            }
        	DB::table('users')->insert([
	            'name' => $faker->name,
		        'email' => $faker->unique()->safeEmail,
		        'avatar' => $faker->image,
		        'password' => str_random(10),
		        'remember_token' => str_random(10),
        	]);
        }
    }
}
