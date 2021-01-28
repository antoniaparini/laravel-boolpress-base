<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\InfoPost;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all TAGS!
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);

        //VALIDATION
        $request->validate($this->ruleValidation());

        // Settare i dati per salvarli nel DB: Slug e path image
        $data['slug'] = Str::slug($data['title'], '-');

        //Dobbiamo capire se è stata o meno inserita l'immagine
        if(!empty($data['img_path'])) {
            $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        }

        //SAVE TO DB
        $newPost = new Post();
        $newPost->fill($data); //fillable nel Model
        $saved = $newPost->save();


        //<------------- Info Post Record della Tabella --- Con Mass Assignment
        $data['post_id'] = $newPost->id;
        $newInfo = new InfoPost();
        $newInfo->fill($data);
        $infoSaved = $newInfo->save();


        if($saved && $infoSaved) {
            if (!empty($data['tags'])) {
                $newPost->tags()->attach($data['tags']);

            }
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('homepage');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        //Controlliamo se quel che stiamo cercando, esista
        if(empty($post)) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();

        //Controlliamo se quel che stiamo cercando, esista
        if(empty($post)) {
            abort(404);
        }                             
        
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Get data FROM the form
        $data = $request->all();

        //VALIDAZIONE
        $request->validate($this->ruleValidation());

        //GET POST TO UPDATE BY ID
        $post = Post::find($id);

        //CREATE NEW SLUG
        $data['slug'] = Str::slug($data['title'], '-');

        //IF IMG CHANGE - Come gestisco il cambio o la rimozione della vecchia immagine.
        if(!empty($data['img_path'])) {
            if(!empty($post->img_path)) {
                Storage::disk('public')->delete($post->img_path);
            }
            $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        }

        //UPDATE DB
        $updated = $post->update($data); //<- $fillable nel Model

        //Info table update
        $data['post_id'] = $post->id;
        $info = InfoPost::where('post_id', $post->id)->first();
        $infoUpdate = $info->update($data);  //<- $fillable nel Model



        if($updated && $infoUpdate) {

            if (!empty($data['tags'])) {
                $post->tags()->sync($data['tags']);
            } else {
                $post->tags()->detach();
            }

            return redirect()->route('posts.show', $post->slug);
        } else {
            return redirect()->route('homepage');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $title = $post->title;
        $image = $post->img_path;
        $post->tags()->detach();
        $deleted = $post->delete();

        if($deleted) {
            if(!empty($image)) {
                Storage::disk('public')->delete($image);
            }
            return redirect()->route('posts.index')->with('post-deleted', $title);
        } else {
            return redirect()->route('homepage');
        }
    }

    //FUNZIONE GENERALE DI VALIDAZIONE ELEMENTI
    private function ruleValidation() {
        return [
            'title' => 'required',
            'body' => 'required',
            'img_path' => 'image',
        ];
    }
}