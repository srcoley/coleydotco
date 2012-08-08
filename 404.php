<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
			<article class="error404" role="main">
				<h1><a id="error404" href="#error404">Uh oh...</a></h1>
				<section class="entry">
					<p>The page could not be found.</p>
					<p>Use the search form below to find what you're looking for.</p>
					<?php get_search_form(); ?>
				</section>
			</article>
<?php get_footer(); ?>
