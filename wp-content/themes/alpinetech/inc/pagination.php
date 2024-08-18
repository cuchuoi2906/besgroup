<?php
function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        echo paginate_links(array(
            'format' => '?paged=%#%',
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => "<i class='fa fa-arrow-left'></i>",
            'next_text' => "<i class='fa fa-arrow-right'></i>"
        ));
    }
}


//Trong category set mọi post_type về product để load được product. Mặc định là load post
function wpa_custom_post_types_category( $query ) {
    if ( $query->is_category() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_custom_post_types_category' );
?>