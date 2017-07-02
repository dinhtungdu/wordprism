<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WordPrism
 * @subpackage WordPrism/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WordPrism
 * @subpackage WordPrism/public
 * @author     Tung Du <dinhtungdu@gmail.com>
 */
class WordPrism_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WordPrism_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WordPrism_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'prism', plugin_dir_url( __FILE__ ) . 'css/prism.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordprism-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WordPrism_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WordPrism_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'prism', plugin_dir_url( __FILE__ ) . 'js/prism.js', array(), $this->version, true );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordprism-public.js', array( 'jquery' ), $this->version, true );

	}

	public function wordprism_shortcode( $atts = [], $content = null, $tag = '' ) {

		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		// override default attributes with user attributes
		$atts = shortcode_atts( [
			'lang'         => 'none',
			'command_line' => false,
			'user'         => 'tung',
			'host'         => 'localhost',
			'output'       => '',
			'prompt'       => 'PS C:\Users\Tung>',
			'line_numbers' => false,
		], $atts, $tag );

		// start output
		$o       = '';
		$classes = '';
		if ( $atts['command_line'] ) {
			$classes .= 'command-line ';
		}
		if ( $atts['line_numbers'] ) {
			$classes .= 'line-numbers';
		}
		$o .= '<pre class="' . esc_attr( $classes ) . '" ';
		if ( $atts['command_line'] ) {
			if ( 'bash' === $atts['lang'] ) {
				$o .= 'data-user="' . $atts['user'] . '" data-host="' . $atts['host'] . '" data-output="' . $atts['output'] . '"';
			}
			if ( 'powershell' === $atts['lang'] ) {
				$o .= 'data-prompt="' . $atts['prompt'] . '" data-output="' . $atts['output'] . '"';
			}
		}
		$o .= '>';
		if ( ! is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content
			$content = apply_filters( 'the_content', $content );
			$o       .= '<code class="language-' . esc_attr( $atts['lang'] ) . '">' . $content . '</code>';
		}
		$o .= '</pre>';

		// return output
		return $o;
	}

}
