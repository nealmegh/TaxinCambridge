<!DOCTYPE html>
<html lang="en">

<head>
    @include('2Frontend.Associate.head')
    @yield('css')
    <style>
        .booking-form {
            padding: 20px;
            margin: 0px auto;
            border-radius: 3px;
            border: 1px solid #CCCCCC);
            webkit-box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width:66%;

        }
        @media (max-width:768px){
            .booking-form{
                width:90%;
            }
        }

        .booking-form h1 {
            margin: 0px 0px 40px 0px ;
        }

        .booking-form input {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border-radius: 3px;
            width: 100%;
            border:1px solid #ccc;
            height:35px;
            transition: all 0.5s;


        }
        .booking-form input:hover,
        .booking-form select:hover,
        .booking-form textarea:hover
        {
            -webkit-box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            -moz-box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            transition: all 0.5s;
        }

        .booking-form select {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border-radius: 3px;
            width: 100%;
            border:1px solid #ccc;
            height:35px;
            transition: all 0.5s;

        }

        .booking-form textarea {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            height: 140px;
            transition: all 0.5s;

        }

        .booking-form label {
            color: #f2a158;
            text-transform: none;
            margin-top: 15px;

        }
        .journey-details,.passenger-details{
            border:1px solid #ccc;
            padding:10px;
            border-radius: 3px;
            margin-top: 10px;
        }
        .journey-details-title,.passenger-details-title{
            color: #f2a158;
            margin-top: 15px;
        }
        .journey-details:before{

        }

        .passenger-details{}
        .passenger-details:before{}
        .payment-btn {
            margin: 20px 0px 10px 0px;
            font-size: 24px;
            width: 50%;
        }

        .confirmBtn1 {
            width: 100%;
            font-size: 30px;
            color: white;
            font-weight: 800;
            background-color: #0358b7;
            border: solid #0358b7 1px;
            border-radius: 3px;
        }

        .confirmBtn {

            width: 200px;
            font-size: 25px;
            color: white;
            font-weight: 800;
            background-color: #0358b7;
            border: solid #0358b7 1px;
            border-radius: 3px;
        }
        .confirm
        {
            text-align: center;
            margin-right: 10%;
            margin-left: 0;
            width: 100%;
        }
        .confirmBtn:hover{
            color:#e4e3e3;
        }

        .dropbtn {
            background-color: transparent;
            color: #332f2f;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .logout input[type=submit] {
            width: 100%;
            background-color: #4CAF50; !important
        color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .dropdown-content a:hover {
            background-color: #333333;
            color: #fff !important;
        }
        .dropdown-content .logout{
            background-color:transparent;
            border:none;
            text-transform: uppercase;

        }

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {
            background-color: transparent;
            color: #fff;}
        .navbar-fixed-top {
            display: block !important;
            background-color: #ffffff !important;
        }
        .header-section-space {
            margin-top: 75px;
        }
        @media only screen and (max-width: 360px){
            .confirmBtn {
                width: 100%;
                font-size: 16px;
            }
        }


    </style>
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75">

<!--================================= NAVIGATION START =============================================-->
<nav class="navbar navbar-default navbar-fixed-top menu-bg" id="top-nav">
    @include('2Frontend.Associate.navigation')
</nav>
<!--================================= NAVIGATION END =============================================-->

<!--================================= HEADER-1 START =============================================-->
<div class="container-fluid header-bgimage bgimage-property header-section-space" id="home">
    <div class="container">
        <div class="col-md-12 column-center no-padding white-text">
            <h1 class="center header-head1-bottom">safe &amp; trusted service</h1>
            <h3 class="center">We Pick Up &amp; Drop You On Time by Best Tariff </h3>
            <div class="center btn-top">
                <a href="#book">
                    <div class="header-btn">Book Now</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--================================= HEADER-1 END =============================================-->
<!-- TrustBox widget - Micro Review Count --> <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5ccdf0bc4786990001508f46" data-style-height="94px" data-style-width="100%" data-theme="light"> <a href="https://uk.trustpilot.com/review/taxiincambridge.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
@yield('content')
{{--Booking Form Start--}}




{{--Booking Form End--}}
<!--================================= MAINTENANCE START =============================================-->
@include('2Frontend.Associate.maintenance')
<!--================================= MAINTENANCE END =============================================-->

<!--================================= OUR AWESOME SERVICES START =============================================-->
@include('2Frontend.Associate.service')
<!--================================= OUR AWESOME SERVICES END =============================================-->

<!--================================= OUR AWESOME FEATURES START =============================================-->
@include('2Frontend.Associate.features')
<!--================================= OUR AWESOME FEATURES END =============================================-->

<!--================================= 	LUXURY CARS START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-2">
        <div class="container">
			<h2 class="center h2-bottom">pick-up &amp; drop</h2>
            <div class="row">
                <div class="col-md-12 column-center no-padding">
                    -=============== COLUMN-1 ==================-->
<!--
					<div class="col-md-4 col-sm-6 common-res-bottom-1">
						<div class="luxury-bgimage bgimage-property">
							<div class="luxury-center">
								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/80x80x1.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle luxury-left-pad">
										<h4 class="left"><a href="#">luxury cars</a></h4>
									</div>
								</div>

								<div class="left luxury-line-pad">
									<img src="images/luxury_line.png" alt="icon" />
								</div>

								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/80x80x2.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle luxury-left-pad">
										<h4 class="left"><a href="#">fast &amp; safe</a></h4>
									</div>
								</div>

								<div class="left luxury-line-pad">
									<img src="images/luxury_line.png" alt="icon" />
								</div>

								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/80x80x3.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle luxury-left-pad">
										<h4 class="left"><a href="#">best tariff</a></h4>
									</div>
								</div>
							</div>
						</div>
					</div>

                    -=============== COLUMN-2 ==================-->
<!--
					 <div class="col-md-8 col-sm-6">
                        <div class="luxury-text-top">
                            <div class="left image-bottom">
                                <img src="images/750x340.jpg" alt="image" class="img-responsive image-center" />
                            </div>
                            <h4 class="left h4-bottom"><a href="#">on time pick-up &amp; drop by experienced cab drivers</a></h4>
                            <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. Donec varius </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    -================================= LUXURY CARS END =============================================-->

<!--================================= WHY CHOOSE US START =============================================-->
<section class="container-fluid section-space section-bg-1">
    <div class="container">
        <h2 class="center h2-bottom">why choose us </h2>
        <div class="row">
            <!--=============== COLUMN-1 ==================-->
            <div class="col-md-3 col-sm-6 col-xs-6 why-res-bottom common-res-bottom-1 common-full-1">
                <h4 class="center h4-bottom"><a href="#">Fast Booking</a></h4>
                <p class="center">Our online booking tool wont take more than 5 minutes for booking. </p>
            </div>

            <!--=============== COLUMN-2 ==================-->
            <div class="col-md-3 col-sm-6 col-xs-6 why-res-bottom common-res-bottom-1 common-full-1">
                <h4 class="center h4-bottom"><a href="#">Experienced Drivers</a></h4>
                <p class="center">Taxi in Cambridge ensures all fo our drivers have proper experience and qualifications. </p>
            </div>

            <!--=============== COLUMN-3 ==================-->
            <div class="col-md-3 col-sm-6 col-xs-6 common-full-1 why-res-bottom-1">
                <h4 class="center h4-bottom"><a href="#">On Time Arrival</a></h4>
                <p class="center">We have a very strong history of timely arrival. This achievement ensured us customer reliability.  </p>
            </div>

            <!--=============== COLUMN-4 ==================-->
            <div class="col-md-3 col-sm-6 col-xs-6 common-full-1">
                <h4 class="center h4-bottom"><a href="#">Phone & Online Support</a></h4>
                <p class="center">Have a question to ask? Just dial our number 247 in 365 days. </p>
            </div>
        </div>
    </div>
</section>
<!--================================= WHY CHOOSE US END =============================================-->

<!--================================= TAXI APP START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-2">
        <div class="container">
            <div class="row">
                <!-=============== COLUMN-1 ==================-->
<!--
                <div class="col-md-4 col-sm-4 common-res-bottom-1">
                    <div class="app-bg">
                        <div class="distab app-heading-bottom">
                            <div class="left distab-cell-middle">
                                <img src="images/32x32x1.png" alt="icon" />
                            </div>
                            <div class="left distab-cell-middle app-left-pad">
                                <h4 class="center"><a href="#">taxi app</a></h4>
                            </div>
                        </div>
                        <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos</p>
                    </div>
                </div>

                --=============== COLUMN-2 ==================-->
<!--
                <div class="col-md-4 col-sm-4 common-res-bottom-1">
                    <div class="app-bg">
                        <div class="distab app-heading-bottom">
                            <div class="left distab-cell-middle">
                                <img src="images/32x32x2.png" alt="icon" />
                            </div>
                            <div class="left distab-cell-middle app-left-pad">
                                <h4 class="center"><a href="#">car rental</a></h4>
                            </div>
                        </div>
                        <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos</p>
                    </div>
                </div>

                --=============== COLUMN-3 ==================-->
<!--
                <div class="col-md-4 col-sm-4">
                    <div class="app-bg">
                        <div class="distab app-heading-bottom">
                            <div class="left distab-cell-middle">
                                <img src="images/32x32x3.png" alt="icon" />
                            </div>
                            <div class="left distab-cell-middle app-left-pad">
                                <h4 class="center"><a href="#">live support</a></h4>
                            </div>
                        </div>
                        <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <-================================= TAXI APP END =============================================-->

<!--================================= COUNTER START =============================================-->
<!--
    <section class="container-fluid counter-bgimage bgimage-property counter-section-space white-text">
        <div class="container">
            <div class="row">
                <--=============== COLUMN-1 ==================-->
<!--
               <div class="col-md-3 col-sm-3 col-xs-3 common-full counter-res-bottom">
                   <div class="center">
                       <img src="images/64x64x10.png" alt="icon" />
                   </div>
                   <p class="center counter-num count">1201 </p>
                   <h4 class="center">packages</h4>
               </div>

               <--=============== COLUMN-2 ==================-->
<!--
                <div class="col-md-3 col-sm-3 col-xs-3 common-full counter-res-bottom">
					<div class="center">
                        <img src="images/64x64x11.png" alt="icon" />
                    </div>
                    <p class="center counter-num count">543 </p>
                    <h4 class="center">awards</h4>
                </div>

                <--=============== COLUMN-3 ==================-->
<!--
               <div class="col-md-3 col-sm-3 col-xs-3 common-full counter-res-bottom">
                   <div class="center">
                       <img src="images/64x64x12.png" alt="icon" />
                   </div>
                   <p class="center counter-num count">343 </p>
                   <h4 class="center">clients</h4>
               </div>

                 <--=============== COLUMN-4 ==================-->
<!--
                <div class="col-md-3 col-sm-3 col-xs-3 common-full">
					<div class="center">
                        <img src="images/64x64x13.png" alt="icon" />
                    </div>
                    <p class="center counter-num count">2010 </p>
                    <h4 class="center">LIKES</h4>
                </div>
            </div>
        </div>
    </section>
    <--================================= COUNTER END =============================================-->


<!--================================= AVAILABLE CAR TYPES START =============================================-->
<section class="container-fluid section-space section-bg-1">
    <div class="container">
        <h2 class="center h2-bottom">available car types</h2>
        <!--=============== ROW-1 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x1.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Saloon car</h4>
                    <p class="left">We have a range of state-of-the art saloon cars in our fleet. All of our saloon cars allow 4 passengers, maximum 23kg 2pcs luggage and 8kg 2pcs cabin bags or 30kg 1pcs luggage and 8kg 2pcs cabin bags or 8kg 4pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-2 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x2.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Estate car</h4>
                    <p class="left">We have a range of spacious and modern estate/station wagon cars in our fleet. All of our Estate cars allow 4 passengers and maximum 23kg 3pcs luggage and 8kg 3pcs cabin bags or 30kg 2pcs luggage and 8kg 2pcs cabin bags. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-3 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x3.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Executive car</h4>
                    <p class="left">We are committed to provide airport transfer services with our luxury Executive cars. All of our Executive cars allow up to 4 passengers and maximum 23kg 2pcs luggage and 8kg 2pcs cabin bags or 30kg 1pcs luggage and 8kg 2pcs cabin bags or 8kg 4pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-4 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x4.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Large Multi-seater</h4>
                    <p class="left">If you are in a group or have extra baggage, larger muti-seater is perfect for you. All of our Multi-seater vehicles allow up to 8 passengers and maximum 23kg 5pcs luggage and 8kg 4pcs cabin bags or 30kg 3pcs luggage and 8kg 5pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= AVAILABLE CAR TYPES END =============================================-->


<!--================================= BEST PRICING PACKAGES START =============================================-->
<section class="container-fluid section-space section-bg-2" id="price">
    <div class="container">
        <h2 class="center h2-bottom">Our Top Destinations</h2>
        <div class="row">
            <!--=============== COLUMN-1 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">Stansted Airport</h4>
                    <p class="center pricing-tag ls">From £49 0ne way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>

            <!--=============== COLUMN-2 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">Heathrow Airport</h4>
                    <p class="center pricing-tag ls">From £99 One way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>

            <!--=============== COLUMN-3 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">London City Airport</h4>
                    <p class="center pricing-tag ls">From £83 One way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= BEST PRICING PACKAGES END =============================================-->

<!--================================= DOOR SERVICE START =============================================-->
<!--
   <section class="container-fluid section-space section-bg-1">
       <div class="container">
        <h2 class="center h2-bottom">our powerful services</h2>
           <div class="row">
               <div class="col-md-10 column-center no-padding res-width-full">

                   <div class="col-md-6 col-sm-6 common-res-bottom-1">
                       <div class="luxury-bg-dark-bgimage bgimage-property white-text">
                           <div class="luxury-center">
                               <div class="distab">
                                   <div class="left distab-cell-middle">
                                       <img src="images/80x80x4.png" alt="icon" />
                                   </div>
                                   <div class="left distab-cell-middle luxury-left-pad">
                                       <h4 class="left"><a href="#">	door service</a></h4>
                                   </div>
                               </div>

                               <div class="left luxury-line-pad">
                                   <img src="images/door_uline.png" alt="icon" />
                               </div>

                               <div class="distab">
                                   <div class="left distab-cell-middle">
                                       <img src="images/80x80x5.png" alt="icon" />
                                   </div>
                                   <div class="left distab-cell-middle luxury-left-pad">
                                       <h4 class="left"><a href="#">airport service</a></h4>
                                   </div>
                               </div>

                               <div class="left luxury-line-pad">
                                   <img src="images/door_uline.png" alt="icon" />
                               </div>

                               <div class="distab">
                                   <div class="left distab-cell-middle">
                                       <img src="images/80x80x6.png" alt="icon" />
                                   </div>
                                   <div class="left distab-cell-middle luxury-left-pad">
                                       <h4 class="left"><a href="#">night service</a></h4>
                                   </div>
                               </div>

                               <div class="left luxury-line-pad">
                                   <img src="images/door_uline.png" alt="icon" />
                               </div>

                               <div class="distab">
                                   <div class="left distab-cell-middle">
                                       <img src="images/80x80x7.png" alt="icon" />
                                   </div>
                                   <div class="left distab-cell-middle luxury-left-pad">
                                       <h4 class="left"><a href="#">hotel transport</a></h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                    <div class="col-md-6 col-sm-6">
                       <div class="left image-bottom">
                           <img src="images/750x740.jpg" alt="image" class="img-responsive image-center" />
                       </div>
                        <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper.</p>
                   </div>
               </div>

           </div>
       </div>
   </section>
   <--================================= DOOR SERVICE END =============================================-->

<!--================================= TAXI AVAILABLE 24/7 SERVICE  START =============================================-->

{{--<div class="container-fluid available-bgimage bgimage-property available-section-space">--}}
    {{--<div class="container">--}}
        {{--<div class="col-md-12 column-center no-padding white-text">--}}
            {{--<h2 class="center bgimage-head-bottom">taxi available all days</h2>--}}
            {{--<div class="col-md-8 column-center no-padding">--}}
                {{--<p class="center ls">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit</p>--}}
            {{--</div>--}}
            {{--<div class="center btn-top">--}}
                {{--<a href="#">--}}
                    {{--<div class="btn-1 btn-ant">book now</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}
<!--================================= TAXI AVAILABLE 24/7 SERVICE  END =============================================-->

<!--================================= MOBILE APP START =============================================-->
<!--
    <div class="container-fluid section-space section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 column-center no-padding">
                    <div class="col-md-6 col-sm-6">
                        <div class="left">
                            <img src="images/500x660.png" alt="image" class="img-responsive" />
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="app-heading-top">
							<h3 class="left h3-bottom">fast booking taxi App</h3>
							 <p class="left">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit</p>
							<--=============== LIST START ==================-->
<!--
							<div class="app-list-bottom app-list-top">
								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/24x24x1.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle app-list-left">
										<p class="left app-list ls">EASY</p>
									</div>
								</div>
							</div>

							<div class="app-list-bottom">
								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/24x24x2.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle app-list-left">
										<p class="left app-list ls">SIMPLE</p>
									</div>
								</div>
							</div>

							<div class="app-list-bottom">
								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/24x24x3.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle app-list-left">
										<p class="left app-list ls">MODERN</p>
									</div>
								</div>
							</div>

							<div>
								<div class="distab">
									<div class="left distab-cell-middle">
										<img src="images/24x24x4.png" alt="icon" />
									</div>
									<div class="left distab-cell-middle app-list-left">
										<p class="left app-list ls">RESPONSIVE</p>
									</div>
								</div>
							</div>
							--=============== LIST END ==================-->
<!--
							<div class="app-top distab">
								<div class="distab-cell-middle app-right">
									<a href="#"> <img src="images/app.png" alt="image" class="img-responsive" />
									</a>
								</div>

								<div class="distab-cell-middle">
									<a href="#"> <img src="images/play.png" alt="image" class="img-responsive" />
									</a>
								</div>
							</div>
						</div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    --================================= MOBILE APP END =============================================-->

<!--================================= OUR BEST TARIFF PLANS START =============================================-->
<section class="container-fluid section-space section-bg-1">
    <div class="container">
        <h2 class="center h2-bottom">our best tariffs</h2>
        <div class="row">
            <div class="col-md-8 column-center">
                <!--=============== ROW-1 ==================-->
                <div class="distab plans-radius plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">London City Drop-off</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£83 </p>
                </div>

                <!--=============== ROW-2 ==================-->
                <div class="distab plans-bg-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">London Heathrow Pickup</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£110 </p>
                </div>

                <!--=============== ROW-3 ==================-->
                <div class="distab plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">London Gatwick Drop-off</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£125 </p>
                </div>
                <!--=============== ROW-3.1 ==================-->
                <div class="distab plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">London EuroStar Pick Up</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£107 </p>
                </div>

                <!--=============== ROW-4 ==================-->
                <div class="distab plans-bg-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">30 Minutes Waiting </a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£10 </p>
                </div>

                <!--=============== ROW-5 ==================-->
                <div class="distab plans-bg-2 plans-radius-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">All Meet & Greet </a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">£10 </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================================= OUR BEST TARIFF PLANS END =============================================-->

<!--================================= OUR TEAM START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-2">
        <div class="container">
            <h2 class="center h2-bottom">our team</h2>
            <div class="row">
                <--==========  COLUMN-1 ===============-->
<!--
                <div class="col-md-3 col-sm-3 col-xs-6 common-res-bottom-1 common-full-1">
                    <div class="image-bottom">
                        <img src="images/400x500x1.png" alt="image" class="img-responsive image-center image-grow" />
                    </div>
                    <h4 class="center teambg-author-bottom">MARK MCGARVEY </h4>
                    <p class="center teambg-design ls">DIRECTOR </p>
                </div>

                <--==========  COLUMN-2 ===============-->
<!--
                <div class="col-md-3 col-sm-3 col-xs-6 common-res-bottom-1 common-full-1">
                    <div class="image-bottom">
                        <img src="images/400x500x2.png" alt="image" class="img-responsive image-center image-grow" />
                    </div>
                    <h4 class="center teambg-author-bottom">MITCHELL CULWELL </h4>
                    <p class="center teambg-design ls">MANAGER </p>
                </div>

                <--==========  COLUMN-3 ===============-->
<!--
                <div class="col-md-3 col-sm-3 col-xs-6 common-full-1 team-res-bottom">
                    <div class="image-bottom">
                        <img src="images/400x500x3.png" alt="image" class="img-responsive image-center image-grow" />
                    </div>
                    <h4 class="center teambg-author-bottom">NORBERTO KERBS </h4>
                    <p class="center teambg-design ls">MECHANIC </p>
                </div>

                <--==========  COLUMN-4 ===============-->
<!--
               <div class="col-md-3 col-sm-3 col-xs-6 common-full-1">
                   <div class="image-bottom">
                       <img src="images/400x500x4.png" alt="image" class="img-responsive image-center image-grow" />
                   </div>
                   <h4 class="center teambg-author-bottom">DEWAYNE TAGGART</h4>
                   <p class="center teambg-design ls">DRIVER </p>
               </div>
           </div>
       </div>
   </section>
   <--================================= OUR TEAM END =============================================-->

<!--================================= EMAIL SUBSCRIPTION START =============================================-->
<section class="container-fluid subscription-bgimage bgimage-property section-space white-text">
    <div class="container">
        <div class="col-md-10 column-center no-padding">
            <h2 class="center bgimage-head bgimage-head-bottom">email subscription</h2>
            <div class="col-md-8 column-center no-padding">
                <p class="center email-text-bottom ls">Subscribe in to our email notifications and get the chance to grab hottest offers</p>
            </div>
            <div id="mc_embed_signup">
                <div class="col-md-5 col-sm-6 col-xs-8 column-center no-padding">
                    <div class="form-top">
                        <!--================= YOUR MAILCHIMP ACCOUNT URL HERE ====================-->
                        <form class="subscribe_form" method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" action="http://evethemes.us11.list-manage.com/subscribe/post?u=a795532c55a578843e04b09c0&amp;id=fa362f029a" novalidate>
                            <!--================= EMAIL INPUT BOX HERE ====================-->
                            <div class="clearfix">
                                <input class="form-control place_error" id="mce-EMAIL" type="email" name="EMAIL" placeholder="Your Mail (required)" />
                            </div>

                            <!--================= SUBSCRIBE BUTTON HERE ====================-->
                            <div class="center btn-top">
                                <input type="submit" id="mc-embedded-subscribe" class="btn-1 btn-ant" name="submit" value="SUBSCRIBE">
                            </div>

                            <!--================= SUCCESS AND FAILURE MESSAGE HERE =================-->
                            <div class="center indicator-top" id="ResultMsg"><span id="SuccessMsg" class="email-success"></span><span id="FailureMsg" class="email-failure"></span>
                            </div>

                            <div id="mce-responses">
                                <div class="response response-msg" id="mce-error-response"></div>
                                <div class="response response-msg" id="mce-success-response"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= EMAIL SUBSCRIPTION END =============================================-->

<!--================================= OUR LATEST GALLERY START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-2" id="gallery">
        <div class="container">
            <h2 class="center h2-bottom">our latest gallery</h2>
            <div class="row">
                <--=============== COLUMN-1 ==================-->
<!--
                <div class="col-md-4 col-sm-4 gallery-pad gallery-res-bottom">
                    <div class="center">
                        <img src="images/500x713x1.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <--=============== COLUMN-2 ==================-->
<!--
                <div class="col-md-4 col-sm-4 gallery-pad gallery-res-bottom">
                    <div class="center gallery-row-bottom">
                        <img src="images/500x350x1.jpg" alt="image" class="img-responsive image-center" />
                    </div>

                    <div class="center">
                        <img src="images/500x350x2.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <--=============== COLUMN-3 ==================-->
<!--
               <div class="col-md-4 col-sm-4 gallery-pad gallery-res-bottom">
                   <div class="center">
                       <img src="images/500x713x2.jpg" alt="image" class="img-responsive image-center" />
                   </div>
               </div>


           </div>
       </div>
   </section>
   <--================================= OUR LATEST GALLERY END =============================================-->

<!--================================= OUR LATEST NEWS START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-1">
        <div class="container">
            <h2 class="center h2-bottom">our latest news</h2>
            <div class="row">
                <--=============== COLUMN-1 ==================-->
<!--
                <div class="col-md-3 col-sm-6 col-xs-6 news-res-row-bottom common-res-bottom-1 common-full-1">
                    <div class="left image-bottom">
                        <img src="images/500x360x1.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                    <h4 class="center h4-bottom"><a href="#">Donec varius</a></h4>
                    <p class="center">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
                </div>

                <--=============== COLUMN-2 ==================-->
<!--
                <div class="col-md-3 col-sm-6 col-xs-6 news-res-row-bottom common-res-bottom-1 common-full-1">
                    <div class="left image-bottom">
                        <img src="images/500x360x2.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                    <h4 class="center h4-bottom"><a href="#">Donec varius</a></h4>
                    <p class="center">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
                </div>

                <--=============== COLUMN-3 ==================-->
<!--
                <div class="col-md-3 col-sm-6 col-xs-6 common-full-1 news-res-row-bottom-1">
                    <div class="left image-bottom">
                        <img src="images/500x360x3.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                    <h4 class="center h4-bottom"><a href="#">Donec varius</a></h4>
                    <p class="center">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
                </div>

                <--=============== COLUMN-4 ==================-->
<!--
                <div class="col-md-3 col-sm-6 col-xs-6 common-full-1">
                    <div class="left image-bottom">
                        <img src="images/500x360x4.jpg" alt="image" class="img-responsive image-center" />
                    </div>
                    <h4 class="center h4-bottom"><a href="#">Donec varius</a></h4>
                    <p class="center">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
                </div>
            </div>
        </div>
    </section>
    <--================================= OUR LATEST NEWS END =============================================-->

<!--================================= OUR HAPPY CUSTOMERS START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-2">
        <div class="container">
            <h2 class="center h2-bottom">our happy customers</h2>
            <div class="row">
                <--=============== COLUMN-1 ==================-->
<!--
                <div class="col-md-4 col-sm-4 customers-fixed customers-res-bottom">
                    <div class="customer-bg">
                        <div class="center image-bottom">
                            <img src="images/100x100x1.png" alt="image" />
                        </div>
                        <p class="center customer-text ls">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper</p>
                        <h4 class="center">MARK DAVID </h4>
                        <p class="center customer-design ls">Company </p>
                    </div>
                </div>

                <--=============== COLUMN-2 ==================-->
<!--
                <div class="col-md-4 col-sm-4 customers-fixed customers-res-bottom">
                    <div class="customer-bg">
                        <div class="center image-bottom">
                            <img src="images/100x100x2.png" alt="image" />
                        </div>
                        <p class="center customer-text ls">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper</p>
                        <h4 class="center">LARA EMILY</h4>
                        <p class="center customer-design ls">Company </p>
                    </div>
                </div>

                !--=============== COLUMN-3 ==================-->
<!--
                <div class="col-md-4 col-sm-4 customers-fixed customers-res-bottom">
                    <div class="customer-bg">
                        <div class="center image-bottom">
                            <img src="images/100x100x3.png" alt="image" />
                        </div>
                        <p class="center customer-text ls">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper</p>
                        <h4 class="center">DAVID JANET </h4>
                        <p class="center customer-design ls">Company </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <--================================= OUR HAPPY CUSTOMERS END =============================================-->

<!--================================= HAPPY TRAVEL START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 column-center no-padding res-width-full">
                    <div class="col-md-6 col-md-push-6 res-image-bottom res-image-bottom-1">
                        <div class="left">
                            <img src="images/750x400x1.jpg" alt="image" class="img-responsive image-center" />
                        </div>
                    </div>

                    <div class="col-md-6 col-md-pull-6">
                        <h3 class="left h3-bottom"><a href="#">happy travel</a></h3>
                        <p class="left p-bottom">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. varius sodales. Donec varius sodales orci. Donec varius sodales orci</p>

                        <p class="left ">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. varius sodales. Donec varius sodales orci. Donec varius sodales orci </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <--================================= HAPPY TRAVEL END =============================================-->

<!--================================= SUPPORT START =============================================-->
<!--
   <div class="container-fluid support-bgimage bgimage-property support-section-space">
       <div class="container">
           <div class="col-md-10 column-center no-padding white-text">
               <h4 class="left support-text-bottom">24/7 SUPPORT AVAILABLE </h4>
               <div class="distab">
                   <div class="left distab-cell-middle">
                       <img src="images/64x64x9.png" alt="icon" />
                   </div>
                   <div class="left distab-cell-middle phone-left-pad">
                       <p class="left phone-text ls">+45 534 345 453</p>
                   </div>
               </div>
               <p class="left conditions-text ls">IMPORTANT TERMS &amp; CONDITIONS APPLY</p>
           </div>
       </div>

   </div>
   <--================================= SUPPORT END =============================================-->

<!--================================= DOOR STEP SERVICE START =============================================-->
<!--
    <section class="container-fluid section-space section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 column-center no-padding res-width-full">
                    <div class="col-md-6 res-image-bottom res-image-bottom-1">
                        <div class="left">
                            <img src="images/750x400x2.jpg" alt="image" class="img-responsive image-center" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="left h3-bottom"><a href="#">door step service</a></h3>
                        <p class="left p-bottom">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. varius sodales. Donec varius sodales orci. Donec varius sodales orci</p>

                        <p class="left ">Donec varius sodales orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean a arcu ullamcorper eros viverra suscipit. varius sodales. Donec varius sodales orci. Donec varius sodales orci </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <--================================= DOOR STEP SERVICE END =============================================-->

<!--================================= OUR HAPPY CUSTOMERS START =============================================-->
<!--
    <div class="container-fluid section-space section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 res-client-space-1">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 res-client-space">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 res-client-space-1">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="left">
                        <img src="images/brands.png" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

            </div>
        </div>
    </div>
    !--================================= OUR HAPPY CUSTOMERS END =============================================-->

<!--================================= FOOTER START =============================================-->
@include('2Frontend.Associate.footer')
<!--================================= FOOTER END =============================================-->


<!-- JQUERY LIBRARY -->
{{--<script type="text/javascript" src="js/vendor/jquery.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/jquery.min.js")}}" ></script>
<!-- BOOTSTRAP -->
{{--<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/bootstrap.min.js")}}" ></script>

<!-- SUBSCRIBE MAILCHIMP -->
{{--<script type="text/javascript" src="js/vendor/subscribe/subscribe_validate.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/subscribe/subscribe_validate.js")}}" ></script>

<!-- VALIDATION  -->
{{--<script type="text/javascript" src="js/vendor/validate/jquery.validate.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/validate/jquery.validate.min.js")}}" ></script>

<!-- COUNTER JS FILES -->
{{--<script type="text/javascript" src="js/vendor/counter/counter-lib.js"></script>--}}
{{--<script type="text/javascript" src="js/vendor/counter/jquery.counterup.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/counter/counter-lib.js")}}" ></script>
<script src="{{asset("js/2Frontend/vendor/counter/jquery.counterup.min.js")}}" ></script>

<!-- SLIDER JS FILES -->
{{--<script type="text/javascript" src="js/vendor/slider/owl.carousel.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/slider/owl.carousel.min.js")}}" ></script>
{{--<script type="text/javascript" src="js/vendor/slider/carousel.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/slider/carousel.js")}}" ></script>

<!-- SUBSCRIBE MAILCHIMP -->
{{--<script type="text/javascript" src="js/vendor/subscribe/subscribe_validate.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/subscribe/subscribe_validate.js")}}" ></script>

<!-- VIDEO -->
{{--<script type="text/javascript" src="js/vendor/video/video.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/video/video.js")}}" ></script>


<!-- THEME JS -->
{{--<script type="text/javascript" src="js/custom/custom.js"></script>--}}
<script src="{{asset("js/2Frontend/custom/custom.js")}}" ></script>
@yield('js')

</body>


</html>