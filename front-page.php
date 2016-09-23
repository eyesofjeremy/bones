<?php
/**
 * Template Name: Home Page
 *
 * @package Embones
 */

get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
								  
								  <?php if( get_field('featured_cta_show') ) { ?>
								  <a class="link_large" href="<?php echo get_field('featured_cta_url'); ?>">
								  <?php } ?>
								  <?php bones_featured_image(); ?>

									<h1 class="page-title" itemprop="headline"><?php echo get_field('featured_headline'); ?></h1>

								  <?php if( get_field('featured_cta_show') ) { ?>
								  <span class="button"><?php echo get_field('featured_cta_text'); ?></span>
								  </a>
								  <?php } ?>
								</header> <?php // end article header ?>

								<section class="schedule entry-content cf">
								<a class="button" href="#">[ Schedule coming - discuss functionality ]</a>
								</section>

								<section class="promotions entry-content cf">
								
                <?php 
      
                  $page_id = get_the_ID();
        
                  // Look for promotions
                  $promotions_listed = get_post_meta( $page_id, 'promotions_listed', true );

                  if( ! empty( $promotions_listed ) ) {
        
                    // Set up the WP_Query object. Note: 'post__in' seems not to work unless we include post_type.
                    // Perhaps this is b/c it is a custom post type.          

                    $temp_query = $post; // first, store main query for retrieval

                    $args = array(
                      'post_type' => 'promotion',
                      'post__in' => $promotions_listed,
                      'orderby'   => 'post__in'
                    );
          
                    $projects = new WP_Query( $args );
                    
                    while ( $projects->have_posts() ) : $projects->the_post();
        
                      get_template_part( 'template-parts/content', 'promotion' );
          
                    endwhile; // End of the loop.
                    $post = $temp_query; // retrieve main query
                  } // end if
                ?>
      
								</section> <?php // end promotions ?>

								<figure class="inspiration quote entry-content cf">
								
								  <blockquote>
								    "If your spine is inflexibly stiff at 30,<br>
								    you are old.<br>
  								  If it is completely flexible at 60,<br>
  								  you are young."
								  </blockquote>
								  <figcaption>— Joseph Pilates</figcaption>
								  
								</figure>

							</article>

							<?php endwhile; endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
