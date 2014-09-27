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


	/**
	 * COLOR
	 */
 
	$wp_customize->add_setting('lmdgh_custom_settings[color_link]', array(
		'default'		=>	'#c4331c',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'lmdgh_custom_settings[color_link]', array(
		'label'			=>	__('Color destacado','lmdgh'),
		'section'		=>	'colors',
		'settings'		=>	'lmdgh_custom_settings[color_link]'
	)));

	$wp_customize->add_setting('lmdgh_custom_settings[color_dark]', array(
		'default'		=>	'#000',
		'type'			=>	'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'lmdgh_custom_settings[color_dark]', array(
		'label'			=>	__('Color oscuro','lmdgh'),
		'section'		=>	'colors',
		'settings'		=>	'lmdgh_custom_settings[color_dark]'
	)));




}

add_action('customize_register','lmdgh_customizer_register');




function lmdgh_customize_css(){

	$options = get_theme_mod( 'lmdgh_custom_settings' );
	$custom_css = $options['custom_css'];
?>

	<style type="text/css">
		a, 
		#header-logo a:hover,
		#main-content .article ul li::before,
		#main-content .article .share-post a:hover,
		#comments h3,
		#main-content .portafolio-filter li a:hover,
		#main-content .portafolio-filter li.current-cat,
		#main-content .portafolio-filter li.current-cat a,
		#main-content .article.type-portafolio .project-details h3,
		.widget ul li::before,
		#footer-widgets-area .widget-twitter a,
		#footer-widgets-area .widget-text a,
		#footer-bottom-area .footer-social a:hover{
			color: <?php echo $options['color_link']; ?>;
		}

		#main-nav ul li a:hover,
		#main-nav ul li > ul li a:hover,
		#main-nav ul li > ul li.current > a,
		#main-nav ul li > ul li.current-menu-item > a,
		#main-nav ul li > ul li.current-menu-page > a,
		#main-nav #open-search:hover,
		#main-nav #open-search.open,
		#page-head,
		#home-page-head,
		#comments #comments-list .reply a:hover,
		.portafolio-archive .portafolio-item-resume,
		.widget_lmdgh_recent_proyects article,
		.widget_lmdgh_recent_proyects .flex-direction-nav li .flex-prev:hover,
		.widget_lmdgh_recent_proyects .flex-direction-nav li .flex-next:hover,
		input[type="submit"],
		input[type="button"],
		a.btn{
			background-$custom_css = $options['custom_css'];color: <?php echo $options['color_link']; ?>;
		}
		

		#header-search,
		#main-content .blog-entry-header,
		input:focus,
		textarea:focus,	
		input[type="submit"],
		input[type="button"],
		a.btn{
			border-color: <?php echo $options['color_link']; ?>;
		}

		
		#header-logo a{
			color: <?php echo $options['color_dark']; ?>;
		}

		#main-nav,
		#header-search,
		#main-footer{
			background-color:  <?php echo $options['color_dark']; ?>;
		}


		<?php if (!empty($custom_css)) { ?>
            
                <?php echo $custom_css; ?>
            
        <?php
        } 
        ?>

	</style>


<?php
}

add_action('wp_head','lmdgh_customize_css' );

?>