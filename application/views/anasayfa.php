<?=$ust?>
<?foreach ($yazilar as $yazi):?>

    <section>
        <div class="section-container">

            <h3 class="post-title"><a href="/yazilar/<?=$yazi->seo?>.html"><?=$yazi->baslik?></a></h3>
            <span class="post-date"><?=$func->tarih_cevir($yazi->tarih)?></span>

            <p>
                <?=$yazi->kisa."...";?>
            </p>
           
            <div class="section-footer clearfix">
            	<?=$func->kateg($yazi->id)?>
                <a class="read-more float-right" href="/yazilar/<?=$yazi->seo?>.html"><i class="fa fa-link"></i> Read more...</a>
            </div>
        </div>
    </section>

<?endforeach;?>