<article class="overview">
	<?php if (has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<figure><?php the_post_thumbnail(); ?></figure>
	</a>
	<?php endif; ?>
	<div class="entry-meta">
		<?php echo get_avatar( get_the_author_meta( 'ID' ) , 45 ); ?><span class="author-name">From: <strong><?php the_author(); ?></strong><span>
		<span class="date"> &bull; <?php the_time('d.m.Y'); ?></span>
	</div>
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p><?php the_excerpt(); ?></p>
	<div class="entry-footer">
		<?php
		$taxonomy = 'category';

		// get the term IDs assigned to post.
		$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
		// separator between links
		$separator = ' ';

		if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

			$term_ids = implode( ', ' , $post_terms );
			$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
			$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

			// display post categories
			echo  $terms;
		} ?>
	</div>
</article>