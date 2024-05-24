<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
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
                'languages' => ['HTML', 'JavaScript'],
                'git_hub_url' => 'https://github.com/marraguglielmo/laravel-dc-comics.git'
            ],
            [
                'name' => 'project2',
                'languages' => ['HTML', 'CSS', 'JavaScript'],
                'git_hub_url' => 'https://github.com/marraguglielmo/laravel-boolando.git'
            ],
            [
                'name' => 'project3',
                'languages' => ['HTML', 'CSS', 'Vue'],
                'git_hub_url' => 'https://github.com/marraguglielmo/php-dischi-json.git'
            ],
            [
                'name' => 'project4',
                'languages' => ['PHP'],
                'git_hub_url' => 'https://github.com/marraguglielmo/proj-html-vuejs.git'
            ],
            [
                'name' => 'project5',
                'languages' => ['Laravel', 'CSS', 'JavaScript'],
                'git_hub_url' => 'https://github.com/marraguglielmo/vite-rick-morty.git'
            ],
            [
                'name' => 'project6',
                'languages' => ['Laravel', 'JavaScript'],
                'git_hub_url' => 'https://github.com/marraguglielmo/vue-boolzapp.git'
            ],
            [
                'name' => 'project7',
                'languages' => ['HTML', 'CSS', 'Vue', 'Laravel'],
                'git_hub_url' => 'https://github.com/marraguglielmo/vue-slider.git'
            ],

        ];


        foreach ($data as $item) {
            $new_item = new Project();
            $new_item->type_id = Type::inRandomOrder()->first()->id;
            $new_item->title = $item['name'];
            $new_item->languages = implode(', ', $item['languages']);
            $new_item->github_url = $item['git_hub_url'];
            $new_item->slug = Help::generateSlug($new_item->title, Project::class);
            $new_item->save();
        }
    }
}
