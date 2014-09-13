<?php
/**
 * Template Name: Content Page
 * The template for displaying longer, content pages.
 *
 * @package mintlink
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/page-header', 'index' ); ?>

        <!-- Site's Main Content-->
        <main class="site-main" role="main">

                <?php get_template_part( 'partials/content', 'page' ); ?>

        </main><!-- #main -->

    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
