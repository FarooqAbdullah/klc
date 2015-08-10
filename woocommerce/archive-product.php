<?php
$query_string = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$browse_category = $query_string;
/*if($query_string == "all") {
    $browse_category = _get_cookie('current_category');
    _delete_cookie('current_category');

}else {
    _set_cookie($query_string);
    $browse_category = $query_string;
}*/
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


get_header('shop'); ?>

<?php
/**
 * woocommerce_before_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
// do_action( 'woocommerce_before_main_content' );
?>
<?php
if(is_shop()) {
    ?>

    <div class="body_wrapper">

        <?php the_content();
        $taxonomy     = 'product_cat';
        $orderby      = 'id';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;

        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );
        $all_categories = get_categories( $args );

        ?>
        <!----Masonry -->
        <div class="vc_grid-container-wrapper vc_clearfix">

            <div class="vc_pageable-slide-wrapper vc_clearfix" id="masonry-grid-products" data-vc-grid-content="true">

                <?php  foreach ($all_categories as $cat) {
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;
                        //  echo '<br />category <a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
                        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                        // get the image URL
                        $image = wp_get_attachment_url( $thumbnail_id );
                        // echo $image;


                        ?>
                        <div class="grid-item">
                            <a class="product-cat-hyper" href="<?php echo get_term_link( $cat->slug, 'product_cat' ); ?>"><img src="<?php echo $image ?>" class=""></a>
                            <div class="overlay"></div>
                            <h2 class="product-category-name"> <?php echo $cat->name;?> </h2>
                        </div>


                    <?php }
                }
                ?>



            </div>

        </div>

        <!--Masonry-->
    </div>
<?php
} else {
    ?>

<!--		--><?php // do_action( 'woocommerce_archive_description' );
    $current_page_url = get_permalink('shop');
    $parent_categories = get_woo_parent_categories();
    ?>
    <div class="body_wrapper shop-archive">
        <div class="slider_wrapper">
          <!--  <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product.jpg"  alt="Slider Image"/>
				<div class="title"><?php echo do_action('page_title'); ?></h2></div> -->
				<?php echo do_shortcode('[rev_slider productslistingslider]'); ?>
        </div>
        <nav class="navbar navbar-default f-nav">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('all'))); ?>">All</a></li>
                        <?php
    foreach ($parent_categories as $parent_category) {
        if ($parent_category['has_child']) {
            $child_static_class = null;
            $child_static_position = null;
            if($browse_category == $parent_category['slug']) {
                $child_static_class = "open";
                $child_static_position = "position:static;";
            }
            else {
                $child_static_class = "";
                $child_static_position = "";
            }
            $child_static_slug_id = $parent_category['slug'];
            ?>
            <li class="dropdown <?php echo $child_static_class; ?>" style="<?php echo $child_static_position; ?>" id="<?php echo $child_static_slug_id; ?>">
                <a href="<?php echo get_term_link( $parent_category['slug'], 'product_cat' ); ?>"
                   class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="tue"
                   aria-expanded="fase"><?php echo $parent_category['name']; ?>
                </a>
                <div class="dropdown-menu">
                    <div class="arrow-up"></div>
                    <ul>
                        <?php
                        $sub_categories = get_woo_subcategories($parent_category['term_id']);
                        foreach ($sub_categories as $sub_category) {
                            $child_parent_category =  get_woocategories_parent('',$sub_category['slug']);
                            $par_slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                            if ($child_parent_category['slug'] == $par_slug) {
                                $url_ = "#" . $sub_category['dataID'];
                                ?>
                                <li><a href="<?php echo $url_; ?>" data-id="<?php echo $sub_category['dataID']; ?>"
                                       id="slugUrl"><?php echo $sub_category['name']; ?></a></li>
                            <?php
                            } else {
                                $url_ = get_term_link( $parent_category['slug'], 'product_cat' );
                                ?>
                                <li><a href="<?php echo $url_; ?>" data-id="<?php echo $sub_category['dataID']; ?>"
                                       id="withoutSlugUrl"><?php echo $sub_category['name']; ?></a></li>
                            <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </li>
        <?php
        } else {
            echo '<li><a href="' . get_term_link( $parent_category['slug'], 'product_cat' ) . '">' . $parent_category['name'] . '</a></li>';
        }
    }
    ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <?php
    $current_category = $browse_category;
    $current_category_id = get_woocategories_id_from_category_slug($current_category);
    $parent_cat = get_woocategories_parent($current_category_id);

    ?>
    <div class="row category-title">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="main-head"><?php echo $parent_cat['name']; ?></h1>
        </div>
    </div>
<?php
    $sub_categories_post = get_woo_subcategories($parent_cat['term_id']);
    if (empty($sub_categories_post)) {
        ?>
                <div class="row section" id="<?php echo $parent_cat['dataID']; ?>">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2><?php echo(!empty($parent_cat['name']) ? $parent_cat['name'] : "Category Name Not Found"); ?></h2>
                            <p>
                                <?php echo(!empty($parent_cat['description']) ? $parent_cat['description'] : "Category Description Not Found"); ?>
                            </p>
                        </div>
                        <div class="row text-center">
                            <?php
        $thumbnail_id = get_woocommerce_term_meta($parent_cat['term_id'], 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id);
        if (!empty($image_url)) {
            ?>
            <img src="<?php echo $image_url; ?>" alt=""/>

        <?php
        } else {
            echo "Category Image not Found";
        }
        ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $parent_cat['slug']
                ),
            )
        );
        $loop = new WP_Query($args);
        $count = $loop->post_count;
        if ($loop->have_posts()) {
            $j = 1;
            while ($loop->have_posts()) : $loop->the_post();
                $product = new WC_Product( get_the_ID() );
                $attributes = $product->get_attributes();
                $color_choices = null;
                if(!empty($attributes)) {
                    $color_values = get_the_terms( $product->id, 'pa_color');
                    if($color_values) {
                        foreach ( $color_values as $color_value ) {
                            $color_choices .= $color_value->name . " and ";
                        }
                        $color_choices = rtrim($color_choices,' and ');
                    }
                }
                $price = $product->get_price();
                // wc_get_template_part( 'content', 'product' );
                $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                $image_output_src = $image_src_array[0];
                $even = "";
                if ($j % 2 == 1) {
                    $even = 'odd';
                } else {
                    $even = 'even';
                }
                if ($j == 1 || $j == 3) {
                    ?>

                    <div class="row short-product">
                <?php
                }
                if ($j < 5) {
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo get_permalink(); ?>">
                                <img src="<?php echo $image_output_src; ?>" alt=""/>
                            </a>

                            <div class="product-hover-detail row <?php echo $even; ?> s-product main-item-hover-wrapper">
                                <?php
                                if($even == "odd") {
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color"><?php echo $color_choices; ?></p>
                                                <p class="name"><?php the_title(); ?></p>
                                                <p class="price"><?php echo wc_price($price); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>

                                            <p>Use your Saved Custom preferences or KLYNC design</p>
                                            <div
                                                class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                <!--<label for="saved-preferences">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                            Saved Preferences
                                                        </span>
                                                </label>
                                                <label for="klnyc">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="klnyc" id="klnyc"/>
                                                            KLNYC
                                                        </span>
                                                </label>-->
                                                <label for="custom-preferences">
                                                    <select name="custom-preferences" id="custom-preferences"
                                                            class="form-control">
                                                        <option value="saved-preferences"> Saved Preferences
                                                        </option>
                                                        <option value="saved-preferences"> KLYNC Preferences
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div class="or-text">OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                else {
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>

                                            <p>Use your Saved Custom preferences or KLYNC design</p>
                                            <div
                                                class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                <!--<label for="saved-preferences">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                            Saved Preferences
                                                        </span>
                                                </label>
                                                <label for="klnyc">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="klnyc" id="klnyc"/>
                                                            KLNYC
                                                        </span>
                                                </label>-->
                                                <label for="custom-preferences">
                                                    <select name="custom-preferences" id="custom-preferences"
                                                            class="form-control">
                                                        <option value="saved-preferences"> Saved Preferences
                                                        </option>
                                                        <option value="saved-preferences"> KLYNC Preferences
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div class="or-text">OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                        </div>
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color"><?php echo $color_choices; ?></p>
                                                <p class="name"><?php the_title(); ?></p>
                                                <p class="price"><?php echo wc_price($price); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color"><?php echo $color_choices; ?></p>

                            <p class="name"><?php the_title(); ?></p>

                            <p class="price"><?php echo wc_price($price); ?></p>
                        </div>
                    </div>
                <?php
                }
                if (($j == 1 && $count == 1) || ($j == 3 && $count == 3) || $j == 4) {
                    ?>
                    </div>
                    </div>
                    </div>
                <?php
                }
                if ($j == 2 && $count == 2) {
                    ?>
                    </div>
                    </div>
                <?php
                }
                if ($j == 2) {
                    ?>
                                </div>
                                <?php
                }
                if ($j == 5 || $j == 9) {
                    ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row fourth-product">
                <?php
                }
                if ($j > 4) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo get_permalink(); ?>">
                                <img src="<?php echo $image_output_src; ?>" alt=""/>
                            </a>

                            <div class="product-hover-detail row <?php echo $even; ?> main-item-hover-wrapper">
                                <?php
                                if($even == "odd") {
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color"><?php echo $color_choices; ?></p>
                                                <p class="name"><?php the_title(); ?></p>
                                                <p class="price"><?php echo wc_price($price); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>

                                            <p>Use your Saved Custom preferences or KLYNC design</p>
                                            <div
                                                class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                <!--<label for="saved-preferences">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                            Saved Preferences
                                                        </span>
                                                </label>
                                                <label for="klnyc">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="klnyc" id="klnyc"/>
                                                            KLNYC
                                                        </span>
                                                </label>-->
                                                <label for="custom-preferences">
                                                    <select name="custom-preferences" id="custom-preferences"
                                                            class="form-control">
                                                        <option value="saved-preferences"> Saved Preferences
                                                        </option>
                                                        <option value="saved-preferences"> KLYNC Preferences
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div class="or-text">OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                else {
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>

                                            <p>Use your Saved Custom preferences or KLYNC design</p>
                                            <div
                                                class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                <!--<label for="saved-preferences">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                            Saved Preferences
                                                        </span>
                                                </label>
                                                <label for="klnyc">
                                                        <span class="custom-checkbox-wrapper btn btn-primary">
                                                            <input type="checkbox" name="klnyc" id="klnyc"/>
                                                            KLNYC
                                                        </span>
                                                </label>-->
                                                <label for="custom-preferences">
                                                    <select name="custom-preferences" id="custom-preferences"
                                                            class="form-control">
                                                        <option value="saved-preferences"> Saved Preferences
                                                        </option>
                                                        <option value="saved-preferences"> KLYNC Preferences
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div class="or-text">OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                        </div>
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color"><?php echo $color_choices; ?></p>
                                                <p class="name"><?php the_title(); ?></p>
                                                <p class="price"><?php echo wc_price($price); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color"><?php echo $color_choices; ?></p>

                            <p class="name"><?php the_title(); ?></p>

                            <p class="price"><?php echo wc_price($price); ?></p>
                        </div>
                    </div>
                <?php
                }
                if ($j == 8 || $j == 12 || ($count == 5 && $j == 5) || ($count == 6 && $j == 6) || ($count == 7 && $j == 7) || ($count == 9 && $j == 9) || ($count == 10 && $j == 10) || ($count == 11 && $j == 11)) {
                    ?>
                    </div>
                    </div>
                <?php
                }
                $j++;
            endwhile;
        } else {
            echo __('No products found');
            ?>
                        </div>
                        </div>
                        <?php
        }
        wp_reset_postdata();
        ?>
                        </div>
    <?php

    } else {
        foreach ($sub_categories_post as $cat_posts) {
            ?>
        <div class="row section" id="<?php echo $cat_posts['dataID']; ?>">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2><?php echo(!empty($cat_posts['name']) ? $cat_posts['name'] : "Category Name Not Found"); ?></h2>
                            <p>
                                <?php echo(!empty($cat_posts['description']) ? $cat_posts['description'] : "Category Description Not Found"); ?>
                            </p>
                            <!--<p>
                                Available in 3 fits and 3 collars
                            </p>-->
                        </div>
                        <div class="row text-center">
                            <?php
            $thumbnail_id = get_woocommerce_term_meta($cat_posts['term_id'], 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);
            if (!empty($image_url)) {
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>

            <?php
            } else {
                echo "Category Image not Found";
            }
            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <?php

//                global $product;
//                $koostis = array_shift(wc_get_product_terms($product->id, 'pa_koostis', array('fields' => 'color')));
//                    var_dump($koostis);

            ?>
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $cat_posts['slug']
                    ),
                )
            );
            $loop = new WP_Query($args);
            $count = $loop->post_count;
            if ($loop->have_posts()) {
                $j = 1;
                while ($loop->have_posts()) : $loop->the_post();
                    $product = new WC_Product( get_the_ID() );
                    $attributes = $product->get_attributes();
                    $color_choices = null;
                    if(!empty($attributes)) {
                        $color_values = get_the_terms( $product->id, 'pa_color');
                        if($color_values) {
                            foreach ( $color_values as $color_value ) {
                                $color_choices .= $color_value->name . " and ";
                            }
                            $color_choices = rtrim($color_choices,' and ');
                        }
                    }
                    $price = $product->get_price();
                    // wc_get_template_part( 'content', 'product' );
                    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                    $image_output_src = $image_src_array[0];
                    $even = "";
                    if ($j % 2 == 1) {
                        $even = 'odd';
                    } else {
                        $even = 'even';
                    }
                    if ($j == 1 || $j == 3) {
                        ?>

                        <div class="row short-product">
                    <?php
                    }
                    if ($j < 5) {
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                </a>
                                <div class="product-hover-detail row <?php echo $even; ?> s-product main-item-hover-wrapper">
                                    <?php
                                        if($even == "odd") {
                                            ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row h-img-wrapper">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                        <p class="color"><?php echo $color_choices; ?></p>
                                                        <p class="name"><?php the_title(); ?></p>
                                                        <p class="price"><?php echo wc_price($price); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                    <h2>Quick Shop</h2>

                                                    <p>Use your Saved Custom preferences or KLYNC design</p>
                                                    <div
                                                        class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                        <!--<label for="saved-preferences">
                                                                <span class="custom-checkbox-wrapper btn btn-primary">
                                                                    <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                                    Saved Preferences
                                                                </span>
                                                        </label>
                                                        <label for="klnyc">
                                                                <span class="custom-checkbox-wrapper btn btn-primary">
                                                                    <input type="checkbox" name="klnyc" id="klnyc"/>
                                                                    KLNYC
                                                                </span>
                                                        </label>-->
                                                        <label for="custom-preferences">
                                                            <select name="custom-preferences" id="custom-preferences"
                                                                    class="form-control">
                                                                <option value="saved-preferences"> Saved Preferences
                                                                </option>
                                                                <option value="saved-preferences"> KLYNC Preferences
                                                                </option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-primary">ADD TO CART</button>
                                                    </div>
                                                    <div class="or-text">OR</div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-default customize">Customize</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    else {
                                        ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                <h2>Quick Shop</h2>

                                                <p>Use your Saved Custom preferences or KLYNC design</p>
                                                <div
                                                    class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                    <!--<label for="saved-preferences">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                                Saved Preferences
                                                            </span>
                                                    </label>
                                                    <label for="klnyc">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="klnyc" id="klnyc"/>
                                                                KLNYC
                                                            </span>
                                                    </label>-->
                                                    <label for="custom-preferences">
                                                        <select name="custom-preferences" id="custom-preferences"
                                                                class="form-control">
                                                            <option value="saved-preferences"> Saved Preferences
                                                            </option>
                                                            <option value="saved-preferences"> KLYNC Preferences
                                                            </option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary">ADD TO CART</button>
                                                </div>
                                                <div class="or-text">OR</div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-default customize">Customize</button>
                                                </div>
                                            </div>
                                            <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="pull-right">
                                                    <div class="row h-img-wrapper">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                        <p class="color"><?php echo $color_choices; ?></p>
                                                        <p class="name"><?php the_title(); ?></p>
                                                        <p class="price"><?php echo wc_price($price); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color"><?php echo $color_choices; ?></p>

                                <p class="name"><?php the_title(); ?></p>

                                <p class="price"><?php echo wc_price($price); ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    if (($j == 1 && $count == 1) || ($j == 3 && $count == 3) || $j == 4) {
                        ?>
                        </div>
                        </div>
                        </div>
                    <?php
                    }
                    if ($j == 2 && $count == 2) {
                        ?>
                        </div>
                        </div>
                    <?php
                    }
                    if ($j == 2) {
                        ?>
                                </div>
                                <?php
                    }
                    if ($j == 5 || $j == 9) {
                        ?>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row  fourth-product">
                    <?php
                    }
                    if ($j > 4) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo $image_output_src; ?>" alt=""/>
                                </a>

                                <div class="product-hover-detail row <?php echo $even; ?> main-item-hover-wrapper">
                                    <?php
                                    if($even == "odd") {
                                        ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row h-img-wrapper">
                                                    <a href="<?php echo get_permalink(); ?>">
                                                        <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                    <p class="color"><?php echo $color_choices; ?></p>
                                                    <p class="name"><?php the_title(); ?></p>
                                                    <p class="price"><?php echo wc_price($price); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                <h2>Quick Shop</h2>

                                                <p>Use your Saved Custom preferences or KLYNC design</p>
                                                <div
                                                    class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                    <!--<label for="saved-preferences">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                                Saved Preferences
                                                            </span>
                                                    </label>
                                                    <label for="klnyc">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="klnyc" id="klnyc"/>
                                                                KLNYC
                                                            </span>
                                                    </label>-->
                                                    <label for="custom-preferences">
                                                        <select name="custom-preferences" id="custom-preferences"
                                                                class="form-control">
                                                            <option value="saved-preferences"> Saved Preferences
                                                            </option>
                                                            <option value="saved-preferences"> KLYNC Preferences
                                                            </option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary">ADD TO CART</button>
                                                </div>
                                                <div class="or-text">OR</div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-default customize">Customize</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    else {
                                        ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                <h2>Quick Shop</h2>

                                                <p>Use your Saved Custom preferences or KLYNC design</p>
                                                <div
                                                    class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
                                                    <!--<label for="saved-preferences">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="saved-preferences" id="saved-preferences"/>
                                                                Saved Preferences
                                                            </span>
                                                    </label>
                                                    <label for="klnyc">
                                                            <span class="custom-checkbox-wrapper btn btn-primary">
                                                                <input type="checkbox" name="klnyc" id="klnyc"/>
                                                                KLNYC
                                                            </span>
                                                    </label>-->
                                                    <label for="custom-preferences">
                                                        <select name="custom-preferences" id="custom-preferences"
                                                                class="form-control">
                                                            <option value="saved-preferences"> Saved Preferences
                                                            </option>
                                                            <option value="saved-preferences"> KLYNC Preferences
                                                            </option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary">ADD TO CART</button>
                                                </div>
                                                <div class="or-text">OR</div>
                                                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-default customize">Customize</button>
                                                </div>
                                            </div>
                                            <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="pull-right">
                                                    <div class="row h-img-wrapper">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                        <p class="color"><?php echo $color_choices; ?></p>
                                                        <p class="name"><?php the_title(); ?></p>
                                                        <p class="price"><?php echo wc_price($price); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color"><?php echo $color_choices; ?></p>

                                <p class="name"><?php the_title(); ?></p>
                                <p class="price"><?php echo wc_price($price); ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    if ($j == 8 || $j == 12 || ($count == 5 && $j == 5) || ($count == 6 && $j == 6) || ($count == 7 && $j == 7) || ($count == 9 && $j == 9) || ($count == 10 && $j == 10) || ($count == 11 && $j == 11)) {
                        ?>
                        </div>
                        </div>
                    <?php
                    }
                    $j++;
                endwhile;
            } else {
                echo __('No products found');
                ?>
                        </div>
                        </div>
                        <?php
            }
            wp_reset_postdata();
            ?>
                        </div>
    <?php
        }

    }
    ?> </div> <?php
}
get_footer();