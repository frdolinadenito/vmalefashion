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
               <form class="form-signin" action="{{ route('registrasi')}}" method="post">
               {{ csrf_field() }}

                  <!-- form1 -->
               <form>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="inputNama">Nama Pengguna</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" name="namaPengguna" class="form-control" id="inputNama" placeholder="Nama Pengguna">
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="inputEmail">Email</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email">
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="inputTgl">Tanggal Lahir</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="date" name="tanggalLahir" class="form-control" id="inputTgl" placeholder="">
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="jenisKelamin">Jenis Kelami</label>
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
                        <label for="input">Kata Sandi</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="password" name="password" class="form-control" id="inputKS" placeholder="Kata Sandi">
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="input">Konfirmasi Kata Sandi</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="password" name="password" class="form-control" id="inputKKS" placeholder="Konfirmasi Kata Sandi">
                     </div>
               </div>

                     <button type="submit" class="btn btn-block sent-butnn">Buat Akun</button>
                  </div>
               </form>
            </div>
         </div>
         <!--//contact-map -->
      </section>
      <!--subscribe-address-->
      
   </body>
</html>