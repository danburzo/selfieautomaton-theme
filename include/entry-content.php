<div class='main-section'>
	<?php the_post() ?>

	<article>
		<div class='article-info'>
			<h1>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<div class='article-byline'><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></div>
		</div>
		<div class='article-content'>

			<?php the_content(); ?>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit, enim vitae maximus sodales, neque leo dictum est, id scelerisque dui ligula at purus. Vivamus mollis dolor ac sapien tincidunt mattis. Sed aliquam sit amet libero nec vestibulum. Fusce vitae sem tincidunt, luctus neque vitae, mollis quam. Cras auctor enim ex, id dapibus arcu condimentum nec. Suspendisse nec congue mi, faucibus euismod sapien. Cras tincidunt in leo sit amet vestibulum. Etiam erat metus, efficitur ut convallis in, eleifend a erat. Nulla facilisi. Mauris nec turpis tincidunt, lobortis dui feugiat, elementum erat. Cras ornare urna vitae tortor feugiat, a lobortis odio vestibulum. Curabitur rutrum sed nisi a hendrerit. Praesent at libero at justo ullamcorper mollis. Sed consequat sem at metus suscipit, quis porttitor eros tristique. Mauris lobortis sem sit amet mi ultricies maximus. Nam sit amet ligula pulvinar, aliquet dolor id, posuere augue.</p>

			<p>Suspendisse augue velit, ultricies sit amet neque efficitur, finibus molestie erat. Nam et risus eget mauris laoreet sodales. Duis convallis dignissim tincidunt. Suspendisse potenti. Vestibulum sit amet nisi eu sapien lacinia pretium. Ut imperdiet vitae leo non scelerisque. In tristique sapien a turpis pulvinar lacinia. Etiam ac turpis mauris. Morbi bibendum odio a suscipit pharetra. Mauris iaculis accumsan libero, et vehicula arcu. Sed vehicula mollis dui ac consequat.</p>

			<figure>
				<div class='image-placeholder'></div>
				<figcaption>Figure caption &copy; Photographer</figcaption>
			</figure>

			<p>Aliquam rutrum augue ut dui facilisis, et tempor tellus faucibus. Fusce tristique cursus suscipit. Nunc fringilla diam rutrum finibus ultricies. Nullam at tincidunt nisi, at aliquet elit. Praesent vel bibendum lectus. Quisque aliquam faucibus leo, vitae aliquet turpis egestas ac. Duis luctus vel nisi eleifend blandit. Mauris tempus vitae mi et mattis. Quisque ac cursus diam, ac rutrum nulla. Vivamus ut tortor et mauris vestibulum facilisis. Cras consequat lorem id libero sagittis congue. Vestibulum mauris neque, tincidunt sed accumsan ut, sodales at enim. Pellentesque interdum tincidunt finibus.</p>

			<p>Aliquam consequat erat nunc, quis vehicula neque auctor in. Donec nulla sem, sollicitudin ac rutrum ut, convallis eget velit. Proin placerat sem purus, congue laoreet est pulvinar et. Suspendisse consequat massa ut iaculis interdum. Etiam facilisis porta neque. Proin convallis lorem turpis, eget bibendum ante feugiat vel. Sed at orci odio. Aliquam semper metus elementum auctor luctus. Praesent luctus metus sed ligula aliquet molestie. Vestibulum vestibulum, nisi in euismod interdum, urna ligula interdum tellus, vel pulvinar ipsum felis id nunc. In et pharetra turpis. Ut sit amet ornare velit. Phasellus viverra, justo non malesuada condimentum, dolor ligula imperdiet lacus, in congue purus ante nec sapien. Morbi vel viverra risus.</p>

			<p>Nam eleifend sapien orci, nec gravida lacus maximus sit amet. Donec accumsan sollicitudin ornare. Vestibulum ipsum ligula, dignissim et lacus vel, dapibus pulvinar libero. In quis est sed sapien pharetra viverra ac sed dui. Pellentesque blandit lectus elementum, ultrices lectus quis, fermentum leo. Nullam a lacus vitae dolor fermentum condimentum sit amet suscipit erat. Suspendisse eros orci, congue ut vehicula vel, maximus in eros. Sed ac convallis ante. Praesent semper, nibh in suscipit tincidunt, diam magna varius ipsum, sed ultrices nunc justo in ligula. Vestibulum lacinia mollis posuere. Cras lobortis, nisi eget suscipit eleifend, risus ipsum congue leo, pretium finibus ligula dui a ante.</p>
		</div>
	</article>
</div>