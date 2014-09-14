    <!-- Site's Header-->
    <?php if ( has_post_thumbnail() ):
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
        $position_x = CFS()->get('x_focus');
        if (!$position_x) { $position_x = '50%'; }
        $position_y = CFS()->get('y_focus');
        if (!$position_y) { $position_y = '50%'; }
      ?>
      <header class="site-header site-header--section" style="background-image: url(<?php echo $thumb_url[0]; ?>); background-position: <?php echo $position_x; ?> <?php echo $position_y; ?>" data-bottom-top="background-position: <?php echo $position_x; ?> 0%;" data-top-bottom="background-position: <?php echo $position_x; ?> 100%;" role="banner">
    <?php else: ?>
      <header class="site-header site-header--section site-header--gradient" role="banner">
    <?php endif; ?>

      <?php get_template_part( 'partials/nav-site' ); ?>

      <div class="container section-header js-header-faded faded">

        <h1 class="section-header__heading"><?php the_title(); ?></h1>
        <?php if ( CFS()->get('subtitle') ): ?><p class="section-header__text"><?php echo CFS()->get('subtitle'); ?></p><?php endif; ?>

      </div>

    </header>