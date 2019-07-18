@include('dashboard._header')
<section class="content-wrapper">
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
      <h2 style="margin-top:0px">Laporan Pendapatan Tahunan</h2>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
    @endif
    @php $id=""; @endphp

    


  </div>
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
  

      
        <select class="form-control" name="tahun" id="tahun" onchange="window.location=this.options[this.selectedIndex].value">
          <option value="" disabled selected>Pilih Tahun</option>
          <!--di sini kita tambahkan class berisi id kota-->
          <option value="<?php echo url('pendapatanTahunan/2019') ?>">2019</option>
          <option value="<?php echo url('pendapatanTahunan/2018') ?>">2018</option>
          <option value="<?php echo url('pendapatanTahunan/2017') ?>">2017</option>
          <option value="<?php echo url('pendapatanTahunan/2016') ?>">2016</option>
          <option value="<?php echo url('pendapatanTahunan/2015') ?>">2015</option>
          <option value="<?php echo url('pendapatanTahunan/2014') ?>">2014</option>
        </select>
        
    </div>
    
     <br>
              
  </div>
  <div class="box">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="mytable">
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>Tahun</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $start = 0; ?>
          @foreach ($pendapatanTahunan_data as $pendapatanTahunan)


          <tr>
            <td><?php echo ++$start ?></td>
            <td><?php if ($pendapatanTahunan->tahun == NULL) {
                  echo 0;
                } else {
                  echo $pendapatanTahunan->tahun;
                } ?></td>
            <td><?php if ($pendapatanTahunan->countPembayaran == NULL) {
                  echo 0;
                } else {
                  echo number_format($pendapatanTahunan->countPembayaran);
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

<script src="{{URL::asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>


<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('plugins/jQuery/jquery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{URL::asset('plugins/morris/morris.min.js')}}"></script>
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
        while ($i < count($pendapatanTahunan_data)) {
          if ($pendapatanTahunan_data[$i]) { ?> {
              y: '<?php echo $pendapatanTahunan_data[$i]->tahun ?>',
              c: <?php echo $pendapatanTahunan_data[$i]->countPembayaran ?>
            },
          <?php }
        $i++;
      }
      ?>
      ],
      barColors: ['#52ff33'],
      xkey: 'y',
      ykeys: ['c'],
      labels: ['Total'],
      hideHover: 'auto'
    });
  });
</script>
@include('dashboard._footer')