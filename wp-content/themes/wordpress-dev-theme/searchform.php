<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo esc_attr_x( 'Search', 'wordpress_dev_theme' ) ?>" title="<?php echo esc_attr_x( 'Search', 'label', 'wordpress_dev_theme' ); ?>" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'wordpress_dev_theme' ); ?></span></button>
</form>