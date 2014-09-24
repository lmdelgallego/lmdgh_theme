<?php 
/**
 * Plantilla de comentarios 
 *
 * Prensenta el listado de comentarios
 * y carga el formulario para comentar.
 *
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
*/
?>

<div id="comments">
    <?php 
    //Prevenimos que se carga directemente el comments.php
    if ( !empty($_SERVER['SCRIPT_FILENAME']) && basename($_SERVER['SCRIPT_FILENAME']) == 'comments.php' ) {
        # code...
        die(__('Sabes que no pedes cargar este archivo.','lmdgh'));
    }
    ?>
    <?php
    //Si tiene passwords
    if ( post_password_required()) {
    ?>
    <p>
        <?php _e('Este articulo requiere contraseña','lmdgh') ?>
    </p>
    <?php
    }
    ?>

    <?php 
    //Si hay comentarios
    if ( have_comments()) {
    ?>
    
    <a href="#respond" class="article-add-comment"></a> 
        <h3 class="comments-title"><?php comments_number( __('No hay comentarios aún','lmdgh'), __('Un comentario','lmdgh'), __('Hay % comentarios','lmdgh') ); ?></h3>
    
        <ol id="comments-list">
            <?php wp_list_comments('avatar_size=40'); ?>
        </ol><!-- /#comments-list -->

        <div class="comments-nav-section clearfix">
            <p class="alingleft"><?php previous_comments_link(__('&larr; Comentarios antiguos','lmdgh') ); ?></p>
            <p class="alingright"><?php next_comments_link(__('Comentarios recientes &rarr; ','lmdgh') ); ?></p>

        </div>


    <?php
    }elseif ( !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments' ) ) { ?>
        <p><?php _e("Los comentarios estan cerrados", 'lmdgh' ); ?></p>
    <?php } ?>

    <?php 
    /**
     * Mostar furmulario de contacos
     */

        comment_form();
     ?>

</div>