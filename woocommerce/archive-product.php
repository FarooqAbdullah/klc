<?php
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

<!--		--><?php // do_action( 'woocommerce_archive_description' );
    var_dump("working here <br />");
/*$catObject = get_term_by('slug', get_query_var('term'), 'product_cat');
$catParentObject = get_term_by('id', $catObject->parent, 'product_cat');

var_dump($catParentObject);
var_dump("<br /><br /><br /><br />");
var_dump($catObject);*/
$args = array(
    'orderby'    => 'slug',
    'hide_empty' => false
);

$product_categories = get_terms( 'product_cat', $args );
foreach($product_categories as $product_category){
//    var_dump($product_category); break;

}
?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**

				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */

//				do_action( 'woocommerce_before_shop_loop' );

    /*if ($terms) {
        foreach ($terms as $term) {
            $cat_obj = get_term($term->term_id, 'product_cat');
            $cat_name = $cat_obj->name;
            $cat_des = $cat_obj->description;

        }
    }*/
			?>
    <div class="body_wrapper shop-archive">
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
                    <li><a href="#">Tops</a></li>
                    <li><a href="#">Casual Shirts</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dress Shirts</a>
                        <div class="dropdown-menu">
                            <div class="arrow-up"></div>
                            <ul>
                                <li><a href="#dailyGrind" data-id="dailyGrind">Daily Grind</a></li>
                                <li><a href="#summerWeightAmericano" data-id="summerWeightAmericano">Summer Weight Americano</a></li>
                                <li><a href="#americano" data-id="americano">Americano</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">Tall Shirts</a></li>
                    <li><a href="#">Polos & Tees</a></li>
                    <li><a href="#">FLEECE & HENLEYS</a></li>
                    <li><a href="#">SWEATERS</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="slider_wrapper">
        <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product.jpg"  alt="Slider Image"/>
		<div class="title"><?php echo  do_action('page_title'); ?></h2></div>
    </div>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php $num = 1;  while ( have_posts() ) : the_post(); ?>
                    <?php    echo $num;
        $num++;
        ?>

<!--					--><?php //wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
/*				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */

//				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php /*elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : */?>

			<?php /*wc_get_template( 'loop/no-products-found.php' ); */?>

		<?php endif; ?>

	<?php
/*		/**

		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */

		/* do_action( 'woocommerce_after_main_content' );
	*/?>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="main-head">Dress Shirts</h1>
            </div>
        </div>
        <div class="row section" id="dailyGrind">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2>Daily Grind</h2>
                            <p>
                                If you're ready to take the pain out of your morning routine, you're ready for the Daily Grind. Thanks to its soft, wrinkle-free cotton fabric, you'll spend less time ironing and more time enjoying your cup of joe.
                            </p>
                            <p>
                                Available in 3 fits and 3 collars
                            </p>
                        </div>
                        <div class="row">
                            <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/DailyGrind.jpg"  alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even s-product main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section" id="summerWeightAmericano">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2>Summer Weight Americano</h2>
                            <!--<p>
                                If you're ready to take the pain out of your morning routine, you're ready for the Daily Grind. Thanks to its soft, wrinkle-free cotton fabric, you'll spend less time ironing and more time enjoying your cup of joe.
                            </p>
                            <p>
                                Available in 3 fits and 3 collars
                            </p>-->
                        </div>
                        <div class="row">
                            <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/LightweightAmericanoShirt.jpg"  alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section" id="americano">
            <div class="section col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 big-image  padding_left_right_0">
                    <div>
                        <div class="row head-content-wrapper">
                            <h2>Americano</h2>
                            <p>
                                If you're ready to take the pain out of your morning routine, you're ready for the Daily Grind. Thanks to its soft, wrinkle-free cotton fabric, you'll spend less time ironing and more time enjoying your cup of joe.
                            </p>
                            <p>
                                Available in 3 fits and 3 collars
                            </p>
                        </div>
                        <div class="row">
                            <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/AmericanoShirts-Offer.jpg"  alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                    <div class="row short-product">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row even main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 product-hover">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                </a>
                                <div class="product-hover-detail row odd main-item-hover-wrapper">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row h-img-wrapper">
                                                <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                                </a>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                                <p class="color">Navy And White</p>
                                                <p class="name">Daily Grind No Pocket</p>
                                                <p class="price">$98</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                            <h2>Quick Shop</h2>
                                            <p>Use your Saved Custom preferences for quick reordereing</p>
                                            <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="saved-preferences">
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
                                                </label>
                                            </div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary">ADD TO CART</button>
                                            </div>
                                            <div>OR</div>
                                            <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-default customize">Customize</button>
                                            </div>
                                            <div>+ add to favorites/see details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                <p class="color">Navy And White</p>
                                <p class="name">Daily Grind No Pocket</p>
                                <p class="price">$98</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row even main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/shirt.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 product-hover">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                            </a>
                            <div class="product-hover-detail row odd main-item-hover-wrapper">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="padding-left_0 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="row h-img-wrapper">
                                            <a href="<?php echo site_url(); ?>/?product=daily-grind-no-pocket-4">
                                                <img src="<?php echo site_url(); ?>/wp-content/themes/klnyc/images/product-2.jpg"  alt=""/>
                                            </a>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                                            <p class="color">Navy And White</p>
                                            <p class="name">Daily Grind No Pocket</p>
                                            <p class="price">$98</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quick-shop-wrapper">
                                        <h2>Quick Shop</h2>
                                        <p>Use your Saved Custom preferences for quick reordereing</p>
                                        <div class=" row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="saved-preferences">
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
                                            </label>
                                        </div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">ADD TO CART</button>
                                        </div>
                                        <div>OR</div>
                                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-default customize">Customize</button>
                                        </div>
                                        <div>+ add to favorites/see details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-detail">
                            <p class="color">Navy And White</p>
                            <p class="name">Daily Grind No Pocket</p>
                            <p class="price">$98</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
<?php get_footer();