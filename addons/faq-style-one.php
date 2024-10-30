<?php

add_action('init', 'industrue_faq_style_one_shortcode_init', 99 );
 
function industrue_faq_style_one_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_faq_style_one' => array(
                'name' => 'Faq One',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(                 
             
                'Faq' => array(     
                    array(
                        'type'            => 'group',
                        'label'           => __('Faq Items', 'KingComposer'),
                        'name'            => 'faqs',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'title',
                                'label' => __('Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                               
                            array(
                                'name' => 'faq_content',
                                'label' => __('Faq Content', 'kingcomposer'),
                                'type' => 'editor',
                                'value' => __('faq content here', 'kingcomposer'),
                            ),
                            array(
                                "type" => "checkbox",
                                "label" => __("Active this Faq", "kingcomposer"),
                                "name" => "active_faq",
                                'options' => array(
                                    'active' => 'Yes',
                                ),
                            ),                                                                                                                            
                        ),
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


function industrue_faq_style_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'faqs'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output ='<section class="faq-rqa-section faq-style-one pb0 '.$extraclass.'">

            <div class="accrodion-grp" data-grp-name="faq-accrodion">';
        
        
    $faqs = $atts['faqs'];
    if( isset( $faqs ) ){
      foreach( $faqs as $faq ){

          
        $output .= '<div class="accrodion '.$faq->active_faq.'">
                            <div class="accrodion-title">
                                <h4>'.$faq->title.'</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    '.$faq->faq_content.'
                                </div>
                            </div>
                        </div>';
         
         
      }
    }          
            
    $output .='</div></section>';



        return $output;
}


add_shortcode('industrue_faq_style_one', 'industrue_faq_style_one_shortcode');