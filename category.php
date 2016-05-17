<!doctype html>
<html>
	<?php get_template_part('include/head'); ?>
	<body>
		<?php get_template_part('include/header'); ?>
	
		<h1><?php single_cat_title(); ?></h1>

		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
		?>

		<div class='post'>
		 	<h2>
		 		<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
		 			<?php the_title(); ?>
		 		</a>
		 	</h2>
		 	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>

			<div class="entry">
		 		<?php the_content(); ?>
		 	</div>
		</div>

		<?php
			} // end while
		} // end if
		?>

		
		<?php get_template_part('include/footer'); ?>
	</body>
</html>
