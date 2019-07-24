<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<!DOCTYPE html>
<html lang="zxx">

<head>

   <!--checkout-->
   <link rel="stylesheet" type="text/css" href="css/checkout.css">
   <!--//checkout-->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#show').click(function() {
            $('.menu').toggle("slide");
         });
      });
   </script>

</head>
@extends('master.layout')
@section('content')

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
            <li>Checkout</li>
         </ul>
      </div>
   </div>
   <!-- //short-->
   <!--Checkout-->
   <!-- //banner -->
   <!-- top Products -->
   <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
         <div class="shop_inner_inf">
            <div class="privacy about">
               <h3>Chec<span>kout</span></h3>
               <div class="checkout-right">
                  <!-- <h4>Your shopping cart contains: <span>3 Products</span></h4> -->
                  <table class="timetable_sub">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Produk</th>
                           <th>Harga</th>
                           <th>jumlah</th>
                           <th>Berat(Gram)</th>
                           <th>SubHarga</th>

                        </tr>
                     </thead>
                     <tbody>
                        <?php $total = 0 ?>
                        @php $no = 1; @endphp
                        @if(session('Cart'))
                        @foreach(session('Cart') as $id => $details)

                        <?php $total += $details['Harga_Barang'] * $details['quantity'] ?>
                        <tr class="rem1">
                           <td>{{ $no++ }}</td>
                           <td data-th="Product">
                              <div class="row">
                                 <div class="col-sm-3 hidden-xs"><img src="uploadImage/<?php echo $details['gambar'] ?>" width="100" height="100" class="img-responsive" /></div>
                                 <div class="col-sm-9">
                                    <h4 class="nomargin"> <?php echo $details['Nama_Barang']  ?> </h4>
                                 </div>
                              </div>
                           </td>

                           <td data-th="Price">Rp <?php echo number_format($details['Harga_Barang']); ?>,00</td>
                           <td data-th="Quantity"><?php echo $details['quantity'] ?></td>
                           <td data-th="Weight"><?php echo $details['Berat'] ?></td>
                           <td data-th="Subtotal" class="text-center">Rp <?php echo number_format($details['Harga_Barang'] * $details['quantity']); ?>,00</td>

                        </tr>

                        @endforeach
                        @endif

                     </tbody>
                  </table>

                  <table class="timetable_sub">
                     <tfoot>
                        <tr>

                           <td colspan="2" class="hidden-xs">Total Belanja : Rp <?php echo number_format($total); ?>,00
                        </tr>
                     </tfoot>
                  </table>

               </div>
               
          
  
               <div class="checkout-left">
                  <div class="col-md-2 address_form"></div>
                  <div class="col-md-8 address_form">

                  <!-- <div id="show"><strong>Tambah Alamat Baru (Klik Disini)</strong></div>
                        <div class="menu" style="display: none;"> -->
                          
                     <h4> Detail Pelanggan</h4>
                  
                     <form method="post" class="creditly-card-form agileinfo_form">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <?php if ($alamat !== null) { ?>
										
                           
                        
                        @foreach($alamat as $user)
                       
                        <section class="creditly-wrapper wrapper"> 
                           <div class="information-wrapper">
                              <div class="first-row form-group">
                                 <div class="controls">
                                    <label class="control-label">Nama Pembeli: </label>
                                    <input class="billing-address-name form-control" type="text" name="Nama_Penerima" value="{{ $user->Nama_Penerima }}" placeholder="Nama Penerima" required autofocus >
                                 </div>
                                 <div class="card_number_grids">
                                    <div class="card_number_grid_left">
                                       <div class="controls">
                                          <label class="control-label">Nomor Telepon:</label>
                                          <input class="form-control" type="text" name="No_Telepon" value="{{ $user->No_Telepon }}" placeholder="Nomor Telepon" required>
                                       </div>
                                    </div>
                                    <div class="card_number_grids">
                                       <div class="card_number_grid_left">
                                          <div class="controls">
                                             <label class="control-label">Kecamatan:</label>
                                             <input class="form-control" type="text" name="Kecamatan" value="{{ $user->Kecamatan }}" placeholder="Kecamatan" required>
                                          </div>
                                       </div>
                                       <div class="card_number_grid_right">
                                          <div class="controls">
                                             <label class="control-label">Kode Pos: </label>
                                             <input class="form-control" type="text" name="Kode_Pos" value="{{ $user->Kode_Pos }}" placeholder="Kode Pos" required >
                                          </div>
                                       </div>
                                       <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                       <label class="control-label">Alamat Lengkap: </label>
                                       <input class="form-control" type="text" name="Alamat_Lengkap"  value="{{ $user->Alamat_Lengkap }}" placeholder = "Alamat Lengkap" required>
                                       <!-- <textarea class="form-control" rows="3" name="Alamat_Lengkap" value="{{ $user->Alamat_Lengkap }}" placeholder="Alamat Lengkap" required></textarea> -->
                                    </div>
                                   
                        </section>
                        @endforeach
                        <?php } ?>
                        <?php if($alamats->isEmpty()) { ?>
                             
                        <section class="creditly-wrapper wrapper"> 
                           <div class="information-wrapper">
                              <div class="first-row form-group">
                                 <div class="controls">
                                    <label class="control-label">Nama Pembeli: </label>
                                    <input class="billing-address-name form-control" type="text" name="Nama_Penerima"  placeholder="Nama Penerima" required autofocus >
                                 </div>
                                 <div class="card_number_grids">
                                    <div class="card_number_grid_left">
                                       <div class="controls">
                                          <label class="control-label">Nomor Telepon:</label>
                                          <input class="form-control" type="text" name="No_Telepon" placeholder="Nomor Telepon" required>
                                       </div>
                                    </div>
                                    <div class="card_number_grids">
                                       <div class="card_number_grid_left">
                                          <div class="controls">
                                             <label class="control-label">Kecamatan:</label>
                                             <input class="form-control" type="text" name="Kecamatan"  placeholder="Kecamatan" required>
                                          </div>
                                       </div>
                                       <div class="card_number_grid_right">
                                          <div class="controls">
                                             <label class="control-label">Kode Pos: </label>
                                             <input class="form-control" type="text" name="Kode_Pos" placeholder="Kode Pos" required >
                                          </div>
                                       </div>
                                       <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                       <label class="control-label">Alamat Lengkap: </label>
                                       <input class="form-control" type="text" name="Alamat_Lengkap"   placeholder = "Alamat Lengkap" required>
                                    </div>
                                   
                        </section>
                        <?php } ?>
                       
                        <!-- </div> -->



                        <!-- Main content -->
                        <section class="content">
                           <div class="row">
                              <!-- right column -->
                              <div class="col-md-12">

                                 <!-- general form elements disabled -->
                                 <div class="box box-warning">
                                    <div class="box-body">
                                       <form method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                          <!-- text input -->


                                          <div class="form-group">
                                             <label>Tujuan(Kota/Kabupaten)</label>
                                             <select id="destination" class="form-control" name="destination" required>>
                                                <option selected="selected" value="">Pilih Tujuan</option>
                                                @foreach($city as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                             </select>
                                          </div>


                                          <div class="form-group">
                                             <label>Jasa</label>
                                             <select id="jasa" class="form-control" name="jasa" required>>
                                                <option selected="selected" value="">Pilih Jasa</option>

                                                <option value="jne">JNE</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="pos">POS</option>

                                             </select>
                                          </div>

                                          <div class="box-footer">
                                             <button type="submit" name="cek"  class="btn btn-primary">Kirim</button>
                                          </div>

                                       </form>


                                    </div>

                                    <!-- /.box-body -->
                                 </div>
                                 <!-- /.box -->
                              </div>
                              <!--/.col (right) -->
                           </div>
                           <!-- /.row -->
                        </section>

 


                  </div>

               </div>
   </section>
   
   </form>

   </div>
   <div class="col-md-2 address_form"></div>
   <div class="clearfix"> </div>
   <div class="clearfix"></div>
   </div>
   </div>
   </div>
   <!-- //top products -->
   </div>
   </section>


</body>

</html>