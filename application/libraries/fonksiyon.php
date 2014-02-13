<?php
if (!defined('BASEPATH'))
	exit("Erisim Hatasi");

class Fonksiyon
{
	
	public function tarih_cevir($value)
	{
		$aylar = array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
		$first = explode("-", $value);
		for ($i=1; $i < 13; $i++) { 
			if ($first[0]==$i)
				$first[0]=$aylar[$i-1];
		}
		return $first[1]." ".$first[0]." ".$first[2];
	}
	public function tarih_cevir2($value)
	{
		$aylar = "January,February,March,April,May,June,July,August,September,October,November,December";
		$aylar = explode(",", $aylar);
		$first = explode("-", $value);
		for ($i=1; $i < 13; $i++) { 
			if ($first[0]==$i)
				$first[0]=$aylar[$i-1];
		}
		$gun = "th";
		if($first[1]=="01")
			$gun = "st";
		if ($first[1]=="02")
			$gun = "nd";
		return $first[0]." ".$first[1].$gun.", ".$first[2];
	}
	public function tarih_cevir3($value)
	{
		$first = explode("-", $value);
		return $first[2]."-".$first[0]."-".$first[1];
	}
	public function kateg($gelen){
		$CI =& get_instance();
		$CI->load->model('Blog_model');
		$giden = "";
		$datas = $CI->Blog_model->katlar($gelen);
		foreach ($datas as $data) {
			
			$giden .= '<a href="/kategori/'.$data->kseo.'.html"><i class="fa fa-folder-open"></i>'.$data->isim.'</a>&nbsp;';
		}
		return $giden;
	}
}
?>
