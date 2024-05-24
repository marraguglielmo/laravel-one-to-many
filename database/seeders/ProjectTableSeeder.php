<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Functions\Helper as Help;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'project1',
                'languages' => ['HTML', 'JavaScript']
            ],
            [
                'name' => 'project2',
                'languages' => ['HTML', 'CSS', 'JavaScript']
            ],
            [
                'name' => 'project3',
                'languages' => ['HTML', 'CSS', 'Vue']
            ],
            [
                'name' => 'project4',
                'languages' => ['PHP']
            ],
            [
                'name' => 'project5',
                'languages' => ['Laravel', 'CSS', 'JavaScript']
            ],
            [
                'name' => 'project6',
                'languages' => ['Laravel', 'JavaScript']
            ],
            [
                'name' => 'project7',
                'languages' => ['HTML', 'CSS', 'Vue', 'Laravel']
            ],

        ];


        foreach ($data as $item) {
            $new_item = new Project();
            $new_item->title = $item['name'];
            $new_item->languages = implode(', ', $item['languages']);
            $new_item->slug = Help::generateSlug($new_item->title, Project::class);
            $new_item->save();
        }
    }
}
