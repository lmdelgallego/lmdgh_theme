<?php
/**
 * 
 * Barra Lateral
 * 
 * Este es el sidebar principal edl sitio
 * carga la zona dinamica para el widget 'main-sidebar'
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */

?>

<div id="sidebar">	
			
        <?php
        if( is_active_sidebar('main-sidebar')){
                dynamic_sidebar('main-sidebar');
        }else{ ?>
              <div class="widget">
                <h3 class="widget-title"><?php _e('Búsqueda', 'lmdgh'); ?></h3>
                <div><?php get_search_form(); ?></div>
              </div>

        <?php } ?>


</div><!-- #sidebar -->