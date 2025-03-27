/*Backup from /www/dtracing/staging.dtracing.com/wp-content/themes/qala-theme/template-parts/woocommerce*/
<?php
global $wp_query;
$current_term       = get_queried_object();
$terms_array        = get_term_children( $current_term->term_id, 'product_cat' );
$number_of_products = $wp_query->found_posts;
$hero_img_id        = get_field( 'tax-hero-image', $current_term );
$hero_seo_h1       = get_field( 'hero_custom_h1', $current_term );
$hero_background    = ( $hero_img_id ) ? sprintf( 'style="background-image: url(%s)"', esc_url( wp_get_attachment_image_url( $hero_img_id, 'full' ) ) ) : '';
$term_values        = get_term_meta( $current_term->term_id );
$display_type       = $term_values['display_type'][0];
?>
<div class="archive-hero expandable-hero <?php echo esc_attr( $hero_img_id ) ? 'hero-background' : ''; ?>" <?php echo $hero_background; // phpcs:ignore ?>>
	<div class="container">
		<div class="grid grid__vert-align-top">
			<div class="col-l-6">
				<div class="headings-container">
					<div class="headings-aligner">
						<?php
						/**
						 * Before output of heading and meta in hero of category pages.
						 *
						 */
						do_action( 'qala_theme/action/before/category_hero_headings' );
						?>
						<?php get_template_part( 'template-parts/archive-breadcrumbs' ); ?>
						<div class="h1"><?php echo esc_html( $current_term->name ); ?></div>
						<span class="product-count">
							<?php
							/* Translators: %s is product number count. */
							echo esc_html( sprintf( _n( '(%s product)', '(%s products)', $number_of_products, 'qala-theme' ), $number_of_products ) );
							?>
						</span>
						<?php
						/**
						 * After output of heading and meta in hero of category pages.
						 *
						 */
						do_action( 'qala_theme/action/after/category_hero_headings' );
						?>
					</div>
					<?php if ( 0 < count( $terms_array ) || term_description( $current_term->term_id, 'product_cat' ) ) : ?>
						<button class="archive-mobile-toggled-btn"><?php ac_svg( 'chevron-down', true, 'icons/navigation' ); ?></button>
					<?php endif; ?>
				</div>
				<!--
				<div class="archive-mobile-toggled-content">
					<div class="expandable-text">
						<?php
						/**
						 * WooCommerce Core hook
						 *
						 * Used for displaying product archive description
						 */
						do_action( 'woocommerce_archive_description' );
						?>
					</div>
					<button class="expandable-text__link">
						<span class="show-more"><?php esc_html_e( 'Read more', 'qala-theme' ); ?></span>
						<span class="show-less"><?php esc_html_e( 'Read less', 'qala-theme' ); ?></span>
					</button>
				</div>
			`	-->
			</div>
			<div class="col-l-6 toggled-content-wrapper">
				<?php
				/**
				 * Before output of category links in hero of category pages
				 *
				 */
				do_action( 'qala_theme/action/before/category_hero_links' );
				?>

				<?php if ( ( 0 < count( $terms_array ) || have_rows( 'custom_subcategories', $current_term ) ) && 'both' !== $display_type && 'subcategories' !== $display_type ) : ?>
					<div class="archive-mobile-toggled-content">
						<div class="archive-link-list">
							<h4><?php esc_html_e( 'Categories', 'qala-theme' ); ?></h4>
							<?php if ( have_rows( 'custom_subcategories', $current_term ) && get_field( 'show_custom_subcategories', $current_term ) ) : ?>
								<?php while ( have_rows( 'custom_subcategories', $current_term ) ) : ?>
									<?php
									the_row();
									$custom_category_link = get_sub_field( 'category', $current_term );
									?>
									<a href="<?php echo esc_url( $custom_category_link['url'] ); ?>"><?php echo esc_html( $custom_category_link['title'] ); ?></a>
								<?php endwhile; ?>
							<?php else : ?>
								<?php foreach ( $terms_array as $term_id ) : ?>
									<?php
									$term_object = get_term_by( 'id', $term_id, 'product_cat' );
									$term_link   = get_term_link( $term_id );
									?>
									<a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $term_object->name ); ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php
				/**
				 * After output of category links in hero of category pages
				 *
				 */
				do_action( 'qala_theme/action/after/category_hero_links' );
				?>
			</div>
		</div>
	</div>
</div>
