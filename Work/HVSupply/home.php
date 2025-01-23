<?php

add_action( 'genesis_meta', 'ally_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function ally_home_genesis_meta() {

	if ( is_active_sidebar( 'slider' ) || is_active_sidebar( 'welcome' ) || is_active_sidebar( 'home-feature-1' ) || is_active_sidebar( 'home-feature-2' ) || is_active_sidebar( 'home-feature-3' ) || is_active_sidebar( 'home-middle-wide' ) || is_active_sidebar( 'home-middle-sidebar-1' ) ||  is_active_sidebar( 'home-middle-sidebar-2' ) || is_active_sidebar( 'home-bottom-sidebar-1' ) || is_active_sidebar( 'home-bottom-sidebar-2' ) || is_active_sidebar( 'home-bottom-sidebar-3' ) || is_active_sidebar( 'home-bottom-sidebar-4' ) ||  is_active_sidebar( 'home-bottom-wide' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_after_header', 'ally_home_loop_helper_top' );
		add_action( 'genesis_after_header', 'ally_home_loop_helper_feature' );		
		add_action( 'genesis_after_header', 'ally_home_loop_helper_middle' );
		add_action( 'genesis_after_header', 'ally_home_loop_helper_bottom' );
		add_action( 'genesis_after_header', 'ally_home_loop_helper_bottom_wide' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	}
}


/**
 * Display widget content for "slider" and "welcome" sections.
 *
 */
function ally_home_loop_helper_top() {
			
		if ( is_active_sidebar( 'slider' ) ) {
			echo '<div id="slider-wrap"><div class="slider-inner">';
			dynamic_sidebar( 'slider' );
			echo '</div><!-- end .slider-wrap --></div><!-- end #slider-inner -->';
		}
		
		if ( is_active_sidebar( 'welcome' ) ) {
			echo '<div id="welcome"><div class="welcome-inner">';
			dynamic_sidebar( 'welcome' );
			echo '</div><!-- end .welcome-inner --></div><!-- end #welcome -->';
		}
		
}


/**
 * Display widget content for the "Home Feature" section.
 *
 */
function ally_home_loop_helper_feature() {

	if ( is_active_sidebar( 'home-feature-1' ) || is_active_sidebar( 'home-feature-2' ) || is_active_sidebar( 'home-feature-3' ) || is_active_sidebar( 'home-feature-4' ) ) {

		echo '<div id="home-feature-wrap">';
				
		if ( is_active_sidebar( 'home-feature-1' ) ) {
			echo '<div class="home-feature-1">';
			dynamic_sidebar( 'home-feature-1' );
			echo '</div><!-- end .home-feature-1 -->';
		}		
		
		if ( is_active_sidebar( 'home-feature-2' ) ) {
			echo '<div class="home-feature-2">';
			dynamic_sidebar( 'home-feature-2' );
			echo '</div><!-- end .home-feature-2 -->';
		}

		if ( is_active_sidebar( 'home-feature-3' ) ) {
			echo '<div class="home-feature-3">';
			dynamic_sidebar( 'home-feature-3' );
			echo '</div><!-- end .home-feature-3 -->';
		}
		
		echo '</div><!-- end #home-feature-wrap -->';

	}
		
}


/**
 * Display widget content for "Home Middle" section.
 *
 */
function ally_home_loop_helper_middle() {
	
	if ( is_active_sidebar( 'home-middle-wide' ) || is_active_sidebar( 'home-middle-sidebar-1' ) || is_active_sidebar( 'home-middle-sidebar-2' ) ) {
		
		echo '<div id="home-middle">';	
		
		if ( is_active_sidebar( 'home-middle-wide' ) ) {
				echo '<div class="home-middle-wide">';
				dynamic_sidebar( 'home-middle-wide' );
				echo '</div><!-- end .home-middle-wide -->';
			}				
		
		if ( is_active_sidebar( 'home-middle-sidebar-1' ) ) {
			echo '<div class="home-middle-sidebar-1">';
			dynamic_sidebar( 'home-middle-sidebar-1' );
			echo '</div><!-- end .home-middle-sidebar-1 -->';
		}				
	
		if ( is_active_sidebar( 'home-middle-sidebar-2' ) ) {
			echo '<div class="home-middle-sidebar-2">';
			dynamic_sidebar( 'home-middle-sidebar-2' );
			echo '</div><!-- end .home-middle-sidebar-2 -->';
		}	

		echo '</div><!-- end #home-middle -->';				
		
	}
	
}


/**
 * Display widget content for the "Home Bottom" section.
 *
 */
function ally_home_loop_helper_bottom() {
	
	if ( is_active_sidebar( 'home-bottom-sidebar-1' ) || is_active_sidebar( 'home-bottom-sidebar-2' ) || is_active_sidebar( 'home-bottom-sidebar-3' ) || is_active_sidebar( 'home-bottom-sidebar-4' ) ) {
		
		echo '<div id="home-bottom">';	
		
		if ( is_active_sidebar( 'home-bottom-sidebar-1' ) ) {
			echo '<div class="home-bottom-sidebar-1">';
			dynamic_sidebar( 'home-bottom-sidebar-1' );
			echo '</div><!-- end .home-bottom-sidebar-1 -->';
		}				
	
		if ( is_active_sidebar( 'home-bottom-sidebar-2' ) ) {
			echo '<div class="home-bottom-sidebar-2">';
			dynamic_sidebar( 'home-bottom-sidebar-2' );
			echo '</div><!-- end .home-bottom-sidebar-2 -->';
		}
		
		if ( is_active_sidebar( 'home-bottom-sidebar-3' ) ) {
			echo '<div class="home-bottom-sidebar-3">';
			dynamic_sidebar( 'home-bottom-sidebar-3' );
			echo '</div><!-- end .home-bottom-sidebar-3 -->';
		}	
		
		if ( is_active_sidebar( 'home-bottom-sidebar-4' ) ) {
			echo '<div class="home-bottom-sidebar-4">';
			dynamic_sidebar( 'home-bottom-sidebar-4' );
			echo '</div><!-- end .home-bottom-sidebar-4 -->';
		}	

		echo '</div><!-- end #home-bottom -->';				
		
	}
	
}


/**
 * Display widget content for the "Home Bottom" section.
 *
 */
function ally_home_loop_helper_bottom_wide() {	
		
		if ( is_active_sidebar( 'home-bottom-wide' ) ) {
			echo '<div id="home-bottom-wide"><div class="wrap">';
			dynamic_sidebar( 'home-bottom-wide' );
			echo '</div><!-- end .wrap --></div><!-- end #home-bottom-wide -->';
		}		
	
}

genesis();