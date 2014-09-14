    <!-- Site's Header-->
    <?php
      $thumb_id = get_post_thumbnail_id();
      $thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
      $position_x = CFS()->get('x_focus');
      if (!$position_x) { $position_x = '50%'; }
      $position_y = CFS()->get('y_focus');
      if (!$position_y) { $position_y = '50%'; }
    ?>
    <header class="site-header" style="background-image: url(<?php echo $thumb_url[0]; ?>); background-position: <?php echo $position_x; ?> <?php echo $position_y; ?>" data-bottom-top="background-position: <?php echo $position_x; ?> 0%;" data-top-bottom="background-position: <?php echo $position_x; ?> 100%;" role="banner">

      <?php get_template_part( 'partials/nav-site' ); ?>

      <div class="container home-header js-header-faded faded">

        <h1 class="home-header__heading"><?php echo CFS()->get('home_title'); ?></h1>
        <?php if ( CFS()->get('subtitle') ): ?><p class="home-header__text"><?php echo CFS()->get('subtitle'); ?></p><?php endif; ?>

        <a class="btn btn--outline" href="<?php echo CFS()->get('call_to_action_button_link'); ?>"><?php echo CFS()->get('call_to_action_button_text'); ?></a>

      </div>

    </header>