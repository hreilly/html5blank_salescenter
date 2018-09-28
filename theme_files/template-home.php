<?php /* Template Name: Home Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1>Select a Community:</h1>
                
                <!-- DISPLAY COMMUNITY GRID -->
                
                <?php 

                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'community',
                    'orderby'       => 'title',
                    'order'         => 'ASC'
                );

                $the_query = new WP_Query( $args );

                ?>
                
                <?php if( $the_query->have_posts() ): ?>
                    <div class="grid-3-column">
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <!-- LOOPED "COMMUNITY" GRID LINKS -->
                        
                        <a class="grid-square" href="<?php the_permalink(); ?>">
                            <div class="grid-square-content">
                                <img src="<?php the_field('community_logo'); ?>" />
                            </div>
                        </a>

                        <?php endwhile; ?>
                        
                        <!-- SINGLE "ALL" GRID LINK -->
                        
                        <a class="grid-square" href="/all/">
                            <div class="grid-square-content">
                                <h2>All Maps &amp; Plans</h2>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>
                
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
