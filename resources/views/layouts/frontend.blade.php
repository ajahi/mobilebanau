<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--This is just a link for the fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!--Lnking the CSS-->
    <link rel="stylesheet" href="style2.css">
    
    <title>Mobile Repairs</title>
</head>
<body>
    <div class="container">
       

                    <!--Header Section-->
                    <!--NAvigation Bar-->
        <div class="header">
       
            <nav>
                <img src="img2/logo.png" id="logo">
                <ul class="nav_options">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#services">OUR SERVICES</a></li>
                    <!--Link the next contact us page here-->

                    
                    <li><a href="#">ABOUT US</a></li>
                </ul>
            </nav>
            @include('flash')
        </div>
                    <!-- First Page-->
        <section>
            <div class="firstpg" id="home">
                <div class="texts">
                    <h1>Best <span>Mobile Repair</span><br> Service in City</h1>
                    <h4>Quality assured electronic repair service<br> in a reasonable price</h4>
                    <a href="#form_here"><button>Fix Your Phone</button></a>
    
                </div>
                <div class="art">
                    <img src="img2/first.png" id="vec">
                </div>
            </div>
    
        </section>

         
    </div>
    
    
                <!-- Second page-->

                <!--Our Services-->
               
        <section class="secondpg" id="services">
                <!--Our Services-->
            <div class="Services">
                <div class="service_text">
                    <h2>Our <span>Services</span></h2>
                    <h4>Here are our services..</h4>
                </div>
                <div class="service_options">
                    <div class="service1">
                        <div class="logo1">
                            <img src="img2/consulting.png">
                        </div>
                        <div class="text1">
                            <h3>Free Consulting</h3>
                            <h3><span>for your needs</span></h3>
                        </div>
                    </div>

                    <div class="service2">
                        <div class="logo2">
                            <img src="img2/Guarantee.png">
                        </div>
                        <div class="text2">
                            <h3>Overall Guarantee</h3>
                            <h3><span>for our high quality<br> repairs</span></h3>
                        </div>
                    </div>

                    <div class="service3">
                        <div class="logo3">
                            <img src="img2/Price.png">

                        </div>
                        <div class="text3">
                            <h3>Special Price</h3>
                            <h3><span>for a really affordable<br> price </span></h3>
                        </div>
                    </div>

                    <div class="service4">
                        <div class="logo4">
                            <img src="img2/Homeservice.png">
                        </div>
                        <div class="text4">
                            <h3>Home Service</h3>
                            <h3><span>is very important to us<br> for your satisfaction</span></h3>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="text_in_testimonail_section" id="aboutus">
                <h1>About Us</h1>
                 <!--Testimonials-->   
                 <p>A Team of developers who are eager to inovate and invent,</p>
                 <p>We provide a platform where people can have their mobile phones fixed in a reliable source by taking orders and providing <br>their phones for repair to reliable and experienced technicians.</p>
         </div>
                 
        
            </div>
        </div> 
        </section>



                            <!--Third Page-->
                            <!--Form-->
        <section>
            <div class="container2">
                <div class="inner_container">
                    <div class="vectorArt">
                        <img src="img2/g10.png">
                    </div>
                    <div class="Formm" id="form_here">
                        <div class="Form_title">
                            <h1><span>Book </span>an Appointment</h1>
                        </div>
                        <div class="Form_stuff">
                            <form method="POST" action="/order">
                                @csrf
                                
                                <input type="name" id="Fname" placeholder="First Name" name='name'/><br>
                               
                                
                                <input type="name" id="phone" placeholder="Phone No." name='contact_number'/>

                                
                                <input type="name" id="location" placeholder="Location" name='address'/><br>
                              
                                
                              
                                <input type="submit" id="sub">
    
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
 

        
        <!--Footer Section-->
        <footer id="contact">
            <div class="firstone">
                <div class="icons">
                    <img src="img2/facebook.png" id="facebook">
                    <img src="img2/insta.png" id="insta">
                    <img src="img2/twitter.png" id="twitter">
                    <img src="img2/linkedin.png" id="linkedin">
                </div>
                <div class="logoo">
                    <img src="img2/logo.png">
                </div>
                <div class="payment">
                    <img src="img2/visa.png" id="visa">
                    <img src="img2/Khalti_Logo_Color.png" id="paypal">
                    <img src="https://esewa.com.np/common/images/esewa_logo.png" id="esewa">
                </div>
            </div>







            <div class="secondone">
                <div class="mail">
                    <img src="img2/mail.png">
                    <h2>Mail</h2>
                    <h2 class="highlighted">abc123@gmail.com</h2>
                </div>
                <div class="call">
                    <img src="img2/call.png">
                    <h2>Call Us</h2>
                    <h2 class="highlighted">9841111111</h2>
                </div>
                <div class="FindUs">
                    <img src="img2/findus.png">
                    <h2>Find Us</h2>
                    <h2 class="highlighted">Davis Falls, Pokhara</h2>
                </div>
            </div>


            
            <div class="thirdone">
                <h4>Copyright &copy; 2021. <span>All right reserved.</span></h4>
            </div>
        </footer>



        <script src="script.js"></script>
</body>
</html>