<div class='main-section'>
	<!-- <figure class='hero'>
		<div class='image-placeholder'></div>
		<figcaption>Ana Botezatu</figcaption>
	</figure> -->

	<?php the_post() ?>
	<article>
		<div class='article-info'>
			<h1><?php the_title('') ?></h1>
		</div>
		<div class='article-content'>
			<?php the_content() ?>
		</div>
	</article>
</div>