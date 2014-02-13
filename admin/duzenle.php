<?php
$gelen = $_GET["ney"];
$han = $_GET["h"];
switch ($gelen) {
	case 'kat' :
		$db = new Veritabani();
		$db -> vt();
		$dizi = new stdClass();
		$dizi = $db -> satir("SELECT * FROM kat WHERE id=$han");
?>
<form name="upload" enctype="multipart/form-data" id="form" action="yolla.php?ney=katduz" method="post" autocomplete="on">

	<fieldset>
		<input type="hidden" id="id" name="id" value="<?=$dizi -> id; ?>"/>
		<section>
			<label for="text_field">Kategori Başlığı</label>
			<div>
				<input type="text" id="baslik" name="hbaslik" value="<?=$dizi -> isim; ?>"/>
			</div>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<div>
				<button class="reset">
					Temizle
				</button>
				<button onclick="submit();">
					Gönder
				</button>
			</div>
		</section>
	</fieldset>
</form>
<?
break;


case 'yazi':
$db = new Veritabani();
$db -> vt();
$dizi = new stdClass();
$dizi = $db -> satir("SELECT * FROM yazi WHERE id=$han");

?>


<form name="upload" enctype="multipart/form-data" id="form" action="yolla.php?ney=yaziduz" method="post" autocomplete="on">

	<fieldset>
		<input type="hidden" id="id" name="id" value="<?=$han ?>"/>
		<section>
			<label for="text_field">Yazı Başlığı</label>
			<div>
				<input type="text" id="baslik" name="hbaslik" value="<?=$dizi -> baslik ?>"/>
			</div>
		</section>
	</fieldset>
	<fieldset>

		<section>
			<label for="text_field">Kısa Açıklama</label>
			<div>
				<input type="text" id="acik" name="acik" value="<?=$dizi->kisa?>" />
			</div>
		</section>
	</fieldset>
	<fieldset>

		<section>
			<label for="text_field">Durumu</label>
			<div>
				
				<input type="radio" id="durum" name="durum" value="1" <?if($dizi->durum=='1') echo 'checked="true"';?>/> Göster
				<br>
				<input type="radio" id="durum" name="durum" value="0" <?if($dizi->durum=='0') echo 'checked="true"';?>/> Gösterme
			</div>
		</section>
	</fieldset>
	<fieldset>

		<section>
			<label for="text_field">Yoruma</label>
			<div>
				
				<input type="radio" id="yorum" name="yorum" value="1" <?if($dizi->yorum=='1') echo 'checked="true"';?>/> Açık
				<br>
				<input type="radio" id="yorum" name="yorum" value="0" <?if($dizi->yorum=='0') echo 'checked="true"';?>/> Kapalı
			</div>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<label>Kategori</label>
			<div>
				<?
				$db = new Veritabani();
				$db -> vt();
				$kats = json_decode($dizi->kat);
				$dizis = new stdClass();
				
				$dizis = $db -> tablo("SELECT * FROM kat");
				foreach ($dizis as $key=>$value):
				?>
				<input type="checkbox" <?php
				if (in_array($value->id, $kats))
					echo 'checked="checked"';
				?>
				value="<?=$value -> id ?>" name="kats[]" id="<?=$value -> id ?>" >
				<label for="<?=$value -> id ?>"><?=$value -> isim ?></label>
				<?
				endforeach;
				?>
			</div>
		</section>

	</fieldset>
	<fieldset>
		<section>
			<label for="text_field">Taglar</label>
			<div>
				<input type="text" id="tag" name="tag" value="<?=implode(',',json_decode($dizi->tags))?>" />
			</div>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<label for="icerik">İçerik
				<br>
			</label>
			<div>
				<?
				geteditor("icerik",$dizi->icerik);
				?>
				
			</div>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<div>
				<button class="reset">
					Temizle
				</button>
				<button onclick="submit();">
					Gönder
				</button>
			</div>
		</section>
	</fieldset>
</form>
<?
break;

default :
break;
}
?>