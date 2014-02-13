<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$sitee = "http://www.kursatonsoz.com/";
$path = "/home/kursat/blog/";
include 'fonksiyon.php';

 function getEditor($name,$data)
  {
	 echo "<textarea name=$name id=$name>$data</textarea>
	 <script src=\"ckeditor/ckeditor.js\"></script>
	<script>CKEDITOR.replace( '$name',{toolbar : 'Full', uiColor : '#bada55' });CKEDITOR.add</script>";
 }
?>

<!doctype html>
<html lang="tr-TR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Yönetim Paneli</title>

        <meta name="description" content="">
        <meta name="author" content="Kürşat Önsöz">


        <!-- Google Font and style definitions
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold"> -->
        <link rel="stylesheet" href="css/style.css">

        <!-- include the skins (change to dark if you like) -->
        <link rel="stylesheet" href="css/light/theme.css" id="themestyle">
        <!-- <link rel="stylesheet" href="css/dark/theme.css" id="themestyle"> -->

        <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css">
        <![endif]-->

        <!-- Apple iOS and Android stuff -->
        <meta name="apple-mobile-web-app-capable" content="no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

        <!-- Apple iOS and Android stuff - don't remove! -->
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

        <!-- Use Google CDN for jQuery and jQuery UI -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>

        <!-- Loading JS Files this way is not recommended! Merge them but keep their order -->

        <!-- some basic functions -->
        <script src="js/functions.js"></script>
 		<script src="js/plugins.js"></script>
        <!-- all Third Party Plugins -->
        

        <script src="js/editor.js"></script>
        <script src="js/calendar.js"></script>
        <script src="js/flot.js"></script>
        <script src="js/elfinder.js"></script>
        <script src="js/datatables.js"></script>

        <!-- all Whitelabel Plugins -->
        <script src="js/wl_Alert.js"></script>
        <script src="js/wl_Autocomplete.js"></script>
        <script src="js/wl_Breadcrumb.js"></script>
        <script src="js/wl_Calendar.js"></script>
        <script src="js/wl_Chart.js"></script>
        <script src="js/wl_Color.js"></script>
        <script src="js/wl_Date.js"></script>
        <script src="js/wl_Editor.js"></script>
        <?
        	 function pluginn()
			 {
				 echo '<script src="js/wl_File.js"></script>';
			 }
        ?>
        <script src="js/wl_Dialog.js"></script>
        <script src="js/wl_Fileexplorer.js"></script>
        <script src="js/wl_Form.js"></script>
        <script src="js/wl_Gallery.js"></script>
        <script src="js/wl_Multiselect.js"></script>
        <script src="js/wl_Number.js"></script>
        <script src="js/wl_Password.js"></script>
        <script src="js/wl_Slider.js"></script>
        <script src="js/wl_Store.js"></script>
        <script src="js/wl_Time.js"></script>
        <script src="js/wl_Valid.js"></script>
        <script src="js/wl_Widget.js"></script>

        <!-- configuration to overwrite settings -->
        <script src="js/config.js"></script>

        <!-- the script which handles all the access to plugins etc... -->
        <script src="js/script.js"></script>


    </head>
    <body>
        <div id="pageoptions">
            <ul>
                <li><a href="cikis.php">Çıkış</a></li>

            </ul>

        </div>

        <header>
            <div id="logo">
            </div>
            <div id="header">

                <h1>Yönetim Paneli</h1>

            </div>
        </header>

        <nav>
            <ul id="nav">
                <li class="i_house"><a href="index.php"><span>Yazılar</span></a></li>

                <li class="i_block_images"><a href="?s=kat"><span>Kategoriler</span></a></li>
                
                <li class="i_block_images"><a href="?s=resim"><span>Resimler</span></a></li>
                <li class="i_house"><a href="../"><span>Siteye Dön</span></a></li>
                
                
            </ul>
        </nav>
