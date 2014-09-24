<?php
/**
 * 
 * Detalle de articulo
 * 
 * Esta plantilla se utilizará para mostrar el detalle
 * de los articulos, así como también el detalle de cualquier
 * custom post type que no posea su propia plantilla.
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


			<div id="page-head" class="global-padding post-head cf">
			
				<div class="post-head-content">
					
					<h1><?php the_title(); ?></h1>
					
					<div id="blog-post-meta">
						
						<div class="author">
							<i class="icon-user"></i><?php _e( 'Por', 'lmdgh' ); ?> <a href=""><?php the_author_posts_link(); ?></a>
						</div>
						
						<div class="date">
							<i class="icon-calendar"></i> <?php the_time(get_option('date_format' )); ?>
						</div>
						
						<div class="categories">
							<i class="icon-list"></i> <a href=""><?php the_category(', '); ?></a>
						</div>
						
						<?php if (comments_open() || have_comments() ) { ?>
						<div class="comments-counter">
							<i class="icon-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number(__('Se el primero en comentar.','lmgh'), __('1 comentario disponible','lmgh'),__('% comentarios','lmdgh')); ?></a>
						</div>

						<?php } ?>
						
						<?php if (has_tag()) { ?>
						<div class="tags">
							<i class="icon-tag"></i> <?php the_tags( '', ', ', '' ); ?>
						</div>
						<?php } ?>

					</div><!-- /.blog-post-meta -->
					
				</div><!-- /.post-head-content -->

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
			
				<article id="post-<?php the_id(); ?>" <?php post_class('article'); ?>>
					
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
				
				<?php if(get_next_post() || get_previous_post()) { ?>	
				<div class="posts-navigation">
						<?php next_post_link('<strong class="prev">' . __('Posts anterior:','lmdgh') . '</strong> %link <br />', '%title'); ?>
						<?php previous_post_link('<strong class="next">' . __('Posts siguiente:','lmdgh') . '</strong> %link <br />', '%title'); ?>
				</div>
				<?php } ?>

			<?php comments_template('',true); ?>		
			
			</div> <!-- end #main-content -->
			<?php get_sidebar(); ?>
		</section>


<?php get_footer(); ?>