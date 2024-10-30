<?php

add_action('init', 'industrue_about_style_two_params', 99 );
 
function industrue_about_style_two_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_about_style_two' => array(
                'name' => 'About Style 2',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                'left column' => array(
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Welcome to', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'title_hlt',
                        'label' => __('Title Highlight', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('highlight text after the title', 'kingcomposer'),
                        'value' => __('Industrue Company', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'description',
                        'label' => __('Content', 'kingcomposer'),
                        'type' => 'editor',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
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
                
                'right column' => array(

                    array(
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    array(
                        'name' => 'video_url',                    
                        'type' => 'text',
                        'label' => __('Youtube Video Url', 'kingcomposer'),
                        'description' => __('ex: http://www.youtube.com/watch?v=ZRkdyjJ_MdM', 'kingcomposer')
                    ),                                        

                ),
                                
                'Extra Class' => array(

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


function industrue_about_style_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',
        'add_btn'  => '',
        'btn_text'  => '',
        'btn_url'  => '',
        'image'  => '',
        'video_url'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    $image = wp_get_attachment_image_src( $image, 'full' );


    $output ='';
    
    $btn_html = !empty($btn_text) ? '<a href="'.$btn_url.'" class="view-more hvr-sweep-to-right">'.$btn_text.'</a>' : '';              
    $video_html = !empty($video_url) ? '<a href="'.$video_url.'" class="video-popup"><i class="industrio-icon-play-button"></i></a>' : '';             
       
        
    $output ='<section class="about-style-two pt0 '.$extraclass.'">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-content">
                        <h3>'.$title.' <span>'.$title_hlt.'</span></h3>
                        <p>'.$description.'</p>
                        '.$btn_html.'
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="video-box">
                        <img src="'.$image[0].'" alt=""/>
                        '.$video_html.'
                    </div>
                </div>
            </div>
        </div>
    </section>';



        return $output;
}


add_shortcode('industrue_about_style_two', 'industrue_about_style_two_shortcode');