<?php /* Template Name: All Split Screen Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="split-screen">
					<a class="split-screen-item split-screen-background" href="/floorplan/" style="background-image: url(/wp-content/uploads/2018/09/all_plans_background.png);">
						<div class="split-screen-content">
							<h2>All Plans</h2>
						</div>
					</a>
					<a class="split-screen-item split-screen-background" href="/tract/" style="background-image: url(/wp-content/uploads/2018/09/all_communities-1200x1200.png);">
						<div class="split-screen-content">
							<h2>All Maps</h2>
						</div>
					</a>
				</div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
