<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package mintlink
 */
?>

<?php
// section menu
$section_menu = CFS()->get('section_menu');
foreach ($section_menu as $value => $label) {
	if ($value === 'contact') {
?>
		<div class="sub-nav-wrap">
			<?php wp_nav_menu( array( 'theme_location' => $value, 'container_class' => 'sub-nav', 'menu_class' => 'slick js-nav3-resp-carousel', 'items_wrap' => '<div class="%2$s">%3$s</div>', 'walker' => new mintlink_walker_section_menu(), 'link_class' => 'sub-nav__link' ) ); ?>
		</div>

<?php
	}
	elseif ($value !== 'none') {
?>
		<div class="sub-nav-wrap">
			<?php wp_nav_menu( array( 'theme_location' => $value, 'container_class' => 'sub-nav', 'menu_class' => 'slick js-nav-resp-carousel', 'items_wrap' => '<div class="%2$s">%3$s</div>', 'walker' => new mintlink_walker_section_menu(), 'link_class' => 'sub-nav__link' ) ); ?>
		</div>
<?php
	}
}



// page sections
$sections = CFS()->get('sections');
foreach ($sections as $section) {
	// variables
	$background_color = $section['section_background_color'];
	$border_color = $section['section_border'];
	foreach ($section['section_type'] as $value => $label) {
		$section_type = $value;
	}
	$section_heading = $section['section_heading'];
	$section_tagline = $section['section_tagline'];
	$section_description = $section['section_description'];
	foreach ($section['section_image_position'] as $value => $label) {
		$section_image_position = $value;
	}


	// layout based on section type
	if ( $section_type === 'solutions' ) {
		wp_nav_menu( array( 'theme_location' => $section_type, 'container_class' => 'features', 'menu_class' => 'features__inner js-faded faded-out', 'items_wrap' => '<div class="%2$s">%3$s</div>', 'walker' => new mintlink_walker_solutions_menu(), 'link_class' => 'features__item' ) );
	} elseif ( $section_type === 'industries' ) {
		wp_nav_menu( array( 'theme_location' => $section_type, 'container' => false, 'menu_class' => 'carousel slick js-carousel', 'items_wrap' => '<div class="%2$s">%3$s</div>', 'walker' => new mintlink_walker_industries_menu(), 'link_class' => 'carousel__link' ) );
	} else {
?>
		<div class="<?php
		// regular vs. centered classes
		if ( $section_type === 'centered' ) {
			echo 'section--centered js-faded faded-out';

			// border classes for centered sections
			foreach ($border_color as $value => $label) {
				echo ' '.$value;
			}
		} else {
			echo 'section--full';

			// background color classes - only for non-centered sections
			foreach ($background_color as $value => $label) {
				echo ' '.$value;
			}
		}

		?>">
			<?php
			// inner divs
			if ( $section_type === 'centered' || $section_type === 'regular' ) { // regular and centered sections
				if ( $section_type === 'regular' ) {
					echo '<div class="section--full__inner js-faded faded-out';
					// border classes
					foreach ($border_color as $value => $label) {
						echo ' '.$value;
					}
					echo '">';
				}
			?>
				    <?php if ( $section_heading ) : ?><h2 class="section--full__heading"><?php echo $section_heading; ?></h2><?php endif; ?>
				    <?php if ( $section_tagline ) : ?><h3 class="section--full__tagline"><?php echo $section_tagline; ?></h3><?php endif; ?>
				    <?php if ( $section_description ) : ?><div class="section--full__text"><?php echo $section_description; ?></div><?php endif; ?>
			<?php
				if ( $section_type === 'regular' ) {
					echo '</div>';
				}
			} else { // image sections
			?>
			    <div class="section--full__inner-wide<?php
			    	// border classes
					foreach ($border_color as $value => $label) {
						echo ' '.$value;
					}
			    ?>">
			        <div class="section-int__text <?php if ( $section_image_position === 'left' ) : ?>section-int__text--alt js-section-right faded-out-right<?php else: ?> js-section-left faded-out-left<?php endif; ?>">
			        	<?php if ( $section_heading ) : ?><h2 class="section--full__heading"><?php echo $section_heading; ?></h2><?php endif; ?>
					    <?php if ( $section_tagline ) : ?><h3 class="section-int__headline"><?php echo $section_tagline; ?></h3><?php endif; ?>
					    <?php if ( $section_description ) : ?><?php echo $section_description; ?><?php endif; ?>
			        </div>
			        <div class="section-int__img <?php if ( $section_image_position === 'left' ) : ?>section-int__img--alt js-section-left faded-out-left<?php else: ?> js-section-right faded-out-right<?php endif; ?>">
			            <img class="img--natural" src="<?php echo $section['section_image']; ?>">
			        </div>
			    </div>
			<?php
			}
			?>
		</div>
<?php
	}
}
?>