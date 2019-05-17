<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Adds a form to the end of all single posts
 * 
 * @param string $content
 * 
 * @return string $content
 */
function myprefix_add_form_to_posts( $content ) {
    
    // Change to ID of the form you want to add
    $form_id = 0;
    
    // Check if this is a single post. 
    if ( is_singular( 'post' ) ) {
        
        // Add the form to the end of the post content.
        $content .= mc4wp_get_form( $form_id );
        
    }
    
    // Returns the content.
    return $content;
}

/**
 * Adds a Instagram feed to the end of all pages
 * 
 * @param string $content
 * 
 * @return string $content
 */
 
add_filter( 'the_content', 'myprefix_add_form_to_posts' );

function insta ($content){
	global $post;
    return $content .= '[instagram-feed]';
  
      return $content;
  
}
add_filter( 'the_content', 'insta' );