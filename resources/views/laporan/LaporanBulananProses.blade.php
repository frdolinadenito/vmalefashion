@include('dashboard._header')
<section class="content-wrapper">
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
      <h2 style="margin-top:0px">Laporan Pendapatan Bulanan</h2>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
    @endif
    @php $id=""; @endphp

    <script>
    var e = document.getElementById("tahun");
    var strUser = e.options[e.selectedIndex].value;
    alert("Value change to " + strUser );
  </script>

<script src="{{URL::asset('plugins/jQuery/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#tahun').change(function() {
        $("#tahun option:selected").val();
        var id = $("#tahun option:selected").val();
        
        var harga_checkout = $("#terserah1").val();
        var total = parseInt(id) + parseInt(harga_checkout);
        $("#total1").text(total);
      });
    });
  </script>



  </div>
  <div class="row" style="margin-bottom: 10px">
  

    <div class="col-md-4">
    <h5>Tahun : <?php echo $tahun ?></h2>
    <select class="form-control" name="tahun" id="tahun" onchange="window.location=this.options[this.selectedIndex].value">
          <option value="" disabled selected>Pilih Tahun</option>
          <!--di sini kita tambahkan class berisi id kota-->
          <option value="<?php echo url('pendapatanBulanan/2019') ?>">2019</option>
          <option value="<?php echo url('pendapatanBulanan/2018') ?>">2018</option>
          <option value="<?php echo url('pendapatanBulanan/2017') ?>">2017</option>
          <option value="<?php echo url('pendapatanBulanan/2016') ?>">2016</option>
          <option value="<?php echo url('pendapatanBulanan/2015') ?>">2015</option>
          <option value="<?php echo url('pendapatanBulanan/2014') ?>">2014</option>
        </select>

    
    </div>
   


<div class="col-md-4 text-right">

      <a href="{{ route('bulanan.pdf', $tahun) }}" class="btn btn-primary btn-L">
        <i class="glyphicon glyphicon-save"></i> Unduh</a>
    </div>
              <br>
              
  </div>
  <div class="box">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="mytable">
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>Bulan</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $start = 0; ?>
          @foreach ($pendapatanBulanan_data as $pendapatanBulanan)


          <tr>
            <td><?php echo ++$start ?></td>
            <td><?php if ($pendapatanBulanan->bulan == NULL) {
                  echo 0;
                } else {
                  echo $pendapatanBulanan->bulan;
                } ?></td>
            <td><?php if ($pendapatanBulanan->countPembayaran == NULL) {
                  echo 0;
                } else {
                  echo number_format($pendapatanBulanan->countPembayaran);
                } ?></td>

          </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>

  <!-- BAR CHART -->
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Bar Chart</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="bar-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body -->
  </div>
  
    

 
  <!-- /.box -->
</section>
<!-- SlimScroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimScroll.min.js')}}"></script>

<!-- Datatables Js -->

<script src="{{URL::asset('public_html/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('public_html/plugins/datatables/dataTables.bootstrap.js')}}"></script>


<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('public_html/plugins/jQuery/jquery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{URL::asset('public_html/plugins/morris/morris.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function() {
    "use strict";

    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        <?php
        $i = 0;
        while ($i < count($pendapatanBulanan_data)) {
          if ($pendapatanBulanan_data[$i]) { ?> {
              y: '<?php echo $pendapatanBulanan_data[$i]->bulan ?>',
              c: <?php echo $pendapatanBulanan_data[$i]->countPembayaran ?>
            },
          <?php }
        $i++;
      }
      ?>
      ],
      barColors: ['#f56954'],
      xkey: 'y',
      ykeys: ['c'],
      labels: ['Total'],
      hideHover: 'auto'
    });
  });
</script>
@include('dashboard._footer')