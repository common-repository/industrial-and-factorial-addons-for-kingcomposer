<?php

add_action('init', 'industrue_feature_style_one_params', 99 );
 
function industrue_feature_style_one_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_feature_style_one' => array(
                'name' => 'Feature Style One',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
                
                array(
                    'type'            => 'group',
                    'label'            => __('Feature Items', 'KingComposer'),
                    'name'            => 'one_features',
                    'description'    => __( 'Repeat this fields', 'KingComposer' ),
                    'options'     => array( 'add_text' => __( 'Add more feature', 'kingcomposer' ) ),                
                    
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
                            "type"        => "color_picker",
                            "label"     => __( "Background Color", "kingcomposer" ),
                            "name"  => "bg_color",
                            "value"       => "",
                            "description" => __( "Choose feature bg color", "kingcomposer" ),
                        ),                    
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Text Color", "kingcomposer" ),
                            "name"  => "text_color",
                            "value"       => "",
                            "description" => __( "Choose title, content and icon color", "kingcomposer" ),
                        ),
                    ),
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


function industrue_feature_style_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'one_features'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
       
        
    $output ='<section class="feature-style-one '.$extraclass.'">
                <div class="container">
                    <div class="clearfix">';


    $one_features = $atts['one_features'];
    if( isset( $one_features ) ){
        foreach( $one_features as $one_feature ){

            $output .= '<div class="col-md-4">
                    <div class="single-feature-style-one style="background-color:'.$one_feature->bg_color.' ">
                        <div class="icon-box">
                            <i style="color:'.$one_feature->text_color.'" class="industrio-icon-'.$one_feature->icon.'"></i>
                        </div>
                        <div class="text-box">
                            <h3 style="color:'.$one_feature->text_color.'">'.$one_feature->title.'</h3>
                            <p style="color:'.$one_feature->text_color.'">'.$one_feature->description.'</p>
                        </div>
                    </div>
                </div>';  
            
            
        }
    }




    $output .='</div></div></section>';
    
    
    return $output;
}


add_shortcode('industrue_feature_style_one', 'industrue_feature_style_one_shortcode');