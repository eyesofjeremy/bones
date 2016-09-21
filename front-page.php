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

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

							</article>

							<?php endwhile; endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
