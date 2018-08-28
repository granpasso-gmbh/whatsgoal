<?php 
/*
	Template Name: Über Uns
*/
get_header(); ?>

<?php 
$hero_hintergrund = get_field('about_hero_hintergrund');
$hero_logo = get_field('about_hero_logo');
$hero_chat_widget = get_field('about_hero_chat_widget'); ?>

<div class="hero-bg" style="background-image: url('<?php echo $hero_hintergrund; ?>')">
</div>

<section class="hero">
	<div class="logo">
		<img src="<?php echo $hero_logo['url']; ?>" alt="<?php echo $hero_logo['alt']; ?>">
	</div>
	<div class="chat">
		<?php /*<img src="<?php echo $hero_chat_widget['url']; ?>" alt="<?php echo $hero_chat_widget['alt']; ?>"> */ ?>
		<a href="#about" class="scroll">
			<?php the_field('about_hero_chat_widget_code'); ?>
		</a>
	</div>
	<div class="scroll-down">
		<span></span>
	</div>
</section>

<section class="main">


    <div class="about" id="about">
        <div class="container">
            <h2 class="with-line"><?php the_field('about_about_headline'); ?></h2>
            <div class="bigger-text"><?php the_field('about_about_text'); ?></div>
            <div class="row">
                <?php if(have_rows('about_about_teaser')) :
                    while(have_rows('about_about_teaser')) : the_row();
                        $abouticon = get_sub_field('about_about_teaser_icon'); ?>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <img src="<?php echo $abouticon['url']; ?>" width="105" height="105">
                            <?php the_sub_field('about_about_teaser_text'); ?>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>


    <div class="team">
        <div class="container">
            <h2 class="with-line"><?php the_field('about_team_headline'); ?></h2>
            <div class="bigger-text"><?php the_field('about_team_text'); ?></div>
            <div class="row">
                <?php if(have_rows('about_team_teaser')) :
                    while(have_rows('about_team_teaser')) : the_row();
                        $teamimage = get_sub_field('about_team_teaser_bild'); ?>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <img src="<?php echo $teamimage['url']; ?>" width="215" height="215">
                            <?php the_sub_field('about_team_teaser_text'); ?>
                            <div class="some-links">
                                <?php if(get_sub_field('about_team_teaser_email')) : ?>
                                    <a href="mailto:<?php the_sub_field('about_team_teaser_email'); ?>" title="E-Mail" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-mail.svg" width="22" height="18">
                                    </a>
                                <?php endif; ?>
                                <?php if(get_sub_field('about_team_teaser_linkedin')) : ?>
                                    <a href="<?php the_sub_field('about_team_teaser_linkedin'); ?>" title="Linkedin" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-linkedin.svg" width="18" height="18">
                                    </a>
                                <?php endif; ?>
                                <?php if(get_sub_field('about_team_teaser_xing')) : ?>
                                    <a href="<?php the_sub_field('about_team_teaser_xing'); ?>" title="Xing" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-xing.svg" width="17" height="18">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>


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
	<?php endif; ?>


    <?php if ( get_field('about_newsroom_headline')) : ?>
	<div class="newsroom">
		<div class="container">
			<h2 class="with-line"><?php the_field('about_newsroom_headline'); ?></h2>
			<?php if(have_rows('about_newsroom_artikel')) : ?>
			<div class="row">
				<?php while(have_rows('about_newsroom_artikel')) : the_row(); ?>
				<div class="col-xs-12 col-sm-12 col-md-4 artikel">
					<?php $artikelbild = get_sub_field('about_artikel_bild');
					$artikelbild_size = 'image_800'; ?>
					<div class="image">
						<?php if(get_sub_field('about_artikel_link')) : ?>
							<a href="<?php the_sub_field('about_artikel_link'); ?>" title="<?php the_sub_field('about_artikel_titel'); ?>">
								<?php echo wp_get_attachment_image($artikelbild, $artikelbild_size); ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="text">
						<h3><?php the_sub_field('about_artikel_titel'); ?></h3>
						<p><?php the_sub_field('about_artikel_text'); ?></p>
						<?php if(get_sub_field('about_artikel_link')) : ?>
							<a href="<?php the_sub_field('about_artikel_link'); ?>" title="<?php the_sub_field('about_artikel_titel'); ?>" target="_blank">
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
						<?php endif; ?>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
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