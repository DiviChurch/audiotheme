<?php
/**
 * AudioTheme Theme Option
 *
 * Function called to get a Theme Option. 
 * The option defaults to false unless otherwise set.
 *
 * @since 1.0
 */
function get_audiotheme_theme_option( $key, $default = false, $option_name = '' ) {
	$option_name = ( empty( $option_name ) ) ? henly_get_theme_options_id() : $option_name;
	
	$options = get_option( $option_name );
	
	return ( isset( $options[ $key ] ) ) ? $options[ $key ] : $default;
}

/**
 * Get Category List
 *
 * Utility function to get the category list and 
 * return array of category ID and Name.
 *
 * @retunr Array Category ID and Name
 * @since 2.0
 */
function get_audiotheme_category_list() {
	// Pull all the categories into an array
	$list = array();  
	$categories = get_categories();
	$list[''] = __( 'Select a category:', 'audiotheme' );
	
	foreach ( (array) $categories as $category )
	    $list[$category->cat_ID] = $category->cat_name;
	
	return $list;
}

/**
 * Record's track ID's
 *
 * @since 1.0
 * @return array
 */
function get_audiotheme_tracks( $record_id ){
    $tracks = get_post_meta( $record_id, '_tracks', true );
    if( !$tracks ){
        $tracks = array();
    } else {
        $tracks = explode( ',', $tracks );
    }
    
    return $tracks;
}

/**
 * Track file
 *
 * @since 1.0
 */
function get_audiotheme_track_file( $track_id ){
   return get_post_meta( $track_id, '_track_file_url', true );
}

/**
 * Track artist
 *
 * @since 1.0
 */
function get_audiotheme_track_artist( $track_id ){
    return get_post_meta( $track_id, '_artist', true );
}
?>