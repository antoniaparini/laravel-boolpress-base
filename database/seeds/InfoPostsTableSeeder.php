<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\InfoPost;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Creare un record per OGNI post presente nel DB
        $posts = Post::all();

        foreach ($posts as $post) {

            //Creazione di un'istanza
            $newInfo = new InfoPost();

            //Set dei valori
            $newInfo->post_id = $post->id;
            $newInfo->post_status = $faker->randomElement(['public','private','draft']);
            $newInfo->comment_status = $faker->randomElement(['open','closed','private']);

            //Salvataggio
            $newInfo->save();

        }

    }
}
