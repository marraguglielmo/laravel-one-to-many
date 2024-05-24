<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Functions\Helper as Help;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS', 'Javascript', 'VUE', 'LARAVEL',];
        foreach ($data as $item) {
            $new_item = new Technology();
            $new_item->title = $item;
            $new_item->slug = Help::generateSlug($new_item->title, Technology::class);
            $new_item->save();
        }
    }
}
