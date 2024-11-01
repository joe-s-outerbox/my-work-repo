<?php
/**
 * Template Name: OBX Blog Page Template
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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!--about us header section-->
<div class="obx-blog-wrapper">
<div class="container-fluid aboutus obx-blog-header" style="background-image: url(/wp-content/uploads/2023/09/blue-bkgrnd2.png)">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <div class="obx-blog-h1">
            <h1><?php the_title(); ?></h1>
        </div>
        <!-- <p class="content"><?php the_field('text'); ?></p> -->
        <span class="date"><?php the_date(); ?></span>
        
        <!-- <span class="icon-mail"></span>
        <span class="icon-twitter"></span>
        <span class="icon-linkin"></span>
        <span class="icon-fb"></span>
        <span class="share-this">Share this!</span> -->
        
        
  
    </div>
    </div>
  </div>
</div>

<style>
  .aboutus .h3{
    font-size: 36px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 1.1;
    font-family: 'Abel', sans-serif;
  }

</style>

<!--closing about us header section-->


<!--about us white body-->
<div class="container-fluid whitebg">
  <div class="container">
  <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }
    ?>
    <div class="row">
      <div class="col-sm-8">


<?php the_content(); ?>
        
      </div> <!--closing body column 8-->


<div class="col-sm-4 aboutsidebar">


<a href="https://www.polystarcontainment.com/wp-content/uploads/2015/06/star-track-spec-sheet.pdf" target="_blank"><img id="aboutimage" class="img-responsive productimage animated fadeIn" style="margin-left: auto; margin-right: auto; max-width: 247px;" src="<?php echo get_template_directory_uri(); ?>/images/BrandStarTrack.jpg" alt="Railcar Transloading Containment Plan"/></a>

<a href="https://www.polystarcontainment.com/wp-content/uploads/2015/07/containment-pad-spec-sheet.pdf" target="_blank"><img class="img-responsive productimage animated fadeIn" style="margin-left: auto; margin-right: auto; max-width: 247px;" src="<?php echo get_template_directory_uri(); ?>/images/BrandContainmentPad.jpg" alt="spill containment for transloaders Pad"/></a>

<div class="obx-grey-sidebar-button">
    <div class="border-inlay">
    <a href="https://www.polystarcontainment.com/wp-admin/about.php">View Our Products</a>
    </div>
</div>
<div class="obx-grey-sidebar-button">
    <div class="border-inlay">
    <a href="https://www.polystarcontainment.com/solution/">View the solutions</a>
    </div>
</div>
<!-- <a href="https://www.polystarcontainment.com/product/"><img class="img-responsive productimage animated fadeIn" style="margin-left: auto; margin-right: auto;" src="<?php echo get_template_directory_uri(); ?>/images/viewourproducts.jpg" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/viewourproductsb.jpg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/viewourproducts.jpg'"/></a>

<a href="https://www.polystarcontainment.com/solution/"><img class="img-responsive productimage animated fadeIn" style="margin-left: auto; margin-right: auto;" src="<?php echo get_template_directory_uri(); ?>/images/viewthesolutions.jpg" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/viewthesolutionsb.jpg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/viewthesolutions.jpg'"/></a> -->
	
	<?php 

if(get_field("form")){

$id = get_field('form');

} else {$id=11;}

echo do_shortcode( '[gravityform id='.$id.' title=false description=false]' );

?>

</div>



    </div>
  </div>
</div>












<!--About Home-->

<div class="container-fluid aboutfluid" >
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
<!--start of testimonial slider-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">

<?php if( have_rows('testimonials','option') ): ?>

  <?php 
  $count = 0;
  while( have_rows('testimonials', 'option') ): the_row(); 
if($count==0){$active = "active"; } else {$active = "";}
    $text = get_sub_field('text', 'option');
    $author= get_sub_field('author', 'option');
    ?>

    <div class="item <?php echo $active; ?>">
<p class="gray" style="font-style:italic; font-size:15px; text-align: left; text-shadow: none;"><?php echo $text; ?></p>
<p class="gray" style="font-size:15px; text-align: left; text-shadow: none;">- <?php echo $author; ?></p>
    </div>

  <?php 
  $count++;
  endwhile; 
else:
  ?>

<?php endif; ?>

</div>
</div> <!--closing carousel slider-->
			</div>
			<div class="col-sm-4">
				<img src="<?php echo get_template_directory_uri(); ?>/images/madeinusa.png" class="img-responsive animated fadeIn" style="margin-left: auto; margin-right: auto;">
			</div>
		</div>
	</div>
</div>

<!--closing About HOME-->


<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<!--start of contact us section-->
<div class="container-fluid aboutus2">
  <div class="container">
    <div class="col-sm-12">

<table class="contacttable">
  <tr>
    <td>
    <div class="contactbutton2">

    Contact us to learn more about Polystar's custom <a href="/product/"><span style="color: #8DD300;">secondary containment products</span></a> or visit our <a href="/about-us/resources/"><span style="color: #8DD300;">resource gallery</span></a> to learn more about our <a href="/solution/"><span style="color: #8DD300;">secondary containment solutions</span></a> for SPCC compliance.
     
    </div>
  </td>
  <td>
    <a href="https://www.polystarcontainment.com/contact-us/"><div class="greenbutton" style="padding: 25px 60px 25px 60px; width:300px;">Contact Us</div></a>
  </td>
</tr>
</table>




<div class="contacttablemobile">
    <div class="contactbutton">
      <span style="color: #8DD300;">Contact us today</span> for more information or for a free project quote.
    </div>
    <a href="/contact-us/"><div class="greenbutton" style="padding: 25px 60px 25px 60px; max-width:300px;">Contact Us</div></a>
</div>

</div>
</div>
</div>
</div>
<!--closing contact us section-->
<?php get_footer(); ?>