<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    // use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // dd($request->image->store('posts'));
        $image = $request->image->store('posts');
        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'description'=>$request->description,
            'image'=>$image
        ]);

        session()->flash('message', 'Post was successfully created');

        return redirect(route('posts.index'));

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()){
            $post->forceDelete();
            Storage::delete($post->image);

        }
        else{

            $post->delete();
        }
        

        session()->flash('message', 'Post was successfully Deleted');

        return redirect(route('posts.index'));

        //
    }

     /**
     * show trashed Post .
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(){

        $post = Post::onlyTrashed()->get();

        // dd($post);

        return view('posts.index')->withPosts($post);
    }

}
