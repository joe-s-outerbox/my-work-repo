<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage jptframework
 * @since 1.0
 * @version 1.0
 */


get_header();


$thumb = get_field('page_top_banner_image', $post->ID);
if(empty($thumb)) {

    $ancestors = get_ancestors( $post->ID, 'page' );
    $parent_id = $ancestors[0];
    if( get_field('page_top_banner_image', $parent_id) ) {
        $thumb = get_field('page_top_banner_image', $parent_id);
    }

    if(empty($thumb) && is_single()){
        if(has_category('blog', $post)){
            $id = 258; //blog landing
        } else {
            $id = 159; //about landing
        }

        if( get_field('page_top_banner_image', $id) ) {
            $thumb = get_field('page_top_banner_image', $id);
        }
    }
}

?>

    <div class="banner" style="height: <?php echo get_field('top_banner_height', $id); ?>px !important;">
        <div style="background: url('<?php echo $thumb; ?>') 30% 60% no-repeat; background-position: <?php the_field('top_banner_position', $id); ?> !important;" class="slide-img banner-bg-img">
        </div>
    </div>

    <div class="main-container">
        <section class="breadcrumb-section">
            <div class="container">
                <div class="breadcrumb">
					<?php get_template_part( 'inc/breadcrumbs' ); ?>
                </div>
            </div>
        </section>
        <section class="about-body-section slide-up">
            <div class="container">
                <div class="col-md-8 col-sm-8 body-txt pull-right about-body">
                    <div class="blog-view">
                        <div class="blog">
							<?php

    							if ( have_posts() ) {
    								while ( have_posts() ) {
    									the_post(); ?>
                                        <div class="entry-header">
                                            <h1 class="entry-title"><?php the_title(); ?></h1>
        									<?php

            									if ( 'post' === get_post_type() || 'library' === get_post_type() ) :
            										if(get_field('override_date')){
														echo '<div class="entry-meta datentime"><span class="datentime"><span class="screen-reader-text"><a href="" rel="bookmark"><time class="entry-date published updated">' . get_field('override_date_txt') . '</time></a></span></span></div>';
														//echo '<a href="">' . get_field('override_date_txt') . '</a>'
													} else {
														post_authors_date();
													}
            									endif;

                                                echo '</div>'; /* .entry-header */
        									
        										if ( has_post_thumbnail() ) {
        										    the_post_thumbnail();
        										}

        									?>
                                        
    									<?php the_content(); ?>
    								<?php } // end while
    							} // end if
                                
							?>
                        </div>
                    </div>

					<?php $categories = get_the_category(); 
					if ( $categories ) { ?>
                        <div class="categories">
                        <?php echo '<span class="faux-h5 pull-left">Categories:</span>'?>
                            <ul class="pull-left">
								<?php
    								foreach ( $categories as $category ) {
    									$name = $category->name;
    									$category_link = get_category_link( $category->term_id );

    									echo "<li><a href='" . $category_link . "'>
    						            <span class='" . esc_attr( $name ) . "'>" . esc_attr( $name ) . "</span>
    						         </a></li>";
    								}
								?>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
					<?php } ?>

                    <div class="share-links blog-share">
                    <?php echo '<span class="faux-h5">Share</span>' ?>
						<?php echo do_shortcode( '[addtoany]' ); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
					<?php get_sidebar(); ?>
                </div>
            </div>

        </section>

    </div>
<?php get_footer(); ?>