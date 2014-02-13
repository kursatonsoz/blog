<?=$ust ?>
<section>
        <div class="section-container">

            <h3 class="post-title"><?=$yazi -> baslik ?></h3>
           <p>
           	<?=$yazi -> icerik ?>
           </p>
            <div class="section-footer clearfix">
                 <?=$func->kateg($yazi->id)?>

            </div>
            <div class="comments">
                <div class="comment">
                    <div class="avatar"><img src="/resimler/avatar.jpg" alt="Avatar"></div>
                    <a href="/"><h5> Kürşat Önsöz</h5></a>
                    <span class="comment-date">
                    	<time pubdate datetime="<?=$func -> tarih_cevir3($yazi -> tarih) ?>" title="<?=$func -> tarih_cevir2($yazi -> tarih) ?>"><?=$func -> tarih_cevir2($yazi -> tarih) ?></time>
                    	
                    </span>
                </div>
            </div>
        </div>
</section>