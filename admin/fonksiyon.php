<?php

class Sifreleme {
	public $hash = "";

	public function sifrele() {
		return md5($this -> hash . "deneme12-deneme123" . $this -> hash . "sifrelemealgoritmam" . $this -> hash);
	}

	public function sifreCoz($gelen) {
		if (md5($this -> hash . "deneme12-deneme123" . $this -> hash . "sifrelemealgoritmam" . $this -> hash) == $gelen) {
			return 1;
		} else {
			return 0;
		}
	}

}

class Veritabani {
	private $host = "";//hostname
	private $kullanici = "";//kullanici adi
	private $sifre = "";//sifre
	private $vt = "";//vt adi
	private $baglanti;
	private $hataGoster = true;
	function vt() {
		$this -> baglanti = mysql_connect($this -> host, $this -> kullanici, $this -> sifre) or die('MYSQL ile bağlantı kurulamadı');
		if ($this -> baglanti) :
			mysql_select_db($this -> vt, $this -> baglanti) or die('( <b>' . $this -> vt . '</b> ) isimli VERİTABANI BULUNAMADI');
			$this -> sorgu('SET NAMES utf8');
		endif;
	}

	function sorgu($sorgu) {
		$sorgu = mysql_query($sorgu, $this -> baglanti);
		if (!$sorgu && $this -> hataGoster)
			echo('<p>HATA : <strong>' . mysql_error($this -> baglanti) . '</strong></p>');
		return $sorgu;
	}

	function tablo($sorgu) {
		$tablo = $this -> sorgu($sorgu);
		$sonuc = array();
		while ($sonuclar = mysql_fetch_object($tablo)) :
			$sonuc[] = $sonuclar;
		endwhile;
		return $sonuc;
	}

	function tablo2($sorgu) {
		$tablo = $this -> sorgu($sorgu);
		$sonuc = array();
		while ($sonuclar = mysql_fetch_object($tablo)) :
			$sonuc[$sonuclar -> anahtar] = $sonuclar -> deger;
		endwhile;
		return $sonuc;
	}

	function satir($sorgu) {
		$satir = $this -> sorgu($sorgu);
		if ($satir)
			return mysql_fetch_object($satir);
	}

	function updateObject($obj, $table, $nere, $anahtar) {
		foreach ($obj as $key => $value) {
			$keyz = "UPDATE $table SET $nere='$value' WHERE $anahtar='$key'";
			$this -> sorgu($keyz);
		}

	}

	function insertObject($table, $alanlar, $degerler) {
		$sql = "INSERT INTO $table($alanlar) VALUES($degerler)";

		$this -> sorgu($sql);
	}

	function updateSQL($table, $str, $id) {
		$keyz = "UPDATE $table SET $str WHERE $id";
		$this -> sorgu($keyz);
		return $keyz;

	}

	function deleteData($table, $id) {
		try {
			$keyz = "DELETE FROM $table WHERE $id";
			$this -> sorgu($keyz);
			return TRUE;
		} catch(exception $e) {
			return false;
		}

	}

}

function hata() {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(-1);
}

function raw_json_encode($input) {

	return preg_replace_callback('/\\\\u([0-9a-zA-Z]{4})/', function($matches) {
		return mb_convert_encoding(pack('H*', $matches[1]), 'UTF-8', 'UTF-16');
	}, json_encode($input));

}

function seola($s) {
	$tr = array('ı', 'İ', 'ç', 'Ç', 'Ü', 'ü', 'Ö', 'ö', 'ş', 'Ş', 'ğ', 'Ğ');
	$eng = array('i', 'I', 'c', 'C', 'U', 'u', 'O', 'o', 's', 'S', 'g', 'G');
	$s = str_replace($tr, $eng, $s);
	$s = strtolower($s);
	$s = preg_replace('/&.+?;/', '', $s);
	$s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = trim($s, '-');
	return $s;
}

$path = "/home/kursat/blog/";

include ('resimboyut.php');
$image = new SimpleImage();
?>
