<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
@extends('master.layout')
@section('content')

<head>
   <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <style>
      body {
         font-family: Arial, Helvetica, sans-serif;
      }

      * {
         box-sizing: border-box;
      }

      /* Create a column layout with Flexbox */
      .row {
         display: flex;
      }

      /* Left column (menu) */
      .left {
         flex: 15%;
         padding: 15px 0;
      }

      .left h2 {
         padding-left: 8px;
      }

      /* Right column (page content) */
      .right {
         flex: 85%;
         padding: 15px;
      }

      /* Style the search box */
      #mySearch {
         width: 100%;
         font-size: 18px;
         padding: 11px;
         border: 1px solid #ddd;
      }

      /* Style the navigation menu inside the left column */
      #myMenu {
         list-style-type: none;
         padding: 0;
         margin: 0;
      }

      #myMenu li a {
         padding: 12px;
         text-decoration: none;
         color: black;
         display: block
      }

      #myMenu li a:hover {
         background-color: #eee;
      }
   </style>

</head>

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
               <a href="{{route('index')}}">Beranda</a>
               <span>/ /</span>
            </li>
            <li>Produk</li>
         </ul>
      </div>
      <div class="clearfix"></div>
   </div>


   <section class="content">
      <!-- <div class="container"> -->

      <h1>Produk Terbaru</h1>
      <div class="row">
         <div class="left" style="background-color:#c8ffc3;">
            <h2>Menu</h2>
            <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">

            <ul id="myMenu">
            <li><a href="{{route('produk')}}">Semua Produk</a></li>
               <li><a href="{{route('produk-kaos')}}">Kaos</a></li>
               <li><a href="{{route('produk-sepatu')}}">Sepatu</a></li>
               <li><a href="{{route('produk-tas')}}">Tas</a></li>
               <li><a href="{{route('produk-sweater')}}">sweater</a></li>
               <li><a href="{{route('produk-jaket')}}">Jaket</a></li>
            </ul>
         </div>
         <!-- //short-->
         <div class="right" style="background-color:#f0f0f0;">
            <h2>Page Content</h2>
            <div class="row">
               @foreach($products as $product)
               <?php if ($product["ID_Kategori"] == 4) { ?>
                <?php if ($product["Stok"] != 0) { ?>
                  <div class="col-md-4">
                     <!-- small box -->
                     <div class="small-box bg-green">

                        <img src="{{ URL::to('/') }}/uploadImage/{{ $product->gambar }}" width=100% height=60% />

                        <h1>{{ $product['Nama_Barang']}}</h1>
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
                <?php } ?>
               <?php } ?>
               @endforeach
            </div>
         </div>

         <!-- Small boxes (Stat box) -->



      </div>

      <!-- </div> -->
   </section>


   <!--//about -->
   <!--Customers Review -->

   <!--//Customers Review -->
   <!--subscribe-address-->

   <script>
      function myFunction() {
         // Declare variables
         var input, filter, ul, li, a, i;
         input = document.getElementById("mySearch");
         filter = input.value.toUpperCase();
         ul = document.getElementById("myMenu");
         li = ul.getElementsByTagName("li");

         // Loop through all list items, and hide those who don't match the search query
         for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
               li[i].style.display = "";
            } else {
               li[i].style.display = "none";
            }
         }
      }
   </script>

</body>