<?php

  $global_content = get_sub_field( 'global_content' );

  $global_id = $global_content[0]->ID;
  
  $temp_query = $post; // store main query for retrieval

  // http://wordpress.stackexchange.com/questions/20037/wp-query-by-just-the-id
  $args = array(
    'p'         => $global_id,
    'post_type' => 'any',
  );

  $group_classes = new WP_Query( $args );

  while ( $group_classes->have_posts() ) : $group_classes->the_post();
  
    get_template_part( 'template-parts/display', 'flexible-content' );

  endwhile; // End of the loop. 
	
	edit_post_link( 'Edit global content' );
			
  $post = $temp_query; // retrieve main query
?>