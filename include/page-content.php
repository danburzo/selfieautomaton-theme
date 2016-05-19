<div class='main-section'>
	<?php if (get_post_meta(get_the_ID(), 'hero-image')) { ?>
	<figure class='hero'>
		<img src='<?php bloginfo('template_directory');?>/img/hero-images/<?php echo get_post_meta(get_the_ID(), 'hero-image', true)?>'/>
		<?php if (get_post_meta(get_the_ID(), 'hero-caption')) { ?>
		<figcaption><?php echo apply_filters('the_title', get_post_meta(get_the_ID(), 'hero-caption', true))?></figcaption>
		<?php } ?>
	</figure>
	<?php } ?>

	<?php the_post() ?>
	<article>
		<div class='article-info'>
			<?php if (get_post_meta(get_the_ID(), 'author')) { ?>
			<h2 class='article-author'><?php echo get_post_meta(get_the_ID(), 'author', true) ?></h2>
			<?php } ?>
			<h1><?php the_title('') ?></h1>
		</div>
		<div class='article-content'>
			<?php the_content() ?>
		</div>
	</article>
	<nav class='secondary-nav'>
		<?php
		$children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0&depth=1' );
		if ( !$post->post_parent && $children) : ?>
		    <ul>
		        <?php echo $children; ?>
		    </ul>
		<?php endif; ?>
	</nav>
</div>

