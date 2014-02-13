<?
pluginn();
?>
<a class="btn red" href="?s=ekle&ney=resim">Yeni Resim Ekle</a>
<h1>Hizmetler</h1>
			
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="sorting_asc">Resim ID</th><th>Resim</th><th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?
					$db = new Veritabani();
					$db -> vt();
					$dizi = new stdClass();
					$dizi = $db -> tablo("SELECT * FROM resim");
                    
                     foreach($dizi as $key=>$value): 
                     $resims = json_decode($value->path);
                     ?>
                    
                        <tr class="gradeA">
						
                            <td><?= $value -> id ?></td>
                             <td><? foreach($resims as $resim):
							 			?>
							 			<img src="<?=$sitee . 'resimler/kucuk/' . $resim;?>" /><br> -> <?=$sitee . 'resimler/' . $resim;?> <br><br>
                             	<?endforeach;?></td>
                            <td class="c">

                                <a href="?s=sil&ney=resim&h=<?= $value -> id ?>" onclick="return confirm('Yazı silinsin mi?')" >Sil</a></td>

                        </tr> 
                    <?php endforeach; ?>    
                </tbody>
            </table>
			<script>
				$(document).ready(function() {
					$('#content').find("table.datatable").dataTable({
						"aaSorting" : [[5656569646321332165565856321654, "desc"]],
						"sPaginationType" : "full_numbers",
						"bDestroy" : true
					});
				});

			</script>