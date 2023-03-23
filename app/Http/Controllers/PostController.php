<?php

namespace App\Http\Controllers;

use Str;
use Image;
use Session;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority', 'asc')->get();
        $posts = Post::get();

        return view('back.posts.index')
            ->with('posts', $posts)
            ->with('categories', $categories);
    }

    public function create()
    {
        $categories = Category::orderBy('priority', 'asc')->get();

        return view('back.posts.create')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        //Validar
        $this->validate($request, array(
            'name' => 'unique:posts|required|max:255',
            'image' => 'required|min:10|max:2100',
        ));

        $post = new Post;

        $post->name = $request->name;
        $post->slug = Str::slug($request->name, '-');

        $post->subtitle = $request->subtitle;
        $post->body = $request->body;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->name, '-') . 'image' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/posts/' . $filename);

            Image::make($image)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $post->main_picture = $filename;
        }

        $post->is_publish = $request->is_publish;

        $post->time = $request->time;

        $post->publish_date = $request->date;

        $post->save();

        // Guardar Categorías
        if (isset($request->categories)) {

            $categories = $request->categories;

            $i = 0;

            foreach ($categories as $c) {

                $category = Category::where('id', $c)->first();

                $cat = new PostCategory();
                $cat->post_id = $post->id;
                $cat->category_id = $category->id;
                $cat->save();
            }
        }

        // Mensaje de session
        Session::flash('success', 'Se creo la publicación con exito.');

        // Enviar a vista
        return redirect()->route('posts.show', $post->id);
    }

    public function edit($id)
    {
        $post = Post::find($id);
    }

    public function show($id)
    {
        return view('back.posts.show');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        // Mensaje de session
        Session::flash('success', 'Se eliminó la publicación con exito.');

        return redirect()->back();
    }
}
