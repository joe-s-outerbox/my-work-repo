<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php $hide_header = get_field('hide_header'); ?>

<?php if (!$hide_header): ?>
    <!-- Begin Header -->
    <header>
        <div id="header-wrapper">
            <div class="header-inner">
                <div id="linkbar" class="nav-bar nav-bar-left">
                    <!-- Left Menu -->
                    <nav class="nav-menu" role="navigation">
                        <?php aa_display_menu('Left Menu'); ?>
                    </nav>
                </div>


                <!-- Logo -->
                <?php
                $image = function_exists('get_field') ? get_field('site_header_logo', 'option') : false;
                if ($image && !empty($image['url'])) {
					//removed ', esc_attr(get_bloginfo('name')), ' from alt="", replaced with string
                    echo '<a href="', esc_attr(site_url()), '" target="_self"><img class="logo" src="', esc_attr($image['url']), '" alt="Fashion and Lifestyle Blog - So Susie" /></a>';
                } else {
                    echo '<a href="', esc_attr(site_url()), '" target="_self"><img class="logo" src="', esc_attr(get_template_directory_uri() . '/_static/images/logo-primary.png'), '" alt="', esc_attr(get_bloginfo('name')), '" /></a>';
                }
                ?>
                <div id="linkbar" class="nav-bar nav-bar-right">
                    <!-- Right Menu -->
                    <nav class="nav-menu" role="navigation">
                        <?php aa_display_menu('Right Menu'); ?>
                    </nav>
                </div>

				
                <div class="mobile-hamburger">

                </div>
                <div class="nav-menu-mobile" style="display:none;">
                    <?php
                    $theme_locations = get_nav_menu_locations();

                    $menu_obj = get_term($theme_locations['mobile'], 'nav_menu');
                    $menu_items = wp_get_nav_menu_items($menu_obj);
                    $menu_items_array = aa_get_mobile_menu($menu_items, 0);


                    ?>
                    <ul id="menu-mobile-menu" class="menu">
                        <?php foreach($menu_items_array as $menu_item): ?>
                        <li class="menu-item <?php if(count($menu_item->children) > 0): ?> menu-item-has-children <?php endif; ?>menu-item-76623">
                            <a href="<?php echo count($menu_item->children) > 0 ? "#" : $menu_item->url; ?>" <?php if (count($menu_item->children) == 0): ?>target="<?php echo $menu_item->target; ?>"<?php endif; ?> <?php if(count($menu_item->children) > 0): ?>role="button"<?php endif;?>><?php echo $menu_item->title; ?></a>
                            <?php if(count($menu_item->children) > 0): ?>
                            <ul class="sub-menu">
                                <?php foreach($menu_item->children as $child): ?>
                                <li class="menu-item">
                                    <a href="<?php echo $child->url; ?>" target="<?php echo $child->target; ?>"><?php echo $child->title; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php get_template_part('_template-parts/site-socials'); ?>
                </div>

                <!-- search overlay -->
                <div id="search-overlay"
                     style="display: none; background: rgba(255, 255, 255, 0.94); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999;">
                    <!-- Close button -->
                    <img id="close-search"
                         src="<?php echo get_template_directory_uri(); ?>/_static/images/close-button.svg" alt="Close"
                         style="border: none; position: absolute; top: 10px; right: 10px; height: 3%;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="text" value="" name="s" id="s" placeholder="Enter search term..."/>
                            <button type="submit" id="searchsubmit">Search</button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--HEADER WRAPPER-->
    </header>
<?php endif; ?>
<main id="main">
    <div id="content-wrapper">