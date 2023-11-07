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
    wp_enqueue_script( 'fancybox', '/wp-content/themes/duracote/frontend/js/fancybox/jquery.fancybox.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'imagesLoaded','/wp-content/themes/duracote/frontend/js/jquery.imagesloaded.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'jrespond', '/wp-content/themes/duracote/frontend/js/jRespond.min.js', array( 'jquery'), '', true );
    wp_enqueue_script( 'main_js', '/wp-content/themes/duracote/frontend/js/main.js', array('jquery'), '', true );
    wp_enqueue_script( 'respond_js', '/wp-content/themes/duracote/frontend/js/responsive.js', '', '', true );
  }

// Custom Post Types
function customer_list_init() {
    $args = array(
        'labels' => array(
            'name' => 'Customer Lists',
            'singular' => 'Customer List'
        ),
        'description' => 'List of customers.',
        'public' => false,
        'rewrite' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'exclude_from_search' => true,
        'supports' => array(
            'title',
            'customfields',
            'page-attributes'
        )
    );
    register_post_type('customer-list', $args);
}
add_action('init', 'customer_list_init');

register_nav_menus(array(
    'header-main-nav' => 'Header Main Navigation',
    'footer-products' => 'Footer Products Navigation',
    'footer-markets' => 'Footer Markets Navigation',
    'footer-invent' => 'Footer Invent Navigation',
    'footer-about' => 'Footer About Navigation',
));


/**
 * Retrieves hero banner(s) that are associated with a page
 * @param string $pageId - unique page identifier
 * @param string $textWrapper - element to wrap text with
 */

function get_hero_main($pageId, $textWrapper){
    $banners = get_field('field_5804d6b7dc621', $pageId);
    $bannerClass = '';
    if($banners) {
        echo '<section id="hero-wrapper">';
        echo '<div class="container">';
        echo '<div id="hero">';
        echo '<ul class="clearfix">';

        // Apply a banner class
        switch (count($banners)) {
            case 3:
                $bannerClass = 'thirds';
                break;
            case 2:
                $bannerClass = 'halves';
                break;
            case 1:
            default:
                $bannerClass = null;
                break;
        }

        // Sort the banners
        $sorted = array();
        foreach ($banners as $i => $banner) {
            $sorted[$i] = $banner['banner-order'];
        }
        array_multisort($sorted, SORT_ASC, $banners);

        // Populate banners
        foreach ($banners as $i => $banner) {
             echo '<li class="' . $bannerClass . '">';
            echo '<a href="' . $banner["banner-link"] .'">';
            echo '<img src="' . $banner['banner-image']. '" alt="' . $banner['banner-alt']. '" />';
            echo '<' . $textWrapper . '>' . $banner["banner-text"] . '</' . $textWrapper . '>';
            echo '</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div><!--/#hero -->';
        echo '</div><!-- /.container -->';
        echo '</section><!--/#hero-wrapper-->';
    }
}

function get_hero($pageId, $textWrapper){
    $banners = get_field('field_5804d6b7dc621', $pageId);
    $bannerClass = '';
    if($banners) {
        echo '<section id="hero-wrapper">';
        echo '<div class="container">';
        echo '<div id="hero">';
        echo '<ul class="clearfix">';

        // Apply a banner class
        switch (count($banners)) {
            case 3:
                $bannerClass = 'thirds';
                break;
            case 2:
                $bannerClass = 'halves';
                break;
            case 1:
            default:
                $bannerClass = null;
                break;
        }

        // Sort the banners
        $sorted = array();
        foreach ($banners as $i => $banner) {
            $sorted[$i] = $banner['banner-order'];
        }
        array_multisort($sorted, SORT_ASC, $banners);

        // Populate banners
        foreach ($banners as $i => $banner) {
            echo '<li class="' . $bannerClass . '">';
            echo '<img src="' . $banner['banner-image']. '" alt="' . $banner['banner-alt']. '"/>';
            echo '<' . $textWrapper . '>' . $banner["banner-text"] . '</' . $textWrapper . '>';
            echo '</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div><!--/#hero -->';
        echo '</div><!-- /.container -->';
        echo '</section><!--/#hero-wrapper-->';
    }
}

/**
 * Retrieves an image link block section that is associated with a page
 * @param string $pageId - unique page identifier
 */
function get_image_link_blocks($pageId) {
    $materialBlocks = get_field('field_58173c418c19a', $pageId);

    if ($materialBlocks) {
        $blockColumns = '';
        $numberOfBlocks = count($materialBlocks);

        echo '<div class="container">';
        echo '<div class="row link-block">';
        echo '<div class="row flex-row">';

        if ($numberOfBlocks > 1) {
            foreach ($materialBlocks as $i => $block) {
                echo '<a class="image-link-block ' . $blockColumns .
                    ' ' . ($i == 0 ? 'alpha' : null) . ($i == $numberOfBlocks-1 ? 'omega' : null) . '" ' .
                    'href="' . $block['link'] . '">' ;
                echo '<div class="image-wrapper"><img src="' . $block['image'] . '" alt="' . $materialBlocks[0]['alt'] . '"  /></div>';
                echo '<div class="text-wrapper">';
                echo ($block['heading'] != '' || $block['heading'] != null
                    ? '<span class="head">'. $block['heading'] . '</span>'
                    : null);
                echo ($block['sub_heading'] != '' || $block['sub_heading'] != null
                    ? '<span class="subhead">'. $block['sub_heading'] . '</span>'
                    : null);
                echo ($block['tagline'] != '' || $block['tagline'] != null
                    ? '<span class="tagline">'. $block['tagline'] . '</span>'
                    : null);
                echo '<span class="arrow-link ' . ($block['tagline'] != '' || $block['tagline'] != null
                        ? 'bottom'
                        : null) . '"> </span>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<a class="image-link-block ' . $blockColumns . '"href="' . $materialBlocks[0]['link'] . '">' ;
            echo '<div class="image-wrapper"><img src="' . $materialBlocks[0]['image'] . '" alt="' . $materialBlocks[0]['alt'] . '"  /></div>';
            echo '<div class="text-wrapper">';
            echo ($materialBlocks[0]['heading'] != '' || $materialBlocks[0]['heading'] != null
                ? '<span class="head">'. $materialBlocks[0]['heading'] . '</span>'
                : null);
            echo ($materialBlocks[0]['sub_heading'] != '' || $materialBlocks[0]['sub_heading'] != null
                ? '<span class="subhead">'. $materialBlocks[0]['sub_heading'] . '</span>'
                : null);
            echo ($materialBlocks[0]['tagline'] != '' || $materialBlocks[0]['tagline'] != null
                ? '<span class="subhead">'. $materialBlocks[0]['tagline'] . '</span>'
                : null);
            echo '<span class="arrow-link ' . ($materialBlocks[0]['tagline'] != '' || $materialBlocks[0]['tagline'] != null
                    ? 'bottom'
                    : null) . '"> </span>';
            echo '</div>';
            echo '</a>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}


// Add tinymce temlates to ACF
add_filter( 'tinymce_templates_enable_media_buttons', function(){ return true; });

// Add normalize to tinymce
add_editor_style( 'frontend/css/editorStyles.css' );
?>
