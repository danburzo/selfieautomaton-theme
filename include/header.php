<header>
	<div class='masthead'>
		<h1><a href='<?php echo home_url() ?>'>Selfie Automaton</a></h1>
		<p>Romanian Pavilion <br> 15th International Architecture Exhibition <br> La Biennale di Venezia</p>
	</div>
	<nav>
		<?php 
			wp_nav_menu( 
				array( 'menu' => 'main-menu', 'container' => '', 'depth' => 1 ) 
			) 
		?>
		<?php the_language_switcher() ?>
	</nav>
	<img src='<?php bloginfo('template_directory');?>/img/logos/biennale.jpg' alt='Venice Biennale Logo' class='biennale-logo'/>
</header>

