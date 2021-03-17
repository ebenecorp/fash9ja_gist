<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tag.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {

        Tag::create($request->all());
        
        session()->flash('message', 'Tag was successfully created');

         return redirect( route('tags.index'));
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
        // dd($id);
        return view('tag.create')->with('tag', Tag::find($id));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        
        $tag = Tag::find($id);

        $tag->name = $request->name;
        $tag->update();

        session()->flash('message', 'Tag was successfully Updated');

        return redirect(route('tags.index'));


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if( $tag->posts->count() > 0 ){
            session()->flash('message', 'Tag cannot be deleted because it has associated posts');
            return redirect()->back();
        }
        $tag->delete();

        session()->flash('message', 'Tag was successfully deleted');
         return redirect(route('tags.index'));
        //
    }
}
