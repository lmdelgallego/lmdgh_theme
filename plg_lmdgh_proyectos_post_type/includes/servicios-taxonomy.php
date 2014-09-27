<?php 
/**
 * Crear taxonomia servicios
 *  
 * Registramos la taxonomia de servicios para
 * organizar los proyectos del protafolio
 *
 * @uses register_taxonomy
 * @action init
 *
 * @author Luis Miguel Del Gallego H.
 * @package LMDGH-Proyectos-Post-Type
 * @since 1.0.0
 *
 *
 */

if ( ! function_exists( 'lmdgh_servicios_taxonomy' ) ) {

    // Register Custom Taxonomy
    function lmdgh_servicios_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Servicios', 'Taxonomy General Name', 'lmdgh' ),
            'singular_name'              => _x( 'Servicio', 'Taxonomy Singular Name', 'lmdgh' ),
            'menu_name'                  => __( 'Servicios', 'lmdgh' ),
            'all_items'                  => __( 'Ver todos', 'lmdgh' ),
            'parent_item'                => __( 'Superior', 'lmdgh' ),
            'parent_item_colon'          => __( 'Servicio superior', 'lmdgh' ),
            'new_item_name'              => __( 'Nombre del nuevo servicio', 'lmdgh' ),
            'add_new_item'               => __( 'Agregar nuevo servicio', 'lmdgh' ),
            'edit_item'                  => __( 'Editar servicio', 'lmdgh' ),
            'update_item'                => __( 'Actualizar servicio', 'lmdgh' ),
            'separate_items_with_commas' => __( 'Separar servicios con comas', 'lmdgh' ),
            'search_items'               => __( 'Buscar servivios', 'lmdgh' ),
            'add_or_remove_items'        => __( 'Agregar o eliminar servicios', 'lmdgh' ),
            'choose_from_most_used'      => __( 'Escoja entre los más usados', 'lmdgh' ),
            'not_found'                  => __( 'No encontrado', 'lmdgh' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );
        register_taxonomy( 'servicios', array( 'proyectos' ), $args );

    }

    // Hook into the 'init' action
    add_action( 'init', 'lmdgh_servicios_taxonomy', 0 );

}


 ?>