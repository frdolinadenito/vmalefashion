@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Transaksi</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
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
                        <th>Kode Booking</th>
                        <th>Total Keseluruhan</th>
                        <th>Uang Deposit</th>
                        <th>Uang Jaminan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nomor Identitas Pembayaran</th>
                        <th>Total Dibayarkan</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach($transaksis as $value)
                    <tr>
                        <td>{{ $value->get_reservasi->kodeBooking }}</td>
                        <td>Rp{{ $value['totalHarga'] }},00</td>
                        <td>Rp{{ $value->get_reservasi->deposit }},00</td>
                        <td>Rp{{ $value->get_reservasi->jumlahDP }},00</td>
                        <td>{{ $value->get_reservasi->jenisPembayaran }}</td>
                        <td>{{ $value->get_reservasi->nomorKartuKredit }}</td>
                        <td>Rp{{ $value->get_reservasi->totalBayar }},00</td>

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
