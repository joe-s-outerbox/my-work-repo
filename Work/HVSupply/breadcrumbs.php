<?php defined( 'ABSPATH' ) or die(); ?>
<?php
// Include files required for initialization.
require_once( ABSPATH . 'wp-settings.php' );
?>
<div class="breadcrumb-inner-wrap" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php

		if ( function_exists( 'bcn_display' ) ) //this runs off the Breadcrumb NavXT plugin {
		{
			$the_varr = get_theme_mod( 'jpt_leadership_section_parent' );
			$post_type = get_post_type();
			
			if ( is_singular('leadership') ) {

				// echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				// echo ' &gt '; 
				// echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Leadership." href="/ourteam/"><span property="name">Leadership</span></a><meta property="position" content="2"></span>';
				
				/*three statements above and conditional below have been replaced by these lines*/ 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to About Us." href="/about-us/"><span property="name">About Us</span></a><meta property="position" content="2"></span>';
				echo ' &gt ';
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Our Team." href="/about-us/ourteam/"><span property="name">Our Team</span></a><meta property="position" content="3"></span>';
				echo ' &gt ';
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="" href=""><span property="name">'. single_post_title() .'</span></a><meta property="position" content="4"> </span>';
				
				// $categories = get_the_terms($post->ID, 'leadership-category');
				// if($categories){
					 

				// 	leave commented out if reverting from above /*$cat_link = '/ourteam/#(grid|third-filter)=.senior-leadership';
				// 	leave commented out if reverting from above echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to '. $categories[0]->name .'." href="'. $cat_link .'"><span property="name">'. $categories[0]->name .'</span></a><meta property="position" content="2"></span>';*/
				// 	echo '<span property="itemListElement" typeof="ListItem">'. $categories[0]->name .'</span><meta property="position" content="2"></span>';
					
				// }

				// echo ' &gt ';
				// echo get_the_title();

			} elseif ( is_singular('case-study') ) {
				
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="About Us" href="/about-us/"><span property="name">About Us</span></a><meta property="position" content="2"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Case Studies" href="/about-us/case-studies/"><span property="name">Case Studies</span></a><meta property="position" content="3"></span>';
				// echo ' &gt '; 
				// echo get_the_title();

			} elseif ( is_singular('position') ) {
				
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="About Us" href="/about-us/"><span property="name">About Us</span></a><meta property="position" content="2"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Careers" href="/about-us/careers/"><span property="name">Careers</span></a><meta property="position" content="3"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Join Our Team" href="/about-us/careers/join-our-team/"><span property="name">Join Our Team</span></a><meta property="position" content="3"></span>';
				// echo ' &gt '; 
				// echo get_the_title();

			} 
			elseif ( is_single() ) {
				
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="About Us" href="/trivista-insights/"><span property="name">Trivista Insights</span></a><meta property="position" content="2"></span>';
				echo ' &gt '; 
				echo get_the_title();

			} 
			elseif ( is_archive() ) {
				$category = single_term_title("", false);
				
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to TriVista." href="'. get_home_url() .'"><span property="name">TriVista</span></a><meta property="position" content="1"></span>';
				echo ' &gt '; 
				echo '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="About Us" href="/trivista-insights/"><span property="name">Trivista Insights</span></a><meta property="position" content="2"></span>';
				if( $category != 'TriVista Insights') {
				echo ' &gt '; 
				echo $category;
				}
			} else {
				bcn_display();
			}

		}

	?>
</div>