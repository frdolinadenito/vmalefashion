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
               <li>Keranjang</li>
            </ul>
         </div>
      </div>
     
}
      <!-- //short-->
      <!--About -->
    
      <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Chec<span>kout</span></h3>
                     <div class="table-responsive">
                        <!-- <h4>Your shopping cart contains: <span>3 Products</span></h4> -->
                        <table class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Produk</th>
                                 <th>Nama Produk</th>
                                 <th>Harga</th>
                                 <th>jumlah</th>
                                 <th>SubHarga</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                           @php $no = 1; @endphp
                           @foreach (session['keranjang'] as $IDBarang => $jumlah)


                              <tr class="rem1">
                              <td>{{ $no++ }}</td>
                              <td><img src="uploadImage/{{ $value['gambar'] }}" width="150px" height="150px"/></td>
                              <td>{{ $value['Nama_Barang']}}</td>
                              <td>Rp{{ $value['Harga_Barang']}},00</td>
                                 <td class="invert">
                                    <div class="quantity">
                                       <div class="quantity-select">
                                          <div class="entry value-minus">&nbsp;</div>
                                          <div class="entry value"><span><td>{{ $value['Harga_Barang']}}</td></span></div>
                                          <div class="entry value-plus active">&nbsp;</div>
                                       </div>
                                    </div>
                                 </td>
                                 
                                 <td>
                                    <form class="" action="#" method="post">
                                       {{ csrf_field() }}
                                       <input type="hidden" name="_method" value="DELETE" />
                                       <button type="submit" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger btn-xs">
                                       <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                    </form>
                                 </td>
                                 
                              </tr>
                              
                           </tbody>
                        </table>
                        @endforeach
                     </div>
                     
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>

      

      <!--//about -->
      <!--Customers Review -->
      @include('includes.customerReview')
      <!--//Customers Review -->
      <!--subscribe-address-->
     
   </body>
</html>