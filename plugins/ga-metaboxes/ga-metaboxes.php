<?php
/**
 * Plugin Name: Gaurmet Artistry Meta Boxes
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: Custom Metaboxes for sites.
 * Version:     1.0
 * Author:      Kishan Jasani
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: ga
 * Domain Path: /languages
 * License:     GPL2
 *
 * Gaurmet Artistry Meta Boxes is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.

 * Gaurmet Artistry Meta Boxes is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gaurmet Artistry Meta Boxes. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 *
 * @package Gaurmet_Artistry
 */

 function ga_add_metaboxes() {
	add_meta_box( 'ga_metaboxes', 'Gourmet Artistry Metaboxes', 'ga_metaboxes_container', 'recipe', 'normal', 'high', null );
 }
 add_action( 'add_meta_boxes', 'ga_add_metaboxes' );

function ga_metaboxes_container( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'meta-box-nonce' );
	$recipe_post_meta = get_post_meta( $post->ID, 'recipe_meta_data', true );
	?>
	<div>
		<label for="input-metaboxes">Calories:</label>
		<input type="text" name="input-metaboxes" value="<?php echo ! empty( $recipe_post_meta['input-metaboxes'] ) ? esc_html( $recipe_post_meta['input-metaboxes'] ) : ''; ?>">
		<br />
		<label for="textarea-metabox">Recipe short description:</label>
		<textarea name="textarea-metabox"><?php echo ! empty( $recipe_post_meta['textarea-metaboxes'] ) ? esc_html( $recipe_post_meta['textarea-metaboxes'] ) : ''; ?></textarea>
		<br />
		<label for="dropdown-metabox"> Rating: </label>
		<select name="dropdown-metabox">
			<?php
			$options = array( 1, 2, 3, 4, 5 );
			foreach ( $options as $key => $value ) {
				echo '<option value="' . esc_attr( $value ) . '" ' . selected( $recipe_post_meta['dropdown-metaboxes'], $value ) . ' >' . esc_html( $value ) . '</option>';
			}
			?>
		</select>
	</div>
	<?php
}

function ga_save_metaboxes( $post_id ) {
	if ( empty( $_POST['meta-box-nonce'] ) || ! wp_verify_nonce( $_POST['meta-box-nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	$input_metabox    = '';
	$textarea_metabox = '';
	$dropdown_metabox = '';

	$post_meta_field = array();
	if ( ! empty( $_POST['input-metaboxes'] ) ) {
		$input_metabox                      = sanitize_text_field( $_POST['input-metaboxes'] );
		$post_meta_field['input-metaboxes'] = $input_metabox;
	}
	if ( ! empty( $_POST['textarea-metabox'] ) ) {
		$textarea_metabox                      = sanitize_textarea_field( $_POST['textarea-metabox'] );
		$post_meta_field['textarea-metaboxes'] = $textarea_metabox;
	}
	if ( ! empty( $_POST['dropdown-metabox'] ) ) {
		$dropdown_metabox                      = sanitize_text_field( $_POST['dropdown-metabox'] );
		$post_meta_field['dropdown-metaboxes'] = $dropdown_metabox;
	}

	update_post_meta( $post_id, 'recipe_meta_data', $post_meta_field );

}
add_action( 'save_post', 'ga_save_metaboxes' );
