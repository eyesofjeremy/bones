    <section class="promotion">
    <a class="link_large" href="<?php echo get_field('promo_url'); ?>">
    <img src="<?php echo get_field('promo_img'); ?>" alt="">
    <h3><?php echo get_field('promo_heading'); ?>
    </h3>
    
    <div class="content">
      <?php echo get_field('promo_text'); ?>
    </div>
    
    <span class="button"><?php echo get_field('promo_button_text'); ?></span>
    </a>
    <?php edit_post_link('Edit Promotion'); ?>
    </section>

