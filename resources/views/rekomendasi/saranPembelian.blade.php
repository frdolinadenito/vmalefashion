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
                <a href="{{ route('tampilApriori') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i>Refresh</a>
            </div>
            <div style="margin-bottom:20px;">

               
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hasil</th>
                        <th>Tanggal Proses</th>
                     
                        
                       
                        
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @if(!empty($response))
               @foreach($response as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Jika membeli<strong>{{$value}}</strong></td>
                        <td>{{ date('d-m-Y  H:i:s')}}</td>
                        
                       
               
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
