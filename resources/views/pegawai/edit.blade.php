@include('dashboard._header')

<div class="content-wrapper">
    <div class="container">
        <div class="">
            <h2>Ubah Pegawai</h2>

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
                <a href="{{ route('pegawai.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
             <form classs="" action="{{ route('pegawai.update', $pegawais) }}" method="post" enctype="multipart/form-data">
             <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                        return false;
                    return true;
                    }
                </script>
                {{ csrf_field() }}
               
               <input type="hidden" name="_method" value="post" />

               
               <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Nama Pengguna</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="nama" value="{{$pegawais->nama }}" required autofocus>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Email</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="email" value=" {{ $pegawais->email }}" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Tanggal Lahir</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="date" class="form-control" name="tanggalLahir" value="{{date('d/m/Y', strtotime(Auth::user()->tanggalLahir)) }}" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                        </div>
                        <div class="form-group col-md-8">
                            <select name="jenisKelamin" id="" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="Deskripsi">NIP</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="NIP"  value=" {{ $pegawais->NIP }}" placeholder = "NIP" required>
                     </div>
               </div>
               
               <br><br>
               <div class="form-group pull-right">
                   <input type="submit" name="edit" value="Edit" class="btn btn-success">
               </div>
           </form>
          
       </div>
   </div>
</div>

@include('dashboard._footer')
