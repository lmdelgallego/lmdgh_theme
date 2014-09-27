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

	/**
	* CREAMOS EL CONTROLADOR DE TEXT AREA
	*/
	class Lmdgh_Customize_Textarea_Control extends WP_Customize_Control {
		
		public $type = 'textarea';

		public function render_content(){
		?>	
		<label for="">
			<span class="customize-control-title"><?php echo esc_html($this->label ); ?></span>
			<textarea <?php $this->link() ?> rows="5" style="width: 100%"><?php echo esc_textarea($this->value() ); ?></textarea>
		</label>	
		<?php
		}
	}//CLASS

	/**
	 * 'CABEZERA'
	 */
	$wp_customize->add_section('lmdgh_header', array(
		'title'			=>	__('Cabecera','lmdgh'),
		'description'	=>	__('Opciones de la cabezera','lmdgh'),
		'priority'		=>	35
	));	
		//LOGO
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

	/**
	 * REDES SOCIALES
	 */
	$wp_customize->add_section('lmdgh_social_links', array(
		'title'			=>	__('Link sociales','lmdgh'),
		'description'	=>	__('Links a diferentes redes sociales','lmdgh'),
		'priority'		=>	36
	));	

		//TWITTER
	$wp_customize->add_setting('lmdgh_custom_settings[twitter]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( 'lmdgh_custom_settings[twitter]', array(
		'label'			=>	'Twitter',
		'section'		=>	'lmdgh_social_links',
		'settings'		=>	'lmdgh_custom_settings[twitter]'
	));

		//FACEBOOK
	$wp_customize->add_setting('lmdgh_custom_settings[facebook]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( 'lmdgh_custom_settings[facebook]', array(
		'label'			=>	'Facebook',
		'section'		=>	'lmdgh_social_links',
		'settings'		=>	'lmdgh_custom_settings[facebook]'
	));

		//GOOGLE PLUS
	$wp_customize->add_setting('lmdgh_custom_settings[google]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( 'lmdgh_custom_settings[google]', array(
		'label'			=>	'Google',
		'section'		=>	'lmdgh_social_links',
		'settings'		=>	'lmdgh_custom_settings[google]'
	));

		//INSTRAGRAM
	$wp_customize->add_setting('lmdgh_custom_settings[instagram]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( 'lmdgh_custom_settings[instagram]', array(
		'label'			=>	'Instagram',
		'section'		=>	'lmdgh_social_links',
		'settings'		=>	'lmdgh_custom_settings[instagram]'
	));

	/**
	 * Opciones pie de pagina
	 */
	$wp_customize->add_section('lmdgh_footer', array(
		'title'			=>	__('Pie de pagina','lmdgh'),
		'description'	=>	__('Opciones de pie de pagina','lmdgh'),
		'priority'		=>	37
	));	

		//Texto copyright
	$wp_customize->add_setting('lmdgh_custom_settings[copyright_text]', array(
		'default'		=>	date('Y') . ' &copy; ' . get_bloginfo('name' ) . ' / Diseñado por <a href="http://www.lmdgh.com">Luis Miguel Del Gallego</a>',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( 'lmdgh_custom_settings[copyright_text]', array(
		'label'			=>	__('Texto del pie de pagina','lmdgh'),
		'section'		=>	'lmdgh_footer',
		'settings'		=>	'lmdgh_custom_settings[copyright_text]'
	));


	/**
	 * MISELANEO
	 */
	$wp_customize->add_section('lmdgh_miscelaneous', array(
		'title'			=>	__('Miscelaneos','lmdgh'),
		'description'	=>	__('Opciones misceláneas','lmdgh'),
		'priority'		=>	38
	));

		//Texto css
	$wp_customize->add_setting('lmdgh_custom_settings[custom_css]', array(
		'default'		=>	'',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( new Lmdgh_Customize_Textarea_Control( $wp_customize,'lmdgh_custom_settings[custom_css]', array(
		'label'			=>	__('CSS personalizado','lmdgh'),
		'section'		=>	'lmdgh_miscelaneous',
		'settings'		=>	'lmdgh_custom_settings[custom_css]'
	)));
}

add_action('customize_register','lmdgh_customizer_register');

?>