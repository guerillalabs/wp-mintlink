        <!-- Site's Main Footer-->
        <footer role="contentinfo">

          <!-- contact page footers -->
          <?php if ( is_page( 'partner' ) ): ?>
            <?php
            $contactform = do_shortcode( '[contact-form-7 id="166" title="Partner Page Form"]' );
            $pattern = '/(<\/div>)\s*(<div class="grid__item)/'; // matches the last segment of the url
            $replacement = '$1$2';
            echo preg_replace($pattern, $replacement, $contactform);
            ?>
            <?php dynamic_sidebar( 'sidebar-partner' ); ?>
          <?php elseif ( is_page( 'support' ) ): ?>
            <?php
            $contactform = do_shortcode( '[contact-form-7 id="167" title="Support Page Form"]' );
            $pattern = '/(<\/div>)\s*(<div class="grid__item)/'; // matches the last segment of the url
            $replacement = '$1$2';
            echo preg_replace($pattern, $replacement, $contactform);
            ?>
            <?php dynamic_sidebar( 'sidebar-support' ); ?>
          <?php else: ?>
            <?php
            $contactform = do_shortcode( '[contact-form-7 id="164" title="Contact Page Form"]' );
            $pattern = '/(<\/div>)\s*(<div class="grid__item)/'; // matches the last segment of the url
            $replacement = '$1$2';
            echo preg_replace($pattern, $replacement, $contactform);
            ?>
            <?php if ( is_page( 'contact' ) ) { dynamic_sidebar( 'sidebar-contact' ); } ?>
          <?php endif; ?>



          <div class="section--full">

            <div class="section--full__inner-wide">

              <div class="site-nav--footer-wrap">

                <nav class="site-nav--footer">
                  <img class="img--natural logo-footer" src="<?php echo get_template_directory_uri(); ?>/img/logos/logo-color.svg" alt="MinkLink">

                  <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'nav nav--piped', 'items_wrap' => '<ul class="%2$s" role="navigation">%3$s</ul>', 'walker' => new mintlink_walker_simple_menu(), 'link_class' => 'site-nav--footer__link' ) ); ?>
                </nav>

                <p class="site-credits">&copy;<?php echo date('Y'); ?> MintLink LLC. MintLink LLC is a registered ISO/MSP of Fifth Third Bank, Cincinnati, OH</p>
              </div>

              <nav class="site-nav--footer--sub">
                <span class="social">
                  <a class="site-nav--footer--sub__link" href="https://plus.google.com/u/7/102694506422224377968/about?hl=en"><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/google-plus.svg" target="_blank"></a>
                  <a class="site-nav--footer--sub__link" href="https://twitter.com/_MintLink" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/twitter.svg"></a>
                  <a class="site-nav--footer--sub__link" href="https://www.facebook.com/pages/MintLink-llc/283935118445266" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/facebook.svg"></a>
                  <a class="site-nav--footer--sub__link" href="https://www.linkedin.com/company/mintlink-solutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-icons/linked-in.svg"></a>
                </span>
                <a class="btn btn--small btn--outline btn--outline--green" href="https://www.mymerchantdata.com/6_ms_login2.aspx" target="_blank">Member Login</a>
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
