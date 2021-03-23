@extends('layouts.web')

@section('title')
    Fash9ja Gist | The Nigerian Fashion Gist Center
    
@endsection
      
@section('content')
     <section class="banner" id="top" style="background-image: url(img/homepage-banner-image-1920x700.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Fash9ja Gist: Get Top trending Nigerian fashion gist</h2>
                        <div class="blue-button">
                            <a href="contact.html">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>About us</h4>
                            <p>{{$company->about}}</p>
                            <div class="blue-button">
                                <a href="about-us.html">Discover More</a>
                            </div>

                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/about-1-720x480.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Latest blog posts</span>
                            <h2>Hot Trending Fashion Gist</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    {{-- <img src="img/blog-1-720x480.jpg" alt=""> --}}
                                    <img src="{{asset('storage/'.  $post->image)}}" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> {{$post->user->name}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> {{$post->created_at}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>{{$post->title}}</h4>

                                <p>{{$post->description}}. </p>

                                <div class="text-button">
                                    <a href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                   
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>Do you want us to cover your event?</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="blue-button">
                        <a href="contact.html">Talk to us</a>
                      </div>
                </div>
            </div>
        </section>
    </main>
@endsection
   
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
@endsection

    
