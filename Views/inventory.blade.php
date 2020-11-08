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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    
    <title>Inventory</title>
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


        /* Item Requests */
        .notification {
        background-color: #555;
        color: white;
        text-decoration: none;
        padding: 15px 26px;
        position: relative;
        display: inline-block;
        border-radius: 2px;
        left: 15px;
        }

        .notification:hover {
        background: #566;
        text-decoration: none;
        }
        .item-requests,.item-requests-seller{
            display: none;
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
            #popUp {
            position: fixed;
            max-width: 350px;
            height: 225px;
            background: rgba(236, 240, 241, 1);
            border: 7px solid #fff;
            bottom: 0;
            margin-left: 0;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
            }

            #new span {
            background: #fff;
            position: absolute;
            color: #1c8dc4;
            padding: 4px 10px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: -5px;
            }

            #popUp .close {
            color: #464646;
            right: 8px;
            top: 0px;
            position: absolute;
            font-size: 20px;
            cursor: pointer;
            }

            #popUp h2 {
            font-size: 17px;
            color: #464646;
            line-height: 24px;
            font-weight: 400;
            text-align: center;
            margin-top: 40px;
            padding: 0 20px;
            }

            #body {
            height: 1200px;
            background: #eee;
            }

            a.button {
            margin: 0 auto;
            text-align: center;
            right: 0;
            left: 0;
            position: absolute;
            width: 120px;
            font-size: 15px;
            color: #fff;
            border-bottom: 2px solid #18729f;
            background: #1c8dc4;
            border-radius: 4px;
            padding: 8px 0;
            }

            #plus {
            position: fixed;
            color: #fff;
            bottom: 15%;
            font-size: 15px;
            margin-left: -425px;
            -webkit-transition: all 1.25s ease;
            -moz-transition: all 1.25s ease;
            -o-transition: all 1.25s ease;
            transition: all 1.25s ease;
            cursor: pointer;
            text-align: left;
            letter-spacing: 1px;
            }

            #plus span {
            position: absolute;
            margin-top: 38px;
            left: 4px;
            }

            #plus::after {
            content: '';
            display: block;
            display: relative;
            border-top: 55px solid transparent;
            border-bottom: 55px solid transparent;
            border-left: 55px solid #1c8dc4;
            }

            @media all and (max-width: 900px) {
            #popUp {
                margin-left: -425px;
            }
            #plus {
                margin-left: 0px;
            }
            }
            .add_product,.add_product_seller{
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

            .alert1{
            padding: 20px 40px;
            min-width: 350px;
            position: fixed;
            right: 0px;
            top: 100px;
            border-radius: 4px;
            border-left: 8px solid #ffa502;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            }
            .alert1.showAlert{
            opacity: 1;
            pointer-events: auto;
            }
            .alert1.show{
            animation: show_slide1 1s ease forwards;
            }
            @keyframes show_slide1 {
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
            .alert1.hide{
            animation: hide_slide1 1s ease forwards;
            }
            @keyframes hide_slide1 {
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
            .alert1 .fa-check{
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            }
            .alert1 .msg{
            padding: 0 20px;
            font-size: 18px;
            color: #000000;
            }
            .alert1 .close-btn{
            position: absolute;
            right: 0px;
            top: 50%;
            transform: translateY(-50%);
            padding: 20px 18px;
            cursor: pointer;
            }
            .alert1 .close-btn .fas{
            font-size: 22px;
            line-height: 40px;
            }
            #update_selling_price{
                border-radius: 0.8em; 
            }
            .quantity_required{
                border-radius: 0.8em;
            }
            .quantity_required:focus,#update_selling_price:focus{
                outline: none;
                box-shadow: 1px 1px;
            }
            .add-product-seller{
            padding:2%;
            background:#ffcc00;
            border-radius: 10px;  

            }
            .add-product-seller input{
                width:80%;
                border-radius:8px;
                text-align: center;
                border:1px solid rgb(180,180,180);
            }

            .add-product-seller label{
                font-weight: bolder;
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
    <div style="padding-top: 100px; padding-left: 15px;">
        <button class="btn btn-info request"><i class="fa fa-plus"></i> REQUEST FOR PRODUCTS</button>
    </div>
    @endif
    
    @if(session('manufacturer'))
    <section class="list-of-items" style="padding-top: 50px;">
        <div class="container-fluid">
              <h1 class="text-center text-white mt-5 bg-dark">List of Items</h1>
              <div class="text-center">
              @csrf
              <table class="table editable_manufacturer_inventory table-responsive-md table-bordered bg-warning">
                <thead class="text-center">
                  <tr class="display-5">
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Production cost</th>
                    <th>Material cost</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date of manufacture</th>
                    <th>Expiry date</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $value)
                  <tr> 
                    <td>{{$value->id}}</td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->production_cost}}</td>
                    <td>{{$value->material_cost}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->date_of_manufacture}}</td>
                    <td>{{$value->expiry_date}}</td>
                  </tr>
                @endforeach
                </tbody>
                </table>
              </div>
        </div>
        


        <div class="add_product container rounded mt-5 mb-5">

                <form class="add-product-seller" action="addProductManufacturer" method="POST" onsubmit="return validate()">
                @csrf
                <div class = "row">
                    <div class="col-md col-12">
                        <label for="Product Name">Product Name:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="text" name="pname" id="p_name" minlength="3" placeholder="Product Name" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Price">Production Cost:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                    <input type="number" name="production_cost" min="1" placeholder="Enter Cost" id="production_cost" required>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-md col-12">
                        <label for="Selling Price">Material Cost:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="material_cost" min="1" placeholder="Enter Cost" id="material_cost" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Quantity">Price:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="price" min="1" placeholder="Enter Price" id="price" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Date of Manufacture">Quantity:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="quantity" min="1" placeholder="Enter Quantity" id="quantity" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Expiry Date">Date of Manufacture:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <div id="date_of_m"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md col-12">
                        <label for="Manufacturer Name">Expiry Date:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="date" name="dom" id="expiry" required>
                    </div>
                </div>

                <br/>
                    <button type="submit" class="btn btn-info btn-block">ADD</button>
                
                </form>
            </div>
        
        <div class="add_more text-center">
            <div class="btn btn-info"> Add More <i class="fa fa-plus"></i></div>
        </div>
    </section>
    @endif


    <!-- Table for list of items-->
    @if(session('seller'))
    <section class="list-of-items">
        <div class="container-fluid">
              <h1 class="text-center text-white mt-5 bg-dark">List of Items</h1>
              <div class="text-center">
              @csrf
              <table class="table editable_seller_inventory table-responsive-md table-bordered bg-warning">
                <thead class="text-center">
                  <tr class="display-5">
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date of manufacture</th>
                    <th>Name of manufacturer</th>
                    <th>Expiry date</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data1 as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->date_of_manufacture}}</td>
                    <td>{{$value->name_of_manufacturer}}</td>
                    <td>{{$value->expiry_date}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>
        </div>


            <div class="add_product_seller container rounded mt-5 mb-5">

                <form class="add-product-seller" action="addProductSeller" method="POST" onsubmit="return validate1()">
                @csrf
                <div class = "row">
                    <div class="col-md col-12">
                        <label for="Product Name">Product Name:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="text" name="pname_seller" id="p_name" minlength="3" placeholder="Product Name" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Price">Price:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="price_seller" min="1" placeholder="Enter Price" id="price" required>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-md col-12">
                        <label for="Selling Price">Selling Price:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="selling_price_seller" min="1" placeholder="Enter Selling Price" id="selling_price" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Quantity">Quantity:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="number" name="quantity_seller" min="1" placeholder="Enter Quantity" id="quantity" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Date of Manufacture">Date of Manufacture:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="date" name="date_of_manufacture" id="date_of_manufacture" required>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md col-12">
                        <label for="Expiry Date">Expiry Date:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="date" name="dom_seller" id="expiry_seller" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md col-12">
                        <label for="Manufacturer Name">Manufacturer's Name:</label>
                    </div>
                    <div class="col-md col-12 text-center">
                        <input type="text" name="name_of_manufacturer" id="name_of_manufacturer" placeholder="Enter Manufacturer's Name" required>
                    </div>
                </div>

                <br/>
                    <button type="submit" class="btn btn-info btn-block">ADD</button>

                </form>
            </div>
        
            <div class="add_more_seller text-center">
                <div class="btn btn-info"> Add More <i class="fa fa-plus"></i></div>
            </div>
    </section>
    <!-- End of table -->
    @endif
    
    @if(session('seller'))
    <section class="item-requests-seller" style="padding-top: 50px;">
        <span class="d-block d-md-none"><br></span>
        <div class="container-fluid">
              <h1 class="text-center text-white mt-5 bg-dark">Products available for requests</h1>
              <div class="text-center">
              <div class="table-responsive-md">
                    <table class="table table-bordered bg-warning">
                        <thead class="text-center">
                            <tr class="display-5">
                                <th>Name of manufacturer</th>
                                <th>Product Name</th>
                                <th>Quantity available</th>
                                <th>Price</th>
                                <th>Date of manufacture</th>
                                <th>Expiry date</th> 
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($data2 as $value)
                            <tr>
                                <td>{{$value->name_of_manufacturer}}</td>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->date_of_manufacture}}</td>
                                <td>{{$value->expiry_date}}</td>
                                <td><a href="item_requests/{{$value->id}}" class="btn btn-info">REQUEST</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
              </div>
        </div>
    </section>
    @endif

    <!-- Modal -->
    @if(session('quantity'))
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mx-auto text-info" id="exampleModalLabel">Product Quantity</h5>
        </div>
        <form  action="confirm_quantity" method="POST">
         @csrf
            <div class="modal-body">
                Quantity Available:  {{session('quantity')}} <br>
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

    @if(!session('seller'))
    @if($requests=="true")
    <section class="notified"><div id="popUp" style="z-index:999;">
    <div id="close" class="close"><i class="fa fa-times"></i></div>
    <div id="new"><span>NEW ITEM REQUESTS!</span></div>
    <h2>You received item requests from seller. Click on the button below to view item requests.</h2>
    <br>
    <a class="button notification" style="cursor:pointer;">View Requests</a>
    </div>
    <div id="plus" style="z-index:999;"><span>NEW<br>&nbsp;&nbsp;<i class="fa fa-plus"></i></span></div></section>
    @endif
    @endif

    @if($requests=="true")
    <!-- Table for requests from seller -->
    <section class="item-requests">
        <span class="d-block d-md-none"><br></span>
        <div class="container-fluid">
              <h1 class="text-center text-white mt-5 bg-dark">Item Requests</h1>
              <div class="text-center">
              <div class="table-responsive-md">
                    <table class="table table-bordered bg-warning">
                        <thead class="text-center">
                            <tr class="display-5">
                                <th>Seller Name</th>
                                <th>Product Name</th>
                                <th>Quantity Required</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($data3 as $value)
                        @if(session('manufacturer')==$value->manufacturers_email)
                            <tr>
                                <td>{{$value->sellers_name}}</td>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->quantity_required}}</td>
                                <td><a href="grant_request/{{$value->manufacturer_product_id}}/{{$value->id}}" class="btn btn-info">GRANT</a></td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
            </div>
              </div>
        </div>
    </section>
    <!-- End of Table -->
    @endif
    <div class="alert alert3">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Invalid Expiry Date!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>


    @if(!session('seller'))
    <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Invalid Expiry Date!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @else
    <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Insufficient Stock!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @endif

    @if(session('requested'))
    <div class="alert alert2">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Already Requested!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
    </div>
    @endif

    @if(session('message'))
      <div class="alert1 alert-success">
        <span class="fas fa-check"></span>
        <span class="msg">Added Successfully!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
      </div>
    @endif

    @if(session('confirmed'))
      <div class="alert1 alert-success">
        <span class="fas fa-check"></span>
        <span class="msg">Requested Successfully!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
      </div>
    @endif

    @if(session('granted'))
      <div class="alert1 alert-success">
        <span class="fas fa-check"></span>
        <span class="msg">Request granted!</span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
      </div>
    @endif

    <!-- Tippy.js cdn's for tooltips -->
    <!-- Development -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    
    <!-- Bootstrap cdn's for JavaScript and jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $("#exampleModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    </script>
    
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


            $(".notification").click(function(){
                $(".notified").fadeOut(100);
                $(".item-requests").fadeIn(1000);
            });

            $(".request").click(function(){
                $(".request").fadeOut(100);
                $(".item-requests-seller").fadeIn(1000);
            });

            $('.add_more').click(function(){
                $('.add_product').fadeIn(100);
                $('.add_more').fadeOut(100);
            })
            $('.add_more_seller').click(function(){
                $('.add_product_seller').fadeIn(100);
                $('.add_more_seller').fadeOut(100);
            })
            
            $.ajaxSetup({
                headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
                }
            });
            
            $('.editable_seller_inventory').Tabledit({
                url:'{{route("inventory.edit_delete_seller_inventory")}}',
                dataType:"json",
                columns:{
                identifier:[0, 'id'],
                editable:[[1, 'product_name'], [2, 'price'], [3, 'selling_price'], [4, 'quantity'], [5,'date_of_manufacture'], [6, 'name_of_manufacturer'], [7, 'expiry_date']]
                },
                restoreButton:false,
                buttons: {
                    edit: {
                        class: 'btn btn-sm btn-info',
                        html: '<i class="fa fa-pencil" aria-hidden="true"></i>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'btn btn-sm btn-danger',
                        html: '<i class="fa fa-trash" aria-hidden="true"></i>',
                        action: 'delete'
                    },
                },
                onSuccess:function(data, textStatus, jqXHR)
                {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
                }
            });

            
            
        }); 

            var d = new Date();
            $('#date_of_m').text((d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear());
            function validate(){
                    var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
                    var x = new Date(strDate);
                    var y = new Date($('#expiry').val().trim());
                    if(x>=y){
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
                        $('#expiry').css("border","2px solid red");
                        return false;
                    }
                    return true;
            }

            function validate1(){
                var x = new Date($('#date_of_manufacture').val().trim());
                var y = new Date($('#expiry_seller').val().trim());
                if(x>=y){
                        $('.alert3').addClass("show");
                        $('.alert3').removeClass("hide");
                        $('.alert3').addClass("showAlert");

                        setTimeout(function(){
                            $('.alert3').removeClass("show");
                            $('.alert3').addClass("hide");
                            $('.alert3').removeClass("showAlert");
                        },5000);

                        $('.close-btn').click(function(){
                            $('.alert3').removeClass("show");
                            $('.alert3').addClass("hide");
                            $('.alert3').removeClass("showAlert");
                        });
                        $('#expiry_seller').css("border","2px solid red");
                        return false;
                    }
                    return true;
            }

            function validate2(id){
                $("#update_selling_price").attr('type','text');
                $("#update_selling_price").val(function() {
                    return this.value +"                          "+id;
                });
                return true;
            }
            

        $(document).scroll(function() {
            var scroll = $(this).scrollTop();
            if (scroll >= 150) {
                $("#popUp").css("margin-left", "-425px");
                $("#plus").css("margin-left", "0px");
            }
            });

            $("#plus").click(function() {
            $("#popUp").css("margin-left", "0px");
            $("#plus").css("margin-left", "-425px");
            });

            $("#close").click(function() {
            $("#popUp").css("margin-left", "-425px");
            $("#plus").css("margin-left", "0px");
        });


        $('.alert1').addClass("show");
            $('.alert1').removeClass("hide");
            $('.alert1').addClass("showAlert");

            setTimeout(function(){
                $('.alert1').removeClass("show");
                $('.alert1').addClass("hide");
                $('.alert1').removeClass("showAlert");
            },5000);

            $('.close-btn').click(function(){
                $('.alert1').removeClass("show");
                $('.alert1').addClass("hide");
                $('.alert1').removeClass("showAlert");
            });
        






            $('.alert2').addClass("show");
            $('.alert2').removeClass("hide");
            $('.alert2').addClass("showAlert");

            setTimeout(function(){
                $('.alert2').removeClass("show");
                $('.alert2').addClass("hide");
                $('.alert2').removeClass("showAlert");
            },5000);

            $('.close-btn').click(function(){
                $('.alert2').removeClass("show");
                $('.alert2').addClass("hide");
                $('.alert2').removeClass("showAlert");
            });
            @if(!session('seller'))
            $.ajaxSetup({
                headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
                }
            });
            
        $('.editable_manufacturer_inventory').Tabledit({
                url:'{{route("inventory.edit_delete_manufacturer_inventory")}}',
                dataType:"json",
                columns:{
                identifier:[0, 'id'],
                editable:[[1, 'product_name'], [2, 'production_cost'], [3, 'material_cost'], [4, 'price'], [5, 'quantity'], [6, 'date_of_manufacture'], [7, 'expiry_date']]
                },
                restoreButton:false,
                buttons: {
                    edit: {
                        class: 'btn btn-sm btn-info',
                        html: '<i class="fa fa-pencil" aria-hidden="true"></i>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'btn btn-sm btn-danger',
                        html: '<i class="fa fa-trash" aria-hidden="true"></i>',
                        action: 'delete'
                    },
                },
                onSuccess:function(data, textStatus, jqXHR)
                {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
                }
            });
            @endif


        // tooltip for edit icon using tippy.js
        tippy('.notification',{
          content: 'Click to view requests',
          animation: 'scale',
          arrow: true,
          touch: false,
          zIndex: 9999,
        });
    </script>
</body>
</html>