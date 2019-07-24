@include('dashboard._header')

<div class="content-wrapper">
    <div class="">
        <div class="box">
            <h2>Detail Pembayaran</h2>
            
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
           
			<div class="pull-right">
                <a href="{{ route('transaksi.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <div class="row">
	<div class="col-md-6">
    @foreach($detail as $pecah) @endforeach
		<table class="table">
			<tr>
				<th>Nama Pembayar</th>
				<td><?php echo $pecah->Nama ?></td>
			</tr>
			<tr>
				<th>Total Pembayaran</th>
				<td>Rp <?php echo number_format($pecah->Jumlah); ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $pecah->Bank; ?></td>
			</tr>
			<tr>
				<th>Tanggal Pembayaran</th>
				<td><?php echo $pecah->Tanggal_Pembayaran; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		'<img width="100%" class="img-responsive" src="{{ URL::to('/') }}/BuktiPembayaran/'.{{ $pecah->Bukti_Pembayaran}}.'" alt="">
	</div>
</div>

<form method="post" action="{{ route('konfirmasi.store', $pecah->ID_Transaksi) }}">
{{ csrf_field() }}
{{ method_field('post') }}

	<div class="form-group">
		<label>Nomor Resi Pengiriman</label>
		<input type="text" class="form-control" name="Resi_Pengiriman">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="Status_Pemesanan">
			<option value="">Pilih Status</option>
			<option value="Proses Pengiriman">Proses Pengiriman</option>
		</select>
	</div>

	<button class="btn btn-priamry" name="process">Kirim</button>
</form>
           
            
        </div>
    </div>
</div>


@include('dashboard._footer')
