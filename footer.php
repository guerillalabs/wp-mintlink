        <!-- Site's Main Footer-->
        <footer role="contentinfo">

          <div class="site-footer section--full" data-bottom-top="background-position: 0% 0%;" data-top-bottom="background-position: 0% 100%;">

            <div class="section--full__inner-wide">
              <div class="grid">
                <div class="grid__item one-whole medium--one-third large--one-third">
                  <div class="field__input">
                    <input type="text" placeholder="First Name">
                  </div>
                  <div class="field__input">
                    <input type="text" placeholder="Last Name">
                  </div>
                  <div class="field__input">
                    <input type="email" placeholder="Email Address">
                  </div>
                  <div class="field__input">
                    <input type="tel" placeholder="Phone Number">
                  </div>
                </div><!--

                --><div class="grid__item one-whole medium--one-third large--one-third">
                    <div class="field__input">
                      <input type="text" placeholder="State">
                    </div>
                    <div class="field__input">
                      <input type="tel" placeholder="Postal Code">
                    </div>
                    <div class="field__input">
                      <input type="text" placeholder="Country">
                    </div>
                    <div class="field__input">
                      <input type="text" placeholder="Company Name">
                    </div>
                </div><!--

                --><div class="grid__item one-whole medium--one-third large--one-third">
                    <div class="field__input">
                      <textarea placeholder="Notes" rows="9"></textarea>
                    </div>
                    <div class="field__input">
                      <button class="btn btn--outline btn--block" type="submit">Submit</button>
                    </div>
                </div>
              </div><!-- /grid three-up -->

            </div><!-- /section--full__inner-wide -->
          </div><!-- /section--full -->



          <!-- contact page footers -->
          <?php if ( is_page( 'contact' ) ): ?>
            <?php dynamic_sidebar( 'sidebar-contact' ); ?>
          <?php elseif ( is_page( 'partner' ) ): ?>
            <?php dynamic_sidebar( 'sidebar-partner' ); ?>
          <?php elseif ( is_page( 'support' ) ): ?>
            <?php dynamic_sidebar( 'sidebar-support' ); ?>
          <?php endif; ?>



          <div class="section--full">

            <div class="section--full__inner-wide">

              <div class="site-nav--footer-wrap">

                <nav class="site-nav--footer">
                  <img class="img--natural logo-footer" src="<?php echo get_template_directory_uri(); ?>/img/logos/logo-color.svg" alt="MinkLink">

                  <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'nav nav--piped', 'items_wrap' => '<ul class="%2$s" role="navigation">%3$s</ul>', 'walker' => new mintlink_walker_footer_menu() ) ); ?>
                </nav>

                <p class="site-credits">&copy;<?php echo date('Y'); ?> MintLink LLC. MintLink LLC is a registered ISO/MSP of Fifth Third Bank, Cincinnati, OH</p>
              </div>

              <nav class="site-nav--footer--sub">
                <span class="social">
                  <a class="site-nav--footer--sub__link" href=""><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/google-plus.svg"></a>
                  <a class="site-nav--footer--sub__link" href=""><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/twitter.svg"></a>
                  <a class="site-nav--footer--sub__link" href=""><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/facebook.svg"></a>
                  <a class="site-nav--footer--sub__link" href=""><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/linked-in.svg"></a>
                </span>
                <a class="btn btn--small btn--outline btn--outline--green" href="https://www.mymerchantdata.com/6_ms_login2.aspx">Member Login</a>
              </nav>

            </div>

          </div>

        </footer>

        <a class="page-top js-back-to-top" href="#top">
          <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-up.svg">
        </a>

    </div><!-- /.page-frame -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-52485433-1', 'auto');
      ga('send', 'pageview');

    </script>

    <?php wp_footer(); ?>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/global.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/site.js"></script>
</body>
</html>
