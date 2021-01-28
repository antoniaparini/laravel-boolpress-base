<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Get all the POSTS
        $posts = Post::all();

        foreach ($posts as $post) {

            //crearne 3 per ogni post!
            for ($i=0; $i < 3; $i++) { 
                //Creazione Istanza
                $newComment = new Comment();
    
                //Creazione Dati
                $newComment->post_id = $post->id;//foreign key che punta all'id del post
                $newComment->author= $faker->userName();
                $newComment->text= $faker->sentence(10);
    
                //Salvataggio
                $newComment->save();
            }
        }

    }
}
