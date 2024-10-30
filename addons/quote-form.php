<?php



add_action('init', 'industrue_quote_form_shortcode_init', 99 );
 
function industrue_quote_form_shortcode_init(){
    
    global $kc;
    $admin_email = get_option( 'admin_email' );
    $kc->add_map(
        array(
            'industrue_quote_form' => array(
                'name' => 'Quote Form',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
                
                'General' => array(
                
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
                        'name' => 'bg_color',
                        'label' => __('Quote Form Background Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('#262626', 'kingcomposer')
                    ),                    
                ),                 
             
                'Fields' => array(     
                    array(
                        'type'            => 'group',
                        'label'           => __('Fields', 'KingComposer'),
                        'name'            => 'fields',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new field', 'kingcomposer' ) ),
                        
                        'params' => array(
                        
                            array(
                                "type" => "select",
                                "label" => __("Field Type", "kingcomposer"),
                                "name" => "field_type",
                                'options' => array(
                                    'text' => 'Text',
                                    'textarea' => 'Text Area',
                                ),
                            ),
                            array(
                                'name' => 'field_id',
                                'label' => __('Field ID', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('required', 'kingcomposer')
                            ),                                                  
                            array(
                                'name' => 'placeholder',
                                'label' => __('Placeholder Text', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                               
                            array(
                                "type" => "checkbox",
                                "label" => __("Required?", "kingcomposer"),
                                "name" => "required",
                                'options' => array(
                                    'required' => 'Yes',
                                ),
                            ),
                                                                                                                            
                        ),
                    ),
                    
                    array(
                        'name' => 'btn_text',
                        'label' => __('Submit Button Text', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Get a qoute', 'kingcomposer')
                    ),                    
                ),
                
                'Settings' => array(
                
                    array(
                        'name' => 'email',
                        'label' => __('Recipient Email', 'kingcomposer'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => __('email address where users send quote', 'kingcomposer'),
                        'value' => __(''.$admin_email.'', 'kingcomposer')
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


function industrue_quote_form_shortcode($atts, $content = null){
    extract( shortcode_atts( array(

        'title'  => '',
        'title_hlt'  => '',
        'description'  => '',    
        'bg_color'  => '',    
        'fields'  => '',
        'btn_text'  => '',
        'email'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output ='<div class="rqa-box '.$extraclass.'" style="background: '.$bg_color.'">
                        <h3>'.$title.' <span>'.$title_hlt.'</span></h3>
                        <p>'.$description.'</p>
                        
                        
                        <form action="" method="post" class="rqa-form">';
         



        return $output;
}


add_shortcode('industrue_quote_form', 'industrue_quote_form_shortcode');