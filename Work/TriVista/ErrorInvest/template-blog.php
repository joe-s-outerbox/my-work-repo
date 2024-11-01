<?php
/*
Template Name: Blog landing
*/
?>
<?php get_header(); ?>

<?php

$id = $post->ID;
if( ! get_field('page_top_banner_image') ) {
    // the current page has no feature image
    // so we'll see if a) it has a parent and b) the parent has a featured image
    $ancestors = get_ancestors( $post->ID, 'page' );
    $parent_id = $ancestors[0];
    if( get_field('page_top_banner_image', $parent_id) ) {
        // we'll use the parent's featured image
        $id = $parent_id;
    }

}
$thumb = get_field('page_top_banner_image', $id);

?>

    <div class="banner" style="height: <?php echo get_field('top_banner_height'); ?>px !important;">
        <div style="background: url('<?php echo $thumb; ?>') 30% 60% no-repeat; background-position: <?php the_field('top_banner_position'); ?> !important;" class="slide-img banner-bg-img">
        </div>
    </div>

    <div class="main-container">

        <section class="breadcrumb-section">
            <div class="container">
                <div class="breadcrumb">
                  <?php get_template_part('inc/breadcrumbs'); ?>
                </div>
            </div>
        </section>
        <section class="about-body-section">
            <div class="container">
                <div class="col-md-7 col-md-offset-1 col-sm-7 body-txt pull-right about-body blog-main">

                    <?php

                      $per_page = get_option( 'posts_per_page', 10 );
                      $paged = 1;

                      if(isset($_POST["paged"]) && is_numeric(sanitize_text_field($_POST["paged"]))){
                         $paged = (int)sanitize_text_field($_POST["paged"]);
                      } else if(get_query_var('paged')){
                         $paged = get_query_var('paged');
                      }

                      $args = array(
                        'post_type' => array('post', 'library'),
                        'posts_per_page' => $per_page,
                        'paged' => $paged,
                        
						
						'tax_query' => array(
                          array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => array('news', 'hidden'),
                            'operator' => "NOT IN",
                            'include_children' => true,
                          ),
							array(
                            'taxonomy' => 'library_category',
                            'field' => 'slug',
                            'terms' => array('news', 'hidden', 'webinar-video'),
                            'operator' => "NOT IN",
                            'include_children' => true,
                          ),
                        ),
						  
                      );

                      if(isset($_GET['person'])){
                        $person_id = sanitize_text_field($_GET['person']);
                        if($person_id && is_numeric($person_id)){
                          $args['meta_query'] = array(
                            array(
                              'key' => 'related_with',
                              'value' => sprintf(':"%s";', $person_id),
                              'compare' => 'LIKE',
                            )
                          );
                        }
                      }

                      query_posts($args);

                      if (have_posts()): /* Start the Loop */ 
                        while (have_posts()):
                            the_post();
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/post/content', get_post_format());
                        endwhile;

                        the_posts_pagination(array(
                            'prev_text' => '<span class="prev-arrow-blog">&larr; prev</span>',
                            'next_text' => '<span class="screen-reader-text">' . __('&nbsp;', 'twentyseventeen') . '</span><span class="next-arrow-blog">next &rarr;</span>',
                        ));
                      else:
                        get_template_part('template-parts/post/content', 'none');
                      endif;
                      wp_reset_query();
                    
                    ?>
                </div>

                <div class="col-md-4 col-sm-4"> 
                  <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?> 