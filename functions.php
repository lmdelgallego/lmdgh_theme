<?php
/**
 * 
 * Archivo de fumciones
 * 
 * Contiene y llama todas las funciones del tema
 * 
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */


 /**
  * Definir constantes
  * 
  * Definir diferentes constantes para usar en el tema
  * 
  * @author Luis Miguel Del Gallego H.
  * @package LmdghTheme
  * @since 1.0.0
  */



  //RUTA DE LA CARPETA DEL TEMA
  define('THEMEROOT',get_stylesheet_directory_uri());

  //RUTA A LA CARPETA DE IMAGENES
  define('IMAGES',THEMEROOT.'/img');

  //ELIMINAR EDICION DE ARCHIVOS DESDE EL PANEL DE ADMINISTRACIÓN
  //define('DISALLOW_FILE_EDIT',true);  

  
  /**
   * Theme features
   * 
   * Define caracteristicas del tema
   * Este código ha sido generado desde generatewp.com
   * 
   * @uses add_theme_support
   * @uses add_image_size
   * @uses $content_width
   * 
   * @action after_setup_theme
   * 
   * @author Luis Miguel Del Gallego H.
   * @package LmdghTheme
   * @since 1.0.0
   */
  
    // Set content width value based on the theme's design
    if ( ! isset( $content_width ) )
            $content_width = 980;



    // Register Theme Features
    function lmdgh_custom_theme_features()  {
            global $wp_version;

            // Add theme support for Automatic Feed Links
            add_theme_support( 'automatic-feed-links' );

            // Add theme support for Post Formats
            $formats = array( 'video', 'audio', );
            add_theme_support( 'post-formats', $formats );	

            // Add theme support for Featured Images
            add_theme_support( 'post-thumbnails');	

            // Add theme support for Custom Background
            $background_args = array(
                    'default-color'          => 'd9d9d9',
                    'default-image'          => '',
                    'wp-head-callback'       => '_custom_background_cb',
                    'admin-head-callback'    => '',
                    'admin-preview-callback' => '',
            );
            add_theme_support( 'custom-background', $background_args );

            // Add theme support for custom CSS in the TinyMCE visual editor
            add_editor_style( 'editor-style.css' );	

            // Add theme support for Semantic Markup
            $markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
            add_theme_support( 'html5', $markup );	

            // Add theme support for Translation
            load_theme_textdomain( 'lmdgh', THEMEROOT . '/language' );	
            
            // Añadir tamaños de images personalizados
            add_image_size('page-head', 1280, 400, true);
            add_image_size('blog-image', 640, 480, true);
    }

    // Hook into the 'after_setup_theme' action
    add_action( 'after_setup_theme', 'lmdgh_custom_theme_features' );

    
    
    
    /*
     * Archivos css y js
     * 
     */
    
    require_once ('functions/scripts-stylesheets.php');
    
    /*
     * Archivos menus
     * 
     */
    
    require_once ('functions/menus.php');

        /*
     * Archivos sidebars 
     * 
     */
    
    require_once ('functions/sidebars.php');
  
    /*
     * Archivos theme-customizer 
     * 
     */
    
    require_once ('functions/theme-customizer.php');

    /*
     * Editor elements
     * 
     */
    
    require_once ('functions/editor-elements.php');

    /*
     * Home Metaboxes
     * 
     */
    
    require_once ('functions/home-metaboxes.php');


?>

