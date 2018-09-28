<?php /* Template Name: Maps Overview */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1>Select a Community:</h1>
                
                <?php 

                $posts = get_field('select_available_floorplans');

                if( $posts ): ?>

                    <div class="grid-3-column">
                        <?php foreach( $posts as $post ): // variable must NOT be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <a class="grid-square" href="<?php the_permalink(); ?>">
                                <div class="grid-square-content">
                                    <img src="#" />
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                <?php endif; ?>
                
                <?php the_content(); ?>

				<br class="clear">

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

                <p>There doesn't seem to be anything here yet.</p>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
