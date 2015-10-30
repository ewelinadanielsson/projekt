<?php
/* Functions for our theme
*
*
* @there projekt
*/

//$main_js_part = '/js/main.js';
//$main_style_part = '/css/main.css';



/* Our custom post types */

function register_contact_post_type () {

register_post_type('contact', array(
	'label' => 'Contact',
	'public' => true,
	'hierarchical' => false,
	'has_archive' => false,
	'supports' => array('title', 'thumbnail')
));

}

add_action('init', 'register_contact_post_type');


function myplugin_add_meta_box() {

 {
		add_meta_box(
			'myplugin_sectionid',
			__( 'Kontaktinfo', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			'contact'
		);
	}
}

add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );


function myplugin_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_save_meta_box_data', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_my_meta_value_key', true );

	echo '<label for="myplugin_new_field">';
	_e( 'Telefonnummer', 'myplugin_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';


$value = get_post_meta( $post->ID, '_my_email_meta_value_key', true );

	echo '<label for="myplugin_email_field">';
	_e( 'Email', 'myplugin_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="myplugin_email_field" name="myplugin_email_field" value="' . esc_attr( $value ) . '" size="25" />';

}


function myplugin_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['myplugin_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_my_meta_value_key', $my_data );


	if ( ! isset( $_POST['myplugin_email_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_email_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_my_email_meta_value_key', $my_data );


}
add_action( 'save_post', 'myplugin_save_meta_box_data' );


function projekt_register_menu () {
	register_nav_menus (array(
		'main_menu' => 'Huvudmeny',
		'top_menu' => 'Toppmeny',
		'footer_menu' => 'Footermeny'
		));
}

add_action('init', 'projekt_register_menu');


add_filter('loop_shop_per_page', create_function('$cols', 'return 16;'));

if (wc_get_page_id( 'cart' ) == get_the_ID()) {
  // Do something.
}