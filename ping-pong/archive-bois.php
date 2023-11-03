<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ping-pong
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>Les bois :</h1>
				<p>Trouvez et commandez votre bois idéal</p>
			</header><!-- .page-header -->

			<section class="bois-container">
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();?>

				<article class="bois-card">
				<?php the_post_thumbnail(); ?>
					<div class="bois-card_content">
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
						
					</div>
					<a href="<?php the_permalink(); ?>" class="bois-card-more-link">En savoir plus</a>
				</article>

			<?php endwhile; ?>
			</section>


			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
