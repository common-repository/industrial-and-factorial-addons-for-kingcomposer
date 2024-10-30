<?php

add_action('init', 'industrue_service_carousel_one_shortcode_init', 99 );
 
function industrue_service_carousel_one_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_service_carousel_one' => array(
                'name' => 'Service Carousel One',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
            
                             
                    array(
                        'type'            => 'group',
                        'label'            => __('Carousel Items', 'KingComposer'),
                        'name'            => 'one_services',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'options'     => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(
                        
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
                        ),
                    ),                
            
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items per slide', 'kingcomposer' ),
                        'name' 	=> 'items_number',
                        'description' 	=> __( 'The number of items displayed per slide (not apply for auto-height).', 'kingcomposer' ),
                        'value'			=> 5,
                        'options' => array(
                            'min' => 1,
                            'max' => 10
                        )
                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items On Tablet?', 'kingcomposer' ),
                        'name' 			=> 'tablet',
                        'value'			=> 3,
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
                        'value'			=> 2,
                        'options' => array(
                            'min' => 1,
                            'max' => 10,
                            'show_input' => true
                        ),
                        'description'   => __('Display number of items per each slide (Mobile Screen)')

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
function industrue_service_carousel_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'one_services'  => '',
        'items_number'  => '3',
        'tablet'        => '2',
        'mobile'        => '1',
        'auto_play'     => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output ='<section class="service-style-one pb0 '.$extraclass.'">
                <div class="container">
                    <div class="service-carousel-one owl-carousel owl-theme">';
        
        
    $one_services = $atts['one_services'];
    if( isset( $one_services ) ){
      foreach( $one_services as $one_service ){
          
        $output .= '<div class="item">
                    <div class="single-service-style-one flip-hover">
                        <div class="front">
                            <div class="inner-content">
                                <i class="industrio-icon-'.$one_service->icon.'"></i>
                                <h3>'.$one_service->title.'</h3>
                            </div><!-- /.inner-content -->
                        </div><!-- /.front -->
                        <div class="back">
                            <div class="kc-overlay">
                                <div class="box">
                                    <div class="content">
                                        <h3>'.$one_service->title.'</h3>
                                        '.$one_service->description.'
                                    </div><!-- /.content -->
                                </div><!-- /.box -->
                            </div><!-- /.overlay -->
                        </div><!-- /.back -->
                    </div><!-- /.single-service-style-one -->
                </div><!-- /.item -->';
         
         
      }
    }          
            
    $output .='</div></div></section>';

    
    $auto_play = ($auto_play == 'yes' ? 'true' : 'false');
    
    $output .= '<script>
    
    jQuery(document).ready(function($) {        
    
        $(".service-carousel-one").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,           
                dots: true,
                autoplay: '.$auto_play.',
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: '.$mobile.'
                    },
                    600: {
                        items: '.$tablet.'
                    },
                    1000: {
                        items: '.$tablet.'
                    },
                    1200: {
                        items: '.$items_number.'
                    }
                }
            });
        });
        
        </script>';



        return $output;
}


add_shortcode('industrue_service_carousel_one', 'industrue_service_carousel_one_shortcode');