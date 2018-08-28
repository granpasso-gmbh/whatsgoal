<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to starkers_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?>

<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'starkers' ); ?></p>
<?php
		return;
	endif;
?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>

			<h3 id="comments-title">
			<span>
			<?php
			printf( _n( 'Ein Kommentar', '%1$s Kommentare', get_comments_number(), 'starkers' ),
			number_format_i18n( get_comments_number() ));
			?></span><hr></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav>
		<?php previous_comments_link( __( '&larr; Older Comments', 'starkers' ) ); ?>
		<?php next_comments_link( __( 'Newer Comments &rarr;', 'starkers' ) ); ?>
	</nav>
<?php endif; // check for comment navigation ?>

<?php foreach ($comments as $comment) : ?>
	<?php $comment_type = get_comment_type(); ?>

	<?php if($comment_type == 'comment') { ?>
		<article class="comment" id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar($comment, $size = '64', $default = '' ); ?>
			<div class="commenttext">
				<h4 class="commenttitle">
			<?php comment_author_link() ?> <?php _e('schrieb am'); ?>
			<?php comment_date('j. F, Y') ?> 
					@ <a href="#comment-<?php comment_ID() ?>" title="<?php _e('Permanenter link zu diesem Kommentar'); ?>"><?php comment_time() ?></a>
					<?php edit_comment_link(__("Editieren"), ' &#183; ', ''); ?>
			</h4>
				<?php comment_text() ?>
			</div>
		</article>
	<?php } else { $trackback = true; }/* End of is_comment statement */ ?>
<?php endforeach; /* end for each comment */ ?>

<?php if (isset($trackback) && $trackback == true) { ?>

	<h3>Trackbacks</h3>
		<?php foreach ($comments as $comment) : ?>

			<?php $comment_type = get_comment_type(); ?>
			<?php if($comment_type != 'comment'): ?>
				<article class="comment trackback">
					<?php comment_author_link(); ?>
				</article>

			<?php endif; ?>
		<?php endforeach; ?>

<?php } ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav>
		<?php previous_comments_link( __( '&larr; Older Comments', 'starkers' ) ); ?>
		<?php next_comments_link( __( 'Newer Comments &rarr;', 'starkers' ) ); ?>
	</nav>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	if ( !comments_open() ) :
?>
	<p><?php __( 'Comments are closed.', 'starkers' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>
<p class="clearfix"></p>

<?php  ?>

<?php comment_form(); ?>
