<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   @extends('master.layout')
   @section('content')
   <body>
      <!--headder-->
      @include('includes.header')
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('index')}}">Home</a>
                  <span>/ /</span>
               </li>
               <li>Service</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--service -->
      <section class="service py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Layanan</h3>
            <div class="row text-center">
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-truck"></span>
                  <h5>Jasa Pengiriman</h5>
                  <p class="mt-3"> Pengiriman cepat dan dapat dipantau secara langsung
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-phone-volume"></span>  
                  <h5>Layanan Telepon</h5>
                  <p class="mt-3"> Menyediakan layanan telepon untuk pembeli
                  </p>
               </div>
               
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-money-bill-alt"></span>
                  <h5>Pembayaran Online</h5>
                  <p class="mt-3"> Pembayaran dapat dilakukan dengan transfer lewat bank
                  </p>
               </div>
               
               <div class="col-lg-4 col-md-6 mt-lg-4 mt-3 abut-gride">
                  <span class="fas fa-thumbs-up"></span>
                  <h5>Berkualitas</h5>
                  <p class="mt-3"> Barang berkualitas dengan harga terjangkau
                  </p>
               </div>
            </div>
         </div>
      </section>
      <!--//service -->	 
      <!--subscribe-address-->
      
   </body>
</html>