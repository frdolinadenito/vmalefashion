@include('dashboard._header')

<div class="content-wrapper">
    <br><br>
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-11">
                <h3><strong>Informasi Umum</strong></h3>
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

        

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="NamaBarang">NIP</label>
            </div>
            <div class="form-group col-md-8">
                <input type="text" class="form-control" readonly value="{{ Auth::user()->NIP }}">
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
</div>
</body>

</html>
@include('dashboard._footer')