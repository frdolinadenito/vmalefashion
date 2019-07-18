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
               <li>About</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--About -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Us</h3>
            <div class="about-innergrid-agile text-center">
               <h4>Welcome To Our Store</h4>
               <p class="mb-3"> Vmale Fashion Indonesia merupakan yang terdepan dalam belanja fashion online, 
                  menyediakan brand lokal dan internasional yang terus bertambah untuk para konsumer di 
                  seluruh Indonesia. Kami memiliki banyak produk yang dapat memenuhi 
                  kebutuhan fashion Anda, mulai dari Baju hingga tas, sepatu, Sweater dan masih banyak lagi.
               </p>
               <div class=" img-toy-w3l-top">
               </div>
            </div>
            <div class="about-sub-inner text-center mt-lg-4 mt-3">
               <h4>A faster and better
                  best to shop
               </h4>
               <div class="row">
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-truck"></span>
                     <h5>Jasa Pengiriman</h5>
                     <p class="mt-3"> Pengiriman cepat dan dapat dipantau secara langsung
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-phone-volume"></span>  
                     <h5>Layanan Telepon</h5>
                     <p class="mt-3"> Menyediakan layanan telepon untuk pembeli
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-thumbs-up"></span>
                     <h5> Berkualitas</h5>
                     <p class="mt-3"> Barang berkualitas dengan harga terjangkau
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--//about -->
      <!--Customers Review -->
      
      <!--//Customers Review -->
      <!--subscribe-address-->
     
   </body>
</html>