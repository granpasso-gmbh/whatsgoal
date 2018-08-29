            <div class="social-media">
                <div class="container">
                    <h2><?php the_field('social_media_headline', 34); ?></h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/grafik-komp.svg" width="488" height="611" class="bg-left">
                    <ul class="social-media-menu">
                        <?php if(get_field('social_media_facebook', 34)) : ?><li>
                            <a href="<?php the_field('social_media_facebook', 34); ?>" title="Facebook" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/facebook-round.svg" width="50" height="50">
                            </a>
                            </li>
                        <?php endif; ?>
                        <?php if(get_field('social_media_twitter', 34)) : ?><li>
                            <a href="<?php the_field('social_media_twitter', 34); ?>" title="Twitter" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/twitter-round.svg" width="50" height="50">
                            </a>
                            </li>
                        <?php endif; ?>
                        <?php if(get_field('social_media_instagram', 34)) : ?><li>
                            <a href="<?php the_field('social_media_instagram', 34); ?>" title="Instagram" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-round.svg" width="50" height="50">
                            </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/grafik-komp.svg" width="488" height="611" class="bg-right">
                </div>
            </div>

            <div class="contact">
                <div class="container">
                    <h2 class="with-line"><?php the_field('contact_headline', 34); ?></h2>
                    <h3><?php the_field('contact_subline', 34); ?></h3>
                    <div class="contact-form">
                        <?php echo do_shortcode(get_field('contact_formular', 34)); ?>
                    </div>
                </div>
            </div>

        </section>

		<footer>
			<p>© <?php echo date('Y'); ?> Whatsgoal  |  <a href="<?php echo esc_url( home_url( '/' ) ); ?>impressum" title="Impressum" target="_blank">Impressum</a>&nbsp;|&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>datenschutzerklaerung" title="Datenschutzerklärung" target="_blank">Datenschutzerklärung</a></p>
		</footer>

	</div>

<?php wp_footer(); ?>
</body>
</html>