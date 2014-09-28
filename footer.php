<?php 


$option = get_theme_mod('lmdgh_custom_settings');

$twitter = $option['twitter'];
$facebook = $option['facebook'];
$google = $option['google'];
$instagram = $option['instagram'];

$copyright_text = $option['copyright_text'];

 ?>

<footer id="main-footer">
    
					
			<section id="footer-widgets-area" class="global-padding cols">
				
				
				<div class="col3">
					 <?php
				        if( is_active_sidebar('footer-sidebar-izq')){
				                dynamic_sidebar('footer-sidebar-izq');
				        } 
				      ?>
				</div><!-- /.col3 -->
				
				<div class="col3">
					
					<?php
				        if( is_active_sidebar('footer-sidebar-center')){
				                dynamic_sidebar('footer-sidebar-center');
				        } 
				      ?>
					
				</div><!-- /.col3 -->
				
				<div class="col3">
					
					<?php
				        if( is_active_sidebar('footer-sidebar-der')){
				                dynamic_sidebar('footer-sidebar-der');
				        } 
				      ?>
					
				</div><!-- /.col3 -->
				
				
				
			</section><!-- /#footer-widgets-area -->
			
			<div id="footer-bottom-area" class="global-padding cf">
				<p class="fl">
				<?php 
					echo $copyright_text; 
				 ?>
				</p>
				
				<p class="fr footer-social">
						<?php if ($instagram) { ?>
							<a href="<?php echo esc_url($instagram); ?>" title="Instagram"><i class="icon-instagram"></i></a>	
						<?php } ?>
						<?php if ($google) { ?>
							<a href="<?php echo esc_url($google); ?>" title="Google Plus"><i class="icon-google-plus-sign"></i></a>	
						<?php } ?>
						<?php if ($facebook) { ?>
							<a href="<?php echo esc_url($facebook); ?>" title="Facebook"><i class="icon-facebook-sign"></i></a>	
						<?php } ?>
						<?php if ($twitter) { ?>
							<a href="<?php echo esc_url($twitter); ?>" title="Twitter"><i class="icon-twitter"></i></a>	
						<?php } ?>
				</p>
				
			</div><!-- /#footer-bottom-area -->
			
		</footer><!-- /#main-footer -->
		
	</div><!-- /#global-container -->

	<?php wp_footer(); ?>

	<?php if (is_page_template('template-portafolio.php' )) { ?>
	
		<script>

		jQuery('document').ready(function ($) {

			$('.portfolio-filter a').click(function(e){	
				e.preventDefault();
				var filterLink = $(this).attr('href');

				$(this).
					parent()
					.addClass('current-cat')
					.siblings()
					.removeClass('current-cat');

				$('.portfolio-filter .loading').animate({opacity: 1},200);	
				$('#portfolio-list').animate({opacity: 0.3},200);	

				$('#portfolio-list').load(filterLink + ' #portfolio-list', function(){
					$('.portfolio-filter .loading').animate({opacity: 0},200);	
					$('#portfolio-list').animate({opacity: 1},200);	
				});

			});
		});

		</script>	
	
	<?php } ?>
</body>
</html>