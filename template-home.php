<?php 
/**
 * Template name: Homepage
 *
 * Plantilla para la pagina de inicio
 * 
 * Esta plantilla muestra un contenido destacado + el
 * contenido de la pagina y los ultimos proyectos
 * 
 *  
 * @author Luis Miguel Del Gallego H.
 * @package LmdghTheme
 * @since 1.0.0
 * 
 */
?>
<?php get_header(); ?>    
        
        
        <section id="main-content-area" class="global-padding cols">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- post -->
            
            <?php 
                $slogan = get_post_meta( $post->ID, 'slogan', true );
                $btn_text = get_post_meta( $post->ID,'btn_text', true);
                $btn_link = get_post_meta( $post->ID,'btn_link', true);
                $proyectos_title = get_post_meta( $post->ID,'proyectos_title', true);
                $proyectos_count = get_post_meta( $post->ID,'proyectos_count', true);

                if ($proyectos_count && $proyectos_count < 0) {
                    $proyectos_count = 0;
                }

                if (!$slogan) {
                   $slogan = get_bloginfo('name' );
                }

                if (!$btn_text) {
                   $btn_text = __('¿Quieres trabajar conmigo?','lmdgh');
                } 

                if (!$proyectos_title) {
                   $proyectos_title = __('Mira mis proyectos recientes','lmdgh');
                }        
             ?>

            <div id="home-page-head" class="global-padding">
                
                <h2><?php echo nl2br($slogan); ?></h2>
                
                <?php if ($btn_link) { ?>
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-big"><?php echo $btn_text; ?></a>
                <?php } ?>
                <?php 

                    if (has_post_thumbnail()) {
                        $imagen_cabecera = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-head' );
                    ?>
                        <div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera[0]; ?>');"></div>
                    <?php   
                    }else{
                        
                        $options = get_theme_mod('lmdg_custom_settings');
                        $imagen_cabecera = $options['imagen-cabecera'];
                        if (!$imagen_cabecera) {
                            $imagen_cabecera = IMAGES.'/default-heading-bg.jpg';
                        }
                    ?>
                        <div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera; ?>');"></div>
                    <?php   
                    }

                 ?>


            </div><!-- /#home-page-head -->

        
            
            <div id="main-content" class="full-width homepage-content cf"> 
        
                <article class="page">
                    <?php the_content(); ?>  
                </article><!-- /.page -->
        
            </div> <!-- /#main-content -->
            
            <?php endwhile; endif; ?>    

            <?php if ($proyectos_count && $proyectos_count != 0 && post_type_exists('proyectos' )) { ?>
                
            <div id="home-recent-projects" class="portfolio-archive global-padding">
                
                <h3><?php echo $proyectos_title; ?></h3>
                    
                <div class="cols">

                <?php 

                        $query_proyectos = new WP_Query(array(
                            'post_type'     => 'proyectos',
                            'posts_per_page' => $proyectos_count
                        ));

                    if ( $query_proyectos->have_posts() ) : while ($query_proyectos->have_posts() ) : $query_proyectos->the_post(); 

                        get_template_part( 'content', 'proyecto-resumen' ); 

                    endwhile; else: 
                        _e( 'No hay proyectos disponibles.', 'lmdgh' );
                    endif;

                 ?> 

                </div> <!-- /.cols -->
            
            </div><!-- /#recent-projects -->
            <?php } ?>
            
        </section><!-- end #main-content-area -->
<?php get_footer(); ?>