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
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<meta name="apple-mobile-web-app-title" content="MintLink">
	<link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#00a300">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="application-name" content="MintLink">


    <!-- JS -->
    <script>var b = document.documentElement; b.className = b.className.replace(/\bno-js\b/,'js'); b.setAttribute('data-useragent', navigator.userAgent); b.setAttribute("data-platform", navigator.platform );</script>

    <!-- HTML5 Shiv for old IE -->
    <!--[if (lte IE 8)&!(IEMobile)]>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/ie.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>




<div class="primary-nav">
    <ul>
        <li><a class="primary-nav__section primary-nav__section--link" href="/"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/home.svg">Home</a></li>
        <li>
            <a class="primary-nav__section primary-nav__section--link" href="/who-we-are/"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/who-we-are.svg">Who We Are</a>
            <?php if ( has_nav_menu( 'primarywho' ) ) {
                wp_nav_menu( array( 'theme_location' => 'primarywho', 'container' => false, 'menu_class' => 'primary-nav__level-two', 'items_wrap' => '<ul class="%2$s">%3$s</ul>', 'walker' => new mintlink_walker_simple_menu(), 'link_class' => 'primary-nav__link' ) );
            } ?>
        </li>
        <li>
            <span class="primary-nav__section"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/solutions.svg">Solutions</span>
            <?php if ( has_nav_menu( 'primarysolutions' ) ) {
                wp_nav_menu( array( 'theme_location' => 'primarysolutions', 'container' => false, 'menu_class' => 'primary-nav__level-two', 'items_wrap' => '<ul class="%2$s">%3$s</ul>', 'walker' => new mintlink_walker_simple_menu(), 'link_class' => 'primary-nav__link' ) );
            } ?>
        </li>
        <li>
            <span class="primary-nav__section"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/industries.svg">Industries</span>
            <?php if ( has_nav_menu( 'primaryindustries' ) ) {
                wp_nav_menu( array( 'theme_location' => 'primaryindustries', 'container' => false, 'menu_class' => 'primary-nav__level-two', 'items_wrap' => '<ul class="%2$s">%3$s</ul>', 'walker' => new mintlink_walker_simple_menu(), 'link_class' => 'primary-nav__link' ) );
            } ?>
        </li>
        <li>
            <span class="primary-nav__section"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/get-in-touch.svg">Get in Touch</span>
            <?php if ( has_nav_menu( 'primarycontact' ) ) {
                wp_nav_menu( array( 'theme_location' => 'primarycontact', 'container' => false, 'menu_class' => 'primary-nav__level-two', 'items_wrap' => '<ul class="%2$s">%3$s</ul>', 'walker' => new mintlink_walker_simple_menu(), 'link_class' => 'primary-nav__link' ) );
            } ?>
        </li>
    </ul>

    <a class="primary-nav__btn" href="https://www.mymerchantdata.com/6_ms_login2.aspx" target="_blank"><img class="primary-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/off-canvas-icons/member-login.svg">Membership Login</a>
</div>

<div class="page-frame js-page-frame" id="top">
