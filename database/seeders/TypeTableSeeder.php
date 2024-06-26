<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Functions\Helper as Help;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front-end', 'Back-end'];
        foreach ($data as $item) {
            $new_item = new Type();
            $new_item->title = $item;
            $new_item->slug = Help::generateSlug($new_item->title, Type::class);
            $new_item->save();
        }
    }
}
