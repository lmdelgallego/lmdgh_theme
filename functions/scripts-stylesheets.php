<?php

/**
  * 
  * Hojas de estilo y js
  * 
  * @author Luis Miguel Del Gallego H.
  * @package LmdghTheme
  * @since 1.0.0
  */




/**
* Theme styles
* 
* Cargando los archivos css del tema
* 
* @uses wp_register_style
* @uses wp_enqueue_style
* @uses $content_width
* 
* @action wp_enqueue_scripts
* 
* @author Luis Miguel Del Gallego H.
* @package LmdghTheme
* @since 1.0.0
*/


function lmdgh_theme_style(){
    
    //Registrar estilos
    wp_register_style('normalize',THEMEROOT.'/css/normalize.css', '', '2.0.1', 'all');
    wp_register_style('font-sans','http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic', '', '', 'all');
    wp_register_style('font-serif','http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic', '', '', 'all');
    wp_register_style('font-awesome',THEMEROOT.'/css/font-awesome.min.css', '', '3.2.1', 'all');
    wp_register_style('theme-style',get_stylesheet_uri(), array('normalize','font-sans','font-serif','font-awesome'), '1.0', 'all');
    
    //Cargar estilos
    wp_enqueue_style('theme-style');
}


add_action('wp_enqueue_scripts','lmdgh_theme_style');




/**
* Theme styles
* 
* Cargando los archivos css del tema
* 
* @uses wp_register_style
* @uses wp_enqueue_style
* @uses $content_width
* 
* @action wp_enqueue_scripts
* 
* @author Luis Miguel Del Gallego H.
* @package LmdghTheme
* @since 1.0.0
*/


function lmdgh_theme_scripts(){
    
    //Registrar scripts (true - carga en footer / false - carga en header
    wp_register_script('fitvids',THEMEROOT.'/js/jquery.fitvids.js', array('jquery'), '1.0', true);
    wp_register_script('flexslider',THEMEROOT.'/js/jquery.flexslider-min.js', array('jquery'), '2.0', true);
    wp_register_script('theme-functions',THEMEROOT.'/js/functions.js', array('jquery','fitvids'), '1.0', true);
    
    //Cargar scripts
    wp_enqueue_script('theme-functions');
}


add_action('wp_enqueue_scripts','lmdgh_theme_scripts');



function lmdgh_js_conditional(){
?>

<!--[if (gte IE 6)&(lte IE 8)]>
		<script  type="text/javascript" src="<?php echo THEMEROOT; ?>/js/html5.js"></script>
		<script  type="text/javascript" src="<?php echo THEMEROOT; ?>/js/selectivizr-min.js"></script>
	<![endif]-->

<?php
}


add_action('wp_head','lmdgh_js_conditional');

?>
