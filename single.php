<?php get_header(); ?>

<?php // PAGE BUILDER MODULES
if(have_posts()) : ?>

<div class="single-article">

    <?php $herobild = get_field('news_hero_hintergrundbild');
    if($herobild) : ?>
    <div class="news-hero-image" style="background-image: url(<?php echo $herobild; ?>); background-size: cover;">

        <div class="inner">

            <div class="news-hero-title">
                <?php the_field('news_hero_titel'); ?>
            </div>

            <div class="news-hero-subtitle">
                <?php the_field('news_hero_untertitel'); ?>
            </div>

        </div>

    </div>
    <?php endif; ?>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-md-10 col-md-offset-1">

                <div class="nwes-categories">
                    <?php echo get_the_category_list(); ?>
                </div>

                <div class="news-title">
                    <h1><?php the_title(); ?></h1>
                </div>

            </div>

        </div>

        <?php while(have_posts()) : the_post(); ?>

            <?php if(have_rows('news_pagebuilder')) : ?>
                <?php while(have_rows('news_pagebuilder')) : the_row();
                    if(get_row_layout() == 'news_text_modul') :
                        get_template_part( '/page-modules/news-text-modul');
                    elseif(get_row_layout() == 'news_bild_modul') :
                        get_template_part( '/page-modules/news-bild-modul');
                    endif;
                endwhile; ?>
            <?php endif; ?>

            <?php if(have_rows('abteilungen_de') || have_rows('abteilungen_at')) :
                get_template_part( '/page-modules/contact-persons');
            endif; ?>

        <?php endwhile; ?>

        <div class="news-single-footer">
            <p>
                <?php the_field('news_footer_zeile'); ?>
            </p>
            <svg width="20px" height="18px" viewBox="0 0 20 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="desktop_xlarge_1440x_12col" transform="translate(-714.000000, -673.000000)" stroke="#00BFA5">
                        <g id="1-hero">
                            <path d="M724.000552,689.320037 L733.133987,673.5 L714.866063,673.5 L724.000552,689.320037 Z" id="Path"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

    </div>


    <?php
    $currentID = get_the_ID();
    $args = array(
        'posts_per_page' => 3,
        'post__not_in' => array($currentID)
    );
    $query = new WP_Query($args);
    if($query->have_posts()) : ?>

    <div class="news-related-articles">

        <div class="container">

            <h2 class="with-line">
                <?php _e('Weitere Artikel', 'whatsgoal'); ?>
            </h2>

            <div class="row">

                <?php while($query->have_posts()) : $query->the_post(); ?>

                    <div class="col-xs-12 col-sm-12 col-md-4 artikel">

                        <div class="image">
                            <?php if(has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail('image_800'); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="text">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank">
                                <h3><?php the_title(); ?></h3>
                            </a>

                            <p><?php the_field('news_kurzfassung'); ?></p>

                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank">
                                <?php _e('zum Artikel', 'whatsgoal'); ?>
                                <svg width="14px" height="12px" viewBox="0 0 14 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="cta-gruen" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-193.000000, -9.000000)" stroke-linecap="round" stroke-linejoin="round">
                                        <g id="pfeil-gruen" transform="translate(194.000000, 10.000000)" stroke="#00BFA5" stroke-width="2">
                                            <path d="M0,5 L12,5" id="linie"></path>
                                            <polyline id="pfeil" points="7 0 12 5 7 10"></polyline>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

    <?php endif; ?>

    <?php if(get_field('about_save_the_date_headline')) : ?>
        <div class="save-the-date dark">
            <div class="container">

                <h2 class="with-line"><?php the_field('about_save_the_date_headline'); ?></h2>

                <div class="bigger-text"><?php the_field('about_save_the_date_text'); ?></div>

                <div class="the-date">
                    <span class="day"><?php the_field('about_save_the_date_tag'); ?></span>
                    <span class="month"><?php the_field('about_save_the_date_monat'); ?></span>
                    <span class="year"><?php the_field('about_save_the_date_jahr'); ?></span>
                </div><br><br>

                <div class="bigger-text"><p><?php the_field('about_save_the_date_datum_text'); ?></p></div>

                <?php if(get_field('button_1_text')) : ?>

                    <a href="<?php the_field('button_1_link'); ?>" title="<?php the_field('button_1_text'); ?>" class="button-primary">
                        <?php the_field('button_1_text'); ?>
                    </a>

                <?php endif; ?>

                <?php if(get_field('button_2_text')) : ?>

                    <a href="<?php the_field('button_2_link'); ?>" title="<?php the_field('button_2_text'); ?>" class="button-secondary">
                        <?php the_field('button_2_text'); ?>
                    </a>

                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>0

</div>

<?php endif; ?>

<?php get_footer(); ?>