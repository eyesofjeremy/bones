    <section class="entry-content preview">

    <h1 class="page-title" itemprop="headline">Preview: <?php the_title(); ?></h1>

    <div class="schedule">
       <?php         
        $widget_id = get_the_ID();
        $show_widget = 'show_' . $widget_id;
      ?>
     
      <input type="checkbox" checked class="toggle" name="<?php echo $show_widget; ?>" id="<?php echo $show_widget; ?>">
      
      <div class="hc_sched">
        <?php echo get_post_meta( $widget_id, 'csp_hc_widget_code', true); ?>
      </div>
      
    </div>
          
    </section>