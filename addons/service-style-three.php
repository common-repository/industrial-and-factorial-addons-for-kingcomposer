<?php

add_action('init', 'industrue_service_style_three_params', 99 );
 
function industrue_service_style_three_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_service_style_three' => array(
                'name' => 'Service Style Three',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                
                'params' => array(
                   
                'General' => array(
                    array(
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    array(
                        'name' => 'icon',
                        'type' => 'text',
                        'label' => __('Icon Name', 'kingcomposer'),
                        'description' => __('Insert icon name', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),               
                    array(
                        'name' => 'description',
                        'label' => __('Content', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('keep blank if you dont want', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'link',
                        'label' => 'Add Link',
                        'type' => 'link',                     
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


function industrue_service_style_three_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'image'  => '',
        'icon'  => '',
        'title'  => '',
        'description'  => '',
        'link'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $image = wp_get_attachment_image_src( $image, 'full' );
    $link    = kc_parse_link($link);

    $output ='';
    
    $link_html = '';
    if (!empty($link['url'])){
        $link_html = '<a href="'.$link['url'].'" class="more">'.$link['title'].' <i class="fa fa-arrow-right"></i></a>';
    }else{
        $link_html = '';
    }
   
    $output ='<div class="single-service-style-three '.$extraclass.'">
                        <div class="img-box">
                            <img src="'.$image[0].'" alt=""/>                            
                            <div class="text-box text-center">
                                <div class="inner hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="industrio-icon-'.$icon.'"></i>
                                    </div>
                                    <h3>'.$title.'</h3>
                                    <p>'.$description.'</p>
                                    '.$link_html.'
                                </div>
                            </div>
                        </div>
                    </div>';        



    return $output;
}


add_shortcode('industrue_service_style_three', 'industrue_service_style_three_shortcode');