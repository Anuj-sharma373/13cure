<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */
 /**
 * Custom function to display breadcrumbs.
 *
 * @param array $breadcrumb Breadcrumb array to display.
 */
function custom_display_breadcrumbs($breadcrumb) {
    $wrap_before = '<div class="breadcrumbs-wrap">';
    $wrap_after = '</div>';
    $before = '<span class="breadcrumb-item">';
    $after = '</span>';
    $delimiter = ' <span class="breadcrumb-delimiter">/</span> ';
    if (!empty($breadcrumb)) {
        echo $wrap_before;
        foreach ($breadcrumb as $key => $crumb) {
            echo $before;
            if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
                echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
            } else {
                echo esc_html($crumb[0]);
            }
            echo $after;
            if (sizeof($breadcrumb) !== $key + 1) {
                echo $delimiter;
            }
        }
        echo $wrap_after;
    }
}