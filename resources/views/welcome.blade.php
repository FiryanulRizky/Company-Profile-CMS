
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Trans Continent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Favicons -->
    <link href="{{ asset('frontend_assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('frontend_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('frontend_assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('frontend_assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('frontend_assets/css/style.css') }}" rel="stylesheet">
    
    <style>
    .image-center{
        display: block;
        margin-left: 6.5px;
        margin-right: 6.5px;
        width: 100%;
      }
    </style>

    <!-- Main Javascript File -->
    <script src="{{ asset('frontend_assets/js/main.js') }}"></script>

    <!-- =======================================================
      Theme Name: Reveal
      Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body id="body">

<!--==========================
  Header
============================-->
@php
        $url = request()->segment(1);
  @endphp
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="{{ url('/') }}" class="scrollto">
                <img src="{{ asset('tclogo.png') }}" alt="logo" width="250px" height="50px">
            </a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#body">Home</a></li>
                <li><a href="#about">About Us</a>
                    <ul>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li class="drop-down"><a href="#">Deep Drop Down</a>
                        <ul>
                            <li><a href="#">Deep Drop Down 1</a></li>
                            <li><a href="#">Deep Drop Down 2</a></li>
                            <li><a href="#">Deep Drop Down 3</a></li>
                            <li><a href="#">Deep Drop Down 4</a></li>
                            <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#services">Services</a></li>
                <li><a href="#clients">Clients</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li class="{{$url=='blog'?'menu-active':''}}"><a href="{{url('blog')}}">Blog</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro">

    <div class="intro-content">
      <h2>Smart <span style="color:red">Focus </span>Committed</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="#portfolio" class="btn-projects scrollto" >Our Projects</a>
      </div>
    </div>
    <div id="intro-carousel" class="owl-carousel" >
    @foreach ($sliders as $slider)
        <div class="item" style="background-image: url({{ asset('uploads/slider_photos') }}/{{ $slider->slider_photo }});"></div>
    @endforeach
    </div>

  </section><!-- #intro -->
<div class="in-to-about"></div>
<main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
        <div class="container">
            @foreach ($abouts as $about)
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="{{ asset('uploads/about_photos') }}/{{ $about->about_photo }}" alt="">
                </div>

                    <div class="col-lg-6 content">
                        <h2>{{ $about->heading }}</h2>
                        <h3>{{ $about->sub_title }}</h3>
                        <ul>{{ $about->description }}</ul>
                    </div>
            </div>
            @endforeach

        </div>
    </section><!-- #about -->

    <!--==========================
      Experiences Section
    ============================-->
    <section id="experiences">
    <div class="container">
        <div class="row">
            <br/>
            <div class="section-header">
            <h2>Experiences</h2>
            </div>
           
        </div>
            <div class="row text-center">
                <div class="col">
                <div class="counter">
          {{-- <i class="fa fa-code fa-2x"></i> --}}
          <h2 class="timer count-title count-number" data-to="21" data-speed="1500"></h2>
           <p class="count-text ">Years</p>
        </div>
                </div>
                  <div class="col">
                   <div class="counter">
          {{-- <i class="fa fa-coffee fa-2x"></i> --}}
          <h2 class="timer count-title count-number" data-to="18" data-speed="1500"></h2>
          <p class="count-text ">Offices</p>
        </div>
                  </div>
                  <div class="col">
                      <div class="counter">
          {{-- <i class="fa fa-lightbulb-o fa-2x"></i> --}}
          <h2 class="timer count-title count-number" data-to="2" data-speed="1500"></h2>
          <p class="count-text ">Overseas</p>
        </div></div>
                  <div class="col">
                  <div class="counter">
          {{-- <i class="fa fa-bug fa-2x"></i> --}}
          <h2 class="timer count-title count-number" data-to="261" data-speed="1500"></h2>
          <p class="count-text ">Customers</p>
        </div>
                  </div>
             </div>
    </div></section><!-- #choose us -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Services</h2>
            </div>

            <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="icon"><img src="{{ asset('uploads/service_photos') }}/{{ $service->services_photo }}" alt=""></div>
                        <h4 class="title"><a href="">{{ $service->title }}</a></h4>
                        <p class="description">{{ $service->short_description }}</p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Clients</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>

            <div class="owl-carousel clients-carousel">
                @foreach ($clients as $client)
                <div class="border-img">
                    <img src="{{ asset('uploads/client_photos') }}/{{ $client->clients_photo }}" alt="">
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- #clients -->

    <!--==========================
      Our Portfolio Section
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Our Portfolio</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row no-gutters">
                @foreach ($portfolios as $portfolio)
                <div class="col-lg-3 col-md-4">
                    <div class="portfolio-item wow fadeInUp">
                        <a href="{{ asset('uploads/portfolio_photos') }}/{{ $portfolio->portfolio_photo }}" class="portfolio-popup">
                            <img src="{{ asset('uploads/portfolio_photos') }}/{{ $portfolio->portfolio_photo }}" alt="">
                            <div class="portfolio-overlay">
                                <div class="portfolio-info"><h2 class="wow fadeInUp">{{ $portfolio->title }}</h2></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- #portfolio -->

    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Testimonials</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                @foreach ($testimonials as $testimonial)
                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        {{ $testimonial->comment }}
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{ asset('uploads/testimonial_photos') }}/{{ $testimonial->testimonial_photo }}" class="testimonial-img" alt="">
                    <h3>{{ $testimonial->name }}</h3>
                    <h4>{{ $testimonial->designation }}</h4>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- #testimonials -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Top Management</h2>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="{{ asset('uploads/team_photos') }}/{{ $team->tm_photo }}" alt=""></div>
                        <div class="details">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->designation }}</span>
                            {{-- <div class="social">
                                <a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a>
                                <a href="{{ $team->fb }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $team->google }}"><i class="fa fa-google-plus"></i></a>
                                <a href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- #team -->

    <!--========================== category Section ============================-->
    <section id="category" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>INFO & NEWS</h2>
          </div>
          <div class="row">
  
          <div class="row" id="category-wrapper">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12 category-item filter-app" >
                    <a href="{{route('blog', ['c' =>$category->name])}}">
                        <img src="{{asset('category_image/'.$category->image)}}" class="image-center">
                        <div class="details">
                          <h4>{{$category->name}}</h4>
                          <span>{{$category->description}}</span>
                        </div>
                    </a>
                </div>
            @endforeach  
          </div>
  
        </div>
      </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>
            @foreach ($contacts as $contact)
            <div class="row contact-info">
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>{{ $contact->address }}</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href={{ $contact->phone_no }}>{{ $contact->phone_no }}</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        <div class="container mb-4">
            <iframe src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=PT.%20Trans%20Continent%20Jakarta+(PT%20trans%20Continent)&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="container">
            <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="{{ url('contact/submit') }}" method="post" role="form" class="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit" style="background: #0033A0">Send Message</button></div>
                </form>
            </div>

        </div>
    </section><!-- #contact -->

</main>

<!--==========================
  Top Bar
============================-->
<section id="topbar" class="d-none d-lg-block">
    @foreach ($contacts as $contact)
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">{{ $contact->email }}</a>
            <i class="fa fa-phone"></i> {{ $contact->phone_no }}
        </div>
        <div class="social-links float-right">
            <a href="{{ $contact->twitter }}" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="{{ $contact->fb }}" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="{{ $contact->google }}" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="{{ $contact->linkedin }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
        </div>
    </div>
    @endforeach
</section>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright {{ date('Y') }}<strong> PT. Trans Continent</strong>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ asset('frontend_assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend_assets/lib/sticky/sticky.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('frontend_assets/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('frontend_assets/js/main.js') }}"></script>

</body>
</html>
