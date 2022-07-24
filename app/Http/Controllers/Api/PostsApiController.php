<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = Post::all();
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $Posts
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Post::where('name', $request->name)->count()) {
            return [
                "status" => 1,
                "message" => 'name already exist',
            ];
        } else {
            $newPost = new Post;
            $newPost->name = $request->name;
            $newPost->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => Post::where('name', $request->name)->first()
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Post::find($id);
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $Post
        ];
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
        if (!Post::find($id)->count()) {
            return [
                "status" => 1,
                "message" => 'name doen not exist',
            ];
        } else {
            $newPost = Post::find($id);
            $newPost->name = $request->name;
            $newPost->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => Post::where('name', $request->name)->first()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
