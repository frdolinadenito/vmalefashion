@include('dashboard._header')



<div class="content-wrapper">
    <div class="container">
        <div class="">
            <h2>Tambah Pegawai</h2>

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
            <br><br>
            <form class="" action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                        return false;
                    return true;
                    }
                </script>
                {{ csrf_field() }}
                {{ method_field('post') }}
               

                
                <div class="form-row">
                     <div class="form-group col-md-2">
                            <label for="name" >{{ __('Nama Pegawai') }}</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

               <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="Deskripsi">NIP</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="NIP"  placeholder = "NIP" required>
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-2">
                            <label for="email" >{{ __('Email ') }}</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

               

                        <div class="form-row">
                     <div class="form-group col-md-2">
                            <label for="password" >{{ __('Kata Sandi') }}</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="inputTgl">Tanggal Lahir</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="date" name="tanggalLahir" class="form-control" id="inputTgl" placeholder=""required>
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                     </div>
                     <div class="form-group col-md-10">
                        <select name="jenisKelamin" id="" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
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