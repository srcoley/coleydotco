<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


get_header(); ?>

		<h1><?php printf( __( 'Search Results for: %s', 'boilerplate' ), '' . get_search_query() . '' ); ?></h1>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<article>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="post-date"><?php the_date(); ?></p>
				<section>
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; else : ?>
			<article class="error404" role="main">
				<h1><a id="noResults" href="#noResults">No results</a></h1>
				<section class="entry">
					<p>Nothing matched your search query.</p>
					<p>Try another?</p>
					<?php get_search_form(); ?>
				</section>
			</article>
		<?php endif; ?>
<?php get_footer(); ?>
