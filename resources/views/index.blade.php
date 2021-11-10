

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Stohealth | Medical Expert System</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/font-awesome.min.css">
     <link rel="stylesheet" href="/css/animate.css">
     <link rel="stylesheet" href="/css/owl.carousel.css">
     <link rel="stylesheet" href="/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="/css/tooplate-style.css">
     <link rel="icon" type="image/png" href="/img/stohealth.png">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
    


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/" class="navbar-brand">
                         <div class="row">
                              <img src="/img/stohealth.png" style="width: 30px">
                              Stohealth
                         </div>
                    </a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li>
                              <a href="#top" class="smoothScroll"></a>
                         </li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                         <li><a href="#appointment"class = "moothScroll">Feedback</a></li>
                         @if (Route::has('login'))
                             @auth
                                   <li><a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li>
                             @else
                                   <li><a href="{{ route('login') }}" class="smoothScroll">Login</a></li>
             
                                 @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="smoothScroll">Register</a></li>   
                                 @endif
                             @endauth
                         @endif
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's go know us</h3>
                                             <h1>Stohealth</h1>
                                             <a href="#about" class="section-btn btn btn-gray smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3></h3>
                                             <h1>Calling Me</h1>
                                             <a href="#appointment" class="section-btn btn btn-default btn-gray smoothScroll">For call</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Stohealth, happy stomach enjoy life</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Kami adalah sistem pakar yang hadir untuk membantu anda menyelesaikan permasalahan lambung yang anda alami</p>
                                   <p>ceritakan permasalahan yang anda alami pada kami dengan melakukan pemeriksaan maka kami akan memberikan solusi kepada lambung anda </p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/author-image.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Dr. Mahendra Adrianova</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-sm-6">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="/feedback">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp text-center" data-wow-delay="0.4s">
                                   <h2>Feedback</h2>
                              </div>
                              @if (session()->has('msg'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('msg') }}
                              </div>
                              @endif
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   @csrf
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        <label for="Message">Additional Message</label>
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>        


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p>kenyamanan anda adalah prioritas kami, Apabila anda mengalami kesulitan hubungi kami :</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 0212871080</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">stohealth@gmail.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Follow Us</h4>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>
                   
                    </div> 
                     
                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-12 col-sm-12 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         <div class="col-md-12 col-sm-6 ">
                              <div class="copyright-text text-align-center "> 
                                   <p>Copyright &copy; 2021 TI UIN Walisongo   
                              </div>
                         </div>
                    </div>
                    </div>
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>