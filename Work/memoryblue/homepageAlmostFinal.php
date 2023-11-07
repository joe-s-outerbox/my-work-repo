<?php
/*
* Template Name: Home Page Mk2
* Template Post Type: page
*/
get_header(); 
the_post(); 
$hero_type = get_field( 'hero_cta_type' );
$video = get_field( 'hero_video_url' );




if ( has_post_thumbnail() )
{
	$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	$banner = $img[0];
}
?>
<style>.obx-section {
    margin-bottom: 80px;
    padding: 0 20px;
}
.obx-section h2 {
    font-family: "Chronicle";
}
.obx-section p,
.obx-section li {
    line-height: 1.4;
    font-size: 18px;
    font-family:Georgia
}
.obx-section a:hover,
.obx-section details:hover {
    opacity: .8;
}
.obx-section .flex-row {
    max-width: 1101px;
    margin: auto;
}
.obx-section.blue-gradient {
    background: transparent linear-gradient(109deg, #325AB8 0%, #223E7D 100%) 0% 0% no-repeat padding-box;
    color: #fff;
    padding: 80px 20px;
    text-align: center;
	margin-bottom: 0;
}
.obx-section .blue-check-list {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1102px;    
    margin: auto;
}
.obx-section.blue-gradient h2 {
    font-size: 42px;
    max-width: 820px;
    margin: 0 auto 18px;
    line-height: 1.1;
}
.obx-section.blue-gradient p {
    max-width: 800px;
    margin: 0 auto 40px;
}

.obx-section.blue-gradient ul {
    text-align: left;
    vertical-align: text-top;
    display: inline-block;
    list-style-type: none;
    text-indent: -1.75em;
    margin-bottom: 0;
    padding-left: 80px;
}
.obx-section.blue-gradient li {
    margin-bottom: 20px;
    width: 280px;
}
.obx-section.blue-gradient li::before {
    content: url(https://memoryblue.com/wp-content/uploads/2023/05/check-box.svg);
    margin-right: 10px;
}
.obx-section.blue-gradient li:last-child {
    margin-bottom: 0;
}
.obx-section.image-rows {
    padding: 80px 0;
    background: #EDF7FA;
}

.obx-section .flex-row {
    display: flex;
    margin-bottom: 80px;
    justify-content: space-between;
	column-gap: 70px;
}
.obx-section .flex-body {
    max-width: 500px;
	width: 100%;
}
.obx-section.image-rows .flex-row .flex-body:first-child {
  padding-bottom: 0;
}
.obx-section.image-rows .flex-row:last-child {
  margin-bottom: 0;
}
.obx-section .flex-body h2 {
    font-family: "Chronicle Display";
    font-size: 30px;
    font-weight: 700;
    color: #223E7D;
    line-height: 1.3;
    margin-bottom: 14px;
}
.obx-section .flex-body p {
    margin-bottom: 30px;
}
.obx-section.image-rows .flex-row .flex-body p:last-child {
  margin-bottom: 0;
}
.obx-section .obx-list ul {
    list-style-position: inside;
    margin-left: 20px;
    list-style-type:none;
}
.obx-section .obx-list li {
    line-height: 1.2;
    margin-bottom: 10px;
}
.obx-section .obx-list li::before {
    content: "\2022";
    color: #ABB8C3;
    font-size: 21px;
    padding-right: 10px;
}
.obx-section .flex-image {
    align-self: center;
}
.obx-section .flex-image img {
    object-fit: cover;
    aspect-ratio: 528 / 380;
	max-height: 380px;
}
.obx-section.flex-boxes {
    background: #EDF7FA;
    padding: 80px;
}
.obx-section.flex-boxes :last-child {
    margin-bottom: 0;
}
.obx-section.obx-video {
    background: #EDF7FA;
    padding: 80px 20px;
    text-align: center;
    margin-bottom: 0;
}
.obx-section.obx-video .obx-container 
{max-width: 870px;
margin: auto;}
.obx-section.obx-video h2,
.obx-section.obx-video p {
    max-width: 750px;
}
.obx-section.obx-video h2 {
    font-size: 42px;
    color: #223E7D;
    font-family: 'Chronicle Deck A';
    line-height: 1;
    margin: 0 auto 18px;
}
.obx-section.obx-video p {
    line-height: 1.6;
    margin: 0 auto 40px;
}
.obx-section.obx-cta {
      margin-bottom: 0;
  }
.obx-section.obx-cta span.superheader {
    display: block;
    text-transform: uppercase;
    font-family: 'Montserrat';
    font-size: 18px;
    margin-bottom: 18px;
    color: #D06238;
}
.obx-section.obx-cta .flex-row {
    max-width: 1148px;
    margin: auto;
}
.obx-section.obx-cta h2 {
    font-size: 40px;
    line-height:1.1;
}
.obx-section.obx-cta p {
    margin-bottom: 30px;
}
.obx-section.obx-cta .subheader {
    display: block;
    font-family: 'Montserrat';
    font-size: 16px;
    font-weight:600;
    margin-bottom: 14px;
}
.obx-section.obx-cta .flex-row {
  padding-bottom: 50px;
}
.obx-section.obx-cta .flex-body{
    max-width: 550px;
}
.obx-section.obx-cta .flex-image {
    flex-basis: 528px;
}
.obx-section .obx-button {
    display: inline-block;
    background: linear-gradient(90deg, #52ADCC 0%, #3358AC 100%) 0% 0%;
    color: white;
    font-size: 16px;
    font-family: 'Montserrat';
    font-weight: 500;
	text-transform: uppercase;
    padding: 17px 25px;
    min-width: 250px;
    text-align: center;
    border-radius: 50px;
}
.obx-section.obx-cta .obx-button:hover {
    background: #52ADCC;
}
.obx-section.obx-cta :first-child a{
    margin-right: 20px;
    margin-bottom: 10px;
}
.obx-section.obx-faq{
    background: #223E7D;
    padding: 80px 20px;
	margin-bottom: 0;
}
.obx-section.obx-faq .obx-container {
    max-width: 870px;
    margin: auto;
    color: #fff;
}
.obx-section.obx-faq h2 {
    font-size: 30px;
    font-family: 'Chronicle Deck A';
    font-weight: 600;
    margin-bottom: 14px;
}
.obx-section.obx-faq p {
    margin-bottom: 40px;
}
.obx-section.obx-faq h3 {
    color: #00CCFF;
    font-size: 18px;
    font-family: 'Montserrat';
    font-weight: 500;
}
.obx-section.obx-faq h3:after {
content: url(https://memoryblue.com/wp-content/uploads/2023/05/icon-plus.svg);
    float: right;
}
.obx-section.obx-faq details[open] h3:after {
content: url(https://memoryblue.com/wp-content/uploads/2023/05/icon-minus.svg);
    float: right;
}
.obx-section .faq-answer p {
    padding: 14px 0 0;
    margin-bottom: 30px;
}
.obx-section .faq-item {
    cursor: pointer;
    margin-bottom: 30px
}
.section.section--testimonial-video {
    margin-bottom: 0;    
}
.section .best-alumni {
  padding: 0 0 0 18px;
}
.section .best-alumni__content {
  padding-bottom: 54px
}
.section.section--light-blue.section--cards-primary .section__content{
    align-self: center;
}
.intro .intro__btn {
	background: linear-gradient(90deg, #52ADCC 0%, #3358AC 100%) 0% 0%;
}
@media only screen and (max-width: 1024px) {
    .obx-section .blue-check-list ul,
    .obx-section .blue-check-list {
        display: block;
        padding: 0 0 0 26px;
    }
    .obx-section .blue-check-list li {
        margin:0 auto 10px !important;
    }
    .obx-section .flex-row > div {
    flex-basis: 50%;
    padding: 0 0 0 20px;
    }
    .obx-section .flex-row {
		column-gap: 0;
	}

        .obx-section.obx-cta a {
        display: block;
    }
}
@media only screen and (max-width: 768px) {
    .obx-section {
        margin-bottom: 40px;
    }
    .obx-section.blue-gradient,
    .obx-section.obx-video,
    .obx-section.obx-faq {
        padding: 40px 25px;
    }
    .obx-section .flex-row {
        flex-wrap: wrap;
        margin: auto;
		padding: 0 0 20px;
    }
    .obx-section .flex-row > div {
        flex-basis: fit-content;
        padding: 0;

        }
	.obx-section .flex-row .flex-body {
		max-width: 568px;
		padding: 0 20px 30px;
		margin: auto;
		order: 2;
  
      }
    .obx-section .flex-row .flex-image {
        max-width: 528px;
        margin: 0 auto 30px;
        order: 0;
    }
 
	.obx-section.obx-cta {
        padding: 0
      }
    .obx-section.obx-cta :first-child a{
        margin-right:0;
    }
    .obx-section.blue-gradient h2,
    .obx-section .flex-body h2,
    .obx-section.obx-cta h2,
    .obx-section.obx-video h2,
    .obx-section.obx-faq h2{
        font-size: 30px;
        line-height: 1;
    }
	.section .best-alumni {
      padding-left: 0px;
      }
}
@media only screen and (max-width: 600px) {
    .obx-section.image-rows {
        padding: 0;
    }
    .obx-section.image-rows .flex-row:last-child{
        padding-bottom:0;
    }
    .section .best-alumni {
        padding: 0px;
    }
}
</style>
	
	
	<div class="main">
		<div class="intro intro--video" style="<?php if ( !$video && $banner ) echo 'background-image: url(' . esc_attr( $banner ) . ')'; ?>">
			<?php if ( $video ) : ?>
			<div class="intro__video">
				<video autoplay loop muted playsinline>
					<source src="<?php echo $video; ?>" type="video/mp4"></source>
				</video>
			</div><!-- /.intro__video -->
			<?php else : ?>
			<?php endif; ?>

			<div class="intro__inner">
				<div class="shell">
					<div class="intro__content">
						
						<?php the_content(); ?>

						<?php if ( 'video' != $hero_type ) : ?>

						<a href="<?php echo get_field( 'hero_cta_url' ); ?>" class="intro__btn clear">
							<?php echo get_field( 'hero_cta_label' ); ?>
							<span>
								<i class="material-icons">arrow_forward</i>
							</span>
						</a>
						<?php if ( get_field( 'additional_buttons' ) ) : $buttons = get_field( 'additional_button_data' ); foreach ( $buttons as $btn ) : ?>
						<a href="<?php echo esc_url( $btn['url'] ); ?>" class="intro__btn clear">
							<?php echo $btn['label']; ?>
							<span>
								<i class="material-icons">arrow_forward</i>
							</span>
						</a>
						<?php endforeach; endif; ?>

						<?php endif; ?>

					</div><!-- /.intro__content -->

					<div class="intro__awards">
						<ul class="list-awards">
							<li>
								<?php
									$url = get_template_directory_uri() . '/css/images/temp/inc-5000.png';
									if ( $img = get_field( 'awards_image_1', 'option' ) )
									{
										$url = $img['url'];
									}
									else
									{
										$img = [ 'alt' => '[award logo]' ];
									}
								?>
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
							</li>
							<li>
								<?php
									$url = get_template_directory_uri() . '/css/images/temp/inc-5000.png';
									if ( $img = get_field( 'awards_image_2', 'option' ) )
									{
										$url = $img['url'];
									}
									else
									{
										$img = [ 'alt' => '[award logo]' ];
									}
								?>
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
							</li>
						</ul><!-- /.list-awards -->
					</div><!-- /.intro__awards -->
				</div><!-- /.shell -->
			</div><!-- /.intro__inner -->
			
			<?php if ( 'video' == $hero_type ) : ?>

			<div class="intro__actions">
				<div class="shell">
					<div class="intro__btn-video">
						<div class="image">
							<i class="material-icons">play_arrow</i>
						</div><!-- /.image -->

						<div class="content">
							<span class="sm">Watch Video</span>
							<span class="lg"><?php echo get_field( 'hero_cta_label' ); ?></span>
						</div><!-- /.content -->

						<a href="<?php echo get_field( 'hero_cta_url' ); ?>" class="link-video-popup"></a>
					</div><!-- /.intro__btn-video -->
				</div><!-- /.shell -->
			</div><!-- /.intro__actions -->
			<?php endif; ?>
		</div><!-- /.intro -->

		<div class="main__inner">


			
			<?php if ( get_field( 'show_by_the_numbers') ) : ?>
			
			<div class="section section--by-the-numbers">
				<div class="shell">
					<div class="section__inner">
						
						<h2 class="faux-h4"><?php echo get_field( 'by_the_numbers_title' ); ?></h2>
						<ul>
						<?php if ( $numbers = get_field( 'numbers' ) ) : foreach ( $numbers as $item ) : ?>
							<li>
								<strong class="number"><span><?php echo $item['number']; ?></span><?php echo $item['after_number']; ?></strong>
								<p><?php echo $item['text']; ?></p>
							</li>
							<?php endforeach; endif; ?>
						</ul>
						
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
			
			<?php endif; ?>

			<?php if ( get_field( 'show_callouts' ) ) : ?>

			<div class="section">
				<div class="shell">
					<div class="section__inner">
						<ul class="services">
							<?php foreach ( get_field( 'callouts' ) as $callout ) : ?>
							<li class="service">
								<i class="icon icon-<?php echo esc_attr( $callout['icon'] ); ?>">
									<svg>
										<use xlink:href="#<?php echo esc_attr( $callout['icon'] ); ?>"></use>
									</svg>
								</i>
								<?php echo $callout['content']; ?>
							</li><!-- /.service -->
							<?php endforeach; ?>
						</ul><!-- /.services -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
			
			<?php endif; ?>
			
			<?php if ( get_field( 'enable_video_section' ) ) : ?>
			<?php
				$video_url = get_field( 'video_section_youtube_url' ); 
				$banner = get_template_directory_uri() . '/css/images/temp/testimonial-bg-2.jpg';;
				if ( $att_id = get_field( 'video_section_bg_image' ) )
				{
					$img = wp_get_attachment_image_src( $att_id, 'full' );
					$banner = $img[0];
				}
			?>
			<div class="section section--testimonial-video">
				<div class="bg" style="background-image:url('<?php echo $banner; ?>')"></div>
				<div class="shell">
					<?php echo get_field( 'video_section_intro' ); ?>
					<p><a href="<?php echo esc_url( $video_url ); ?>" class="link-video-popup"><i class="material-icons">play_arrow</i><?php echo get_field( 'video_section_button_text' ); ?></a></p>
				</div>
			</div>
			<?php endif; ?>
			<div class="obx-section full-width blue-gradient">
            <h2><?php echo get_field('blue_heading'); ?></h2>
				<?php echo get_field('blue_content'); ?>
                <div class="blue-check-list">
                 	<?php echo get_field('blue_list'); ?>	
                </div>
        	</div>
			<div class="obx-section image-rows">
        
					<?php
						if( have_rows('flex_image_row') ):
							while( have_rows('flex_image_row') ) : the_row();
								$image_side = get_sub_field('image_side');
								$image_url = get_sub_field('image_url');
								$flexrow_header = get_sub_field('flexrow_header');
								$flexrow_content = get_sub_field('flexrow_content');
								echo '<div class="flex-row">';

									if ($image_side == 'left') {
										echo '<div class="flex-image">';
										echo "<img src='$image_url' alt=''> </div>";
										echo "<div class='flex-body'>";
										echo "<h2>$flexrow_header</h2>";
										echo $flexrow_content . "</div>";
									}
									else {
										echo "<div class='flex-body'>";
										echo "<h2>$flexrow_header</h2>";
										echo $flexrow_content . "</div>";
										echo '<div class="flex-image">';
										echo "<img src='$image_url' alt=''> </div>";
									}
								echo '</div>';

							endwhile;
						endif;
					?>


				</div>
			</div>
			<div class="section">
				<div class="shell">
					<div class="section__inner">
						<div class="best-alumni">
							<div class="best-alumni__aside">
								<?php
									$bg = wp_get_attachment_image_src( get_field( 'alumni_image' ), 'full' );
									$video = wp_get_attachment_image_src( get_field( 'alumni_image_video' ), 'full' );
								?>
								<img src="<?php echo $bg[0]; ?>" alt="">
								<a href="<?php echo get_field( 'alumni_video_url' ); ?>" class="popup-video link-video-popup">
									<img src="<?php echo $video[0]; ?>" alt="">
									<span class="popup-video-overlay">
										<i class="material-icons">play_arrow</i>
									</span>
								</a>
							</div><!-- /.best-alumni__aside -->

							<div class="best-alumni__content">
								<div class="best-alumni__inner">
									<?php echo get_field( 'talent_content' ); ?>
									<div class="best-alumni__actions">
										
										<?php foreach ( get_field( 'talent_buttons' ) as $button ) : ?>

										<a href="<?php echo esc_url( $button['url'] ); ?>" class="btn">
											<?php echo $button['label']; ?>
										</a>
										
										<?php endforeach; ?>

									</div><!-- /.best-alumni__actions -->
								</div><!-- /.best-alumni__inner -->
							</div><!-- /.best-alumni__content -->
						</div><!-- /.best-alumni -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
			<script>
        document.addEventListener("DOMContentLoaded", function () {
            if ("IntersectionObserver" in window) {
                var iframes = document.querySelectorAll("iframe.lazy");
                var iframeObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting && entry.target.src.length == 0) {                    
                            entry.target.src = entry.target.dataset.src;
                            iframeObserver.unobserve(entry.target);
                        }
                    });
                });
    
                iframes.forEach(function (iframe) {
                    iframeObserver.observe(iframe);
                });
            } else {
                var iframes = document.querySelector('iframe.lazy');
    
                for (var i = 0; i < iframes.length; i++) {
                    if (lazyVids[i].getAttribute('data-src')) {
                        lazyVids[i].setAttribute('src', lazyVids[i].getAttribute('data-src'));
                    }
                }
            }
        })
    </script>
			<div class="obx-section obx-video">
				<div class="obx-container">
					<h2><?php echo get_field('video_header'); ?></h2>
					<p><?php echo get_field('video_body'); ?></p>
					<style>
						.iframe-container {
							position: relative;
							width: 100%;
							height: 0;
							padding-bottom: 56.25%;
						}
						.iframe-video {
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
						}
					</style>
					<div class="iframe-container">
						<iframe class="youtube-video iframe-video lazy" 
							data-src="<?php echo get_field('video_url');?>"
							frameborder="0"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
					</div>
				</div>
			</div>
			
			<?php get_template_part( 'parts/home/lead-scores' ); ?>

			<div class="section section--white section--logos">
				<div class="shell">
					<div class="section__inner">
						<?php echo '<div class="faux-h4">' . get_field( 'logo_intro' ) . '</div>'; ?>
						<ul class="list-logos">
							
							<?php foreach ( get_field( 'logos' ) as $logo ) : ?>
							
							<?php
								$img = wp_get_attachment_image_src( $logo['logo'], 'full' );
							?>

							<li>
								<?php if ( $logo['url'] ) echo '<a href="' . esc_url( $logo['url'] ) . '" target="_blank">'; ?>
									<img src="<?php echo $img[0]; ?>" alt="<?php echo esc_attr( get_the_title( $logo['img'] ) ); ?>">
								<?php if ( $logo['url'] ) echo '</a>'; ?>
							</li>
							
							<?php endforeach; ?>

						</ul><!-- /.list-logos -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
			
			<div class="obx-section obx-cta">
				<div class="flex-row">
					<div class="flex-body">
						<span class="superheader"><?php echo get_field('cta_superheader'); ?></span>
						<h2><?php echo get_field('cta_header'); ?></h2>
						<span class="subheader"><?php echo get_field('cta_subheader'); ?></span>
						<p><?php echo get_field('cta_body'); ?></p>
						<a href="<?php echo get_field('button_1_url'); ?>" class="obx-button"><?php echo get_field('button_1_label'); ?></a>
						<a href="<?php echo get_field('button_2_url'); ?>" class="obx-button"><?php echo get_field('button_2_label'); ?></a>
					</div>
					<div class="flex-image">
						<img src="<?php echo get_field('cta_image'); ?>" alt="<?php echo get_field('cta_image_alt'); ?>">
					</div>
				</div>
			</div>
			<?php $testimonials = get_field( 'show_testimonials' ); ?>

			<?php /* Commented this section out per Chris' request via email 6/4/2018 ----
			
			<div class="section section--callout<?php if ( !$testimonials ) echo ' no-testimonials'; ?>" style="background-image: url(<?php echo get_template_directory_uri(); ?>/css/images/temp/office-desk.jpg);">
				<div class="shell shell--secondary">
					<div class="section__inner">
						<div class="callout">
							
							<?php if ( $testimonials ) : ?>
							
							<div class="slider-testimonials-small">
								<div class="slider__clip">
									<div class="slider__slides">

										<?php foreach ( get_field( 'testimonials' ) as $post_id ) : ?>
										<?php
											$testimonial = get_post( $post_id );
											szbl_setup_post( $testimonial );
										?>
										<div class="slider__slide">
											<div class="slider__slide-content">
												<div class="testimonial-small">
													<blockquote>
														<?php echo get_the_excerpt(); ?>
													</blockquote>

													<div class="testimonial-small__author">
														<?php if ( has_post_thumbnail( $post_id ) ) the_post_thumbnail( 'thumbnail' ); ?>

														<div class="testimonial-small__author-inner">
															<?php 
																$title = get_the_title();
																echo MB_Theme::format_testimonial_title( $title );
															?>
														</div><!-- /.testimonial-small__author-inner -->
													</div><!-- /.author -->
												</div><!-- /.testimonial-small -->
											</div><!-- /.slider__slide-content -->
										</div><!-- /.slider__slide -->

										<?php endforeach; wp_reset_query(); ?>

									</div><!-- /.slider__slides -->
								</div><!-- /.slider__clip -->
							</div><!-- /.slider -->
							
							<?php endif; ?>

							<div class="callout__inner">
								<h1>
									<?php echo get_field( 'testimonials_byline' ); ?>
								</h1>
								<a href="<?php echo esc_url( get_field( 'testimonials_cta_url' ) ); ?>" class="btn">
									<?php echo get_field( 'testimonials_cta_label' ); ?>
								</a>
							</div><!-- /.callout__inner -->
						</div><!-- /.callout -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
			*/ ?>
		<div class="obx-section obx-faq">
        	<div class="obx-container">
        		<h2><?php echo get_field('faq_header'); ?></h2>
        			<p><?php echo get_field('faq_intro') ?></p>
					<?php
						if( have_rows('faq_row') ):
							while( have_rows('faq_row') ) : the_row();
								$faq_question = get_sub_field('faq_question');
								$faq_answer = get_sub_field('faq_answer');
								echo '<details class="faq-item">';
								echo "<summary><h3 class='question'>$faq_question</h3></summary>";
								echo '<div class="faq-answer">';
								echo "<p>$faq_answer</p></div>";
								echo '</details>';
								endwhile;
						endif;
					?>
			</div>
		</div>




			<div class="section section--light-blue section--cards-primary">
				<div class="shell">
					<div class="section__inner">
						<div class="container">
							<div class="section__aside">
								<div class="widgets">
									<div class="widget-ebook">
										<div class="widget-ebook__image">
											<?php if ( $img_id = get_field( 'promo_image' ) ) : $img = wp_get_attachment_image_src( $img_id, 'full' ); ?>
											<img src="<?php echo $img[0]; ?>" alt="<?php echo esc_attr( get_the_title( $img_id ) ); ?>">
											<?php endif; ?>
											<span class="label"><?php echo get_field( 'promo_tag' ); ?></span>
										</div><!-- /.widget-ebook__image -->
										
										<?php echo get_field( 'promo_content' ); ?>
									</div><!-- /.widget-ebook -->
								</div><!-- /.widgets -->
							</div><!-- /.section__aside -->
 
							<?php
								$blog = new WP_Query(array( 'posts_per_page' => 3 ) );
							?>
							<div class="section__content">
								<div class="faux-h2"><strong>memoryBlue</strong> Inside Sales Blog</div>
								<div class="cards">
									<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
									<div class="card">
										<img src="<?php echo esc_url( MB_Theme::get_blog_image_url( false, 'mb-card-blog' ) ); ?>" alt="<?php echo 'Image for ' . esc_attr( get_the_title() ); ?>">

										<div class="faux-h6"><?php the_author(); ?></div>

										<div class="faux-h4"><?php the_title(); ?></div>

										<span class="date"><?php the_time( 'm.d.Y' ); ?></span>

										<a href="<?php the_permalink(); ?>"></a>
									</div><!-- /.card -->
									<?php endwhile; ?>
								</div><!-- /.cards -->
							</div><!-- /.section__content -->
						</div><!-- /.container -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell -->
			</div><!-- /.section -->
		</div><!-- /.main__inner -->
	</div><!-- /.main -->

<?php get_footer();