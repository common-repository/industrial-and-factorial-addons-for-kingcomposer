<?php

add_action('init', 'industrue_team_style_one_params', 99 );
 
function industrue_team_style_one_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_team_style_one' => array(
                'name' => 'Team Style One',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                'general' => array(
                    array(
                        'name' => 'image',
                        'label' => 'Member Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    
                    array(
                        'name' => 'name',
                        'label' => __('Member Name', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'designation',
                        'label' => __('Memeber Designation', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'facebook',
                        'label' => __('Facebook URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'twitter',
                        'label' => __('Twitter URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'google_plus',
                        'label' => __('Google Plus URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'instagram',
                        'label' => __('Instagram URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
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


function industrue_team_style_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'image'  => '',
        'name'  => '',
        'designation'  => '',
        'facebook'  => '',
        'twitter'  => '',
        'google_plus'  => '',
        'instagram'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    $image = wp_get_attachment_image_src( $image, 'full' );


    $output ='';
    
    $social_html = '';
    $social_html .= !empty($facebook) ? '<a href="'.$facebook.'" class="fab fa-facebook-f"></a>' : '';             
    $social_html .= !empty($twitter) ? '<a href="'.$facebook.'" class="fab fa-twitter"></a>' : '';             
    $social_html .= !empty($google_plus) ? '<a href="'.$facebook.'" class="fab fa-google-plus"></a>' : '';             
    $social_html .= !empty($instagram) ? '<a href="'.$instagram.'" class="fab fa-instagram"></a>' : '';             
       
        
    $output ='<section class="team-style-one">

                    <div class="single-team-style-one text-center">
                        <div class="img-box">
                            <img src="'.$image[0].'" alt=""/>
                            <div class="name-box">
                                <div class="inner">'.$name.'</div>
                            </div>
                        </div>
                        <div class="text-box">
                            <p>'.$designation.'</p>
                            <div class="social">
                                '.$social_html.'
                            </div>
                        </div>
                    </div>

    </section>';



        return $output;
}


add_shortcode('industrue_team_style_one', 'industrue_team_style_one_shortcode');