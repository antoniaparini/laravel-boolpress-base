<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //!!!!!!ATTENZIONE USARE SOLO SE RICHIESTO! (rimuove TUTTI i dati contenenti nel db prima del seed!)!!!!!!
        //Post::truncate();
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        

        /**
         * USIAMO FAKER!
         */
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->text(50);
            $newPost->body = $faker->paragraphs(2, true);
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();

        }
        
        /**
         * CREAZIONE DI BASE DEI SEED - metodo vecchio
         */
        //  $posts = [
        //      [
        //          'title' => 'My post Lorem',
        //          'body' => 'lorem ipsum dolore sit amet adjkadjsafhabchasbckhasbxjshad asj daskdb a chbaskh askdjb kjbas kj dbaskjbd ksabdkasbdkhas bkhabsdk abs '
        //      ],
        //      [
        //          'title' => 'My post Lorem',
        //          'body' => 'lorem ipsum dolore sit amet adjkadjsafhabchasbckhasbxjshad asj daskdb a chbaskh askdjb kjbas kj dbaskjbd ksabdkasbdkhas bkhabsdk abs '
        //      ],
        //      [
        //          'title' => 'My post Lorem',
        //          'body' => 'lorem ipsum dolore sit amet adjkadjsafhabchasbckhasbxjshad asj daskdb a chbaskh askdjb kjbas kj dbaskjbd ksabdkasbdkhas bkhabsdk abs '
        //      ]
        //      ];

        //      foreach ($posts as $post) {

        //          //Creazione istanza da modello
        //         $newPost = new Post();

        //          //Popolazione delle properties dell'istanza con il DB introdotto prima
        //         $newPost->title = $post['title'];
        //         $newPost->body = $post['body'];
        //         $newPost->slug = Str::slug( $post['title'], '-');

        //          //Salvataggio record da istanza
        //         $newPost->save();
        //      }
    }
}
