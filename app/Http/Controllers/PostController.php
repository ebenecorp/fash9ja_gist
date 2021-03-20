<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    // use SoftDeletes;

    public function __construct()
    {
        $this->middleware('verifyCategory')->only(['create', 'store']);
    }

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
        return view('posts.create')->withCategories(Category::all())->withTags(Tag::all());
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
       $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'description'=>$request->description,
            'image'=>$image,
            'user_id'=> auth()->user()->id,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);

        }

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
    public function edit(Post $post)
    {
        return view('posts.create')->withPost($post)->withCategories(Category::all())->withTags(Tag::all());
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'content', 'description', 'published_at']);

        if($request->hasFile('image')){
            $image = $request->image->store('post');
            $post->deleteImage();
            $data['image'] = $image;

        }
        $data['category_id'] = $request->category;

        $post->update($data);

         if($request->tags){
            $post->tags()->sync($request->tags);

        }

        session()->flash('message', 'Post was successfully updated');

        return redirect(route('posts.index'));

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

            $post->deleteImage();    
            
            $post->forceDelete();

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

    public function restore($id){

         $post = Post::withTrashed()->where('id', $id)->firstOrFail();
         $post->restore();

        session()->flash('message', 'Post was successfully Restored');

        return redirect()->back();



    }

}
