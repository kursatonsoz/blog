<?php
session_start();
ob_start();
error_reporting(E_ALL);
header("content-type: text/html; charset=utf-8");
if ($_SESSION["adm"] == "") {
	header("Location: login.php");
	exit ;
}
include 'ust.php';
?>

<section id="content">
	<div class="g12">
		<?php
		$s = eregi_replace("\Ww", "", $_GET['s']);
		if (!file_exists("$s.php")) {$s = "yazi";
		}
		include ("$s.php");
		?>
	</div>
</section>
<?php
include_once 'alt.php';
?>

