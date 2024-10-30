<?php

add_action('init', 'industrue_award_winning_params', 99 );
 
function industrue_award_winning_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_award_winning' => array(
                'name' => 'Award Winning',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
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
                array(
                    'name' => 'image_left',
                    'label' => 'Image One',
                    'type' => 'attach_image',
                    "description" => __("Select image from media library.", "kingcomposer")
                ),
                array(
                    'name' => 'image_right',
                    'label' => 'Image Two',
                    'type' => 'attach_image',
                    "description" => __("Select image from media library.", "kingcomposer")
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


function industrue_award_winning_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',
        'image_left'  => '',
        'image_right'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $image_left = wp_get_attachment_image_src( $image_left, 'full' );
    $image_right = wp_get_attachment_image_src( $image_right, 'full' );

    $output ='';
   
    $output ='<section class="award-winning '.$extraclass.'">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title">
                        <h3>'.$title.' <span>'.$title_hlt.'</span></h3>
                        <p>'.$description.'</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img-box clearfix">
                        <img src="'.$image_left[0].'" alt="" class="pull-left" />
                        <img src="'.$image_right[0].'" alt="" class="pull-right" />
                    </div>
                </div>
            </div>
        </div>
    </section>';        



    return $output;
}


add_shortcode('industrue_award_winning', 'industrue_award_winning_shortcode');