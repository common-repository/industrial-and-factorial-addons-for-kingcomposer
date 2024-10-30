<?php

add_action('init', 'industrue_services_params', 99 );
 
function industrue_services_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_services' => array(
                'name' => 'Services',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                
                'params' => array(
                   
                'General' => array(
                    array(
                        'type'            => 'number_slider',
                        'label'            => __( 'Number of posts displayed', 'kingcomposer' ),
                        'name'            => 'post_per_page',
                        'description'    => __( 'The number of posts you want to show.', 'kingcomposer' ),
                        'value'            => '6',
                        'admin_label'    => true,
                        'options' => array(
                            'min' => 1,
                            'max' => 12
                        )
                    ),
                    array(
                        'type'            => 'post_taxonomy',
                        'label'            => __( 'Service Category', 'kingcomposer' ),
                        'name'            => 'post_taxonomy',
                        'value'            => 'industrue-service',
                        'description'    => __( '', 'kingcomposer' ),
                        'admin_label'    => true
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Order by', 'kingcomposer' ),
                        'name'            => 'order_by',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'ID'        => __(' Post ID', 'kingcomposer'),
                            'author'    => __(' Author', 'kingcomposer'),
                            'title'        => __(' Title', 'kingcomposer'),
                            'name'        => __(' Post name (post slug)', 'kingcomposer'),
                            'type'        => __(' Post type (available since Version 4.0)', 'kingcomposer'),
                            'date'        => __(' Date', 'kingcomposer'),
                            'modified'    => __(' Last modified date', 'kingcomposer'),
                            'rand'        => __(' Random order', 'kingcomposer'),
                            'comment_count'    => __(' Number of comments', 'kingcomposer')
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Order post', 'kingcomposer' ),
                        'name'            => 'order_list',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'DESC'        => __(' DESC', 'kingcomposer'),
                            'ASC'        => __(' ASC', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'text',
                        'label'            => __( 'Read more text', 'kingcomposer' ),
                        'name'            => 'readmore_text',
                        'description'    => __( 'Edit the text that appears on the "Read more" button.', 'kingcomposer' ),
                        'value'            => 'Read more'
                    ),                   
                                        
                ),                
                
                'Styling' => array(
                    array(
                        'name' => 'icon_color',
                        'label' => __('Icon Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'text_color',
                        'label' => __('Title Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                ),
                
                                                                    
                'Extraa Class' => array(
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),
                ),
                                                                            
                 
                      
                                      
                    
                )
            )
        )
    );
} 


function industrue_services_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'post_per_page'  => '',
        'post_taxonomy'  => '',
        'order_by'  => '',
        'order_list'  => '',
        'thumbnail'  => '',
        'readmore_text'  => '',
        'icon_color'  => '',
        'text_color'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    global $post;
    $post_taxonomy_data = explode( ',', $post_taxonomy );
    $taxonomy_term = array();
    $taxonomy = '';
    $post_type = 'industrue-service';
    
    if( isset($post_taxonomy_data) ){
        $post_taxonomy_tmp = explode( ':', $post_taxonomy_data[0] );
        if( count($post_taxonomy_tmp) > 1 || !isset($post_taxonomy_tmp[1]))
            $post_type = $post_taxonomy_tmp[0];
            
            
            foreach( $post_taxonomy_data as $post_taxonomy ){
                $post_taxonomy_tmp = explode( ':', $post_taxonomy );

                if( isset($post_taxonomy_tmp[1]) ){
                    $taxonomy_term[] = $post_taxonomy_tmp[1];
                }
            }          
    
        $taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
        $taxonomy = key( $taxonomy_objects );        
        
        
    }
        
    $post_per_page = isset($post_per_page) ? $post_per_page : -1;
    
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $post_per_page,
        'order'             => $order_list,
    );
    
    if( count($taxonomy_term) )
    {
        $tax_query = array(
            'relation' => 'OR'
        );

        foreach( $taxonomy_term as $term ){
            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term,
            );
        }

        $args['tax_query'] = $tax_query;
    }
    
    
    
    $output ='';
    
    
    $output .= '<div class="service-item-box '.$extraclass.'">
                    <div class="row">';    
    
    $industrue_services_query = new WP_Query( $args );        
    if ( $industrue_services_query->have_posts() ): while ($industrue_services_query->have_posts()) : $industrue_services_query->the_post();
    $post_id = get_the_ID();
    if ( has_post_thumbnail() ) {
        $service_image = '';
        $service_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
        $service_image = '<img src="'.$service_image_url.'" alt=""/>';
    }else{
        $service_image = '<h3>no image found</h3>';
    }
    
    $icon_name = get_post_meta( $post_id, 'service_icon_name', true );
    $icon_html = '';
    if (!empty($icon_name)) {
        $icon_html = '<i style="color:'.$icon_color.'" class="industrio-icon-'.$icon_name.'"></i>';
    }else{
        $icon_html = '';
    }
   
    $output .='<div class="col-md-4 col-sm-6 col-sm-12 mb30">
                    <div class="single-service-style-four">
                        <div class="img-box">
                            '.$service_image.'
                            <div class="box">
                                <div class="content">
                                    '.$icon_html.'
                                    <h3 style="color:'.$text_color.'">'.get_the_title().'</h3>
                                    <a href="'.get_the_permalink().'" class="more hvr-sweep-to-right">'.$readmore_text.'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>'; 
    
    endwhile;
    endif; 
    wp_reset_query();
        
    $output .= '</div></div>';  



    return $output;
}
add_shortcode('industrue_services', 'industrue_services_shortcode');