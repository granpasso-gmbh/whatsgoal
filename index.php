<?php get_header(); ?>

<div class="newsroom-overview">

    <?php if(have_posts()) : ?>
    <div class="container">

        <h1><?php _e('Newsroom', 'whatsgoal'); ?></h1>

        <div class="row">

            <?php while(have_posts()) : the_post();

                get_template_part('content');

            endwhile; ?>

        </div>

    </div>
    <?php endif; ?>

</div>

<?php get_footer(); ?>