@extends('layouts.home')




@section('content')
<div class="container">
    <div class="row justify ">
        <div class="col-md-8">
            
            <div class="card card-default">
                <div class="card-header">
                   {{ isset($post)? 'Edit Post' : 'Add Post'}} 
                </div>
                <div class="card-body">
                    
                   @include('partials.flash')
                    <form  class="form-group" action="{{isset($post)? route('posts.update', $post->id): route('posts.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @if (isset($post))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Enter a post title" value="{{isset($post)? $post->title: ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" >{{isset($post)? $post->description: ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            {{-- <textarea name="content" class="form-control" id="content" rows="3"></textarea> --}}
                            <input id="content" type="hidden" name="content" value="{{isset($post)? $post->content: ''}}">
                             <trix-editor input="content"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Published At</label>
                            <input name="published_at" type="text" class="form-control" id="published_at" value="{{isset($post)? $post->published_at: ''}}">
                        </div>
                        @if (isset($post))
                            <div class="mb-3">
                                 <img src={{ asset($post->image) }} style="height:100px;width:100px" alt="">
                            </div>   
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Post Image</label>
                            <input name="image" type="file" class="form-control" id="image" placeholder="Enter a post title">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>

                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                      @if (isset($post))
                                        @if ($category->id === $post->category_id)
                                          selected 
                                        @endif
                                      @endif  
                                         > 
                                       {{$category->name}}</option>  
                                @endforeach
                            </select>
                        </div>

                        @if ($tags->count() > 0)
                            <div class="mb-3">
                                <label for="" class="form-label">Tags</label>
                                <select name="tags[]" id="tags" class="form-control tag-selector" multiple="multiple">                                
                                   
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}"
                                          @if (isset($post)) 
                                            @if ($post->hasTags($tag->id))
                                              selected  
                                            @endif
                                          @endif   
                                        >
                                            {{$tag->name}}
                                        </option>
                                    @endforeach
                                </select>                                
                            </div>
                        @endif

                        {{-- <div class="form-control"> --}}
                            <button type="submit" class="btn btn-success btn-sm">{{isset($post)? 'Update Post' : 'Create Post'}}</button>
                       {{-- </div> --}}
                    
                    </form>

                    
                </div>
                        
                
                </ul>
             </div>
        </div>

        </div> 

    </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"  crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#published_at", {
            enableTime: true,
        });

        $(".tag-selector").select2({
        tags: true
        });
    </script>

@endsection