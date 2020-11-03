<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&family=Vollkorn&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/258f31346d.js" crossorigin="anonymous"></script>
    <title>Home</title>
    <link rel = "icon" href =  
        "https://mini-project-c1.github.io/Inventory-Mgmt-Front-End/logo/logo.jpg"
        type="image/x-icon">
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: "Vollkorn", serif;
            font-size: 1.3em;
        }

        #logo{
            position:relative;
            left:20px;
            width:100px;
            height: auto;
        }

        .head1{
            font-family:'Bangers';
            text-align: center;
            color:rgb(0,0,0);

        }

        .emphasis_p{
            font-family: Vollkorn;
            font-weight: bold;
            font-size:1.2em;
        }

        h2{
            font-size:190%;
        }
        
        #privacy{
            background: linear-gradient(to left,#dcdcdc,#ffffff);
            padding:1% 0% 1% 0%;
        }
        
        .nav-addBackground{
            padding: 5px 10px;
            background:#008ecc;
            transition: all 1s;
        }
        
        .text,.signUp-text{
            font-weight: bold;
            font-size: 1.3em;
        }
        .signUp-text:hover{
            transform: scale(1.1,1.1);
        }

        .section-1{
            padding-top: 10%;
        }

        /* rounded borders for SignUp */
        li{
            border-radius: 0.5em;
        }
        .carousel-caption{
            background: #000000;
            opacity: 0.7;
            border-radius: 1em;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            height: 70px;
            width: 70px;
            background-color: #e2e276;
            background-size: 100%, 100%;
            box-shadow: 2px 2px 2px 2px #808080;
            border-radius: 50%;
        }
        .carousel-indicators .active{
            transform: scale(1.7,1.7);
            background-color: #e2e276;
            transition: all 0.5s;
        }
        .carousel-indicators li{
            width: 10px;
            height: 10px;
            border-radius: 100%;
            margin-left: 10px;
        }
        .contact{
            background: url('https://i.imgur.com/R3cpQ9R.gif');
            background-size: cover;
        }
        .contactForm{
            border-radius: 0.5em;
            border: 2px solid #fff;
            box-shadow: 1px 1px 10px 1px #fff;;
        }
        .contactSubmit{
            font-weight: bold;
            background: #ffcb05;
            border-radius: 0.5em;
        }
        .contactSubmit:hover{
            transform: scale(1.1,1.1);
        }

        /* pre-loader */
        #loading{
              position: fixed;
              width: 100%;
              height: 100vh;
              background:#dee1e2 url('https://static.dribbble.com/users/46390/screenshots/1191953/loading.gif') no-repeat center center;
              background-size:400px 300px;  
              z-index: 99999;
        }

        /* contact-form input effect */
        #name,#email,#phone,#message{
            border-radius: 0.8em;
            box-shadow: 1px 1px 10px 1px #00f;
        }

        /* contact-form input effect on focus */
        #name:focus,#email:focus,#phone:focus,#message:focus{
            box-shadow: 1px 1px;
        }

        /* move up arrow icon */
        .scroll-top{
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 999;
            display: block;
            height: 68px;
            width: 68px;
        }
        .scroll-top:hover{
            cursor: pointer;
        }
        .move-up{
            display: none;
        }

        .featuredesc1{
            background: #ffffff;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #ffffff,#dcdcdc);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #ffffff,#dcdcdc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            padding:1%;
        }
            
        .featuredesc2{
            background: #ffffff;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left,#ffffff,#dcdcdc);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left,#ffffff,#dcdcdc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            padding:2%;
        }

        #email_error{
            display: none;
        }
        .name-error,.email-error,.message-error,#email-contact-error{
            color: #f95959;
            font-family: "Montserrat", sans-serif;
            font-size: 0.6em;
            position: absolute;
            right: 20px;
            display: none;
        }
        .email-error-manufacturers,.password-error-manufacturers,.email-error-sellers,.password-error-sellers{
            color: #f95959;
            font-family: "Montserrat", sans-serif;
            font-size: 0.6em;
            display: none;
        }
        #login-email-error,#login-email-error1{
            color: #f95959;
            font-family: "Montserrat", sans-serif;
            font-size: 0.6em;
            display: none;
        }
        #su{
            text-decoration: none;
            color:#fff;
        }
        @media only screen and (max-width: 768px){
            .section1Margin{
                padding-top:18%;
                text-align: center;
            }
            #mobileDisplay{
                display: block;
            }
            .headtop{
                font-size:300%;
            }
            .nav_items{
                background: #008ecc;
            }
            .center{
                text-align: center;
            }
            .signUp{
                margin-bottom: 30px;
            }
            .carousel-control-prev-icon, .carousel-control-next-icon {
                height: 30px;
                width: 30px;
            }
        }
        @media only screen and (min-width: 768px){
            #mobileDisplay{
                display: none;
            }
            nav ul li a{
                --c: #ffcb05;
                position: relative;
                margin-right: 10px;
                overflow: hidden;
                z-index: 1;
                transition: 0.5s;
                border-radius: 0.5em;
            }
            nav ul li a span {
                position: absolute;
                width: 30%;
                height: 100%;
                background-color: var(--c);
                transform: translateY(150%);
                border-radius: 50%;
                left: calc((var(--n) - 1) * 25%);
                transition: 0.5s;
                transition-delay: calc((var(--n) - 1) * 0.1s);
                z-index: -1;
            }
            nav ul li a:hover {
                color: black;
            }

            nav ul li a:hover span {
                transform: translateY(0) scale(2);
            }

            nav ul li a span:nth-child(1) {
                --n: 1;
            }

            nav ul li a span:nth-child(2) {
                --n: 2;
            }

            nav ul li a span:nth-child(3) {
                --n: 3;
            }

            nav ul li a span:nth-child(4) {
                --n: 4;
            }
            .signup:hover{
                transform: scale(1.1,1.1);
            }
        }
        @media only screen and (max-width: 992px){
            .center{
                text-align: center;
                margin-top: 10px;
            }
            .signUp{
                margin-bottom: 30px;
            }
        }
        @media only screen and (max-width: 600px){
            .carousel-control-prev-icon, .carousel-control-next-icon {
                height: 30px;
                width: 30px;
                outline: black;
                background-color: #e2e276;
                background-size: 100%, 100%;
                box-shadow: 2px 2px 2px 2px #808080;
                border-radius: 50%;
            }
            .heading-1,.heading-2{
                text-align: center;
            }
            .scroll-top{
                width: 50px;
                height: 50px;
            }
        }
        @media only screen and (max-width: 1015px){
            .emailSideText{
                display: none;
            }
        }
        /* #top-section{
            width:auto;
            height:auto;
            background: url('https://newmibridges.michigan.gov/resource/1596886033000/ISD_Icons/landing-page/group-3.svg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        } */
         #top-section{
            background: #FFEFBA;  fallback ;
            background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);  
            background: linear-gradient(to right, #FFFFFF, #FFEFBA); 
        }
        .animated-icon2{
        width: 30px;
        height: 20px;
        position: relative;
        margin: 0px;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .5s ease-in-out;
        -moz-transition: .5s ease-in-out;
        -o-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        cursor: pointer;
        }
        .animated-icon2 span{
        display: block;
        position: absolute;
        height: 3px;
        width: 100%;
        border-radius: 9px;
        opacity: 1;
        left: 0;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
        }
        .animated-icon2 span{
            background: #000000;
        }
        .animated-icon2 span:nth-child(1) {
        top: 0px;
        }

        .animated-icon2 span:nth-child(2), .animated-icon2 span:nth-child(3) {
        top: 10px;
        }

        .animated-icon2 span:nth-child(4) {
        top: 20px;
        }

        .animated-icon2.open span:nth-child(1) {
        top: 11px;
        width: 0%;
        left: 50%;
        }

        .animated-icon2.open span:nth-child(2) {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        }

        .animated-icon2.open span:nth-child(3) {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        }

        .animated-icon2.open span:nth-child(4) {
        top: 11px;
        width: 0%;
        left: 50%;
        }
        .navbar-toggler,
        .navbar-toggler:focus,
        .navbar-toggler:active,
        .navbar-toggler-icon:focus {
            outline: none;
            border: 0px;
            box-shadow: none;
        }
        .alert{
        z-index: 999;
        background: #ffdb9b;
        padding: 20px 40px;
        min-width: 350px;
        position: fixed;
        right: 0;
        top: 100px;
        border-radius: 4px;
        border-left: 8px solid #ffa502;
        overflow: hidden;
        opacity: 0;
        pointer-events: none;
        }
        .alert.showAlert{
        opacity: 1;
        pointer-events: auto;
        }
        .alert.show{
        animation: show_slide 1s ease forwards;
        }
        @keyframes show_slide {
        0%{
            transform: translateX(100%);
        }
        40%{
            transform: translateX(-10%);
        }
        80%{
            transform: translateX(0%);
        }
        100%{
            transform: translateX(-10px);
        }
        }
        .alert.hide{
        animation: hide_slide 1s ease forwards;
        }
        @keyframes hide_slide {
        0%{
            transform: translateX(-10px);
        }
        40%{
            transform: translateX(0%);
        }
        80%{
            transform: translateX(-10%);
        }
        100%{
            transform: translateX(100%);
        }
        }
        .alert .fa-exclamation-circle{
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #ce8500;
        font-size: 30px;
        }
        .alert .msg{
        padding: 0 20px;
        font-size: 18px;
        color: #000000;
        }
        .alert .close-btn{
        position: absolute;
        right: 0px;
        top: 50%;
        transform: translateY(-50%);
        background: #ffd080;
        padding: 20px 18px;
        cursor: pointer;
        }
        .alert .close-btn:hover{
        background: #ffc766;
        }
        .alert .close-btn .fas{
        color: #ce8500;
        font-size: 22px;
        line-height: 40px;
        }

    </style>
</head>
<body>
    <!-- pre-loader -->
    <div id="loading" class="text-center"></div>

    <img class="scroll-top move-up scrolltop img-fluid" src="https://daks2k3a4ib2z.cloudfront.net/591b0c3a951d120c3f468711/593a0036cd8a6e16f1869dca_icon.svg" /> 
    <!-- <img class="scroll-top move-up" src="https://img.icons8.com/cute-clipart/64/000000/up-squared.png"/> -->
    

    
    <!-- Nav-Bar -->
    <div id="top-section">
    @if(session('login_error'))
    <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Invalid Details!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @endif
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" id="navbar">
          <!-- Brand logo-->
         <a class="navbar-brand text-dark" href="home"><img class="img-fluid rounded" id="logo" src="https://mini-project-c1.github.io/Inventory-Mgmt-Front-End/logo/logo.jpg" alt="logo" /></a>
        
        <!-- Collapse button -->
        <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
        </button>
        
          <!-- Navbar links -->
          <div class="collapse navbar-collapse nav_items" id="collapsibleNavbar">
            <ul class="navbar-nav text-center ml-auto">
              <li class="nav-item">
                <a class="nav-link Link" href="">Home<span></span><span></span><span></span><span></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link Link smooth-scroll" href="#section-2">About Us<span></span><span></span><span></span><span></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link Link smooth-scroll" href="#contactus">Contact Us<span></span><span></span><span></span><span></span></a>
              </li>
              @if(session('data'))
                <li class="nav-item">
                    <a class="nav-link Link" href="dashboard">Dashboard<span></span><span></span><span></span><span></span></a>
                </li>
                <li class="nav-item bg-dark signup">
                    <a class="nav-link text-white" href="logout">Log Out</a>
                </li>
              @else
                <li class="nav-item">
                    <a class="nav-link Link" href="#login" data-toggle="modal">Log In<span></span><span></span><span></span><span></span></a>
                </li>
                <li class="nav-item bg-dark signup">
                    <a class="nav-link text-white" href="signup">Sign Up</a>
                </li>
              @endif
            </ul>
          </div>
        </nav>
    </header>
    <!-- End of Nav-Bar -->
    
    
    <!-- Section-1 -->
    <section class="section-1 section1Margin">
        <span id="mobileDisplay"><br /></span>
        <div class="container pt-6">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img class="img-fluid rounded" src="https://i1.wp.com/blog.visitorqueue.com/wp-content/uploads/2019/08/Untitled-2-01.png?fit=720%2C440&ssl=1" alt="Img"/>
                </div>
                
                <div class="col-md-6">
                    <h1 class="display-3 head1 text-center headtop">Inventory Management Application</h1>
                </div>
                
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="emphasis_p">The perfect companion for manufacturers and store owners</p>
                    <h3 class="text-center" style="margin-top: 10%;">Wondering what it is? Let's dive in!</h3>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- End of Section-1 -->

    <!-- Modal for login-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#manufacturer" role="tab" aria-controls="manufacturer" aria-selected="true">Manufacturer</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false">Seller</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="manufacturer" role="tabpanel" aria-labelledby="manufacturer-tab">
                        <h4 class="text-center mt-4">Login as a manufacturer</h4>
                        <form action="login_manufacturer" method="POST" onsubmit="return ValidateEmail()">
                        @csrf
                            <div class="form-group mt-2">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><img src="https://www.flaticon.com/svg/static/icons/svg/2919/2919600.svg" alt="Username" width="20px" height="20px"></div>
                                </div>
                                <input type="email" class="form-control" name="login_email_manufacturers" id="login-email" placeholder="Enter Email" required>
                              </div>
                              <span id="login-email-error">Invalid Email !</span>
                              <span class="email-error-manufacturers"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text"><img src="https://www.flaticon.com/svg/static/icons/svg/3014/3014229.svg" alt="Password" width="20px" height="20px"></div>
                                    </div>
                                    <input type="password" class="form-control" name="login_password_manufacturers" id="password" placeholder="Enter Password" required>
                                  </div>
                                  <span class="password-error-manufacturers"></span>
                            </div>
                            <button type="submit" class="btn w-100 text-center sample-button" style="background: #ffcb05">Log in</button>
                            <div class="text-muted text-center mt-2" style="font-size: 0.8em">Don't have an account? <a href="signup"> Sign Up </a></div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller-tab">
                        <h4 class="text-center mt-4">Login as a seller</h4>
                        <form class="login-sellers" action="login_seller" method="POST" onsubmit="return ValidateEmail2()">
                        @csrf
                            <div class="form-group mt-2">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><img src="https://www.flaticon.com/svg/static/icons/svg/2919/2919600.svg" alt="Username" width="20px" height="20px"></div>
                                  </div>
                                  <input type="email" class="form-control" id="email-1" name="login_email_sellers" placeholder="Enter Email" required>
                                </div>
                                <span id="login-email-error1">Invalid Email !</span>
                                <span class="email-error-sellers"></span>
                              </div>
                              <div class="form-group">
                                  <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><img src="https://www.flaticon.com/svg/static/icons/svg/3014/3014229.svg" alt="Password" width="20px" height="20px"></div>
                                      </div>
                                      <input type="password" class="form-control" id="password-1" name="login_password_sellers" placeholder="Enter Password" required>
                                    </div>
                                    <span class="password-error-sellers"></span>
                              </div>
                            <button type="submit" class="btn w-100 text-center" style="background: #ffcb05">Log in</button>
                            <div class="text-muted text-center mt-2" style="font-size: 0.8em">Don't have an account? <a href="signup"> Sign Up </a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End of Modal -->

    <!-- Section-2 -->
    <section class="featuredesc1" id="section-2">
        <br/>
        <br/>
        <div class="container col-10">
            <div class="row">
                <div class="col-md align-self-center heading-1">
                    <h2 class="head1">Product Information stored in a database</h2>
                    <p class="emphasis_p">Tired of keeping track of your products?</p>
                    <p>Worry not, with our application, you will be able to store all your product information in an extensive and easy to understand database.</p>
                </div>
                <div class="col-md">
                    <img class="img-fluid" src="https://www.escapetech.com/eol5links/documentation/Content/Resources/Images/Finance/StoresInventory.jpg" alt="image">
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </section>
    <!-- End of Section-2 -->
    <!-- Section-3 -->
    <section class="featuredesc2">
        <br/>
        <br/>
        <div class="container col-10">
            <div class="row">
                <div class="col-md order-md-2 align-self-center heading-2">
                    <h2 class="head1">Sales Information</h2>
                    <p class="emphasis_p">Any discrepancies? NO CHANCE!</p>
                    <p>All your transcations will be monitored and given a date range, you will be able to view all the transactions made during that period.</p>
                </div>
                <div class="col-md order-md-1">
                    <img class="img-fluid rounded" src="https://i1.wp.com/blog.visitorqueue.com/wp-content/uploads/2019/08/Untitled-2-01.png?fit=720%2C440&ssl=1" alt="image">
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </section>
    <!-- End of Section-3 -->

    <!-- Section-4 -->
    <!-- Carousel -->
    <section class="container col-10 col-sm-10" id="section-4">
        <br/>
        <br/>
        <div class="row">
            <div class="col text-center">
                <h2 class="head1">Sales Analysis</h2>
                <p class="emphasis_p">Making Profit?</p>
            </div>
        </div>
        <div class="row">
          <div class="col mx-auto text-center animatecar">
            <div id="example" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#example" data-slide-to="0" class="active"></li>
                <li data-target="#example" data-slide-to="0"></li>
                <li data-target="#example" data-slide-to="0"></li>
              </ul>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://www.assetinfinity.com/blog/wp-content/uploads/2019/09/Inventory-management-system-objectives.png" alt="project" class="img-fluid">
                  <div class="carousel-caption d-none d-md-block">
                    <h4>Monthly Sales Analysis</h4>
                    <p>At the end of every month, you will be able to see how much profit you made</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src= 'https://www.sageintelligence.com/wp-content/uploads/2018/05/Sales-Trend-Analysis.png' class="img-fluid" alt="sales analysis">
                  <div class="carousel-caption d-none d-md-block">
                    <h4>Graphical Representation</h4>
                    <p>The analysis will be displayed in the form of graphs for readability. You will be able to see how your business is doing when compared to previous months</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://www.mediafrontier.ch/wp-content/uploads/2016/12/mf-blog-header-social-media-1280x550.png" alt="project" class="img-fluid">
                  <div class="carousel-caption d-none d-md-block">
                    <h4>Insights</h4>
                    <p>Personalised insights such as which product is selling more, which product is selling us, etc will be provided.</p>
                  </div>
                </div>
              </div>
              <a href="#example" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a href="#example" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <br/>
        <br/>
    </section>
    <!-- End of Carousel -->
    <!-- End of Section-4 -->


    <section class="featuredesc1">
        <br/>
        <br/>
        <div class="container col-10">
            <div class="row">
                <div class="col-md align-self-center heading-1">
                    <h2 class="head1">Billing</h2>
                    <p class="emphasis_p">Did you think this is just an inventorying application?</p>
                    <p>You will be able to generate invoices to your customers at the time of transcations using the same application that you use for inventorying! Eliminating the need for another software.</p>
                </div>
                <div class="col-md">
                    <img class="img-fluid" src="https://lh3.googleusercontent.com/proxy/ACFJlGj6ofYJFAFJWoqO-GhFTaKzbhLROh5HcAFYZOWvHEXViCbwMMk3qfL3Esmf0T_iudaikq3-d72U_soQgch29DfNLsR_lG-aJAcM4u-1">
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </section>

    <section class="featuredesc2">
        <br/>
        <br/>
        <div class="container col-10">
            <div class="row">
                <div class="col-md align-self-center heading-1 order-md-2">
                    <h2 class="head1">Order products directly from the manufacturers</h2>
                    <p class="emphasis_p">Make note manufacturers, no more middle men!</p>
                    <p>If you are a store owner and running low on a specific product, you will be able order that product directly from the respective manufacturers.</p>
                </div>
                <div class="col-md order-md-1">
                    <img class="img-fluid" src="https://www.escapetech.com/eol5links/documentation/Content/Resources/Images/Finance/StoresInventory.jpg" alt="image">
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </section>

    <section id="privacy">
        <br/>
        <br/>
        <div class = "container text-center">
            <h2 class="head1">Privacy</h2>
            <p class="emphasis_p">WE VALUE YOUR PRIVACY!</p>
            <p>Privacy is the one aspect in which we never compromise on!<br/>
               The only person that can view your information is <strong>YOU.</strong><br/>
               We will never share any information about you or your company.
           </p>
        </div>
        <br/>
        <br/>
    </section>
    @if(!session('data'))
    <div class="container">
        <br/>
        <br/>
        <div class="row text-center">
            <div class="col">
                <h3>So......<br/> 
                    What are you still waiting for?<br/><br/>
                    Sign up and avail all these features today!
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col signUp text-center">
                <button class="signUp-text btn" style="background: #008ecc;"> 
                    <a href="signup.html" id="su"> Sign Up! </a>
                </button>
            </div>
        </div>
        <br/>
    </div>
    @endif

    <!-- Footer -->
    <footer id="contactus" class="contact mt-5">
        <div class="container col-10 pt-2">
            <div class="row">
                <div class="col">
                    <h2 class="text-white text-center head1">Contact Us</h2>
                    <p class="text-white text-center">Any Queries?<br/>Feel free to contact us!</p>
                </div>
            </div>
            <div class="container col-md-5 col">
                <div class="row text-dark mt-2">
                    <div class="col contactForm" style="position: relative;">
                        <form class="contactform" onsubmit="return ValidateEmail1()">
                            <div class="form-group">
                                <label for="name" class="text-white">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" required>
                                <span class="name-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-white">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                                <span class="email-error"></span>
                                <span id="email-contact-error">Invalid Email !</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="message" class="text-white mt-1">Enter your message here</label>
                                <textarea class="form-control" id="message" placeholder="Type here..." rows="3" required></textarea>
                                <span class="message-error"></span>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn w-50 contactSubmit">Send</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
</footer>
<!-- End of Footer -->
    
    <!-- Tippy.js cdn's for tooltips -->
    <!-- Development -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    
    <!-- Bootstrap cdn's for JavaScript and jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
    <script>
        //jQuery
        //pre-loader
        $(window).on("load",function(){
            $("#loading").fadeOut();
        });

        
        //jQuery
        $(document).ready(function(){
            $('.Link').css("color","#000000");
            $(window).scroll(function(){
                // Nav-Bar change on scroll
                if($(this).scrollTop()>50){
                    $('nav').addClass('nav-addBackground');
                    $('.Link').css("color","#fff");
                    $('.animated-icon2').children().css("background","#fff");
                }
                else{
                    $("nav").removeClass('nav-addBackground');
                    $('.Link').css("color","#000000");
                    $('.animated-icon2').children().css("background","#000000");
                }
                
                // scroll-top icon toggle
                $(".scroll-top").toggleClass("move-up",$(this).scrollTop() < 500);
            });
            
            // move to top of the window on click
            $(".scroll-top").click(function() {
                $("html, body").animate({ 
                    scrollTop: 0 
                },"slow");
            });

            // nav-bar hamburger icon change
            $('.second-button').on('click', function () {

                $('.animated-icon2').toggleClass('open');
            });


            // Add smooth scrolling to about-us and contact-us
            $(".smooth-scroll").on('click', function() {
            // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, "slow");
                } // End if
            });

            // login on focus validation for manufacturers
            var email_error_manufacturers=true;
            var password_error_manufacturers=true;
            $("#login-email").blur(function(){
                if($("#login-email").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $("#login-email-error").css("display","none");
                    $(".email-error-manufacturers").text("Please enter your email").fadeIn();
                    email_error_manufacturers=true;
                }
                else{
                    $(this).css("border","none");
                    $(".email-error-manufacturers").text("").fadeOut();
                    email_error_manufacturers=false;
                }
            });
            $("#password").blur(function(){
                if($("#password").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $(".password-error-manufacturers").text("Please enter your password").fadeIn();
                    password_error_manufacturers=true;
                }
                else if($("#password").val().trim().length < 8){
                    $(this).css("border","2px solid red");
                    $(".password-error-manufacturers").text("Please type atleast 8 characters").fadeIn();
                    password_error_manufacturers=true;
                }
                else{
                    $(this).css("border","none");
                    $(".password-error-manufacturers").text("").fadeOut();
                    password_error_manufacturers=false;
                }
            });
            $(".login-manufacturers").submit(function(e){
                if(email_error_manufacturers==true||password_error_manufacturers==true){
                    $('#login-email #password').blur();
                    e.preventDefault();
                }
            });
            //end of validation







            // login on focus validation for sellers
            var email_error_sellers=true;
            var password_error_sellers=true;
            $("#email-1").blur(function(){
                if($("#email-1").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $("#login-email-error1").css("display","none");
                    $(".email-error-sellers").text("Please enter your email").fadeIn();
                    email_error_sellers=true;
                }
                else{
                    $(this).css("border","none");
                    $(".email-error-sellers").text("").fadeOut();
                    email_error_sellers=false;
                }
            });
            $("#password-1").blur(function(){
                if($("#password-1").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $(".password-error-sellers").text("Please enter your password").fadeIn();
                    password_error_sellers=true;
                }
                else if($("#password-1").val().trim().length < 8){
                    $(this).css("border","2px solid red");
                    $(".password-error-sellers").text("Please type atleast 8 characters").fadeIn();
                    password_error_sellers=true;
                }
                else{
                    $(this).css("border","none");
                    $(".password-error-sellers").text("").fadeOut();
                    password_error_sellers=false;
                }
            });
            $(".login-sellers").submit(function(e){
                if(email_error_sellers==true||password_error_sellers==true){
                    $('#email-1 #password').blur();
                    e.preventDefault();
                }
            });
            //end of validation






            var name_error=true,
                email_error=true,
                mobile_error=true,
                message_error=true;

            //Contact on focus Validation
            $("#name").blur(function(){
                if($("#name").val().trim().length==0){
                    $(this).css("border","2px solid red");
                    $(".name-error").text("Please type your full name").fadeIn();
                    name_error=true;
                }
                else if($(this).val().trim().length > 1 && $(this).val().length <= 6)
                {
                    $(this).css("border","2px solid red");
                    $(".name-error").text("Please type atleast 6 characters").fadeIn();
                    name_error=true;
                }
                else{
                    $(this).css("border","none");
                    $(".name-error").text("").fadeOut();
                    name_error=false;
                }
            });

            $("#email").blur(function(){
                if($("#email").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $("#email-contact-error").css("display","none");
                    $(".email-error").text("Please enter your email").fadeIn();
                    email_error=true;
                }
                else{
                    $(this).css("border","none");
                    $(".email-error").text("").fadeOut();
                    email_error=false;
                }
            });

            $("#message").blur(function(){
                if($("#message").val().trim()==""){
                    $(this).css("border","2px solid red");
                    $(".message-error").text("Please enter your message").fadeIn();
                    message_error=true;
                }
                else{
                    $(this).css("border","none");
                    $(".message-error").text("").fadeOut();
                    message_error=false;
                }
            });

            // contact form validation
            $(".contactform").submit(function(e){
                if(name_error==true || email_error==true || mobile_error==true || message_error==true){
                    $('#name, #email, #phone, #message').blur();
                    e.preventDefault();
                }
            });

            // Carousel interval
            $('.carousel').carousel({
                interval: 5000
            });
            
        });



        //login form validation for manufacturers
        function ValidateEmail(){
                var email = document.getElementById("login-email").value.trim();
                var regex = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if( email!="" && regex.test(email) ){
                    document.getElementById("login-email-error").style.display = "none";
                    document.getElementById("login-email").style.border = "none";
                    return true;
                }
                else{
                    document.getElementById("login-email-error").style.display = "block";
                    document.getElementById("login-email").style.border = "2px solid red";
                    return false;
                }
            }
        //login form validation for sellers
        function ValidateEmail2(){
                var email = document.getElementById("email-1").value.trim();
                var regex = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if( email!="" && regex.test(email) ){
                    document.getElementById("login-email-error1").style.display = "none";
                    return true;
                }
                else{
                    document.getElementById("login-email-error1").style.display = "block";
                    return false;
                }
            }
        // javascript
        // Contact-Form validation
        //Email Validation
        function ValidateEmail1(){
                var email = document.getElementById("email").value.trim();
                var regex = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if( email!="" && regex.test(email) ){
                    document.getElementById("email-contact-error").style.display = "none";
                    document.getElementById("email").style.border = "none";
                    return true;
                }
                else{
                    document.getElementById("email-contact-error").style.display = "block";
                    document.getElementById("email").style.border = "2px solid red";
                    return false;
                }
        }
        

        $('.alert').addClass("show");
            $('.alert').removeClass("hide");
            $('.alert').addClass("showAlert");

            setTimeout(function(){
                $('.alert').removeClass("show");
                $('.alert').addClass("hide");
                $('.alert').fadeToggle();
            },5000);

            $('.close-btn').click(function(){
                $('.alert').removeClass("show");
                $('.alert').addClass("hide");
                $('.alert').fadeToggle();
            });


        // tooltip for scroll to top using tippy.js
        tippy('.scrolltop', {
                content: 'Scroll to Top',
                touch: false,
                zIndex: 9999,
        });
        
    </script>
</body>
</html>
