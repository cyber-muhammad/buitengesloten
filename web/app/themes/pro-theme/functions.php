<?php
/**
 * theme-pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-pro
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_pro_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on theme-pro, use a find and replace
		* to change 'theme-pro' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'theme-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'theme-pro' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'theme_pro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'theme_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_pro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'theme-pro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'theme-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'theme_pro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_pro_scripts() {
	wp_enqueue_style( 'theme-pro-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'theme-pro-style', 'rtl', 'replace' );

	wp_enqueue_script( 'theme-pro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_pro_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function derass_register_styles()
{
    wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", array(), '6.1.1', 'all');
	wp_enqueue_style('bootstrap5', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css", array(), '5.2.0', 'all');
	
	// Add contact page CSS only on contact page template
	if (is_page_template('page-templates/contact-page.php')) {
	    wp_enqueue_style('contact-page', get_template_directory_uri() . '/css/contact-page.css', array(), '1.0.0', 'all');
	}
}

add_action('wp_enqueue_scripts', 'derass_register_styles');

function derass_register_scripts()
{
	wp_enqueue_script('app-js', get_stylesheet_directory_uri() . '/js/app.js', array(), null, true);
    wp_enqueue_script('bootstrap', "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js", array(), '5.2.0', true);
    
    // Add Contact Page specific script only on contact page template
    if (is_page_template('page-templates/contact-page.php')) {
        wp_enqueue_script('contact-page-js', get_template_directory_uri() . '/js/contact-page.js', array(), null, true);
    }
}


add_action('wp_enqueue_scripts', 'derass_register_scripts');
add_action('wp_footer', 'custom_wpcf7_config', 20);

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'primary' ),
) );

add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
     if ( array_key_exists( 'data-toggle', $atts ) ) {
         unset( $atts['data-toggle'] );
         $atts['data-bs-toggle'] = 'dropdown';
     }
     return $atts;
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Global Settings',
        'menu_title' => 'Global Settings',
        'menu_slug'  => 'theme-global-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer Settings',
        'menu_slug'  => 'theme-footer-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}

function phone_number_shortcode($atts) {
    // Set default attributes
    $default_atts = array(
        'class' => '', // Default class
        'icon'  => '', // Default FontAwesome icon
        'id'    => '', // Default id
    );

    // Merge user-defined attributes with default attributes
    $shortcode_atts = shortcode_atts($default_atts, $atts);

    $phone_number = get_field('mobile_number', 'option');
    if ($phone_number) {
        $phone_number_clean = str_replace(array(' ', '/'), '', $phone_number);
        $output = '<a href="tel:' . esc_attr($phone_number_clean) . '" class="' . esc_attr($shortcode_atts['class']) . '" id="' . esc_attr($shortcode_atts['id']) . '" onclick="gtag_report_conversion()">';
        $output .= '<i class="fa ' . esc_attr($shortcode_atts['icon']) . '"></i> '; // Add FontAwesome icon here
        $output .= esc_html($phone_number) . '</a>';
    } else {
        $output = '';
    }
    return $output;
}
add_shortcode('phone_number', 'phone_number_shortcode');

function email_shortcode($atts) {
    // Set default attributes
    $default_atts = array(
        'class' => '', // Default class
        'icon'  => '', // Default FontAwesome icon
        'id'    => '', // Default id
    );

    // Merge user-defined attributes with default attributes
    $shortcode_atts = shortcode_atts($default_atts, $atts);

    $email_address = get_field('email_address', 'option');
    if ($email_address && is_email($email_address)) { // Check if it's a valid email
        $output = '<a href="mailto:' . esc_attr($email_address) . '" class="' . esc_attr($shortcode_atts['class']) . '" id="' . esc_attr($shortcode_atts['id']) . '">';
        $output .= '<i class="fa ' . esc_attr($shortcode_atts['icon']) . '"></i> '; // Add FontAwesome icon here
        $output .= esc_html($email_address) . '</a>';
    } else {
        $output = '';
    }
    return $output;
}
add_shortcode('email_address', 'email_shortcode');

function add_google_g4_code() {
    ?>
<!-- Google tag (gtag.js) -->

    <?php
}
add_action( 'wp_head', 'add_google_g4_code' );

function add_google_tag_manager_code() {
    ?>
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
    <?php
}
add_action( 'wp_head', 'add_google_tag_manager_code' );

function add_google_tag_manager_body_code() {
    ?>
<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action( 'wp_body_open', 'add_google_tag_manager_body_code' );


function add_conversion_google_tag() {
    ?>
<!-- Google tag (gtag.js) -->


    <?php
}
add_action( 'wp_head', 'add_conversion_google_tag' );


add_post_type_support('page', 'excerpt');

// Allow REST API to work with Basic Auth
add_filter('determine_current_user', function($user) {
    // If already authenticated, do nothing
    if ($user) {
        return $user;
    }
    
    // Check for Basic Auth headers
    if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
        return $user;
    }
    
    // Get the authorization header
    $auth = $_SERVER['HTTP_AUTHORIZATION'];
    
    // Check if it's Basic Auth
    if (strpos($auth, 'Basic ') !== 0) {
        return $user;
    }
    
    // Get the credentials
    $auth = substr($auth, 6);
    $credentials = base64_decode($auth);
    list($username, $password) = explode(':', $credentials);
    
    // Try to authenticate
    $user = wp_authenticate($username, $password);
    
    // If authentication failed, return null
    if (is_wp_error($user)) {
        return null;
    }
    
    // Return the user ID
    return $user->ID;
}, 10);

// Remove REST API restrictions
add_filter('rest_authentication_errors', function($errors) {
    // Remove restrictions if the user is logged in
    if (is_user_logged_in()) {
        return true;
    }
    
    return $errors;
}, 99);

// Allow any authenticated user to create posts and pages
add_filter('rest_post_permissions_check', function($permission, $request, $post_type) {
    if (is_user_logged_in() && current_user_can('edit_posts')) {
        return true;
    }
    
    return $permission;
}, 10, 3);

// Allow any authenticated user to create pages
add_filter('rest_page_permissions_check', function($permission, $request, $post_type) {
    if (is_user_logged_in() && current_user_can('edit_pages')) {
        return true;
    }
    
    return $permission;
}, 10, 3);

function register_rank_math_meta_fields() {
    register_meta('post', 'rank_math_title', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ]);

    register_meta('post', 'rank_math_description', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ]);

	register_meta('post', 'rank_math_focus_keyword', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ]);
    
    // If you need FAQ schema specifically
    register_meta('post', 'rank_math_schema_FAQ', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'object',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ]);
}
add_action('init', 'register_rank_math_meta_fields');

/**
 * Register ACF fields for contact cards display
 */
function register_contact_cards_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_contact_cards_settings',
            'title' => 'Contact Cards Settings',
            'fields' => array(
                array(
                    'key' => 'field_display_contact_cards',
                    'label' => 'Display Contact Cards in Content',
                    'name' => 'display_contact_cards',
                    'type' => 'true_false',
                    'instructions' => 'Enable to display contact cards after the second paragraph in the content.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => 'Yes',
                    'ui_off_text' => 'No',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
    }
}
add_action('acf/init', 'register_contact_cards_acf_fields');

/**
 * Register ACF fields for locations/cities section
 */
function register_locations_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        // Cities section with textarea field for easy entry
        acf_add_local_field_group(array(
            'key' => 'group_locations_settings',
            'title' => 'Locations Settings',
            'fields' => array(
                array(
                    'key' => 'field_enable_locations_section',
                    'label' => 'Enable Locations Section',
                    'name' => 'enable_locations_section',
                    'type' => 'true_false',
                    'instructions' => 'Enable to display the locations/cities section on this page.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Yes',
                    'ui_off_text' => 'No',
                ),
                array(
                    'key' => 'field_locations_section_title',
                    'label' => 'Section Title',
                    'name' => 'locations_section_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title for the locations section.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_enable_locations_section',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Onze Locaties in de Provincie',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_province_name',
                    'label' => 'Province Name',
                    'name' => 'province_name',
                    'type' => 'text',
                    'instructions' => 'Enter the province name to display in the title.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_enable_locations_section',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Antwerpen',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_cities_list',
                    'label' => 'Cities',
                    'name' => 'cities_list',
                    'type' => 'textarea',
                    'instructions' => 'Enter city links in the format: City Name|url, one per line. Example: Antwerpen|../slotenmaker-antwerpen.html',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_enable_locations_section',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'City Name|../slotenmaker-city.html
Another City|../slotenmaker-another-city.html',
                    'maxlength' => '',
                    'rows' => 10,
                    'new_lines' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 10,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
    }
}
add_action('acf/init', 'register_locations_acf_fields');

/**
 * Display the cities section
 * 
 * This function can be called in any page template to display the cities section
 */
function display_cities_section() {
    get_template_part('template-parts/template-cities-acf');
}

/**
 * Shortcode to display the cities section anywhere
 * 
 * Usage: [cities_section]
 */
function cities_section_shortcode($atts) {
    ob_start();
    display_cities_section();
    return ob_get_clean();
}
add_shortcode('cities_section', 'cities_section_shortcode');


/**
 * ACF Field Configuration for Contact Page
 * This code should be added to functions.php or a custom plugin file
 */

if (function_exists('acf_add_local_field_group')) {
    
    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page Settings',
        'fields' => array(
            array(
                'key' => 'field_page_subtitle',
                'label' => 'Page Subtitle',
                'name' => 'page_subtitle',
                'type' => 'textarea',
                'instructions' => 'Enter the subtitle text that appears below the page title',
                'required' => 0,
                'default_value' => 'Op zoek naar een oplossing voor toegangscontrole? Dan ben je bij Slotenmaker aan het juiste adres. Wij voorzien deuren en poorten van elektronische sloten in combinatie met een geavanceerde toegangscontrole op basis van een badgesysteem, codeklavier of vingerscanner.',
            ),
            array(
                'key' => 'field_phone_number',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'instructions' => 'Enter your contact phone number',
                'required' => 1,
                'default_value' => '0493/08 93 59',
            ),
            array(
                'key' => 'field_email_address',
                'label' => 'Email Address',
                'name' => 'email_address',
                'type' => 'email',
                'instructions' => 'Enter your contact email address',
                'required' => 1,
                'default_value' => 'info@slotenmakermathias.be',
            ),
            array(
                'key' => 'field_opening_hours',
                'label' => 'Opening Hours',
                'name' => 'opening_hours',
                'type' => 'text',
                'instructions' => 'Enter your business opening hours',
                'required' => 0,
                'default_value' => '24/7',
            ),
            array(
                'key' => 'field_contact_description',
                'label' => 'Contact Description',
                'name' => 'contact_description',
                'type' => 'textarea',
                'instructions' => 'Enter a brief description for the contact section',
                'required' => 0,
                'default_value' => 'Contacteer Slotenmaker. 24/7 spoedservice voor interventies en herstellingen. Wij plaatsten veiligheidscilinders, sloten en meer.',
            ),
            array(
                'key' => 'field_google_map_embed',
                'label' => 'Google Map Embed',
                'name' => 'google_map_embed',
                'type' => 'textarea',
                'instructions' => 'Paste the Google Maps embed code here',
                'required' => 0,
            ),
            array(
                'key' => 'field_contact_form_id',
                'label' => 'Contact Form ID',
                'name' => 'contact_form_id',
                'type' => 'text',
                'instructions' => 'Enter the Contact Form 7 ID',
                'required' => 0,
                'default_value' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/contact-page.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => 'Settings for the Contact page template',
    ));
}