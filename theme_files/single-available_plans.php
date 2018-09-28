<?php /* Template Name: Available Plans Overview */ get_header(); ?>

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

                <!-- TRADITIONAL FLOORPLANS -->
                
                <?php 

                $locations = get_posts(array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        'relation'     => 'AND',
                        array(
                            'key'      => 'available_at', 
                            'value'    => '"' . get_the_ID() . '"',
                            'compare'  => 'LIKE'
                        ),
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'traditional',
                            'compare'  => '='
                        )
                    )
                ));

                ?>

                <?php if( $locations ): ?>

                    <h3 class="bordered-title">&mdash; Traditional &mdash;</h3>

                    <div class="grid-3-column">
                        <?php foreach( $locations as $location ): ?>
                            
                            <?php 

                            $planthumb = get_field('floorplan_thumbnail', $location->ID);

                            ?>

                            <a class="grid-square" href="<?php echo get_permalink( $location->ID ); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php echo get_the_title( $location->ID ); ?></h2>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>

                <!-- CANVAS FLOORPLANS -->

                <?php 

                $locations = get_posts(array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query'     => array(
                        'relation'     => 'AND',
                        array(
                            'key'      => 'available_at', 
                            'value'    => '"' . get_the_ID() . '"',
                            'compare'  => 'LIKE'
                        ),
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'canvas',
                            'compare'  => '='
                        )
                    )
                ));

                ?>

                <?php if( $locations ): ?>

                    <h3 class="bordered-title">&mdash; Canvas &mdash;</h3>

                    <div class="grid-3-column">
                        <?php foreach( $locations as $location ): ?>

                            <?php 

                            $planthumb = get_field('floorplan_thumbnail', $location->ID);

                            ?>

                            <a class="grid-square" href="<?php echo get_permalink( $location->ID ); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php echo get_the_title( $location->ID ); ?></h2>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>

                <!-- ESTATES FLOORPLANS -->

                <?php 

                $locations = get_posts(array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        'relation'     => 'AND',
                        array(
                            'key'      => 'available_at', 
                            'value'    => '"' . get_the_ID() . '"',
                            'compare'  => 'LIKE'
                        ),
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'estates',
                            'compare'  => '='
                        )
                    )
                ));

                ?>

                <?php if( $locations ): ?>

                    <h3 class="bordered-title">&mdash; Residences &mdash;</h3>

                    <div class="grid-3-column">
                        <?php foreach( $locations as $location ): ?>

                            <?php 

                            $planthumb = get_field('floorplan_thumbnail', $location->ID);

                            ?>

                            <a class="grid-square" href="<?php echo get_permalink( $location->ID ); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php echo get_the_title( $location->ID ); ?></h2>
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
