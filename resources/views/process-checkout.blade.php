<!DOCTYPE html>
<html lang="zxx">

<head>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#show').click(function() {
        $('.menu').toggle("slide");
      });
    });
  </script>

  <script>
    var e = document.getElementById("jasa");
    var strUser = e.options[e.selectedIndex].value;
  </script>


  <script src="http://ajax.microsoft.com/ajax/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#jasa').change(function() {
        $("#jasa option:selected").val();
        var id = $("#jasa option:selected").val();
        //window.location.href = "{{route('proses')}}?harga="+id; 
        // alert("Value change to " + id );

        // alert($("#terserah1").val());
        //var harga_checkout = $("#terserah1").val();
        //alert(id + harga_checkout);
        //alert(parseInt(id) + parseInt(harga_checkout));
        var harga_checkout = $("#terserah1").val();
        var total = parseInt(id) + parseInt(harga_checkout);
        $("#total1").text(total);
      });
    });
  </script>

  <script>
    var p1 = "success";
  </script>


</head>
@extends('master.layout')

@section('content')
<!-- Content Header (Page header) -->

<body>
  <!--headder-->
  @include('includes.header')
  <!--//headder-->
  <!-- banner -->
  <div class="inner_page-banner one-img">
  </div>
  <!-- short -->
  <div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
      <ul class="short_ls">
        <li>
          <a href="{{route('index')}}">Home</a>
          <span>/ /</span>
        </li>
        <li>Process-Checkout</li>
      </ul>
    </div>
  </div>


  <!-- Main content -->

  <section>
    <div class="container">
      <div class="shop_inner_inf">
        <div class="privacy about">
          <h3>Chec<span>kout</span></h3>
          <div class="table-responsive">
            <!-- <h4>Your shopping cart contains: <span>3 Products</span></h4> -->
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>jumlah</th>
                  <th>Berat(Gram)</th>
                  <th>SubHarga</th>

                </tr>
              </thead>
              <tbody>
                <?php $total = 0 ?>
                <?php $total1 = 0 ?>
                @php $no = 1; @endphp
                @if(session('Cart'))
                @foreach(session('Cart') as $id => $details)

                <?php $total += $details['Harga_Barang'] * $details['quantity'] ?>
                <tr class="rem1">
                  <td>{{ $no++ }}</td>
                  <td data-th="Product">
                    <div class="row">
                      <div class="col-sm-3 hidden-xs"><img src="uploadImage/<?php echo $details['gambar'] ?>" width="100" height="100" class="img-responsive" /></div>
                      <div class="col-sm-9">
                        <h4 class="nomargin"> <?php echo $details['Nama_Barang']  ?> </h4>
                      </div>
                    </div>
                  </td>

                  <td data-th="Price">Rp <?php echo number_format($details['Harga_Barang']); ?>,00</td>
                  <td data-th="Quantity"><?php echo $details['quantity'] ?></td>
                  <td data-th="Weight"><?php echo $details['Berat'] ?></td>
                  <td data-th="Subtotal" class="text-center">Rp <?php echo number_format($details['Harga_Barang'] * $details['quantity']); ?>,00</td>

                </tr>

                @endforeach
                @endif


              </tbody>
            </table>

            <table class="table table-striped table-bordered table-hover">
              <tfoot>
                <tr>

                  <td colspan="4" class="hidden-xs"></td>
                  <td class="text-center"><strong>Total Belanja : Rp <?php echo number_format($total); ?>,00</strong></td>

                </tr>
              </tfoot>
            </table>

          </div>
          <!-- <div class="checkout-left">
            <div class="col-md-2 address_form"></div>
            <div class="col-md-8 address_form">
              <h4> Detail Pelanggan</h4>
              <form  class="creditly-card-form agileinfo_form">

               

            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>


  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3>Pengiriman</h3>
              <h3 class="box-title">Dari : <b>{{ $origin }}</h3><br />
              <h3 class="box-title">Ke : <b>{{ $destination }}</b></h3>
            </div>

          </div>

          <div class="form-group">
            <form method="post" action="{{ route('proses.store') }}" class="creditly-card-form agileinfo_form">

              {{ csrf_field() }}
              {{ method_field('post') }}

              <label>Opsi Pengiriman</label>
              <select id="jasa" class="form-control" name="jasa" required>>

                <option selected="selected" value="">Pilih Opsi</option>
                <?php for ($i = 0; $i < count($array_result["rajaongkir"]["results"][0]["costs"]); $i++) { ?>

                  <option id="show" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?>">Nama : <?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?> - Tarif : Rp <?php echo number_format($array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"]) ?>,00 - Estimasi Pengiriman : <?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?> Hari</option>

                <?php } ?>
              </select>

              <div id="terserah">
                <input type="hidden" id="terserah1" value="<?php echo ($total) ?>" />
              </div>
              <br>

              <h4>
                <div class="row">
                  &nbsp;&nbsp;Total Harga : Rp &nbsp; <div id="total1">
                    <?php echo $total; ?>
                  </div>

                </div>
              </h4>

              <br>
              <div class="row">
                <div class="col-md-8">
                  <div class="alert alert-info">
                    <p>Silahkan Melakukan Pembayaran maksimal 24 jam setelah pemesanan ke <br>
                      <strong> BANK MANDIRI : 3456789 AN. Vmale</strong>
                    </p>
                  </div>
                </div>
              </div>

              <div class="pull-right">
                <button type="submit" name="proses" class="btn btn-primary">Kirim</button>
              </div>

            </form>

          </div>


          <!-- <div class="menu" style="display: none;">

          </div> -->

          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  @stop