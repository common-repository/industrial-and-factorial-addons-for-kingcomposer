<?php

add_action('init', 'industrue_about_style_one_params', 99 );
 
function industrue_about_style_one_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_about_style_one' => array(
                'name' => 'About Style One',
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
                        'label' => __('Description', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature1',
                        'label' => __('Feature 1', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Our Work Growth', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature2',
                        'label' => __('Feature 2', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('1500 Employed', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature3',
                        'label' => __('Feature 3', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Our Employee Growth', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature4',
                        'label' => __('Feature 4', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Service Management', 'kingcomposer'),
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
                        'name' => 'big_image',
                        'label' => 'Big Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    array(
                        'name' => 'small_image',
                        'label' => 'Small Image',
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
                                
                'extra class' => array(

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


function industrue_about_style_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',
        'feature1'  => '',
        'feature2'  => '',
        'feature3'  => '',
        'feature4'  => '',
        'add_btn'  => '',
        'btn_text'  => '',
        'btn_url'  => '',
        'big_image'  => '',
        'small_image'  => '',
        'video_url'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    $big_image = wp_get_attachment_image_src( $big_image, 'full' );
    $small_image = wp_get_attachment_image_src( $small_image, 'full' );


    $output ='';
    
    $btn_html = !empty($btn_text) ? '<a href="'.$btn_url.'" class="about-btn hvr-sweep-to-right">'.$btn_text.'</a>' : '';              
    $video_html = !empty($video_url) ? '<a href="'.$video_url.'" class="video-popup"><i class="industrio-icon-play-button"></i></a>' : '';              
    $feature1_html = !empty($feature1) ? '<li><i class="industrio-icon-next"></i>  '.$feature1.'</li>' : '';              
    $feature2_html = !empty($feature2) ? '<li><i class="industrio-icon-next"></i>  '.$feature2.'</li>' : '';              
    $feature3_html = !empty($feature3) ? '<li><i class="industrio-icon-next"></i>  '.$feature3.'</li>' : '';              
    $feature4_html = !empty($feature4) ? '<li><i class="industrio-icon-next"></i>  '.$feature4.'</li>' : '';              
       
        
    $output ='<section class="about-style-one pb0 '.$extraclass.'">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-content">
                        <h3>'.$title.' <span>'.$title_hlt.'</span></h3>
                        <p>'.$description.'</p>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                               <ul class="list-items">
                                    '.$feature1_html.'
                                    '.$feature2_html.'
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                               <ul class="list-items">
                                    '.$feature3_html.'
                                    '.$feature4_html.'
                                </ul>
                            </div>
                        </div>
                        '.$btn_html.'
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="about-img-box">
                        <img src="'.$big_image[0].'" alt=""/>
                        <div class="video-box">
                            <img src="'.$small_image[0].'" alt=""/>
                            '.$video_html.'
                        </div>
                    </div
                </div>
            </div>
        </div>
    </section>';



        return $output;
}


add_shortcode('industrue_about_style_one', 'industrue_about_style_one_shortcode');