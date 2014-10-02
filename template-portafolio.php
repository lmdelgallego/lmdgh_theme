<?php 
/**
 * Template name: Portafolio
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

<?php get_header() ?>
        
        <section id="main-content-area" class="global-padding cols">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- post -->
                        
            <div id="page-head" class="global-padding">
                <h1><?php the_title( ); ?></h1>
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
            </div><!-- /#page-head -->


            
            <div id="main-content" class="full-width portfolio-archive">
            
                <article class="page">
                
                <?php the_content(); ?>    

            <?php endwhile;  endif; ?>        
                                    
                   <?php get_template_part( 'content', 'proyectos-filter' );  ?>  
                    
                    <div id="portfolio-list">
                        
                        <div class="cols">
                            <?php 
                            $paged = ( get_query_var('paged' ) ) ? get_query_var('paged' ) : 1;
                            $proyectos = new WP_Query(array(
                                'post_type'     => 'proyectos',
                                'paged'         => $paged,
                                'posts_per_page' => 9
                            ));    

                                if ( $proyectos->have_posts() ) : while ( $proyectos->have_posts() ) : $proyectos->the_post(); 
                                    get_template_part( 'content', 'proyecto-resumen' ); 
                                endwhile; else: 
                                     get_template_part('content', 'noposts' ); 
                                endif; 

                            wp_reset_postdata();    
                            ?>
                        
                        </div> <!-- /.cols -->

                        <?php
                    if(get_next_posts_link('',$proyectos->max_num_pages) || get_previous_posts_link('',$proyectos->max_num_pages)) {
                    ?>  
                        
                        <div class="posts-navigation cf">
                            <nav>
                                
                                <div class="link-container previous fl">    
                                    <?php next_posts_link(__('&larr; Proyectos anteriores','lmdgh'),$proyectos->max_num_pages); ?>
                                </div>
                                <div class="link-container next fr">
                                    <?php previous_posts_link(__('Proyectos siguientes &rarr;','lmdgh'),$proyectos->max_num_pages); ?>
                                </div>
                                
                                
                            </nav>
                        </div> <!-- /.posts-navigation -->
                    <?php
                        }
                    ?>
                    
                    </div><!-- /#portfolio-list -->

                    
                                        
                </article>  <!-- /.page -->
            
            </div> <!-- end #main-content -->
            

        </section><!-- end #main-content-area -->
        
<?php get_footer(); ?>