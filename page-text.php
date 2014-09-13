<?php
/**
 * Template Name: Content Page
 * The template for displaying longer, content pages.
 *
 * @package mintlink
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        if ( has_post_thumbnail() ) {
            get_template_part( 'partials/page-header', 'index' );
        }
        else {
            get_template_part( 'partials/page-header', 'gradient' );
        }
        ?>

        <!-- Site's Main Content-->
        <main class="site-main" role="main">

                <?php get_template_part( 'partials/content', 'page' ); ?>

        </main><!-- #main -->

    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
