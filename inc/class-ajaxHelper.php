<?php

class AjaxHelper
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_get_product', array($this, 'delis_get_products'));
        add_action('wp_ajax_get_product', array($this, 'delis_get_products'));
    }

    function delis_get_products()
    {
        $args = wp_parse_args($_POST, array(
            'parent' => 0
        ));
        //$selectedProduct = get_post($args['parent']);
        $html = '';
        if (have_rows('flavor_items',$args['parent'])):
            while (have_rows('flavor_items',$args['parent'])) : the_row();
                if (get_row_layout() == 'product_flavor'):
                    //var_dump(get_sub_field('shape_1'));
                    $html .= '<div class="swiper-slide"><img src="' . get_sub_field('image')['url'] . '"
                                         class="img-fluid mx-auto d-block" alt="' . get_sub_field('name') . '">
                                         <div class="taste-shapes ' . get_sub_field('flavor')->slug . '">
                                         <img class="float-shape" src="' . get_sub_field('shape_1') . '" />
                                         <img class="float-shape" src="' . get_sub_field('shape_2'). '" />
                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/shape.png" />
                                         </div>
                                         </div>';
                endif;
            endwhile;
        endif;

//        foreach ($products as $product) {
//            $terms = get_the_terms( $product->ID, 'product-flavor' );
//            $terms = join(', ', wp_list_pluck( $terms , 'slug') );
//            $html.='<div class="swiper-slide"><img src="' . get_the_post_thumbnail_url($product->ID) . '"
//                                         class="img-fluid mx-auto d-block" alt="' . get_the_title($product->post_title) . '">
//                                         <div class="taste-shapes '.$terms.'">
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/banana/banana-double.png" />
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/banana/banana.png" />
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/shape.png" />
//</div>
//                                         </div>';
//        }
        wp_send_json_success($html);
    }
}