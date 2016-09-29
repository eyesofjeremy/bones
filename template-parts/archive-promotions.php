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
  ?>

<section class="promotions list-<?php echo $projects->post_count; ?> entry-content cf">

<?php

    while ( $projects->have_posts() ) : $projects->the_post();

      get_template_part( 'template-parts/content', 'promotion' );

    endwhile; // End of the loop.
    $post = $temp_query; // retrieve main query
?>

</section>

<?php } // end if promotions listed ?>
