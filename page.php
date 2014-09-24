<?php
/**
 * 
 * Plantilla de paginas estándar
 * 
 * Esta plantilla se utilizará para mostrar el detalle
 * de las paginas
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
			
			<div id="main-content" class="">
			
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
			<?php get_sidebar(); ?>
		</section>


<?php get_footer(); ?>