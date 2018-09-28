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
        DB::table('widgets')->insert([
            [
                'enable' => 1,
                'type' => '_brown',
                'name' => 'Aventure',
            ],
            [
                'enable' => 1,
                'type' => '_green',
                'name' => 'Nature',
            ],
            [
                'enable' => 1,
                'type' => '_yellow',
                'name' => 'Sun Shine',
            ],
            [
                'enable' => 1,
                'type' => '_red',
                'name' => 'Bloody Mary',
            ],
            [
                'enable' => 1,
                'type' => '_blue',
                'name' => 'Ocean',
            ]
        ]);
    }
}
