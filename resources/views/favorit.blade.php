@extends('master.layout')
@section('content')
   <body>
   <!--headder-->
   @include('includes.header')
   <!--//headder-->
   <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('index')}}">Beranda</a>
                  <span>/ /</span>
               </li>
               <li>Favorit</li>
            </ul>
         </div>
      </div>
<div class="table-responsive">
                
    <table id="favorit" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:40%">Produk</th>
            <th style="width:10%">Harga</th>
            <th style="width:5%" class="text-center">Jumlah</th>
            <th style="width:5%" class="text-center">Berat(Gram)</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:5%">Aksi</th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('Favorit'))
            @foreach(session('Favorit') as $id => $details)

            <?php $total += $details['Harga_Barang'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="uploadImage/<?php echo $details['gambar'] ?>" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin"> <?php echo $details['Nama_Barang']  ?> </h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp <?php echo number_format($details['Harga_Barang']); ?>,00</td>
                    <td data-th="Quantity"><?php echo $details['quantity'] ?></td>
                    <td data-th="Weight"><?php echo $details['Berat'] ?></td>
                    
                    <td data-th="Subtotal" class="text-center">Rp <?php echo number_format($details['Harga_Barang'] * $details['quantity']); ?>,00</td>
                    <td class="actions" data-th="">

                        <td>
                            <form class="" action="{{ route('favorit.remove', $id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            </form>
                        </td>

                        <td>
                     <a href="{{ route('cart',$id)}}" class="btn btn-warning " role="button">Tambah ke Keranjang</a> 
                           
                     </td>

                        <!-- <button class="btn btn-info btn-sm update-favorit" data-id="{{ $id }}"><i class="fa fa-refresh"></i>edit</button>
                        <button class="btn btn-danger btn-sm remove-from-favorit" data-id="{{ $id }}"><i class="fa fa-trash-o">hapus</i></button> -->
                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td colspan="4" class="hidden-xs"></td>
            <td class="text-center"><strong>Total :RP <?php echo number_format( $total); ?>,00</strong></td>
            
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Lanjutkan Belanja</a></td>
            
            
            
        </tr>
        </tfoot>
        </table>
</div>
        @section('scripts')
 
 
    <script type="text/javascript">
 
        $(".update-favorit").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-favorit') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-favorit").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-favorit') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
@endsection

</body>
@stop