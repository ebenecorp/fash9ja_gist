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
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
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
                            <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst. Vel sequi odit similique repudiandae ipsum iste, quidem tenetur id impedit, eaque et, aliquam quod.</p>
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
                            <h2>Lorem ipsum dolor sit amet ctetur.</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-1-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim consectetur assumenda nam facere voluptatibus totam veritatis. </p>

                                <div class="text-button">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-2-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim consectetur assumenda nam facere voluptatibus totam veritatis. </p>

                                <div class="text-button">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-3-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim consectetur assumenda nam facere voluptatibus totam veritatis. </p>

                                <div class="text-button">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>Vivamus nec vehicula felis</h2>
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

    
