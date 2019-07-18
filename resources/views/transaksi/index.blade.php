@include('dashboard._header')

<div class="content-wrapper">
    <div class="">
        <div class="box">
            <h2>Pengelolaan Transaksi</h2>
            
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('transaksi.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i>Refresh</a>
            </div>
            <div style="margin-bottom:20px;">

                <form class="form-inline" action="{{ route('transaksi.index') }}" method="get">
                 <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Pencarian">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                 </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor Tagihan</th>
                        <th>Nama Akun</th>
                        <th>Tagihan</th>
                        <th>Batas Pembayaran</th>
                        <th>Status</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                <?php
                $stop_date = (request('Tanggal_Pembelian'));
                //echo 'date before day adding: ' . $stop_date; 
                $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +24 hours'));
               //echo 'date after adding 1 day: ' . $stop_date;
                ?>
               
               @foreach($transaksis as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ date('d-m-Y  H:i:s', strtotime($value["Tanggal_Pembelian"])) }}</td>
                        <td>{{ $value->Nomor_Tagihan }}</td>
                        <td>{{$value->pengguna->nama}}</td>
                        <td>Rp <?php echo number_format($value->Total_Harga); ?>,00</td>
                        <td>{{ date('d-m-Y  H:i:s', strtotime($value->Tanggal_Pembelian. ' +24 hours')) }}</td>
                        <td>{{ $value->Status_Pemesanan }}</td>
                        
                        <td>
                        <a href="{{ route('detailPembelian', $value->id) }}"  class="btn btn-info">Detail</a>
                            <?php if($value->Status_Pemesanan == "Bukti Telah Terupdate") { ?>
                                <a href="{{ route('detailPembayaran', $value->id) }}" class="btn btn-success">Lihat Pembayaran</a>
                            <?php } ?>
                            <?php if($value->Status_Pemesanan =="Proses Pengiriman") { ?>
                                <a href="" class="btn btn-success" disabled>Proses Pengiriman</a>
                            <?php } ?>
                        </td>
               
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="pull-right">
            {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</div>


@include('dashboard._footer')
