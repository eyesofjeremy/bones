<?php

  $section_class = 'hero-button';
  $link_class = 'button';

  $link = get_sub_field('button_url');
    
  $url = $link['url'];
  $text = $link['title'];
  
  $image_id = get_sub_field('button_image');
  
  if( $image_id ) {
  
    $section_class .= ' has-image';
    $link_class = '';

    $img_src = wp_get_attachment_image_url( $image_id, 'small' );
    $img_srcset = wp_get_attachment_image_srcset( $image_id, 'large' );

    $image = '<img src="' . esc_url( $img_src ) . '"
    srcset="' . esc_attr( $img_srcset ) . '"
    alt="">';

  } else {
  
    $image = '';

  }
?>

<section class="<?php echo $section_class; ?>">
<a class="<?php echo $link_class; ?>" href="<?php echo $url; ?>">
  <?php echo $image; ?>
  <span><?php echo $text; ?></span>
</a>
</section>

