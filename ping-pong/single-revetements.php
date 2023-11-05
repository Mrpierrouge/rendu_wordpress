<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ping-pong
 */
$data = get_fields();
get_header();
?>

	<main id="primary" class="site-main">

	<?php
		while ( have_posts() ) :
			the_post();
			?>
			<section class="single-revetements-card">

				<?php the_post_thumbnail(); ?>
					<div class="single-revetements-content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>

			</section>

			<section class="single-revetements-infos-supplementaires">
			<h2>Informations supplémentaires :</h2>

			<?php if(array_key_exists("rapidite", $data)) : ?>
				<p>Rapidité : <?=$data['rapidite']?> </p>
				<p>Controle : <?=$data['controle']?> </p>
				<p>Adhérence : <?=$data['adherence']?> </p>
			<?php endif; ?>	

			<?php if(array_key_exists("durete", $data)) : ?>
				<p>Longueur picots : <?=$data['longueur_picots']?> mm</p>
				<p>Diamètre picots : <?=$data['diametre_picots']?> mm</p>
				<p>Dureté : <?=$data['durete']?> °</p>
			<?php endif; ?>
			<h2>Épaisseurs disponibles :</h2>
			<ul>
				<?php foreach ($data['epaisseur'] as $option) : ?>
				<li><?= $option?> mm</li>
				<?php endforeach;?>
			</ul>
			
		</section>


			<div class="articles-nav">
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Précédent:', 'ping-pong' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Suivant:', 'ping-pong' ) . '</span> <span class="nav-title">%title</span>',
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
