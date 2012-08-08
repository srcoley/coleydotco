<?php

get_header(); ?>

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php
				$images = false;
				if(get_field('image_1')) {
					$images = true;
					$image_1 = wp_get_attachment_image_src(get_field('image_1'), 'fullsize');
					$image_1_thumb = wp_get_attachment_image_src(get_field('image_1'), 'thumbnail');
					$image_2 = wp_get_attachment_image_src(get_field('image_2'), 'fullsize');
					$image_2_thumb = wp_get_attachment_image_src(get_field('image_2'), 'thumbnail');
					$image_3 = wp_get_attachment_image_src(get_field('image_3'), 'fullsize');
					$image_3_thumb = wp_get_attachment_image_src(get_field('image_3'), 'thumbnail');
				}
			?>
			<article>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php if($images) : ?>
					<section class="project_images">
						<a href="<?php echo $image_1[0]; ?>" class="zoom"><img src="<?php echo $image_1_thumb[0]; ?>" alt="" /></a>
						<a href="<?php echo $image_2[0]; ?>" class="zoom"><img src="<?php echo $image_2_thumb[0]; ?>" alt="" /></a>
						<a href="<?php echo $image_3[0]; ?>" class="zoom"><img src="<?php echo $image_3_thumb[0]; ?>" alt="" /></a>
					</section>
				<?php endif; ?>
				<section class="entry">
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
