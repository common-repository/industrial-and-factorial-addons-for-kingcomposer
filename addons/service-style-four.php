<?php

add_action('init', 'industrue_service_style_four_params', 99 );
 
function industrue_service_style_four_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_service_style_four' => array(
                'name' => 'Service Style Four',
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
                        'name' => 'text1',
                        'label' => __('Text 1', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'text2',
                        'label' => __('Text 2', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),                                   
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Add Button', 'kingcomposer' ),
                        'name'			=> 'add_btn',
                        'description'	=> __( '', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ), 
                    array(
                        'name' => 'btn_text',
                        'label' => __('Button Text', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    array(
                        'name' => 'btn_url',
                        'label' => __('Button URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
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
                        'name' => 'text1_color',
                        'label' => __('Text 1 Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'text2_color',
                        'label' => __('Text 2 Color', 'kingcomposer'),
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


function industrue_service_style_four_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'image'  => '',
        'icon'  => '',
        'text1'  => '',
        'text2'  => '',
        'add_btn'  => '',
        'btn_text'  => '',
        'btn_url'  => '',
        'icon_color'  => '',
        'text1_color'  => '',
        'text2_color'  => '',
        'extraclass'    => '',
        
    ), $atts) );

    $image = wp_get_attachment_image_src( $image, 'full' );

    $output ='';
    
    $link_html = '';
    if (!empty($btn_url) && !empty($btn_text)){
        $link_html = '<a href="'.$btn_url.'" class="more hvr-sweep-to-right">'.$btn_text.'</a>';
    }else{
        $link_html = '';
    }
    

    $text1 = !empty($text1) ? $text1 : '';
    $text2 = !empty($text2) ? $text2 : '';
   
    $output ='<div class="service-style-four '.$extraclass.'">
                <div class="single-service-style-four">
                    <div class="img-box">
                        <img src="'.$image[0].'" alt=""/>
                        <div class="box">
                            <div class="content">
                                <i style="color: '.$icon_color.'" class="industrio-icon-'.$icon.'"></i>
                                <h3 style="color: '.$text2_color.'"><span style="color: '.$text1_color.'">'.$text1.'</span> <br /> '.$text2.'</h3>
                                '.$link_html.'
                            </div>
                        </div>
                    </div>
                </div>
            </div>';        



    return $output;
}
add_shortcode('industrue_service_style_four', 'industrue_service_style_four_shortcode');