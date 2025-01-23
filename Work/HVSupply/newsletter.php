<?php

global $post;


if(!get_field('show_newsletter', $post->ID) || isset($_GET['s']))
    return;

$newsletter_image = get_field('newsletter_image_desktop', 'option');
$newsletter_image_mobile = get_field('newsletter_image_mobile', 'option');
$newsletter_content = get_field('newsletter_content', 'option');
$newsletter_left_title = get_field('newsletter_left_title', 'option');
$newsletter_background_color = get_field('newsletter_background_color', 'option');

?>
<section
        class="layout-section section-newsletter text_style-dark-text padding-no-padding container-default background_style-solid"
        id="join-me-now">
    <div class="cls-background" style="background-color: <?php echo $newsletter_background_color; ?>">
        <div class="cls-inner">
            <div class="newsletter-container">
                <div class="image-mobile">
                    <img src="<?php echo $newsletter_image_mobile['url']; ?>"
                         alt="<?php echo $newsletter_image_mobile['alt']; ?>">
                </div>
                <div class="content" style="background-color:<?php echo $newsletter_background_color; ?>;">
                    <h2 class="left-title"><?php echo $newsletter_left_title; ?></h2>
                    <?php echo $newsletter_content; ?>
                </div>
                <div class="image">
                    <img src="<?php echo $newsletter_image['url']; ?>" alt="<?php echo $newsletter_image['alt']; ?>">
                </div>
            </div>
        </div> <!-- /cls-inner -->
    </div> <!-- /cls-background -->
</section>