<?php 
/**
 * Crear post type proyectos
 * Este código crea el custom post type proyectos
 * par crear un portafolio
 *
 *
 * @uses register_post_type
 * @action init
 *
 * @author Luis Miguel Del Gallego H.
 * @package LMDGH-Proyectos-Post-Type
 * @since 1.0.0
 *
 *
 */

if ( ! function_exists('lmdgh_proyectos_post_type') ) {

    // Register Custom Post Type
    function lmdgh_proyectos_post_type() {

        $labels = array(
            'name'                => _x( 'Proyectos', 'Post Type General Name', 'lmdgh' ),
            'singular_name'       => _x( 'Proyecto', 'Post Type Singular Name', 'lmdgh' ),
            'menu_name'           => __( 'Proyectos', 'lmdgh' ),
            'parent_item_colon'   => __( 'Proyecto superior:', 'lmdgh' ),
            'all_items'           => __( 'Todos los proyectos', 'lmdgh' ),
            'view_item'           => __( 'Ver proyecto', 'lmdgh' ),
            'add_new_item'        => __( 'Agregar un nuevo proyecto', 'lmdgh' ),
            'add_new'             => __( 'Agregar nuevo', 'lmdgh' ),
            'edit_item'           => __( 'Editar proyecto', 'lmdgh' ),
            'update_item'         => __( 'Actualizar proyecto', 'lmdgh' ),
            'search_items'        => __( 'Buscar proyectos', 'lmdgh' ),
            'not_found'           => __( 'No se han encontrado resultados', 'lmdgh' ),
            'not_found_in_trash'  => __( 'No hay nada en la papelera', 'lmdgh' ),
        );
        $args = array(
            'label'               => __( 'proyectos', 'lmdgh' ),
            'description'         => __( 'Diferentes proyectos de un protafolio', 'lmdgh' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-portfolio',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type( 'proyectos', $args );

    }

    // Hook into the 'init' action
    add_action( 'init', 'lmdgh_proyectos_post_type', 0 );

}


?>