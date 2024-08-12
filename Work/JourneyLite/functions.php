<?php
/**
 * Infinity Pro.
 *
 * This file adds functions to the Infinity Pro Theme.
 *
 * @package Infinity
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/infinity/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Infinity Pro' );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/infinity/' );
define( 'CHILD_THEME_VERSION', '1.3.2' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Include customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add image upload and color select to theme customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Add the required WooCommerce functions.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce custom CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Include notice to install Genesis Connect for WooCommerce.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * Allows plugins to remove support if required.
 *
 * @since 1.2.0
 */
function genesis_child_gutenberg_support() {

	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';

}

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'infinity_localization_setup' );
function infinity_localization_setup(){
	load_child_theme_textdomain( 'infinity-pro', get_stylesheet_directory() . '/languages' );
}

// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'infinity_enqueue_scripts_styles' );
function infinity_enqueue_scripts_styles() {

	wp_enqueue_style( 'infinity-fonts', '//fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,700|Raleway:700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'infinity-ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );

	wp_enqueue_script( 'infinity-match-height', get_stylesheet_directory_uri() . '/js/match-height.js', array( 'jquery' ), '0.5.2', true );
	wp_enqueue_script( 'infinity-global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery', 'infinity-match-height' ), '1.0.0', true );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'infinity-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'infinity-responsive-menu',
		'genesis_responsive_menu',
		infinity_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function infinity_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'infinity-pro' ),
		'menuIconClass'    => 'ionicons-before ion-ios-drag',
		'subMenu'          => __( 'Submenu', 'infinity-pro' ),
		'subMenuIconClass' => 'ionicons-before ion-chevron-down',
		'menuClasses'      => array(
			'others' => array(
				'.nav-primary',
			),
		),
	);

	return $settings;

}

add_action( 'after_setup_theme', 'infinity_theme_support', 1 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 1.3.0
 */
function infinity_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

// Add image sizes.
add_image_size( 'mini-thumbnail', 75, 75, TRUE );
add_image_size( 'team-member', 600, 600, TRUE );

// Remove header right widget area.
unregister_sidebar( 'header-right' );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove skip link for primary navigation.
add_filter( 'genesis_skip_links_output', 'infinity_skip_links_output' );
function infinity_skip_links_output( $links ) {

	if ( isset( $links['genesis-nav-primary'] ) ) {
		unset( $links['genesis-nav-primary'] );
	}

	return $links;

}

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Add offscreen content if active.
add_action( 'genesis_after_header', 'infinity_offscreen_content_output' );
function infinity_offscreen_content_output() {

	$button = '<button class="offscreen-content-toggle"><i class="icon ion-ios-close-empty"></i> <span class="screen-reader-text">' . __( 'Hide Offscreen Content', 'infinity-pro' ) . '</span></button>';

	if ( is_active_sidebar( 'offscreen-content' ) ) {

		echo '<div class="offscreen-content-icon"><button class="offscreen-content-toggle"><i class="icon ion-ios-more"></i> <span class="screen-reader-text">' . __( 'Show Offscreen Content', 'infinity-pro' ) . '</span></button></div>';

	}

	genesis_widget_area( 'offscreen-content', array(
		'before' => '<div class="offscreen-content"><div class="offscreen-container"><div class="widget-area"><div class="wrap">',
		'after'  => '</div>' . $button . '</div></div></div>',
	));

}

// Reduce secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'infinity_secondary_menu_args' );
function infinity_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'infinity_author_box_gravatar' );
function infinity_author_box_gravatar( $size ) {
	return 100;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'infinity_comments_gravatar' );
function infinity_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

// Setup widget counts.
function infinity_count_widgets( $id ) {

	$sidebars_widgets = wp_get_sidebars_widgets();

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}

}

// Determine the widget area class.
function infinity_widget_area_class( $id ) {

	$count = infinity_count_widgets( $id );

	$class = '';

	if ( $count == 1 ) {
		$class .= ' widget-full';
	} elseif ( $count % 3 == 1 ) {
		$class .= ' widget-thirds';
	} elseif ( $count % 4 == 1 ) {
		$class .= ' widget-fourths';
	} elseif ( $count % 2 == 0 ) {
		$class .= ' widget-halves uneven';
	} else {
		$class .= ' widget-halves';
	}

	return $class;

}

// Register widget areas.
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'infinity-pro' ),
	'description' => __( 'This is the front page 1 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'infinity-pro' ),
	'description' => __( 'This is the front page 2 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'infinity-pro' ),
	'description' => __( 'This is the front page 3 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'infinity-pro' ),
	'description' => __( 'This is the front page 4 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'infinity-pro' ),
	'description' => __( 'This is the front page 5 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-6',
	'name'        => __( 'Front Page 6', 'infinity-pro' ),
	'description' => __( 'This is the front page 6 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-7',
	'name'        => __( 'Front Page 7', 'infinity-pro' ),
	'description' => __( 'This is the front page 7 section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'lead-capture',
	'name'        => __( 'Lead Capture', 'infinity-pro' ),
	'description' => __( 'This is the lead capture section.', 'infinity-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'offscreen-content',
	'name'        => __( 'Offscreen Content', 'infinity-pro' ),
	'description' => __( 'This is the offscreen content section.', 'infinity-pro' ),
) );
function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
add_filter( 'body_class', 'prefix_body_class' );
/**
 * Adds a css class to the body element.
 *
 * @param  array $classes the current body classes.
 * @return array $classes modified classes.
 */
function prefix_body_class( $classes ) {

    $classes[] = 'no-js';

    return $classes;

}

add_action( 'genesis_before', 'custom_add_js_class', 1 );

remove_action('genesis_site_title', 'genesis_seo_site_title');
add_action('genesis_site_title', 'replacement_seo_site_title');
function replacement_seo_site_title() {

	// Set what goes inside the wrapping tags.
	$inside = current_theme_supports( 'genesis-custom-logo' ) && has_custom_logo() ? wp_kses_post( get_bloginfo( 'name' ) ) : wp_kses_post( sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), get_bloginfo( 'name' ) ) );

	// Determine which wrapping tags to use.
	$wrap = genesis_is_root_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';

	// Fallback for static homepage if an SEO plugin is active.
	$wrap = genesis_is_root_page() && genesis_seo_disabled() ? 'p' : $wrap;

	// Fallback for latest posts if an SEO plugin is active. *!changed from '? 'h1' : $wrap' to 'p' : $wrap'!*
	$wrap = is_front_page() && is_home() && genesis_seo_disabled() ? 'p' : $wrap;

	// And finally, $wrap in h1 if HTML5 & semantic headings enabled.
	$wrap = genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	/**
	 * Site title wrapping element
	 *
	 * The wrapping element for the site title.
	 *
	 * @since 2.2.3
	 *
	 * @param string $wrap The wrapping element (h1, h2, p, etc.).
	 */
	$wrap = apply_filters( 'genesis_site_title_wrap', $wrap );

	// Build the title.
	$title = genesis_markup(
		[
			'open'    => sprintf( "<{$wrap} %s>", genesis_attr( 'site-title' ) ),
			'close'   => "</{$wrap}>",
			'content' => $inside,
			'context' => 'site-title',
			'echo'    => false,
			'params'  => [
				'wrap' => $wrap,
			],
		]
	);

	/**
	 * The SEO title filter
	 *
	 * Allows the entire SEO title to be filtered.
	 *
	 * @since ???
	 *
	 * @param string $title  The SEO title.
	 * @param string $inside The inner portion of the SEO title.
	 * @param string $wrap   The html element to wrap the title in.
	 */
	$title = apply_filters( 'genesis_seo_title', $title, $inside, $wrap );

	echo $title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sanitize done prior to filter application
}

/**
 * Removes `no-js` class and adds `js` class to the body element before Genesis is loaded.
 */
function custom_add_js_class() {
?>
    <script>
        //<![CDATA[
        (function(){
        var c = document.body.classList;
        c.remove( 'no-js' );
        c.add( 'js' );
        })();
        //]]>
    </script>


<?php }

/* Register widget area for OuterBox Article sidebar */
function register_obx_article_widget_area()
{
    register_sidebar(
        array(
            'id' => 'obx-article-sidebar',
            'name' => esc_html__('OuterBox Article Sidebar', 'theme-domain'),
            'description' => esc_html__('Appears in the sidebar of all posts using the OuterBox Article Template.', 'theme-domain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title-holder"><div class="widget-title">',
            'after_title' => '</div></div>'
        )
    );
}
add_action('widgets_init', 'register_obx_article_widget_area');




// Remove the default footer widget areas action
remove_action('genesis_before_footer', 'genesis_footer_widget_areas');

// Add a custom footer widget areas action
add_action('genesis_before_footer', 'custom_genesis_footer_widget_areas');

function custom_genesis_footer_widget_areas() {
    $footer_widgets = get_theme_support('genesis-footer-widgets');

    if (!$footer_widgets || !isset($footer_widgets[0]) || !is_numeric($footer_widgets[0]) || genesis_footer_widgets_hidden_on_current_page()) {
        return;
    }

    $footer_widgets = (int) $footer_widgets[0];

    // Check to see if the first widget area has widgets. If not, do nothing. No need to check all footer widget areas.
    if (!is_active_sidebar('footer-1')) {
        return;
    }

    $inside  = '';
    $output  = '';
    $counter = 1;

    while ($counter <= $footer_widgets) {
        // Output buffer
        ob_start();
        dynamic_sidebar('footer-' . $counter);
        $widgets = ob_get_clean();

        if ($widgets) {
            $inside .= genesis_markup(
                [
                    'open'    => '<div %s>',
                    'close'   => '</div>',
                    'context' => 'footer-widget-area',
                    'content' => $widgets,
                    'echo'    => false,
                    'params'  => [
                        'column' => $counter,
                        'count'  => $footer_widgets,
                    ],
                ]
            );
        }

        $counter++;
    }

    if ($inside) {
        $_inside = genesis_get_structural_wrap('footer-widgets', 'open');
        $_inside .= $inside;
        $_inside .= genesis_get_structural_wrap('footer-widgets', 'close');

        $output .= genesis_markup(
            [
                'open'    => '<div %s>',
                'close'   => '</div>',
                'content' => $_inside,
                'context' => 'footer-widgets',
                'echo'    => false,
            ]
        );
    }

    /**
     * Allow the footer widget areas output to be filtered.
     *
     * @since 1.6.0
     *
     * @param string The combined output.
     * @param string The actual widgets.
     */
    $footer_widgets = apply_filters('genesis_footer_widget_areas', $output, $footer_widgets);

    echo $footer_widgets; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- attempting to escape here will strip tags or attributes output by widgets.
}
//Display current year
function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');
//Add Fourth Widget To Footer
// Replace h3 with p for all widget titles
add_filter( 'genesis_register_sidebar_defaults', 'custom_register_sidebar_defaults' );
function custom_register_sidebar_defaults( $defaults ) {
	$defaults['before_title'] = '<p class="widget-title widgettitle">';
	$defaults['after_title'] = '</p>';
	return $defaults;
}
