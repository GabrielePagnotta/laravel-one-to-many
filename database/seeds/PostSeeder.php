<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50 ; $i++) {
            $newpost=new Post();
            $newpost->title=$faker->words(5,true);
            $newpost->body=$faker->text();
            $newpost->save();
        }
    }
}
