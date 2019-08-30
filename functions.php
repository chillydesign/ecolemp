<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul >%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}



function wf_version(){
    return '0.0.1';
}



// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

          wp_deregister_script('jquery');


        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!




    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        // wp_enqueue_script('scriptname'); // Enqueue it!
    }
}




// Load HTML5 Blank styles
function html5blank_styles()
{

    $tdu = get_template_directory_uri();


    wp_register_style('reset', $tdu . '/css/reset.css', array(),  wf_version(), 'all');
    wp_enqueue_style('reset'); // Enqueue it!

    wp_register_style('bootstrap', $tdu . '/css/bootstrap.css', array(),  wf_version(), 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('style', $tdu . '/style.css', array(),  wf_version(), 'all');
    wp_enqueue_style('style'); // Enqueue it!

     wp_register_style('unslider', $tdu . '/css/unslider.css', array(), wf_version(), 'all');
     wp_enqueue_style('unslider'); // Enqueue it!

     // wp_register_style('lity',$tdu  . '/css/lity.min.css', array(),  wf_version(), 'all');
     // wp_enqueue_style('lity'); // Enqueue it!


     wp_register_style('featherlight', $tdu . '/css/featherlight.min.css', array(),  wf_version(), 'all');
     wp_enqueue_style('featherlight'); // Enqueue it!
     wp_register_style('feathergal', $tdu  . '/css/featherlight.gallery.min.css', array(),  wf_version(), 'all');
     wp_enqueue_style('feathergal'); // Enqueue it!

}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank') // Main Navigation

    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{


    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Sidebar', 'html5blank'),
        'description' => __('Sidebar', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 40;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Page', 'html5blank') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<div class="row comment-body">

	<div class="col-sm-2 comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="col-sm-10 comment-meta commentmetadata">
        <?php echo get_comment_author_link() ?> on <?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>

            <?php comment_text() ?>

     <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
	</div>


<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu


// CUSTOM POST TYPES
add_action('init', 'create_post_type_video'); 
add_action('init', 'create_post_type_formation'); 
add_action('init', 'create_post_type_page_formation'); 
add_action('init', 'create_post_type_specialisation'); 
add_action('init', 'create_post_type_viealecole'); 







add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts

add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_video()
{
 
    register_post_type('video', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Videos', 'html5blank'), // Rename these to suit
            'singular_name' => __('Video', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter Video', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Modifier Video', 'html5blank'),
            'new_item' => __('Ajouter Video', 'html5blank'),
            'view' => __('Afficher Video', 'html5blank'),
            'view_item' => __('Afficher Video', 'html5blank'),
            'search_items' => __('Vhercher Videos', 'html5blank'),
            'not_found' => __('Aucune Video trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Video trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category', 'tags'
        ) // Add Category and Post Tags support
    ));
}



function create_post_type_formation()
{
 
    register_post_type('formation', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Formations Accueil', 'html5blank'), // Rename these to suit
            'singular_name' => __('Formation Accueil', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('AjouterFormation', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Modifier Formation', 'html5blank'),
            'new_item' => __('Nouvelle Formation', 'html5blank'),
            'view' => __('Afficher Formation', 'html5blank'),
            'view_item' => __('Afficher Formation', 'html5blank'),
            'search_items' => __('Chercher Formations', 'html5blank'),
            'not_found' => __('Aucune Formation trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Formation trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category', 'tags'
        ) // Add Category and Post Tags support
    ));
}

function create_post_type_page_formation()
{
 
    register_post_type('page_formation', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Formations ', 'html5blank'), // Rename these to suit
            'singular_name' => __('Formation', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter Formation', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Edit Formation', 'html5blank'),
            'new_item' => __('Modifier Formation', 'html5blank'),
            'view' => __('Afficher Formation', 'html5blank'),
            'view_item' => __('Afficher Formation', 'html5blank'),
            'search_items' => __('Chercher Formations', 'html5blank'),
            'not_found' => __('Aucune Formation trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Formation trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category', 'tags'
        ) // Add Category and Post Tags support
    ));
}


function create_post_type_viealecole()
{
 
    register_post_type('viealecole', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Vie à l’écoles ', 'html5blank'), // Rename these to suit
            'singular_name' => __('Vie à l’école', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter Vie à l’école', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Edit Vie à l’école', 'html5blank'),
            'new_item' => __('Modifier Vie à l’école', 'html5blank'),
            'view' => __('Afficher Vie à l’école', 'html5blank'),
            'view_item' => __('Afficher Vie à l’école', 'html5blank'),
            'search_items' => __('Chercher Vie à l’école', 'html5blank'),
            'not_found' => __('Aucune Vie à l’école trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Vie à l’école trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category', 'tags'
        ) // Add Category and Post Tags support
    ));
}



function create_post_type_specialisation()
{
 
    register_post_type('specialisation', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Specialisations ', 'html5blank'), // Rename these to suit
            'singular_name' => __('Specialisation', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter Specialisation', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Edit Specialisation', 'html5blank'),
            'new_item' => __('Modifier Specialisation', 'html5blank'),
            'view' => __('Afficher Specialisation', 'html5blank'),
            'view_item' => __('Afficher Specialisation', 'html5blank'),
            'search_items' => __('Chercher Specialisations', 'html5blank'),
            'not_found' => __('Aucune Specialisation trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Specialisation trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category', 'tags'
        ) // Add Category and Post Tags support
    ));
}



/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}




// ONLY SHOW PAGE AND POST IN SEARCH RESULTS
add_filter('pre_get_posts','search_filter');
function search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', array('page', 'post' ) );
    }
    return $query;
}






function chilly_map( $atts, $content = null ) {
  
    $attributes = shortcode_atts( array(
        'location' => "Chemin de Pra 1993, Veysonnaz, Suisse"
    ), $atts );


    wp_register_script('googlemaps', 'http://maps.google.com/maps/api/js?key=AIzaSyAxQfqRqtPLAW4BolFMCxTiv9y--R8CXdU', array(), '0.0.1'); 
    wp_enqueue_script('googlemaps'); // Enqueue it!
    wp_register_script('map_script', get_template_directory_uri() . '/js/scripts_map.js', array(), '0.0.1'); 
    wp_enqueue_script('map_script'); // Enqueue it!

    $address = $attributes['location'];
    $chilly_map = '<div id="mapcontainer"></div>';
    $chilly_map .= "<script> var address = '"  . $address  .   "';</script>";
    return $chilly_map;



}
add_shortcode( 'chilly_map', 'chilly_map' );


function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
 add_action( 'admin_menu', 'revcon_change_post_label' );
 add_action( 'init', 'revcon_change_post_object' );

add_action( 'admin_menu', 'remove_menus' );

function remove_menus(){
  
  // remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit.php?lang=en' );           //Anglais
  remove_menu_page( 'edit.php?post_type=page&lang=en' );           //Anglais
  remove_menu_page( 'edit.php?lang=zh' );           //Français
  remove_menu_page( 'edit.php?post_type=page&lang=zh' );           //Français     

  // remove_menu_page( 'upload.php' );              //Media
  remove_menu_page( 'upload.php?lang=en' );              //Media
  remove_menu_page( 'upload.php?lang=zh' );              //Media
  // remove_menu_page( 'edit.php?post_type=page' ); //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  remove_submenu_page( 'themes.php', 'themes.php' );
  remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Fusers.php' );
  remove_submenu_page( 'themes.php', 'widgets.php' );
  remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );               //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  remove_menu_page( 'profile.php' );        //Settings

  
}



add_filter('acf/settings/show_admin', '__return_false');



function remove_contact_menu () {
global $menu;
    $restricted = array(__('Contact'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_contact_menu');

add_action( 'plugins_loaded', 'b5f_remove_qt_admin_menus', 15 );
function b5f_remove_qt_admin_menus() {
    remove_action( 'admin_menu', 'ppqtrans_adminMenu' );
}

function include_post_types_in_search($query) {
    if(is_search()) {
        $post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
        $searchable_types = array();
        if($post_types) {
            foreach( $post_types as $type) {
                $searchable_types[] = $type->name;
            }
        }
        $query->set('post_type', $searchable_types);
    }
    return $query;
}
add_action('pre_get_posts', 'include_post_types_in_search');



?>
