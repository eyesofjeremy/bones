<?php
/*
 Template Name: Landing Page
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

								  <figure class="featured">
								  <?php the_post_thumbnail('featured-xxl', ['class' => 'featured-image', 'title' => 'Feature image']); ?>
                  </figure>

									<h1 class="page-title"><?php the_title(); ?></h1>
								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section>

								<?php
								  // Show additional content if we have it.
								  // Call custom field directly from $post
								  // More goodness if needed:
					        // https://developer.wordpress.org/reference/functions/get_post_meta/#comment-1894
								  $more_content = $post->page_more_content;
								  
								  if( ! empty( $more_content ) ):
                ?>
								<section class="entry-content cf more-content" itemprop="articleBody">
									<?php
										echo $more_content;
									?>
								</section>
								<?php endif; ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-landing.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php					
              // Show blog posts if set for this landing page, and they exist.
              
              // First set post so we can return
              $temp = $post;
            
              // If we have an array of categories, convert into comma-separated string
              $cat = $post->page_blog_category;
              $category = ( is_array( $cat ) ) ? implode( ',', $cat ) : $cat;
              
              $args = array(
                'posts_per_page'   => -1,
                'category'         => $category
              );
            
              $posts = new WP_Query( $args );
            
              if ($posts->have_posts()):
						?>
						
				<div id="sidebar-posts" class="sidebar archives cf" role="complementary">

						<?php while ($posts->have_posts()) : $posts->the_post(); ?>

        				<?php get_template_part( 'template-parts/archive', 'post' ); ?>

            <?php endwhile; ?>

				</div>
            <?php
              endif; # posts loop 
            
              // reset post
              $post = $temp;
            ?>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
