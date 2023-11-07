<?php
/**
 * Template Name: HomePage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!--Welcome Home page-->

<div class="container-fluid welcomefluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<div class="white animated fadeInLeft">
<?php the_field('welcome_message', 'option'); ?>
				</div>
			</div>
			<div class="col-sm-5 welcomecontainer">
    <a href="https://www.polystarcontainment.com/product/" style="text-decoration:none;"><div class="orangebutton obx-button animated fadeIn">SEE OUR PRODUCTS</div></a><a href="https://www.polystarcontainment.com/contact-us/" style="text-decoration:none;"><div class="orangebutton obx-button clear animated fadeIn">REQUEST A QUOTE</div></a>
</div>
		</div>
	</div>
</div>

<!--closing welcome homepage-->



<!--contact section-->

<div class="container-fluid contactfluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<div class="white animated fadeInLeft">
<?php the_field('contact_us_message', 'option'); ?>
				</div>


			</div>
			<div class="col-sm-5 welcomecontainer">
				<a href="https://www.polystarcontainment.com/storage-building-containment/" style="text-decoration:none;"><div class="orangebutton animated fadeIn">GET STARTED</div></a>
				</div>
			</div>
		</div>
	</div>


<!--end of contact us section-->




<!--product section-->

<div class="container-fluid productfluid">
	<div class="container">
		<div class="row">

<div class="col-sm-4 productcolumn">
	<div class="white animated fadeInCenter">
		<h2>
			Secondary Containment Products
		</h2>
	</div>
	<a href="/product/"><img src="<?php echo get_template_directory_uri(); ?>/images/polydikempe_home.jpg" alt="Secondary Containment Systems" class="img-responsive productimage2 animated fadeIn" style="margin-left: auto; margin-right: auto;"></a>


<?php $args = array( 'post_type' => 'product', 'posts_per_page' => 4 ); $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>

<a href="<?php echo get_permalink(); ?>"><p class="white"><?php echo get_the_title(); ?></p></a>

<?php  endwhile; ?>

	<hr style="max-width: 85%;">

	<a href="/product/"><p class="white">Browse Our Products</p></a>
</div>

<div class="col-sm-4  productcolumn">
	<div class="white animated fadeInCenter">
		<h2>
			Spill Prevention Solutions
		</h2>
	</div>
	<a href="/solution/"><img src="<?php echo get_template_directory_uri(); ?>/images/StarTrack_home.jpg" alt="Secondary Spill Containment" class="img-responsive productimage2 animated fadeIn" style="margin-left: auto; margin-right: auto;"></a>

<?php $args = array( 'post_type' => 'solution', 'posts_per_page' => 4 ); $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>

<a href="<?php echo get_permalink(); ?>"><p class="white"><?php echo get_the_title(); ?></p></a>

<?php  endwhile; ?>

	<hr style="max-width: 85%;">

	<a href="/solution/"><p class="white">Find a Solution</p></a>
</div>

<div class="col-sm-4 productcolumn">
	<div class="white animated fadeInCenter">
		<h2>
			Secondary Containment Industries
		</h2>
	</div>
	<a href="/industry/"><img src="<?php echo get_template_directory_uri(); ?>/images/military-truck.jpg" alt="Secondary Containment System" class="img-responsive productimage2 animated fadeIn" style="margin-left: auto; margin-right: auto;"></a>


<?php $args = array( 'post_type' => 'industry', 'posts_per_page' => 4 ); $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>

<a href="<?php echo get_permalink(); ?>"><p class="white"><?php echo get_the_title(); ?></p></a>

<?php  endwhile; ?>

	<hr style="max-width: 85%;">

	<a href="/industry/"><p class="white">Explore Industries</p></a>
</div>


		</div>
	</div>
</div>

<!--end of product section-->




<!--CTA Home-->
<div class="container-fluid welcomefluid2">
	<div class="container">
<div class="white animated fadeInCenter">
		<center><h2>
	Trust Polystar for Secondary Containment &amp; Spill  Prevention
</h2>
<p>
	Does your job require a standard spill containment system or a customized containment system built to match your exact specification? No matter your containment needs, Polystar has a solution that's right for you. Let us know how we can help.
</p></center>
		</div>
		<div class="row">
			<div class="col-sm-6 ctaleft">
<a href="https://www.polystarcontainment.com/contact-us/" style="text-decoration:none;"><div class="greenbuttonlarge2 cta1 animated fadeIn">CONTACT US</div></a>
			</div>
			<div class="col-sm-6 ctaright">
				<a href="https://www.polystarcontainment.com/request-a-quote/" style="text-decoration:none;"><div class="greenbuttonlarge2 cta2 animated fadeIn">REQUEST A QUOTE</div></a>
			</div>
		</div>
	</div>
</div>

<!--closing CTA HOME-->





<!--BLOG section-->

<div class="container-fluid blogfluid">
	<div class="container">
		<div class="row">
	<div class="col-sm-4 blogcolumn">
	<a href="/concrete-vs-containment-pads/"><div class="truck fadeInLeft">
		<h2 class="blogfont">Concrete</br>
vs</br>
Containment Pad</h2>
	</div></a>
</div>
<div class="col-sm-4 blogcolumn">
	<a href="/industry/military-government-secondary-containment-systems/"><div class="military">
		<h2 class="blogfont">
			Our
Commitment
to the U.S. Military</h2>
	</div></a>
</div>
<div class="col-sm-4 blogcolumn">
	<a target="_blank" href="https://blog.polystarcontainment.com/"><div class="blog"></div></a>
</div>
		</div>
	</div>
</div> <!--closing blogfluid-->

<!--end of BLOG section-->





<!--About Home-->

<div class="container-fluid aboutfluid" >
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
<div class="gray" style="font-style:italic; font-size: 15px;">
<?php the_field('footer_area', 'option'); ?>
</div>


			</div>
			<div class="col-sm-4">
				<img alt="Made In The USA Logo with American Flag" src="<?php echo get_template_directory_uri(); ?>/images/madeinusa.png" class="img-responsive animated fadeIn" style="margin-left: auto; margin-right: auto;">
			</div>
		</div>
	</div>
</div>

<!--closing About HOME-->

<?php get_footer(); ?>