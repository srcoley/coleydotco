<?php
/**
 * Template Name: Projects
 */

get_header(); ?>

		
		

		<?php query_posts(array("post_type" => "project", "orderby" => "date", "order" => "DESC")); ?>
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php
					$images = false;
					if(get_field('image_1')) {
						$images = true;
						$image_1 = wp_get_attachment_image_src(get_field('image_1'), 'full');
						$image_1_thumb = wp_get_attachment_image_src(get_field('image_1'), 'thumbnail');
					}
				?>
				<article>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php if($images) : ?>
						<section class="project_images">
							<a href="<?php echo $image_1[0]; ?>" class="zoom"><img src="<?php echo $image_1_thumb[0]; ?>" alt="" /></a>
						</section>
					<?php endif; ?>
					<section class="entry">
						<?php the_excerpt(); ?>
					</section>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<article>
				<h1><a href="<?php bloginfo('wpurl'); ?>/projects">No Projects</a></h1>
				<section class="entry">
					<p>I haven't added any projects to this site yet.</p>
					<p>To see what I've been working on, check out my <a href="http://github.com/srcoley">Github page</a>.</p>
				</section>
			</article>
		<?php endif; ?>

<?php get_footer(); ?>
