<?php 
/**
 * Header template
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/frontend/img/favicon.ico">
         <?php wp_head(); ?>
		
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5MFK4DS');</script>
<!-- End Google Tag Manager -->
		
    </head>

    <body <?php body_class( $class = '') ?>>
        <header>
            <section id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="eighteen columns">

                            <div id="contact">
                                
                                    
                                
                                <h3><a href="/contact/">Contact</a></h3>
                                <ul>
                                    <li><a href="tel:+18003212252" aria-label="1 8 0 0. 3 2 1. 2 2 5 2.">(800) 321-2252</a></li>
                                    <li><a href="tel:+13302969600" aria-label="1 3 3 0. 2 9 6. 9 6 0 0.">+ 1 330-296-9600</a></li>
                                </ul> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>

            <section id="header-wrapper">
                <div class="container">
                    <div class="row addition">
                        <div class="btn-side-nav"></div>
                        <div class="mobile-only">
                            <img src="https://www.duracote.com/wp-content/uploads/2019/03/SQA-AS9100-2016.png" alt="mobile icon">
                        </div>
                        <div id="logo" class="four columns">
                            <a href="<?php echo get_home_url(); ?>">
                                <img style="margin-top:-48px;" src="https://www.duracote.com/wp-content/uploads/2022/04/Duracote-75-logo.svg" alt="Engineered Flexible Materials & Industrial Coatings Manufacturer - Duracote"/>
                            </a>
                        </div>

                        <div id="nav-search" class="fourteen columns">
                            <nav id="main-nav" class="nine columns alpha change-1">
                                <?php
                                // Getting array of links in the header
                                $locations = get_nav_menu_locations();
                                $main = wp_get_nav_menu_object( $locations['header-main-nav'] );
                                $menu_items = wp_get_nav_menu_items( $main->term_id, array( 'order' => 'DESC' ) );

                                // Creating object to hold top level links.
                                // Second level links added as object property called "children"
                                $custom_menu_object = new stdClass();

                                foreach($menu_items as $item):
                                    $ID = $item->ID;
                                    $parent_ID = $item->menu_item_parent;
                                    $item->children = array();

                                    if (!$parent_ID) { // this is a top level link
                                        $custom_menu_object->$ID = $item;
                                    } else { // second level link, add to children array of parent
                                        array_push($custom_menu_object->$parent_ID->children, $item);
                                    }
                                endforeach;
                                ?>

                                <div class="menu-main-nav-container">
                                    <ul id="menu-main-nav" class="mn-lvl1">
                                        <?php foreach($custom_menu_object as $item_id => $item_props):
                                            $title = $item_props->title;
                                            $link = $item_props->url;
                                            $image = get_field('field_5821df43f8044', $item_id);
                                            $image_alt = get_field('field_5d1a4c7e53b94', $item_id);
                                            $title_atr = $item_props->attr_title;
                                            $children = $item_props->children;
                                          
                                        ?>
                                        
                                        <li <?php echo count($children) > 0 ? null : 'class="no-children"'; ?>>
                                            <a href="<?php echo $link; ?>" title="<?php echo $title_atr; ?>"><?php echo $title; ?></a>

                                            <?php if ( count($children) > 0 ): ?>
                                            <div class="mega-wrapper">
                                                <?php if ($image): // Image should appear in mega nav ?>
                                                    <div class="image six columns">
                                                        <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"/>
                                                    </div>


                                                    <ul class="sub-menu mn-lvl2 twelve columns">
                                                        <?php
                                                        foreach($children as $child):
                                                            $thirdLevel = get_field('field_5822032277c35', $child->ID);
                                                            // $specialclass = $child['specialclass'];
                                                            ?>

                                                            <li class="five columns offset-by-one">
                                                                <a href="<?php echo $child->url; ?>" title="<?php echo $child->attr_title; ?>"><?php echo $child->title; ?></a>
                                                                <?php if ( $thirdLevel ): ?>
                                                                    <ul class="mn-lvl3">
                                                                        <?php foreach($thirdLevel as $link): ?>
                                                                            <li class="<?php echo $link['specialclass'] ?>">
                                                                                <a href="<?php echo $link['url']; ?>" title="<?php echo $link['title_attribute']; ?>">
                                                                                    <?php echo $link['title']; ?>
                                                                                </a>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                <?php endif ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: // only links as children ?>
                                                    <ul class="sub-menu mn-lvl2 fourteen columns offset-by-two">
                                                        <?php
                                                        foreach($children as $child):
                                                            $thirdLevel = get_field('field_5822032277c35', $child->ID);
                                                            // $specialclass = $child['specialclass'];
                                                            ?>
                                                            <li class="seven columns omega">
                                                                <a href="<?php echo $child->url; ?>" title="<?php echo $child->attr_title; ?>"><?php echo $child->title; ?></a>
                                                                <?php if ( $thirdLevel ): ?>
                                                                    <ul class="mn-lvl3">
                                                                        <?php foreach($thirdLevel as $link): ?>
                                                                            <li class="<?php echo $link['specialclass'] ?>">
                                                                                <a href="<?php echo $link['url']; ?>" title="<?php echo $link['title_attribute']; ?>">
                                                                                    <?php echo $link['title']; ?>
                                                                                </a>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                <?php endif ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                        </li>

                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </nav>

                            <div class="four columns omega">
                                <?php get_search_form() ?>
                            </div>
                            <div class="two columns omega">
                                <a href="https://www.duracote.com/blog/as9100-certified-companies/"><img class="desktop-as-img" style="max-width:65px;margin-left:20px;" src="https://www.duracote.com/wp-content/uploads/2019/03/SQA-AS9100-2016.png" alt="AS 9100:2016 Certified in Smithers Quality Assessments."/></a>
                            </div>
                        </div>        
                    </div>
                </div>
            </section>
            <div class="mega-wrapper"><div class="container"></div></div>
        </header>

