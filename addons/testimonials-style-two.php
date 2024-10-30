<?php

add_action('init', 'industrue_testimonials_style_two_shortcode_init', 99 );
 
function industrue_testimonials_style_two_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_testimonials_style_two' => array(
                'name' => 'Testimonal Two',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
                
                
                'General' => array(
                
                    array(
                        'name' => 'title_heading',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'title_hlt',
                        'label' => __('Title Highlight', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('highlight text after the title', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),                 
                ),                
            
                'Testimonals' => array(             
                    array(
                        'type'            => 'group',
                        'label'           => __('Testimonial Items', 'KingComposer'),
                        'name'            => 'testimonials',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'image',
                                'label' => 'Client Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library for before.", "kingcomposer")
                            ),
                            array(
                                'name' => 'name',
                                'label' => __('Name', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),
                            array(
                                'name' => 'designation',
                                'label' => __('Designation', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                                
                            array(
                                'name' => 'description',
                                'label' => __('Content', 'kingcomposer'),
                                'type' => 'textarea',
                                'value' => __('', 'kingcomposer'),
                            ),                                                                                                
                        ),
                    ),                
                ),
                
                                                                      
                    
                )
            )
        )
    );
} 


function industrue_testimonials_style_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'testimonials'  => '',
        'title_heading'  => '',
        'title_hlt'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output ='<section class="testimonials-style-two '.$extraclass.'">
        <div class="container">
            <div class="sec-title light">
                <h3>'.$title_heading.' <span>'.$title_hlt.'</span></h3>
            </div>
            <div class="testimonials-style-two-carousel owl-theme owl-carousel">';
        
        
    $testimonials = $atts['testimonials'];
    if( isset( $testimonials ) ){
      foreach( $testimonials as $testimonial ){

        $image = wp_get_attachment_image_src( $testimonial->image, 'full' );

          
        $output .= '<div class="item">
                    <div class="single-testimonial-style-two">
                        <div class="inner">
                        <p><i class="fas fa-quote-left"></i> '.$testimonial->description.' <i class="fas fa-quote-right"></i></p>
                        <div class="client-info-box">
                            <div class="img-box">
                                <img src="'.$image[0].'" alt=""/>
                            </div>
                            <div class="text-box">
                                <h3>'.$testimonial->name.'</h3>
                                <p>'.$testimonial->designation.'</p>
                            </div>
                        </div><
                        </div>
                    </div>
                </div>';
         
         
      }
    }          
            
    $output .='</div></div></section>';

    
    $output .= '<script>
    
    jQuery(document).ready(function($) {        
    
        $(".testimonials-style-two-carousel").owlCarousel({
            loop: true,
            margin: 110,
            nav: false,            
            dots: true,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    autoWidth: false,
                    dots: false,
                    nav: true
                },
                480: {
                    items: 1,
                    autoWidth: false,
                    dots: false,
                    nav: true
                },
                600: {
                    items: 2,
                    autoWidth: false,
                    dots: false,
                    nav: true
                },
                1000: {
                    items: 3,
                    autoWidth: false
                }
            }
        });
        });
        
        </script>';



        return $output;
}


add_shortcode('industrue_testimonials_style_two', 'industrue_testimonials_style_two_shortcode');