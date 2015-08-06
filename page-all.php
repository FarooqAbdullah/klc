<?php
/*
Template Name: All Category Products
*/
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


get_header('shop');
$current_page_url = get_permalink('shop');
$parent_categories = get_woo_parent_categories();
?>
    <div class="body_wrapper shop-archive">
        <div class="slider_wrapper">
            <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product.jpg"  alt="Slider Image"/>
            <div class="title"><?php echo do_action('page_title'); ?></h2></div>
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
                    <li><a href="<?php the_permalink(get_the_ID()); ?>">All</a></li>
                        <?php
foreach ($parent_categories as $parent_category) {
    if ($parent_category['has_child']) {
        $child_static_class = null;
        $child_static_position = null;
        if($browse_parent_category['slug'] == $parent_category['slug']) {
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
$parent_cat = get_woo_parent_categories();
if (empty($parent_cat)) {
    ?>
    <div class="no-categories-found">
        <h2 class="text-center">
            <?php echo __('No Product Found.');?>
        </h2>
    </div>
<?php
} else {
    foreach ($parent_cat as $cat_posts) {
        ?>
        <div class="row category-title">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="main-head"><?php echo $cat_posts['name']; ?></h1>
            </div>
        </div>
        <?php
            if($cat_posts['has_child']) {
                $sub_categories_current_parent = get_woo_subcategories($cat_posts['term_id']);
                foreach($sub_categories_current_parent as $sub_category_parent){
                    ?>
                <div class="row section" id="<?php echo $sub_category_parent['dataID']; ?>">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2><?php echo(!empty($sub_category_parent['name']) ? $sub_category_parent['name'] : "Category Name Not Found"); ?></h2>
                            <p>
                                <?php echo(!empty($sub_category_parent['description']) ? $sub_category_parent['description'] : "Category Description Not Found"); ?>
                            </p>
                        </div>
                        <div class="row text-center">
                            <?php
                    $thumbnail_id = get_woocommerce_term_meta($sub_category_parent['term_id'], 'thumbnail_id', true);
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
                                'terms' => $sub_category_parent['slug']
                            ),
                        )
                    );
                    $loop = new WP_Query($args);
                    $count = $loop->post_count;
                    if ($loop->have_posts()) {
                        $j = 1;
                        while ($loop->have_posts()) : $loop->the_post();
                            $product = new WC_Product( get_the_ID() );
                            $price = $product->price;
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

                                        <div
                                            class="product-hover-detail row <?php echo $even; ?> s-product main-item-hover-wrapper">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row h-img-wrapper">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                        <p class="color">Navy And White</p>
                                                        <p class="name"><?php the_title(); ?></p>
                                                        <p class="price">$<?php echo $price; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                    <h2>Quick Shop</h2>

                                                    <p>Use your Saved Custom preferences or KLYNC design</p>
                                                    <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                        <p class="color">Navy And White</p>

                                        <p class="name">Daily Grind No Pocket</p>

                                        <p class="price">$<?php echo $price; ?></p>
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
                                <div class="row">
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
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row h-img-wrapper">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <img src="<?php echo $image_output_src; ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                        <p class="color">Navy And White</p>

                                                        <p class="name">Daily Grind No Pocket</p>

                                                        <p class="price">$<?php echo $price; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                                    <h2>Quick Shop</h2>

                                                    <p>Use your Saved Custom preferences or KLYNC design</p>

                                                    <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                        <p class="color">Navy And White</p>

                                        <p class="name">Daily Grind No Pocket</p>

                                        <p class="price">$<?php echo $price; ?></p>
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
            else {
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
                $price = $product->price;
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <img src="<?php echo $image_output_src; ?>" alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name"><?php the_title(); ?></p>
                                            <p class="price">$<?php echo $price; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>

                                        <p>Use your Saved Custom preferences or KLYNC design</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
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
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>

                            <p class="name">Daily Grind No Pocket</p>

                            <p class="price">$<?php echo $price; ?></p>
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
                    <div class="row">
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <img src="<?php echo $image_output_src; ?>" alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>

                                            <p class="name">Daily Grind No Pocket</p>

                                            <p class="price">$<?php echo $price; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>

                                        <p>Use your Saved Custom preferences or KLYNC design</p>

                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12 saved-preferences">
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
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>

                            <p class="name">Daily Grind No Pocket</p>

                            <p class="price">$<?php echo $price; ?></p>
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

}
?> </div> <?php
get_footer();