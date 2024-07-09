<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
*/
?>
<?php get_header(); ?>

<?php

	$id = $post->ID;
	$thumb = get_field('page_top_banner_image', $id);
	if(empty($thumb)) {

	    $parent_id = 175;
	    if( get_field('page_top_banner_image', $parent_id) ) {
	        // we'll use the parent's featured image
	        $thumb = get_field('page_top_banner_image', $parent_id);
	    }

	}

?>

    <div class="banner" style="height: 675px !important;">
        <div style="background-position: center !important; background: url('<?php echo $thumb; ?>') no-repeat; " class="slide-img banner-bg-img">
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
                <div class="col-md-8 col-md-offset-1 col-sm-8 body-txt person-info pull-right"> 
	
                	<div class="col-md-4 col-sm-12 pull-right text-center">
                		<a href="/ourteam/" class="btn btn-back">BACK TO TEAM</a>
                	</div>
					<div class="col-md-7 col-sm-12 person-name">
					    <h1><?php echo $post->post_title; ?></h1>
					    <h4><?php echo get_field('lds_position');?></h4>

						<div class="person-btns">
							<?php if(get_field('lds_email')) :?>
					            <a href="mailto:<?php echo get_field('lds_email'); ?>" class="btn-email"><i class="fa fa-envelope" aria-hidden="true"></i></a>
					        <?php endif; ?>

					        <?php if(have_rows('lds_socail_media') ): ?>
								<?php while( have_rows('lds_socail_media') ): the_row(); ?>
						            <?php 
						            	
							            $lds_smlnk = get_sub_field('lds_sm_account_link');
							            if(!$lds_smlnk) continue;

							            $lds_type = get_sub_field('lds_sm_account_type');

							        ?>
					                <a href="<?php echo $lds_smlnk;?>" class="btn-<?php echo $lds_type; ?>" rel="nofollow" target="_blank"><i class="fa fa-<?php echo $lds_type; ?>" aria-hidden="true"></i></a>
					            <?php endwhile; ?>
					        <?php endif; ?>
						</div>
					</div>
					<div class="clear_column"></div>
				    
				    <div class="person-detail">
				        <div class="person-intro">
				            <?php 

					            if ( have_posts() ) :
				                    while ( have_posts() ) : the_post();
					                    the_content();
				                    endwhile;
			                    endif;

								/*if(get_field('lds_bio_image', $post->ID)) {
									$lsimg_size = 'leadership-thumb-default';
									$get_lsimg = get_field('lds_bio_image', $post->ID);
									$lsimg = wp_get_attachment_image($get_lsimg, $lsimg_size);
								} else {
									$lsimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'leadership-thumb-default' );
									$lsimg = $lsimg[0];
								}*/

		                    ?>
				        </div>
				    </div>
				            
					<?php if(have_rows('additional_content_areas') ): ?>
						<?php while( have_rows('additional_content_areas') ): the_row(); ?>
							<div class="col-sm-9">
								<?php if(get_sub_field('lds_adc_area_title')) {?>
									<h5><?php echo get_sub_field('lds_adc_area_title'); ?></h5>
								<?php } ?>
								<?php if(get_sub_field('lds_adc_area_content')) {?>
									<p><?php echo get_sub_field('lds_adc_area_content'); ?></p>
								<?php } ?>
							</div>		
						<?php endwhile; 
					endif; ?>
					<!-- end loop -->


					<?php

						$posts_limit = 5;

						// get user related blog posts 
						$blogs = get_posts(array(
							'post_type' => 'post',
	                        'numberposts' => $posts_limit + 1,
	                        'tax_query' => array(
	                          array(
	                            'taxonomy' => 'category',
	                            'field' => 'slug',
	                            'terms' => 'blog',
	                            'operator' => "IN",
	                          ),
	                        ),
							'meta_query' => array(
						        array(
						            'key'     => 'related_with',
						            'value'   => sprintf(':"%s";', $post->ID),
						            'compare' => 'LIKE',
						        )
						    )
						));

						// get user related whitepapers/articles 
						$articles = get_posts(array(
							'post_type' => 'library',
	                        'numberposts' => $posts_limit + 1,
	                        'tax_query' => array(
	                          array(
	                            'taxonomy' => 'library_category',
	                            'field' => 'slug',
	                            'terms' => 'whitepapers',
	                            'operator' => "IN",
	                          ),
	                        ),
							'meta_query' => array(
						        array(
						            'key'     => 'related_with',
						            'value'   => sprintf(':"%s";', $post->ID),
						            'compare' => 'LIKE',
						        )
						    )
						));

						// get user related webinars 
						$webinars = get_posts(array(
							'post_type' => 'library',
	                        'numberposts' => $posts_limit + 1,
	                        'tax_query' => array(
	                          array(
	                            'taxonomy' => 'library_category',
	                            'field' => 'slug',
	                            'terms' => 'webinar-video',
	                            'operator' => "IN",
	                          ),
	                        ),
							'meta_query' => array(
						        array(
						            'key'     => 'related_with',
						            'value'   => sprintf(':"%s";', $post->ID),
						            'compare' => 'LIKE',
						        )
						    )
						));

					?>
					<?php if($blogs || $articles || $webinars) :?>
						<div class="accordion-wrapper">
	                      	<div id="accordion" role="tablist">

								<?php if($blogs) :?>
		                         	<div class="card">
		                          		<div class="card-header" role="tab" id="heading1">
		                            		<h5><a data-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapse1" rel="nofollow">Latest Insights<span class="accordion-icon"></span></a></h5>
		                          		</div>

		                          		<div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion" aria-expanded="false" style="">
		                            		<div class="card-body">
		                              			<ul>
		                              				<?php foreach($blogs as $item) :?>
		                              					<li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></li>
		                              				<?php endforeach; ?>
		                              				<?php if(count($blogs) > $posts_limit) :?>
			                              				<li><a href="/insights/blog/?person=<?php echo $post->ID; ?>">See All Blog Posts</a></li>
			                              			<?php endif; ?>
		                              			</ul>
		                            		</div>
		                          		</div>
		                        	</div>
		                        <?php endif; ?>

								<?php if($articles) :?>
		                         	<div class="card">
		                          		<div class="card-header" role="tab" id="heading2">
		                            		<h5><a data-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapse2" rel="nofollow">Whitepapers and Articles<span class="accordion-icon"></span></a></h5>
		                          		</div>

		                          		<div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordion" aria-expanded="false" style="">
		                            		<div class="card-body">
		                              			<ul>
		                              				<?php foreach($articles as $item) :?>
		                              					<li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></li>
		                              				<?php endforeach; ?>
		                              				<?php if(count($articles) > $posts_limit) :?>
		                              					<li><a href="/insights/articles/?person=<?php echo $post->ID; ?>">See All Whitepapers and Articles</a></li>
		                              				<?php endif; ?>
		                              			</ul>
		                            		</div>
		                          		</div>
		                        	</div>
		                        <?php endif; ?>

								<?php if($webinars) :?>
		                         	<div class="card">
		                          		<div class="card-header" role="tab" id="heading3">
		                            		<h5><a data-toggle="collapse" href="#collapse3" role="button" aria-expanded="true" aria-controls="collapse3" rel="nofollow">Webinars<span class="accordion-icon"></span></a></h5>
		                          		</div>

		                          		<div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion" aria-expanded="false" style="">
		                            		<div class="card-body">
		                              			<ul>
		                              				<?php foreach($webinars as $item) :?>
		                              					<li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></li>
		                              				<?php endforeach; ?>
		                              				<?php if(count($webinars) > $posts_limit) :?>
		                              					<li><a href="/insights/webinars/?person=<?php echo $post->ID; ?>">See All Webinars</a></li>
		                              				<?php endif; ?>
		                              			</ul>
		                            		</div>
		                          		</div>
		                        	</div>
		                        <?php endif; ?>
	                                                    
	                      	</div>
						</div>
					<?php endif; ?>

                </div>

                <div class="col-md-3 col-sm-4">
				  	<div class="sidebar-box">
				  		<h2><a href="/ourteam/">Our Team</a></h2>
				  	</div>

		            <?php get_sidebar(); ?>
		        </div>

            </div>
        </section>
    </div>

<?php get_footer(); ?>