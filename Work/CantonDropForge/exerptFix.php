<?php
/**
 * Theme Name: Canton Drop Forge
 * Author: Outerbox Solutions, Inc.
 * Description: WordPress theme for the Outerbox Base
 
 */
 /* Template Name: Home Template */ 
get_header(); ?>

  
	
<div id="content-wrapper">
	<div id="banner-area">
		<div id="home-carousel">
			<ul>
			<li><div class="b-content" style="background-image:url('<?php the_field('banner_image'); ?>')"><div class="container"><div class="bannerheading"><?php the_field('banner_heading'); ?></div><a href="<?php the_field('button_link'); ?>"><button type="button"><?php the_field('button_text'); ?></button></a></div></div></li>
			<li><div class="b-content" style="background-image:url('<?php the_field('banner_image_2'); ?>')"><div class="container"><div class="bannerheading"><?php the_field('banner_heading_2'); ?></div><a href="<?php the_field('button_link_2'); ?>"><button type="button"><?php the_field('button_text_2'); ?></button></a></div></div></li>
			<li><div class="b-content" style="background-image:url('<?php the_field('banner_image_3'); ?>')"><div class="container"><div class="bannerheading"><?php the_field('banner_heading_3'); ?></div><a href="<?php the_field('button_link_3'); ?>"><button type="button"><?php the_field('button_text_3'); ?></button></a></div></div></li>
			<li><div class="b-content" style="background-image:url('<?php the_field('banner_image_4'); ?>')"><div class="container"><div class="bannerheading"><?php the_field('banner_heading_4'); ?></div><a href="<?php the_field('button_link_4'); ?>"><button type="button"><?php the_field('button_text_4'); ?></button></a></div></div></li>
			<li><div class="b-content" style="background-image:url('<?php the_field('banner_image_5'); ?>')"><div class="container"><div class="bannerheading"><?php the_field('banner_heading_5'); ?></div><a href="<?php the_field('button_link_5'); ?>" target="_blank"><button type="button"><?php the_field('button_text_5'); ?></button></a></div></div></li>
			</ul>
		</div>

<!-- 		<div id="callout">
				<div class="container">
					<img src="<?php the_field('callout_image'); ?>" />
					<div class="callout-content"><strong><?php the_field('main_text'); ?></strong><br/><?php the_field('sub_text'); ?></div>
					<button type="button"><a href="<?php the_field('button_callout_link'); ?>"><?php the_field('button_callout_text'); ?></a></button>
				</div>
			</div> -->

		<div id="home-tiles">
			<div class="container">
				<div class="eighteen columns">
					<div class="row">
						<div class="four columns offset-by-one alpha">
							<a href="<?php the_field('aerospace_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/aerospace-tile.png" alt="<?php the_field('aerospace_alt')?>"/></a>
						</div>
						<div class="four columns">
							<a href="<?php the_field('mechanical_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/mechanical-tile.png" alt="<?php the_field('mechanical_alt')?>"/></a>
						</div>
						<div class="four columns">
							<a href="<?php the_field('transportation_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/transportation-tile.png" alt="<?php the_field('transportation_alt')?>"/></a>
						</div>
						<div class="four columns omega">
							<a href="<?php the_field('oil_field_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/oil-tile.png" alt="<?php the_field('oil_field_alt')?>"/></a>
						</div>
					</div>
					<div class="row">
						<div class="four columns offset-by-one alpha">
							<a href="<?php the_field('power_generation_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/power-tile.png" alt="<?php the_field('power_generation_alt')?>"/></a>
						</div>
						<div class="four columns">
							<a href="<?php the_field('off_highway_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/off-highway-tile.png" alt="<?php the_field('off_highway_alt')?>"/></a>
						</div>
						<div class="four columns">
							<a href="<?php the_field('pumps_&_compressors_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/pumps-tile.png" alt="<?php the_field('pumps_&_compressors_alt')?>"/></a>
						</div>
						<div class="four columns omega">
							<a href="<?php the_field('defense_tile'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/defense-tile.png" alt="<?php the_field('defense_alt')?>"/></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="branding">
		<div class="container">
			<div class="heading">WE WORK WITH SOME OUTSTANDING COMPANIES</div>
			<div class="brand-img">

			<?php $images = get_field('logo_gallery');

if( $images ): ?>
  
        <?php foreach( $images as $image ): ?>
         
          
                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
     
            
         
        <?php endforeach; ?>

<?php endif; ?>

			</div>
		</div>
	</div>

	<?php
           // Intro Content
            $videotitle = get_field('video_heading');
            $videodesc = get_field('video_description');
			$embeddedvideo = get_field('embedded_video');
			$videobg = get_field('video_image');
			$headerbg = get_field('header_image');
        ?>

	<div id="video-section" style="background:url('<?php echo $videobg ?>');
		background-size: cover; background-repeat: no-repeat; background-position: center center;
		text-align: center; padding: 60px;">
			<div class="video-header" style="background:url('<?php echo $headerbg ?>');
				background-size: cover; background-repeat: no-repeat; background-position: center center;
				padding: 40px; color: #ffffff; margin: 0 auto; width: 65%; box-sizing: border-box;" >
				<div class="heading"><?php echo $videotitle ?></div>
				<div class="content" style="margin: 0 10%"><?php echo $videodesc ?></div>
			</div>
			<div class="embedded-video">
				<?php echo $embeddedvideo ?>
			</div>
		</div>
	</div>

	<div id="inner-wrapper-top">
		<div class="container">
			<div class="row blog">
				
				<?php 
        $homelatest = new WP_Query(array( 'post_type' => 'post', 'posts_per_page'=> 2)); 
         ?>

		
        <?php  while ( $homelatest->have_posts() ) : $homelatest->the_post(); ?>
        <?php $articlebg = get_field('article_listing_blocks'); ?>
        
				<div class="nine columns" style="background:url('<?php echo $articlebg ?>')">

					<div class="overlay">
						<div class="heading" id="post-<?php the_ID(); ?>"><?php the_title(); ?></div>

						<?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?> 

                        //<?php echo the_excerpt(); ?> 
				
						<a class="link-more" href="<?php the_permalink() ?>"><button type="button">Read More</button></a>
					</div>

				</div>


			<?php endwhile; ?>
			</div>
		</div>
	</div>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  <?php
           // Intro Content
            $leftheading = get_field('left_heading');
            $rightcontent = get_field('right_content');
            $secondary = get_field('secondary_full_width');
            $readmoretext = get_field('read_more_button_text');
            $readmorelink = get_field('read_more_button_link');
        ?>

		<div id="inner-wrapper-bottom">
			<div class="container">
				<div class="row">
					<div class="nine columns">
						<div class="dieforging">
							<div class="heading"><?php echo $leftheading ?></div>
							<a href="<?php echo $readmorelink ?>"><button type="button"><?php echo $readmoretext ?></button></a>
						</div>
					</div>
					<div class="nine columns maintext">
							<p><?php echo $rightcontent ?></p>
					</div>
				</div>
				<div class="maintext mainfull row">
							<?php echo $secondary ?>
					</div>
			</div>
		</div>
	</div>
</div>



        <?php endwhile; else : ?>
            <p><?php _e( 'This page needs some content.' ); ?></p>
        <?php endif; ?>

		
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "Canton Drop Forge",
  "url": "https://cantondropforge.com/",
  "logo": "https://cantondropforge.com/wp-content/themes/CantonDropForge/frontend/img/logo.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "330-477-4511",
    "contactType": "customer service",
    "areaServed": "US",
    "availableLanguage": "en"
  },
  "sameAs": [
    "https://www.linkedin.com/company/canton-drop-forge-inc-",
    "https://www.facebook.com/CantonDropForge/"
  ]
}
</script>

<?php get_footer(); ?>