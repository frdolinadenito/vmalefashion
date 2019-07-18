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
               <li>Pembayaran</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--About -->

      @foreach($IDTransaksi as $value) @endforeach  
      <form class="" action="{{ route('pembayaran.store',$value['id']) }}" method="post" enctype="multipart/form-data">
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                        return false;
                    return true;
                    }
                </script>
                {{ csrf_field() }}
                {{ method_field('post') }}
                @foreach($detail as $detail) @endforeach   
                    <div class="container">
                    <h2>Konfirmasi Pembayaran</h2>
                    <p>Kirim Bukti Pembayaran Anda disini</p>
                    <div class="alert alert-info">Total Tagihan Anda <strong>Rp  {{ $detail->Total_Harga }}   </strong>			
                    </div>
                

                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="Nama">Nama Penyetor</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="Nama"  placeholder = "Nama Penyetor" required autofocus>
                     </div>
                </div>               
               
                 <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="Bank">Bank</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="Bank"  placeholder = "Bank" required>
                     </div>
                 </div>
               

                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="stok">Jumlah</label><br>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"  name="Jumlah" placeholder = "Jumlah" required> 
                     </div>
               </div>
               
                <div class="form-row">
                     <div class="form-group col-md-4">
                         <label for="gambar">Bukti</label>
                     </div>
                     <div class="form-group col-md-8">
                         <input type="file" class="form-control" name="Bukti_Pembayaran" placeholder = "Bukti Pembayaran" required>
                     </div>
               </div>
                
               <br><br>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
        </div>
            </form>
      
      <!--//about -->
      <!--Customers Review -->
      <!--//Customers Review -->
      <!--subscribe-address-->
     
   </body>
</html>