<?='<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?=base_url();?></loc> 
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    <?php foreach($xml as $url): ?>
    <url>
        <loc><?=base_url().$url->seo ?>.html</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>

</urlset>
