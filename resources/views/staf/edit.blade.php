@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Edit Staf</h2>

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
                <a href="{{ route('staf.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
             <form classs="" action="{{ route('staf.update', $stafs) }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="_method" value="PATCH" />

               <div class="form-group">
                   <label for="namaLengkap">Nama Lengkap</label>
                   <input type="text" class="form-control" name="namaLengkap" value="{{ $stafs->namaLengkap }}" placeholder = "Nama Lengkap" required autofocus>
               </div>




               <div class="form-group">
                   <label for="nomorIdentitas">Nomor Identitas</label>
                   <input type="text" class="form-control" name="nomorIdentitas" value="{{ $stafs->nomorIdentitas }}" placeholder = "Nomor Identitas" required >
               </div>

               <div class="form-group">
                   <label for="nomorTelepon">Nomor Telepon</label>
                   <input type="text" class="form-control" name="nomorTelepon" value="{{ $stafs->nomorTelepon }}" placeholder = "Nomor Telepon" required >
               </div>

               <div class="form-group">
                   <label for="email">Email</label>
                   <input type="text" class="form-control" name="email" value="{{ $stafs->email }}" placeholder = "Email" required >
               </div>

               <div class="form-group">
                   <label for="alamat">Alamat</label>
                   <input type="text" class="form-control" name="alamat" value="{{ $stafs->alamat }}" placeholder = "alamat" required >
               </div>

               <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" class="form-control" name="username" value="{{ $stafs->username }}" placeholder = "username" required >
               </div>

               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" class="form-control" name="password" value="{{ $stafs->password }}" placeholder = "Password" required >
               </div>



               <div class="form-group pull-right">
                   <input type="submit" name="edit" value="Edit" class="btn btn-success">
               </div>
           </form>
       </div>
   </div>
</div>

@include('dashboard._footer')
