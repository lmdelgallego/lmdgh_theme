<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>"/>
	<title><?php wp_title('|',true, 'right')?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        
        <!-- pingback -->
        <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" >
        
        <?php
        
        /*
         * ESTO HABILITA LAS RESPUESTA A COMENTARIOS SI ESTA EN LA PAGINA SINGLE Y ESTAN HABILITADOS
         *          
         */
        
        if( is_single() && comments_open() ){
            wp_enqueue_script('comment-reply');
        } 
        
        
        ?>
        
        <?php wp_head(); ?>

        <?php 
        	$options = get_theme_mod('lmdgh_custom_settings');
        	$logo = $options['logo'];
            
        ?>

        
	
</head>

<body>
	
	
	<header id="main-header">
			
		<div id="header-logo">
			
			<?php
				if ($logo) {
			?>
				<a href="<?php echo home_url(); ?>"><img scr="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>	
			<?php
				} else {
			?>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('description'); ?></a></h2>
			<?php		
				}
			?>

			
		
		</div><!-- /#header-logo -->
	
		<nav id="main-nav" class="cf">
			
			<?php wp_nav_menu(array(
                            'theme_location' => 'main-menu'
                        )); ?>
			
			<a href="#" id="open-search"><i class="icon-search"></i></a>
			
		</nav><!-- /#main-nav -->
		
		<div id="header-search">
			
			<?php get_search_form(); ?>
			
		</div><!-- /#header-search -->
		
	</header><!-- /#main-header -->
	
	
	<div id="global-container">
