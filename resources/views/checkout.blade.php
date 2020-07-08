<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropd.css">
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/welcome" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/produit" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item "><a href="/single_product" class="nav-link">Description</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
			  <li class="nav-item"><a href="{{route('Shopping_cart')}}" class="nav-link"><i class="icon-shopping-cart"></i> Cart [{{session()->has('cart') ? session()->get('cart')->totalQty: '0'}}]</a></li>
        <li>
			   @guest
			   <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
				@else
				<div class="dropdown">
              	 	<button onclick="myFunction()" class="dropbtn glyphicon glyphicon-chevron-down">{{auth()->user()->nom}}</button>
					<div id="myDropdown" class="dropdown-content ">
						<i class="input"><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></i>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</div>
				@endguest
               
			   </li>   
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Pizza Cart</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Pizza</h2>
          </div>
        </div>
       <div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center ">
								<p><span style="color:orange">01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span style="color:orange">02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span style="color:orange">03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				   
                <div class="row">
					<div class="col-lg-8">
						<form action="{{route('checkout')}}"  method="POST" class="colorlib-form" id="payment-form">
               @csrf
							<h2>Billing Details</h2>
		              	<div class="row">
			              

								<div class="col-md-12">
									<div class="form-group">
										<label for="email">Email Address</label>
                    @if (auth()->user())
										<input type="text" id="email" class="form-control" placeholder="Your firstname" name="email" value="{{ auth()->user()->email}}" readonly>
                    @else
                    <input type="text" id="email" class="form-control" placeholder="Your firstname" name="email" value="{{ old('email') }}" required>
                    @endif
									</div>
								</div>
								

								<div class="col-md-12">
									<div class="form-group">
										<label for="address">Address Livraison</label>
                    @if (auth()->user())
			                    	<input type="text"  class="form-control" placeholder="Company Name" id="adressLiv" name="adresse" value="{{ auth()->user()->adresse}}" readonly>
                            @else
                            <input type="text"  class="form-control" placeholder="Company Name" id="adressLiv" name="adresse" value="{{ old('adresse') }}" required>
                            @endif  
			                  </div>
			               </div>

			               <div class="col-md-12">
									<div class="form-group">
										<label for="secteur">Secteur</label>
			                    	<input type="text"  class="form-control" placeholder="Enter Your Address" id="secteur" name="secteur" value="{{ old('secteur') }}" required>
			                  </div>
			               </div>
			            
 
			               
								
								
		               </div>
		            </form>
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Cart Total</h2>
									<ul>
										<li>
											<span>Subtotal</span> <span>$100.00</span>
											<ul>
												<li><span>1 x Product Name</span> <span>$99.00</span></li>
												<li><span>1 x Product Name</span> <span>$78.00</span></li>
											</ul>
										</li>
										<li><span>Shipping</span> <span>$0.00</span></li>
										<li><span>Order Total</span> <span>$180.00</span></li>
									</ul>
								</div>
						   </div>

						   <div class="w-100"></div>

						   <div class="col-md-12">
								<div class="cart-detail">
									<h2>Payment</h2>
									<div class="form-group">
										<div class="col-md-12">
                    <label for="card-element">Credit or debit card</label>
											<div id="card-element">
                         
											</div>
                      <div id="card-errors" role="alert"></div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								
                <input type="submit" id="complete-order" value="Place an order" class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>

							</div>
						</div>
					</div>
				</div>
    </section>

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
  var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
  var elements = stripe.elements();
  var style = {
      base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#aab7c4"
        }
      },
      invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.on('change', ({error}) => {
      const displayError = document.getElementById('card-errors');
      if (error) {
        displayError.textContent = error.message;
      } else {
        displayError.textContent = '';
      }
    });
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(ev) {
      ev.preventDefault();
      document.getElementById('complete-order').disabled = true;
      stripe.confirmCardPayment("{{$clientSecret}}", {
        payment_method: {
          card: card,
        }
      }).then(function(result) {
        if (result.error) {
          document.getElementById('complete-order').disabled = false;
          // Show error to your customer (e.g., insufficient funds)
          console.log(result.error.message);
        } else {
          // The payment has been processed!
          if (result.paymentIntent.status === 'succeeded') {
            var paymentIntent = result.paymentIntent;
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var url = form.action;
            var redirect = '/merci';
            fetch(
              url,
              {
                headers:{
                  "Content-Type":"Application/json",
                  "Accept":"Application/json , text-plain , */*",
                  "X-Requested-With":"XMLHttpRequest",
                  "X-CSRF-TOKEN":token,
                },
                method : 'post',
                body: JSON.stringify({
                  adressLiv: document.getElementById("adressLiv").value,
                  type:'particulier',
                  realise:false,
                  secteur: document.getElementById("secteur").value,
                })
              }
            ).then((data)=>{
                console.log(data);
                //window.location.href = redirect;
              }).catch((error)=>{
                console.log(error);
              })
            //console.log(result.paymentIntent);
          }
        }
      });
    });
  </script>

  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/dropd.js"></script> 
  </body>
</html>