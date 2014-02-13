<?='<?xml version="1.0" encoding="UTF-8" ?>' ?>

<rss version="2.0">
    <channel>
        <title>Kürşat Önsöz</title>
        <link><?=base_url();?></link>
        <description>Kürşat Önsöz Kişisel Blog</description>
        <?php foreach($xml as $url): ?>
            <item>
                <title><?=$url->baslik?></title>
                <link><?=base_url().$url->seo ?>.html</link>
                <description><?=$url->baslik?></description>
            </item>
        <?php endforeach; ?>

</rss>