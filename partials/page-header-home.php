    <!-- Site's Header-->
    <header class="site-header" role="banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/hero-home.jpg)" data-bottom-top="background-position: 75% 0%;" data-top-bottom="background-position: 75% 100%;">

      <!-- Main site nav -->
      <nav class="container site-nav">

        <!-- Branding, can be a logo, img ect. -->
        <a class="site-nav__home" href="<?php echo get_template_directory_uri(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/img/logos/logo-white.svg" alt="MintLink"></a>

        <ul class="site-nav__list" role="navigation">
          <li class="site-nav__item sm--hide"><a class="site-nav__link" href="#">Member Login<img class="site-nav__icon" src="<?php echo get_template_directory_uri(); ?>/img/membership-login.svg"></a></li>
          <li class="site-nav__item">
            <a class="site-nav__link js-nav" href="#">Menu
              <div class="site-nav__button js-nav-btn">
                <div class="top-bar"></div>
                <div class="middle-bar"></div>
                <div class="bottom-bar"></div>
              </div>
            </a>
          </li>
        </ul>

      </nav>

      <div class="container home-header js-header-faded faded">

        <h1 class="home-header__heading">Simplicity&nbsp;&#43; Innovation</h1>
        <p class="home-header__text">We’re the LINK between all your business solutions.</p>

        <a class="btn btn--outline" href="#">Our Solutions</a>

      </div>

    </header>