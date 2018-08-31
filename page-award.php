<?php 
/*
	Template Name: Award
*/
get_header(); ?>

<?php 
$hero_hintergrund = get_field('award_hero_hintergrund');
$hero_logo = get_field('award_hero_logo'); ?>


<div class="hero-bg" style="background-image: url('<?php echo $hero_hintergrund; ?>')">
</div>

<section class="hero flex-center-v">

	<div class="logo">
		<img src="<?php echo $hero_logo['url']; ?>" alt="<?php echo $hero_logo['alt']; ?>" width="300">
	</div>

    <div class="hero__text">
        <?php the_field('award_hero_text'); ?>
    </div>

	<div class="scroll-down">
		<span></span>
	</div>
    

</section>

<section class="main">


    <?php if(get_field('award_intro_headline')) : ?>
    <div class="intro" id="intro">
        <div class="container">
            <h2 class="with-line"><?php the_field('award_intro_headline'); ?></h2>
            <div class="bigger-text"><?php the_field('award_intro_text'); ?></div>
        </div>
    </div>
    <?php endif; ?>


    <?php if(have_rows('award_moderator')) : ?>
        <div class="speaker">
            <div class="container">

                <h2 class="with-line"><?php the_field('award_moderator_headline'); ?></h2>

                <div class="bigger-text"><?php the_field('award_moderator_text'); ?></div>

                <div class="grid">
                    <?php if(have_rows('award_moderator')) :
                        while(have_rows('award_moderator')) : the_row();
                            $moderatorimage = get_sub_field('award_moderator_bild'); ?>
                            <div class="item">

                                <div class="image">
                                    <img src="<?php echo $moderatorimage['url']; ?>" width="215" height="215">
                                </div>

                                <h3>
                                    <?php the_sub_field('award_moderator_name'); ?>
                                </h3>
                                <p>
                                    <?php the_sub_field('award_moderator_position'); ?><br>
                                    <span>
                                        <?php the_sub_field('award_moderator_firma'); ?><br>
                                    </span>
                                </p>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(have_rows('award_speaker')) : ?>
    <div class="speaker">
        <div class="container">

            <h2 class="with-line"><?php the_field('award_speaker_headline'); ?></h2>

            <div class="bigger-text"><?php the_field('award_speaker_text'); ?></div>

            <div class="grid">
                <?php if(have_rows('award_speaker')) :
                    while(have_rows('award_speaker')) : the_row();
                        $speakerimage = get_sub_field('award_speaker_bild'); ?>
                        <div class="item">

                            <div class="image">
                                <img src="<?php echo $speakerimage['url']; ?>" width="215" height="215">
                            </div>

                            <h3>
                                <?php the_sub_field('award_speaker_name'); ?>
                            </h3>
                            <p>
                                <?php the_sub_field('award_speaker_position'); ?><br>
                                <span>
                                    <?php the_sub_field('award_speaker_firma'); ?><br>
                                </span>
                            </p>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <?php if(get_field('award_about_headline')) : ?>
    <div class="about" id="about">
        <div class="container">
            <h2 class="with-line"><?php the_field('award_about_headline'); ?></h2>
            <div class="bigger-text"><?php the_field('award_about_text'); ?></div>
        </div>
    </div>
    <?php endif; ?>


    <div class="testimonials">
        <div class="container">
            <?php if(have_rows('testimonials_slider', 34)) : ?>
                <div class="swiper-container swiper-container-testimonials">
                    <div class="swiper-wrapper">
                        <?php while(have_rows('testimonials_slider', 34)) : the_row(); ?>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/quote-top.svg" width="42" height="30" class="top">
                                <div class="text"><p><?php the_sub_field('testimonials_text', 34); ?></p></div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/quote-bottom.svg" width="42" height="30" class="bottom">
                                <div class="name"><?php the_sub_field('testimonials_name', 34); ?></div>
                                <div class="position"><?php the_sub_field('testimonials_position', 34); ?></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-testimonials"></div>
                <script>
                    testimonialSlider();
                </script>
            <?php endif; ?>
        </div>
    </div>


    <div class="agenda">
        <div class="container">

            <h2 class="with-line"><?php the_field('award_agenda_headline'); ?></h2>

            <div class="bigger-text">
                <?php the_field('award_agenda_text'); ?>
            </div>

            <?php if(have_rows('award_agenda')) : ?>

                <h3 class="agenda__table-title">
                    <?php the_field('award_agenda_headline_tabelle'); ?>
                </h3>

                <?php while(have_rows('award_agenda')) : the_row(); ?>
                    <div class="row">

                        <div class="col-xs-12 col-sm-3 col-lg-2">
                            <div class="agenda__time">
                                <?php the_sub_field('award_agenda_zeit'); ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-9 col-lg-5">
                            <div class="agenda__title">
                                <h4><?php the_sub_field('award_agenda_titel'); ?></h4>
                                <strong><?php the_sub_field('award_agenda_untertitel'); ?></strong>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-lg-5">
                            <div class="agenda__text">
                                <?php the_sub_field('award_agenda_beschreibung'); ?>
                            </div>
                        </div>

                    </div>
                <?php endwhile;
            endif; ?>

        </div>

    </div>


    <div class="partner">
        <div class="container">
            <h2 class="with-line"><?php the_field('partner_headline'); ?></h2>
            <div class="wrapper">
                <?php if(have_rows('partner_logos')) :
                    while(have_rows('partner_logos')) : the_row();
                        $partner_logo = get_sub_field('partner_logo'); ?>

                        <?php if(get_sub_field('partner_link')) : ?>
                            <a href="<?php the_sub_field('partner_link'); ?>" title="Zur Partner Seite" target="_blank">
                        <?php endif; ?>
                            <img src="<?php echo $partner_logo['url']; ?>">
                        <?php if(get_sub_field('partner_link')) : ?>
                            </a>
                        <?php endif; ?>

                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>


    <div class="slideshow">
        <div class="container">

            <h2 class="with-line"><?php the_field('award_slideshow_headline'); ?></h2>

            <div class="bigger-text">
                <?php the_field('award_slideshow_text'); ?>
            </div>

            <?php
            $images = get_field('award_slideshow');
            $size = 'slideshow';
            if( $images ): ?>
                <div class="swiper-container swiper-container-slideshow">

                    <div class="swiper-wrapper">

                        <?php foreach( $images as $image ): ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="swiper-pagination swiper-pagination-slideshow"></div>

                </div>
                <script>
                    slideshowSlider();
                </script>
            <?php endif; ?>

        </div>
    </div>


    <?php if(get_field('award_location_headline')) : ?>
    <div class="location">
        <div class="container">

            <h2 class="with-line"><?php the_field('award_location_headline'); ?></h2>

            <div class="bigger-text">
                <?php the_field('award_location_text'); ?>
            </div>

            <div id="map"></div>

            <script>
                var map;
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 51.21480629999999, lng: 6.818319299999985},
                        zoom: 14
                    });

                    var image = 'https://whatsgoal.de/wp-content/themes/wordpress-dev-theme/images/marker.png';
                    var beachMarker = new google.maps.Marker({
                        position: {lat: 51.21480629999999, lng: 6.818319299999985},
                        map: map,
                        icon: image
                    });

                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHUgCfpGKukeuQeG6ujLxGPgTWMyOg3rQ&callback=initMap" async defer></script>
        </div>
    </div>
    <?php endif; ?>


    <?php if(get_field('award_eventbrite_snippet')) : ?>
        <div class="eventbrite" id="tickets">
            <div class="container">

                <h2 class="with-line"><?php the_field('award_eventbrite_headline'); ?></h2>

                <div class="bigger-text">
                    <?php the_field('award_eventbrite_text'); ?>
                </div>

                <?php the_field('award_eventbrite_snippet'); ?>

            </div>
        </div>
    <?php endif; ?>




<?php get_footer(); ?>