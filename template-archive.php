<?php
/**
 * Template name: Archivos
 *
 * Plantilla de arvhicvos
 * 
 * Esta plantilla se utilizará para mostrar un archivo
 * de los post mas recientes y archivos por fecha
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
			
			<div id="page-head" class="global-padding">
				<h1><?php the_title(); ?></h1>
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
			
			<div id="main-content" class="full-width">
			
				<article id="post-<?php the_id(); ?>" <?php post_class('page'); ?>>
					
					<?php the_content(); ?>
						<?php wp_link_pages(
							array(
								'before'           => '<div class="posts-navigation">' . __( 'Paginas:', 'lmdgh' ),
								'after'            => '</div>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => __( 'Next page' ),
								'previouspagelink' => __( 'Previous page' ),
								'pagelink'         => '%',
								'echo'             => 1
							)

						); ?>		

					<div class="cols">
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e( 'Archivo por año', 'lmdgh' ); ?></h3>
								<ul><?php wp_get_archives(array('type' => 'yearly' ) ); ?></ul>
							</div>
							
							<div class="archive-block">
								<h3><?php _e( 'Archivo por mes', 'lmdgh' ); ?></h3>
								<ul><?php wp_get_archives(array('type' => 'monthly' ) ); ?></ul>
							</div>
							
						</div>
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e( 'Los últimos 10 posts', 'lmdgh' ); ?></h3>
								<ul>
									<?php 
										$recent_posts = wp_get_recent_posts( array('numberposts' => 10) ); 

										foreach ($recent_posts as $recent) {
									?>
										<li><a href="<?php echo get_permalink( $recent['ID'] ); ?>" title="<?php echo esc_attr($recent['post_title'] ); ?>" ><?php echo $recent['post_title'] ?></a></li>
									<?php		
										}
									?>
								</ul>

							</div>
							
							<div class="archive-block">
								<h3><?php _e( 'Archivo por autor', 'lmdgh' ); ?></h3>
								<ul>
									<?php wp_list_authors( ); ?>
								</ul>

							</div>
						</div>
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e( 'Archivo por día', 'lmdgh' ); ?></h3>
								<ul><?php wp_get_archives(array('type' => 'daily' ) ); ?></ul>
							</div>
							
							<div class="archive-block">
								<h3><?php _e( 'Archivo por categorías', 'lmdgh' ); ?></h3>
								<ul><?php wp_list_categories('title_li='); ?></ul>

							</div>
						</div>
					</div>


				
					<div class="share-post">
						
						<?php _e( 'Compartir: ', 'lmdgh'); ?>

						
						<!-- facebook -->
						<a class="share-facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="blank"><span class="facebook-logo"><i class="icon-facebook-sign"></i></span> Facebook</a>
						
						<!-- twitter -->
						<a class="share-twitter" href="http://twitter.com/home?status=<?php echo str_replace(' ', '%20', get_the_title()); ?>%20-%20<?php the_permalink(); ?>" target="blank"> <span class="twitter-logo"><i class="icon-twitter-sign"></i></span> Twitter</a>

						<!-- google plus -->
						<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank"><span class="googleplus-logo"><i class="icon-google-plus-sign"></i></span> Google+</a>
					</div><!-- end .share-post -->
				
				</article>	<!-- /.page -->

			<?php endwhile; endif; ?>
				
			<?php comments_template('',true); ?>		
			
			</div> <!-- end #main-content -->
			
		</section>


<?php get_footer(); ?>