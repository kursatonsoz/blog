<?

session_start();
ob_start();
include ("fonksiyon.php");

$u = mysql_escape_string($_POST["username"]);
$p = mysql_escape_string($_POST["password"]);

$n = new Sifreleme();
$n -> hash = $p;

$pass = $n -> sifrele();

$db = new Veritabani();
$db -> vt();
$obj = new stdClass();
$obj = $db -> satir("SELECT * FROM kullanici WHERE kul='$u' AND sif='$pass'");
if ($obj -> id == "") {
	echo "<script>alert('Geçersiz Kullanıcı adı veya Parola');</script>";
	header("Location: index.php");
} else {
	$x = new Sifreleme();
	$x -> hash = $obj -> id . "-" . $obj -> sifre;
	$g = $x -> sifrele();
	
	$_SESSION["adm"] = $g;
	header("Location: index.php");
}
exit ;

ob_end_flush();
?>