<?php 
/*
	Template Name: Neue Startseite
*/
get_header(); ?>

<?php $hero_logo = get_field('new_page_hero_logo');?>


<?php if(have_rows('new_page_hero_hintergrund_slider')) : ?>
<div class="swiper-container swiper-hero hero-bg">
    <div class="swiper-wrapper">
        <?php while(have_rows('new_page_hero_hintergrund_slider')) : the_row();
        $hero_hintergrund = get_sub_field('new_page_hero_hintergrund_slide'); ?>
        <div class="swiper-slide">
            <div class="img-object-fit">
                <?php echo wp_get_attachment_image($hero_hintergrund, 'full'); ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<script>
    var swiperClass = ".swiper-hero";
    var swiper = new Swiper(swiperClass, {
        spaceBetween: 0,
        loop: true,
        effect: 'fade',
        autoplay: {
            delay: 5000,
        },
    });
</script>
<?php endif; ?>


<section class="hero flex-center-v">

    <div class="logo">
        <img src="<?php echo $hero_logo['url']; ?>" alt="<?php echo $hero_logo['alt']; ?>" width="300">
    </div>

    <div class="hero__text">
        <?php the_field('new_page_hero_text'); ?>
    </div>

	<div class="scroll-down">
		<span></span>
	</div>

</section>

<section class="main">

    <?php if(get_field('meetup_intro_headline')) : ?>
        <div class="intro">
            <div class="container">
                <h2 class="with-line"><?php the_field('meetup_intro_headline'); ?></h2>
                <div class="intro__text bigger-text">
                    <?php the_field('meetup_intro_text'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(get_field('new_page_intro_headline')) : ?>
        <div class="intro">
            <div class="container">
                <h2 class="with-line"><?php the_field('new_page_intro_headline'); ?></h2>
                <div class="bigger-text">
                    <?php the_field('new_page_intro_text'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(have_rows('new_page_slideshow')) : ?>
        <div class="gallery-preview">
            <div class="container">
                <h2 class="with-line"><?php the_field('new_page_slideshow_headline'); ?></h2>

                <div class="swiper-container swiper-slideshow">
                    <div class="swiper-wrapper">
                        <?php while(have_rows('new_page_slideshow')) : the_row();
                            $slideshow_slide = get_sub_field('new_page_slideshow_image'); ?>
                            <div class="swiper-slide">
                                <?php echo wp_get_attachment_image($slideshow_slide, 'full'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <script>
                    var swiperClass = ".swiper-slideshow";
                    var swiper = new Swiper(swiperClass, {
                        spaceBetween: 0,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                        },
                    });
                </script>

                <div class="gallery-preview__cta">
                    <a href="<?php the_field('new_page_slideshow_button_link'); ?>" title="<?php the_field('new_page_slideshow_button_text'); ?>" class="button-secondary" target="_blank">
                        <?php the_field('new_page_slideshow_button_text'); ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php/* if(get_field('impressionen_headline')) : ?>
        <div class="impressions" id="impressions">
            <div class="container">
                <h2 class="with-line"><?php the_field('impressionen_headline'); ?></h2>

                <div class="bigger-text"><?php the_field('impressionen_text'); ?></div>

                <?php $galery_images = get_field('impressionen_galerie');
                $size_small = 'galery_small';
                $size_large = 'galery_large';
                if( $galery_images ): ?>
                    <div class="gallery">
                        <ul>
                            <?php foreach( $galery_images as $galery_image ): ?>
                                <li class="gallery__item">
                                    <?php $image_attributes = wp_get_attachment_image_src( $galery_image['ID'], $size_large ); ?>
                                    <a href="<?php echo $image_attributes[0]; ?>" class="gallery_itemLink" data-rel="aiLightbox">
                                        <div class="img-object-fit">
                                            <?php echo wp_get_attachment_image( $galery_image['ID'], $size_small, array('class', 'gallery__itemThumb') ); ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <script src="<?php echo get_template_directory_uri(); ?>/js/Swipe.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/slideshow.js"></script>
        <script >
            var lb = new Lightbox({
                selector: '[data-rel="aiLightbox"]', // string
                lazyload: true, // boolean
                arrows: true, // boolean
                counter: true, // boolean
                slideSpeed: 500 });
        </script>
    <?php endif; */?>


    <?php if(get_field('new_page_form_text')) : ?>
        <div class="intro bg-light-grey">
            <div class="container">
                <div class="intro__text bigger-text">
                    <?php the_field('new_page_form_text'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(get_field('akkordeon_titel')) : ?>
        <div class="akkreditierung collapse-wrapper">
            <div class="collapse-head">
                <h3><?php the_field('akkordeon_titel'); ?></h3>
                <div class="akkordeon-open">
                    <?php the_field('akkordeon_linktext'); ?>
                    <svg width="20px" height="17px" viewBox="0 0 20 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="desktop_xlarge_1440x_12col" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-815.000000, -2334.000000)" stroke-linecap="round" stroke-linejoin="round">
                            <g id="3a-cta_banner" transform="translate(0.000000, 2285.000000)" stroke="#FFFFFF" stroke-width="2">
                                <g id="akkordion_teaser">
                                    <g id="cta" transform="translate(435.000000, 43.000000)">
                                        <g id="pfeil-weiss" transform="translate(381.000000, 7.000000)">
                                            <path d="M0,7.5 L18,7.5" id="linie"></path>
                                            <polyline id="pfeil" points="10.5 0 18 7.5 10.5 15"></polyline>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="collapse-content">
                <div class="inner">
                    <div class="collapse-intro"><?php the_field('akkordeon_einleitungstext'); ?></div>
                    <div class="formular">
                        <?php $formcode = get_field('akkordeon_formular');
                        echo do_shortcode($formcode); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="social-media-feed">
        <div class="container">
            <h2 class="with-line"><?php the_field('social_media_feed_headline', 34); ?></h2>
            <?php the_field('social_media_feed', 34); ?>
        </div>
    </div>




<?php get_footer(); ?>