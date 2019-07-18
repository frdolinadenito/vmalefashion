<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <!DOCTYPE html>
<html lang="zxx">
<head>
      <title>Toys Shop an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--checkout-->
      <link rel="stylesheet" type="text/css" href="css/checkout.css">
      <!--//checkout-->
      <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
  
   <body>
      <!--headder-->
      @include('includes.header')
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('index')}}">Home</a>
                  <span>/ /</span>
               </li>
               <li>Payment</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!-- top Products -->
      <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <div class="ads-grid_shop">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Pay<span>ment</span></h3>
                     <!--/tabs-->
                     <div class="responsive_tabs">
                        <div id="horizontalTab">
                           <ul class="resp-tabs-list">
                              
                              <li>Net Banking</li>
                              
                           </ul>
                           <div class="resp-tabs-container">
                              
                              
                              <div class="tab3">
                                 <div class="pay_info">
                                    <div class="vertical_post">
                                       <form action="#" method="post">
                                          <h5>Select From Popular Banks</h5>
                                          <div class="swit-radio">
                                             <div class="check_box_one">
                                                <div class="radio_one"> <label><input type="radio" name="radio" checked=""><i></i>Syndicate Bank</label> </div>
                                             </div>
                                             <div class="check_box_one">
                                                <div class="radio_one"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div>
                                             </div>
                                             <div class="check_box_one">
                                                <div class="radio_one"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div>
                                             </div>
                                             <div class="check_box_one">
                                                <div class="radio_one"> <label><input type="radio" name="radio"><i></i>ICICI Bank</label> </div>
                                             </div>
                                             <div class="check_box_one">
                                                <div class="radio_one"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div>
                                             </div>
                                             <div class="clearfix"></div>
                                          </div>
                                       
                                          <input type="submit" value="PAY NOW">
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                     <!--//tabs-->
                  </div>
               </div>
               <!-- //payment -->
               <div class="clearfix"></div>
            </div>
         </div>
      </section>
     <!--//subscribe-->
     <!--headder-->
     @include('includes.footer')
      <!--//headder-->
      <!-- footer -->
     
      <!-- //footer -->
      <!-- Modal 1-->
      
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
      <script src="js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!--// cart-js -->
      <!-- easy-responsive-tabs -->
      <script src="js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- credit-card -->
      <script src="js/creditly.js"></script>
      <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />
      <script>
         $(function () {
         	var creditly = Creditly.initialize(
         		'.creditly-wrapper .expiration-month-and-year',
         		'.creditly-wrapper .credit-card-number',
         		'.creditly-wrapper .security-code',
         		'.creditly-wrapper .card-type');
         
         	$(".creditly-card-form .submit").click(function (e) {
         		e.preventDefault();
         		var output = creditly.validate();
         		if (output) {
         			// Your validated credit card output
         			console.log(output);
         		}
         	});
         });
      </script>
      <!-- //credit-card -->
      <!-- start-smoth-scrolling -->
      <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html>