<?php
/*
* Template Name: About Page Template
*/
?>

<?php get_header(); ?>

<?php

$id = $post->ID;
$page_top_banner_image = get_field('page_top_banner_image', $id);
if(empty($page_top_banner_image)) {

    // the current page has no feature image
    // so we'll see if a) it has a parent and b) the parent has a featured image
    $ancestors = get_ancestors( $id, 'page' );
    $parent_id = $ancestors[0];
    if( get_field('page_top_banner_image', $parent_id) ) {
        // we'll use the parent's featured image
        $id = $parent_id;
    }

}

$thumb = get_field('page_top_banner_image', $id);

?>

    <div class="banner" style="height: <?php echo get_field('top_banner_height'); ?>px !important;">
        <div style="background: url('<?php echo $thumb; ?>') 30% 60% no-repeat; background-position: <?php the_field('top_banner_position'); ?> !important; height: <?php echo get_field('top_banner_height'); ?>px !important;" class="slide-img banner-bg-img">
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
      <section class="about-body-section slide-up">
        <div class="container">
          <div class="col-md-8 col-md-offset-1 col-sm-8 body-txt pull-right about-body">
           <?php
	                    if ( have_posts() ) :

		                    /* Start the Loop */
		                    while ( have_posts() ) : the_post();

			                    /*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
			                    the_content();

		                    endwhile;
	                    endif;
	                    ?>
          </div>
          <div class="col-md-3 col-sm-4">
          
            <?php get_sidebar(); ?>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>