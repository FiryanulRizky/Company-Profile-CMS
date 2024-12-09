<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>News Trans Continent</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('frontend_assets/images/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend_assets/images/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('frontend_assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('frontend_assets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend_assets/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('frontend_assets/css/style.css')}}" rel="stylesheet">

  <style>
    #hero{
        background: url('{{asset('img/intro-carousel/1.jpg')}}') top center;
        background-repeat: no-repeat;
        width:100%;
        background-size:cover;
        width: 100%;
        height: 60vh;
        position: relative;
        background-size: cover;
    }
    #hero .hero-content {
      position: absolute;
      bottom: 0;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      text-align: center;
    }
    .form-control:focus {
      box-shadow: none;
    }

    .form-control::placeholder {
      font-size: 0.95rem;
      color: #aaa;
      font-style: italic;
    }
    .article{
      line-height: 1.6;
      font-size: 15px;
    } 
</style>   


</head>

<body>

  @php
        $url = request()->segment(1);
  @endphp

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
        <li class="menu-active"><a href="{{ url('/') }}#home">Home</a></li>
        <li><a href="{{ url('/') }}#about">About Us</a>
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
        <li><a href="{{ url('/') }}#services">Services</a></li>
        <li><a href="{{ url('/') }}#clients">Clients</a></li>
        <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
        <li><a href="{{ url('/') }}#team">Team</a></li>
        <li class="{{$url=='blog'?'menu-active':''}}"><a href="{{url('blog')}}">Blog</a></li>
        <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
</nav><!-- #nav-menu-container -->
</div>
</header><!-- #header -->

  <!--========================== Hero Section ============================-->
  <div id="hero">
    <div class="hero-content">
      <h2>Info & News Trans Continent</h2>
    </div>
  </div>

  <main id="main">

   <!--========================== Article Section ============================-->
   <section id="about">
    <div class="container wow fadeIn">

      <div class="row">
        <div class="col-9">
          
          @if (empty(request()->segment(2)) )
            @component('blog.component.all_blog', ['blogs'=> $blogs])
            @endcomponent
          @else
            @component('blog.component.single_blog', ['blog'=> $blogs])
            @endcomponent
          @endif


        </div>
        <div class="col-3">
            <form action="{{route('blog')}}" class="mt-5">
              <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Search News" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                <div class="input-group-append border-0">
                  <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
            <div class="mb-3 font-weight-bold">Recent Posts</div>
            @foreach ($recents as $recent)
              <div>
                  <a href="{{route('blog.show', [$recent->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                    {{$recent->title}}
                  </a>
                  <hr >
              </div>
            @endforeach
        </div>
      </div>

    </div>

  </main>

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
  <script src="{{asset('user/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('user/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('user/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{-- <script src="{{asset('user/contactform/contactform.js')}}"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
