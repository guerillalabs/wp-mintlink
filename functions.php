<?php
/**
 * mintlink functions and definitions
 *
 * @package mintlink
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'mintlink_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mintlink_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mintlink, use a find and replace
	 * to change 'mintlink' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mintlink', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	// remove some links in the head
	remove_action('wp_head', 'start_post_rel_link_wp_head', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action ('wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'wp_shortlink_wp_head');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primarywho' => __( 'Primary Menu - Who We Are', 'mintlink' ),
		'primarysolutions' => __( 'Primary Menu - Solutions', 'mintlink' ),
		'primaryindustries' => __( 'Primary Menu - Industries', 'mintlink' ),
		'primarycontact' => __( 'Primary Menu - Get in Touch', 'mintlink' ),
		'footer' => __( 'Footer Menu', 'mintlink' ),
		'section' => __( 'Section Menu', 'mintlink' ),
		'solutions' => __( 'Solutions Menu', 'mintlink' ),
		'industries' => __( 'Industries Menu', 'mintlink' ),
		'contact' => __( 'Contact Menu', 'mintlink' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mintlink_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mintlink_setup
add_action( 'after_setup_theme', 'mintlink_setup' );



// Remove unused links from the Admin menu.
function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus' );



/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mintlink_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Contact Footer', 'mintlink' ),
		'id'            => 'sidebar-contact',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Partner Footer', 'mintlink' ),
		'id'            => 'sidebar-partner',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Support Footer', 'mintlink' ),
		'id'            => 'sidebar-support',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'mintlink_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function mintlink_scripts() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0', true);
   wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "mintlink_scripts", 1);




// menu walker classes
// simple
class mintlink_walker_simple_menu extends Walker_Nav_Menu {

	// strip classes and ids for li's and alter classes for links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;

	    // build html
	    $output .= '<li>';

	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ! empty( $args->link_class ) ? ' class="'  . esc_attr( $args->link_class ) .'"' : '';

	    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );

	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
// section nav (carousel)
class mintlink_walker_section_menu extends Walker_Nav_Menu {

	// strip classes and ids for li's and alter classes for links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;

	    $active_class = in_array("current_page_item",$item->classes) ? ' is_active' : '';

	    // slug
		$pattern = '/(?<=\/)[^\/]*?(?=(\/(?!.))|(\?)|($))/'; // matches the last segment of the url
		preg_match($pattern, $item->url, $slug);

		// svg file
		$svg = file_get_contents(locate_template('icons/'.$slug[0].'.svg'));

	    // build html
	    $output .= '<div class="sub-nav__item">';

	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ' class="'  . esc_attr( $args->link_class ) . $active_class .'"';

	    // icons
	    $icons = '<span class="sub-nav__icon">'.$svg.'<img class="svg-fallback" src="'.get_template_directory_uri().'/icons/'.$slug[0].'.png"></span>';

	    $item_output = sprintf( '<a%1$s>%2$s%3$s</a>',
	        $attributes,
	        $icons,
	        apply_filters( 'the_title', $item->title, $item->ID )
	    );

	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
    function end_el(&$output, $item, $depth) {
        $output .= '</div>';
    }
}
// solutions nav (home)
class mintlink_walker_solutions_menu extends Walker_Nav_Menu {

	// strip classes and ids for li's and alter classes for links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;

	    // slug
		$pattern = '/(?<=\/)[^\/]*?(?=(\/(?!.))|(\?)|($))/'; // matches the last segment of the url
		preg_match($pattern, $item->url, $slug);

	    // build html
	    $output .= '';

	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ! empty( $args->link_class ) ? ' class="'  . esc_attr( $args->link_class ) .'"' : '';

	    $item_output = sprintf( '<a%1$s><div class="features__block"><img class="features__icon" src="'.get_template_directory_uri().'/img/home-icons/'.$slug[0].'.svg"><h2 class="features__heading">%2$s</h2><p class="features__text">'.$item->description.'</p></div></a>',
	        $attributes,
	        apply_filters( 'the_title', $item->title, $item->ID )
	    );

	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
    function end_el(&$output, $item, $depth) {
        $output .= '';
    }
}
// industries nav (home)
class mintlink_walker_industries_menu extends Walker_Nav_Menu {

	// strip classes and ids for li's and alter classes for links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;

	    // slug
		$pattern = '/(?<=\/)[^\/]*?(?=(\/(?!.))|(\?)|($))/'; // matches the last segment of the url
		preg_match($pattern, $item->url, $slug);

	    // build html
	    $output .= '<div class="carousel__item">';

	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ! empty( $args->link_class ) ? ' class="'  . esc_attr( $args->link_class ) .'"' : '';

	    $item_output = sprintf( '<a%1$s><img class="carousel__img" src="http://www.fillmurray.com/g/461/300"><p class="carousel__text">%2$s</p></a>',
	        $attributes,
	        apply_filters( 'the_title', $item->title, $item->ID )
	    );

	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
    function end_el(&$output, $item, $depth) {
        $output .= '</div>';
    }
}




// allow SVG uploads
function my_myme_types($mime_types){
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);




/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
