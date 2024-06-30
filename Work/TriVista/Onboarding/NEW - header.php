<?php    
    $extra_classes = array();
    if(isset($post)){
        $post_cats = wp_get_post_terms( $post->ID, 'category', array("fields" => "slugs") );
        
        if(empty($post_cats) && is_singular('library')){
            $post_cats = wp_get_post_terms( $post->ID, 'library_category', array("fields" => "slugs") );
        }

        if(!empty($post_cats)){
            foreach($post_cats as $cat){
               $extra_classes[] = "post-cat-". strtolower($cat);
            }
        }
    }

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4RPL4KB');</script>
<!-- End Google Tag Manager -->
	
	<!-- begin Convert Experiences code--><script type="text/javascript" src="//cdn-4.convertexperiments.com/js/10047477-10049468.js"></script><!-- end Convert Experiences code -->
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title(); ?></title>
	<script type="text/javascript">
	_linkedin_partner_id = "3494721";
	window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
	window._linkedin_data_partner_ids.push(_linkedin_partner_id);
	</script><script type="text/javascript">
	(function(l) {
	if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
	window.lintrk.q=[]}
	var s = document.getElementsByTagName("script")[0];
	var b = document.createElement("script");
	b.type = "text/javascript";b.async = true;
	b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
	s.parentNode.insertBefore(b, s);})(window.lintrk);
	</script>
	<noscript>
	<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3494721&fmt=gif" />
	</noscript>
	<link rel="stylesheet" href="https://use.typekit.net/isn3ucg.css">
<script type="text/javascript"> _linkedin_partner_id = "3518689"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3518689&fmt=gif" /> </noscript>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/global.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/transitions.css" rel="stylesheet">
	<?php if ( is_page_template('template_home_alt1.php') OR is_page_template('template_home_alt2.php') ) { ?>
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/home-style1.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.theme.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.transitions.css">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/mainstage-alt1.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
	<?php } else if ( is_page_template('template_home_default.php') OR is_page_template('template_home_alt3.php') ) { ?>        
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/home-default.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.theme.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owlcarousel/owl.transitions.css">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/mainstage-default.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
    <?php } else { ?>
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/innerpage.css?ver=<?php echo rand( 1, 9999 ) ?>" rel="stylesheet">
	<?php } ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/sm-core-css.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/components/Magnific Popup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mediaBoxes.css">
    <?php wp_head(); ?>
    <script type='text/javascript' src='/wp-content/uploads/2018/06/jquery.matchHeight.js'></script>
	<!-- Start of HubSpot Embed Code --> <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/21057310.js"></script> <!-- End of HubSpot Embed Code -->
	<!-- recruitment embed code -->
	<script type="text/javascript">
		window.hfAccountId = "2e308297-39bf-4e19-9eaa-a880b67fdad4";
		window.hfDomain = "https://api.herefish.com";
		(function() {
			var hf = document.createElement('script'); hf.type = 'text/javascript'; hf.async = true;
			hf.src = window.hfDomain + '/scripts/hf.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(hf, s);
		})();
	</script><!-- end recruitment embed -->
</head>
<body <?php body_class( $extra_classes ); ?>>
	
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4RPL4KB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<header id="header">
    <div class="topnav desktopOnly">
        <div class="topnav-container">
        <form class="navbar-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control" value="" name="s" id="s" placeholder="Search">
                    <button type="submit" class="search-form-submit" value=""></button>
                  </div>
                </form>
            <div class="sign-in-link">
              <a href="http://tviq.trivista.com/" target="_blank" class="account-signin">TriVista IQ</a>
            </div>
        </div>
    </div>
    <div class="px-header">   
        <button class="nav-mobile-togg" aria-label="Open Mobile Navigation" aria-expanded="false" aria-controls="px-main-menu"><span class="navicon" aria-hidden="true"></span></button>  
        <?php
            $custom_logo_id  = get_theme_mod( 'custom_logo' );
            $logo            = wp_get_attachment_image_src( $custom_logo_id, 'full' );
            $jpt_logo_breaks = get_theme_mod( 'jpt_logo_type' ); // boolean value checkbox in customizer under site identity
            $site_url = site_url();
            if ( has_custom_logo() ) {
                if ( $jpt_logo_breaks == true || $jpt_logo_breaks == '1' ) {
                    echo '<a class="navbar-brand px-site-logo" href="'.$site_url.'"><img src="' . esc_url( $logo[0] ) . '"></a>';
                } else {
                    echo '<a class="navbarbrand-no-break  px-site-logo" href="'.$site_url.'"><img src="' . esc_url( $logo[0] ) . '" alt="obx alt here"></a>';
                }
            } else {
                echo '<h1>' . esc_attr( get_bloginfo( 'name' ) ) . '</h1>';
            }
        ?>   
         <a class="contact-us-header mobileOnly" href="/about-us/contact-us">Contact Us</a>                           
        <!-- main navigation of the page -->
        <nav class="main-nav" aria-label="Primary Navigation">
            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'top',
                    'depth'           => 0,
                    'container'       => false,                    							
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'px-main-menu',									
                    'walker'  => new pxMegaNavWalker()
                )); 
            ?>
            
            <a class="contact-us-header desktopOnly" href="/about-us/contact-us">Contact Us</a>
        </nav><!-- #masthead -->     
    </div><!--/px-header -->    
    <div class="topPromo">
        <div class="promo-container">
            <?php dynamic_sidebar( 'promo-banner' ); ?>            
        </div>
    </div>
    <div class="mobileNav-login mobileOnly">
      <a href="http://tviq.trivista.com/" target="_blank" >TriVista IQ</a>
    </div>
    <div class="search-form-container mobileOnly">
       <form class="navbar-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <div class="form-group">
            <input type="text" class="form-control" value="" name="s" id="s" placeholder="Search">
            <button type="submit" class="search-form-submit" value=""></button>
          </div>
      </form>
    </div>
</header>
	
	
	<?php
	if(true){
		?>
	<style>
.about-body-section .about-body h1, .about-body-section .about-body h2, .about-body-section .about-body h3, .about-body-section .about-body h4, .about-body-section .about-body h5, .about-body-section .about-body h6, .about-body-section .about-body h7, ul.sidebar-links li a, .home h1, .home h2, .home h3, .home h4, .home h5, .home h6, .a-e-p-section .a-e-p-buttons::before, .seo-copy .last_column p, .content-column.one_half, h1, h2, h3, h4, h5, h6, #accordion .card .card-header h5 a {
    /*font-family: 'Montserrat', sans-serif !important;*/
}

.home .slide-txt-inner h2 {
    font-size: 38px !important;
}

h1 {
    font-weight: 700 !important;
}
ul.sidebar-links li a {
    text-transform: uppercase;
    font-weight: 600;
}
h2, h3, h4 {
    font-weight: 600 !important;
}
		
.footer-top .container {
    font-size: 14px;
}

.footer-top-menu {
    font-size: 14px;
}

</style>
	<?php
	}
	?>
<?php if(get_field('hide_navigation_elements')): ?>	
<style>
ul#top-menu {
    visibility: hidden;
}
</style>
<?php endif; ?>
	<?php if(get_field('off-site_landing_page')): ?>
	<style>
		.wp-post-image {
			max-width: 50%;
		}

		.share-links.blog-share {
			display: none;
		}
		header .nav {
			display: none;
		}

		.topnav form {
			visibility: hidden;
		}

		section.breadcrumb-section {
			visibility: hidden;
		}

		.sidebar-box {
			display: none;
		}

		ul#footer-top-menu {
			display: none;
		}

		.copyright a {
			display: none;
		}
	</style>
	<?php endif; ?>