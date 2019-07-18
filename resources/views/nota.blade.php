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
      <!-- Konten -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('index')}}">Home</a>
                  <span>/ /</span>
               </li>
               <li>Nota</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
	  <!--About -->
	  <div class="row">
	  <div class="col-md-4">
        <a href="{{ url()->previous() }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke riwayat</a>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4 text-right">

      <a href="{{ route('nota.pdf', $transaksi['id']) }}" class="btn btn-primary btn-L">
        <i class="glyphicon glyphicon-save"></i> Unduh</a>
    </div>
              
  </div>
</div>
      <section class="konten">
	  <div class="container">
	  <div class="row">
	  @foreach($pengguna as $user)
	  			<div class="col-md-4">
				
	  
				<h3>Pembelian</h3>
				<strong>No. Tagihan: {{ $user->Nomor_Tagihan }}</strong><br>
				Tanggal: {{ date('d-m-Y H:i:s', strtotime($user->Tanggal_Pembelian)) }}<br>
				Total: Rp <?php echo number_format($user->Total_Harga); ?>,00
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong>{{ $user->Nama_Penerima }}</strong><br>
				<p>
				{{ $user->No_Telepon}}<br>
				
				</p>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				 <strong>{{ $transaksi->get_city->name}}</strong><br>
				@foreach($ongkir as $ongkirs)@endforeach Detail Kurir: {{ $user->Jasa_Pengiriman }} - Rp <?php echo number_format($ongkirs->Tarif); ?>,00<br>
				alamat: {{ $user->Alamat_Lengkap }}-{{ $transaksi->get_city->name}}-{{ $user->Kecamatan }}, ID {{ $user->Kode_Pos  }}
				
			</div>
			@endforeach
	</div>
           

			<table class = "table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga Satuan</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor = 1;
					?>
					<?php 
					//$ambil = $koneksi->query("SELECT * FROM Detil_Transaksi JOIN Transaksi ON Detil_Transaksi.ID_Transaksi = Transaksi.ID_Transaksi WHERE Detil_Transaksi.ID_Transaksi = '$_GET[id]'");?> 
					
						
					@foreach($detail as $pecah)
						<tr>
							<td><?php echo $nomor; ?></td>
							<td>{{ $pecah->Nama }}</td>
							<td>Rp <?php echo number_format($pecah->Harga_Satuan); ?>,00</td>
							<td>{{ $pecah->Jumlah_Belanja }}</td>
							<td>Rp <?php echo number_format($pecah->Harga_Satuan * $pecah->Jumlah_Belanja); ?>,00</td>
						</tr>
						<?php $nomor++; ?>
						@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Ongkir</th>
						<td>Rp <?php echo number_format($pecah->Tarif); ?>,00</td>
					</tr>
					<tr>
						<th colspan="4">Total Harga</th>
						<td>Rp <?php echo number_format($pecah->Total_Harga); ?>,00</td>
					</tr>
				</tfoot>
				
			</table>

			@if($pecah->Status_Pemesanan === "pending")  
				<div class="row">
					<div class="col-md-8">
						<div class="alert alert-info">
							<p>Silahkan Melakukan Pembayaran  Rp <?php echo number_format($pecah->Total_Harga); ?>,00  sampai 24 jam dari tagihan ke <br>
								<strong> BANK MANDIRI : 3456789 AN. Vmale</strong>
							</p>
						</div>
					</div>
				</div>
			 @endif
			
		</div>
	</section>
	<!-- Konten -->

      <!--//about -->
      <!--Customers Review -->
     
      <!--//Customers Review -->
      <!--subscribe-address-->
     
   </body>
</html>