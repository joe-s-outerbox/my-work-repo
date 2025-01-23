<?php
if (!isset($section)) die('Must be accessed through flex-layout.php');

// Fields used by this section with default values
$f = shortcode_atts(array(
    'content_appearance' => null,
    'title' => null,
    'sub_title' => null,
    'snapshot_weeks' => null,
    'view_more' => null
), $section, 'custom-layout');

// Extra classes to use on the container
$classes = array();
$classes[] = 'appearance-' . $f['content_appearance'];

// Render the section
aa_flex_layout_section_start($section, $i, $classes);


?>
<div class="container">
    <div class="snapshot-container-header">
        <h2 class="snapshot-container-title"><?php echo $f['title']; ?></h2>
        <hr class="snapshot-container-separator">
        <label class="snapshot-container-subtitle"><?php echo $f['sub_title']; ?></label>
    </div>
    <div style="clear: both;"></div>
    <div class="snapshot-container-content">
        <div class="snapshot-weeks swiper">
            <div class="swiper-wrapper">
                <?php foreach ($f['snapshot_weeks'] as $snapshot_week): ?>
                    <div class="snapshot-week swiper-slide">
                        <div class="snapshot-header mobile">
                            <h2 class="snapshot-header-main"><?php echo $f['title']; ?></h2>
                            <h3 class="snapshot-header-title"><?php echo $snapshot_week['week_title']; ?></h3>
                            <div class="snapshot-header-content">
                                <?php echo $snapshot_week['week_content']; ?>
                            </div>
                        </div>

                        <div class="snapshot-week-left">
                            <div class="snapshot-header desktop">
                                <h3 class="snapshot-header-title"><?php echo $snapshot_week['week_title']; ?></h3>
                                <div class="snapshot-header-content">
                                    <?php echo $snapshot_week['week_content']; ?>
                                </div>
                            </div>
                            <div class="snapshot-snapshots">
                                <?php foreach ($snapshot_week['snapshots'] as $snapshot):
                                    $manually_add_snapshot = $snapshot['manually_add_snapshot'];


                                    if (!$manually_add_snapshot) {
                                        $snapshot_post = $snapshot['snapshot'];
                                        $snapshot_image = get_the_post_thumbnail_url($snapshot_post->ID);
                                        $snapshot_title = $snapshot_post->post_title;
                                        $snapshot_link = get_field('product_link', $snapshot_post->ID);

                                    } else {
                                        $snapshot_image = $snapshot['snapshot_image'];
                                        $snapshot_title = $snapshot['snapshot_title'];
                                        $snapshot_link = $snapshot['snapshot_link']['url'];
                                    }
                                    ?>
                                    <div class="snapshot">
                                        <a href="<?php echo $snapshot_link; ?>"
                                           target="_blank"><img
                                                    src="<?php echo $snapshot_image; ?>"
                                                    class="snapshot-thumbnail"/></a>
                                        <a href="<?php echo $snapshot_link; ?>"
                                           target="_blank"><label
                                                    class="snapshot-title"><?php echo $snapshot_title; ?></label></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="snapshot-week-right">
                            <img src="<?php echo $snapshot_week['week_image']['url']; ?>"
                                 alt="<?php echo $snapshot_week['week_image']['alt']; ?>" class="snapshot-week-image"/>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="swiper-button-next"></div>
    </div>

    <?php if ($f['view_more']): ?>
    <div class="snapshot-container-view-more">
        <a class="button" href="<?php echo $f['view_more']['url']; ?>"
           target="<?php echo $f['view_more']['target']; ?>"><?php echo $f['view_more']['title']; ?></a>
        <?php endif; ?>
    </div>
</div>
<?php aa_flex_layout_section_end(); ?>
