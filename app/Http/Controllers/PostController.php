<?php

namespace App\Http\Controllers;

use App\post;
use App\category;
use App\user;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource as PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->paginate(6);
        return PostResource::collection($post);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {

            $imagename = $request->image->getClientOriginalName();
            $request->image->move(public_path('/images'), $imagename);
            $Post = new Post;
            $Post->image = $imagename;
//            $Post->category = $request->category;
            $Post->title = $request->title;
            $Post->slug = str_slug($request->title);
            $Post->description = $request->description;
//            $Post->user_id = Auth::id();
            $Post->user_id =$request->user_id;
            $Post->category_id =$request->category_id;
            $Post->save();
            return response()->json(['200' => 'ok']);

        }else{
            return "Not found Iamge file!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return $post;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request['slug'] = str_slug($request->title);
        $post->update($request->all());
        return response('updated', '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return response('deleted', '404');
    }

    //count post
    public function count(){
        $post_count = Post::count();
        $category_count = Category::count();
        $user_count = User::count();

        $data = [
            "post" => $post_count,
            "category" => $category_count,
            "user" => $user_count,
        ];
        
        return response()->json($data);
    }
}
