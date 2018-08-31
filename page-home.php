<?php 
/*
	Template Name: Startseite
*/
get_header(); ?>

<?php 
$hero_hintergrund = get_field('hero_hintergrund');
$hero_logo = get_field('hero_logo');
$hero_chat_widget = get_field('hero_chat_widget'); ?>

<div class="hero-bg" style="background-image: url('<?php echo $hero_hintergrund; ?>')">
</div>

<section class="hero flex-center-v">
	<div class="logo">
		<img src="<?php echo $hero_logo['url']; ?>" alt="<?php echo $hero_logo['alt']; ?>">
	</div>
	<div class="chat">
		<?php /*<img src="<?php echo $hero_chat_widget['url']; ?>" alt="<?php echo $hero_chat_widget['alt']; ?>"> */ ?>
		<a href="#about" class="scroll">
			<?php the_field('hero_chat_widget_code'); ?>
		</a>
	</div>
	<div class="scroll-down">
		<span></span>
	</div>
</section>

<section class="main">

	<?php if(get_field('save_the_date_headline')) : ?>
	<div class="save-the-date">
		<div class="container">
			<h2 class="with-line"><?php the_field('save_the_date_headline'); ?></h2>
			<div class="bigger-text"><?php the_field('save_the_date_text'); ?></div>
			<div class="the-date">
				<span class="day"><?php the_field('save_the_date_tag'); ?></span>
				<span class="month"><?php the_field('save_the_date_monat'); ?></span>
				<span class="year"><?php the_field('save_the_date_jahr'); ?></span>
			</div><br><br>
			<div class="bigger-text"><p><?php the_field('save_the_date_datum_text'); ?></p></div>
			<div class="email-form">
				<?php // echo do_shortcode('[contact-form-7 id="209" title="Save the date"]'); ?>
				<form action="https://whatsgoal.us17.list-manage.com/subscribe/post?u=1b86b08617c4a005b7702b3b4&amp;id=bcd6c2ce1c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" placeholder="E-Mail Adresse" class="required email" id="mce-EMAIL">
							<input type="submit" value="Senden" name="subscribe" id="mc-embedded-subscribe" class="button">
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
				  	<div style="position: absolute; left: -5000px;" aria-hidden="true">
				  		<input type="text" name="b_1b86b08617c4a005b7702b3b4_bcd6c2ce1c" tabindex="-1" value="">
				  	</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	
	<?php if(is_user_logged_in()) : ?>
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
				<div class="form-intro"><?php the_field('akkordeon_einleitungstext'); ?></div>
				<div class="formular">
					<?php $formcode = get_field('akkordeon_formular'); 
					echo do_shortcode($formcode); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>

	
	<div class="about" id="about">
		<div class="container">
			<h2 class="with-line"><?php the_field('about_headline'); ?></h2>
			<div class="bigger-text"><?php the_field('about_text'); ?></div>
			<div class="row">
				<?php if(have_rows('about_teaser')) :
				while(have_rows('about_teaser')) : the_row();
				$abouticon = get_sub_field('about_teaser_icon'); ?>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<img src="<?php echo $abouticon['url']; ?>" width="105" height="105">
					<?php the_sub_field('about_teaser_text'); ?>
				</div>
				<?php endwhile;
			endif; ?>
			</div>
		</div>
	</div>

	
	<div class="team">
		<div class="container">
			<h2 class="with-line"><?php the_field('team_headline'); ?></h2>
			<div class="bigger-text"><?php the_field('team_text'); ?></div>
			<div class="row">
				<?php if(have_rows('team_teaser')) :
				while(have_rows('team_teaser')) : the_row();
				$teamimage = get_sub_field('team_teaser_bild'); ?>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<img src="<?php echo $teamimage['url']; ?>" width="215" height="215">
					<?php the_sub_field('team_teaser_text'); ?>
					<div class="some-links">
					<?php if(get_sub_field('team_teaser_email')) : ?>
						<a href="mailto:<?php the_sub_field('team_teaser_email'); ?>" title="E-Mail" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icon-mail.svg" width="22" height="18">
						</a>
					<?php endif; ?>
					<?php if(get_sub_field('team_teaser_linkedin')) : ?>
						<a href="<?php the_sub_field('team_teaser_linkedin'); ?>" title="Linkedin" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icon-linkedin.svg" width="18" height="18">
						</a>
					<?php endif; ?>
					<?php if(get_sub_field('team_teaser_xing')) : ?>
						<a href="<?php the_sub_field('team_teaser_xing'); ?>" title="Xing" target="_blank">
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

	<div class="testimonials">
		<div class="container">
			<?php if(have_rows('testimonials_slider')) : ?>
			<div class="swiper-container swiper-container-testimonials">
				<div class="swiper-wrapper">
				<?php while(have_rows('testimonials_slider')) : the_row(); ?>
					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/images/quote-top.svg" width="42" height="30" class="top">
						<div class="text"><p><?php the_sub_field('testimonials_text'); ?></p></div>
						<img src="<?php echo get_template_directory_uri(); ?>/images/quote-bottom.svg" width="42" height="30" class="bottom">
						<div class="name"><?php the_sub_field('testimonials_name'); ?></div>
						<div class="position"><?php the_sub_field('testimonials_position'); ?></div>
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


<?php if(is_user_logged_in()) : ?>
	<?php if(get_field('partner_werden_titel')) : ?>
	<div class="partner-werden collapse-wrapper">
		<div class="collapse-head">
			<h3><?php the_field('partner_werden_titel'); ?></h3>
			<div class="akkordeon-open">
				<?php the_field('partner_werden_linktext'); ?>
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
				<div class="form-intro"><?php the_field('partner_werden_einleitungstext'); ?></div>
				<div class="formular">
					<?php $formcode = get_field('partner_werden_formular');
					echo do_shortcode($formcode); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( get_field('newsroom_headline')) : ?>
	<div class="newsroom">
		<div class="container">
			<h2 class="with-line"><?php the_field('newsroom_headline'); ?></h2>
			<?php if(have_rows('newsroom_artikel')) : ?>
			<div class="row">
				<?php while(have_rows('newsroom_artikel')) : the_row(); ?>
				<div class="col-xs-12 col-sm-12 col-md-4 artikel">
					<?php $artikelbild = get_sub_field('artikel_bild');
					$artikelbild_size = 'image_800'; ?>
					<div class="image">
						<?php if(get_sub_field('artikel_link')) : ?>
							<a href="<?php the_sub_field('artikel_link'); ?>" title="<?php the_sub_field('artikel_titel'); ?>">
								<?php echo wp_get_attachment_image($artikelbild, $artikelbild_size); ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="text">
						<h3><?php the_sub_field('artikel_titel'); ?></h3>
						<p><?php the_sub_field('artikel_text'); ?></p>
						<?php if(get_sub_field('artikel_link')) : ?>
							<a href="<?php the_sub_field('artikel_link'); ?>" title="<?php the_sub_field('artikel_titel'); ?>" target="_blank">
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



<?php get_footer(); ?>