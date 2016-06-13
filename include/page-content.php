<div class='main-section'>
	<?php 
		$hero_img = get_post_meta(get_the_ID(), 'hero-image', true);
		if ($hero_img) { 
			if (parse_url($hero_img, PHP_URL_SCHEME) === null) {
				$hero_img = get_bloginfo('template_directory', 'display') . '/img/hero-images/' . $hero_img;
			}
	?>
	<figure class='hero'>
		<img src='<?php echo $hero_img ?>'/>
		<?php if (get_post_meta(get_the_ID(), 'hero-caption')) { ?>
		<figcaption><?php echo apply_filters('the_title', get_post_meta(get_the_ID(), 'hero-caption', true))?></figcaption>
		<?php } ?>
	</figure>
	<?php } ?>

	<?php the_post() ?>
		<?php
		$children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0&depth=1' );
		if ( !$post->post_parent && $children) : ?>

			<nav class='secondary-nav'>
		    <ul>
		        <?php echo $children; ?>
		    </ul>
			</nav>
		<?php endif; ?>
	<article class="<?php if (get_post_meta(get_the_ID(), 'article-layout')) { echo 'layout-' . get_post_meta(get_the_ID(), 'article-layout', true); } ?>">
		<div class='article-info'>
			<nav class='article-breadcrumbs'><?php the_breadcrumb() ?></nav>
			<?php if (get_post_meta(get_the_ID(), 'author')) { ?>
			<h2 class='article-author'><?php echo apply_filters('the_title', get_post_meta(get_the_ID(), 'author', true)) ?></h2>
			<?php } ?>
			<h1><?php the_title('') ?></h1>
		</div>
		<div class='article-content'>
			<?php the_content() ?>
		</div>
	</article>
</div>

