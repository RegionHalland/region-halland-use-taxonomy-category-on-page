<?php

	/**
	 * @package Region Halland Use Taxonomy Category on Page
	 */
	/*
	Plugin Name: Region Halland Use Taxonomy Category on Page
	Description: Lägg till så att taxonomy category även kan användas på sidor
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Registrera taxonomy category
	add_action('init','add_region_halland_taxonomy_category_to_pages');
	
	// Registrera taxonomy category
	function add_region_halland_taxonomy_category_to_pages() {
      	register_taxonomy_for_object_type('category','page');
  	} 
	
	// Sätt upp data
	add_action('pre_get_posts','region_halland_taxonomy_category_archive');
	
	// Sätt upp data
	function region_halland_taxonomy_category_archive($wp_query) {

		// Kontrollera om det är en kategori
		if($wp_query->is_main_query() && ! is_admin() && ($wp_query->is_category())){
		    
		    // Sätt array för aktuella posttyper
		    $my_post_array = array('post','page');
		    
		    // Sätt data
		    if ($wp_query->get('category_name') || $wp_query->get('cat' )) {
		     	$wp_query->set( 'post_type', $my_post_array );
		    }
		}
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_use_taxonomy_category_on_page_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_use_taxonomy_category_on_page_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_use_taxonomy_category_on_page_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_use_taxonomy_category_on_page_deactivate');

?>