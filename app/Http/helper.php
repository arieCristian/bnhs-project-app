<?php

use Carbon\Carbon;

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

function justToday($date){
    $today = Carbon::today();
    $createdAt = Carbon::parse($date);
    if ($createdAt->isToday()) {
        return true ;
    }else {
        return false ;
    }
}