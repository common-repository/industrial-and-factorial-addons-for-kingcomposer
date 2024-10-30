<?php

add_action('init', 'industrue_service_carousel_two_shortcode_init', 99 );
 
function industrue_service_carousel_two_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_service_carousel_two' => array(
                'name' => 'Service Carousel Two',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                             
                    array(
                        'type'            => 'group',
                        'label'            => __('Carousel Items', 'KingComposer'),
                        'name'            => 'two_services',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'options'     => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library for before.", "kingcomposer")
                            ),
                            array(
                                'name' => 'icon',
                                'type' => 'text',
                                'label' => __('Icon Name', 'kingcomposer'),
                                'description' => __('Insert icon name', 'kingcomposer'),
                                'value' => __('gas-pipe', 'kingcomposer')
                            ),
                            array(
                                'name' => 'title',
                                'label' => __('Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                    
                            array(
                                'name' => 'description',
                                'label' => __('Content', 'kingcomposer'),
                                'type' => 'editor',
                                'value' => __('Gimply dummy text the printing and typesetting industry orem Ipsum has beenprinter.', 'kingcomposer'),
                            ),                                                                                                
                            array(
                                'name' => 'link',
                                'label' => 'Add Link',
                                'type' => 'link',                     
                            ),
                        ),
                    ),                
            
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items per slide', 'kingcomposer' ),
                        'name' 	=> 'items_number',
                        'description' 	=> __( 'The number of items displayed per slide (not apply for auto-height).', 'kingcomposer' ),
                        'value'			=> '3',
                        'options' => array(
                            'min' => 1,
                            'max' => 10
                        )
                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items On Tablet?', 'kingcomposer' ),
                        'name' 			=> 'tablet',
                        'value'			=> 2,
                        'options' => array(
                            'min' => 1,
                            'max' => 10,
                            'show_input' => true
                        ),
                        'description'   => __('Display number of items per each slide (Tablet Screen)')

                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items On Smartphone?', 'kingcomposer' ),
                        'name' 			=> 'mobile',
                        'value'			=> 1,
                        'options' => array(
                            'min' => 1,
                            'max' => 10,
                            'show_input' => true
                        ),
                        'description'   => __('Display number of items per each slide (Mobile Screen)')

                    ),
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Dots', 'kingcomposer' ),
                        'name'			=> 'dots',
                        'description'	=> __( 'Show the dots under carousel.', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ),
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Auto Play', 'kingcomposer' ),
                        'name'			=> 'auto_play',
                        'description'	=> __( 'The carousel automatically plays when site loaded.', 'kingcomposer' ),
                        'value'			=> 'yes'
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


// Register Before After Shortcode
function industrue_service_carousel_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'two_services'  => '',
        'items_number'  => '3',
        'tablet'        => '2',
        'mobile'        => '1',
        'dots'    => '',
        'auto_play'     => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output ='<section class="service-style-two '.$extraclass.'">
                <div class="container">
                    <div class="service-carousel-style-two owl-carousel owl-theme">';
        
        
    $two_services = $atts['two_services'];
    if( isset( $two_services ) ){
      foreach( $two_services as $two_service ){

        //$image = wp_get_attachment_image_src( $two_service['image'], 'full' );
        $image = wp_get_attachment_image_src( $two_service->image, 'full' );
        $link    = kc_parse_link($two_service->link);
        
        $link_html = '';
        if (!empty($link['url'])){
            $link_html = '<a href="'.$link['url'].'" class="more">'.$link['title'].' <i class="fa fa-angle-right"></i></a>';
        }else{
            $link_html = '';
        }
          
        $output .= '<div class="item">
                <div class="single-service-style-two">
                    <div class="img-box">
                        <img src="'.$image[0].'" alt="">
                    </div>
                    <div class="kc-overlay">
                        <div class="box">
                            <div class="content">
                                <div class="icon-box">
                                    <i class="industrio-icon-'.$two_service->icon.'"></i>
                                </div>
                                <div class="text-box">
                                    <h3>'.$two_service->title.'</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hover">
                        <div class="box">
                            <div class="content">
                                <div class="icon-box">
                                    <i class="industrio-icon-'.$two_service->icon.'"></i>
                                </div>
                                <div class="text-box">
                                    <h3>'.$two_service->title.'</h3>
                                    <p>'.$two_service->description.'</p>
                                    '.$link_html.'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
         
         
      }
    }          
            
    $output .='</div></div></section>';

    
    $auto_play = ($auto_play == 'yes' ? 'true' : 'false');
    $dots = ($dots == 'yes' ? 'true' : 'false');
    
    $output .= '<script>
    
    jQuery(document).ready(function($) {        
    
        $(".service-carousel-style-two").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,           
                dots: '.$dots.',
                autoWidth: false,
                autoplay: '.$auto_play.',
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: '.$mobile.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    480: {
                        items: '.$mobile.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    600: {
                        items: '.$tablet.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    800: {
                        items: '.$tablet.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    1024: {
                        items: '.$tablet.',
                        autoWidth: false
                    },
                    1200: {
                        items: '.$items_number.',
                        autoWidth: false
                    }
                }
            });
        });
        
        </script>';



        return $output;
}


add_shortcode('industrue_service_carousel_two', 'industrue_service_carousel_two_shortcode');