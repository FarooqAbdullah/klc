<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product, $post;
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo $post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
        <?php if ( ! empty( $available_variations ) ) : ?>

            <div class="product-preferences">
                <!-- <label for="saved-preferences">
                     <span class="custom-checkbox-wrapper btn btn-primary">
                         <input type="checkbox" name="saved-preferences" id="saved-preferences">
                         Saved Preferences
                     </span>
                 </label>&nbsp; &nbsp;
                 <label for="klnyc">
                     <span class="custom-checkbox-wrapper btn btn-primary">
                         <input type="checkbox" name="klnyc" id="klnyc">
                         KLNYC
                     </span>
                 </label> -->
                <label>
                    Use Your <span>saved Preferences</span> or <span>KLNYC Preferences</span>.
                    <select class="form-control select-preferences">
                        <option value="choose">Choose your custom preferences</option>
                        <option value="saved-preferences">Saved Preferences</option>
                        <option value="klnyc">KLNYC</option>
                    </select>
                </label>
            </div>

            <table class="variations" cellspacing="0" style="display:none !important;">
                <tbody>
                <?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>
                    <tr>
                        <td class="label"><label for="<?php echo sanitize_title( $name ); ?>"><?php echo wc_attribute_label( $name ); ?></label></td>
                        <td class="value"><select id="<?php echo esc_attr( sanitize_title( $name ) ); ?>" name="attribute_<?php echo sanitize_title( $name ); ?>" data-attribute_name="attribute_<?php echo sanitize_title( $name ); ?>">
                                <option value=""><?php echo __( 'Choose an option', 'mk_framework' ) ?>&hellip;</option>
                                <?php
                                if ( is_array( $options ) ) {

                                    if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) {
                                        $selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $name ) ];
                                    } elseif ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) {
                                        $selected_value = $selected_attributes[ sanitize_title( $name ) ];
                                    } else {
                                        $selected_value = '';
                                    }

                                    // Get terms if this is a taxonomy - ordered
                                    if ( taxonomy_exists( $name ) ) {

                                        $terms = wc_get_product_terms( $post->ID, $name, array( 'fields' => 'all' ) );

                                        foreach ( $terms as $term ) {
                                            if ( ! in_array( $term->slug, $options ) ) {
                                                continue;
                                            }
                                            echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
                                        }

                                    } else {

                                        foreach ( $options as $option ) {
                                            echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                                        }

                                    }
                                }
                                ?>
                            </select> <?php
                            if ( sizeof( $attributes ) === $loop ) {
                                echo '<a class="reset_variations" href="#reset">' . __( 'Clear selection', 'mk_framework' ) . '</a>';
                            }
                            ?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

            <div class="single_variation_wrap1" style="display:block;">
                <?php do_action( 'woocommerce_before_single_variation' ); ?>

                <div class="single_variation"></div>

                <div class="variations_button">
                    <div class="qty-add-to-cart-wrapper">
                        <div class="qty-button-wrapper">
                            <button type="button" class="btn btn-primary">QTY</button>
                        </div>
                        <?php woocommerce_quantity_input(); ?>
                        <button type="submit" class="add_to_cart_s single_add_to_cart_button shop-skin-btn shop-flat-btn alt"><?php echo $product->single_add_to_cart_text(); ?></button>
                    </div>
                    <button type=" " class="single_add_to_cart_button shop-skin-btn shop-flat-btn alt">Add to Wishlist</button>
                    <!-- <div class="text-or"> OR </div> -->
                    <button type=" " class="single_add_to_cart_button shop-skin-btn shop-flat-btn alt" id="custom-option-measurement-button" data-toggle="modal" data-target="#custom-option-measurement">Customize</button>
                </div>

                <input type="hidden" name="add-to-cart" value="<?php echo $product->id; ?>" />
                <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
                <input type="hidden" name="variation_id" class="variation_id" value="" />

                <?php do_action( 'woocommerce_after_single_variation' ); ?>
            </div>

            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

        <?php else : ?>

            <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'mk_framework' ); ?></p>

        <?php endif; ?>

    </form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
