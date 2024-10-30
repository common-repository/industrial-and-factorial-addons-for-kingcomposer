<?php

add_action('init', 'industrue_portfolio_shortcode_init', 99 );
 
function industrue_portfolio_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'industrue_portfolio' => array(
                'name' => 'Portfolio',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Industrue Theme',
                'params' => array(
                
                'General' => array(                                
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),  
                    
                ),
                
                
                'Portfolio' => array(                             
                    array(
                        'type'            => 'group',
                        'label'            => __('Portfolio Items', 'KingComposer'),
                        'name'            => 'portfolios',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'options'     => array( 'add_text' => __( 'Add more portfolio', 'kingcomposer' ) ),
                        
                        'params' => array(
                        
                            array(
                                'name' => 'category',
                                'label' => __('Category', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('<strong style="color:red">Important:</strong> this is case-sensitive. It will show as portfolio filter ', 'kingcomposer')
                            ),                         
                            array(
                                'name' => 'icon',
                                'type' => 'text',
                                'label' => __('Icon Name', 'kingcomposer'),
                                'description' => __('Insert icon name', 'kingcomposer'),
                                'value' => __('', 'kingcomposer')
                            ),                       
                            array(
                                'name' => 'image_thumb',
                                'label' => 'Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library.", "kingcomposer")
                            ),
                            array(
                                'name' => 'title',
                                'label' => __('Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),
                            array(
                                'name' => 'description',
                                'label' => __('Portfolio Content', 'kingcomposer'),
                                'type' => 'editor',
                                'value' => __('Gimply dummy text the printing and typesetting industry orem Ipsum has beenprinter.', 'kingcomposer'),
                            ),
                            array(
                                'name' => 'link',
                                'label' => __('Add Link', 'kingcomposer'),
                                'type' => 'link',
                                'description' => __('Keep blank for no link', 'kingcomposer')
                            ),                            
                                                        
                        /*  array(
                                'name' => 'image_full',
                                'label' => 'Single Portfolio Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library.", "kingcomposer")
                            ),
                            array(
                                'name' => 'title_single',
                                'label' => __('Single Portfolio Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                                                            
                            array(
                                'name' => 'client',
                                'label' => __('Client', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),
                            array(
                                'name' => 'date',
                                'label' => __('Date', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),*/                                                                                    
                                                                                                                            
                        ),
                    ),                
                ),
                
                'Settings' => array(
                
                    array(
                        'type'            => 'select',
                        'label'            => __( 'Portfolio Items Column', 'kingcomposer' ),
                        'name'            => 'port_column',
                        'description'    => __( '', 'kingcomposer' ),
                        'options' => array(
                             '12' => 'One',
                             '6' => 'Two',
                             '4' => 'Three',
                             '3' => 'Four',
                             '2' => 'Six',
                        ),
                        'value'            => '3'
                    ),                                
                    array(
                        'type'            => 'toggle',
                        'label'            => __( 'Enable Filter Bar', 'kingcomposer' ),
                        'name'            => 'enable_filter',
                        'description'    => __( '', 'kingcomposer' ),
                        'value'            => 'yes'
                    ), 
                    
                ),               
                      
                                      
                    
                )
            )
        )
    );
} 


function industrue_portfolio_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title_heading'         => '',
        'title_hlt'             => '',
        'description_heading'   => '',
        'portfolios'            => '',
        'port_column'           => '3',
        'enable_filter'        => '',
        'extraclass'            => '',
        
    ), $atts) );
    
    
    $output ='';
                 
    $title_heading = !empty($title_heading) ? $title_heading : '';
    $title_hlt = !empty($title_hlt) ? $title_hlt : '';
    $description_heading = !empty($description_heading) ? $description_heading : '';
    

        
    $output ='<section class="portfolio-style-two '.$extraclass.'">
        <div class="container">';
            

            
            
    if($enable_filter == 'yes') {            
            
        $output .='<div class="gallery-filter">
                    <ul class="post-filter masonary text-center">
                        <li class="filter active" data-filter=".masonary-item"><span><i class="industrio-icon-layers"></i>All</span></li>';
                                     
        $categories = $atts['portfolios'];
        
        foreach($categories as $category) { 
            
            $category_class = strtolower( current(explode(' ', $category->category)) );

            $output .='<li class="filter" data-filter=".'.$category_class.'"><span><i class="industrio-icon-'.$category->icon.'"></i>'.$category->category.'</span></li>';

        }      
      
                    
        $output .='</ul></div>';
    
    }
     
    $output .='<div class="row masonary-layout filter-layout" data-filter-class="filter">';
        
    
    $portfolios = $atts['portfolios'];
    if( isset( $portfolios ) ){
      foreach( $portfolios as $portfolio ){

        $image_thumb = wp_get_attachment_image_src( $portfolio->image_thumb, 'full' );
        $link    = kc_parse_link($portfolio->link);
        
        if (!empty($link['url'])){
            $title_html = '<a href="'.$link['url'].'"><h3>'.$portfolio->title.'</h3></a>';
        }else{
            $title_html = '<h3>'.$portfolio->title.'</h3>';
        }
        
        $portfolio_cat = strtolower( current(explode(' ', $portfolio->category)) );
        
        
    
        $output .= '<div class="col-md-'.$port_column.' col-sm-6 col-xs-12 masonary-item single-filter-item '.$portfolio_cat.'">
                    <div class="single-portfolio-style-two">
                        <div class="img-box">
                        <img src="'.$image_thumb[0].'" alt=""/>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        '.$title_html.'
                                        <a href="'.$image_thumb[0].'" class="img-popup industrio-icon-next"></a>
                                        '.$portfolio->description.'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';  
         
         
      }
    }          
            
    $output .='</div></div></section>';

    $output .='<script> 
                jQuery(document).ready(function($) {
                    var found = {};
                    $("[data-filter]").each(function(){
                        var $this = $(this);
                        if(found[$this.data("filter")]){
                             $this.remove();   
                        }
                        else{
                             found[$this.data("filter")] = true;   
                        }
                    });
                });

            </script>';


        return $output;
}


add_shortcode('industrue_portfolio', 'industrue_portfolio_shortcode');