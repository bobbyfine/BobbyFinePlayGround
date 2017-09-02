<?php
/**
 * Add Title Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

class thinkup_builder_carouselclient extends WP_Widget {

	/* Register widget description. */
	public function __construct() {
		$widget_ops = array('classname' => 'thinkup_builder_carouselclient', 'description' => 'Add a client carousel to your content.' );
		parent::__construct('thinkup_builder_carouselclient', 'Client (Carousel)', $widget_ops);
	}

	/* Add widget structure to Admin area. */
	function form($instance) {
		$default_entries = array( 
			'title'    => '', 
			'items'    => '', 
			'show'     => '', 
			'scroll'   => '', 
			'speed'    => '', 
			'effect'   => '', 
			'category' => '', 
			'animate'  => '', 
			'delay'    => '', 
		);
		$instance = wp_parse_args( (array) $instance, $default_entries );

		$title          = $instance['title'];
		$items          = $instance['items'];
		$show           = $instance['show'];
		$scroll         = $instance['scroll'];
		$speed          = $instance['speed'];
		$effect         = $instance['effect'];
		$category       = $instance['category'];
		$animate        = $instance['animate'];
		$delay          = $instance['delay'];

		echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('items') . '" style="display: inline-block;width: 150px;" >Total:</label>
			<select name="' . $this->get_field_name('items') . '" id="' . $this->get_field_id('items') . '" style="display: inline-block;width: 200px;margin: 0;" >';
			echo '<option '; ?><?php if($items == "Default") { echo "selected"; } ?><?php echo ' value="Default">Default</option>';
			foreach ( range(1,50) as $k ) {
				echo '<option '; ?><?php if( $items == $k ) { echo "selected"; } ?><?php echo ' value="' . $k . '">' . $k . '</option>';
			}
		echo '</select>',
			 '</p>';

		echo '<p><label for="' . $this->get_field_id('show') . '" style="display: inline-block;width: 150px;" >Items:</label>
			<select name="' . $this->get_field_name('show') . '" id="' . $this->get_field_id('show') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($show == "2") { echo "selected"; } ?><?php echo ' value="2">2</option>
			<option '; ?><?php if($show == "3") { echo "selected"; } ?><?php echo ' value="3">3</option>
			<option '; ?><?php if($show == "4") { echo "selected"; } ?><?php echo ' value="4">4</option>
			<option '; ?><?php if($show == "5") { echo "selected"; } ?><?php echo ' value="5">5</option>
			<option '; ?><?php if($show == "6") { echo "selected"; } ?><?php echo ' value="6">6</option>
			<option '; ?><?php if($show == "7") { echo "selected"; } ?><?php echo ' value="7">7</option>
			<option '; ?><?php if($show == "8") { echo "selected"; } ?><?php echo ' value="8">8</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('scroll') . '" style="display: inline-block;width: 150px;" >Scroll:</label>
			<select name="' . $this->get_field_name('scroll') . '" id="' . $this->get_field_id('scroll') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($scroll == "1") { echo "selected"; } ?><?php echo ' value="1">1</option>
			<option '; ?><?php if($scroll == "2") { echo "selected"; } ?><?php echo ' value="2">2</option>
			<option '; ?><?php if($scroll == "3") { echo "selected"; } ?><?php echo ' value="3">3</option>
			<option '; ?><?php if($scroll == "4") { echo "selected"; } ?><?php echo ' value="4">4</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('speed') . '" style="display: inline-block;width: 150px;">Speed:</label><input class="widefat" id="' . $this->get_field_id('speed') . '" name="' . $this->get_field_name('speed') . '" type="text" value="' . esc_attr($speed) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('effect') . '" style="display: inline-block;width: 150px;" >Effect:</label>
			<select name="' . $this->get_field_name('effect') . '" id="' . $this->get_field_id('effect') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($effect == "none") { echo "selected"; } ?><?php echo ' value="none">None</option>
			<option '; ?><?php if($effect == "scroll") { echo "selected"; } ?><?php echo ' value="scroll">Scroll</option>
			<option '; ?><?php if($effect == "directscroll") { echo "selected"; } ?><?php echo ' value="directscroll">Direct Scroll</option>
			<option '; ?><?php if($effect == "fade") { echo "selected"; } ?><?php echo ' value="fade">Fade</option>
			<option '; ?><?php if($effect == "crossfade") { echo "selected"; } ?><?php echo ' value="crossfade">Crossfade</option>
			<option '; ?><?php if($effect == "cover") { echo "selected"; } ?><?php echo ' value="cover">Cover</option>
			<option '; ?><?php if($effect == "cover-fade") { echo "selected"; } ?><?php echo ' value="cover-fade">Coverfade</option>
			<option '; ?><?php if($effect == "uncover") { echo "selected"; } ?><?php echo ' value="uncover">Uncover</option>
			<option '; ?><?php if($effect == "uncover-fade") { echo "selected"; } ?><?php echo ' value="uncover-fade">Uncover Fade</option>
			</select>
		</p>';
		
		echo '<p><label for="' . $this->get_field_id('category') . '" style="display: inline-block;width: 150px;">Category ID ( 0 = all ):</label><input class="widefat" id="' . $this->get_field_id('category') . '" name="' . $this->get_field_name('category') . '" type="text" value="' . esc_attr($category) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('animate') . '" style="display: inline-block;width: 150px;">Animation:</label>
			<select name="' . $this->get_field_name('animate') . '" id="' . $this->get_field_id('animate') . '" style="display: inline-block;width: 200px;margin: 0;">
			<option '; ?><?php if($animate == "none") { echo "selected"; } ?><?php echo ' value="none">None</option>
			<option '; ?><?php if($animate == "bounceIn") { echo "selected"; } ?><?php echo ' value="bounceIn">bounceIn</option>
			<option '; ?><?php if($animate == "bounceInDown") { echo "selected"; } ?><?php echo ' value="bounceInDown">bounceInDown</option>
			<option '; ?><?php if($animate == "bounceInUp") { echo "selected"; } ?><?php echo ' value="bounceInUp">bounceInUp</option>
			<option '; ?><?php if($animate == "bounceInLeft") { echo "selected"; } ?><?php echo ' value="bounceInLeft">bounceInLeft</option>
			<option '; ?><?php if($animate == "bounceInRight") { echo "selected"; } ?><?php echo ' value="bounceInRight">bounceInRight</option>
			<option '; ?><?php if($animate == "bounceOut") { echo "selected"; } ?><?php echo ' value="bounceOut">bounceOut</option>
			<option '; ?><?php if($animate == "bounceOutDown") { echo "selected"; } ?><?php echo ' value="bounceOutDown">bounceOutDown</option>
			<option '; ?><?php if($animate == "bounceOutUp") { echo "selected"; } ?><?php echo ' value="bounceOutUp">bounceOutUp</option>
			<option '; ?><?php if($animate == "bounceOutLeft") { echo "selected"; } ?><?php echo ' value="bounceOutLeft">bounceOutLeft</option>
			<option '; ?><?php if($animate == "bounceOutRight") { echo "selected"; } ?><?php echo ' value="bounceOutRight">bounceOutRight</option>
			<option '; ?><?php if($animate == "flipInX") { echo "selected"; } ?><?php echo ' value="flipInX">flipInX</option>
			<option '; ?><?php if($animate == "flipOutX") { echo "selected"; } ?><?php echo ' value="flipOutX">flipOutX</option>
			<option '; ?><?php if($animate == "flipInY") { echo "selected"; } ?><?php echo ' value="flipInY">flipInY</option>
			<option '; ?><?php if($animate == "flipOutY") { echo "selected"; } ?><?php echo ' value="flipOutY">flipOutY</option>
			<option '; ?><?php if($animate == "fadeIn") { echo "selected"; } ?><?php echo ' value="fadeIn">fadeIn</option>
			<option '; ?><?php if($animate == "fadeInUp") { echo "selected"; } ?><?php echo ' value="fadeInUp">fadeInUp</option>
			<option '; ?><?php if($animate == "fadeInDown") { echo "selected"; } ?><?php echo ' value="fadeInDown">fadeInDown</option>
			<option '; ?><?php if($animate == "fadeInLeft") { echo "selected"; } ?><?php echo ' value="fadeInLeft">fadeInLeft</option>
			<option '; ?><?php if($animate == "fadeInRight") { echo "selected"; } ?><?php echo ' value="fadeInRight">fadeInRight</option>
			<option '; ?><?php if($animate == "fadeInUpBig") { echo "selected"; } ?><?php echo ' value="fadeInUpBig">fadeInUpBig</option>
			<option '; ?><?php if($animate == "fadeInDownBig") { echo "selected"; } ?><?php echo ' value="fadeInDownBig">fadeInDownBig</option>
			<option '; ?><?php if($animate == "fadeInLeftBig") { echo "selected"; } ?><?php echo ' value="fadeInLeftBig">fadeInLeftBig</option>
			<option '; ?><?php if($animate == "fadeInRightBig") { echo "selected"; } ?><?php echo ' value="fadeInRightBig">fadeInRightBig</option>
			<option '; ?><?php if($animate == "fadeOut") { echo "selected"; } ?><?php echo ' value="fadeOut">fadeOut</option>
			<option '; ?><?php if($animate == "fadeOutUp") { echo "selected"; } ?><?php echo ' value="fadeOutUp">fadeOutUp</option>
			<option '; ?><?php if($animate == "fadeOutDown") { echo "selected"; } ?><?php echo ' value="fadeOutDown">fadeOutDown</option>
			<option '; ?><?php if($animate == "fadeOutLeft") { echo "selected"; } ?><?php echo ' value="fadeOutLeft">fadeOutLeft</option>
			<option '; ?><?php if($animate == "fadeOutRight") { echo "selected"; } ?><?php echo ' value="fadeOutRight">fadeOutRight</option>
			<option '; ?><?php if($animate == "fadeOutUpBig") { echo "selected"; } ?><?php echo ' value="fadeOutUpBig">fadeOutUpBig</option>
			<option '; ?><?php if($animate == "fadeOutDownBig") { echo "selected"; } ?><?php echo ' value="fadeOutDownBig">fadeOutDownBig</option>
			<option '; ?><?php if($animate == "fadeOutLeftBig") { echo "selected"; } ?><?php echo ' value="fadeOutLeftBig">fadeOutLeftBig</option>
			<option '; ?><?php if($animate == "fadeOutRightBig") { echo "selected"; } ?><?php echo ' value="fadeOutRightBig">fadeOutRightBig</option>
			<option '; ?><?php if($animate == "hinge") { echo "selected"; } ?><?php echo ' value="hinge">hinge</option>
			<option '; ?><?php if($animate == "lightSpeedIn") { echo "selected"; } ?><?php echo ' value="lightSpeedIn">lightSpeedIn</option>
			<option '; ?><?php if($animate == "lightSpeedOut") { echo "selected"; } ?><?php echo ' value="lightSpeedOut">lightSpeedOut</option>
			<option '; ?><?php if($animate == "rollIn") { echo "selected"; } ?><?php echo ' value="rollIn">rollIn</option>
			<option '; ?><?php if($animate == "rollOut") { echo "selected"; } ?><?php echo ' value="rollOut">rollOut</option>
			<option '; ?><?php if($animate == "rotateIn") { echo "selected"; } ?><?php echo ' value="rotateIn">rotateIn</option>
			<option '; ?><?php if($animate == "rotateInDownLeft") { echo "selected"; } ?><?php echo ' value="rotateInDownLeft">rotateInDownLeft</option>
			<option '; ?><?php if($animate == "rotateInDownRight") { echo "selected"; } ?><?php echo ' value="rotateInDownRight">rotateInDownRight</option>
			<option '; ?><?php if($animate == "rotateInUpLeft") { echo "selected"; } ?><?php echo ' value="rotateInUpLeft">rotateInUpLeft</option>
			<option '; ?><?php if($animate == "rotateInUpRight") { echo "selected"; } ?><?php echo ' value="rotateInUpRight">rotateInUpRight</option>
			<option '; ?><?php if($animate == "rotateOut") { echo "selected"; } ?><?php echo ' value="rotateOut">rotateOut</option>
			<option '; ?><?php if($animate == "rotateOutDownLeft") { echo "selected"; } ?><?php echo ' value="rotateOutDownLeft">rotateOutDownLeft</option>
			<option '; ?><?php if($animate == "rotateOutDownRight") { echo "selected"; } ?><?php echo ' value="rotateOutDownRight">rotateOutDownRight</option>
			<option '; ?><?php if($animate == "rotateOutUpLeft") { echo "selected"; } ?><?php echo ' value="rotateOutUpLeft">rotateOutUpLeft</option>
			<option '; ?><?php if($animate == "rotateOutUpRight") { echo "selected"; } ?><?php echo ' value="rotateOutUpRight">rotateOutUpRight</option>
			<option '; ?><?php if($animate == "slideInDown") { echo "selected"; } ?><?php echo ' value="slideInDown">slideInDown</option>
			<option '; ?><?php if($animate == "slideInLeft") { echo "selected"; } ?><?php echo ' value="slideInLeft">slideInLeft</option>
			<option '; ?><?php if($animate == "slideInRight") { echo "selected"; } ?><?php echo ' value="slideInRight">slideInRight</option>
			<option '; ?><?php if($animate == "slideOutUp") { echo "selected"; } ?><?php echo ' value="slideOutUp">slideOutUp</option>
			<option '; ?><?php if($animate == "slideOutLeft") { echo "selected"; } ?><?php echo ' value="slideOutLeft">slideOutLeft</option>
			<option '; ?><?php if($animate == "slideOutRight") { echo "selected"; } ?><?php echo ' value="slideOutRight">slideOutRight</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('delay') . '" style="display: inline-block;width: 153px;">Animation Delay (ms):</label><input class="widefat" id="' . $this->get_field_id('delay') . '" name="' . $this->get_field_name('delay') . '" type="text" value="' . esc_attr($delay) . '" style="display: inline-block;  width: 200px;margin: 0;" /></p>';
	}

	/* Assign variable values. */
	function update($new_instance, $old_instance) {
		$instance                   = $old_instance;
		$instance['title']          = $new_instance['title'];
		$instance['items']          = $new_instance['items'];
		$instance['show']           = $new_instance['show'];
		$instance['scroll']         = $new_instance['scroll'];
		$instance['speed']          = $new_instance['speed'];
		$instance['effect']         = $new_instance['effect'];
		$instance['category']       = $new_instance['category'];
		$instance['animate']        = $new_instance['animate'];
		$instance['delay']          = $new_instance['delay'];
		return $instance;
	}

	/* Output widget to front-end. */
	function widget($args, $instance) {

		$items          = $instance['items'];
		$show           = $instance['show'];
		$scroll         = $instance['scroll'];
		$speed          = $instance['speed'];
		$effect         = $instance['effect'];
		$category       = $instance['category'];
		$animate        = $instance['animate'];
		$delay          = $instance['delay'];

		$animate_start = NULL;
		$animate_end   = NULL;

		extract($args, EXTR_SKIP);
		
		if ( empty( $speed ) ) {
			$speed = '500';
		}
		if ( empty( $category ) ) {
			$category = '0';
		}

		// Assign animation variables
		if ( ! empty( $animate ) and $animate !== 'none' ) {
			$animate_start = '<div class="animated start-' . $animate . '" title="' . $delay . '">';
			$animate_end   = '</div><div class="clearboth"></div>';
		}

		echo $animate_start;

		echo do_shortcode( '[carousel_clients items="' . $items .'" show="' . $show .'" scroll="' . $scroll . '" speed="' . $speed . '" effect="' . $effect . '"  category="' . $category . '"]' );

		echo $animate_end;

		if ( ! empty( $animate ) and $animate !== 'none' ) {
			
			if ( ! wp_script_is( 'animate-js', 'enqueued' ) ) {
			// Enque styles only if widget is being used
			wp_enqueue_style( 'animate-css', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/animate.css/animate.css', array(), '1.0' );
			wp_enqueue_style( 'animate-thinkup-css', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'widgets-builder/animation/css/animate-thinkup-panels.css', array(), '1.0' );

			if ( ! wp_script_is( 'waypoints', 'enqueued' ) ) {
			// Enque waypoints only if widget is being used
			wp_enqueue_script( 'waypoints', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints.min.js', array( 'jquery' ), '2.0.3', 'true'  );
			wp_enqueue_script( 'waypoints-sticky', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints-sticky.min.js', array( 'jquery' ), '2.0.3', 'true'  );
			}

			// Enque scripts only if widget is being used
			wp_enqueue_script( 'animate-js', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'widgets-builder/animation/js/animate-thinkup-panels.js', array( 'jquery' ), '1.1', true );
			}
		}
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_carouselclient");') );

?>