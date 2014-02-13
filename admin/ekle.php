<?php
$gelen = $_GET["ney"];
switch ($gelen) {

case 'yazi':
?>
<form name="upload" enctype="multipart/form-data" id="form" action="yolla.php?ney=yazi" method="post" autocomplete="on">

	<fieldset>

		<section>
			<label for="text_field">Yazı Başlığı</label>
			<div>
				<input type="text" id="baslik" name="hbaslik"/>
			</div>
		</section>
	</fieldset>

	<fieldset>

		<section>
			<label for="text_field">Kısa Açıklama</label>
			<div>
				<input type="text" id="acik" name="acik"/>
			</div>
		</section>
	</fieldset>
	<fieldset>

		<section>
			<label for="text_field">Durumu</label>
			<div>
				<input type="radio" id="durum" name="durum" value="1" checked="true"/> Açık
				<br>
				<input type="radio" id="durum" name="durum" value="0"/> Kapalı
				
			</div>
		</section>
	</fieldset>
		<fieldset>

		<section>
			<label for="text_field">Yoruma</label>
			<div>
				<input type="radio" id="yorum" name="yorum" value="1" checked="true"/> Açık
				<br>
				<input type="radio" id="yorum" name="yorum" value="0"/> Kapalı
				
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
				$dizi = new stdClass();
				$dizi = $db -> tablo("SELECT * FROM kat");
				?>

				<?
				$i=0;
				foreach ($dizi as $key=>$value):
				?>
				<input type="checkbox" <?php
				if ($i == 0)
					echo 'checked="checked"';
				?>
				value="<?=$value -> id ?>" name="kats[]" id="<?=$value -> id ?>" >
				<label for="<?=$value -> id ?>"><?=$value -> isim ?></label>
				<?
				$i++;
				endforeach;
				?>
			</div>
		</section>

	</fieldset>
	<fieldset>

		<section>
			<label for="text_field">Taglar</label>
			<div>
				<input type="text" id="tag" name="tag"/>
			</div>
		</section>
	</fieldset>
	<fieldset>
	<fieldset>
		<section>
			<label for="textarea_auto">İçerik
				<br>
			</label>
			<div>
				<? getEditor("icerik", "deneme"); ?>

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


case 'kat':
?>
<form name="upload" enctype="multipart/form-data" id="form" action="yolla.php?ney=kat" method="post" autocomplete="on">

	<fieldset>

		<section>
			<label for="text_field">Kategori Başlığı</label>
			<div>
				<input type="text" id="baslik" name="hbaslik"/>
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

case 'resim':
?>
<form name="upload" enctype="multipart/form-data" id="form" action="yolla.php?ney=resim" method="post" autocomplete="on">

	<fieldset>

		<section>
			<label for="text_field">Resim Başlığı</label>
			<div>
				<input type="text" id="baslik" name="hbaslik"/>
			</div>
		</section>
	</fieldset>
	
	<fieldset>
		<section>
			<label for="file_upload">Resimler
				<br>
				<br>
				<a class="dede btn red">Daha Fazla Ekle</a></label>
			<div id="kur">
				<input type="file" name="resim[]" id="resim[]" lang="tr"/>
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