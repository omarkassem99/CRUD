<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('index',compact('posts'));
    }

    

    public function create()
    {
        return view('create');
    }

    public function insert(Request $request)
    {   
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:png,jpg'

        ]);

        $data['image'] = Storage::putFile('posts',$data['image']);

        Post::create($data);

        session()->flash('success',"Data Inserted");

        return redirect('index');
    }

    public function updateForm($id)
    {   
        $post = Post::find($id);
        return view('update')->with('post',$post);
    }

    public function update(Request $request,$id)
    {   
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpg,png'
        ]);

        $post = Post::findOrFail($id);
        if ($post->image) {
            if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
        }

        $data['image'] = Storage::disk('public')->putFile('posts', $request->image);
        $post->update($data);
        return redirect('index');
       
    }

    public function delete(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            if (Storage::disk('public')->exists($post->image)) 
            {
                Storage::disk('public')->delete($post->image);
            }
        }
        $post->delete();
        return redirect('index');

    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('show')->with('post',$post);
    }
    
}
