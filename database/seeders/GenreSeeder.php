<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name'=>'action',
            'details'=> "",

        ]);
         Genre::create([
              'name'=>'adventure',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>  'thriller',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>'slice of life',
                'details'=> "",
        ]);
         Genre::create([
              'name'=>'drama',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>'romance',
                'details'=> "",
        ]);
         Genre::create([
              'name'=>'school',
                'details'=> "",
        ]);
         Genre::create([
              'name'=>'historical',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>'horror',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>'fantasy',
                 'details'=> "",
        ]);
         Genre::create([
              'name'=>'science fiction',
                'details'=> "",
        ]);
         Genre::create([
              'name'=>'magic',
               'details'=> "",
        ]);
    }
}


