<?php
$bildvoll = get_sub_field('news_bild_modul_bild');
$bildlinks = get_sub_field('news_bild_modul_bild_links');
$bildrechts = get_sub_field('news_bild_modul_bild_rechts');
$sizevoll = 'image_1110';
$sizehalb = 'image_540';
?>

<div class="news-image-module">

    <div class="row">

        <?php if(get_sub_field('news_bild_modul_layout') == 'one-column') : ?>
            <div class="col-xs-12">
                <?php echo wp_get_attachment_image($bildvoll, $sizevoll); ?>
            </div>
        <?php endif; ?>

        <?php if(get_sub_field('news_bild_modul_layout') == 'two-column') : ?>
            <div class="col-xs-12 col-sm-6">
                <?php echo wp_get_attachment_image($bildlinks, $sizehalb); ?>
            </div>
            <div class="col-xs-12 col-sm-6">
                <?php echo wp_get_attachment_image($bildrechts, $sizehalb); ?>
            </div>
        <?php endif; ?>

    </div>

</div>