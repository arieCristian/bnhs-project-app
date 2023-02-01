<?php 

function priceFormat($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,'.','.');
	return $hasil_rupiah;
}

function priceToInt($price){
    $price = str_replace("Rp.", "", $price);
    $price = str_replace(".", "", $price);
    $price = intval($price);
    return $price ;
}

function dateFormat($date){
    return $date->timezone('Asia/Manila')->format('d-M-Y h:i A');
}