<?php 
/**
 * 
 * Editor elements
 * 
 * En este editor agregamos un elemento intro 
 * para estilizar los post
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */

function lmdgh_mce_editor_buttons($buttons){
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

function lmdgh_mce_before_init($settings){

    $style_formats = array(
        array(
            'title' => 'Intro del articulo',
            'block' => 'div',
            'classes'   => 'article-intro',
            'wrapper'   => true
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

add_filter( 'mce_buttons_2', 'lmdgh_mce_editor_buttons');
add_filter( 'tiny_mce_before_init', 'lmdgh_mce_before_init');

?>