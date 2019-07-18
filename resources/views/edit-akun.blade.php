@extends('master.layout')
@section('content')

<body>
    <!--headder-->
    @include('includes.header')

    <div class="inner_page-banner one-img">
    </div>
    <!--//banner -->
    <!-- short -->
    <div class="using-border py-3">
        <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
                <li>
                    <a href="{{route('index')}}">Home</a>
                    <span>/ /</span>
                </li>
                <li>Ubah Profil</li>
            </ul>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="">
                <h2>Ubah Profil</h2>

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

                <br /><br />
                <form classs="" action="{{ route('profil.update',$user) }}" method="post" enctype="multipart/form-data">
                    <script>
                        function hanyaAngka(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))

                                return false;
                            return true;
                        }
                    </script>
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="PATCH" />



                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Nama Pengguna</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="nama" value="{{ Auth::user()->nama }}" required autofocus>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NamaBarang">Email</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="email" value=" {{ Auth::user()->email }}" required>
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


                    <br><br>
                    <div class="form-group pull-right">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>