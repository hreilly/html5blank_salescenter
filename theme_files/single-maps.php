<?php /* Template Name: Maps Overview */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="inner-content">
                
				<?php 

                $posts = get_field('choose_parent');

                if( $posts ): ?>

                    <?php foreach( $posts as $post): ?>

                    <?php setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?>">
                            <img class="community-page-logo" src="<?php the_field('community_header_logo'); ?>" />
                        </a>

                    <?php endforeach; ?>

                    <?php wp_reset_postdata(); ?>
                
                <?php endif; ?>
                
                <?php 

                $tracts = get_posts(array(
                    'posts_per_page' => -1,
                    'post_type'      => 'tract',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        array(
                            'key'      => 'located_at', 
                            'value'    => '"' . get_the_ID() . '"',
                            'compare'  => 'LIKE'
                        )
                    )
                ));

                ?>

                <?php if( $tracts ): ?>

                    <h3 class="bordered-title">&mdash; Select a Tract &mdash;</h3>

                    <div class="grid-3-column">
                        <?php foreach( $tracts as $tract ): ?>
                            
                            <?php 

                            $mapthumb = get_field('map_thumbnail', $tract->ID);

                            ?>

                            <a class="grid-square" href="<?php echo get_permalink( $tract->ID ); ?>">
								<div class="grid-square-content grid-background" style="background-image: url(<?php if( $mapthumb ): ?><?php echo $mapthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_map_icon-v3.png<?php endif; ?>);">
									<h2 class="light"><?php echo get_the_title( $tract->ID ); ?></h2>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>
                
                <?php the_content(); ?>

				<br class="clear">

				<p>&nbsp;</p>

				</div>

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
