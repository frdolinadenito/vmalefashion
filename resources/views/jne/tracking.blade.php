@extends('layouts.app')

@section('content')

 <section class="">
           <div class="container">
			<div class="row">
				<div class="col-md-10 ">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tracking Barang</h3>
						</div>
						<div class="panel-body">
				<form method="post" class="form-horizontal">

                
                {{ csrf_field() }}
                {{ method_field('post') }}

				<div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="resi">Nomor Resi</label>
                     </div>
                     <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="resi"  placeholder = "Nomor resi" required autofocus>
                     </div>
               </div>


                <div class="form-row">
                     <div class="form-group col-md-4">
                         <label for="jasa">Jasa</label>
                     </div>
                     <div class="form-group col-md-8">
                        <select name="jasa" id="" class="form-control">
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                     </div>
               </div>
               <br><br>

               <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>

				</form>
							
							<br><br>		
                <?php 
            
            $resi = request('resi');
            $jasa = request('jasa');

            //jika jne
            if ($jasa == "jne")
                {
                $base = "https://track.aftership.com/jne/$resi?";
                
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);
                
                
                //sempurnakan
                $start = "<div class=\"checkpoints\">";
                $end   = "Date & time are usually";
                $startPosisition = strpos($str, $start);
                $endPosisition   = strpos($str, $end); 
                
                $longText = $endPosisition - $startPosisition;
                
                $result = substr($str, $startPosisition, $longText);
                    
                
                
                //hilangkan
                function hilangkan($str)
                    {
                    $str = trim($str);
                    $search = array ("'Indonesia'");
                    $replace = array ("");
                
                    $str = preg_replace($search,$replace,$str);
                    return $str;
                    }
                
                
                $result2 = hilangkan($result);
                
                
                //jika salah
                if (empty($result2))
                    {
                    echo "SALAH, HARAP CEK LAGI...";
                    }
                else
                    {
                    echo $result2;
                    }
                }
                
                
            //jika pos
            if ($jasa == "pos")
                {
                $base = "https://track.aftership.com/pos-indonesia/$resi?";
                
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);
                
                
                //sempurnakan
                $start = "<div class=\"checkpoints\">";
                $end   = "Date & time are usually";
                $startPosisition = strpos($str, $start);
                $endPosisition   = strpos($str, $end); 
                
                $longText = $endPosisition - $startPosisition;
                
                $result = substr($str, $startPosisition, $longText);
                    
                
                //hilangkan
                function hilangkan($str)
                    {
                    $str = trim($str);
                    $search = array ("'Indonesia'");
                    $replace = array ("");
                
                    $str = preg_replace($search,$replace,$str);
                    return $str;
                    }
                
                $result2 = hilangkan($result);
                
                
                //jika salah
                if (empty($result2))
                    {
                    echo "SALAH, HARAP CEK LAGI...";
                    }
                else
                    {
                    echo $result2;
                    }
                }
                
                
            //jika tiki
            if ($jasa == "tiki")
                {
                $base = "https://track.aftership.com/tiki/$resi?";
                
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);
                
                

                //sempurnakan
                $start = "<div class=\"checkpoints\">";
                $end   = "Date & time are usually";
                $startPosisition = strpos($str, $start);
                $endPosisition   = strpos($str, $end); 
                
                $longText = $endPosisition - $startPosisition;
                
                $result = substr($str, $startPosisition, $longText);
                    
                
                //hilangkan
                function hilangkan($str)
                    {
                    $str = trim($str);
                    $search = array ("'Indonesia'");
                    $replace = array ("");
                
                    $str = preg_replace($search,$replace,$str);
                    return $str;
                    }
                
                $result2 = hilangkan($result);
                
                
                
                //jika salah
                if (empty($result2))
                    {
                    echo "SALAH, HARAP CEK LAGI...";
                    }
                else
                    {
                    echo $result2;
                    }
                }
	
            ?>	
	

    </section>
    @endsection

 