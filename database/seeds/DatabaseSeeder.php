<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AttractionSeeder::class
        ]);

        DB::table('attraction_user')->insert(array(
            array('user_id' => 1, 'attraction_id' => 2, 'created_at' => now(), 'updated_at' => now()),
            array('user_id' => 2, 'attraction_id' => 2, 'created_at' => now(), 'updated_at' => now()),
            array('user_id' => 1, 'attraction_id' => 1, 'created_at' => now(), 'updated_at' => now()),
            array('user_id' => 1, 'attraction_id' => 3, 'created_at' => now(), 'updated_at' => now())
        ));
    }
}
