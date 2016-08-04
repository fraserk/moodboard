<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          'name' => 'Design'
        ]);
        DB::table('categories')->insert([
          'name' => 'Color Palette'
        ]);
        DB::table('categories')->insert([
          'name' => 'Typegraphy'
        ]);
        DB::table('categories')->insert([
          'name' => 'Media'
        ]);
        DB::table('categories')->insert([
          'name' => 'ions'
        ]);
        DB::table('categories')->insert([
          'name' => 'Grids'
        ]);
        DB::table('categories')->insert([
          'name' => 'Module Elements'
        ]);
    }
}
