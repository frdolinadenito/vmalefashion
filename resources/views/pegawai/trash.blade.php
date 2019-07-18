@include('dashboard._header')


<div class="content-wrapper">

    
        <div class="box">
            <h2>Pengelolaan Pegawai</h2>
            
                    <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif

            <a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-primary">Data pegawai</a>
				|
				<a href="{{ route('pegawai.trash') }}">Tong Sampah</a>
 
				<br/>
                <br/>
            <div class="pull-right">
                <a href="{{ route('pegawai.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="{{ route('pegawai.create') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Tambah pegawai</a>
            </div>
            <div style="margin-bottom:20px;">

                <form class="form-inline" action="{{ route('pegawai.index') }}" method="get">
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
                        <th>Nama</th>
                        <th> Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>NIP</th>
                        
                        

                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead>
                <tbody>

                @php $no = 1; @endphp
                    @foreach($pegawai as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $value['nama']}}</td>
                        <td>{{ $value['email']}}</td>
                        <td>{{ date('d F Y ', strtotime($value['tanggalLahir']))}}</td>
                        <td>{{ $value['jenisKelamin']}}</td>
                        <td>{{ $value['NIP']}}</td>
                        
                        
               
                        <td>
								<a href="{{ route('pegawai.kembalikan', $value['id']) }}" class="btn btn-success btn-sm">Restore</a>
								<a href="{{ route('pegawai.hapus_permanen', $value['id']) }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
							</td>


                        <!-- <td>
                            <a href="{{ route('pegawai.edit', $value['id']) }}"
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('pegawai.destroy', $value['id']) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="pull-right">
            
            </div>
        </div>
    
</div>
@include('dashboard._footer')
