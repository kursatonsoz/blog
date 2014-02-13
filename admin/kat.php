<?
pluginn();
?>
<a class="btn red" href="?s=ekle&ney=kat">Yeni Kategori Ekle</a>
<h1>Hizmetler</h1>
			
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="sorting_asc">Kategori ID</th><th>Kategori Başlığı</th><th>Düzenle</th><th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?
					$db = new Veritabani();
					$db -> vt();
					$dizi = new stdClass();
					$dizi = $db -> tablo("SELECT * FROM kat");
                    
                     foreach($dizi as $key=>$value): ?>
                    
                        <tr class="gradeA">
						
                            <td><?= $value->id ?></td>
                            <td><?= $value->isim ?></td>
                            <td><a href="?s=duzenle&ney=kat&h=<?= $value->id ?>">Düzenle</a></td><td class="c">

                                <a href="?s=sil&ney=kat&h=<?= $value->id ?>" onclick="return confirm('Kategori silinsin mi?')" >Sil</a></td>

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