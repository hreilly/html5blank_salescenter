<?php /* Template Name: Single Community */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url(<?php echo the_field('background_image'); ?>);">
                
                <img class="community-page-logo" src="<?php the_field('community_header_logo'); ?>" />
                
                    <div class="grid-3-column">
                        <a class="grid-square" href="<?php echo home_url(); ?>/maps/<?php echo sanitize_title_with_dashes(get_the_title()); ?>/">
                            <div class="grid-square-content">
                                <h2>Community Maps</h2>
                            </div>
                        </a>
                        <a class="grid-square" href="<?php echo home_url(); ?>/available_plans/<?php echo sanitize_title_with_dashes(get_the_title()); ?>/">
                            <div class="grid-square-content">
                                <h2>Floorplans</h2>
                            </div>
                        </a>
                        <a class="grid-square" href="<?php echo home_url(); ?>/slideshow/<?php echo sanitize_title_with_dashes(get_the_title()); ?>/">
                            <div class="grid-square-content grid-background">
                                <h2>Play Slideshow</h2>
                            </div>
                        </a>
                    </div>
                
                <?php the_content(); ?>

				<br class="clear">

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
