<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package mintlink
 */
?>

<div class="section--full">
    <div class="section--full__inner js-faded faded-out">
    	<?php if ( CFS()->get('content_heading') ) : ?><h2 class="section--full__heading"><?php echo CFS()->get('content_heading'); ?></h2><?php endif; ?>
    	<?php if ( CFS()->get('content_tagline') ) : ?><h3 class="section--full__tagline"><?php echo CFS()->get('content_tagline'); ?></h3><?php endif; ?>
    	<?php if ( CFS()->get('content_description') ) : ?><div class="section--full__text"><?php echo CFS()->get('content_description'); ?></div><?php endif; ?>
    </div>
</div>

<div class="section--full section--full--content section--full--border--bottom">
    <div class="section--full__inner-wide">
        <div class="section-int__text section-int__text--full">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<div class="section--centered js-faded faded-out">
    <h2 class="section--full__heading">Get in Touch</h2>
    <h3 class="section--full__tagline">Ready to Learn More?</h3>
    <p class="section--full__desc">Let us make things simpler.</p>
</div>