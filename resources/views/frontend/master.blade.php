<!DOCTYPE html>
<html lang="en">
    

<head>

        <!-- Basic Page Needs -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Titles -->
        <title>Md Imran Hossain</title>

        <!-- Specific Meta -->
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Retrina Group" />

        <!--  FavIcon  -->
        {{-- <link rel="shortcut icon" href="{{asset('frontend')}}/assets/img/favicon.ico"> --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&amp;display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;1,300&amp;display=swap" rel="stylesheet">  

        <!-- Bootstrap Css -->
  
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
        .inactive{
            color:black;
        }
        </style>



        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.css">
        <!-- Fontawesome Css -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/fontawesome.css">
        <!-- LineIcon Css -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/LineIcons.css">
        <!-- Owl carousel Css -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.min.css">
        <!-- Magnific Popup Css -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
        <!--  Custom Style CSS  -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
        <!--  Color CSS  -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/color/orange.css" id="option-color">
    </head>
    <body data-spy="scroll" data-target="#scrollspy" data-offset="61">

        <div id="app">

        <!--- Preloader Start -->
        <div id="angela-preloader">
        <div  class="preloader">
            <div class="spinner"></div>
            <div class="loader">
                <span data-text="M" class="letter-animation">M</span>
                <span data-text="D" class="letter-animation">D</span>
                <span data-text="." class="letter-animation">.</span>
                <span data-text="I" class="letter-animation">I</span>
                <span data-text="M" class="letter-animation">M</span>
                <span data-text="R" class="letter-animation">R</span>
                <span data-text="A" class="letter-animation">A</span>
                <span data-text="N" class="letter-animation">N</span>
            </div>
        </div>
        </div>
        <!-- Preloader End -->


        <!--    Header Start    -->
        <header id="header" class="header fixed-top">
            <nav id="scrollspy" class="navbar navbar-expand-lg header-nav">
                <div class="container">
                    <router-link class="navbar-brand  mr-lg-3 mr-xl-5 base-color" to="/">
                        <img src="{{$logo->logo_image}}" style="height: 35px;">
                    </router-link>
                    <!--  Navbar Toggler Button Start -->
                    <button class="navbar-toggler collapsed " type="button" data-toggle="collapse" data-target="#toggle-menu" aria-controls="toggle-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="lni lni-menu"></span>
                    </button>
                    <!--  Navbar Toggler Button End -->
                    <div class="collapse navbar-collapse" id="toggle-menu">
                        <ul class="navbar-nav nav-pills ml-auto">

                                    @if($menu->home == 1)
                                         <li class="nav-item {{ (request()->segment(7) == '/') ? 'active':'inactive'}}">
                                            <router-link  class="nav-link" to="/">Home</router-link>
                                         </li>
                                    @endif

                                   
                                    @if($menu->about == 1)
                                        <li class="nav-item {{ (request()->segment(7) == '/about') ? 'active':'inactive'}}">
                                            <router-link  class="nav-link" to="/about">About</router-link>
                                        </li
                                     @endif
                                   
                                    @if($menu->services == 1)
                                    <li class="nav-item {{ (request()->segment(7) == '/services') ? 'active':'inactive'}}">
                                                <router-link  class="nav-link" to="/services">Services</router-link>
                                    </li>
                                     @endif
                                   
                                    @if($menu->portfolio == 1)
                                    <li class="nav-item {{ (request()->segment(7) == '/portfolio') ? 'active':'inactive'}}">
                                                <router-link  class="nav-link" to="/portfolio">Portfolio</router-link>
                                    </li>
                                     @endif
                                   
                                    @if($menu->videos == 1)
                                    <li class="nav-item {{ (request()->segment(7) == '/videos') ? 'active':'inactive'}}">
                                                <router-link  class="nav-link" to="/videos">Videos</router-link>
                                    </li>
                                    @endif

                                    @if($menu->blog == 1)
                                    <li class="nav-item {{ (request()->segment(7) == '/blog') ? 'active':'inactive'}}">
                                                <router-link  class="nav-link" to="/blog">Blog</router-link>
                                    </li>
                                    @endif
                                   
                                    @if($menu->contact == 1)                  
                                    <li class="nav-item {{ (request()->segment(7) == '/contact') ? 'active':'inactive'}}">
                                                <router-link class="nav-link" to="/contact">Contact</router-link>
                                    </li>
                                    @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--    Header End    -->

        <!--    Hero Start    -->
        <div >
        <master-component/>
        </div>
        <!--    Hero End    --> 




 







        <!--   Footer Start  -->
        <footer class="py-5 text-center" >
            <div class="container">
                {{--  <div class="social-icon mb-3">
                    <ul class="list-inline py-2 mb-0">
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="lni lni-facebook-filled"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="lni lni-telegram-original"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="lni lni-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="lni lni-dribbble"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="lni lni-instagram"></i></a></li>
                    </ul>
                </div>  --}}
                <p class="mb-0">Copyright © 2021. Development by <a class="base-color" href="javascript:void(0);">Md Imran Hossain</a></p>
            </div>
        </footer>
        <!--   Footer End  -->

        <!--   Return To Top  -->
        <a class="return-to-top d-inline-block" href="javascript:void(0)"><i class="lni lni-arrow-up"></i></a>



        
      {{--  <div class="mouse-cursor cursor-effect"></div>
      <div class="mouse-cursor cursor"></div>  --}}

    
       
        </div>


        <!--  JavaScripts  -->

        <script src="{{asset('js/app.js')}}"></script>

    
            
        <script src="{{asset('frontend')}}/assets/js/jquery-3.5.1.min.js"></script>
        <!--  Bootstrap Js  -->
        <script src="{{asset('frontend')}}/assets/js/bootstrap.js"></script>
        <!--  Fontawsome Js  -->
        <script src="{{asset('frontend')}}/assets/js/fontawesome.js"></script>
        <!--  Typed Js  -->
        <script src="{{asset('frontend')}}/assets/js/typed.js"></script>
        <!--  CountTo Js  -->
        <script src="{{asset('frontend')}}/assets/js/jquery.countTo.js"></script>
        <!--  Isotope Js  -->
        <script src="{{asset('frontend')}}/assets/js/isotope.pkgd.min.js"></script>
        <!--  PopUp Js  -->
        <script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
        <!--  owl.carousel Js  -->
        <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
        <!--  easing Js  -->
        <script src="{{asset('frontend')}}/assets/js/jquery.easing.min.js"></script>
        <!--  Custom JS  -->
        <script src="{{asset('frontend')}}/assets/js/westin.js"></script>



    </body>


</html>