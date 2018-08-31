<?php
add_action('after_setup_theme', 'wordpress_dev_theme_setup');
if (!function_exists('wordpress_dev_theme_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     * To override wordpress_dev_theme_setup() in a child theme, add your own wordpress_dev_theme_setup to your child theme's
     * functions.php file.
     *
     */
    function wordpress_dev_theme_setup()
    {
        /* Make wordpressdevtheme available for translation.
        * Translations can be added to the /languages/ directory.
        * If you're building a theme based on wordpressdevtheme, use a find and replace
        * to change 'wordpress_dev_theme' to the name of your theme in all the template files.
        */
        load_theme_textdomain('wordpress_dev_theme', get_template_directory() . '/languages');
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file))
            require_once($locale_file);
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }
endif; // wordpress_dev_theme_setup


// MENU AREAS
function wordpress_dev_theme_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Haupt-Navigation', 'wordpress_dev_theme')
        )
    );
}

add_action('init', 'wordpress_dev_theme_menus');


// IMAGE SIZES
add_action('init', 'remove_then_add_image_sizes');
function remove_then_add_image_sizes()
{
    remove_image_size('thumbnail');
    remove_image_size('medium');
    remove_image_size('small');
    remove_image_size('large');
    add_image_size('image_300', 300);
    add_image_size('image_400', 400);
    add_image_size('image_500', 500);
    add_image_size('image_600', 600);
    add_image_size('image_800', 800);
    add_image_size('image_1000', 1000);
    add_image_size('image_1800', 1800);
    add_image_size('galery_small', 255, 180);
    add_image_size('galery_large', 850, 600);
    add_image_size('slideshow', 1110, 720);
}


// POST HEADER
function wordpress_dev_theme_the_post_header()
{
    global $post;
    $taxonomy = 'category';
    $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $separator = ' '; ?>
    <div class="entry-header">
        <div class="entry-meta">
            <?php echo get_avatar(get_the_author_meta('ID'), 45); ?><span
                    class="author-name"><?php _e('From:', 'wordpress_dev_theme'); ?> <strong><a
                            href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a></strong></span>
            <span class="date"> &bull; <?php the_time('d.m.Y'); ?></span>
        </div>
        <ul class="categories">
            <?php if (!empty($post_terms) && !is_wp_error($post_terms)) :
                $term_ids = implode(', ', $post_terms);
                $terms = wp_list_categories('title_li=&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids);
                $terms = rtrim(trim(str_replace('<br />', $separator, $terms)), $separator);
                echo $terms;
            endif; ?>
        </ul>
        <h1><?php the_title(); ?></h1>
        <div class="image-container">
            <?php if (has_post_thumbnail()) : ?>
                <figure class="featured-image">
                    <?php the_post_thumbnail(); ?>
                </figure>
            <?php endif; ?>
        </div>
    </div>
<?php }


// POST FOOTER
function wordpress_dev_theme_the_post_footer()
{ ?>
    <div class="entry-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?php if (get_the_tag_list()) : ?>
                    <div class="tags">
                        <?php echo get_the_tag_list('<span class="tags-title">Tags </span><ul class="tags"><li>', '</li><li>', '</li></ul>'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php }


// SIDEBARS
function wordpress_dev_theme_widgets_init()
{
    register_sidebar(array(
        'name' => __('Footer Widget', 'wordpress_dev_theme'),
        'id' => 'footer-widget',
        'description' => __('Erste Footer Spalte', 'wordpress_dev_theme'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'wordpress_dev_theme_widgets_init');


// Make Textwidgets Shortcode ready
add_filter('widget_text', 'do_shortcode');


/** Script Queue */
if (!is_admin()) add_action("wp_enqueue_scripts", "wordpress_dev_theme_script_enqueue", 11);
function wordpress_dev_theme_script_enqueue()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", array(), '2.1.1', false);
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '4.1.1');
    wp_register_script('bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '4.1.1', false);
    wp_register_script('modernizr-script', get_template_directory_uri() . '/js/min/modernizr-custom.js', array(), '3.5.0', false);
    wp_register_style('wordpressdevtheme-style', get_stylesheet_uri(), array(), '1.0', false);
    wp_register_script('wordpressdevtheme-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', false);
    wp_register_script('wordpressdevtheme-swiper-script', get_template_directory_uri() . '/js/swiper.min.js', array(), '3.3.1', false);
    wp_register_script('wordpressdevtheme-slider-script', get_template_directory_uri() . '/js/slider.js', array(), '1.0', false);
    wp_register_style('swiper-style', get_template_directory_uri() . '/css/swiper.min.css', array(), '3.0.6');

    wp_enqueue_script('jquery');

    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap-script');
    wp_enqueue_script('modernizr-script');
    wp_enqueue_style('wordpressdevtheme-style');
    wp_enqueue_script('wordpressdevtheme-script');
    wp_enqueue_script('wordpressdevtheme-swiper-script');
    wp_enqueue_script('wordpressdevtheme-slider-script');
    wp_enqueue_style('swiper-style');
}


/* Pagination */
function wordpress_dev_theme_custom_pagination($numpages = '', $pagerange = '', $paged = '')
{

    if (empty($pagerange)) {
        $pagerange = 5;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default queries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if (!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'total' => $numpages,
        'current' => $paged,
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 8,
        'prev_next' => true,
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'type' => 'plain',
        'add_args' => false,
        'add_fragment' => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='navigation pagination'>";
        echo "<div class='nav-links'>";
        //*echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
        echo $paginate_links;
        echo "</div>";
        echo "</nav>";
    }

}


// WYSIWYG styles
add_filter('mce_buttons_2', 'fb_mce_editor_buttons');
function fb_mce_editor_buttons($buttons)
{

    array_unshift($buttons, 'styleselect');
    return $buttons;
}

function my_mce_before_init_insert_formats($init_array)
{
    $style_formats = array(
        array(
            'title' => 'Grüner Text',
            'inline' => 'span',
            'classes' => 'green-text',
            'wrapper' => false,
        )
    );
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');


// ALLOW SVG IN MEDIA UPLOAD
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');