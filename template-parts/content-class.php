    <section class="pilates-class">
    <h3><?php the_title(); ?> <?php edit_post_link('Edit Class'); ?></h3>
    
    <?php the_post_thumbnail( 'small' ); ?>
    <h4><?php echo get_field('subhead'); ?></h4>

      <?php the_content(); ?>

    <div class="pricing"><?php echo get_field('class_pricing'); ?></div>

    <?php if( get_field('tips') ) { ?>
      <div class="tips">
        <h4>Tips</h4>
        <?php echo get_field('tips'); ?>
      </div>
    <?php } # endif ?>
    
    <div class="schedule">
       <?php 
        $widget = get_field('class_schedule'); 
        $widget_id = $widget[0]->ID;
        $show_widget = 'show_' . $widget_id;
      ?>
     
      <input type="checkbox" class="toggle" name="<?php echo $show_widget; ?>" id="<?php echo $show_widget; ?>">
      <label for="<?php echo $show_widget; ?>" class="button"><span>See Class Schedule</span></label>
      
      <div class="hc_sched">
        <?php echo get_post_meta( $widget_id, 'csp_hc_widget_code', true); ?>
      </div>

    </div>
          
    </section>

