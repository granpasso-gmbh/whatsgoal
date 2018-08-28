<?php get_header(); ?>

<div class="category-overview">
	<?php if(have_posts()) : ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php /*if(function_exists('bcn_display')) : bcn_display(); endif;*/ ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="blog-overview-header">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
			</div>
		</div>
		<div class="row">
		<?php $c = 0; while(have_posts()) : the_post(); $c++; ?>
			<div class="col-xs-12 col-sm-6">
			<?php get_template_part( '/content', get_post_format() ); ?>
			</div>
			<?php if($c % 2 == 0) : ?>
				</div>
				<div class="row">
			<?php endif; ?>
		<?php endwhile; ?>
		</div>
		<?php if (function_exists(wordpress_dev_theme_custom_pagination)) :
			wordpress_dev_theme_custom_pagination($blog_home->max_num_pages,"33",$paged);
		endif; ?>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>