@include('dashboard._header')



<div class="content-wrapper">
    <div class="container">
        <div class="">
            <h2>Tambah Barang</h2>

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
                <a href="{{ route('barang.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br><br>
            <form class="" action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="NamaBarang">Nama Barang</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="Nama_Barang"  placeholder = "Nama Barang" required autofocus>
                     </div>
               </div>


                <div class="form-row">
                     <div class="form-group col-md-2">
                         <label for="Kategori">Kategori</label>
                     </div>
                     <div class="form-group col-md-10">
                        <select name="ID_Kategori" id="" class="form-control" required>
                        <option selected="" disabled ="" value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->Nama_Kategori }}</option>
                        @endforeach  
                        </select>
                     </div>
               </div>
               
               
                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="Deskripsi">Deskripsi</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="Deskripsi"  placeholder = "Deskripsi" required>
                     </div>
               </div>
               

                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="stok">Stok</label><br>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"  name="Stok" placeholder = "Stok" required> 
                     </div>
               </div>

               <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="Berat">Berat(Gram)</label><br>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="Berat" placeholder = "Berat" required> 
                     </div>
               </div>
                

                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="status">Status</label>
                     </div>
                     <div class="form-group col-md-10">
                        <select name="Status" id="" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            
                        </select>
                     </div>
               </div>
               
                <div class="form-row">
                     <div class="form-group col-md-2">
                        <label for="harga">Harga</label>
                     </div>
                     <div class="form-group col-md-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" maxlength="12" class="form-control" name="Harga_Barang"  placeholder = "Harga " required>
                     </div>
               </div>
               

                <div class="form-row">
                     <div class="form-group col-md-2">
                         <label for="gambar">Gambar</label>
                     </div>
                     <div class="form-group col-md-10">
                         <input type="file" class="form-control" name="gambar" placeholder = "Gambar" required>
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