<?php

// add theme support
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

// this is our custom function which loads our stylesheet from the root directory
function custom_theme_assets() {
    wp_enqueue_style('tim-custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'custom_theme_assets');

// register our custom navigation menu in the backend
register_nav_menus( [ 'primary' => __( 'Primary Menu' )]);

// register our custom navigation menu in the backend
register_nav_menus( [ 'secondary' => __( 'Secondary Menu' )]);

// this function will set the excerpt length
function customize_the_excerpt_length() {
    // return 10 characters
    return 10;
}

// a filter hook to modify the default Wordpress excerpt length
add_filter('excerpt_length', 'customize_the_excerpt_length');

// let's set up a custom post type - Staff members

function create_staff_posttype() {
    $args = array (
        'labels' => array(
            // Name of the post type which shows in the CMS backend
            'name' => __('Staff'),
            'singular_name' => __('Staff')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array ('title', 'editor', 'thumbnail')
    );
    register_post_type('staff', $args ); 
}

add_action('init', 'create_staff_posttype');

// let's set up a custom post type - Books

function create_books_posttype() {
    $args = array (
        'labels' => array(
            // Name of the post type which shows in the CMS backend
            'name' => __('Books'),
            'singular_name' => __('Book')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array ('title', 'editor', 'thumbnail')
    );
    register_post_type('books', $args ); 
}

add_action('init', 'create_books_posttype');

// custom function to change the placeholder
function change_staff_title_placeholder($title) {
    $current_screen = get_current_screen();
        if ($current_screen->post_type == 'staff') {
            $title = 'Full name of staff member';
        }
        return $title;
}

add_filter('enter_title_here', 'change_staff_title_placeholder');

/* Register and display metabox */
add_action( 'add_meta_boxes', 'staff_position_add_metabox');

function staff_position_add_metabox()
{
    add_meta_box('my-meta-box-id', //metabox ID
                 'Job Title', //title seen by the user
                 'staff_position_meta_box_callback', //here's the callback function which runs during this function
                 'staff', //our custom post type which the meta box attaches too
                 'normal' //position of the metabox 
                );
}

function staff_position_meta_box_callback($post)  
{  
    $job_title = get_post_meta( $post->ID, '_job_title', true );
    echo "<input type='text' name='jobtitle' value='" . esc_attr($job_title) . "'>";     
}

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'save_staff_meta_box_data' );

function save_staff_meta_box_data($post_id) {

    // If it's autosaving, bail.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Make sure that the right post data is set.
    if ( ! isset( $_POST['jobtitle'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['jobtitle'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_job_title', $my_data );
}

// ---------------start creting a metabox for our books------------------------------

/* Register and display metabox */
add_action( 'add_meta_boxes', 'book_author_add_metabox');

function book_author_add_metabox()
{
    add_meta_box('book-author-id', //metabox ID
                 'Book Author', //title seen by the user
                 'book_author_meta_box_callback', //here's the callback function which runs during this function
                 'books', //our custom post type which the meta box attaches too
                 'normal' //position of the metabox 
                );
}

function book_author_meta_box_callback($post)  
{  
    $book_author = get_post_meta( $post->ID, '_bookauthor', true );
    echo "<p>Enter the full name</p>";
    echo "<input type='text' name='bookauthor' value='" . esc_attr($book_author) . "'>";     
}

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'save_books_meta_box_data' );

function save_books_meta_box_data($post_id) {

    // If it's autosaving, bail.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Make sure that the right post data is set.
    if ( ! isset( $_POST['bookauthor'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['bookauthor'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_bookauthor', $my_data );
}

// hook

add_action('init', 'create_qualifications_staff_taxomony', 0);

// let's create a custom taxonomy

function create_qualifications_staff_taxomony() {
    $labels = array(
        'name' => _x('Qualifications', 'general name'),
        'singular_name' => _x('Qualification', 'singular name'),
        'search_items' => __('Search Qualifications'),
        'all_items' => __('All Qualifications'),
        'parent_item' => __('Parent Qualification'),
        'parent_item_colon' => __('Parent Qualification:'),
        'edit_item' => __('Edit Qualification'),
        'update_item' => __('Update Qualification'),
        'add_new_item' => __('Add New Qualification'),
        'new_item_name' => __('New Qualification Name'),
        'menu_name' => __('Qualification')
    );
    // register the taxonomy in wordpress and plug in the data from our labels array
    register_taxonomy('Qualifications', array('staff'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true
        )
    );
}

// removing fields and customising the Woocomerce cart

add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');
function custom_override_checkout_fields($fields) {
    unset($fields['order']['order_comments']);
    return $fields; 
}

//make the phone number optional

add_filter( 'woocommerce_billing_fields', 'change_phonenumber_field' );
function change_phonenumber_field($address_fields){
    $address_fields['billing_phone']['required'] = false;
    return $address_fields; 
}

///make the postcode field optional

add_filter( 'woocommerce_billing_fields', 'change_postcode_field' );
function change_postcode_field($address_fields){
    $adress_fields['billing_postcode']['required'] = false;
    unset($address_fields['billing_postcode']);
    return $address_fields; 
}

//edit the cart page

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() {
    $html  = '<div class="col-12 offset-md-1 col-md-10"><p class="cart-empty">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) );
    echo $html . '</p></div>';
}

add_action('init', 'create_location_members_taxomony', 0);
 
// let's create a custom taxonomy
 
function create_location_members_taxomony() {
 $labels = array(
 'name' => _x('Locations', 'general name'),
 'singular_name' => _x('Location', 'singular name'),
 'search_items' => __('Search Locations'),
 'all_items' => __('All Locations'),
 'parent_item' => __('Parent Location'),
 'parent_item_colon' => __('Parent Location:'),
 'edit_item' => __('Edit Location'),
 'update_item' => __('Update Location'),
 'add_new_item' => __('Add New Location'),
 'new_item_name' => __('New Location Name'),
 'menu_name' => __('Location')
 );

 
 // register the taxonomy in wordpress and plug in the data from our labels array
 register_taxonomy('Locations', array('staff'), array(
 'hierarchical' => true,
 'labels' => $labels,
 'show_ui' => true
 )
 );
}






 ?>