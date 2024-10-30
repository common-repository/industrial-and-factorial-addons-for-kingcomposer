<?php

add_action('init', 'industrue_call_to_action_params', 99 );
 
function industrue_call_to_action_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_call_to_action' => array(
                'name' => 'Call to Action',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                'General' => array(
                
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'title_hlt',
                        'label' => __('Title Highlight', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('highlight text after the title', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'description',
                        'label' => __('Content', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('keep blank if you dont want', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                                  
                ),
                
                'Left Column' => array(
                
                    array(
                        'name' => 'icon1',
                        'type' => 'text',
                        'label' => __('Icon Name', 'kingcomposer'),
                        'description' => __('Insert icon name', 'kingcomposer'),
                        'value' => __('phone-call', 'kingcomposer')
                    ),                
                    array(
                        'name' => 'text1',
                        'label' => __('Text 1', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Call us on', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'text2',
                        'label' => __('Text 2', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('222-121-4562', 'kingcomposer'),
                    ),                    
                ),
                
                'Right Column' => array(
                
                    array(
                        'name' => 'icon2',
                        'type' => 'text',
                        'label' => __('Icon Name', 'kingcomposer'),
                        'description' => __('Insert icon name', 'kingcomposer'),
                        'value' => __('envelope', 'kingcomposer')
                    ),
                    array(
                        'name' => 'text3',
                        'label' => __('Text 1', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Email us', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'text4',
                        'label' => __('Text 2', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('support@gmail.com', 'kingcomposer'),
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


function industrue_call_to_action_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',
        'text1'  => '',
        'text2'  => '',
        'text3'  => '',
        'text4'  => '',
        'icon1'  => '',
        'icon2'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
   
    $output ='<section class="contact-info-style-one '.$extraclass.'">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h3>'.$title.' <span>'.$title_hlt.'</span></h3>
                        <p>'.$description.'</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-infos">
                        <div class="single-contact-infos">
                            <div class="icon-box">
                                <i class="industrio-icon-'.$icon1.'"></i>
                            </div>
                            <div class="text-box">
                                <h3>'.$text1.'</h3>
                                <p>'.$text2.'</p>
                            </div>
                        </div>
                        <div class="single-contact-infos">
                            <div class="icon-box">
                                <i class="industrio-icon-'.$icon2.'"></i>
                            </div>
                            <div class="text-box">
                                <h3>'.$text3.'</h3>
                                <p>'.$text4.'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';        



    return $output;
}


add_shortcode('industrue_call_to_action', 'industrue_call_to_action_shortcode');