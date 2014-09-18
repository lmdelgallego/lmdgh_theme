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
				
					<div class="share-post">
						Compartir:
						<!-- facebook -->
						<a class="share-facebook" href="http://www.facebook.com/share.php?u=http://franciscoamk.com" target="blank"><span class="facebook-logo"><i class="icon-facebook-sign"></i></span> Facebook</a>
						
						<!-- twitter -->
						<a class="share-twitter" href="http://twitter.com/home?status=http://franciscoamk.com" target="blank"> <span class="twitter-logo"><i class="icon-twitter-sign"></i></span> Twitter</a>

						<!-- google plus -->
						<a class="share-google" href="https://plus.google.com/share?url=http://franciscoamk.com" target="blank"><span class="googleplus-logo"><i class="icon-google-plus-sign"></i></span> Google+</a>
					</div><!-- end .share-post -->
				
				</article>	<!-- /.page -->



			<?php endwhile; endif; ?>
				
				
				<div class="posts-navigation">
					<strong class="prev">Post anterior:</strong> <a href="">Nombre del post</a> <br />
					<strong class="next">Post siguiente:</strong> <a href="">Nombre del post</a> <br />
				</div>
				
				
				<div id="comments">
	
				
					<a href="#respond" class="article-add-comment"></a>
					
					<h3 class="comments-title">Un comentario:</h3>
			
					<ol id="comments-list">
						<li class="comment even thread-even depth-1" id="comment-1">
							<div id="div-comment-1" class="comment-body">
								<div class="comment-author vcard">
									<img alt="" src="http://placekitten.com/40/40" class="avatar">
									<cite class="fn">
										<a href="" class="url">Mr WordPress</a>
									</cite>
									<span class="says">dijo:</span>
								</div>
								
								<div class="comment-meta commentmetadata">
									<a href="">June 3, 2013 at 2:40 am</a>
								</div>
								
								<p>Hi, this is a comment.<br>
								To delete a comment, just log in and view the post's comments. There you will have the option to edit or delete them.</p>
		
								<div class="reply">
									<a class="comment-reply-link" href="">Responder</a>
								</div>
							</div>
						</li><!-- #comment-## -->
					</ol><!-- /#comments-list -->
			
						
					<div id="respond" class="comment-respond">
						<h3 id="reply-title" class="comment-reply-title">Comparte tu opinión</h3>
						
						<form action="" method="post" id="commentform" class="comment-form">
							<p class="comment-form-author">
								<label for="author">Name <span class="required">*</span></label>
								<input id="author" name="author" type="text">
							</p>
							
							<p class="comment-form-email">
								<label for="email">Email <span class="required">*</span></label>
								<input id="email" name="email" type="text">
							</p>
							
							<p class="comment-form-url">
								<label for="url">Website</label>
								<input id="url" name="url" type="text">
							</p>
							
							<p class="comment-form-comment">
								<label for="comment">Comment</label>
								<textarea id="comment" name="comment" rows="8"></textarea>
							</p>
							
							<p class="form-allowed-tags">
								You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code>
							</p>
							
							<p class="form-submit">
								<input name="submit" type="submit" id="submit" value="Post Comment">
							</p>
						
						</form>
					</div><!-- #respond -->
					
				</div><!-- /#comments -->
			
			</div> <!-- end #main-content -->
			<?php get_sidebar(); ?>
		</section>


<?php get_footer(); ?>