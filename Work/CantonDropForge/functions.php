<?php

add_action('wp_enqueue_scripts', 'add_styles');
function add_styles() {
    // Enqueue the style
    wp_enqueue_style('main',  get_stylesheet_directory_uri() . '/style.css');
    
    // Enqueue the script
    wp_enqueue_script('modernizr',  get_stylesheet_directory_uri() . '/frontend/js/vendor/modernizr-2.6.2.min.js');
    wp_enqueue_script('jquery', '', '' , true);
}

add_action('wp_enqueue_scripts', 'add_scripts');
function add_scripts() {
    // Enqueue the scripts
    wp_enqueue_script( 'fancybox', '/wp-content/themes/CantonDropForge/frontend/js/fancybox/jquery.fancybox.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'imagesLoaded','/wp-content/themes/CantonDropForge/frontend/js/jquery.imagesloaded.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'jrespond', '/wp-content/themes/CantonDropForge/frontend/js/jRespond.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'placeholder', '/wp-content/themes/CantonDropForge/frontend/js/jquery.placeholder.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bxslider', '/wp-content/themes/CantonDropForge/frontend/js/bxslider/jquery.bxslider.js', array('jquery'), '', true );
    wp_enqueue_script( 'main_js', '/wp-content/themes/CantonDropForge/frontend/js/main.js', array('jquery'), '', true );
    wp_enqueue_script( 'respond_js', '/wp-content/themes/CantonDropForge/frontend/js/responsive.js', '', '', true );
  }

// Custom Post Types


register_nav_menus(array(
    'header-main-nav' => 'Header Main Navigation',
    'footer-markets' => 'Footer Markets Navigation',
    'footer-capabilities' => 'Footer Capabilities Navigation',
    'footer-about' => 'Footer About Navigation',
));


// Add tinymce temlates to ACF
add_filter( 'tinymce_templates_enable_media_buttons', function(){ return true; });

// Add normalize to tinymce
add_editor_style( 'frontend/css/editorStyles.css' );



// Paging

function news_query( $query ){
if ( is_page( array( 'cdf-news', 'forging-info' ))){
            $query->set( 'posts_per_page', 4 );
}
}
add_action( 'pre_get_posts', 'news_query' );

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


?>

/*
can insert this to use character length
function custom_excerpt_length($excerpt) {
    $limit = 100; // Set your character limit

    // Trim the excerpt while preserving whole words
    if (mb_strlen($excerpt) > $limit) {
        return mb_substr($excerpt, 0, $limit) . '...'; // Append "..." to indicate truncation
    }

    return $excerpt;
}
add_filter('get_the_excerpt', 'custom_excerpt_length');
*/