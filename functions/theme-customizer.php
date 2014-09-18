<?php
/**
 * 
 * Customizer
 * 
 * Añade opciones de personalización del tema.
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */


function lmdgh_customizer_register($wp_customize){

	//CABEZERA
	$wp_customize->add_section('lmdgh_header', array(
		'title'			=>	__('Cabecera','lmdgh'),
		'description'	=>	__('Opciones de la cabezera','lmdgh'),
		'priority'		=>	35
	));	
	//logo
	$wp_customize->add_setting('lmdgh_custom_settings[logo]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( new Wp_Customize_Image_Control( $wp_customize, 'logo', array(
		'label'			=>	__('Subir logo','lmdgh'),
		'section'		=>	'lmdgh_header',
		'settings'		=>	'lmdgh_custom_settings[logo]'
	)));

	//IMAGEN CABECERA
	$wp_customize->add_setting('lmdgh_custom_settings[imagen-cabecera]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( new Wp_Customize_Image_Control( $wp_customize, 'imagen-cabecera', array(
		'label'			=>	__('Subir imagen de cabecera','lmdgh'),
		'section'		=>	'lmdgh_header',
		'settings'		=>	'lmdgh_custom_settings[imagen-cabecera]'
	)));

}

add_action('customize_register','lmdgh_customizer_register');

?>