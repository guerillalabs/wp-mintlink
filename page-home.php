<?php
/**
 * Template Name: Home Page
 * The template for displaying the home page.
 *
 * @package mintlink
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/page-header', 'home' ); ?>

        <!-- Site's Main Content-->
        <main class="site-main" role="main">

                <?php get_template_part( 'partials/content' ); ?>

        </main><!-- #main -->

    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
