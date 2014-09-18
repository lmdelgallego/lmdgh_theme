<?php 

/**
 * 
 * Sidebar
 * 
 * En este archivo registramos las diferentes
 * áreas dinamica para Widgets
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */


/**
 * 
 * Registrando sidebar
 * 
 * Aqui estamos registrando los diferentes siderbars del tema
 *
 * @uses 	register_sidebar
 *
 * @action 	widgets_init
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */



function lmdgh_customs_sidebars(){

	//Sidebar principal
	register_sidebar(array(
		'name'			=>	__('Sidebar principal', 'lmdgh'),
		'id'			=>	'main-sidebar',
		'description'	=>	__('Este es el sidebar principal','lmdgh'),
		'class'			=>	'',
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>',		
		));

	//Sidebar footer izquierda
	register_sidebar(array(
		'name'			=>	__('Pie de pagina izquierdo', 'lmdgh'),
		'id'			=>	'footer-sidebar-izq',
		'description'	=>	__('Este es el area izquierda del pie de pagina','lmdgh'),
		'class'			=>	'',
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>',		
		));

	//Sidebar footer centro
	register_sidebar(array(
		'name'			=>	__('Pie de pagina centro', 'lmdgh'),
		'id'			=>	'footer-sidebar-center',
		'description'	=>	__('Este es el area centro del pie de pagina','lmdgh'),
		'class'			=>	'',
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>',		
		));

	//Sidebar footer derecho
	register_sidebar(array(
		'name'			=>	__('Pie de pagina derecho', 'lmdgh'),
		'id'			=>	'footer-sidebar-der',
		'description'	=>	__('Este es el area derecho del pie de pagina','lmdgh'),
		'class'			=>	'',
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>',		
		));
}


add_action('widgets_init', 'lmdgh_customs_sidebars');
?>