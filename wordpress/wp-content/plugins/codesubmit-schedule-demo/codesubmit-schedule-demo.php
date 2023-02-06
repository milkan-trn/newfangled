<?php


/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codesubmit.io
 * @since             1.0.0
 * @package           Codesubmit_Schedule_Demo
 *
 * @wordpress-plugin
 * Plugin Name:       CodeSubmit Schedule Demo
 * Plugin URI:        https://codesubmit.io
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            CodeSubmit
 * Author URI:        https://codesubmit.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       codesubmit-schedule-demo
 * Domain Path:       /languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Schedule_Demo {

	public function __construct() {
		add_shortcode( 'schedule_demo', array( $this, 'render_shortcode' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_shortcode( 'sample-shortcode',array($this, 'schedule_demo_shortcode')  );
	}

	public function render_shortcode() {
		$phone_number = get_option( 'availability_modal_phone_number' );
		$availability = get_option( 'availability_modal_availability', array() );
		$current_day = date( 'l' );
		$current_time = date( 'G' );
		$is_open = false;

		if ( in_array( $current_day, $availability ) && $current_time >= 8 && $current_time < 17 ) {
			$is_open = true;
		}

		$html = '<button id="schedule-demo-button" class="button">Schedule a Demo</button>';
		$html .= '<div id="schedule-demo-modal" class="schedule-demo-modal">';
		$html .= '<div class="schedule-demo-modal-content">';

		if ( $is_open ) {
			$html .= '<p>Call us at ' . $phone_number . '</p>';
		} else {
			$next_day = null;

			foreach ( $availability as $day ) {
				if ( strtotime( $day ) > strtotime( $current_day ) ) {
					$next_day = $day;
					break;
				}
			}

			if ( ! $next_day ) {
				$next_day = $availability[0];
			}

			$html .= '<p>We are currently closed. Demos are available again on ' . $next_day . ' at 8am.</p>';
		}

		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	public function add_options_page() {
		add_menu_page( 'Schedule Demo', 'Schedule Demo', 'manage_options', 'schedule-demo', array( $this, 'render_options_page' ),	'dashicons-email-alt', );
	}

	public function render_options_page() {
		?>
		<div class="wrap">
			<h1>Availabilty (e.g. Monday-Friday, 8am-5pm)</h1>
			<form method="post" action="options.php">
				<?php
					settings_fields( 'schedule_demo_options' );
					do_settings_sections( 'schedule-demo' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	public function register_settings() {
		register_setting( 'schedule_demo_options', 'availability_modal_availability', array( $this, 'sanitize_availability' ) );
		register_setting( 'schedule_demo_options', 'availability_modal_phone_number', 'sanitize_text_field' );

		add_settings_section( 'availability_modal_section', 'Availability', '', 'schedule-demo' );
		add_settings_field( 'availability_modal_availability', 'Days of Week', array( $this, 'render_availability_field' ), 'schedule-demo', 'availability_modal_section' );
		add_settings_field( 'availability_modal_phone_number', 'Phone Number', array( $this, 'render_phone_number_field' ), 'schedule-demo', 'availability_modal_section' );
	}

	public function sanitize_availability( $input ) {
		return array_map( 'sanitize_text_field', $input );
	}

	public function render_availability_field() {
		$availability = get_option( 'availability_modal_availability', array() );
		$days_of_week = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' );
		echo '<fieldset>';
		foreach ( $days_of_week as $day ) {
			$checked = in_array( $day, $availability ) ? 'checked' : '';
			echo '<label><input type="checkbox" name="availability_modal_availability[]" value="' . $day . '" ' . $checked . '> ' . $day . '</label><br>';
		}
		echo '</fieldset>';
	}

	public function render_phone_number_field() {
		$phone_number = get_option( 'availability_modal_phone_number' );
		echo '<input type="text" name="availability_modal_phone_number" value="' . $phone_number . '">';
		echo "<p>Add this code to theme file to show button:</br> &lt;?php echo do_shortcode('[sample-shortcode]'); ?&gt;</p>";
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'schedule-demo-modal-style', plugins_url( 'public/css/codesubmit-schedule-demo-public.css', __FILE__ ) );
		wp_enqueue_script( 'schedule-demo-modal-script', plugins_url( 'public/js/codesubmit-schedule-demo-public.js', __FILE__ ), array( 'jquery' ), '', true );
	}

	public function schedule_demo_shortcode() {
		ob_start();
		$phone_number = get_option( 'availability_modal_phone_number' );
		$availability = get_option( 'availability_modal_availability', array() );
		//var_dump($availability );
		$current_day = date( 'l' );
		//$current_day = intval($current_day);
		$current_time = date( 'G' );
		$open = in_array( $current_day, $availability ) && $current_time >= 8 && $current_time <= 17;
		?>
		 <p class="buttonp">
                <button id="schedule-demo-modal-button" class="button">Schedule a demo</button>&nbsp;&nbsp;&nbsp;to see a preview

            </p>
		<div id="schedule-demo-modal" class="schedule-demo-modal">
			<div class="schedule-demo-modal-content">
				<span class="close">&times;</span>
				<?php if ( $open ) : ?>
					<p>Phone Number: <?php echo $phone_number; ?></p>
				<?php else : ?>
					<p>Sorry, we are closed now. Demos are available from Monday to Friday between 8am and 5pm.</p>
					<p>Next available time is: 
						<?php
							$next_day = null;
							//$days_in_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
							// Get today's date
								$date = new DateTime();

								// Add 24 hours to the date
								$date->add(new DateInterval('P1D'));

							
								if ( in_array( $current_day, $availability ) ) {
									$next_day = $date->format('l');
								} else {
									$next_day = $availability[0]; 

								}
					/* 
							if ( ! $next_day ) {
								for ( $i = 0; $i <= $current_day; $i++ ) {
									if ( in_array( $i, $availability ) ) {
										$next_day = $i;
										break;
									}
								}
							} */
							echo $next_day . ' at 8am';
						?>
					</p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Schedule_Demo();
