<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="wrapper-for-product-summary">
		
	    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>
    <div class="summary entry-summary">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        do_action( 'woocommerce_single_product_summary' );
        ?>
<div class="recommended-product-here">
    <div class="dummy-cls">
        <h2 class="recommended-heading">
            LOREM IPSUM OFFER!
        </h2>
        <div class="main-wrapper">
            <?php
            // Query to get recommended product
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'recommended', // Slug of the recommended category
                    ),
                ),
            );

            $recommended_query = new WP_Query( $args );

            if ( $recommended_query->have_posts() ) :
                while ( $recommended_query->have_posts() ) :
                    $recommended_query->the_post();

                    // Get product data
                    $product = wc_get_product( get_the_ID() );
                    $image = wp_get_attachment_image_url( $product->get_image_id(), 'woocommerce_thumbnail' );
                    $title = get_the_title();
                    $short_description = $product->get_short_description(); // Use get_short_description() to get the short description with HTML
                    $price_html = $product->get_price_html();
                    ?>

                    <div class="product-image">
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                        </a>
                    </div>
                    <div class="product-title">
                        <h4><?php echo esc_html( $title ); ?></h4>
                    </div>
                    <div class="product-short-description">
                        <?php echo $short_description; ?> <!-- Output short description with HTML -->
                    </div>
                    <div class="product-price">
                        <p><?php echo $price_html; ?></p>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No recommended products found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

		<div class="after-product">
			<p>
				Ready to ship - estimate shipping date: 1 - 3 days 
			</p>
		</div>




		
<div class="woocommerce-single-product-description-wrapper">
    <div class="single-product-description">
        <h4 class="single-product-heading">Description</h4>
    </div>
    <div class="woocommerce-product-details__short-description">
        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
    </div>
</div>

		


        <?php if ( have_rows( 'single_product' ) ) : ?>
            <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>

                <?php if ( get_row_layout() == 'single_product_main' ) : ?>
                    <?php if ( have_rows( 'repeater' ) ) : ?>
                        <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                            <?php 
                            $image = get_sub_field( 'image' );
                            $text = get_sub_field( 'text' );
                            ?>
                            <div class="custom-section-product">
                                <div class="container">
                                    <div class="image-icon">
                                        <img src="<?php echo $image; ?>">
                                    </div>
                                    <div class="text-all">
                                        <a href="<?php echo $text['url']; ?>"><?php echo $text['title']; ?></a> 
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( get_row_layout() == 'single_product_main' ) : ?>
                    <?php 
                    $material_content = get_sub_field( 'material_content' );
                    $warranty_content = get_sub_field( 'warranty_content' );
                    $content_heading = get_sub_field( 'content_heading' );
                    $material_heading = get_sub_field( 'material_heading' );
                    ?>
                   <div class="accordion-section-product">
    <div class="container">
       <button class="accordion"><?php echo $content_heading; ?></button>
    <div class="accordion-content accordion-content-material panel">
                 <p><?php echo $material_content; ?></p>
            </div>
        <button class="accordion"><?php echo $material_heading; ?></button>
            <div class="accordion-content accordion-content-warranty panel">
                <p><?php echo $warranty_content; ?></p>
         </div>
    </div>
</div>


		

<!--    <section class="slider-section-single-product">
        <php echo do_shortcode( '[our_customer_shortcode]' );  ?>
</section> -->

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
<!-- 		<h2>
	</h2> -->
<?php if ( have_rows( 'single_product' ) ) : ?>
    <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'single_product_main' ) : ?>

            <?php
            // ACF fields retrieval
            $benifits_heading = get_sub_field("benifits_heading");
            $benifits_content = get_sub_field("benifits_content");

            $specification_heading = get_sub_field("specification_heading");
            $specification_content = get_sub_field("specification_content");

            $features_heading = get_sub_field("features_heading");
            $features_content = get_sub_field("features_content");

            $package_heading = get_sub_field("package_heading");
            $package_content = get_sub_field("package_content");

            $faq_heading = get_sub_field("faq_heading");
            $faq_content = get_sub_field("faq_content");

            $order_heading = get_sub_field("order_heading");
            $order_content = get_sub_field("order_content");
            ?>

            <div class="container tab-section">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-benefits-tab" data-toggle="tab" href="#tab-benefits" role="tab" aria-controls="tab-benefits" aria-selected="true"><?php echo esc_html($benifits_heading); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-specification-tab" data-toggle="tab" href="#tab-specification" role="tab" aria-controls="tab-specification" aria-selected="false"><?php echo esc_html($specification_heading); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-features-tab" data-toggle="tab" href="#tab-features" role="tab" aria-controls="tab-features" aria-selected="false"><?php echo esc_html($features_heading); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-package-tab" data-toggle="tab" href="#tab-package" role="tab" aria-controls="tab-package" aria-selected="false"><?php echo esc_html($package_heading); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-faq-tab" data-toggle="tab" href="#tab-faq" role="tab" aria-controls="tab-faq" aria-selected="false"><?php echo esc_html($faq_heading); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-order-tab" data-toggle="tab" href="#tab-order" role="tab" aria-controls="tab-order" aria-selected="false"><?php echo esc_html($order_heading); ?></a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-benefits" role="tabpanel" aria-labelledby="tab-benefits-tab">
                        <div class="benefits">
                            <div class="benefits-content">
                                <p><?php echo $benifits_content; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-specification" role="tabpanel" aria-labelledby="tab-specification-tab">
                        <div class="specification">
                            <div class="specification-content">
                                <p><?php echo $specification_content; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-features" role="tabpanel" aria-labelledby="tab-features-tab">
                        <div class="features">
                            <div class="features-content">
                                <p><?php echo $features_content; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-package" role="tabpanel" aria-labelledby="tab-package-tab">
                        <div class="package">
                            <div class="package-content">
                                <p><?php echo $package_content; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-faq" role="tabpanel" aria-labelledby="tab-faq-tab">
                        <div class="faq">
                            <div class="faq-content">
                                <p><?php echo $faq_content; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-order" role="tabpanel" aria-labelledby="tab-order-tab">
                        <div class="order">
                            <div class="order-content">
                                <p><?php echo $order_content; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

	</div>
		<!-- BANNER SECTION PRODUCT PAGE -->

<?php if ( have_rows( 'single_product' ) ) : ?>
    <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'product_second_section' ) : ?>
            <?php
            $heading = get_sub_field('heading');
            $button = get_sub_field('button');
            $image = get_sub_field('image');
            ?>
            <section class="commanCardBlock productBlock">
                <div class="customeContainer ml-auto">
                    <div class="row align-items-center m-0">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="textBlock">
                                <h2><?php echo $heading; ?></h2>
                                
                                <?php if ( have_rows( 'repeater' ) ) : ?>
                                    <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                        <?php $content = get_sub_field('content'); ?>
                                        <p class="mb-5"><?php echo $content; ?></p>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo esc_html( $button['title'] ); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 pr-0">
                            <div class="aboutUsImage">
                                <img src="<?php echo esc_url( $image ); ?>" alt="" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        <?php endif; ?>
    
    <?php endwhile; ?>
<?php endif; ?>
	
		<!--  THIRD PRODUCT PAGE -->

        <?php if ( have_rows( 'single_product' ) ) : ?>
    <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'product_third_section' ) : ?>
            <?php
            $heading = get_sub_field('heading');
            $button = get_sub_field('button');
            $image = get_sub_field('image');
            $content = get_sub_field('content');
            ?>
    <section class="commanCardBlock prodcutBlockSecond">
        <div class="customeContainer ml-0 mr-auto mb-0 mt-0 ">
            <div class="row align-items-center m-0 row-reverse flex-row-reverse">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="textBlock ml-auto">
                        <h2><?php echo $heading; ?></h2>
                        <p class="mb-5"> <?php echo $content; ?>
                        </p>

                        <a type="button" href="<?php echo $button['url']; ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo $button['title']; ?></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 pl-0">
                    <div class="aboutUsImage">
                        <img src="<?php echo $image; ?>" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
        
        <?php endif; ?>
    
    <?php endwhile; ?>
<?php endif; ?>

	
	
	<?php if ( have_rows( 'single_product' ) ) : ?>
    <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'choose_section' ) : ?>
            <?php
            $heading = get_sub_field('heading');
            ?>

            <section class="whyChooseBlock">
                <div class="container">
                    <div class="chooseUsInner">
                        <div class="welComeInner text-center">
                            <h2><?php echo esc_html( $heading ); ?></h2>
                        </div>
                    </div>

                    <?php if ( have_rows( 'repeater' ) ) : ?>
                        <div class="row">
                            <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                <?php 
                                $image = get_sub_field('image');
                                $subheading = get_sub_field('subheading');
                                $content = get_sub_field('content');
                                ?>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="ourFacilatyCard">
                                        <div class="imageIcon">
                                            <img src="<?php echo esc_url( $image ); ?>" alt="" class="w-100">
                                            <!-- Use $subheading instead of $heading here -->
                                            <h4><?php echo esc_html( $subheading ); ?></h4>
                                        </div>
                                        <div class="textArea text-center">
                                            <p><?php echo esc_html( $content ); ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </section>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>
	
	
	
<?php if ( have_rows( 'single_product' ) ) : ?>
    <?php while ( have_rows( 'single_product' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'faq' ) : ?>
            <?php
            $heading = get_sub_field('heading');
            $image = get_sub_field('image');
            ?>

            <section class="commanCardBlock servicesAccording productFaq">
                <div class="customeContainer mr-auto">
                    <div class="row m-0">
                        <div class="col-xl-6 col-lg-6 col-md-6 pl-0">
                            <div class="aboutUsImage">
                                <img src="<?php echo esc_url( $image ); ?>" alt="" class="w-100 h-100">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="textBlock ml-auto">
                                <h2><?php echo esc_html( $heading ); ?></h2>
                                <div class="accordingBlock">
                                    <div id="accordion">
                                        <?php if ( have_rows( 'repeater' ) ) : ?>
                                            <?php $index = 1; ?>
                                            <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                                <?php
                                                $sub_heading = get_sub_field('sub_heading');
                                                $content = get_sub_field('content');
                                                ?>
                                                <div class="card">
                                                    <div class="card-header" id="heading<?php echo $index; ?>">
                                                    <h5 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="<?php echo ($index === 1) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $index; ?>">
                                                            <button class="btn btn-link" type="button" >
                                                                <?php echo esc_html( $sub_heading ); ?>
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapse<?php echo $index; ?>" class="collapse <?php echo ($index === 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <?php echo $content; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $index++; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>




	
    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );
    ?>


</div><!-- #product-<?php the_ID(); ?> -->

<?php
/**
 * Hook: woocommerce_after_single_product.
 */
do_action( 'woocommerce_after_single_product' );