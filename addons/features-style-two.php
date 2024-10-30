<?php

add_action('init', 'industrue_feature_style_two_params', 99 );
 
function industrue_feature_style_two_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_feature_style_two' => array(
                'name' => 'Feature Style Two',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
                    
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
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                                                  
                 
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),                      
                                      
                    
                )
            )
        )
    );
} 


function industrue_feature_style_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'icon'  => '',
        'title'  => '',
        'description'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
       

    $output .= '<div class="single-features-style-two hvr-bounce-to-bottom '.$extraclass.'">
                <div class="inner">
                    <i class="industrio-icon-'.$icon.'"></i>
                    <h3>'.$title.'</h3>
                    <p>'.$description.'</p>
                </div>
            </div>';  

    
    
    return $output;
}


add_shortcode('industrue_feature_style_two', 'industrue_feature_style_two_shortcode');