@extends('layouts.web')

@section('title')
Fash9ja: Trending Gist
@endsection

@section('content')
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="row">
                            @forelse ($posts as $post)                          
                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src='{{asset("storage/{$post->image}")}}'  alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Author"><i class="fa fa-user"></i> {{$post->user->name}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> {{$post->created_at}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <h4>{{$post->title}}</h4>
                                        {{-- <p>{{$post->description}} </p> --}}
                                        <div class="text-button">
                                            <a href="{{ route('blogDetail', $post->id)}}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <p class="textcenter">
                                    No results found for query <strong>{{request()->query('search')}}</strong>
                                </p>

                            @endforelse
                            
                        </div>
                        {{$posts->appends(['search'=> request()->query('search')])->links()}}
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="form-group">
                            <h4>Blog Search</h4>
                        </div>

                        <div class="form-group">
                            <form action="{{route('blog')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" value="{{request()->query('search')}}" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">

                                    <span class="input-group-addon"><a href="#"><i class="fa fa-search"></i></a></span>
                                </div>
                            </form>
                        </div>

                        <br>

                        <div class="form-group">
                            <h4>Categories</h4>
                        </div>
                        @foreach ($categories as $category)
                        <p><a href="{{ route('categoryPost', $category->id)}}">{{$category->name}}</a></p>  
                        @endforeach

                        <br>
                        <br>

                        <div class="form-group">
                            <h4>Tags</h4>
                        </div>
                        @foreach ($tags as $tag)
                        <p><a href="{{ route('tagPost', $tag->id)}}">{{$tag->name}}</a></p>  
                        @endforeach
                       
                    </div>
                </div>
            </div>
            {{-- {{$posts->links()}} --}}
        </section>
@endsection