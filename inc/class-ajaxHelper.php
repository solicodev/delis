<?php
class AjaxHelper{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_get_product', array($this, 'delis_get_products'));
        add_action('wp_ajax_get_product', array($this, 'delis_get_products'));
    }
    function delis_get_products()
    {
        $args=wp_parse_args($_POST,array(
           'parent'=>0
        ));
        $products = get_posts(
            array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-category',
                        'field' => 'term_id',
                        'terms' => intval($args['parent']),
                    )
                )
            )
        );
        $html='';
        foreach ($products as $product) {
            $html.='<div class="swiper-slide"><img src="'.get_the_post_thumbnail_url($product->ID).'"
                                         class="img-fluid mx-auto d-block" alt="'.get_the_title($product->post_title).'"></div>';
        }
        wp_send_json_success($html);
    }
}