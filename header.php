<!doctype html>
<!--[if (lte IE 8)&!(IEMobile)]><html class="no-js lte-ie8 lte-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (lte IE 9)&!(IEMobile)]><html class="no-js lte-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <!-- META -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <!-- CSS -->
    <!-- For old IE -->
    <!--[if (lte IE 8)&!(IEMobile)]>
        <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/css/lte-ie8.css'>
    <![endif]-->

    <!-- For all other browsers -->
    <!--[if gt IE 8]><!-->
        <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/css/screen.css'>
    <!--<![endif]-->


    <!-- FAVICON -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">


    <!-- JS -->
    <script>var b = document.documentElement; b.className = b.className.replace(/\bno-js\b/,'js'); b.setAttribute('data-useragent', navigator.userAgent); b.setAttribute("data-platform", navigator.platform );</script>

    <!-- HTML5 Shiv for old IE -->
    <!--[if (lte IE 8)&!(IEMobile)]>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/ie.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- nav goes here. -->

<div class="page-frame js-page-frame" id="top">



	<!-- to be removed -->
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mintlink' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'mintlink' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">

		</div>
	</div>
