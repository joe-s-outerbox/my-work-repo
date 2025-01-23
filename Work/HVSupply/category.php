<?php
	$contentGroups      = get_content_groups();
	$category           = get_queried_object();
	$categorySlug       = $category->slug;
	$blogCategoryClause = "first: 6";
	$currentPage        = 1;
	$nextPage           = 0;
	$previousPage       = 0;

	if(isset($_GET['page'])) {
		$currentPage = $_GET['page'];
	}

	if(isset($_GET['previousCursor'])) {
		$beforeCursor = $_GET['previousCursor'];
		$blogCategoryClause = "last: 6, before: \"$beforeCursor\"";
	} elseif(isset($_GET['nextCursor'])) {
		$afterCursor = $_GET['nextCursor'];
		$blogCategoryClause .= ", after: \"$afterCursor\"";
	}

  $blogCategoryQuery = graphql([
    'query' => 
    "query blogCategoryQuery {
			categories(where: {slug: \"$categorySlug\"}) {
				nodes {
					$contentGroups
					postBanner {
						bannerHeading
						bannerSubheading
						bannerContent
						bannerBackgroundType
						bannerBackgroundColor
						bannerTextAlign
						bannerBackgroundImage {
							node {
								mediaItemUrl
							}
						}
					}
					posts($blogCategoryClause) {
						nodes {
							title
							excerpt
							link
							featuredImage {
								node {
									mediaItemUrl
								}
							}
						}
						pageInfo {
							hasNextPage
							hasPreviousPage
							startCursor
							endCursor
						}
					}
				}
			}
			posts(first: 3, where: {tag: \"Featured\"}) {
				nodes {
					title
					link
					featuredImage {
						node {
							mediaItemUrl
						}
					}
				}
			}
			globalSettings {
				blogFeaturedBlock {
					blogFeaturedBlockTitle
					blogFeaturedBlockLinkText
					blogFeaturedBlockLink
					blogFeaturedBlockImage {
						node {
							mediaItemUrl
						}
					}
				}
			}
		}"
  ]);

	$blogFeaturedBlock     = $blogCategoryQuery['data']['globalSettings']['blogFeaturedBlock'];
	$featuredBlogs         = $blogCategoryQuery['data']['posts']['nodes'];
	$blogCategoryResults   = $blogCategoryQuery['data']['categories']['nodes'][0];
	$flexibleContentGroups = $blogCategoryResults['contentGroups']['flexibleContent'];
	$blogBanner            = $blogCategoryResults['postBanner'];
	$blogs                 = $blogCategoryResults['posts']['nodes'];
	$pageInfo              = $blogCategoryResults['posts']['pageInfo'];
	$startCursor           = $pageInfo['startCursor'];
	$endCursor             = $pageInfo['endCursor'];
	$hasNextPage           = $pageInfo['hasNextPage'];
	$hasPreviousPage       = $pageInfo['hasPreviousPage'];
	$queryParams           = "location:index.php?";

	if($blogBanner != null) {
		$pageBannerTextAlign       = $blogBanner['bannerTextAlign'];
		$pageBannerBackgroundType  = $blogBanner['bannerBackgroundType'];
		$pageBannerBackgroundColor = $blogBanner['bannerBackgroundColor'];
		$pageBannerBackgroundImage = $blogBanner['bannerBackgroundImage'];
		$pageBannerHeading         = $blogBanner['bannerHeading'];
		$pageBannerSubheading      = $blogBanner['bannerSubheading'];
		$pageBannerContent         = $blogBanner['bannerContent'];

		if($pageBannerBackgroundImage != null) {
			$pageBannerBackgroundImageUrl = $pageBannerBackgroundImage['node']['mediaItemUrl'];
		}
	}

	if($hasNextPage) {
		$nextPage = $currentPage + 1;
	}
	if($hasPreviousPage) {
		$previousPage = $currentPage - 1;
	}
	
	if(array_key_exists('previousCursor', $_POST)){
		$queryParams .= "previousCursor=$startCursor&page=$previousPage";
	} elseif(array_key_exists('nextCursor', $_POST)){
		$queryParams .= "nextCursor=$endCursor&page=$nextPage";
	}

	if($queryParams != "location:index.php?") {
		$queryParams = rtrim($queryParams, '&');
		header($queryParams);
	}

	get_header();
?>

	<section id="primary">
		<main id="main">

		<div class="container mx-auto">
			<div class="blogs-container">

				<div class="blog-main-content">

					<div class="page-banner"
						<?php if($pageBannerBackgroundType == 'Color') : ?>
							style="background-color: <?php echo $pageBannerBackgroundColor; ?>;"
						<?php elseif($pageBannerBackgroundType == 'Image') : ?>
							style="background-image: url(<?php echo $pageBannerBackgroundImageUrl; ?>);"
						<?php endif; ?>
					>
						<div class="container mx-auto">
							<?php if(function_exists('yoast_breadcrumb')) : ?>
								<?php echo yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
							<? endif; ?>

							<?php if($pageBannerSubheading != null) : ?>
								<p class="page-banner-subheading"><?php echo $pageBannerSubheading; ?></p>
							<?php endif; ?>

							<h1 class="page-banner-heading" style="text-align: <?php echo $pageBannerTextAlign; ?>;"><?php echo $pageBannerHeading; ?></h1>

							<?php if($pageBannerContent != null) : ?>
								<div class="page-banner-content" style="text-align: <?php echo $pageBannerTextAlign; ?>;"><?php echo $pageBannerContent; ?></div>
							<?php endif; ?>
						</div>
					</div>
					
					<form method="post" id="blog-listing-form" class="blogs">
						<?php foreach($blogs as $blog) : 
							$blogTitle      = $blog['title'];
							$blogExcerpt    = $blog['excerpt'];
							$blogLinkUrl    = $blog['link'];
							$blogImageUrl   = $blog['featuredImage']['node']['mediaItemUrl'];
						?>

							<div class="blog-post">
								<div class="blog-image-container">
									<a class="blog-image-link" style="background-image: url(<?php echo $blogImageUrl; ?>);" href="<?php echo $blogLinkUrl; ?>"><?php echo $blogTitle; ?></a>
								</div>

								<div class="blog-listing-content">
									<a class="blog-title" href="<?php echo $blogLinkUrl; ?>"><?php echo $blogTitle; ?></a>
									<div class="blog-excerpt"><?php echo $blogExcerpt; ?></div>
									<a class="blog-read-more" href="<?php echo $blogLinkUrl; ?>">Read More</a>
								</div>

							</div>

						<?php endforeach; ?>

						<?php if($hasPreviousPage || $hasNextPage) : ?>
							<div class="pagination">
								<input type="hidden" name="page" id="page" value="<?php echo $currentPage; ?>" />

								<?php if($hasPreviousPage) : ?>
									<input type="hidden" name="previousCursor" id="previousCursor" value="Previous Page" />

									<button type="submit" class="btn-paging previous-button">Previous Page</button>
									<button type="submit" class="btn-paging"><?php echo $previousPage; ?></button>
								<?php endif; ?>

								<?php if($currentPage != null) : ?>
									<button disabled type="submit" class="btn-paging current-page"><?php echo $currentPage; ?></button>
								<?php endif; ?>

								<?php if($hasNextPage) : ?>
									<input type="hidden" name="nextCursor" id="nextCursor" value="Next Page" />

									<button type="submit" class="btn-paging"><?php echo $nextPage; ?></button>
									<button type="submit" class="btn-paging next-button">Next Page</button>
								<?php endif; ?>
							</div>
						<?php endif; ?>

					</form>

				</div>

				<div class="blog-category-sidebar">

					<?php if($featuredBlogs != null && count($featuredBlogs) > 0) : ?>
						<div class="featured-blogs-container">
							<p class="featured-blogs-title">Featured Posts</p>
							<?php foreach($featuredBlogs as $featuredBlog) : 
								$featuredBlogTitle = $featuredBlog['title'];
								$featuredBlogLink  = $featuredBlog['link'];
								$featuredBlogImage  = $featuredBlog['featuredImage'];
								$featuredBlogImageUrl = null;

								if($featuredBlogImage != null) {
									$featuredBlogImageUrl = $featuredBlogImage['node']['mediaItemUrl'];
								}
							?>
								<div class="featured-blog">
									<div class="featured-blog-image-container">
										<a class="featured-blog-image-link" href="<?php echo $featuredBlogLink; ?>" style="background-image: url(<?php echo $featuredBlogImageUrl; ?>);"><?php echo $featuredBlogTitle; ?></a>
									</div>
									<div class="featured-blog-content">
										<p class="featured-blog-title"><?php echo $featuredBlogTitle; ?></p>
										<a class="blog-read-more" href="<?php echo $featuredBlogLink; ?>">Read More</a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if($blogFeaturedBlock != null) : 
						$blogFeaturedBlockTitle    = $blogFeaturedBlock['blogFeaturedBlockTitle'];
						$blogFeaturedBlockLinkText = $blogFeaturedBlock['blogFeaturedBlockLinkText'];
						$blogFeaturedBlockLink     = $blogFeaturedBlock['blogFeaturedBlockLink'];
						$blogFeaturedBlockImage    = $blogFeaturedBlock['blogFeaturedBlockImage'];
						$blogFeaturedBlockImageUrl = null;

						if($blogFeaturedBlockImage != null) {
							$blogFeaturedBlockImageUrl = $blogFeaturedBlockImage['node']['mediaItemUrl'];
						}
					?>
						<div class="featured-blogs-container">
							<div class="featured-blog">
								<div class="featured-blog-image-container">
									<a class="featured-blog-image-link" href="<?php echo $blogFeaturedBlockLink; ?>" style="background-image: url(<?php echo $blogFeaturedBlockImageUrl; ?>);"><?php echo $blogFeaturedBlockTitle; ?></a>
								</div>
								<div class="featured-blog-content">
									<p class="featured-blog-title"><?php echo $blogFeaturedBlockTitle; ?></p>
									<a class="blog-read-more" href="<?php echo $blogFeaturedBlockLink; ?>"><?php echo $blogFeaturedBlockLinkText; ?></a>
								</div>
							</div>
						</div>
					<?php endif; ?>

				</div>

			</div>
		</div>

			<?php if($flexibleContentGroups != null) : ?>
				<?php foreach($flexibleContentGroups as $flexibleContentGroup) : ?>
					<?php get_template_part( 'template-parts/content-groups/ContentGroupBaseTemplate', 'content', $flexibleContentGroup ); ?>
				<?php endforeach; ?>
			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
