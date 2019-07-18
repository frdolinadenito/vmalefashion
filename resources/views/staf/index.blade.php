@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan staf</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('staf.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                
            </div>
            <div style="margin-bottom:20px;">

                <form class="form-inline" action="{{ route('staf.index') }}" method="get">
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
                        <th>Nama Lengkap</th>
                        <th>Nomor identitas</th>
                        <th>Nomor Telepon</th>
                        <th>email</th>
                        <th>alamat</th>
                        <th>username</th>


                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($stafs as $value)
                    <tr>
                        <td>{{ $value['namaLengkap']}}</td>
                        <td>{{ $value['nomorIdentitas']}}</td>
                        <td>{{ $value['nomorTelepon']}}</td>
                        <td>{{ $value['email']}}</td>
                        <td>{{ $value['alamat']}}</td>
                        <td>{{ $value['username']}}</td>



                        <td>
                            <a href="{{ route('staf.edit', $value['id']) }}"
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="pull-right">
            {{ $stafs->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')
