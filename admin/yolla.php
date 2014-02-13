<?
header('Content-Type: text/html; charset=utf-8');
ob_start();
include ("fonksiyon.php");
$gelen = $_GET["ney"];
switch ($gelen) {
	case 'yazi' :
		$baslik = trim($_POST['hbaslik']);
		$kisa = trim($_POST['acik']);
		$seo = trim(seola($baslik));
		$icerik = trim(mysql_real_escape_string($_POST['icerik']));
		$simdi = date("m-d-Y-H-i-s");
		$katlar = $_POST["kats"];
		$katlar = json_encode($katlar);
		$durum = $_POST["durum"];
		$yorum = $_POST["yorum"];
		$tag = $_POST["tag"];
		$tag = explode(",",$tag);
		$tag = json_encode($tag);
		$db = new Veritabani();
		$db -> vt();
		$db -> insertObject("yazi", "kisa,baslik,icerik,tarih,kat,tags,seo,yorum,durum", "'$kisa','$baslik','$icerik','$simdi','$katlar','$tag','$seo','$yorum','$durum'");
		$idsi = $db->satir("SELECT id FROM yazi ORDER BY id DESC LIMIT 1");
		foreach($_POST["kats"] as $kat){
			$db -> insertObject("kat_to_yazi",'yazi,kat',"'$idsi->id','$kat'");
		}
		
		echo "<script>alert('Eklendi');</script>";
		header("refresh:1;url=index.php");
		die ;
		break;
	case 'yaziduz' :
		$baslik = trim($_POST['hbaslik']);
		
		$kisa = trim($_POST['acik']);
		$seo = trim(seola($baslik));
		$id = $_POST["id"];
		$icerik = trim(mysql_real_escape_string($_POST['icerik']));
		$simdi = date("m-d-Y-H-i-s");
		$katlar = $_POST["kats"];
		$katlar = json_encode($katlar);
		$durum = $_POST["durum"];
		$yorum = $_POST["yorum"];
		$tag = $_POST["tag"];
		$tag = explode(",",$tag);
		$tag = json_encode($tag);
		$db = new Veritabani();
		$db -> vt();
		$keyz = "UPDATE $table SET $str WHERE $id";
		$db -> updateSQL("yazi", "kisa='$kisa',baslik='$baslik',icerik='$icerik',kat='$katlar',tags='$tag',seo='$seo',yorum='$yorum',durum='$durum'", "id='$id'");
		$db -> deleteData("kat_to_yazi", "yazi='$id'");
		foreach($_POST["kats"] as $kat){
			$db -> insertObject("kat_to_yazi",'yazi,kat',"'$id','$kat'");
		}
		echo "<script>alert('Güncellendi');</script>";
		header("refresh:1;url=index.php");
		die ;
	break;
	
	case 'resim' :
		
		$baslik = trim($_POST['hbaslik']);
		$toplam = count($_FILES['resim']['name']);
		$formatlar = array("image/png", "image/jpeg", "image/gif");
		for ($i = 0; $i < $toplam; $i++) {
			if (in_array($_FILES["resim"]["type"][$i], $formatlar)) {
				$isim = rand(0, 65536) . "-" . $simdi . "-";
				$ismi = $isim . $_FILES['resim']['name'][$i];
				$tr = array('ı', 'İ', 'ç', 'Ç', 'Ü', 'ü', 'Ö', 'ö', 'ş', 'Ş', 'ğ', 'Ğ');
				$eng = array('i', 'I', 'c', 'C', 'U', 'u', 'O', 'o', 's', 'S', 'g', 'G');
				$ismi = str_replace($tr, $eng, $ismi);
				$ismi = preg_replace('/\s+/', '-', $ismi);
				$ismi = preg_replace('|-+|', '-', $ismi);
				$dizin = $path . "resimler/resim-" . $ismi;
				$dizin2 = $path . "resimler/kucuk/resim-" . $ismi;
				if (move_uploaded_file($_FILES['resim']['tmp_name'][$i], $dizin)) {
					$image -> load($dizin);
					$image -> resizeToWidth(250);
					$image -> save($dizin2);
					$buyuk = new SimpleImage();
					$buyuk->load($dizin);
					$buyuk->resizeToWidth(700);
					$buyuk->save($dizin);
					$urll[] = "resim-" . $ismi;
				} else {
					echo "resim taşınamadı.";
				}
			} else {
				echo "dosya yüklenmesinde hata.";
			}
		}

		$resimler = json_encode($urll);
		$db = new Veritabani();
		$db -> vt();
		$db -> insertObject("resim", "baslik,path", "'$baslik','$resimler'");
		echo "<script>alert('Eklendi');</script>";
		header("refresh:1;url=index.php?s=resim");
		die ;
		break;
	
	case 'katduz' :
		$baslik = trim($_POST['hbaslik']);
		$id = trim($_POST['id']);
		$seo = trim(seola($baslik));
		$db = new Veritabani();
		$db -> vt();
		$keyz = "UPDATE $table SET $str WHERE $id";
		$db -> updateSQL("kat", "isim='$baslik',kseo='$seo'", "id='$id'");

		echo "<script>alert('Güncellendi');</script>";
		header("refresh:1;url=index.php");
		die ;
		break;

	case 'kat' :
		$baslik = trim($_POST['hbaslik']);
		$seo = trim(seola($baslik));
		$db = new Veritabani();
		$db -> vt();
		$db -> insertObject("kat", "isim,kseo", "'$baslik','$seo'");
		echo "<script>alert('Eklendi');</script>";
		header("refresh:1;url=index.php");
		die ;
		break;
	default :
		echo "<script>alert('Yanlış İşlem');</script>";
		header("refresh:1;url=index.php");
		die ;
		break;
}
?>