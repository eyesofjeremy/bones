<?php
/*
 * Tab HTML Pattern
 *
 * Use this pattern to create tabbed content.
 *
 * To use, set up the following inside a loop on the template page where you'll
 * use this pattern.
 * The container div should have the class .tabbed
 * Note: The first item is static; the rest should come from the loop's data

      $tab = array(
        'group'   => 'levels', // choose a name to describe your group of tabs
        'id'      => $level->slug, // Unique ID or slug, must start w/ a letter for CSS
        'label'   => $level->name, // what will the tab's label say?
        'content' => $level->description, // What is the content of the tab?
      );

*/
  global $tab, $show_first_tab;
  
  $checked = ( $show_first_tab ) ? 'checked' : '';
?>

<input type="radio" name="<?php echo $tab['group']; ?>" id="<?php echo $tab['id']; ?>" class="toggle" <?php echo $checked; ?>>
<label for= "<?php echo $tab['id']; ?>"><?php echo $tab['label']; ?></label>
<div class="tab-content"><?php echo $tab['content']; ?></div>

<?php
  $show_first_tab = false; // the rest of the tabs will not be checked
?>