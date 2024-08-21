<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {   
        $posts = PostResource::collection(Post::get());
    
        return $this->apiResponse($posts,"success",200);
    }
    
    public function show($id)
    {
        $post = Post::find($id);

        if($post)
        {
            return $this->apiResponse(new PostResource($post),"success",200);

        }
        else
        {
            return $this->apiResponse(null,"Post Not found",404);;
        }
    }
    

    public function insert(Request $request)
    {   

        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'content'=>'required',
            'author'=>'required',
            'image'=>'required'
            
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $data = [
            'title' => $request->title,
            'content'=>$request->content,
            'author'=>$request->author,
            'image'=>$request->image
        ];

        $data['image'] = Storage::putFile('posts',$data['image']); //add image

        $store =Post::create($data); // store data

        if($store)
        {
            return $this->apiResponse($store,"Post created",201);

        }
        else
        {
            return $this->apiResponse(null,"Error creating the post",400);
        }
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'content'=>'required',
            'author'=>'required',
            'image'=>'required'
            
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $post = Post::find($id);
        if($post)
        {
            $post->update($request->all());
            return $this->apiResponse($post,"Post updated",201);
        }
        else
        {
            return $this->apiResponse(null,"post Not found",404);
        }
    }
    
    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete($id);
            return $this->apiResponse(null,"post deleted",200);
        }
        else
        {
            return $this->apiResponse(null,"post Not found",404);
        }
        
    }

}
