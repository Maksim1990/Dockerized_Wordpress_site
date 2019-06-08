<?php

class Album_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'enjoyinstagram_widget_album', // Base ID
			__('EnjoyInstagram - Album', 'text_domain'), // Name
			array( 'description' => __( 'EnjoyInstagram Widget for Album View', 'text_domain' ), ) // Args
		);
		add_action('wp_enqueue_scripts', array(&$this, 'js'));

	}

	function js(){

		if ( is_active_widget(false, false, $this->id_base, true) ) {
			wp_register_script('owl', plugins_url('../js/owl.carousel.min.js', __FILE__), 'jquery');
			wp_register_script('swipebox', plugins_url('../js/jquery.swipebox.min.js', __FILE__), 'jquery', '');
			wp_register_script('gridrotator', plugins_url('../js/jquery.gridrotator.min.js', __FILE__), 'jquery', '');
			wp_register_script('modernizr.custom.26633', plugins_url('../js/modernizr.custom.26633.min.js', __FILE__), 'jquery', '');
			wp_register_script('orientationchange', plugins_url('../js/ios-orientationchange-fix.min.js', __FILE__), 'jquery', '');
			wp_register_script('classie', plugins_url('../js/classie.min.js', __FILE__), 'jquery', '');
			wp_register_script('modernizer', plugins_url('../js/modernizr.min.js', __FILE__), 'jquery', '');
			wp_register_script('photostack', plugins_url('../js/photostack.min.js', __FILE__), 'jquery', '');
			wp_register_script('stapel_1', plugins_url('../js/jquery.stapel.min.js', __FILE__), 'jquery', '');
			wp_register_script('stapel_2', plugins_url('../js/modernizr.custom.63321.min.js', __FILE__), 'jquery', '');

			wp_enqueue_script('jquery'); // include jQuery
			wp_enqueue_script('owl');
			wp_enqueue_script('swipebox');
			wp_enqueue_script('modernizr.custom.26633');
			wp_enqueue_script('gridrotator');
		 wp_localize_script('gridrotator', 'GridRotator', array('pluginsUrl' => plugins_url(),));

			wp_enqueue_script('orientationchange');
			wp_enqueue_script('modernizer');
			wp_enqueue_script('classie');
			wp_enqueue_script('photostack');
			wp_enqueue_script('stapel_1');
			wp_enqueue_script('stapel_2');

			wp_register_style('owl_style', plugins_url('../css/owl.carousel.min.css', __FILE__));
			wp_register_style('owl_style_2', plugins_url('../css/owl.theme.min.css', __FILE__));
			wp_register_style('owl_style_default', plugins_url('../css/owl.theme.default.min.css', __FILE__));
			wp_register_style('owl_style_3', plugins_url('../css/owl.transitions.min.css', __FILE__));
			wp_register_style('swipebox_css', plugins_url('../css/swipebox.min.css', __FILE__));
			wp_register_style('grid_fallback', plugins_url('../css/grid_fallback.min.css', __FILE__));
			wp_register_style('grid_style', plugins_url('../css/grid_style.min.css', __FILE__));
			wp_register_style('animate', plugins_url('../css/animate.min.css', __FILE__));
			wp_register_style('accordion', plugins_url('../css/accordion.min.css', __FILE__));
			wp_register_style('component', plugins_url('../css/component.min.css', __FILE__));
			wp_register_style('normalize', plugins_url('../css/normalize.min.css', __FILE__));
			wp_register_style('style_stapel_1', plugins_url('../css/custom_stapel.min.css', __FILE__));
			wp_register_style('style_stapel_3', plugins_url('../css/stapel.min.css', __FILE__));
			wp_register_style('enin_badge', plugins_url('../css/enin-badge.min.css', __FILE__));

			wp_enqueue_style('owl_style');
			wp_enqueue_style('owl_style_default');
			wp_enqueue_style('owl_style_2');
			wp_enqueue_style('owl_style_3');
			wp_enqueue_style('swipebox_css');
			wp_enqueue_style('grid_fallback');
			wp_enqueue_style('grid_style');
			wp_enqueue_style('animate');
			wp_enqueue_style('accordion');
			wp_enqueue_style('component');
			wp_enqueue_style('normalize');
			wp_enqueue_style('style_stapel_1');
			wp_enqueue_style('style_stapel_3');
			wp_enqueue_style('enin_badge');
		}
	}


	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$first_select_enjoyinstagram_user_or_hashtag_widget = (isset($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])) ? $instance['first_select_enjoyinstagram_user_or_hashtag_widget'] : '';
		$enjoyinstagram_user_album = apply_filters( 'widget_content', $instance['enjoyinstagram_user_album'] );
		$enjoyinstagram_hashtag_album = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_album'] );
		$enjoyinstagram_user_album_moderate = apply_filters( 'widget_content', $instance['enjoyinstagram_user_album_moderate'] );
		$enjoyinstagram_hashtag_album_moderate = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_album_moderate'] );
		$enjoyinstagram_album_delay = apply_filters( 'widget_content', $instance['enjoyinstagram_album_delay'] );
		$enjoyinstagram_album_hidebarsdelay = apply_filters( 'widget_content', $instance['enjoyinstagram_album_hidebarsdelay'] );
		$enjoyinstagram_album_margin = apply_filters( 'widget_content', $instance['enjoyinstagram_album_margin'] );
		$enjoyinstagram_album_animation_in = apply_filters( 'widget_content', $instance['enjoyinstagram_album_animation_in'] );
		$enjoyinstagram_album_animation_out = apply_filters( 'widget_content', $instance['enjoyinstagram_album_animation_out'] );
		$enjoyinstagram_album_link_altro = apply_filters( 'widget_content', $instance['enjoyinstagram_album_link_altro'] );
		$enjoyinstagram_album_link = apply_filters( 'widget_content', $instance['enjoyinstagram_album_link'] );
		$enjoyinstagram_album_user_hashtag_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_album_user_hashtag_widget'] );



		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

    if($instance['enjoyinstagram_user_album']){
       $instance_enjoyinstagram_user_album = implode(',',$instance['enjoyinstagram_user_album']);
    }else{
			$instance_enjoyinstagram_user_album = '';
		}

    if($instance['enjoyinstagram_user_album_moderate']){
       $instance_enjoyinstagram_user_album_moderate = implode(',',$instance['enjoyinstagram_user_album_moderate']);
    }else{
			$instance_enjoyinstagram_user_album_moderate = '';
		}

    if($instance['enjoyinstagram_hashtag_album_moderate']){
       $instance_enjoyinstagram_hashtag_album_moderate = implode(',',$instance['enjoyinstagram_hashtag_album_moderate']);
    }else{
			$instance_enjoyinstagram_hashtag_album_moderate = '';
		}


                do_shortcode('[enjoyinstagram_album_widget user_album="'.$instance_enjoyinstagram_user_album.'" user_album_hashtag="'.$instance['enjoyinstagram_album_user_hashtag_widget'].'" user_moderate_album = "'.$instance_enjoyinstagram_user_album_moderate.'" hashtag_album = "'.$instance['enjoyinstagram_hashtag_album'].'" hashtag_moderate_album = "'.$instance_enjoyinstagram_hashtag_album_moderate.'" enjoyinstagram_album_hover="'.$instance['enjoyinstagram_album_hover'].'" enjoyinstagram_album_link="'.$instance['enjoyinstagram_album_link'].'" enjoyinstagram_album_link_altro="'.$instance['enjoyinstagram_album_link_altro'].'" enjoyinstagram_album_hidebarsdelay="'.$instance['enjoyinstagram_album_hidebarsdelay'].'" enjoyinstagram_album_hidebarsmobile="'.$instance['enjoyinstagram_album_hidebarsmobile'].'" enjoyinstagram_album_likes_count="'.$instance['enjoyinstagram_album_likes_count'].'" enjoyinstagram_album_image_author="'.$instance['enjoyinstagram_album_image_author'].'" enjoyinstagram_album_random_angle="'.$instance['enjoyinstagram_album_random_angle'].'" enjoyinstagram_album_delay="'.$instance['enjoyinstagram_album_delay'].'" enjoyinstagram_album_margin="'.$instance['enjoyinstagram_album_margin'].'" enjoyinstagram_album_animation_in="'.$instance['enjoyinstagram_album_animation_in'].'" enjoyinstagram_album_animation_out="'.$instance['enjoyinstagram_album_animation_out'].'"]');




		echo $args['after_widget'];
	}




	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( ' EnjoyInstagram ', 'text_domain' );
		}



		$instance = wp_parse_args( (array) $instance, array(
		'enjoyinstagram_album_delay' => '150',
    'enjoyinstagram_album_hidebarsdelay' => '5000',
    'enjoyinstagram_album_margin' => '3',
    'enjoyinstagram_album_animation_in' => '2000',
    'enjoyinstagram_album_animation_out' => '2000',
    'enjoyinstagram_album_link' => 'swipebox',
    'enjoyinstagram_album_link_altro' => 'http://instagram.com',
		'enjoyinstagram_user_album' => '',
		'enjoyinstagram_user_album_moderate' => '',
		'enjoyinstagram_album_random_angle' => '',
		'enjoyinstagram_hashtag_album' => '',
		'enjoyinstagram_hashtag_album_moderate' => '',
		'enjoyinstagram_album_hidebarsmobile' => '',
		'enjoyinstagram_album_likes_count' => '',
		'enjoyinstagram_album_image_author' => '',
		'enjoyinstagram_album_user_hashtag_widget' => ''
                    ) );

		?>
<?php

$array_utenti = get_option('enjoy_instagram_options');
$array_users_moderate = get_option('users_moderate');
$array_hashtag_moderate = get_option('hashtag_moderate');
?>

 <div class="acco-block" >
     		<br />
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
     	</div>


       <div class="acco-block zebra" >
           <div class="enin-medium-header">SELECT USERS / HASHTAGS</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
              NOT MODERATE

            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <h4>Users:</h4>
                  <?php




                  if(is_array($array_utenti) && count($array_utenti)>0){

 foreach($array_utenti as $id=>$user) {
	 $singolo_utente = (array) $user;
if($singolo_utente['username']!=''){
   ?>

<input type="checkbox" name="<?php echo $this->get_field_name( 'enjoyinstagram_user_album'); ?>[]" id="<?php echo $this->get_field_id( 'enjoyinstagram_user_album').'-'.$id; ?>[]" value="<?php echo $singolo_utente['username']; ?>" <?php if($instance['enjoyinstagram_user_album']){if(in_array($singolo_utente['username'],$instance['enjoyinstagram_user_album'])){
        echo 'checked';
}} ?>/><?php echo $singolo_utente['username']; ?><br />


    <?php } }
        } ?>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <h4>Hashtag:</h4>
#<input type="text" id="<?php echo $this->get_field_id( 'enjoyinstagram_hashtag_album'); ?>" name="<?php echo $this->get_field_name( 'enjoyinstagram_hashtag_album'); ?>" value ="<?php echo esc_attr($instance['enjoyinstagram_hashtag_album']); ?>" style="width:90%;"/><br />
<span class="description" style="font-size:12px;">insert hashtags (without '#') separated by comma</span>
            </div>
            </div>
						<div>
						</br>Restrict by the following hashtags (without # and separated by comma)</br>
						<input type="text" name="<?php echo $this->get_field_name('enjoyinstagram_album_user_hashtag_widget'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_album_user_hashtag_widget'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_album_user_hashtag_widget']) ?>"/>
						</div>
     	</div>

         <div class="acco-block" >
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

             MODERATE
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <h4>Users (Moderate)</h4>
      <br />
      <?php
      if(is_array($array_users_moderate) && count($array_users_moderate)>0){
foreach($array_users_moderate as $id=>$singolo_utente_moderate) { ?>
<input type="checkbox" name="<?php echo $this->get_field_name( 'enjoyinstagram_user_album_moderate'); ?>[]" id="<?php echo $this->get_field_id( 'enjoyinstagram_user_album_moderate').'-'.$id; ?>[]" value="<?php echo $singolo_utente_moderate; ?>" <?php if($instance['enjoyinstagram_user_album_moderate']){if(in_array($singolo_utente_moderate,$instance['enjoyinstagram_user_album_moderate'])){
        echo 'checked';
}} ?>/><?php echo $singolo_utente_moderate; ?>  - moderated <br />

<?php }
        } ?>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <h4>Hashtag (Moderated)</h4>
             <?php
             if(is_array($array_hashtag_moderate) && count($array_hashtag_moderate)>0) {
foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
<input type="checkbox" name="<?php echo $this->get_field_name( 'enjoyinstagram_hashtag_album_moderate'); ?>[]" id="<?php echo $this->get_field_id( 'enjoyinstagram_hashtag_album_moderate').'-'.$id; ?>[]" value="<?php echo $singolo_hashtag_moderate; ?>" <?php if($instance['enjoyinstagram_hashtag_album_moderate']){if(in_array($singolo_hashtag_moderate,$instance['enjoyinstagram_hashtag_album_moderate'])){
        echo 'checked';
}} ?>/><?php echo $singolo_hashtag_moderate; ?>  - moderated <br />
        <?php } }
        ?>
            </div>
            </div>
     	</div>

         <div class="acco-block zebra" >
             <div class="enin-medium-header">GENERAL OPTIONS</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                On Hover show Likes Count <br />or Caption exceprt
                 <select name="<?php echo $this->get_field_name( 'enjoyinstagram_album_hover'); ?>" id="<?php echo $this->get_field_id( 'enjoyinstagram_album_hover'); ?>" class="ei_sel" style="width:150px;">
<option value="likes" <?php if(esc_attr($instance['enjoyinstagram_album_hover'])=='likes') echo "selected='selected'";?>>Likes Count</option>
<option value="exce" <?php if(esc_attr($instance['enjoyinstagram_album_hover'])=='exce') echo "selected='selected'";?>>Caption Exceprt</option>

                                 </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Random Angle:
                                                       <br />
                                                       <select name="<?php echo $this->get_field_name( 'enjoyinstagram_album_random_angle'); ?>" class="ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_album_random_angle'); ?>">
<option value="true" <?php if(esc_attr($instance['enjoyinstagram_album_random_angle'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
<option value="false" <?php if(esc_attr($instance['enjoyinstagram_album_random_angle'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Image Delay:
                                                               <br />
<input type="number" name="<?php echo $this->get_field_name( 'enjoyinstagram_album_delay'); ?>" class="ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_album_delay'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_album_delay']); ?>">
            </div>
            </div>

     	</div>

         <div class="acco-block" >
             <div class="enin-medium-header">WHEN YOU CLICK ON AN IMAGE</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

             Link Image to:
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_album_link'); ?>" value="swipebox" <?php if (esc_attr($instance['enjoyinstagram_album_link'])=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_album_link'); ?>" value="instagram" <?php if (esc_attr($instance['enjoyinstagram_album_link'])=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_album_link'); ?>" value="nolink" <?php if (esc_attr($instance['enjoyinstagram_album_link'])=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_album_link'); ?>" value="altro" <?php if (esc_attr($instance['enjoyinstagram_album_link'])=='altro')
                                        echo "checked";?>>Altro
                                <input type="text"  name="<?php echo $this->get_field_name('enjoyinstagram_album_link_altro'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_album_link_altro']); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_album_link_altro'); ?>" >
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">

            </div>
            </div>
     	</div>

          <div class="acco-block zebra" >
     		<div class="enin-medium-header">LIGHTBOX OPTIONS</div>
              <div class="acco-1-4">
            <div class="ei_settings_float_block">
                Hide Bars Delay: <br /><input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_album_hidebarsdelay']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_album_hidebarsdelay'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_album_hidebarsdelay'); ?>"> ms <br />( 0 to always show <br />caption and action bar )

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            Hide Bars On Mobile: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_album_hidebarsmobile'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_album_hidebarsmobile'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_album_hidebarsmobile'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_album_hidebarsmobile'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Show Likes Count: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_album_likes_count'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_album_likes_count'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_album_likes_count'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_album_likes_count'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
                <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                Show Author: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_album_image_author'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_album_image_author'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_album_image_author'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_album_image_author'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>


<div class="acco-block" >
                  <div class="enin-medium-header">ANIMATION</div>

            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Speed Animation In:<br />
<input type="number" name="<?php echo $this->get_field_name( 'enjoyinstagram_album_animation_in'); ?>" class="ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_album_animation_in'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_album_animation_in']); ?>"> ( ms )
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Speed Animation Out
<input type="number" name="<?php echo $this->get_field_name( 'enjoyinstagram_album_animation_out'); ?>" class="ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_album_animation_out'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_album_animation_out']); ?>"> ( ms )
            </div>
            </div>
     	</div>

             <div class="acco-block zebra" >
                 <div class="enin-medium-header">STYLE</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Margin of each Image

<input type="number" name="<?php echo $this->get_field_name('enjoyinstagram_album_margin'); ?>" class="ei_sel" value="<?php echo esc_attr($instance['enjoyinstagram_album_margin']); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_album_margin'); ?>"> (px)
            </div>
            </div>


     	</div>












		<?php
	}


	public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';




$instance['enjoyinstagram_user_album'] = $new_instance['enjoyinstagram_user_album'];

$instance['enjoyinstagram_hashtag_album'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_album'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_album'] ) : '';

$instance['enjoyinstagram_user_album_moderate'] = $new_instance['enjoyinstagram_user_album_moderate'];

$instance['enjoyinstagram_hashtag_album_moderate'] = $new_instance['enjoyinstagram_hashtag_album_moderate'];

$instance['enjoyinstagram_album_hover'] = ( ! empty( $new_instance['enjoyinstagram_album_hover'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_hover'] ) : '';

$instance['enjoyinstagram_album_link'] = ( ! empty( $new_instance['enjoyinstagram_album_link'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_link'] ) : '';

$instance['enjoyinstagram_album_link_altro'] = ( ! empty( $new_instance['enjoyinstagram_album_link_altro'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_link_altro'] ) : '';

$instance['enjoyinstagram_album_hidebarsdelay'] = ( ! empty( $new_instance['enjoyinstagram_album_hidebarsdelay'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_hidebarsdelay'] ) : '';

$instance['enjoyinstagram_album_hidebarsmobile'] = ( ! empty( $new_instance['enjoyinstagram_album_hidebarsmobile'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_hidebarsmobile'] ) : '';

$instance['enjoyinstagram_album_likes_count'] = ( ! empty( $new_instance['enjoyinstagram_album_likes_count'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_likes_count'] ) : '';


$instance['enjoyinstagram_album_image_author'] = ( ! empty( $new_instance['enjoyinstagram_album_image_author'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_image_author'] ) : '';

$instance['enjoyinstagram_album_random_angle'] = ( ! empty( $new_instance['enjoyinstagram_album_random_angle'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_random_angle'] ) : '';

$instance['enjoyinstagram_album_delay'] = ( ! empty( $new_instance['enjoyinstagram_album_delay'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_delay'] ) : '';

$instance['enjoyinstagram_album_margin'] = ( ! empty( $new_instance['enjoyinstagram_album_margin'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_margin'] ) : '';

$instance['enjoyinstagram_album_animation_in'] = ( ! empty( $new_instance['enjoyinstagram_album_animation_in'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_animation_in'] ) : '';

$instance['enjoyinstagram_album_animation_out'] = ( ! empty( $new_instance['enjoyinstagram_album_animation_out'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_animation_out'] ) : '';

$instance['enjoyinstagram_album_user_hashtag_widget'] = ( ! empty( $new_instance['enjoyinstagram_album_user_hashtag_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_album_user_hashtag_widget'] ) : '';


		return $instance;
	}

}

function register_Album_Widget() {
    register_widget( 'Album_Widget' );
}
add_action( 'widgets_init', 'register_Album_Widget' );



?>
