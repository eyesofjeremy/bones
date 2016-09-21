<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

      <div class="entry-content">
<?php 

$temp_query = $post; // store main query for retrieval

$args = array(
	'post_type' => 'pilates_class',
	'orderby'   => 'menu_order',
);

  $group_classes = new WP_Query( $args );
			  while ( $group_classes->have_posts() ) : $group_classes->the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'class' ); ?>

			<?php endwhile; // End of the loop. 
			
			$post = $temp_query; // retrieve main query
			?>
			</div>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
