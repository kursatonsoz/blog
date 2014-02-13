<?

session_start();
ob_start();
unset($_SESSION["adm"]);
header("Location:index.php");
ob_end_flush();
?>
