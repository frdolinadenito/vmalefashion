@include('dashboard._header')

<div class="content-wrapper">
    <div class="container">
        <div class="">
            <h2>Tambah Kategori</h2>

            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            @endif

            <div class="pull-right">
                <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br><br>
            <br><br>
            <form class="" action="{{ route('kategori.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="namaKategori">Nama Kategori</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="Nama_Kategori"  placeholder = "Nama Kategori" required autofocus>
                     </div>
               </div>
               <br><br>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')
