<?php get_header(); ?>

<div class="category-overview">
	<?php if(have_posts()) : ?>
	<div class="container">
		<div class="row">
		<?php while(have_posts()) : the_post(); ?>
			<div class="col-xs-12 col-sm-6">
			<?php get_template_part( 'content', 'category' ); ?>
			</div>
		<?php endwhile; ?>
		</div>
		<?php if (function_exists(wordpress_dev_theme_custom_pagination)) :
			wordpress_dev_theme_custom_pagination($blog_home->max_num_pages,"",$paged);
		endif; ?>
	</div>
	<?php else : ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><?php echo __("No Results"); ?></h2>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>