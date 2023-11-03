<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ping-pong
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
		while ( have_posts() ) :
			the_post();
			?>
			<section class="single-bois-card">

				<?php the_post_thumbnail(); ?>
					<div class="single-bois-content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>

			</section>
			<div class="articles-nav">
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'saladbar' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'saladbar' ) . '</span> <span class="nav-title">%title</span>',
				)
			);?>
			</div>
			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
