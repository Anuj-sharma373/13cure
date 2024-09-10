<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $related_products ) : ?>

<section class="OthersalsoBoughtBlock">
    <div class="container">
        <div class="headingBlock text-left">
            <?php
            $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Others also bought', 'woocommerce' ) );

            if ( $heading ) :
                ?>
                <h5><?php echo esc_html( $heading ); ?></h5>
            <?php endif; ?>
        </div>

        <div class="productCards ml-auto">
            <div class="row">
                <?php foreach ( $related_products as $related_product ) : ?>
                    <?php
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    // Get the product thumbnail ID
                    $thumbnail_id = get_post_thumbnail_id( $post_object->ID );
                    // Get the product price
                    $product = wc_get_product( $post_object->ID );
                    ?>

                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="productImageCards d-flex align-items-center">
                            <div class="imageBlock_">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php
                                    if ( $thumbnail_id ) {
                                        echo wp_get_attachment_image( $thumbnail_id, 'woocommerce_thumbnail', false, array( 'class' => 'w-100' ) );
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="productdetails_">
                                <p><?php the_title(); ?></p>
                                <div class="productPriceView d-flex justify-content-between">
                                    <p><?php echo $product->get_price_html(); ?></p>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary"><?php _e( 'View', 'woocommerce' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    wp_reset_postdata();
                    ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
<h2>
	
</h2>