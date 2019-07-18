<html>
    <head>
    <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
    @php $id=""; @endphp
       

        <h4 style="text-align:center" >=======================================================</h4>
        
        <h2 style="text-align:center" >LAPORAN PENDAPATAN BULANAN</h2> 
        <h5 style="text-align:left" >Tahun : <?php echo $tahun ?></h5>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Total</th>
        
            </tr>
            <?php $start = 0; ?>
            <?php
            foreach ($pendapatanTahunan_data as $pendapatanTahunan)
            {
                ?>
                <tr>
                <td><?php echo ++$start ?></td>
                <td><?php if($pendapatanTahunan->tahun == NULL)
                        {echo 0;} else { echo $pendapatanTahunan->tahun; } ?></td>
                <td><?php if($pendapatanTahunan->countPembayaran == NULL)
                  {echo 0;} else { echo number_format($pendapatanTahunan->countPembayaran) ; } ?></td>
      
                </tr>
                <?php
            }
            ?>
        </table>
    <br>
    <h6 style="text-align:right">Dicetak tgl : <?php echo date('Y-m-d H:i:s') ?> </h6>
    </body>
</html>