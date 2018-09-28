<?php /* Template Name: Single Slideshow */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="hide-mouse-wrapper">
					
					<div class="fullscreen-container">
					
						<?php 
						$string = '[masterslider alias="' . get_field("ms_gallery_id") . '"]';
						echo do_shortcode( $string ); ?>
					
					</div>
				
				</div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>