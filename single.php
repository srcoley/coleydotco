<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


get_header(); ?>

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<article>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="post-date"><?php the_date(); ?></p>
				<section class="entry">
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
