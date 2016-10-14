
<section class="team-member entry-content">
<h3><?php echo get_sub_field('team_member_name'); ?>
<?php echo wp_get_attachment_image( get_sub_field('team_member_portrait') ); ?>
</h3>

<div class="content">
<h4><?php echo get_sub_field('team_member_title'); ?></h4>

<?php echo get_sub_field('team_member_bio');  ?>

</div>
          
</section>

