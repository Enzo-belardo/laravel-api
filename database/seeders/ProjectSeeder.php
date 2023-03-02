<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    
        for($i=0; $i < 10; $i++){
            $newProject = new Project();
            $newProject->type_id = Type::inRandomOrder()->first()->id;
            $newProject->title = $faker->word();
            $newProject->description = $faker->paragraphs(2, true);
            $newProject->programming_language = $faker->word();
            // $newProject->type = $faker->word();
            $newProject->year_project =  $faker->year();
            // $newProject->thumb = $faker->imageUrl();
            $newProject->image= $faker->unique()->imageUrl();
            $newProject->save();
        }
    }
}