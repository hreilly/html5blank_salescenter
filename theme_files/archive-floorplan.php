<?php /* Template Name: Floorplans Archive */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="inner-content">

                <h1>All Floorplans</h1>

                <!-- TRADITIONAL FLOORPLANS -->
                
                <?php 

                $args = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'traditional',
                            'compare'  => '='
                        )
                    )
                );

                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                    <h3 class="bordered-title">&mdash; Traditional &mdash;</h3>

                    <div class="grid-3-column">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <!-- VARIABLE FOR PLAN THUMBNAIL -->
                            
                            <?php 

                            $planthumb = get_field('floorplan_thumbnail');

                            ?>

                            <!-- LOOPED FLOORPLAN GRID -->

                            <a class="grid-square" href="<?php the_permalink(); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php the_title(); ?></h2>
                                </div>
                            </a>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>

                <!-- CANVAS FLOORPLANS -->

                <?php 

                $args = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query'     => array(
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'canvas',
                            'compare'  => '='
                        )
                    )
                );

                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                    <h3 class="bordered-title">&mdash; Canvas &mdash;</h3>

                    <div class="grid-3-column">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <!-- VARIABLE FOR PLAN THUMBNAIL -->
                            
                            <?php 

                            $planthumb = get_field('floorplan_thumbnail');

                            ?>

                            <!-- LOOPED FLOORPLAN GRID -->

                            <a class="grid-square" href="<?php the_permalink(); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php the_title(); ?></h2>
                                </div>
                            </a>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_query();	?>

                <!-- ESTATES FLOORPLANS -->

                <?php 

                $args = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'floorplan',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        'plan-type'    => array(
                            'key'      => 'floorplan_type',
                            'value'    => 'estates',
                            'compare'  => '='
                        )
                    )
                );

                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                    <h3 class="bordered-title">&mdash; Residences &mdash;</h3>

                    <div class="grid-3-column">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <!-- VARIABLE FOR PLAN THUMBNAIL -->
                            
                            <?php 

                            $planthumb = get_field('floorplan_thumbnail');

                            ?>

                            <!-- LOOPED FLOORPLAN GRID -->

                            <a class="grid-square" href="<?php the_permalink(); ?>">
                                <div class="grid-square-content grid-background" style="background-image: url(<?php if( $planthumb ): ?><?php echo $planthumb['url']; ?><?php else: ?>/wp-content/uploads/2018/09/gv_plan_icon.png<?php endif; ?>);">
                                    <h2 class="light"><?php the_title(); ?></h2>
                                </div>
                            </a>

                        <?php endwhile; ?>
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
