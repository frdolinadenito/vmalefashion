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
               <li>Daftar </li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Buat Akun</h3>
            <div class="contact-list-grid">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-row">
                     <div class="form-group col-md-4">
                            <label for="name" >{{ __('Nama Pelanggan') }}</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                     <div class="form-group col-md-4">
                            <label for="email" >{{ __('Email ') }}</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

               

                        <div class="form-row">
                     <div class="form-group col-md-4">
                            <label for="password" >{{ __('Kata Sandi') }}</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <div class="form-row">
                     <div class="form-group col-md-4">
                            <label for="password-confirm" >{{ __('Konfirmasi Kata Sandi') }}</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="inputTgl">Tanggal Lahir</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="date" name="tanggalLahir" class="form-control" id="inputTgl" placeholder="" required>
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                     </div>
                     <div class="form-group col-md-8">
                        <select name="jenisKelamin" id="" class="form-control" required>
                        <option selected="" disabled ="" value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                     </div>
                        
                    
                </div>

              

                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block sent-butnn">
                                    {{ __('Buat Akun') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
