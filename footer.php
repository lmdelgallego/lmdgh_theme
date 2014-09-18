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
				<p class="fl">&copy; 2014 - AMKfolio - Diseñado por <a href="">@FranciscoAMK</a></p>
				
				<p class="fr footer-social">
						<a href=""><i class="icon-stackexchange"></i></a>
						<a href=""><i class="icon-linkedin"></i></a>
						<a href=""><i class="icon-github"></i></a>
						<a href=""><i class="icon-tumblr-sign"></i></a>
						<a href=""><i class="icon-pinterest"></i></a>
						<a href=""><i class="icon-dribbble"></i></a>
						<a href=""><i class="icon-flickr"></i></a>
						<a href=""><i class="icon-youtube"></i></a>
						<a href=""><i class="icon-instagram"></i></a>
						<a href=""><i class="icon-google-plus-sign"></i></a>
						<a href=""><i class="icon-facebook-sign"></i></a>
						<a href=""><i class="icon-twitter"></i></a>
						<a href=""><i class="icon-rss"></i></a>
				</p>
				
			</div><!-- /#footer-bottom-area -->
			
		</footer><!-- /#main-footer -->
		
	</div><!-- /#global-container -->

	<?php wp_footer(); ?>
</body>
</html>