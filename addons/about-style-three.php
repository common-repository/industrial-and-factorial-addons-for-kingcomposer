<?php

add_action('init', 'industrue_about_style_three_params', 99 );
 
function industrue_about_style_three_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_about_style_three' => array(
                'name' => 'About Style Three',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                'left column' => array(                    
                    array(
                        'name' => 'texts',
                        'label' => __('Texts', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('<span>Our Story</span>
                            <h3>Something About <br /> Us</h3>', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),                    

                ),
                
                'right column' => array(

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


function industrue_about_style_three_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'texts'  => '',
        'title'  => '',
        'description'  => '',
        'add_btn'  => '',
        'btn_text'  => '',
        'btn_url'  => '',
        'image'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    $image = wp_get_attachment_image_src( $image, 'full' );


    $output ='';
    
    $btn_html = !empty($btn_text) ? '<a href="'.$btn_url.'" class="about-btn hvr-sweep-to-right">'.$btn_text.'</a>' : '';                                  
       
        
    $output ='<section class="about-style-three '.$extraclass.'">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="about-img-box">
                        <img src="'.$image[0].'" alt=""/>
                        <div class="content">
                            '.$texts.'
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="about-content">
                        <h3>'.$title.'</h3>
                        <p>'.$description.'</p>
                        '.$btn_html.'
                    </div>
                </div>
            </div>
        </div>
    </section>';



        return $output;
}
add_shortcode('industrue_about_style_three', 'industrue_about_style_three_shortcode');