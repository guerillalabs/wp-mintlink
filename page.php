<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package mintlink
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/page-header' ); ?>

    	<!-- Site's Main Content-->
        <main class="site-main" role="main">

                <?php get_template_part( 'partials/content' ); ?>

        </main><!-- #main -->

    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
