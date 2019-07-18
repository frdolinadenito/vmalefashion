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
				<li>riwayat</li>
			</ul>
		</div>
	</div>
	<!-- //short-->
	<!--About -->
	<section class="riwayat">
		<div class="container">
			<h3>Riwayat Belanja {{ Auth::user()->nama }}</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Batas Pembayaran</th>
						<th>Status</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 1; @endphp
					@foreach($IDTransaksi as $transaksi)


					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ date('d-m-Y  H:i:s', strtotime($transaksi["Tanggal_Pembelian"])) }}</td>
						<td>{{ date('d-m-Y  H:i:s', strtotime($transaksi->Tanggal_Pembelian. ' +24 hours')) }}</td>
						<td>
							<?php echo $transaksi["Status_Pemesanan"]; ?><br>
							<?php if ($transaksi["Status_Pemesanan"] == "Proses Pengiriman") { ?>
								Resi : <?php echo $transaksi["Resi_Pengiriman"]; ?>
							<?php } ?>
						</td>
						<td>Rp <?php echo number_format($transaksi["Total_Harga"]); ?>,00</td>
						<td>
							<a href="{{ route('nota', $transaksi['id']) }}" class="btn btn-info">Nota</a>
							<?php if ($transaksi["Status_Pemesanan"] == "pending") { ?>
								<a href="{{ route('pembayaran', $transaksi['id']) }}" class="btn btn-success">Pembayaran</a>
							<?php } ?>
							<?php if ($transaksi["Status_Pemesanan"] == "Proses Pengiriman") { ?>
								<!-- <a href="{{ route('riwayat.store', $transaksi['id']) }}"class="btn btn-success">Selesai</a> -->
								<a href="{{ route('lacak', $transaksi['id']) }}" class="btn btn-success">Lacak</a>
								<a>
									<form class="" action="{{ route('riwayat.store', $transaksi['id']) }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="Status_Pemesanan" value="Selesai" />
										<button type="submit" onclick="return confirm('Apakah barang yang kami kirimkan sudah sampai ?')" class="btn btn-success">
											<i class="glyphicon glyphicon-trash"></i> Selesai
								</a>
								</form></a>


							<?php } ?>
							<?php if ($transaksi["Status_Pemesanan"] == "pending") { ?>
								
								<a>
									<form class="" action="{{ route('riwayat.store', $transaksi['id']) }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="Status_Pemesanan" value="Batal" />
										<button type="submit" onclick="return confirm('Apakah anda yakin ingin membatalkan pemesanan ini ?')" 
										class="btn btn-danger"> Batal</a>
								</form>
							<?php } ?>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</section>



</body>

</html>