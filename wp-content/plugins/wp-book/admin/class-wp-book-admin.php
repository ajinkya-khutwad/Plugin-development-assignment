<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress1.to
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 * @author     Ajinkya Khutwad <ajinkya.khutwad@hbwsl.com>
 */
class Wp_Book_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-book-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-book-admin.js', array( 'jquery' ), $this->version, false );

	}


	// Register Custom Post Type
function wp1_book_cpt() {

	$labels = array(
		'name'                  => _x( 'Books', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Book', 'text_domain' ),
		'name_admin_bar'        => __( 'Book', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Books', 'text_domain' ),
		'add_new_item'          => __( 'Add New Book', 'text_domain' ),
		'add_new'               => __( 'Add New Book', 'text_domain' ),
		'new_item'              => __( 'New Book', 'text_domain' ),
		'edit_item'             => __( 'Edit Book', 'text_domain' ),
		'update_item'           => __( 'Update Book', 'text_domain' ),
		'view_item'             => __( 'View Book', 'text_domain' ),
		'view_items'            => __( 'View Books', 'text_domain' ),
		'search_items'          => __( 'Search Book', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Books list', 'text_domain' ),
		'items_list_navigation' => __( 'Books list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Books list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Book', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'book', $args );

}


// Register Custom Taxonomy
function wp1_register_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Book Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Book Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Book Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'book-category', array( 'post', 'book' ), $args );


	$labels = array(
		'name'                       => _x( 'Book Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Book Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Book Tag', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'book-tag', array( 'post', 'book' ), $args );

}


/**
	 * Add meta box to 'book' custom post type
	 */
	public function wp1_add_custom_meta_box() {
		add_meta_box( 'custom-books-info', 'Books Info', array( $this, 'custom_meta_box_markup' ), array( 'book' ), 'normal', 'default');
	}


	// Registers the custom table named bookmeta
	function wp1_register_bookmeta_table() {
		global $wpdb;	
		$wpdb->bookmeta = $wpdb->prefix . 'bookmeta';
	}

	/**
	 * Shows custom metabox books and get values for wp_booksmeta (if any).
	 *
	 * @since    1.0.0
	 * @param      object $post       Contains all information about post.
	 */
	public function custom_meta_box_markup( $post) {
		
		$get_book_metadata = get_metadata( 'book', $post->ID ); // Retrieves the value of a metadata field for the specified object type and ID.
		
		if ( count( $get_book_metadata ) > 0 ) {
			$author    = $get_book_metadata['author_name'][0];
			$price     = $get_book_metadata['price'][0];
			$publisher = $get_book_metadata['publisher'][0];
			$year      = $get_book_metadata['year'][0];
			$edition   = $get_book_metadata['edition'][0];
			$url       = $get_book_metadata['url'][0];
		} else {
			$author    = '';
			$price     = '';
			$publisher = '';
			$year      = '';
			$edition   = '';
			$url       = '';
		}

		// The nonce field is used to validate that the contents of the form came from the location on the current site and not somewhere else.
		wp_nonce_field( plugin_basename( __FILE__ ), 'meta-box-nonce' );

		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="wpb-custom-author-name">Author Name</label></th>
					<td><input name="wpb-custom-author-name" type="text" id="wpb-custom-author-name" value="<?php echo esc_html( $author ); ?>" placeholder="Author Name" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-price">Book Price</label></th>
					<td><input name="wpb-custom-price" type="text" id="wpb-custom-price" value="<?php echo esc_html( $price ); ?>" placeholder="Book Price" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-publisher">Publisher</label></th>
					<td><input name="wpb-custom-publisher" type="text" id="wpb-custom-publisher" value="<?php echo esc_html( $publisher ); ?>" placeholder="Publisher" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-year">Year</label></th>
					<td><input name="wpb-custom-year" type="number" id="wpb-custom-year" value="<?php echo esc_html( $year ); ?>" placeholder="Year" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-edition">Edition</label></th>
					<td><input name="wpb-custom-edition" type="text" id="wpb-custom-edition" value="<?php echo esc_html( $edition ); ?>" placeholder="Edition" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-url">URL</label></th>
					<td><input name="wpb-custom-url" type="url" id="wpb-custom-url" value="<?php ( $url ); ?>" placeholder="URL eg. https://example.com" class="regular-text" autocomplete="off"></td>
				</tr>
			</tbody>
		</table>
		<?php

	}
	

	/**
	 * Stores all metadata of custom post type to custom table called wp_bookmeta and wp_book
	 *
	 * @since    1.0.0
	 * @param      integer $post_id       Contains Post ID.
	 * @param      object  $post          Contains all information about post.
	 */
	public function wp1_save_custom_meta_box( $post_id, $post ) {

		if ( null === ( wp_unslash( isset( $_POST['meta-box-nonce'] ) ) ) || wp_verify_nonce( isset( $_POST['meta-box-nonce'] ), basename( __FILE__ ) ) ) {
			return $post_id;
		}

		$post_slug = 'book';

		if ( $post_slug !== $post->post_type ) {
			return;
		}

		$author = '';
		if ( isset( $_POST['wpb-custom-author-name'] ) ) {
			$author = sanitize_text_field( wp_unslash( $_POST['wpb-custom-author-name'] ) );
		} else {
			$author = '';
		}

		$price = '';
		if ( isset( $_POST['wpb-custom-price'] ) ) {
			$price = sanitize_text_field( wp_unslash( $_POST['wpb-custom-price'] ) );
		} else {
			$price = '';
		}

		$publisher = '';
		if ( isset( $_POST['wpb-custom-publisher'] ) ) {
			$publisher = sanitize_text_field( wp_unslash( $_POST['wpb-custom-publisher'] ) );
		} else {
			$publisher = '';
		}

		$year = '';
		if ( isset( $_POST['wpb-custom-year'] ) ) {
			$year = sanitize_text_field( wp_unslash( $_POST['wpb-custom-year'] ) );
		} else {
			$year = '';
		}

		$edition = '';
		if ( isset( $_POST['wpb-custom-edition'] ) ) {
			$edition = sanitize_text_field( wp_unslash( $_POST['wpb-custom-edition'] ) );
		} else {
			$edition = '';
		}

		$url = '';
		if ( isset( $_POST['wpb-custom-url'] ) ) {
			$url = sanitize_text_field( wp_unslash( $_POST['wpb-custom-url'] ) );
		} else {
			$url = '';
		}

		update_metadata( 'post', $post_id, 'author_name', $author ); // Updates metadata for the specified object.
		update_metadata( 'post', $post_id, 'price', $price );
		update_metadata( 'post', $post_id, 'publisher', $publisher );
		update_metadata( 'post', $post_id, 'year', $year );
		update_metadata( 'post', $post_id, 'edition', $edition );
		update_metadata( 'post', $post_id, 'url', $url );

		update_metadata( 'book', $post_id, 'author_name', $author );
		update_metadata( 'book', $post_id, 'price', $price );
		update_metadata( 'book', $post_id, 'publisher', $publisher );
		update_metadata( 'book', $post_id, 'year', $year );
		update_metadata( 'book', $post_id, 'edition', $edition );
		update_metadata( 'book', $post_id, 'url', $url );
		
	}
}
