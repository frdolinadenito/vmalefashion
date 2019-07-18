@include('dashboard._header')

<div class="content-wrapper">
    <div class="">
        <div class="">
            <h2>Edit Kategori</h2>

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
            <br/><br/>
            <br/><br/>
             <form classs="" action="{{ route('kategori.update', $kategoris) }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="_method" value="PATCH" />
               
                <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="namaKategori">Nama Kategori</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="Nama_Kategori" value="{{ $kategoris->Nama_Kategori }}" placeholder = "Nama Kategori" required autofocus>
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
