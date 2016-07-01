<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php foreach($course as $model): ?>
        <url>
        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('course/view',array('id'=>$model->id))); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
        </url>
<?php endforeach; ?>

<?php foreach($blog as $model): ?>
        <url>
        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('blog/'.$model->slug)); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
        </url>
<?php endforeach; ?>

<?php foreach($shop as $model): ?>
        <url>
        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('shop/view',array('id'=>$model->id))); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        </url>
<?php endforeach; ?>

<?php foreach($portfolio as $model): ?>
        <url>
        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('portfolio/view',array('id'=>$model->id))); ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>
<?php endforeach; ?>

<?php foreach($users as $model): ?>
        <url>
        <loc><?php echo CHtml::encode($this->createAbsoluteUrl('users/view',array('id'=>$model->id))); ?></loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
        </url>
<?php endforeach; ?>

</urlset>