<?php get_header(); ?>

<div class="page-category">
	<?php if(have_posts()) : ?>
	<div class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
		<?php while(have_posts()) : the_post(); ?>
		<div class="row">
			<?php get_template_part( 'content', 'category' ); ?>
		</div>
		<?php endwhile; ?>
		<?php if (function_exists(wordpress_dev_theme_custom_pagination)) :
			wordpress_dev_theme_custom_pagination($blog_home->max_num_pages,"",$paged);
		endif; ?>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>