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
            <li>Detail Produk</li>
         </ul>
      </div>
   </div>
   <!-- //short-->
   <!--//banner -->
   <!--/shop-->
   <section class="banner-bottom py-lg-5 py-3">
      <div class="container">
         <div class="inner-sec-shop pt-lg-4 pt-3">
            <div class="row">
             

               @if($message = Session::get('success'))
               <div class="alert alert-success">
                  <p>{{$message}}</p>
               </div>
               @endif

               <div class="col-lg-4 single-right-left ">
                  <div class="grid images_3_of_2">
                     <div class="flexslider1">
                        <ul class="slides">
                           <img src="{{ URL::to('/') }}/uploadImage/{{ $barangs->gambar }}" width=100% height=auto />

                        </ul>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 single-right-left simpleCart_shelfItem">


                  <h2>{{ $barangs['Nama_Barang']}}</h2>
                  <h5>Harga Produk : Rp <span class="item_price">Rp{{ $barangs['Harga_Barang']}},00</span>
                     <del></del></h5>
                  <h5>Jumlah Stok : {{ $barangs['Stok']}}</h5>
                  <h5>Deskripsi : {{ $barangs['Deskripsi']}}</h5>



                  <form method="post">
                     <div class="form-group">
                        <div class="input-group">

                           <div class="input-group-btn">

                              <a href="{{ route('cart', $barangs['id']) }}" class="btn btn-warning " role="button"><span class="fas fa-shopping-cart">Tambah ke Keranjang</span></a>
                           </div>
                        </div>
                     </div>
                  </form>



               </div>
               <div class="clearfix"> </div>

             
            </div>
         </div>
      </div>
   </section>

   <!-- <br>
   <h5>rekomendasi : {{ $tasks}} </h2>

      <br>
      <h5>tes : {{ $barangs}} </h2><br> -->



         <!--subscribe-address-->
         <div class="container">



            <div class="card text-center">
               <div class="card-header">
                  Rekomendasi
               </div>
               <div class="card-body">
                  <div class="row">


                     <?php if ($tasks->first()) { ?>

                        @foreach($tampil2 as $product)


                        <div class="col-md-4">
                           <!-- small box -->
                           <div class="small-box bg-green">

                              <img src="{{ URL::to('/') }}/uploadImage/{{ $product->gambar }}" width=100% height=auto />

                              <h2>{{ $product['Nama_Barang']}}</h2>
                              <p>RP <?php echo number_format($product['Harga_Barang']); ?>,00</p>
                              <td>
                                 <a href="{{ route('cart', $product['id']) }}" class="btn btn-warning " role="button"><span class="fas fa-shopping-cart">Tambah ke Keranjang</span></a>

                              </td>

                              <td>
                                 <a href="{{ route('favorit', $product['id']) }}" class="btn  btn-warning">
                                    <span class="fa fa-heart">Sukai</span> </a>
                              </td>

                              <a href="{{ route('detailProduk', $product['id']) }}" class="small-box-footer">Detail Produk<i class="fa fa-arrow-circle-right"></i></a>

                           </div>
                        </div>


                        @endforeach
                     <?php } ?>



                  </div>
                  <?php if ($tasks->isEmpty()) { ?>

                     <h2 class="card-title"><strong>Data Rekomendasi belum ada</strong></h2>
                  <?php } ?>

               </div>
               <div class="card-footer text-muted">

               </div>
            </div>


         </div>
         <br>
</body>

</html>