<?php

class MyWs{
	function hello($nama) {
		return "Hello, selamat datang " . $nama;
	}
	
	function cekBarang($kdBarang){
		switch ($kdBarang) {
			case 'MG1111' :
				$jumlah = 10;
				break;
			case 'MG1122' :
				$jumlah = 2220;
				break;
			case 'MG007' :
				$jumlah = 1;
				break;
			default :
				$jumlah = 0;
				break;
		}
		
		return $jumlah;
	}
	
	//document literal, not rpc
	function tambah($prm){
		$prm1=$prm->prm1;
		$prm2=$prm->prm2;
		
		return $prm1 + $prm2;	
	}
	
	function info(){
		$re->nama='budi';
		$re->npm='44445';
		$re->agama='islam';
						
		return $re;		
	}
	 // tugas kelompok 2

	function setInfo($lahir){
		$tgl=$lahir->tgl;
		$bln=$lahir->bln;
		$thn=$lahir->thn;

		$tanggal_today = date('d');


		$bulan_today=date('m');


		$tahun_today = date('Y');


		$harilahir=gregoriantojd($bln,$tgl,$thn);

		//menghitung jumlah hari sejak tahun 0 masehi


		$hariini=gregoriantojd($bulan_today,$tanggal_today,$tahun_today);

		//menghitung jumlah hari sejak tahun 0 masehi




		$umur=$hariini-$harilahir;

		//menghitung selisih hari antara tanggal sekarang dengan tanggal lahir


		$tahun=$umur/365;//menghitung usia tahun


		$sisa=$umur%365;//sisa pembagian dari tahun untuk menghitung bulan


		$bulan=$sisa/30;//menghitung usia bulan


		$hari=$sisa%30;//menghitung sisa hari

		$umur_sekarang=floor($tahun);

		if ($umur_sekarang > 20) {
			return "umur anda mencukupi"
		}else{
			$x = 20 -$umur_sekarang;
			return " tunggu $x tahun lagi";
		}

		
	}
//ini_set("soap.wsdl_cache_enabled", 0);

$server = new SoapServer("brosur_0.wsdl");
$server->setClass("MyWs");
$server->handle();

?>
