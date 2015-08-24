<?php

include('custom-functions.php');
//Image sizes

add_image_size ( 'menu-image', 786, 186, false );

function theme_styles() {
	//DE Register Styles
	wp_deregister_style('woocommerce');

    // Register Style Sheets
    wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), '', '');
    wp_register_style( 'general-css', get_stylesheet_directory_uri().'/css/styles_general.css', array('bootstrap'), '', '');
    wp_register_style( 'styles-css', get_stylesheet_directory_uri().'/css/styles.css', array('bootstrap'), '', '');
    wp_register_style( 'theme-responsive', get_stylesheet_directory_uri().'/css/theme_responsive.css', array('bootstrap'), '', '');
	wp_register_style( 'theme-woocommerce', get_stylesheet_directory_uri().'/stylesheet/css/woocommerce.min.css', array('bootstrap'), '', '');

    // Enqueue Style Sheets
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('general-css');
    wp_enqueue_style('styles-css');
	wp_enqueue_style('theme-woocommerce');
//    wp_enqueue_style('theme-responsive');
}

function theme_scripts() {

    // Register Scripts
    wp_register_script('jquery', get_stylesheet_directory_uri().'/js/jquery-1.11.3.min.js', array(), '', true);
    wp_register_script('bootstrap', get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'), '', true);
    wp_register_script('visible-js', get_stylesheet_directory_uri().'/js/visible.js', array('jquery'), '', true);
    wp_register_script('theme-javascript', get_stylesheet_directory_uri().'/js/theme.js', array('jquery', 'bootstrap'), '', true);

    // Enqueue Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('visible-js');
    wp_enqueue_script('theme-javascript');
}
function theme_styles_scripts() {
    theme_styles();
    theme_scripts();
}
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts');

//WooCommerce Functions
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

//Related Products
function woo_related_products_limit() {
  
  global $product;
	
	$args['posts_per_page'] = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}

function get_woocategories_with_subcategories () {
    $args = array(
        'orderby'    => 'id',
        'hide_empty' => false,
        'order'      => 'ASC',
        'parent'     => ''
    );
    $product_categories = get_terms( 'product_cat', $args );
    $category = array();
    foreach($product_categories as $product_category) {
        if($product_category->parent != 0) {
            $category[$product_category->parent]['has_child'] = true;
        }
        $category[$product_category->term_id]['term_id'] = $product_category->term_id;
        $category[$product_category->term_id]['name'] = $product_category->name;
        $category[$product_category->term_id]['slug'] = $product_category->slug;
        $category[$product_category->term_id]['term_group'] = $product_category->term_group;
        $category[$product_category->term_id]['term_taxonomy_id'] = $product_category->term_taxonomy_id;
        $category[$product_category->term_id]['taxonomy'] = $product_category->taxonomy;
        $category[$product_category->term_id]['description'] = $product_category->description;
        $category[$product_category->term_id]['parent'] = $product_category->parent;
        $category[$product_category->term_id]['count'] = $product_category->count;
        $category[$product_category->term_id]['has_child'] = (isset($category[$product_category->term_id]['has_child']) ? $category[$product_category->term_id]['has_child'] : false );
    }
    return $category;
}

function get_woocategories_id_from_category_slug ($slug) {
    $args = array(
        'orderby'    => 'id',
        'hide_empty' => false,
        'order'      => 'ASC',
        'parent'     => ''
    );
    $product_categories = get_terms( 'product_cat', $args );
    foreach($product_categories as $product_category) {
        if($product_category->slug == $slug) {
            return $product_category->term_id;
        }
    }
}

function get_woocategories_parent ($category_id = null, $category_slug = null) {
    $args = array(
        'orderby'    => 'id',
        'hide_empty' => false,
        'order'      => 'ASC',
        'parent'     => ''
    );
    $product_categories = get_terms( 'product_cat', $args );
    $temp = $parent = array();
    foreach($product_categories as $product_category) {
        $temp[$product_category->term_id]['name'] = $product_category->name;
        $temp[$product_category->term_id]['term_id'] = $product_category->term_id;
        $temp[$product_category->term_id]['description'] = $product_category->description;
        $temp[$product_category->term_id]['parent'] = $product_category->parent;
        $temp[$product_category->term_id]['slug'] = $product_category->slug;
    }
    foreach($product_categories as $product_category) {
        if($product_category->term_id == $category_id) {
            if($product_category->parent == 0){
                $parent['name'] = $product_category->name;
                $parent['term_id'] = $product_category->term_id;
                $parent['description'] = $product_category->description;
                $parent['parent'] = $product_category->parent;
                $parent['slug'] = $product_category->slug;
            }
            else {
                $parent['name'] = $temp[$product_category->parent]['name'];
                $parent['term_id'] = $temp[$product_category->parent]['term_id'];
                $parent['description'] = $temp[$product_category->parent]['description'];
                $parent['parent'] = $temp[$product_category->parent]['parent'];
                $parent['slug'] = $temp[$product_category->parent]['slug'];
            }
        }
        else if($product_category->slug == $category_slug) {
            if($product_category->parent == 0){
                $parent['name'] = $product_category->name;
                $parent['term_id'] = $product_category->term_id;
                $parent['description'] = $product_category->description;
                $parent['parent'] = $product_category->parent;
                $parent['slug'] = $product_category->slug;
            }
            else {
                $parent['name'] = $temp[$product_category->parent]['name'];
                $parent['term_id'] = $temp[$product_category->parent]['term_id'];
                $parent['description'] = $temp[$product_category->parent]['description'];
                $parent['parent'] = $temp[$product_category->parent]['parent'];
                $parent['slug'] = $temp[$product_category->parent]['slug'];
            }
        }
    }
    return $parent;
}

function get_woo_subcategories ($parent_id) {
    $args = array(
        'orderby'    => 'id',
        'hide_empty' => false,
        'order'      => 'ASC',
        'parent'     => $parent_id
    );
    $product_sub_categories = get_terms( 'product_cat', $args );
    $sub_category = array();
    foreach($product_sub_categories as $product_sub_category) {
        $sub_category[$product_sub_category->term_id]['term_id'] = $product_sub_category->term_id;
        $sub_category[$product_sub_category->term_id]['name'] = $product_sub_category->name;
        $dataID = explode(' ', $product_sub_category->name );
        $num = 1;
        $sub_category[$product_sub_category->term_id][$num] =null;
        foreach($dataID as $data) {
            if($num == 1) {
                $sub_category[$product_sub_category->term_id]['dataID'] .= strtolower($data);
            }
            else {
                $sub_category[$product_sub_category->term_id]['dataID'] .= ucfirst(strtolower($data));
            }
            $num++;
        }
        $sub_category[$product_sub_category->term_id]['slug'] = $product_sub_category->slug;
        $sub_category[$product_sub_category->term_id]['term_group'] = $product_sub_category->term_group;
        $sub_category[$product_sub_category->term_id]['term_taxonomy_id'] = $product_sub_category->term_taxonomy_id;
        $sub_category[$product_sub_category->term_id]['taxonomy'] = $product_sub_category->taxonomy;
        $sub_category[$product_sub_category->term_id]['description'] = $product_sub_category->description;
        $sub_category[$product_sub_category->term_id]['parent'] = $product_sub_category->parent;
        $sub_category[$product_sub_category->term_id]['count'] = $product_sub_category->count;
    }
    return $sub_category;
}

function get_single_category_post ($slug) {

    $product_category_post = get_term_by( 'slug', $slug, 'product_cat' );
    $sub_category[$product_category_post->term_id]['term_id'] = $product_category_post->term_id;
    $sub_category[$product_category_post->term_id]['name'] = $product_category_post->name;
    $dataID = explode(' ', $product_category_post->name );
    $num = 1;
    $sub_category[$product_category_post->term_id][$num] =null;
    foreach($dataID as $data) {
        if($num == 1) {
            $sub_category[$product_category_post->term_id]['dataID'] .= strtolower($data);
        }
        else {
            $sub_category[$product_category_post->term_id]['dataID'] .= ucfirst(strtolower($data));
        }
        $num++;
    }
    $sub_category[$product_category_post->term_id]['slug'] = $product_category_post->slug;
    $sub_category[$product_category_post->term_id]['term_group'] = $product_category_post->term_group;
    $sub_category[$product_category_post->term_id]['term_taxonomy_id'] = $product_category_post->term_taxonomy_id;
    $sub_category[$product_category_post->term_id]['taxonomy'] = $product_category_post->taxonomy;
    $sub_category[$product_category_post->term_id]['description'] = $product_category_post->description;
    $sub_category[$product_category_post->term_id]['parent'] = $product_category_post->parent;
    $sub_category[$product_category_post->term_id]['count'] = $product_category_post->count;

    return $sub_category;
}

function get_woo_parent_categories () {
    $args = array(
        'orderby'    => 'id',
        'hide_empty' => false,
        'order'      => 'ASC',
        'parent'     => ''
    );
    $product_parent_categories = get_terms( 'product_cat', $args );
    $parent_category = array();
    $parent_id = null;
    foreach($product_parent_categories as $product_parent_category) {
        if($product_parent_category->parent != 0) {
            $parent_id[$product_parent_category->parent] = $product_parent_category->parent;
        }
    }
    foreach($product_parent_categories as $product_parent_category) {
        if($product_parent_category->parent == 0 ) {
            $parent_category[$product_parent_category->term_id]['term_id'] = $product_parent_category->term_id;
            $parent_category[$product_parent_category->term_id]['name'] = $product_parent_category->name;
            $parent_category[$product_parent_category->term_id]['slug'] = $product_parent_category->slug;
            $parent_category[$product_parent_category->term_id]['term_group'] = $product_parent_category->term_group;
            $parent_category[$product_parent_category->term_id]['term_taxonomy_id'] = $product_parent_category->term_taxonomy_id;
            $parent_category[$product_parent_category->term_id]['taxonomy'] = $product_parent_category->taxonomy;
            $parent_category[$product_parent_category->term_id]['description'] = $product_parent_category->description;
            $parent_category[$product_parent_category->term_id]['parent'] = $product_parent_category->parent;
            $parent_category[$product_parent_category->term_id]['count'] = $product_parent_category->count;
            if($parent_id[$product_parent_category->term_id] == $product_parent_category->term_id ) {
                $parent_category[$product_parent_category->term_id]['has_child'] = true;
            }
            else {
                $parent_category[$product_parent_category->term_id]['has_child'] = false;
            }
        }
    }
    return $parent_category;
}

//add_action( 'init', '_set_cookie' );
function _set_cookie($value) {
    setcookie( 'current_category', $value , time() + 3600);
}

//add_action( 'wp_head', 'my_getcookie' );
function _get_cookie($name) {
    $cookie_result  = isset( $_COOKIE[$name] ) ? $_COOKIE[$name] : 'daily-grind';
    return $cookie_result;
}

function _delete_cookie($name) {
    setcookie( $name, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN );
}
////////////////////

//Login and Register shortcodes

/* * *********** WP LOGIN FORM ******************* */

function login_form_shortcode() {
    if (is_user_logged_in())
        return '';

    $url = strtok(( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], '?');
    return wp_login_form(array('echo' => false, 'redirect' => $url));
}

function login_add_shortcodes() {
    add_shortcode('login-form', 'login_form_shortcode');
}

add_action('init', 'login_add_shortcodes');

/* * *********** Register Form ******************* */
//1. Add a new form element...
add_action('register_form', 'myplugin_register_form');

function myplugin_register_form() {

    $user_pass = (!empty($_POST['user_pass']) ) ? trim($_POST['user_pass']) : '';
    ?>
    <p>
        <label for="user_pass"><?php _e('Password', 'mydomain') ?><br />
            <input type="text" name="user_pass" id="user_pass" class="input" value="<?php echo esc_attr(wp_unslash($user_pass)); ?>" size="25" /></label>
    </p>
    <?php
}

//2. Add validation. In this case, we make sure first_name is required.
add_filter('registration_errors', 'myplugin_registration_errors', 10, 3);

function myplugin_registration_errors($errors, $sanitized_user_login, $user_email) {
    $user_pass = $_POST['user_pass'];
    if (empty($_POST['user_pass']) || !empty($_POST['user_pass']) && trim($_POST['user_pass']) == '') {
        $errors->add('user_pass_error', __('<strong>ERROR</strong>: You must include a first name.', 'mydomain'));
    }

    return $errors;
}

//3. Finally, save our extra registration user meta.
add_action('user_register', 'myplugin_user_register');

function myplugin_user_register($user_id) {
    if (!empty($_POST['first_name'])) {
        update_users($user_pass, 'user_pass', trim($_POST['user_pass']));
    }
}
////////////////////////////////////////////

/* * ***********Shortcode Register ***************** */

function objects_registration_form() {

    // only show the registration form to non-logged-in members
    if (!is_user_logged_in()) {

        global $pippin_load_css;

        // set this to true so the CSS is loaded
        $pippin_load_css = false;

        // check to make sure user registration is enabled
        $registration_enabled = get_option('users_can_register');

        // only show the registration form if allowed
        if ($registration_enabled) {
            $output = pippin_registration_form_fields();
        } else {
            $output = __('User registration is not enabled');
        }
        return $output;
    }
}

add_shortcode('register_form', 'objects_registration_form');

/* * *************Form Content ********************* */
global $sess;

//session_start();
function pippin_registration_form_fields() {

    ob_start();
    ?>


    <?php
    // show any error messages after form submission

    pippin_show_error_messages();
    ?>

    <form id="user_registration_form" class="user_form" action="" method="POST">
        <fieldset>

            <p>
                <input name="pippin_user_email" placeholder="Email" id="pippin_user_email" class="required" type="email"/>
            </p>
            <p>

                <input name="pippin_user_pass" placeholder="Password" id="password" class="required" type="password"/>
            </p>
            <p>By registering, you agree to our <a class="termsConds" href="<?php echo home_url('terms') ?>">Terms & Conditions</a> and <a class="termsConds" href="<?php echo home_url('privacy') ?>"> Privacy Policy.</a></p>

            <p>  <input type="hidden" name="pippin_register_nonce" value="<?php echo wp_create_nonce('pippin-register-nonce'); ?>"/> </p>
            <input type="submit" class="btnRegister" name="form_submit" value="<?php _e('Register'); ?>" />
            <div class="reset pull-right">Already a member ? <a href="#" data-toggle="modal" data-target="#ModalLogin" data-dismiss="modal" id="loginme">Login</a></div>

        </fieldset>
    </form>
    <?php
    return ob_get_clean();
}

/* * ************Register Fom ********************* */

// register a new user
function pippin_add_new_member() {
    if (isset($_POST["pippin_user_email"]) && wp_verify_nonce($_POST['pippin_register_nonce'], 'pippin-register-nonce')) {
        $user_login = $_POST["pippin_user_email"];
        $user_email = $_POST["pippin_user_email"];
        $user_pass = $_POST["pippin_user_pass"];

        // this is required for username checks
        // require_once(ABSPATH . WPINC . '/registration.php');

        if (username_exists($user_login)) {
            // Username already registered
            pippin_errors()->add('username_unavailable', __('Username already taken'));
        }
        if (!validate_username($user_login)) {
            // invalid username
            pippin_errors()->add('username_invalid', __('Invalid username'));
        }
        if ($user_login == '') {
            // empty username
            pippin_errors()->add('username_empty', __('Please enter a username'));
        }
        if (!is_email($user_email)) {
            //invalid email
            pippin_errors()->add('email_invalid', __('Invalid email'));
        }
        if (email_exists($user_email)) {
            //Email address already registered
            pippin_errors()->add('email_used', __('Email already registered'));
        }
        if ($user_pass == '') {
            // passwords do not match
            pippin_errors()->add('password_empty', __('Please enter a password'));
        }


        $errors = pippin_errors()->get_error_messages();

        // only create the user in if there are no errors
        if (empty($errors)) {

            $new_user_id = wp_insert_user(array(
                'user_login' => $user_login,
                'user_pass' => $user_pass,
                'user_email' => $user_email,
                'user_registered' => date('Y-m-d H:i:s'),
                'role' => 'subscriber'
                    )
            );
            if ($new_user_id) {
                // send an email to the admin alerting them of the registration
                wp_new_user_notification($new_user_id);
                // log the new user in
                wp_set_auth_cookie($user_login, $user_pass, true);
                wp_set_current_user($new_user_id, $user_login);
                do_action('wp_login', $user_login);

                // send the newly created user to the home page after logging them in
                echo $sess = " Hello World";

                $_SESSION["ok"] = "ok";
                wp_redirect(home_url());
                exit;
            }
        } else {
            echo "Success";
        }
    }
}

add_action('init', 'pippin_add_new_member');

/* * ****Errors8*** */

function pippin_errors() {
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function pippin_show_error_messages() {
    if ($codes = pippin_errors()->get_error_codes()) {
        echo '<div class="pippin_errors">';
        // Loop error codes and display errors
        foreach ($codes as $code) {

            $message = pippin_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }



        echo '</div>';
    }
}



////////////////////////////////////////////
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );       // Remove the description tab
    unset( $tabs['reviews'] );    // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
}
