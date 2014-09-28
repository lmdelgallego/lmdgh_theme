<?php get_header() ?>
        
        <section id="main-content-area" class="global-padding cols">
            
            
            <div id="page-head" class="global-padding">
                <h1><?php post_type_archive_title( ); ?></h1>
                <?php 
                    $options = get_theme_mod('lmdg_custom_settings');
                    $imagen_cabecera = $options['imagen-cabecera'];
                    if (!$imagen_cabecera) {
                        $imagen_cabecera = IMAGES.'/default-heading-bg.jpg';
                    }
                ?>
                 <div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera; ?>');"></div>

            </div><!-- /#page-head -->


            
            <div id="main-content" class="full-width portfolio-archive">
            
                <article class="page">
                                    
                   <?php get_template_part( 'content', 'proyectos-filter' );  ?>  
                    
                    <div id="portfolio-list">
                        
                        <div class="cols">
                

                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <!-- post -->
                            <?php get_template_part( 'content', 'proyecto-resumen' );  ?>                        
                            <?php endwhile; else: ?>
                                <?php get_template_part('content', 'noposts' ); ?>
                            <?php endif; ?>
                        
                        </div> <!-- /.cols -->
                    
                    </div><!-- /#portfolio-list -->

                    <?php
                    if(get_next_posts_link() || get_previous_posts_link()) {
                    ?>  
                        
                        <div class="posts-navigation cf">
                            <nav>
                                
                                <div class="link-container previous fl">    
                                    <?php next_posts_link(__('&larr; Proyectos anteriores','lmdgh')); ?>
                                </div>
                                <div class="link-container next fr">
                                    <?php previous_posts_link(__('Proyectos siguientes &rarr;','lmdgh')); ?>
                                </div>
                                
                                
                            </nav>
                        </div> <!-- /.posts-navigation -->
                    <?php
                        }
                    ?>
                                        
                </article>  <!-- /.page -->
            
            </div> <!-- end #main-content -->
            

        </section><!-- end #main-content-area -->
        
<?php get_footer(); ?>