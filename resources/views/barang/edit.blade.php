@include('dashboard._header')

<div class="content-wrapper">
    <div class="container">
        <div class="">
            <h2>Ubah Barang</h2>

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
            <br/><br/>
             <form classs="" action="{{ route('barang.update', $barangs) }}" method="post" enctype="multipart/form-data">
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
                        <label for="NamaBarang">Nama Barang</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="Nama_Barang" value="{{ $barangs->Nama_Barang }}" placeholder="Nama Penerima" placeholder = "Nama Barang" required autofocus>
                     </div>
               </div>


                <div class="form-row">
                     <div class="form-group col-md-4">
                         <label for="Kategori">Kategori</label>
                     </div>
                     <div class="form-group col-md-8">
                        <select name="ID_Kategori" id="" class="form-control">
                            
                    @foreach($kategoris as $value)
                        <option value="{{$value->id}}">{{$value->Nama_Kategori}}</option>
                    @endforeach
                        </select>
                     </div>
               </div>
               
               
                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="Deskripsi">Deskripsi</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="Deskripsi"  value="{{ $barangs->Deskripsi }}"placeholder = "Deskripsi" required>
                     </div>
               </div>
               

                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="stok">Stok</label><br>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"  name="Stok" value="{{ $barangs->Stok }}" placeholder = "Stok" required> 
                     </div>
               </div>
                
               <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="Berat">Berat</label><br>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="Berat" value="{{ $barangs->Berat }}" placeholder = "Berat" required> 
                     </div>
               </div>

                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="status">Status</label>
                     </div>
                     <div class="form-group col-md-8">
                        <select name="Status" id="" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            
                        </select>
                     </div>
               </div>
               
                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="harga">Harga</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" onkeypress="return hanyaAngka(event)" maxlength="12" class="form-control" name="Harga_Barang" value="{{ $barangs->Harga_Barang }}" placeholder = "Harga " required>
                     </div>
               </div>
               

                <div class="form-row">
                     <div class="form-group col-md-4">
                         <label for="gambar">Gambar</label>
                     </div>
                     <div class="form-group col-md-8">
                         <input type="file" class="form-control" name="gambar" value="{{ $barangs->gambar }}" placeholder = "Gambar" >
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
