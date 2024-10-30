<?php

add_action('init', 'industrue_contact_info_style_two_params', 99 );
 
function industrue_contact_info_style_two_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_contact_info_style_two' => array(
                'name' => 'Contact Info Style Two',
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
                        'value' => __('', 'kingcomposer'),
                    ),                   
                    array(
                        'name' => 'description',
                        'label' => __('Description', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                  
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Add Social Button', 'kingcomposer' ),
                        'name'			=> 'add_btn',
                        'description'	=> __( '', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ),
                    array(
                        'name' => 'social_title',
                        'label' => __('Social Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Get Connected With Us:', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),                      
                    array(
                        'name' => 'facebook',
                        'label' => __('Facebook URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    array(
                        'name' => 'twitter',
                        'label' => __('Twitter URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    array(
                        'name' => 'instagram',
                        'label' => __('Instagram URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    array(
                        'name' => 'linkedin',
                        'label' => __('Linkedin URL', 'kingcomposer'),
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


function industrue_contact_info_style_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'description'  => '',
        'social_title'  => '',
        'facebook'  => '',
        'twitter'  => '',
        'instagram'  => '',
        'linkedin'  => '',
        'add_btn'  => '',
        'video_url'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
                 
    $video_html = !empty($video_url) ? '<a href="'.$video_url.'" class="video-popup"><i class="industrio-icon-play-button"></i> Play Video</a>' : '';

              
    $social_title_html = !empty($social_title) ? '<h4>'.$social_title.'</h4>' : '';
                  
    $facebook = !empty($facebook) ? '<a href="'.$facebook.'" class="fab fa-facebook"></a>' : '';              
    $twitter = !empty($twitter) ? '<a href="'.$twitter.'" class="fab fa-twitter-square"></a>' : '';              
    $instagram = !empty($instagram) ? '<a href="'.$instagram.'" class="fab fa-instagram"></a>' : '';              
    $linkedin = !empty($linkedin) ? '<a href="'.$linkedin.'" class="fab fa-linkedin"></a>' : '';              
                       
       
        
    $output ='<section class="contact-info-style-two '.$extraclass.'">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="left-content">
                    <div class="inner">
                        <h3>'.$title.'</h3>
                        <p>'.$description.'</p>
                        '.$social_title_html.'
                        <div class="social">
                            '.$facebook.'
                            '.$twitter.'
                            '.$instagram.'
                            '.$linkedin.'
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-video-box">
                    '.$video_html.'
                </div>
            </div>
        </div>
    </section>';



    return $output;
}


add_shortcode('industrue_contact_info_style_two', 'industrue_contact_info_style_two_shortcode');