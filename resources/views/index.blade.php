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
      <!-- Slideshow 4 -->
      <div class="slider text-center">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img one-img">
                        <div class="container">
                           <div class="slider-info ">
                              <h5>Pilih Fashion Terbaik <br>Untuk Mu</h5>
                              <div class="bottom-info">
                                 <p>Pelajari lebih lanjut</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="{{route('about')}}">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img two-img">
                        <div class="container">
                           <div class="slider-info ">
                              <h5>Tampil Modif dan Stylist<br>Untuk Mu</h5>
                              <div class="bottom-info">
                                 <p>Pelajari lebih lanjut</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="{{route('about')}}">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img three-img">
                        <div class="container">
                           <div class="slider-info">
                              <h5>Fashion Terbaik<br> Dengan Harga Terjangkau</h5>
                              <div class="bottom-info">
                                 <p>Pelajari lebih lanjut</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="{{route('about')}}">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <!-- This is here just to demonstrate the callbacks -->
            <!-- <ul class="events">
               <li>Example 4 callback events</li>
               </ul>-->
            <div class="clearfix"></div>
         </div>
      <!-- //banner -->
      <!-- about -->

      
<!-- /.keranjang -->
<section class="content">
<div class="container">
<h1>Produk Terbaru</h1>


      <!-- Small boxes (Stat box) -->
      <div class="row">
	 
      @foreach($products as $product)
      <?php if ($product["Stok"]!= 0) { ?>
        <div class="col-md-4">
          <!-- small box -->
         <div class="small-box bg-green">
            <div class="inner">
               <img src="{{ URL::to('/') }}/uploadImage/{{ $product->gambar }}" width= 100% height = auto/>
               
              <h2>{{ $product['Nama_Barang']}}</h2>
              <p>RP <?php echo number_format( $product['Harga_Barang']); ?>,00</p>
          
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
					      <td>
                     <a href="{{ route('cart', $product['id']) }}" class="btn btn-warning " role="button"><span class="fas fa-shopping-cart">Tambah ke Keranjang</span></a> 
                           
                     </td>
                     
                     <td>
                           <a href="{{ route('favorit', $product['id']) }}"
                           class="btn  btn-warning">
                           <span class="fa fa-heart">Sukai</span> </a>
                     </td>

                     
             
            <a href="{{ route('detailProduk', $product['id']) }}" class="small-box-footer">Detail Produk<i class="fa fa-arrow-circle-right"></i></a>
         </div>
        </div>
        <?php } ?>
		  @endforeach
      </div>
      </div>
</section>


    
<!-- /.keranjang -->


      <!-- //about -->
      
      <!--Customers Review -->
     
      <!--//Customers Review -->
      <!-- Product-view -->
      
      <!--//Product-view-->
      <!--//Product-view-->
      
      <!--Product-about-->
      
     
   </body>
@stop