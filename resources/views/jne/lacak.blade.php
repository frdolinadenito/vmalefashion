@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <a href="{{ url()->previous() }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke riwayat</a>
    </div>
</div>
<?php


//jika jne
if ($jasa == "jne") {
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
        $search = array("'Indonesia'");
        $replace = array("");

        $str = preg_replace($search, $replace, $str);
        return $str;
    }


    $result2 = hilangkan($result);


    //jika salah
    if (empty($result2)) {
        echo "SALAH, HARAP CEK LAGI...";
    } else {
        echo $result2;
    }
}


//jika pos
if ($jasa == "pos") {
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
        $search = array("'Indonesia'");
        $replace = array("");

        $str = preg_replace($search, $replace, $str);
        return $str;
    }

    $result2 = hilangkan($result);


    //jika salah
    if (empty($result2)) {
        echo "SALAH, HARAP CEK LAGI...";
    } else {
        echo $result2;
    }
}


//jika tiki
if ($jasa == "tiki") {
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
        $search = array("'Indonesia'");
        $replace = array("");

        $str = preg_replace($search, $replace, $str);
        return $str;
    }

    $result2 = hilangkan($result);



    //jika salah
    if (empty($result2)) {
        echo "SALAH, HARAP CEK LAGI...";
    } else {
        echo $result2;
    }
}

?>

<br><br>

@endsection