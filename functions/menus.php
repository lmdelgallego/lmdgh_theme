<?php

/**
 * 
 * Menu WP
 * 
 * En este archivo definimos las áreas de menú del tema
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */

/**
   * Registrar Menús
   * 
   * Creamos la funcion lmdgh_navigation_menus
   * y con  ella registramos nuestro menu
   * 
   * @uses register_nav_menu
   * 
   * @action init
   * 
   * @author Luis Miguel Del Gallego H.
   * @package LmdghTheme
   * @since 1.0.0
   */


function lmdgh_navigation_menus(){
    
    register_nav_menus(array(
        
        'main-menu' => __('Area del menu principal', 'lmdgh')
        
    ));
    
}

add_action('init','lmdgh_navigation_menus');

?>
