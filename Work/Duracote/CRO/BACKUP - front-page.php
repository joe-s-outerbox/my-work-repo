<?php
/**
 * Theme Name: Duracote
 * Author: Outerbox Solutions, Inc.
 * Description: WordPress theme for the Duracote website.
 */

get_header(); ?>
    <?php
        // get_hero_main(get_the_ID(), 'p');
    ?>

     <section id="hero-wrapper">
        <div class="container">
        <div id="hero">
            <video width="1080" height="425" autoplay muted loop>
            <source src="<?php echo get_stylesheet_directory_uri(); ?>/header_vid_v6.mp4" type="video/mp4">
            Your browser does not support the video tag.</video>
        </div><!--/#hero -->
        </div><!-- /.container -->
        </section><!--/#hero-wrapper-->
    <aside id="question-modal" style="display: none;">
        <h2 style="font-size:1.5em;">Have a Question?</h2>
        <?php gravity_form('2', false, false, false, false, true); ?>
    </aside>
    <main id="home-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php
            // Home Intro
            $homeIntro = get_field('home_page_intro');
        ?>

        <?php if ( $homeIntro ): ?>
            <section id="home-intro">
                <div class="container">
                    <?php echo $homeIntro; ?>
                </div>
            </section>
        <?php endif; ?>


        <section id="materials">
            <?php get_image_link_blocks(get_the_ID()); ?>
        </section>


        <section id="invent-area">
            <div class="heading-banner blue">
                <div class="container">
                    <div class="row">
                        <div class="eighteen columns">
                            <h2>Advanced Engineered Materials Solutions & Research</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="dream-content">
                    <!-- <p>Tell us what you’re looking for — better materials for your new or improved<br/>
                    products, to meet new regulations, or solve tough problems?<br/>
                    <strong>We’ll custom design materials that meet all your specs!</strong></p> -->
                    <p>Whatever your vision, we can help you achieve it. Duracote will develop custom designed and <a href="https://www.duracote.com/invent/">engineered material solutions</a> that will meet all your necessary specs! Just tell us what you're looking for — from flexible engineered materials for new projects to industrial coating solutions for updated aircraft regulations, we can solve all sorts of tough problems. Our custom material development for <a href="https://www.duracote.com/new-products/">new products</a> provides our customers with the latest high-tech answers to meet their needs.</p>
                </div>

                <div class="information">
                    <img src="/wp-content/uploads/2020/12/home-img.jpg" />
                </div>
            </div>
        </section>


        <?php
        $args = array (
                'post_type' => 'post',
                'numberposts' => 3,
                'post_status' => 'publish',
                );
        $recent_posts = wp_get_recent_posts($args);

        ?>

        <?php // TODO: Change to three with more content present ?>
        <?php if ( count($recent_posts) > 0 ): ?>
            <section id="latest">
                <div class="heading-banner">
                    <div class="container">
                        <div class="row">
                            <div class="eighteen columns">
                                <h2>Duracote Product News & Information</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recent-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php
                                foreach( $recent_posts as $post):
                                    $image = get_field('field_581793bdac42b', $post["ID"]);
                                    $alt = get_field('field_5d1a3e3d25bc1', $post["ID"]);
                            ?>

                            <div class="recent-post six columns">
                                <div class="rp-img"><a href="<?php echo get_permalink($post["ID"]); ?>"><img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" /></a></div>
                                <div class="rp-title"><a href="<?php echo get_permalink($post["ID"]); ?>"><?php echo $post["post_title"]; ?></a></div>
                                <div class="rp-excerpt"><?php echo $post["post_excerpt"]; ?></div>
                                <!-- <div class="rp-more clearfix">
                                    <a class="btn btn-secondary" aria-label="Read Full Article" href="<?php echo get_permalink($post["ID"]); ?>">Read More</a>
                                </div> -->
                            </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </section>
        <?php endif; ?>
        <?php
        // Bottom Content
        $bottom_heading = get_field('bottom_heading');
        $background_img = get_field('background_image');
        $links_to_display = get_field('links');
        $customer_list = get_field('field_5824e97d4feb0', get_the_ID());

        if ( $bottom_heading || $background_img ): ?>

            <section id="bottom-content">
                <div class="heading-banner light-grey">
                    <div class="container">
                        <div class="row">
                            <div class="eighteen columns">
                                <?php echo $bottom_heading; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="container">
                    <div class="row">
                        <div class="eighteen columns">
                            <div class="content">
                                <img src="<?php echo $background_img; ?>" />

                                <?php if ( count($links_to_display) > 0 ): ?>
                                    <ul class="icon-links">
                                        <?php foreach($links_to_display as $list_item):
                                            $li_link = '';
                                            $li_text = '';

                                            switch ($list_item):
                                                case ( 'fire-safety' ):
                                                    $li_link = get_field('fire_safety_link');
                                                    $li_text = '<span>Fire Safety</span><br />Materials';
                                                    break;
                                                case ( 'sound-control' ):
                                                    $li_link = get_field('sound_control_link');
                                                    $li_text = '<span>Sound Control</span><br />Materials';
                                                    break;
                                                case ( 'floor-coverings' ):
                                                    $li_link = get_field('floor_coverings_link');
                                                    $li_text = '<span>Floor Covering</span><br />Materials';
                                                    break;
                                                case ( 'anti-static' ):
                                                    $li_link = get_field('anti-static_link');
                                                    $li_text = '<span>Anti-Static Control</span><br />Materials';
                                                    break;
                                                default:
                                                    break;
                                            endswitch;

                                            echo '<li class="' . $list_item . '"><a href="' . $li_link . '">' . $li_text . '</a></li>';

                                        endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> -->
            </section>

        <?php endif; ?>

        <?php
        if ( $customer_list ):
            $list_object = get_post($customer_list);
            ?>

            <!--  <section id="customer-list">
               <div class="heading-banner light-grey">
                    <div class="container">
                        <div class="eighteen columns">
                            <h2><?php echo get_field('heading', $customer_list); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="list-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="eighteen columns">
                                <ul>
                                    <?php
                                    $customers = get_field('customer_name', $customer_list);
                                    foreach ($customers as $i => $customer):
                                        ?>
                                        <li>
                                            <?php
                                            if ( $i != 0 ):
                                                echo '+ ';
                                            endif;
                                            echo $customer['name']
                                            ;?>
                                        </li>
                                    <? endforeach; ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div> 
            </section>-->
        <?php endif; ?>
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, the home page needs some content first' ); ?></p>
    <?php endif; ?>
    </main>

<?php get_footer(); ?>