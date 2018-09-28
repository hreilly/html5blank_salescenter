<?php /* Template Name: Single Floorplan */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

            <h1 class="sticky-title"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="inner-content">

					<h4 class="bordered-title">
						<div class="grid-4-column">
							<div class="grid-4-column-item">
								<?php 
								$sqft = get_field("square_footage") . '&nbsp;Sq. Ft.';
								echo $sqft; ?>
							</div>
							<div class="grid-4-column-item">
								<?php 
								$bdnum = get_field("number_of_bedrooms") . '&nbsp;BD';
								echo $bdnum; ?>
							</div>
							<div class="grid-4-column-item">
								<?php 
								$banum = get_field("number_of_bathrooms") . '&nbsp;BA';
								echo $banum; ?>
							</div>
							<div class="grid-4-column-item">
								<?php 
								$gnum = get_field("garage_spaces") . '&nbsp;Car Garage';
								echo $gnum; ?>
							</div>
						</div>
					</h4>

					<?php if ( get_field('rl_gallery_id') ) : ?>
						<?php
						$string = '[rl_gallery id="' . get_field("rl_gallery_id") . '"]';
						echo do_shortcode( $string ); ?>
					<?php else : ?>

						<h4 style="padding: 5vw 0 2vw 0;"><?php echo "No images available" ; ?></h4>

					<?php endif; ?>
					
					<h3 class="bordered-title">&mdash; Video &amp; Tour &mdash;</h3>
					
					<div class="grid-2-column">

						<div class="grid-2-column-item">
							
							<?php 

							$walkthroughurl = get_field('walkthrough_url');

							?>

							<?php if ( $walkthroughurl ): ?>
								<iframe src=<?php 
								$videourl = '"' . $walkthroughurl . '?transparent=0' . '"';
								echo $videourl; ?> frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="background-color: #000000;"></iframe>
							<?php else: ?>

								<div class="na-placeholder">Coming Soon</div>
							
							<?php endif; ?>

						</div>

						<div class="grid-2-column-item">

							<?php

							$matterporturl = get_field('matterport_url');

							?>

							<?php if ( $matterporturl ): ?>
								<iframe src="<?php echo $matterporturl ?>" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
							<?php else: ?>

								<div class="na-placeholder">Coming Soon</div>
							
							<?php endif; ?>

						</div>

					</div>

					<h3 class="bordered-title">&mdash; Interactive Floorplan &mdash;</h3>

					<div class="interactive-plan-wrapper">
						<iframe src="<?php the_field('bdx_url'); ?>" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" allow="vr"></iframe>
					</div>
					
					<hr>
					
					<h1>
						<a href="javascript:history.go(-1)">&#8592; Go Back</a>
					</h1>

                    <?php the_content(); ?>
                    
                    <br class="clear">

                    <p>&nbsp;</p>

                </div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
