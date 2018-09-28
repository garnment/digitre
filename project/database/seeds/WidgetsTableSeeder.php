<?php

use Illuminate\Database\Seeder;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'enable' => 1,
            'type' => '_brown',
            'name' => 'Aventure'
        ]);
    }
}
