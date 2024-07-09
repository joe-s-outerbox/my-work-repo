<?php

defined('ABSPATH') or die();


/* custom theme include functions */
require_once( __DIR__ . '/inc/px-functions.php');

require_once get_stylesheet_directory() . '/inc/custom-post-types.php';

require_once get_stylesheet_directory() . '/inc/customizer-functions.php';

require_once get_stylesheet_directory() . '/inc/template-tags.php';

require_once get_stylesheet_directory() . '/inc/custom-widgets.php';

require_once get_stylesheet_directory() . '/inc/user-roles.php';

require_once get_stylesheet_directory() . '/inc/wp_bootstrap_navwalker.php';

require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

require_once get_stylesheet_directory() . '/inc/custom-shortcodes.php';

//  Require the plugins upon theme activation
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

// Include all of the required plugins
function my_theme_register_required_plugins() {

    $plugins = array(

        array(
            'name'      => 'AddToAny',
            'slug'      => 'add-to-any',
            'required'  => true,
        ),
        array(
            'name'               => 'Advanced Custom Fields Pro', 
            'slug'               => 'advanced-custom-fields-pro', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', 
            'required'           => true, 
            'force_activation'   => true, 
            'force_deactivation' => false, 
        ),
        array(
            'name'               => 'Akismet', 
            'slug'               => 'akismet', 
            'required'           => true, 
        ),
        array(
            'name'               => 'All in One WP Migration', 
            'slug'               => 'all-in-one-wp-migration', 
            'required'           => false, 
        ),
        array(
            'name'               => 'Black Studio TinyMCE Widget', 
            'slug'               => 'black-studio-tinymce-widget', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Breadcrumb NavXT', 
            'slug'               => 'breadcrumb-navxt', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Column Shortcodes', 
            'slug'               => 'column-shortcodes', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Custom Menu Wizard', 
            'slug'               => 'custom-menu-wizard', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Customizer Export Import', 
            'slug'               => 'customizer-export-import', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Duplicate Post', 
            'slug'               => 'duplicate-post', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Gravity Forms', 
            'slug'               => 'gravityforms', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/gravityforms.zip',
            'required'           => true, 
            'version'            => '', 
            'force_activation'   => true, 
            'force_deactivation' => false, 
        ),
        array(
            'name'               => 'Latest Post Shortcode', 
            'slug'               => 'latest-post-shortcode', 
            'required'           => true, 
        ),
        array(
            'name'               => 'List Custom Taxonomy Widget', 
            'slug'               => 'list-custom-taxonomy-widget', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Post Types Order', 
            'slug'               => 'post-types-order', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Regenerate Thumbnails', 
            'slug'               => 'regenerate-thumbnails', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Search and Replace', 
            'slug'               => 'search-and-replace', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Sitemap', 
            'slug'               => 'sitemap', 
            'required'           => true, 
        ),
        array(
            'name'               => 'SlickNav Mobile Menu', 
            'slug'               => 'slicknav-mobile-menu', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Taxonomy Terms Order', 
            'slug'               => 'taxonomy-terms-order', 
            'required'           => true, 
        ),
        array(
            'name'               => 'Tuxedo Big File Uploads', 
            'slug'               => 'tuxedo-big-file-uploads', 
            'required'           => false, 
        ),
        array(
            'name'               => 'Toolset Types', 
            'slug'               => 'types', 
            'required'           => true, 
        ),
        array(
            'name'               => 'User Role Editor', 
            'slug'               => 'user-role-editor', 
            'required'           => true, 
        ),
        array(
            'name'               => 'User Switching', 
            'slug'               => 'user-switching', 
            'required'           => true,  
        ),
        array(
            'name'               => 'Visual Captcha', 
            'slug'               => 'visualcaptcha', 
            'required'           => false, 
        ),
        array(
            'name'               => 'WaspThemes Yellow Pencil', 
            'slug'               => 'waspthemes-yellow-pencil', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/waspthemes-yellow-pencil.zip',
            'required'           => true, 
            'version'            => '', 
            'force_activation'   => true, 
            'force_deactivation' => false,
        ),
        array(
            'name'               => 'WooSidebars', 
            'slug'               => 'visualcaptcha', 
            'required'           => true, 
        ),
        array(
            'name'               => 'WP Fastest Cache', 
            'slug'               => 'wp-fastest-cache', 
            'required'           => false, 
        ),

        
        // <snip />
    );

    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            // <snip>...</snip>
            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
        */
    );

    tgmpa( $plugins, $config );

}

// Make sure featured images are enabled
add_theme_support('post-thumbnails');

// Add featured image sizes
add_image_size('project-thumb', 350, 275, true); // width, height, crop
add_image_size('leadership-thumb-default', 200, 250, true); // width, height, crop
add_image_size('leadership-thumb-alterative', 223, 223, true); // width, height, crop
add_image_size('news-thumb', 192, 192, true); // width, height, crop
add_image_size('offer-thumb', 482, 160, true); // width, height, crop
add_image_size('sidebar-offer-thumb', 255, 128, true); // width, height, crop
add_image_size('award-logo', 150, 150, false); // width, height, crop
add_image_size('checkers-img', 683, 480, true); // width, height, crop
add_image_size('pathway-image', 360, 149, true); // width, height, crop
add_image_size('pathway-thumb', 250, 100, true); // width, height, crop
add_image_size('careers-bg', 1366, 550, true); // width, height, crop
add_image_size('client-logo-slide', 130, 130, false); // width, height, crop
add_image_size('dl-cover', 150, 200, false); // width, height, crop

// inject the dynamic styles into the theme
function jpt_add_dynamic_styles()
{
    include_once get_stylesheet_directory() . '/inc/dynamic-styles.php';
}
add_action('wp_footer', 'jpt_add_dynamic_styles'); // applies dynamic styles to the front end
add_action('customize_controls_enqueue_scripts', 'jpt_add_dynamic_styles'); // applies the same styles to the customizer so they can see changes live

// add any extra scripts or styles
function jpt_custom_scripts()
{
    wp_enqueue_script('custom-ajax', get_stylesheet_directory_uri() . '/js/jpt.custom.js', array(), rand(1, 9999), true);
    wp_enqueue_script('js-scroll', get_stylesheet_directory_uri() . '/js/jquery.jscroll.min.js', array(), '1.0.0', false);
    //wp_enqueue_style( 'jpt-parent-style', get_template_directory_uri() . '/style.css', '', '' );
    if (!is_front_page()) {
        wp_enqueue_script('jpt-plugins', get_stylesheet_directory_uri() . '/js/plugins.jquery.js', array(), rand(1, 9999), false);
    }
    //wp_enqueue_style( 'flex-slider', get_stylesheet_directory_uri() . '/css/flexslider.css' );
    wp_enqueue_style('bs-select-css', get_stylesheet_directory_uri() . '/css/bootstrap-select.min.css');
    wp_enqueue_style('px-main', get_stylesheet_directory_uri() . '/css/px-main.css', array(), filemtime( get_template_directory() . '/css/px-main.css' ) );
    wp_enqueue_script('px-js', get_stylesheet_directory_uri() . '/js/px-main.js', array(), filemtime( get_template_directory() . '/js/px-main.js' ) );
}
add_action('wp_enqueue_scripts', 'jpt_custom_scripts', 666);

function jpt_mobile_last()
{
    wp_enqueue_style('mobile-css', get_stylesheet_directory_uri() . '/mobile.css', '', rand(1, 9999), true);
}
add_action('wp_enqueue_scripts', 'jpt_mobile_last', 666);

/* misc. extra functions */

function jpt_new_excerpt_more($more)
{
    return '... <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read&nbsp;More', 'jptframework') . '</a>';
}
add_filter('excerpt_more', 'jpt_new_excerpt_more', 20);

function jpt_add_support()
{
    @add_theme_support('custom-logo', 'excerpt');
}
@add_action('init', 'jpt_add_support');


add_action('wp_footer', 'jpt_button_action_time', 9999);
function jpt_button_action_time()
{

    // try to get our dynamic class name on all buttons to make them...dynamic
    echo '<script>jQuery("button span.screen-reader-text, button:not(.navbar-toggle), .btn").addClass("btn-default"); </script>';
}

add_action('wp_header', 'kill_very_bad_svg', 9999);
function kill_very_bad_svg()
{
    remove_action('wp_footer', 'twentyseventeen_include_svg_icons', 9999);
    remove_action('init', 'twentyseventeen_get_svg');
    remove_filter('wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3);
    remove_filter('nav_menu_item_title', 'twentyseventeen_dropdown_icon_to_menu_link', 10, 4);
}
// twentyseventeen_get_svg function isn't added to any action so php can't do much to kill it
// there is a style to hide them also in style.css under svg.icon




// register some of our extra functions for the child theme framework


function jpt_framework_setup()
{
    register_nav_menus(array(
        'top'    => __('Top Menu', 'jptframework'),
        'left'    => __('Left Menu', 'jptframework'),
        'utility' => __('Utility Menu', 'jptframework'),
        'footer'  => __('Footer Menu', 'jptframework'),
        'socials'  => __('Social Links', 'jptframework'),
    ));

    unregister_nav_menu('social'); // don't use 2017's social menu - we're using the cusotmizer instead
}

add_action('after_setup_theme', 'jpt_framework_setup', 20);


// Register default sisdebar

add_action('widgets_init', 'theme_slug_widgets_init');
function theme_slug_widgets_init()
{
    register_sidebar(array(
        'name' => __('Default Sidebar', 'default-sidebar'),
        'id' => 'default-sidebar',
        'description' => __('Widgets in this area will be shown on all pages.', 'theme-slug'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Blog Sidebar', 'blog-sidebar'),
        'id' => 'blog-sidebar',
        'description' => __('Widgets in this area will be shown on blog page.', 'theme-slug'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Case Studies Sidebar', 'cs-sidebar'),
        'id' => 'cs-sidebar',
        'description' => __('Widgets in this area will be shown on Case Studies pages.', 'theme-slug'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name' => __('Promo Banner', 'global-promo'),
      'id' => 'global-promo',
      'description' => __('Widgets in this area will be shown in the Global Promo Banner.', 'theme-slug'),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => '',
  ));
}



// comment text field at bottom of other fields, ie name, email, etc
function wpb_move_comment_field_to_bottom($fields)
{

    //comment box to bottom
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;

    // ...visual capcha below it
    $ydo_capcha = $fields['namespace'];
    unset($fields['namespace']);
    $fields['namespace'] = $ydo_capcha;

    return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');


if (! function_exists('get_page_id_by_template')) {
    function get_page_id_by_template($template_name = '')
    {
        if (empty($template_name)) {
            return false;
        }

        $args  = [
            'post_type'  => 'page',
            'fields'     => 'ids',
            'nopaging'   => true,
            'meta_key'   => '_wp_page_template',
            'meta_value' => $template_name,
        ];
        $pages = get_posts($args);

        return array_shift($pages);
    }
}

//Allow tags in category description
$filters = array( 'pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description' );
foreach ($filters as $filter) {
    remove_filter($filter, 'wp_filter_kses');
}
function get_id_by_slug($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}


    class BS_Page_Walker extends Walker_Page
    {
        public function start_lvl(&$output, $depth = 0, $args = array())
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class='sub-menu' role='menu'>\n";
        }

        public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0)
        {
            if ($depth) {
                $indent = str_repeat("\t", $depth);
            } else {
                $indent = '';
            }

            $css_class = array( 'page_item', 'page-item-' . $page->ID );

            if (isset($args['pages_with_children'][ $page->ID ])) {
                $css_class[] = 'page_item_has_children';
            }

            if (! empty($current_page)) {
                $_current_page = get_post($current_page);
                if (in_array($page->ID, $_current_page->ancestors)) {
                    $css_class[] = 'current_page_ancestor';
                }
                if ($page->ID == $current_page) {
                    $css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID == $_current_page->post_parent) {
                    $css_class[] = 'current_page_parent';
                }
            } elseif ($page->ID == get_option('page_for_posts')) {
                $css_class[] = 'current_page_parent';
            }

            /**
             * Filter the list of CSS classes to include with each page item in the list.
             *
             * @since 2.8.0
             *
             * @see wp_list_pages()
             *
             * @param array   $css_class    An array of CSS classes to be applied
             *                             to each list item.
             * @param WP_Post $page         Page data object.
             * @param int     $depth        Depth of page, used for padding.
             * @param array   $args         An array of arguments.
             * @param int     $current_page ID of the current page.
             */
            $css_classes = implode(' ', apply_filters('page_css_class', $css_class, $page, $depth, $args, $current_page));

            if ('' === $page->post_title) {
                $page->post_title = sprintf(__('#%d (no title)'), $page->ID);
            }

            $args['link_before'] = empty($args['link_before']) ? '' : $args['link_before'];
            $args['link_after'] = empty($args['link_after']) ? '' : $args['link_after'];

            /** This filter is documented in wp-includes/post-template.php */
            if (isset($args['pages_with_children'][ $page->ID ])) {
                $output .= $indent . sprintf(
                    '<li class="%s"><a href="%s">%s%s%s</a>&nbsp;&nbsp;&nbsp;<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-caret-right" aria-hidden="true"></i></a>',
                    $css_classes,
                    get_permalink($page->ID),
                    $args['link_before'],
                    apply_filters('the_title', $page->post_title, $page->ID),
                    $args['link_after']
                );
            } else {
                $output .= $indent . sprintf(
                    '<li class="%s"><a href="%s">%s%s%s</a>',
                    $css_classes,
                    get_permalink($page->ID),
                    $args['link_before'],
                    apply_filters('the_title', $page->post_title, $page->ID),
                    $args['link_after']
                );
            }


            if (! empty($args['show_date'])) {
                if ('modified' == $args['show_date']) {
                    $time = $page->post_modified;
                } else {
                    $time = $page->post_date;
                }

                $date_format = empty($args['date_format']) ? '' : $args['date_format'];
                $output .= ' ' . mysql2date($date_format, $time);
            }
        }
    }


function smcs_list_child_pages($post)
{ 
    $customoutput = '';
    global $parent;
    global $lastNum;
    global $post;
    $jpt_leadership_parent = get_theme_mod('jpt_leadership_section_parent');
    $leadershipparent = get_id_by_slug($jpt_leadership_parent);
    $parent  = array();
    $parent  = get_post_ancestors($post->ID);
    $lastNum = end($parent);

    $about_us_id = 159; //about us
    $insights_id = 195; //insight landing
    $careers_id = 345; //careers landing
    
    if (is_home() || is_search()/* || is_singular('post')*/) { 
        return;

    } elseif (is_singular('leadership') && $leadershipparent) {
        $customoutput = true;
        $parent_link  = get_page_link($leadershipparent);
        $parent_title = get_the_title($leadershipparent);
        $child_of = $leadershipparent;

    } elseif ($post->ID == $careers_id || in_array($careers_id, get_post_ancestors($post->ID)) || is_singular('position')) {
        $parent_link  = get_page_link($careers_id);
        $parent_title = get_the_title($careers_id);
        $child_of = $careers_id;

    } elseif (is_singular('library')) {
        $parent_link  = get_page_link($insights_id);
        $parent_title = get_the_title($insights_id);
        $child_of = $insights_id;

    } elseif (is_single() && (has_category('news', $post) || is_singular('case-study'))){
        $parent_link  = get_page_link($about_us_id);
        $parent_title = get_the_title($about_us_id);
        $child_of = $about_us_id;

    } elseif (is_archive()){

        $query_obj = get_queried_object();
        if( !empty($query_obj) && isset($query_obj->taxonomy) && in_array($query_obj->taxonomy, array('service', 'industry')) ){
            $parent_link  = get_page_link($about_us_id);
            $parent_title = get_the_title($about_us_id);
            $child_of = $about_us_id;
        }

    } elseif (count(get_post_ancestors($post->ID)) == 2 && $post->post_parent) { 
        $parent_link  = get_page_link($lastNum);
        $parent_title = get_the_title($lastNum);
        $child_of = $lastNum;

    } elseif (is_page() && $post->post_parent) {
        $parent_link  = get_page_link($post->post_parent);
        $parent_title = get_the_title($post->post_parent);
        $child_of = $post->post_parent;

    } else {
        $parent_link  = get_page_link($post->ID);
        $parent_title = get_the_title($post->ID);
        $child_of = $post->ID;
    }

    $childpages = wp_list_pages(array(
        'title_li' => '',
        'sort_column' => 'menu_order',
        'child_of' => $child_of,
        'echo' => '0',
        'walker' => new BS_Page_Walker(),
    ));

    if ($childpages) {
        if ($post->post_parent == 0) {
            $is_parent_current = 'current_page_item';
        }
        $string = '<div class="sidebar-box"><span class="h2"><a href="' . $parent_link . '">' . $parent_title . '</a></span><ul class="sidebar-links">' . $childpages . '</ul></div>';
    } else {
        if ($customoutput != '') {
            $string = '<div class="sidebar-box"><h2><a href="' . $parent_link . '">' . $parent_title . '</a></h2></div>';
        } elseif (is_singular('government') || is_singular('higher_education') || is_singular('institutional') || is_singular('commercial')) {
            $string = ''; // don't show the page title on these
        } else {
            $string = '<div class="sidebar-box"><h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2></div>';
        }
    }

    return $string;
}

add_shortcode('smcs_childpages', 'smcs_list_child_pages');

function get_excerpt($limit, $source = null)
{
    if ($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt())) {
        ;
    }
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';

    return $excerpt;
}

if (! function_exists('responsive_wp_get_attachment_image')) :
    function responsive_wp_get_attachment_image($att_id, $size = 'project-thumb', $attr = array())
    {
        return preg_replace('/(width|height)="\d*"\s/', "", wp_get_attachment_image($att_id, $size, false, $attr));
    }

endif;

function responsive_wp_get_attachment_image_src($att_id, $size = 'project-thumb', $attr = array())
{
    $img = wp_get_attachment_image_src($att_id, $size, false, $attr);

    return $img[0];
}


function ajax_load_posts()
{
    if (isset($_GET['ajax-posts'])) :
        if (have_posts()) :
            while (have_posts()) : the_post();
    get_template_part('blocks/post-item');
    endwhile;
    if (get_next_posts_link()) : ?>
                <div class="load-more">
                    <a href="<?php echo add_query_arg('ajax-posts', 1, get_next_posts_page_link()); ?>"
                       class="btn load-btn"><?php _e('load more', 'jptframework'); ?></a>
                </div>
			<?php endif;
    endif;
    exit();
    endif;
}

add_action('wp', 'ajax_load_posts');
function ajax_load_projecct_data()
{
    if (isset($_GET['ajax-portfolio'])) {
        $exclude_taxonomies = array( 'government_cat', 'higher_education_cat' );
        $taxonomies         = get_object_taxonomies($_GET['mainFilter']);
        $taxonomies         = array_diff($taxonomies, $exclude_taxonomies);
        if ($_GET['ajax-portfolio'] == 'filters') {
            ?>
            <div class="filters-target-container">
                <div class="load-filters-container">
                    <!-- filter area -->
                    <div style="clear:both;"></div>
                    <div class="filter-area alt proejct-subfilter ajax-filter-container">
                        <div class="inner">
                            <div class="row">
								<?php foreach ($taxonomies as $tax) :
                                    $current_tax = get_taxonomy($tax);
            $terms = get_terms($tax);
            if ($terms) : ?>
                                        <div class="input-group">
                                            <select name="<?php echo $tax; ?>"
                                                    class="js-sub-filter selectpicker btn btn-default btn-orange">
                                                <option value="none"
                                                        class="hideme"><?php echo strtoupper($current_tax->labels->name); ?></option>
												<?php foreach ($terms as $term) : ?>
                                                    <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                        </div>
									<?php endif;
            endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter-list">
                        <div class="filtered-option">
                            <h5 class="pull-left"><?php _e('FILTERS:', 'jptframework'); ?></h5>
                            <ul class="js-filters-marks-container">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		<?php
        } elseif ($_GET['ajax-portfolio'] == 'filter-items') {
            $tax_query = array();
            foreach ($taxonomies as $tax) :
                if (isset($_GET[ $tax ]) && $_GET[ $tax ] != 'none') :
                    $tax_query[] = array(
                        'taxonomy' => $tax,
                        'field'    => 'term_id',
                        'terms'    => $_GET[ $tax ],
                    );
            endif;
            endforeach; ?>
            <div class="load-items-container portfolio-section filtered">
				<?php $projects = new WP_Query(array(
                    'post_type'      => isset($_GET['mainFilter']) ? array( $_GET['mainFilter'] ) : array(
                        'government',
                        'higher_education',
                        'institutional',
                        'commercial'
                    ),
                    'tax_query'      => $tax_query,
                    'posts_per_page' => 100,
                    's'              => $_GET['search'],
                )); ?>
				<?php if ($projects->have_posts()) : ?>
                    <!-- project list -->
                    <div class="project-list">
						<?php while ($projects->have_posts()) : $projects->the_post(); ?>
							<?php get_template_part('blocks/project-grid'); ?>
						<?php endwhile; ?>
                    </div>
				<?php endif;
            $projects->reset_postdata(); ?>
            </div>
		<?php
        } elseif ($_GET['ajax-portfolio'] == 'all-items') {
            ?>
            <div class="load-items-container">
				<?php get_template_part('blocks/defined-projects'); ?>
            </div>
		<?php
        }
        exit();
    }
}

add_action('wp', 'ajax_load_projecct_data');

function jpt_rewrite_init()
{
    global $wp;
    $wp->add_query_var('f_type');
    $wp->add_query_var('f_category');
    add_rewrite_rule('^government_cat/(.*)/?$', 'index.php?pagename=portfolio&f_type=government&f_category=$matches[1]', 'top');
    add_rewrite_rule('^higher_education_cat/(.*)/?$', 'index.php?pagename=portfolio&f_type=higher_education&f_category=$matches[1]', 'top');
    add_rewrite_rule('^government/?$', 'index.php?pagename=portfolio&f_type=government&f_category=', 'top');
    add_rewrite_rule('^higher_education/?$', 'index.php?pagename=portfolio&f_type=higher_education&f_category=', 'top');
    add_rewrite_rule('^institutional/?$', 'index.php?pagename=portfolio&f_type=institutional&f_category=', 'top');
    add_rewrite_rule('^commercial/?$', 'index.php?pagename=portfolio&f_type=commercial&f_category=', 'top');
}

add_action('init', 'jpt_rewrite_init');


// display post categories as linkes separeted by comma (default, can be changed)
if (! function_exists('the_post_categories')) {
    function the_post_categories($post_id = null, $separator = ', ', $tax = 'category')
    {
        if ($post_id == null) {
            global $post;
            $post_id = $post->ID;
        }

        $categories = get_the_terms($post_id, $tax);
        if ($categories) {
            $i              = 1;
            $categories_num = count($categories);
            foreach ($categories as $cat) {
                echo '<a href="' . get_term_link($cat, $tax) . '">' . $cat->name . '</a>';
                if ($categories_num > $i) {
                    echo $separator;
                }
                $i ++;
            }
        }
    }
}


if (! function_exists('the_top_level_menu_item_title')) {
    function the_top_level_menu_item_title($menu_location, $parent_id = null)
    {
        $locations  = get_nav_menu_locations();
        $menu_items = wp_get_nav_menu_items($locations[ $menu_location ]);
        $object_id  = (is_singular('government') || is_singular('higher_education') || is_singular('instutional') || is_singular('commercial')) ? get_page_id_by_template('pages/template-portfolio.php') : get_queried_object_id();
        $object_id  = (is_singular('team')) ? get_page_id_by_template('pages/template-team.php') : $object_id;

        if ($menu_items) {
            $i = 1;
            foreach ($menu_items as $menu_item) {
                if ($parent_id == $menu_item->ID) {
                    if ($menu_item->menu_item_parent != 0) {
                        the_top_level_menu_item_title($menu_location, $menu_item->menu_item_parent);
                        break;
                    } else {
                        echo $menu_item->title;
                        break;
                    }
                } else {
                    if ($menu_item->object_id == $object_id) {
                        if ($menu_item->menu_item_parent != 0) {
                            the_top_level_menu_item_title($menu_location, $menu_item->menu_item_parent);
                            break;
                        } else {
                            echo $menu_item->title;
                            break;
                        }
                    }
                }
            }
        }

        return false;
    }
}
function hex2rgba($color, $opacity = false)
{
    $default = 'rgb(0,0,0)';
                                     
    //Return default if no color provided
    if (empty($color)) {
        return $default;
    }
                                     
    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
                                     
    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif (strlen($color) == 3) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
                                     
    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);
                                     
    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1) {
            $opacity = 1.0;
        }
        $output = 'rgba('.implode(",", $rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",", $rgb).')';
    }
                                     
    //Return rgb(a) color string
    return $output;
}



function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/admin-styles.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



function is_gravity_form_exists($form_id){
    $forms = GFFormsModel::get_forms();
    foreach($forms as &$form){
        if ($form->id == $form_id) return true;
    }
    return false;
}




function dl_form_confirmation($confirmation, $form, $entry, $ajax) {

    $file_id = $entry[5]; //file_id field
    if(!$file_id){
        $confirmation = "File not found...";
    }

    $file_url = wp_get_attachment_url( $file_id );
    if($file_url){

        $dl_button = '<a target="_blank" href="'. $file_url .'" class="btn btn-default custom">DOWNLOAD NOW</a>';
        $confirmation = str_replace("[link]", $dl_button, $confirmation);

    } else {
        $confirmation = "File not found...";
    }

    return $confirmation;
}
add_filter( 'gform_confirmation_7', 'dl_form_confirmation', 10, 4 );



function get_post_authors($post_id = null){
    if(!$post_id){
        global $post;
        $post_id = $post->ID;
    }

    $authors_ids = get_field("related_with", $post_id);

    if($authors_ids){
        $authors = array();
        foreach ($authors_ids as $id) {
            $author = get_post($id);
            if($author && $author->post_status == 'publish'){
                $authors[] = '<a href="'. get_the_permalink($author->ID) .'">'. $author->post_title .'</a>';
            }
        }
    }

    if(!empty($authors)){
        $html .= 'Author'. (count($authors) > 1 ? 's' : '') .': ';
        $html .= implode(", ", $authors);
        return $html;
    }

    return null;
}


function post_authors_date($show_authors = true, $show_date = true){
    if(!$show_authors && !$show_date) return;

    echo '<div class="entry-meta datentime"><span class="datentime">';
    if($show_authors && $authors = get_post_authors($post->ID)){
        echo '<span class="authname">'. $authors .'</span> | ';
    }
    if($show_date){
        echo jpt_twentyseventeen_time_link();
    }
    echo '</span></div><!-- .entry-meta -->';
}

function blog_widget_init() {
    register_sidebar( array(
        'name'          => __( 'Insights Category Sidebar', 'textdomain' ),
        'id'            => 'blog-sidebar-cats',
        'description'   => __( 'Widgets in this area will be shown on all Insights pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'blog_widget_init' );

/*

//TEST SSL cURL for salesforce

function get_web_page( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );



    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;

    return $header;
}

//$url  = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
$url  = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
$url .= '&email=trueyiujkwn@ouihw3e.co&first_name=test1&last_name=test22&company=myco&lead_source=Website&Campaign_ID=7010W0000023ldX&member_status=Responded&Web_Lead_URL__c={source_url}&oid=00Dd0000000hKOh&debug=1&retURL=http://trivista.devserv.co/library/';

$res = get_web_page( $url );
print"<pre>";print_r($res);print"</pre>";

*/


function exclude_nonadvertorial_search($query) {
  //only run for the main query and don't run on admin pages
  if (!is_admin() && $query->is_main_query()) {
    //now check to see if you are on a search results page
    if ($query->is_search) {
      //get sponsor posts that are NOT advertorials, so we can exclude their IDs from search
      $args = array(
        //get posts of the custom post type sponsor_post
        'post_type' => 'library',
        //get all posts
        'posts_per_page' => -1,
        //return an array of post IDs
        'fields' => 'ids',
        //now check for posts that have a sponsor_post_type that is not 'advertorial'
        'meta_query' => array(
          array(
            'key' => 'off-site_landing_page',
            'value' => 1,
          )
        )
      );
      //now get the posts
      $excluded_ids = get_posts($args);
      //add these post IDs to the 'post__not_in' query parameter
      $query->set('post__not_in', $excluded_ids);
    }
  }
}
add_action('pre_get_posts', 'exclude_nonadvertorial_search');

function my_wp_nav_menu_objects( $items, $args ) {
  // Loop through each menu item
  foreach( $items as $item ) {
      // Check if the ACF field is set for the current item
      if( $nav_title = get_field('featured_nav_title', $item) ) {
          $ft_title = get_field('featured_title', $item);
          $ft_excerpt = get_field('featured_excerpt', $item);
          $ft_url = get_field('featured_url', $item);
          // Check if the item has children
          if ( !empty($item->classes) && in_array('menu-item-has-children', $item->classes) ) {
              // Append a new menu item for the post title
              $post_title_item = new stdClass();
              $post_title_item->title = '<div class="featured-nav-content">
                                           <div class="ft-nav-title">' . $nav_title . '</div>
                                           <div class="ft-content-container">
                                           <div class="ft-title">' . $ft_title . '</div>
                                           <div class="ft-excerpt">' . $ft_excerpt . '</div>
                                           <div class="ft-read-more">Read More</div>
                                           </div>
                                         </div>';
              $post_title_item->url = $ft_url; // Set the URL to empty as it's just a label
              $post_title_item->menu_order = PHP_INT_MAX; // Place it at the bottom of the submenu
              $post_title_item->menu_item_parent = $item->ID; // Set the parent menu item ID
              $post_title_item->classes = array('ft-menu-content');
              // Add the new menu item to the end of the menu items array
              $items[] = $post_title_item;
              
          }
      }
  }
  // Return the modified items
  return $items;
}
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2 );