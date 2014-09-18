<?php get_header(); ?>
		<section id="main-content-area" class="global-padding cols">
			
			
			<div id="page-head" class="global-padding small-heading">
				<?php if( is_category() ) { ?>

					<h1><?php _e('Categoría','lmdgh') ?>: <?php single_cat_title(); ?></h1>
				
				<?php }elseif( is_tag() ){ ?>
				
					<h1><?php _e('Etiqueta','lmdgh') ?>: <?php single_tag_title(); ?></h1>
				
				<?php }elseif( is_search() ){ ?>
					
					<h1><?php _e('Resultados para','lmdgh') ?>: <?php the_search_query(); ?></h1>
				
				<?php }elseif( is_day() ){ ?>
					
					<h1><?php _e('Archivo','lmdgh') ?>: <?php the_time(get_option('date_format')); ?></h1>

				<?php }elseif( is_month() ){ ?>
					
					<h1><?php _e('Archivo','lmdgh') ?>: <?php the_time('F Y'); ?></h1>

				<?php }elseif( is_year() ){ ?>
					
					<h1><?php _e('Archivo','lmdgh') ?>: <?php the_time('Y'); ?></h1>		

				<?php }elseif( is_author() ){ ?>
					
					<h1><?php _e('Artículos por','lmdgh') ?>: <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->display_name; ?></h1>	

				<?php }elseif( is_404() ){ ?>
					
					<h1><?php _e('Página no encontrada','lmdgh') ?></h1>		

				<?php }elseif( is_home() ){ ?>
					
					<h1><?php _e('Blog','lmdgh') ?></h1>	
						
				<?php }else{ ?>
					
					<h1><?php wp_title(' ',true, 'right'); ?></h1>
				
				<?php }?>

				<?php
					$options = get_theme_mod('lmdg_custom_settings');
	        		$imagen_cabecera = $options['imagen-cabecera'];
	        	?>

	        	<?php if (!$imagen_cabecera) {
	        		$imagen_cabecera = IMAGES.'/default-heading-bg.jpg';
	        	}
	        	?>
				<div class="image-cover" style="background-image: url(<?php echo $imagen_cabecera; ?>);"></div>

			</div><!-- /#page-head -->
			
			<div id="main-content">

				<?php if( have_posts() ): while(have_posts()) : the_post(); ?>

					<article <?php post_class("article resume"); ?> id="post-<?php the_ID(); ?>">
						
						<div class="blog-entry-header">
							<small class="entry-date"><?php the_time( get_option('date_format')); ?></small>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</div><!-- /.blog-entry-header -->
						
						<?php

							if (!has_post_format('video') && !has_post_format('audio')) {
								# Si la entrada no es de formato video...
								if( has_post_thumbnail() ){
									the_post_thumbnail('blog-image');
								}
							}
							
						?>						

						<?php the_content( __('Ver más','lmdgh') ); ?> 

						<!--
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link"><?php _e('Ver más','lmdgh'); ?></a>
							
						-->					
					</article>	<!-- /.resume -->

				<?php endwhile; else: 
					get_template_part('content','noposts');

				endif; ?>

					
					
				<?php


					if(get_next_posts_link() || get_previous_posts_link()) {
				?>	
					
					<div class="posts-navigation cf">
						<nav>
							
							<div class="link-container previous fl">	
								<?php next_posts_link(__('&larr; Posts antiguos','lmdgh')); ?>
							</div>
							<div class="link-container next fr">
								<?php previous_posts_link(__('Posts recientes &rarr;','lmdgh')); ?>
							</div>
							
							
						</nav>
					</div> <!-- /.posts-navigation -->
				<?php
					}
					
				?>
					
			
			</div> <!-- /#main-content -->

			
			<?php get_sidebar(); ?>

			
		</section><!-- /#main-content-area -->
<?php get_footer(); ?>