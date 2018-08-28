<div class="col-xs-12 col-sm-12 col-md-4 artikel">
    <div class="image">
        <?php if(has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="text">
        <h3><?php the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>

        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank">
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
    </div>
</div>