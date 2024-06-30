<?php

/**
 * Adds Offers_Widget widget.
 */
class Offers_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Offers_widget', // Base ID
			esc_html__( 'Offers Widget', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'A Offers Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		//echo esc_html__( 'Hello, World!', 'text_domain' );
		if ( is_home() ) {
			$postID = $page_for_posts = get_option( 'page_for_posts' );
		} else {
			$postID = $post->ID;
		}
		if ( have_rows( 'offers_select', $postID ) ): ?>
			<?php while ( have_rows( 'offers_select', $postID ) ): the_row();
				$offer_id = get_sub_field( 'offer' );
				include( get_stylesheet_directory() . '/template-parts/offers/sidebar-offers/alternative-offer-loop.php' );
			endwhile;
		endif;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Offers_Widget
// register Offers_Widget widget
function register_Offers_widget() {
	register_widget( 'Offers_Widget' );
}

add_action( 'widgets_init', 'register_Offers_widget' );

// search form

class Search_Blog_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Blog_search_widget', // Base ID
			esc_html__( 'Blog Search Widget', 'text_domain' ), // Name
			array(
				'description' => esc_html__( 'A Search Widget for blog posts', 'text_domain' ),
				'classname'   => esc_html__( 'sidebar-box search-box' ),
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		//echo esc_html__( 'Hello, World!', 'text_domain' );
		function custom_search_form( $form, $value = "Search", $post_type = 'post' ) {
			$form_value = ( isset( $value ) ) ? $value : attribute_escape( apply_filters( 'the_search_query', get_search_query() ) );
			$form       = '<form method="get" id="searchform" class="blog-searchform" action="' . get_option( 'home' ) . '/" >
    <div class="input-group">
        <input type="hidden" name="post_type" value="' . $post_type . '" />
        <input placeholder="Search perspectives" class="form-control" type="text" value="' . $form_value . '" name="s" id="s" />
        <!-- <input type="submit" id="searchsubmit" value="' . attribute_escape( __( 'Search' ) ) . '" /> -->
    </div>
    </form>';

			return $form;
		}

		echo custom_search_form( null, '', 'post' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Offers_Widget
// register Offers_Widget widget
function register_blog_search_widget() {
	register_widget( 'Search_Blog_Widget' );
}

add_action( 'widgets_init', 'register_blog_search_widget' );

add_action( 'widgets_init', 'semi_custom_sidebar_init' );
function semi_custom_sidebar_init() {
	register_sidebar( array(
		'name'          => __( 'Category Sidebar', 'semicustom' ),
		'id'            => 'category-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all category pages.', 'semicustom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}

// current cats
class Current_Cats_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Current_cats_widget', // Base ID
			esc_html__( 'Current Category Widget', 'text_domain' ), // Name
			array(
				'description' => esc_html__( 'Display Categories From Current Post Type', 'text_domain' ),
				'classname'   => esc_html__( 'sidebar-box' )
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		//echo $args['before_widget']; // no - not needed. Calls builder function twice since you already have this at bottom

		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		//echo esc_html__( 'Hello, World!', 'text_domain' );
		$custom_term          = get_post_type();
		$customPostTaxonomies = get_object_taxonomies( $custom_term );

		//print_r($customPostTaxonomies);

		if ( $custom_term != 'post' ) {
			if ( count( $customPostTaxonomies ) > 0 ) {
				foreach ( $customPostTaxonomies as $tax ) {
					$args = array(
						'hide_empty'   => 1,
						'orderby'      => 'name',
						'show_count'   => 0,
						'pad_counts'   => 0,
						'hierarchical' => 1,
						'taxonomy'     => $tax,
						'title_li'     => ''
					);

   	
					//$tax_name = strtolower($tax);
					//$tax_name = $tax->labels->singular_name;
					//$tax_name = get_term_link($tax);


					?>
                    <section class="custom-sidebar-items">
                        <h2><?php echo $tax; ?></h2>
                        <ul class="sidebar-links">
							<?php wp_list_categories( $args ); ?>
                        </ul>
                    </section>
					<?php
				}
			}

		} else {
			if ( count( $customPostTaxonomies ) > 0 ) {

				$args = array(
					'hide_empty'   => 1,
					'orderby'      => 'name',
					'show_count'   => 0,
					'pad_counts'   => 0,
					'hierarchical' => 1,
					'exclude'      => 104,
					//'taxonomy' => $tax,
					'title_li'     => ''
				);
				?>
                <section class="custom-sidebar-items">
                    <h2>Categories</h2>
                    <ul class="sidebar-links">
						<?php wp_list_categories( $args ); ?>
                    </ul>
                </section>
				<?php

			}

		}
		echo $args['after_widget'];
		unset( $custom_term );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Offers_Widget
// register Offers_Widget widget
function register_current_cats_widget() {
	register_widget( 'Current_Cats_Widget' );
}

add_action( 'widgets_init', 'register_current_cats_widget' );





// Blog categories
class Blog_Cats_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Blog_cats_widget', // Base ID
			esc_html__( 'Blog Categories Widget', 'text_domain' ), // Name
			array(
				'description' => esc_html__( 'Display Blog Categories', 'text_domain' ),
				'classname'   => esc_html__( 'sidebar-box' )
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$blog_categories = get_terms(array(
	    	'taxonomy' => 'category',
	    	'hide_empty' => false,
	    	'child_of' => 2,
		));

		if(!empty($blog_categories)){ ?>
			<?php

				$query_obj = get_queried_object();

			?>
			<div class="sidebar-box">
                <h2>Categories</h2>
                <ul class="sidebar-links">
                	<?php foreach($blog_categories as $cat) :?>
						<li<?php if(isset($query_obj->term_id) && $query_obj->term_id == $cat->term_id) echo ' class="current_page_item"'; ?>><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
		<?php }

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Blog_Cats

// register Blog_Cats widget
function register_blog_cats_widget() {
	register_widget( 'Blog_Cats_Widget' );
}

add_action( 'widgets_init', 'register_blog_cats_widget' );




// Case Studies categories
class Case_Studies_Categories_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Case_Studies_Categories_Widget', // Base ID
			esc_html__( 'Case Studies Categories Widget', 'text_domain' ), // Name
			array(
				'description' => esc_html__( 'Case Studies Categories list', 'text_domain' ),
				'classname'   => esc_html__( 'sidebar-box' )
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$taxonomy = ! empty( $instance['taxonomy'] ) ? $instance['taxonomy'] : null;
		if(!$taxonomy) return;

		echo $args['before_widget'];

		$cs_services = get_terms(array(
	    	'taxonomy' => $taxonomy,
	    	'hide_empty' => false,
		));

		if(is_array($cs_services)){ ?>
			<?php 

				$title = ! empty( $instance['title'] ) ? $instance['title'] : null; 

				$query_obj = get_queried_object();

			?>
			<div class="sidebar-box sidebar-taxonomy sidebar-box-<?php echo $taxonomy; ?>">
				<?php if($title) echo "<h2>". $title ."</h2>"; ?>
                <ul class="sidebar-links">
                	<?php foreach($cs_services as $cat) :?>
						<li<?php if(isset($query_obj->term_id) && $query_obj->term_id == $cat->term_id) echo ' class="current_page_item"'; ?>><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
		<?php }

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$taxonomy = ! empty( $instance['taxonomy'] ) ? $instance['taxonomy'] : esc_html__( 'New taxonomy', 'text_domain' );
		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"><?php esc_attr_e( 'Taxonomy:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>" type="text" value="<?php echo esc_attr( $taxonomy ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['taxonomy'] = ( ! empty( $new_instance['taxonomy'] ) ) ? strip_tags( $new_instance['taxonomy'] ) : '';

		return $instance;
	}

} // class Case_Studies_Categories_Widget

// register Case_Studies_Categories_Widget widget
function register_case_studies_scategories_widget() {
	register_widget( 'Case_Studies_Categories_Widget' );
}

add_action( 'widgets_init', 'register_case_studies_scategories_widget' );




// Case Studies filter
class Case_Studies_Filter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Case_Studies_Filter_Widget', // Base ID
			esc_html__( 'Case Studies Filter Widget', 'text_domain' ), // Name
			array(
				'description' => esc_html__( 'Case Studies Filter', 'text_domain' ),
				'classname'   => esc_html__( 'sidebar-box' )
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$cs_services = get_terms(array(
	    	'taxonomy' => 'service',
	    	'hide_empty' => true,
		));

		$cs_industries = get_terms(array(
	    	'taxonomy' => 'industry',
	    	'hide_empty' => true,
		));

		if(is_array($cs_services) || is_array($cs_industries)){ ?>
			<?php 

				$title = ! empty( $instance['title'] ) ? $instance['title'] : null; 

				$query_obj = get_queried_object();
				//print_r($query_obj);

				if(isset($query_obj->taxonomy)){
					if($query_obj->taxonomy == 'service'){
						foreach($cs_services as $service){
							if($service->term_id == $query_obj->term_id){
								$selected_service = $service->name;
							}
						}
					}
					if($query_obj->taxonomy == 'industry'){
						foreach($cs_industries as $industry){
							if($industry->term_id == $query_obj->term_id){
								$selected_industry = $industry->name;
							}
						}
					}
				}

				$case_studies_landing_url = '/about-us/case-studies/';

			?>
			<div class="sidebar-box cs-filters">
				<?php if($title) echo "<h2>". $title ."</h2>"; ?>
				
				<?php if(isset($query_obj->taxonomy) && in_array($query_obj->taxonomy, array('service', 'industry'))) :?>
					<div class="cs-filters-row">
						<a href="<?php echo $case_studies_landing_url; ?>" class="cs-curr-filters">ALL</a>
					</div>
				<?php endif; ?>
				
				<?php if(is_array($cs_services)) :?>
					<div class="cs-filters-row">
						<div class="cs-filter">
							<div class="cs-selected">
								<?php echo isset($selected_service) ? $selected_service : 'SERVICES'; ?>
							</div>
							<ul>
								<?php foreach($cs_services as $service) :?>
									<li><a href="<?php echo get_category_link($service->term_id); ?>"><?php echo $service->name; ?></a></li>
								<?php endforeach; ?>
								<?php if(isset($selected_service)) :?>
									<li><a href="<?php echo $case_studies_landing_url; ?>">ALL</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>

				<?php if(is_array($cs_industries)) :?>
					<div class="cs-filters-row">
						<div class="cs-filter">
							<div class="cs-selected">
								<?php echo isset($selected_industry) ? $selected_industry : 'INDUSTRIES'; ?>								
							</div>
							<ul>
								<?php foreach($cs_industries as $industry) :?>
									<li><a href="<?php echo get_category_link($industry->term_id); ?>"><?php echo $industry->name; ?></a></li>
								<?php endforeach; ?>
								<?php if(isset($selected_industry)) :?>
									<li><a href="<?php echo $case_studies_landing_url; ?>">ALL</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
            </div>
		<?php }

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

} // class Case_Studies_Filter_Widget

// register Case_Studies_Filter_Widget widget
function register_case_studies_filter_widget() {
	register_widget( 'Case_Studies_Filter_Widget' );
}

add_action( 'widgets_init', 'register_case_studies_filter_widget' );
