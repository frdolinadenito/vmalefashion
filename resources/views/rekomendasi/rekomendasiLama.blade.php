@include('dashboard._header')

<div class="content-wrapper">
    <div class="">
        <div class="box">
            <h2>Pengelolaan Rekomendasi</h2>
            
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('rekomendasi.destroy') }}" class="btn btn-danger btn-s"><i class="glyphicon glyphicon-trash"></i>Hapus data rekomendasi lama</a>
                <a href="{{ route('getRekomendasi') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Perbaharui rekomendasi</a>
            </div><br>
            <div style="margin-bottom:20px;">

               
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sumber</th>
                        <th>Hasil</th>
                        <th>Tanggal Proses</th>
                     
                        
                       
                        
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @if(!empty($rekomendasi))
               @foreach($rekomendasi as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$value['sumber']}}</td>
                        <td>{{$value['hasil']}}</td>
                        <td>{{$value['created_at']}}</td>
                        
                       
               
                    </tr>
                    @endforeach
                    @elseif(empty($response))
                    <tr>
                        <td colspan="4" class="text-centre">Data Apriori belum diproses</td>
                    </tr>
                    @endif
                </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>


@include('dashboard._footer')
