<?php
/**
 * Function to locate and include template parts based on flexible content layout.
 * 
 * @param string $field_name The name of the flexible content field.
 * @param string $page_name The name of the page (used for debugging).
 */
function include_template_parts($field_name, $page_name) {
    if( have_rows($field_name) ) {
        while ( have_rows($field_name) ) : the_row();
            $layout = get_row_layout();
            
            // Remove .php extension if it exists
            $layout = str_replace('.php', '', $layout);

            if(!empty($layout)) {
                if( locate_template('module/' . $layout . '.php', false, false) != '' ) {
                    get_template_part('module/' . $layout);
                } else {
                    echo 'Template not found: module/' . $layout . '.php' . '<br>'; // Debugging statement
                }
            }
        endwhile;
	}
//     } else {
//         echo 'No rows found for ' . $page_name . '.'; // Debugging statement
//     }
}

// Include template parts for home_page and about_us_page and our services page
include_template_parts('home_page', 'home_page');

include_template_parts('our_services_page', 'our_services_page'); 
include_template_parts('testimonials_main', 'testimonials_main');
include_template_parts('inner_pages', 'inner_pages');
