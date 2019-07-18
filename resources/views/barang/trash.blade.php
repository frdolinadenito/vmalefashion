@include('dashboard._header')


<div class="content-wrapper">

    
        <div class="box">
            <h2>Pengelolaan Barang</h2>
            
                    <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif

            <a href="{{ route('barang.index') }}" class="btn btn-sm btn-primary">Data Barang</a>
				|
				<a href="{{ route('barang.trash') }}">Tong Sampah</a>
 
				<br/>
                <br/>
                
            <div class="pull-right">
                <a href="{{ route('barang.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
              
            </div>
            <div style="margin-bottom:20px;">

                <form class="form-inline" action="{{ route('barang.index') }}" method="get">
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
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th>Harga </th>
                        

                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead>
                <tbody>

                @php $no = 1; @endphp
                    @foreach($barang as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ URL::to('/') }}/uploadImage/{{ $value->gambar }}" width="150px" height="150px"/></td>
                        <td>{{ $value['Nama_Barang']}}</td>
                        <td>{{ $value->get_k->Nama_Kategori}}</td>
                        <td>{{ $value['Deskripsi']}}</td>
                        <td>{{ $value['Stok']}}</td>
                        <td>{{ $value['Berat']}}</td>
                        <td>{{ $value['Status']}}</td>
                        <td>Rp{{ $value['Harga_Barang']}},00</td>
                        
               

                        <td>
								<a href="{{ route('barang.kembalikan', $value['id']) }}" class="btn btn-success btn-sm">Restore</a>
								<a href="{{ route('barang.hapus_permanen', $value['id']) }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
							</td>
<!-- 
                        <td>
                            <a href="{{ route('barang.edit', $value['id']) }}"
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('barang.destroy', $value['id']) }}" method="post">
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
