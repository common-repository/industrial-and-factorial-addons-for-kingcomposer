<?php

function industrue_icons_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'extraclass'    => '',
        
    ), $atts) );
    
    
    $output ='';
       
        
    $output .='<div class="icon-box">
                <ul>
                    <li><i class="industrio-icon-phone-call"></i><h4>phone-call</h4></li>
                    <li><i class="industrio-icon-pdf"></i><h4>pdf</h4></li>
                    <li><i class="industrio-icon-menu"></i><h4>menu</h4></li>
                    <li><i class="industrio-icon-next"></i><h4>next</h4></li>
                    <li><i class="industrio-icon-coffee-cup"></i><h4>coffee-cup</h4></li>
                    <li><i class="industrio-icon-team"></i><h4>team</h4></li>
                    <li><i class="industrio-icon-play-button"></i><h4>play-button</h4></li>
                    <li><i class="industrio-icon-wind-engine"></i><h4>wind-engine</h4></li>
                    <li><i class="industrio-icon-settings-1"></i><h4>settings-1</h4></li>
                    <li><i class="industrio-icon-delivery-truck"></i><h4>delivery-truck</h4></li>
                    <li><i class="industrio-icon-support"></i><h4>support</h4></li>
                    <li><i class="industrio-icon-secure-shield"></i><h4>secure-shield</h4></li>
                    <li><i class="industrio-icon-atomic"></i><h4>atomic</h4></li>
                    <li><i class="industrio-icon-plant"></i><h4>plant</h4></li>
                    <li><i class="industrio-icon-settings"></i><h4>settings</h4></li>
                    <li><i class="industrio-icon-safety"></i><h4>safety</h4></li>
                    <li><i class="industrio-icon-drop-of-liquid"></i><h4>drop-of-liquid</h4></li>
                    <li><i class="industrio-icon-scythe"></i><h4>scythe</h4></li>
                    <li><i class="industrio-icon-factory-1"></i><h4>factory-1</h4></li>
                    <li><i class="industrio-icon-green-energy"></i><h4>green-energy</h4></li>
                    <li><i class="industrio-icon-innovation"></i><h4>innovation</h4></li>
                    <li><i class="industrio-icon-gas-station-1"></i><h4>gas-station-1</h4></li>
                    <li><i class="industrio-icon-layers"></i><h4>layers</h4></li>
                    <li><i class="industrio-icon-atom"></i><h4>atom</h4></li>
                    <li><i class="industrio-icon-flasks"></i><h4>flasks</h4></li>
                    <li><i class="industrio-icon-gas-station"></i><h4>gas-station</h4></li>
                    <li><i class="industrio-icon-gas-pipe"></i><h4>gas-pipe</h4></li>
                    <li><i class="industrio-icon-tower"></i><h4>tower</h4></li>
                    <li><i class="industrio-icon-valve"></i><h4>valve</h4></li>
                    <li><i class="industrio-icon-industry"></i><h4>industry</h4></li>
                    <li><i class="industrio-icon-worker"></i><h4>worker</h4></li>
                    <li><i class="industrio-icon-envelope"></i><h4>envelope</h4></li>
                    <li><i class="industrio-icon-clock"></i><h4>clock</h4></li>
                    <li><i class="industrio-icon-phone-call"></i><h4>phone-call</h4></li>
                    <li><i class="industrio-icon-right-quote"></i><h4>right-quote</h4></li>
                </ul>
            </div>';
            
            
            

    $output .='<style>
                .icon-box ul li {
                    list-style: none;
                    width: 270px;
                    display: inline-flex;
                }
                .icon-box ul li i {
                    font-size: 33px;
                    padding-right: 10px;
                    color: #FE5A0E;
                }

            </style>';

    return $output;
}


add_shortcode('industrue_icons', 'industrue_icons_shortcode');