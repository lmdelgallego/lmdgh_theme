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

function lmdgh_home_metabox_add(){
    # code...
    add_meta_box('home_datails', __('Página de inicio', 'lmdgh'), 'lmdgh_home_metabox', 'page', 'normal', 'high', '' );
}

add_action( 'add_meta_boxes', 'lmdgh_home_metabox_add' );


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

$custom_home_meta_fields = array(
    array(
        'label' =>  __('Texto destacado','lmdgh'),
        'desc'  =>  __('Inserta el eslogan para tu sitio','lmdgh'),
        'id'    => 'slogan',
        'type'  => 'textarea'
    ),
    array(
        'label' =>  __('Texto del boton','lmdgh'),
        'desc'  =>  __('Ingresa un texto para el botón con el llamado a la acción','lmdgh'),
        'id'    => 'btn_text',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Link del botón','lmdgh'),
        'desc'  =>  __('¿A donde apuntará el botón?','lmdgh'),
        'id'    => 'btn_link',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Título de proyectos recientes','lmdgh'),
        'desc'  =>  __('Ingresa un texto para mostrar sobre los proyectos recientes','lmdgh'),
        'id'    => 'proyectos_title',
        'type'  => 'text'
    ),
    array(
        'label' =>  __('Proyectos','lmdgh'),
        'desc'  =>  __('¿Cuántos proyectos quieres mostrar?','lmdgh'),
        'id'    => 'proyectos_count',
        'type'  => 'number'
    )
);



function lmdgh_home_metabox(){

    global $custom_home_meta_fields, $post;

    //Crear campo nonce
    wp_nonce_field('lmdgh_home_meta_box_nonce', 'meta_box_nonce' );

    foreach ($custom_home_meta_fields as $field) {
        
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
            
            case 'textarea':
?>
            <p>
                <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br/>
                <textarea name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" rows="3" class="widefat"><?php echo $meta; ?></textarea>
                <span class='howto'><?php echo $field['desc']; ?></span>
            </p>
            <hr style="width: 100%, height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background: #dbdcdd" />
<?php
                break;

            case 'number':
?>
            <p>
                <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br/>
               <input id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" type="number" class="widefat" value="<?php echo $meta; ?>" />
                <span class='howto'><?php echo $field['desc']; ?></span>
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

function lmdgh_save_home_custom_meta($post_id){

    global $custom_home_meta_fields;

    //Comprobar que el campo nonce haya sido enviado.
    if (!isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'lmdgh_home_meta_box_nonce' ) ) {
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

    foreach ($custom_home_meta_fields as $field) {
        //Capturamos los datos antiguos.
        $old = get_post_meta($post_id, $field['id'] );
        //Campuramos los datos nuevos
        $new = $_POST[ $field['id'] ];

        if ( $new && $new != $old) {
            //actualiza el post meta
            update_post_meta($post_id,$field['id'],$new);
        }elseif ('' == $new && $old) {
            
            //borrar post meta
            delete_post_meta($post_id,$field['id'],$old);
        }
     } //foreach
}

add_action('save_post','lmdgh_save_home_custom_meta' );



/**
 * Oculta o muestra el metabox
 * 
 * Con esta funcion se integra css el head del área admin 
 * que permite ocultar el metabox hom
 *
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */


function lmdgh_home_metabox_css(){
?>
<style type="text/css" media="screen"> 
    #home_datails{
        display: none;
    }
</style>

<script>
    jQuery('document').ready(function ($) {
        
        slider_box = function () {
            if ( $('#page_template').attr('value') == 'template-home.php') {
                $('#home_datails').slideDown();
            }else{
                $('#home_datails').hide();   
            }
        }

        slider_box();

        $('#page_template').change(function () {
            slider_box();
        });

    });
</script>
<?php
}


add_action('admin_head', 'lmdgh_home_metabox_css');


?>