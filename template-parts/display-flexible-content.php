<?php

  // found this handy:
  // https://selfteach.me/acf-flexible-content-modular-wordpress-themes/
  // consider removing dependency on ACF here:
  // http://www.billerickson.net/advanced-custom-fields-frontend-dependency/
	// are there any rows within within our flexible content?
	if( have_rows('flexible_content') ): 

		// loop through all the rows of flexible content
		while ( have_rows('flexible_content') ) : the_row();

		switch( get_row_layout() ) {
		
      // LIST SPECIAL PROMOS GOING ON
      case ( 'list_promotions' ):
        get_template_part('template-parts/archive', 'promotions');
        break;

      // TESTIMONIAL
      case ( 'testimonial' ):
        get_template_part('template-parts/content', 'testimonial');
        break;

      // IF WE DON'T HAVE A TEMPLATE LISTED HERE, SHOW ADMIN WHAT WE HAVE
      default:
        if( is_user_logged_in() ) { ?>
          <div class="debug">
          <h3><?php echo get_row_layout(); ?>: needs template</h3>
          <?php the_meta(); # let's debug this. ?>
        <?php
        }
        break;
      
      } // end switch

		endwhile; // close the loop of flexible content
	endif; // close flexible content conditional
