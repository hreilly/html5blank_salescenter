<?php /* Template Name: Single Tract */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="inner-content">

				<!-- LOGO IF AVAILABLE, ELSE NAME -->
				
				<?php if ( get_field('tract_logo') ) : ?>

					<img class="tract-page-logo" src="<?php the_field('tract_logo'); ?>" />

				<?php else : ?>

					<h1><?php the_field('tract_name'); ?></h1>
					
				<?php endif; ?>

				<h3 class="bordered-title">&mdash; <?php the_field('tract_number'); ?> Maps &mdash;</h3>
				
				<!-- MAP SVG IF AVAILABLE, ELSEIF JPG, ELSE ECHO STRING -->
				
				<?php if ( get_field('map_svg') ) : ?>
					
					<div class="svg-map">
						<?php the_field('map_svg'); ?>
						<p class="disclaimer">All content and availability subject to change. For internal use only.</p>
					</div>

				<?php elseif (get_field('map_image') ) : ?>

					<?php the_field('map_image'); ?>

				<?php else : ?>

					<h4 style="padding: 5vw 0 2vw 0;"><?php echo "No image available." ; ?></h4>

				<?php endif; ?>

				<?php if ( get_field('interactive_map_link') ) : ?>
					<div class="button-wrapper">
						<a class="button-1" href="<?php the_field('interactive_map_link'); ?>">Interactive Map &nbsp;&#8594;</a>
					</div>
					<hr>
				<?php endif; ?>
				
				<!-- AVAILABLE FLOORPLANS -->

				<h3 class="bordered-title">&mdash; Available Plans &mdash;</h3>
                
                <?php 

                $posts = get_field('available_floorplans');

				if( $posts ): ?>

				<div class="grid-3-column">

                    <?php foreach( $posts as $post): ?>

                    <?php setup_postdata($post); ?>
                        <?php 

						$planthumb = get_field('floorplan_thumbnail');

						?>

						<a class="grid-square" href="<?php the_permalink(); ?>">
							<div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
								<h2 class="light"><?php the_title(); ?></h2>
							</div>
						</a>

                    <?php endforeach; ?>

					<?php wp_reset_postdata(); ?>
					
				</div>

				<?php else : ?>

					<h4 style="padding: 5vw;"><?php echo "There are no plans currently available." ; ?></h4>
                
                <?php endif; ?>
                
				<p>&nbsp;</p>
				
				<hr>
					
				<h1>
					<a href="javascript:history.go(-1)">&#8592; Go Back</a>
				</h1>

				<br class="clear">

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
