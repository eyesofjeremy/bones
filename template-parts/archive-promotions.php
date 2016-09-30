<?php 

  // Look for promotions
  $posts = get_sub_field( 'promotions_listed' );

  if( ! empty( $posts ) ) {

  ?>

<section class="promotions list-<?php echo $projects->post_count; ?> entry-content cf">

<?php if( $heading = get_sub_field('promo_heading') ) { ?>

  <h2><?php echo $heading; ?></h2>

<?php } # endif ?>

<div class="listing">
<?php
    foreach( $posts as $post ) {

      setup_postdata($post);
      get_template_part( 'template-parts/content', 'promotion' );

    } # end foreach
    
    wp_reset_postdata();
?>
</div>

</section>

<?php } // end if promotions listed ?>
