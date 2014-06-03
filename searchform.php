<?php

/**
 * 
 * Formulario de busqueda WP
 * 
 * Remplaza el formulario de busqueda estandar de Wordpress
 * Lo unico diferente es que se ha removido el label
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */
?>

<form method="get" class="search-form" action="<?php echo home_url(); ?>">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
        <input type="submit" value="<?php _e('Buscar', 'lmdgh'); ?>" />
</form>