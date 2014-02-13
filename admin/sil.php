<?php
$gelen = $_GET["ney"];
$han = $_GET["h"];
switch ($gelen) {
	case 'kat' :
		$db = new Veritabani();
		$db -> vt();
		$dizi = new stdClass();
		if ($dizi = $db -> deleteData("kat", "id='$han'")) {
			echo "<script>alert('Silindi');</script>";
			header("refresh:1;url=index.php");
		} else {
			echo "<script>alert('Silinemedi');</script>";
			header("refresh:1;url=index.php");
		}
		die ;
		break;
		
	case 'resim' :
		$db = new Veritabani();
		$db -> vt();
		$dizi = new stdClass();
		if ($dizi = $db -> deleteData("resim", "id='$han'")) {
			echo "<script>alert('Silindi');</script>";
			header("refresh:1;url=index.php");
		} else {
			echo "<script>alert('Silinemedi');</script>";
			header("refresh:1;url=index.php");
		}
		die ;
		break;
	case 'yazi' :
		$db = new Veritabani();
		$db -> vt();
		$dizi = new stdClass();
		if ($dizi = $db -> deleteData("yazi", "id='$han'")) {
			echo "<script>alert('Silindi');</script>";
			header("refresh:1;url=index.php");
		} else {
			echo "<script>alert('Silinemedi');</script>";
			header("refresh:1;url=index.php");
		}
		die ;
		break;
	default :
		break;
}
?>