<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
@extends('master.layout')
@section('content')

<body>
    <!--headder-->
    @include('includes.header')
    <!--//headder-->
    <!-- banner -->
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
                <li>Profil</li>
            </ul>
        </div>
    </div>
    <!-- //short-->
    <!--About -->

    

    <br><br>
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-11">
                <h3><strong>Informasi Umum</strong></h3>
            </div>
            <div class="form-group col-md-1">
                <a href="{{ route('profil.edit', $users) }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Ubah</a>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="NamaBarang">Nama Pengguna</label>
            </div>
            <div class="form-group col-md-8">
                <input type="text" class="form-control" readonly value="{{ Auth::user()->nama }}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="NamaBarang">Email</label>
            </div>
            <div class="form-group col-md-8">
                <input type="text" class="form-control" readonly value="{{ Auth::user()->email }}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="NamaBarang">Tanggal Lahir</label>
            </div>
            <div class="form-group col-md-8">
                <input type="text" class="form-control" readonly value="{{date('d F Y ', strtotime(Auth::user()->tanggalLahir)) }} ">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="NamaBarang">Jenis Kelamin</label>
            </div>
            <div class="form-group col-md-8">
                <input type="text" class="form-control" readonly value="{{ Auth::user()->jenisKelamin }}">
            </div>
        </div>




    </div>

    <br>
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-11">
                <h3><strong>Kata Sandi</strong> </h3>
            </div>
            <div class="form-group col-md-1">
                <a href="{{route('changePassword')}}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Ubah</a>
            </div>

        </div>
       

    </div>
<br><br>

</body>

</html>