<?php

add_action('init', 'industrue_heading_two_params', 99 );
 
function industrue_heading_two_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_heading_two' => array(
                'name' => 'Heading Two',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                array(
                    'name' => 'title_hlt',
                    'label' => __('Title Highlight', 'kingcomposer'),
                    'type' => 'text',
                    'description' => __('highlight text after the title', 'kingcomposer'),
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


function industrue_heading_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
    
    $title = !empty($title) ? $title : '';   
    $title_hlt = !empty($title_hlt) ? $title_hlt : '';   
    $description = !empty($description) ? $description : '';   
        
    $output ='<div class="sec-title text-center '.$extraclass.'">
                <h3><span>'.$title_hlt.'</span> '.$title.'</h3>
                <p>'.$description.'</p>
            </div>';



        return $output;
}


add_shortcode('industrue_heading_two', 'industrue_heading_two_shortcode');