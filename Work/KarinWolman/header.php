<!doctype html>
<html class="no-js" lang="en-US">
    <head>
    <meta name="msvalidate.01" content="0C62259147358558FB5E31CBA736D420" />


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php if (is_singular()) { global $wp_query; $postid = $wp_query->post->ID; $kwvl_page_title = get_post_meta($postid, '_cmb_kwvl_page_title', true); if ($kwvl_page_title) { echo $kwvl_page_title; }  else { ?><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); } } else { ?><?php wp_title( '|', true, 'right' ); ?> <?php } ?></title>
        
        <meta name="keywords" content="<?php if (is_singular()) { $kwvl_page_keywords = get_post_meta(get_the_ID(), '_cmb_kwvl_page_keywords', true); if ($kwvl_page_keywords) { echo $kwvl_page_keywords; } else { echo "new york immigration lawyer, ny visa lawyer, citizenship attorney nyc"; } } else { ?>new york immigration lawyer, ny visa lawyer, citizenship attorney nyc<?php } ?>" />
        <meta name="robots" content="index,follow,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="google-site-verification" content="qL-PJgn415-i0dJePo6oo5ntFapQSsft0FEw7Ue3SXo" />
        
        <meta name="title" content="<?php if (is_singular()) { $kwvl_page_title = get_post_meta(get_the_ID(), '_cmb_kwvl_page_title', true); if ($kwvl_page_title) { echo $kwvl_page_title; } else { ?><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); } } else { ?><?php wp_title( '|', true, 'right' ); ?> <?php } ?>" />
        <meta name="description" content="<?php if (is_singular()) { $kwvl_page_desc = get_post_meta(get_the_ID(), '_cmb_kwvl_page_desc', true); if ($kwvl_page_desc) { echo $kwvl_page_desc; } else { echo "With years of experience with work visas, green cards, O-1 Visas or US citizenships, The Law Office of Karin Wolman is here to help. Looking for an immigration lawyer in New York? Karin Wolman is the name to trust."; } } else { ?>With years of experience with work visas, green cards, O-1 Visas or US citizenships, The Law Office of Karin Wolman is here to help. Looking for an immigration lawyer in New York? Karin Wolman is the name to trust.<?php } ?>" />
        <meta name="site_name" content="Karin Wolman Visa Law" />
        <meta name="type" content="article" />
        <meta name="url" content="<?php echo $current_url = home_url(add_query_arg(array(),$wp->request)); ?>/" />
        <meta name="image" content="<?php bloginfo('stylesheet_directory'); ?>/img/kwvisalaw-sm.jpg" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/main.css">
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
        
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
        <?php wp_head(); ?>
<!-- added new CF7 Event Firing to fix legacy 8.2.18 DanB-->
        <script>
			document.addEventListener( 'wpcf7mailsent', function( event ) {
   			ga('send', 'event', 'Contact Form', 'submit');
			}, false );
		</script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-534643-10', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- Start Visual Website Optimizer Asynchronous Code -->
		<script type='text/javascript'>
		var _vwo_code=(function(){
		var account_id=33972,
		settings_tolerance=2000,
		library_tolerance=2500,
		use_existing_jquery=false,
		// DO NOT EDIT BELOW THIS LINE
		f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
		</script>
		<!-- End Visual Website Optimizer Asynchronous Code -->

		<script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body<?php if ( is_front_page() ) : ?> class="home"<?php else : ?> class="inside"<?php endif; ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Page begins here -->
		<div id="top-bar">
			<div id="content-container" class="flex-row">
				<div class="phone"><span onClick="ga('send', 'event', 'phone', 'click', {'NonInteraction': 1});">+1 (212) 918 4940</span></div>
				<div class="kw"><strong>Karin Wolman</strong>: New York Immigration Lawyer</div>
				<div id="header-social">
					<div class="links">
						<a aria-label="search" href="/search/" class="gplus" title="Search" target="_blank"></a>
						<a aria-label="avvo" href="https://www.avvo.com/attorneys/10005-ny-karin-wolman-902139.html" class="avvo" title="Avvo" target="_blank"></a>
						<a aria-label="facebook" href="https://www.facebook.com/karin.wolman" class="facebook" title="Facebook" target="_blank"></a>
						<a aria-label="linkedIn" href="https://www.linkedin.com/in/karinwolman661246533" class="linkedin" style="margin-right: 0;" title="LinkedIn" target="_blank"></a>
						<a aria-label="phone" href="tel:212-918-4940" class="phone-social" title="Phone" target="_blank"></a>
					</div>
			    </div>
				<a id="consult-cta" target="_blank" rel="nofollow noopener" href="https://checkout.square.site/merchant/MLRG2M9M6WE1Q/checkout/COZYXW3VIPDFH6XTOXINIHAA?src=webqr">Get an Initial Consultation</a>
			</div>
		</div>
        <div id="container">
			 <div class="mb-header">
				<div class="phone"><a href="tel:212-918-4940"><img src="https://kwvisalaw.com/wp-content/uploads/2024/05/nav-PHONE.svg"></a></div>
				<div class="logo"><a href="/"><img src="https://kwvisalaw.com/wp-content/uploads/2024/05/mb-nav-logo.png"></a></div>
				<div id="hamburger" onclick="toggleMenu()"><img src="https://kwvisalaw.com/wp-content/uploads/2024/05/nav-MENU-Burger.svg"></div>
				   <div id="sideMenu" class="side-menu">
					<div id="closeBtn" onclick="toggleMenu()">×</div>
					<a href="/our-firm/">About Us</a>
					<a href="/lawyer-bio/">Lawyer Bio</a>
					<a href="/immigration-services/">Immigration Services</a>
					<a href="/temporary-visas/">Temporary Visas</a>
					<a href="/green-cards/">Green Cards</a>
					<a href="/citizenship/">Citizenship</a>
					<a href="/resources/">Articles / News</a>
					<a href="/blog/">Blog</a>
					<a href="/testimonials/">Testimonials</a>
					<a href="/contact/">Contact Us</a>
					<a href="/directions/">Directions</a>
					<hr>
					<a class="mb-tel" href="tel:212-918-4940">Call Us +1 (212) 918 4940</a>
					<span><b>Law Office of Karin Wolman, PLLC</b><br>48 Wall Street, 11th Floor<br>New York, NY 10005</span>
					<div class="socials">
						<div class="links">
							<a aria-label="search" href="#" class="social-search" title="social" target="_blank"></a>
							<a aria-label="avvo" href="https://www.avvo.com/attorneys/10005-ny-karin-wolman-902139.html" class="avvo" title="Avvo" target="_blank"></a>
							<a aria-label="facebook" href="https://www.facebook.com/karin.wolman" class="facebook" title="Facebook" target="_blank"></a>
							<a aria-label="linkedIn" href="https://www.linkedin.com/profile/view?id=24615805&amp;trk=nav_responsive_tab_profile_pic" class="linkedin" title="LinkedIn" target="_blank"></a>
							<!-- <a aria-label="phone" href="#" class="social-phone" title="phone" target="_blank"></a> -->
						</div>
					</div>
    </div>
			</div>
			<div id="header-callouts"></div>
	        <header id="header" class="clearfix">
		        <div id="header-container" class="clearfix flex-row">
			        <div id="header-logo">
				        <a href="<?php bloginfo('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/KWLOGO-update.png" alt="Immigration Lawyer NYC, Immigration Attorney - Karin Wolman"></a>
			        </div>
					<div id="mobile-nav">
						<a class="section-link<?php if (is_page('lawyer-bio')) { ?> active<?php } ?>" id="lawyerbio" title="Lawyer Bio" href="<?php bloginfo('home'); ?>/lawyer-bio/">Lawyer Bio</a>
						<a class="section-link<?php if (is_page('immigration-services')) { ?> active<?php } ?>" id="immigration" title="Immigration Services" href="<?php bloginfo('home'); ?>/immigration-services/">Immigration<br>Services</span></a>
						<a class="section-link<?php if (is_page('temporary-visas') || get_post_top_ancestor_id() == '133') { ?> active<?php } ?>" id="tempvisas" title="Temporary Visas" href="<?php bloginfo('home'); ?>/temporary-visas/">Visas></a>
						<a class="section-link<?php if (is_page('green-cards') || get_post_top_ancestor_id() == '109') { ?> active<?php } ?>" id="greencards" title="Green Cards" href="<?php bloginfo('home'); ?>/green-cards/">Green Cards</a>
						<a class="section-link<?php if (is_page('citizenship') || get_post_top_ancestor_id() == '86') { ?> active<?php } ?>" id="citizenship" title="Citizenship" href="<?php bloginfo('home'); ?>/citizenship/">Citizenship</a>
						<a class="section-link<?php if (is_page('articles') || $post->post_parent == '66') { ?> active<?php } ?>" id="articles" title="Articles" href="<?php bloginfo('home'); ?>/resources/">Articles / Blogs</a>
						<a class="section-link<?php if (is_page('testimonials')) { ?> active<?php } ?>" id="testimonials" title="Testimonials" href="<?php bloginfo('home'); ?>/testimonials/">Testimonials</a>
						<a class="section-link<?php if (is_page('contact') || $post->post_parent == '51') { ?> active<?php } ?>" id="contact" title="Contact" href="<?php bloginfo('home'); ?>/contact/">Contact Us</a>
					</div>

			        <div id="main-nav" class="clearfix">
			        <a class="section-link<?php if (is_page('lawyer-bio')) { ?> active<?php } ?>" id="lawyerbio" title="Lawyer Bio" href="<?php bloginfo('home'); ?>/lawyer-bio/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lawyerbio.png" alt="Lawyer Bio"><span>Lawyer Bio</span></a>
			        <a class="section-link<?php if (is_page('immigration-services')) { ?> active<?php } ?>" id="immigration" title="Immigration Services" href="<?php bloginfo('home'); ?>/immigration-services/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/immigration.png" alt="Immigration Services"><span>Immigration Services</span></a>
			        <a class="section-link<?php if (is_page('temporary-visas') || get_post_top_ancestor_id() == '133') { ?> active<?php } ?>" id="tempvisas" title="Temporary Visas" href="<?php bloginfo('home'); ?>/temporary-visas/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/tempvisas.png" alt="Temporary Visas"><span>Temporary Visas</span></a>
			        <a class="section-link<?php if (is_page('green-cards') || get_post_top_ancestor_id() == '109') { ?> active<?php } ?>" id="greencards" title="Green Cards" href="<?php bloginfo('home'); ?>/green-cards/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/greencards.png" alt="Green Cards"><span>Green Cards</span></a>
			        <a class="section-link<?php if (is_page('citizenship') || get_post_top_ancestor_id() == '86') { ?> active<?php } ?>" id="citizenship" title="Citizenship" href="<?php bloginfo('home'); ?>/citizenship/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/citizenship.png" alt="Citizenship"><span>Citizenship</span></a>
			        <a class="section-link<?php if (is_page('articles') || $post->post_parent == '66') { ?> active<?php } ?>" id="articles" title="Articles" href="<?php bloginfo('home'); ?>/resources/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/articles.png" alt="Articles"><span>Articles / Blogs</span></a>
			        <a class="section-link<?php if (is_page('testimonials')) { ?> active<?php } ?>" id="testimonials" title="Testimonials" href="<?php bloginfo('home'); ?>/testimonials/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/testimonials.png" alt="Testimonials"><span>Testimonials</span></a>
			        <a class="section-link<?php if (is_page('contact') || $post->post_parent == '51') { ?> active<?php } ?>" id="contact" title="Contact" href="<?php bloginfo('home'); ?>/contact/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact.png" alt="Contact"><span>Contact Us</span></a>
		        </div>
			        
				</div>
				
				<!-- <div id="top-banner" style="background-image: url('https://www.kwvisalaw.com/wp-content/uploads/2022/02/important-dates-banner-background.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
					<div class="left-col">
						<img src="https://www.kwvisalaw.com/wp-content/uploads/2022/02/exclamation-mark.png" alt="green circled exclamation-mark">
						<p class="important-dates">Important Dates</p>
					</div>
					<div class="right-col">
					<p>Employers with a "registrant” account & their attorneys may file H1B cap lottery registrations for foreign workers from 12:00 noon EST on March 1, through 12:00 noon on March 17, 2023. </p>
					<p>USCIS will send out email notifications of first-round H1B cap lottery selections by March 31st. </p>
					</div>
				</div> -->
		        
		        
	        </header>
			<header id="header-sticky" class="clearfix">
		        <div id="header-container" class="clearfix flex-row">
			        <div id="header-logo">
				        <a href="<?php bloginfo('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/KW - LOGO.svg" alt="Immigration Lawyer NYC, Immigration Attorney - Karin Wolman"></a>
			        </div>
			        <div id="main-nav" class="clearfix">
			        <a class="section-link<?php if (is_page('lawyer-bio')) { ?> active<?php } ?>" id="lawyerbio" title="Lawyer Bio" href="<?php bloginfo('home'); ?>/lawyer-bio/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lawyerbio.png" alt="Lawyer Bio"><span>Lawyer Bio</span></a>
			        <a class="section-link<?php if (is_page('immigration-services')) { ?> active<?php } ?>" id="immigration" title="Immigration Services" href="<?php bloginfo('home'); ?>/immigration-services/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/immigration.png" alt="Immigration Services"><span>Immigration Services</span></a>
			        <a class="section-link<?php if (is_page('temporary-visas') || get_post_top_ancestor_id() == '133') { ?> active<?php } ?>" id="tempvisas" title="Temporary Visas" href="<?php bloginfo('home'); ?>/temporary-visas/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/tempvisas.png" alt="Temporary Visas"><span>Temporary Visas</span></a>
			        <a class="section-link<?php if (is_page('green-cards') || get_post_top_ancestor_id() == '109') { ?> active<?php } ?>" id="greencards" title="Green Cards" href="<?php bloginfo('home'); ?>/green-cards/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/greencards.png" alt="Green Cards"><span>Green Cards</span></a>
			        <a class="section-link<?php if (is_page('citizenship') || get_post_top_ancestor_id() == '86') { ?> active<?php } ?>" id="citizenship" title="Citizenship" href="<?php bloginfo('home'); ?>/citizenship/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/citizenship.png" alt="Citizenship"><span>Citizenship</span></a>
			        <a class="section-link<?php if (is_page('articles') || $post->post_parent == '66') { ?> active<?php } ?>" id="articles" title="Articles" href="<?php bloginfo('home'); ?>/resources/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/articles.png" alt="Articles"><span>Articles / Blogs</span></a>
			        <a class="section-link<?php if (is_page('testimonials')) { ?> active<?php } ?>" id="testimonials" title="Testimonials" href="<?php bloginfo('home'); ?>/testimonials/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/testimonials.png" alt="Testimonials"><span>Testimonials</span></a>
			        <a class="section-link<?php if (is_page('contact') || $post->post_parent == '51') { ?> active<?php } ?>" id="contact" title="Contact" href="<?php bloginfo('home'); ?>/contact/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact.png" alt="Contact"><span>Contact Us</span></a>
		        </div>
			        
				</div>		        
		        
	        </header>
		
		
		
			<div id="breadcrumbs">
				<div id="content-container" class="breadcrumbs">
					<?php
					if ( !is_front_page() ) :
						if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					endif;
					?>
				</div>
			</div>