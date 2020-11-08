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
    <title>Invoice</title>
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
            font-family: Vollkorn, serif;
            font-size: 1.3em;
        }
        #logo{
            position:relative;
            left:20px;
            width:100px;
            height: auto;
        }
        .nav-addBackground{
            padding: 5px 10px;
            background:#008ecc;
            transition: all 1s;
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
        /* rounded borders for SignUp */
        li{
            border-radius: 0.5em;
        }
        /* table */
        th:hover{
            position:relative;
            top:10px;
            left:10px;
            background-color:#dfcdff;
            border-radius:0px;
            transition:0s linear;
        }
        td{
              opacity:0.8
        }
        td:hover{
            position:relative;
            top:10px;
            left:10px;
            opacity:1;
            border-radius:0px;
            transition:0s linear;
          }
        td{
            background-color: #ffe0da;
        }
        table.table-bordered{
            border-width: 3px;
            border-style: solid;
            }
        table.table-bordered > thead > tr > th{
            border-width: 3px;
            border-style: solid;
        }
        table.table-bordered > tbody > tr > td{
            border-width: 3px;
            border-style: solid;
        }
        table{
            box-shadow: 10px 10px 5px grey;
            background: #777;
            border-radius: 100px/10px; 
        }

        @media only screen and (min-width: 768px){
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
        @media only screen and (max-width: 768px){
            .nav_items{
                background: #008ecc;
            }
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
            #customer_name,#customer_mobile{
                border-radius: 0.8em;
                outline:none;
            }
            #customer_name:focus,#customer_mobile:focus{
                box-shadow: 1px 1px;
            }
            #mobile_error,#name_error{
                display:none;
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
            .generate_invoice{
                display: none;
            }
            .container{
                position:absolute;
                left:0px;
            }
            .container input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('https://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/512/search-icon.png');
            background-size: 30px 30px;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            }

            .container input[type=text]:focus {
            background-color: white;
            background-image: url('https://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/512/search-icon.png');
            background-size: 30px 30px;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            width: 200px;
            outline: none;
            }
    </style>
</head>
<body>
    
        <!-- pre-loader -->
    <div id="loading" class="text-center"></div>
    
    
    <!-- <img class="scroll-top move-up" src="https://img.icons8.com/cute-clipart/64/000000/up-squared.png"/> -->
    <!-- Nav-Bar -->
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
                <a class="nav-link Link" href="home">Home<span></span><span></span><span></span><span></span></a>
              </li>
              <li class="nav-item bg-dark signup">
                <a class="nav-link text-white" href="logout">Log out</a>
              </li>
            </ul>
          </div>
        </nav>
    </header>

    @if(session('seller'))
    @if(session('mobile_number'))
    <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Invalid Mobile Number!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @endif

    @if(session('added'))
    <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Already added!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @endif

    
    @if($data1=="customer_added")
    <section style="padding-top: 100px;">
        <section class="container-fluid">
                Customer Name: {{$data2[0]['customer_name']}} <br>
                Mobile Number: {{$data2[0]['customer_mobile']}} <br>
                Date of Transaction: {{$data2[0]['date_of_transaction']}} <br>
        </section>
        <div class="container-fluid">
                <h1 class="text-center text-white mt-5 bg-dark">Cart</h1>
                <div class="text-center">
                <table class="table table-cart table-responsive-md table-bordered bg-warning">
                    <thead class="text-center">
                    <tr class="display-5">
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity sold</th>
                        <th>Date of manufacture</th>
                        <th>Expiry date</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($data3 as $value)
                    <tr>
                        <td>{{$value->product_name}}</td>
                        <td>{{$value->selling_price}}</td>
                        <td>{{$value->quantity_sold}}</td>
                        <td>{{$value->date_of_manufacture}}</td>
                        <td>{{$value->expiry_date}}</td>
                        <td><a href="remove_item/{{$value->seller_product_id}}/{{$value->id}}" class="btn btn-danger">REMOVE</a></td>
                    </tr>
                    @endforeach
                </table>
                </div>
        </div>
    </section>
    <div class="text-center">
        <a href="items_sold_customer" class="btn btn-success generate_invoice">GENERATE INVOICE</a>
    </div>
    @endif
    
    @if(session('quantity'))
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mx-auto text-info" id="exampleModalLabel">Product Quantity</h5>
        </div>
        <form  action="quantity_sold" method="POST">
         @csrf
            <div class="modal-body">
                Quantity Available: {{session('quantity')}}<br>
                Quantity Required: 
                <input type="number" name="quantity_required" style="width:220px" min="1" max="{{session('quantity')}}" placeholder="Enter Quantity" class="quantity_required text-center ml-3" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning quantity_confirm btn-block">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    @endif

    @if($data1=="customer_added")
    <div class="container" style="padding-top:50px;">
        <input placeholder='Search...' id="search" type="text">
    </div>
    @endif
    <section>
        <div class="container-fluid" style="margin-top:120px;">
                <h1 class="text-center text-white mt-5 bg-dark">List of Items</h1>
                <div class="text-center">
                <table class="table table-responsive-md table-bordered bg-warning">
                    <thead class="text-center">
                    <tr class="display-5">
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Selling price</th>
                    <th>Quantity</th>
                    <th>Date of manufacture</th>
                    <th>Name of manufacturer</th>
                    <th>Expiry date</th>
                    <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody class="text-center sellers_table">
                        @foreach($data as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->product_name}}</td>
                            <td>{{$value->price}}</td>
                            @if($value->selling_price==-1)
                            <td><form action="update_selling_price" method="POST" onsubmit="return validate2({{$value->id}})">@csrf<input type="number" id="update_selling_price" min="1" placeholder="Selling Price" name="update_selling_price" style="max-width:150px" required> <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button></form></td>
                            @else
                            <td>{{$value->selling_price}}</td>
                            @endif
                            <td>{{$value->quantity}}</td>
                            <td>{{$value->date_of_manufacture}}</td>
                            <td>{{$value->name_of_manufacturer}}</td>
                            <td>{{$value->expiry_date}}</td>
                            <td><a type="submit" href="item_sell/{{$value->id}}" class="btn btn-info">Add to Cart</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>
    </section>
    

    
    @if($data1!="customer_added")
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mx-auto text-info" id="exampleModalLabel">Customer Details</h5>
        </div>
        <form  action="customer_details" method="POST" onsubmit="return validate()">
         @csrf
            <div class="modal-body">
                Customer Name:  <input type="text" name="customer_name" placeholder="Enter name" id="customer_name" required/> <br>
                <div id="name_error" style="font-size: 0.7em; color:red; position:absolute; right:60px;">Name should be atleast three characters!</div><br>
                
                Mobile Number:  &nbsp;<input type="tel" name="customer_mobile"  placeholder="Enter mobile number" id="customer_mobile" required/><br>
                <div id="mobile_error" style="border: 0.8em; outline: none; font-size: 0.7em; color:red; position:absolute; right:165px;">Invalid Mobile Number! </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning customer_confirm btn-block">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- End of Modal -->
    @endif
    @else

    <div class="container" style="padding-top:90px;">
        <input placeholder='Search...' id="search1" type="text">
    </div>
    <section>
        <div class="container-fluid" style="padding-top: 100px">
                <h1 class="text-center text-white mt-5 bg-dark">Details</h1>
                <div class="text-center">
                <table class="table table-responsive-md table-bordered bg-warning" id="manufacturers_table">
                    <thead class="text-center">
                    <tr class="display-5">
                        <th>Customer Name</th>
                        <th>Products Sold</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="manufacture_table">
                    @foreach($detail as $data=>$value)
                    <tr>
                        <td>{{$data}}</td>
                        <td>{{$value}}</td>
                        <td><button class="generate btn btn-success">GENERATE INVOICE</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
        </div>
    </section>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $("#exampleModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    </script>
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
            

            $('.alert').addClass("show");
                        $('.alert').removeClass("hide");
                        $('.alert').addClass("showAlert");

                        setTimeout(function(){
                            $('.alert').removeClass("show");
                            $('.alert').addClass("hide");
                            $('.alert').removeClass("showAlert");
                        },5000);

                        $('.close-btn').click(function(){
                            $('.alert').removeClass("show");
                            $('.alert').addClass("hide");
                            $('.alert').removeClass("showAlert");
                        });
                        if($('.table-cart tr').length>1){
                            $('.generate_invoice').fadeIn();
                        }

                        // value to be changed
                        $('.generate').click(function(){
                            $('#manufacturers_table').find('tr').click(function(){
                            var $array = @json($email ?? '');
                            var $id = $(this).index()+1;
                            window.location = '/soldto/'+$array[$id];
                        });
                        });
            $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('.sellers_table tr').each(function(){ 
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
           $('#search1').keyup(function(){  
                search_table1($(this).val());  
           });  
           function search_table1(value){  
                $('#manufacture_table tr').each(function(){ 
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }
                        
        }); 


        function validate(){
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
            var phoneNumber = $('#customer_mobile').val().trim();
            var name = $('#customer_name').val().trim();
            var mobile = false;
            var customer = false;
            if(name.length<3){
                $('#customer_name').css("border","2px solid red");
                $('#name_error').fadeIn();
            }
            else{
                $('#customer_name').css("border","1px solid black");
                $('#name_error').hide();
                customer = true;
            }
            if (filter.test(phoneNumber)) {
              if(phoneNumber.length==10){
                   $('#customer_mobile').css("border","1px solid black");
                   $('#mobile_error').hide();
                   mobile = true;
              } else {
                  $('#customer_mobile').css("border","2px solid red");
                  $('#mobile_error').fadeIn();
              }
            }
            else {
                $('#customer_mobile').css("border","2px solid red");
                $('#mobile_error').fadeIn();
            }



            if(customer==true && mobile==true){
                return true;
            }
            else{
                return false;
            }
        }

        function validate2(id){
                $("#update_selling_price").attr('type','text');
                $("#update_selling_price").val(function() {
                    return this.value +"                          "+id;
                });
                return true;
        }
        </script>
</body>
</html>