<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package mintlink
 */

get_header(); ?>

	<!-- Site's Header-->
    <header class="site-header site-header--section site-header--gradient" role="banner">

      <?php get_template_part( 'partials/nav-site' ); ?>

      <div class="container section-header js-header-faded faded">

        <h1 class="section-header__heading">404</h1>
        <p class="section-header__text">Page Not Found</p>

      </div>

    </header>

    <!-- Site's Main Content-->
    <main class="site-main" role="main">

            <?php get_template_part( 'partials/content', 'none' ); ?>

    </main><!-- #main -->

<?php get_footer(); ?>