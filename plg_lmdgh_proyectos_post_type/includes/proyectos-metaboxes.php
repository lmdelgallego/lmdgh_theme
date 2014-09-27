<?php 
/**
 * 
 * Crear Metabox
 * 
 * Con esta función crearemos el meta box en el cual
 * se incluiran los campos personalizados
 * 
 * @uses    add_meta_box
 * @action  add_meta_boxes
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */



function lmdgh_proyectos_metabox_add(){
    # code...
    add_meta_box('proyect_datails', __('Detalles del proyecto', 'lmdgh'), 'lmdgh_proyectos_metabox', 'proyectos', 'normal', 'high', '' );
}

add_action( 'add_meta_boxes', 'lmdgh_proyectos_metabox_add' );


/**
 * Crear campos del metabox
 * 
 * Con esta funcion creamos los diferentes campos 
 * que aparecerán dentro del metabox
 *
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */

/**
 * Creamos un listado de los campos. 
 */

$custom_proyectos_meta_fields = array(
    array(
        'label' =>  __('Cliente','lmdgh'),
        'desc'  =>  __('Para quien fue este proyecto','lmdgh'),
        'id'    => 'cliente',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Fecha','lmdgh'),
        'desc'  =>  __('¿Cuando se realizo este proyecto?','lmdgh'),
        'id'    => 'fecha',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Webside','lmdgh'),
        'desc'  =>  __('¿Quieres incluir un enlace?','lmdgh'),
        'id'    => 'webside',
        'type'  => 'url'
    ),
    array(
        'label' =>  __('Llamado a la acción','lmdgh'),
        'desc'  =>  __('Texto para el botón lladado a la accion','lmdgh'),
        'id'    => 'btn_txt',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Link del botón','lmdgh'),
        'desc'  =>  __('¿A donde llevará el enlace?','lmdgh'),
        'id'    => 'btn_link',
        'type'  => 'url'
    ),
    array(
        'label' =>  __('Multimedia','lmdgh'),
        'desc'  =>  __('Incluye aquí imágenes, videos, audios o cualquier contenido necesario para mostrar el proyecto.','lmdgh'),
        'id'    => 'multimedia',
        'type'  => 'wysiwyg'
    )
);



function lmdgh_proyectos_metabox(){

    global $custom_proyectos_meta_fields, $post;

    //Crear campo nonce
    wp_nonce_field('lmdgh_proyectos_meta_box_nonce', 'meta_box_nonce' );

    foreach ($custom_proyectos_meta_fields as $field) {
        
        //Obtener el valor del campo
        $meta = get_post_meta($post->ID, $field['id'], true );

        //Hacemos un switch de acuerdo al tipo del campo

        switch ($field['type']) {
            case 'text':
?>  
            <p>
                <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br/>
                <input id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" type="text" class="widefat" value="<?php echo $meta; ?>" />
                <span class='howto'><?php echo $field['desc']; ?></span>
            </p>

            <hr style="width: 100%, height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background: #dbdcdd" />
<?php
                break;
            
            case 'url':
?>
            <p>
                <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br/>
                <input id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" type="text" class="widefat" value="<?php echo esc_url($meta); ?>" />
                <span class='howto'><?php echo $field['desc']; ?></span>
            </p>
            <hr style="width: 100%, height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background: #dbdcdd" />
<?php
                break;

            case 'wysiwyg':
?>
            <p>
                <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br/>
                <span class='howto'><?php echo $field['desc']; ?></span>
                <?php wp_editor( $meta, $field['id'] ); ?>
            </p>
<?php
                break;
        }//switch
    }//foreach

}


/**
 * Guardar campos
 * 
 * Con esta funcion guardamos los datos que se hayan 
 * ingresado en los campos al momento  de guardar el proyecto
 *
 * @action save_post
 * @param   $post_id El ID del post que se está guardando.
 *
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */

function lmdgh_save_proyectos_custom_meta($post_id){

    global $custom_proyectos_meta_fields;

    //Comprobar que el campo nonce haya sido enviado.
    if (!isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'lmdgh_proyectos_meta_box_nonce' ) ) {
        return;
    }

    //Si esto es un autosave no hacemos nada
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAFE) {
        return;
    }

    //Verificamos los permisos del usuario.
    if ('page' == $_POST['post_type']) {
        
        if (!current_user_can( 'edit_page', $post_id )) {
            return;
        }elseif (!current_user_can( 'edit_post', $post_id )) {
            return;
        }
    }

    foreach ($custom_proyectos_meta_fields as $field) {
        //Capturamos los datos antiguos.
        $old = get_post_meta($post_id, $field['id'] );
        //Campuramos los datos nuevos
        $new = $_POST[ $field['id'] ];

        if ( $new && $new != $old) {

            if ($field['tipe'] == 'url') {
                //actualiza el post meta
                update_post_meta($post_id,$field['id'],esc_url($new));
            }else{
                //actualiza el post meta
                update_post_meta($post_id,$field['id'],$new);
            }
        }elseif ('' == $new && $old) {
            
            //borrar post meta
            delete_post_meta($post_id,$field['id'],$old);
        }
     } //foreach
}

add_action('save_post','lmdgh_save_proyectos_custom_meta' );

?>