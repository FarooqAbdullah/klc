<?php
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
    wp_register_script('theme-javascript', get_stylesheet_directory_uri().'/js/theme.js', array('jquery', 'bootstrap'), '', true);

    // Enqueue Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
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
//    return $category;
}

function get_woocategories_parent ($category_id) {
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
        if($product_parent_category->term_id != 0) {
            $parent_id[$product_parent_category->parent] = $product_parent_category->parent;
        }
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
