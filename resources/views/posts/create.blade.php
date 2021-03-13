@extends('layouts.home')




@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="row justify text-center">
            
            <div class="card card-default">
                <div class="card-header">
                    Add Post
                </div>
                <div class="card-body">
                    
                    <div class="alert-danger">
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>
                                {{$error}}
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <form  class="form-group" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Enter a post title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Published At</label>
                            <input name="published_at" type="text" class="form-control" id="published_at" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Post Image</label>
                            <input name="image" type="file" class="form-control" id="image" placeholder="Enter a post title">
                        </div>
                        {{-- <div class="form-control"> --}}
                            <button type="submit" class="btn btn-success btn-sm">Create Post </button>
                        {{-- </div> --}}
                    
                    </form>

                    
                </div>
                        
                
                </ul>
             </div>
        </div>

        </div> 

    </div>
@endsection