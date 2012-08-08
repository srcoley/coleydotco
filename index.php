<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				<!--<section class="entry">
					<?php the_content(); ?>
				</section>-->
			</article>
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
