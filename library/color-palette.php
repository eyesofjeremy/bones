<?php
/*
  This file helps you set up colors for the Gutenberg editor - 
  just edit palette.scss to your liking.
*/

new embones_color_palette();

class embones_color_palette {

  // This is the location of the file we will parse
  // Change if you wanna
  private $css_colors_path = "/library/css/palette.css";
    

  public function __construct() {

    // Adding theme support here, and we are good to go.
    $color_palette = $this->color_palette(); // get our array of colors
    add_theme_support( 'editor-color-palette', $color_palette );

    // Disables custom colors in block color palette.
    // Comment out this line if you want the custom picker to be available.
    add_theme_support( 'disable-custom-colors' );

    add_action( 'wp_enqueue_scripts', array( $this, 'add_embones_colors' ), 999 );
  }


  public function color_palette() {

    $path = $this->css_colors_path;
    
    $filename = get_template_directory() . $path;
    $file = file_get_contents( $filename );
    
    // Some string processing is in order...
    
    // remove 'background' declarations - this will make duplicates when we explode
    $file = preg_replace( '/-?(background)?-color/', '', $file );

    // remove '.has-' prefix
    $file = str_replace( array( '.has-', ' ', 'color:', ':', ';', PHP_EOL, ' ' ), '', $file );

    $css_statements = array_unique( explode( '}', $file ) );

    $color_palette = array();
    foreach( $css_statements as $statement ) {
      if( strlen( $statement ) > 0 ) {
        $color_palette[] = $this->parse_css( $statement );
      }
    }

    return $color_palette;
  }


  private function parse_css( $statement ) {
  
    // split into selector and declaration
    $css_bits = explode( "{", $statement );
    
    // trim periods, spaces
    $slug   = trim( $css_bits[0], ' .' );
    
    // trim semicolons, spaces
    $color  = trim( $css_bits[1], ' ;' );
    
    // replace underscores and dashes w/ spaces
    $name   = str_replace( array('-', '_'), ' ', $slug );
    
    return array(
      'name'    => __( $name, 'bonestheme' ),
      'slug'    => $slug,
      'color'   => $color,
    );
  }


  public function add_embones_colors() {

    $color_palette = $this->color_palette();

    $css = "<style type='text/css' id='embones-colors'>/* Custom Theme Colors */ ";

    foreach( $color_palette as $color ) {
  
      $slug = str_replace( '_', '-', $color['slug'] );
      $hex  = $color['color'];
    
      $css .= ".has-$slug-color { color: $hex } .has-$slug-background-color { background-color: $hex } ";
    }
  
    $css .= '</style>';

    wp_add_inline_style( 'bones-stylesheet', $css );
  }

}