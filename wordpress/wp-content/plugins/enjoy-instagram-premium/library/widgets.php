<?php

class Slider_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'enjoyinstagram_widget_slider', // Base ID
			__('EnjoyInstagram - Carousel', 'text_domain'), // Name
			array( 'description' => __( 'EnjoyInstagram Widget for Carousel View', 'text_domain' ), ) // Args
		);
		add_action('wp_enqueue_scripts', array(&$this, 'js'));
	}




  function js(){

    if ( is_active_widget(false, false, $this->id_base, true) ) {
			wp_register_script('owl', plugins_url('../js/owl.carousel.min.js', __FILE__), 'jquery');
	    wp_register_script('swipebox', plugins_url('../js/jquery.swipebox.min.js', __FILE__), 'jquery', '');
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
	    wp_register_style('animate', plugins_url('../css/animate.min.css', __FILE__));
	    wp_register_style('component', plugins_url('../css/component.min.css', __FILE__));
	    wp_register_style('normalize', plugins_url('../css/normalize.min.css', __FILE__));
	    wp_register_style('style_stapel_1', plugins_url('../css/custom_stapel.min.css', __FILE__));
	    wp_register_style('style_stapel_3', plugins_url('../css/stapel.min.css', __FILE__));

	    wp_enqueue_style('owl_style');
	    wp_enqueue_style('owl_style_default');
	    wp_enqueue_style('owl_style_2');
	    wp_enqueue_style('owl_style_3');
	    wp_enqueue_style('swipebox_css');
	    wp_enqueue_style('animate');
	    wp_enqueue_style('component');
	    wp_enqueue_style('normalize');
	    wp_enqueue_style('style_stapel_1');
	    wp_enqueue_style('style_stapel_3');
    }
	}


	public function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', $instance['title'] );
			$first_select_enjoyinstagram_user_or_hashtag_widget = apply_filters( 'widget_content', $instance['first_select_enjoyinstagram_user_or_hashtag_widget'] );
			$enjoyinstagram_user_carousel_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_user_carousel_widget'] );
			$enjoyinstagram_user_carousel_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_user_carousel_moderate_widget'] );
			$enjoyinstagram_hashtag_popup_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_popup_widget'] );
			$enjoyinstagram_hashtag_popup_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_popup_moderate_widget'] );
			$enjoyinstagram_carousel_items_number = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_items_number'] );
			$enjoyinstagram_carousel_navigation = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_navigation'] );
			$enjoyinstagram_carousel_link = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_link'] );
			$enjoyinstagram_carousel_link_altro = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_link_altro'] );
			$enjoyinstagram_carousel_navigation_prev = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_navigation_prev'] );
			$enjoyinstagram_carousel_navigation_next = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_navigation_next'] );
			$enjoyinstagram_carousel_autoplay = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_autoplay'] );
			$enjoyinstagram_carousel_autoplay_speed = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_autoplay_speed'] );
			$enjoyinstagram_carousel_autoplay_timeout = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_autoplay_timeout'] );
			$enjoyinstagram_carousel_stop_on_hover = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_stop_on_hover'] );
			$enjoyinstagram_carousel_slidespeed = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_slidespeed'] );
			$enjoyinstagram_carousel_margin = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_margin'] );
			$enjoyinstagram_carousel_loop = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_loop'] );
			$enjoyinstagram_carousel_dots = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_dots'] );
			$enjoyinstagram_carousel_animatein = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_animatein'] );
			$enjoyinstagram_carousel_animateout = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_animateout'] );
			$enjoyinstagram_carousel_likes_count = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_likes_count'] );
			$enjoyinstagram_carousel_image_author = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_image_author'] );
			$enjoyinstagram_carousel_hidebarsmobile = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_hidebarsmobile'] );
			$enjoyinstagram_carousel_hidebarsdelay = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_hidebarsdelay'] );
			$enjoyinstagram_carousel_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_moderate_widget'] );
			$enjoyinstagram_carousel_autoreload = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_autoreload'] );
			$enjoyinstagram_carousel_autoreload_value = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_autoreload_value'] );
			$enjoyinstagram_user_carousel_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_user_carousel_moderate_widget'] );
			$enjoyinstagram_hashtag_popup_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_popup_moderate_widget'] );
			$enjoyinstagram_carousel_user_hashtag_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_carousel_user_hashtag_widget'] );


		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		do_shortcode('[enjoyinstagram_carousel_widget type="'.$instance['first_select_enjoyinstagram_user_or_hashtag_widget'].'" user="'.$instance['enjoyinstagram_user_carousel_widget'].'" user_hashtag="'.$instance['enjoyinstagram_carousel_user_hashtag_widget'].'" hashtag="'.$instance['enjoyinstagram_hashtag_popup_widget'].'" enjoyinstagram_carousel_link="'.$instance['enjoyinstagram_carousel_link'].'" enjoyinstagram_carousel_link_altro="'.$instance['enjoyinstagram_carousel_link_altro'].'" enjoyinstagram_carousel_items_number="'.$instance['enjoyinstagram_carousel_items_number'].'" enjoyinstagram_carousel_navigation="'.$instance['enjoyinstagram_carousel_navigation'].'" enjoyinstagram_carousel_1024px="'.$instance['enjoyinstagram_carousel_items_number'].'" enjoyinstagram_carousel_768px="'.$instance['enjoyinstagram_carousel_items_number'].'" enjoyinstagram_carousel_600px="'.$instance['enjoyinstagram_carousel_items_number'].'" enjoyinstagram_carousel_480px="'.$instance['enjoyinstagram_carousel_items_number'].'" enjoyinstagram_carousel_navigation_prev="'.$instance['enjoyinstagram_carousel_navigation_prev'].'" enjoyinstagram_carousel_navigation_next="'.$instance['enjoyinstagram_carousel_navigation_next'].'" enjoyinstagram_carousel_autoplay="'.$instance['enjoyinstagram_carousel_autoplay'].'" enjoyinstagram_carousel_autoplay_speed="'.$instance['enjoyinstagram_carousel_autoplay_speed'].'" enjoyinstagram_carousel_autoplay_timeout="'.$instance['enjoyinstagram_carousel_autoplay_timeout'].'" enjoyinstagram_carousel_stop_on_hover="'.$instance['enjoyinstagram_carousel_stop_on_hover'].'" enjoyinstagram_carousel_slidespeed="'.$instance['enjoyinstagram_carousel_slidespeed'].'" enjoyinstagram_carousel_margin="'.$instance['enjoyinstagram_carousel_margin'].'" enjoyinstagram_carousel_loop="'.$instance['enjoyinstagram_carousel_loop'].'" enjoyinstagram_carousel_dots="'.$instance['enjoyinstagram_carousel_dots'].'" enjoyinstagram_carousel_animatein="'.$instance['enjoyinstagram_carousel_animatein'].'" enjoyinstagram_carousel_animateout="'.$instance['enjoyinstagram_carousel_animateout'].'" enjoyinstagram_carousel_likes_count="'.$instance['enjoyinstagram_carousel_likes_count'].'" enjoyinstagram_carousel_image_author="'.$instance['enjoyinstagram_carousel_image_author'].'" enjoyinstagram_carousel_hidebarsmobile="'.$instance['enjoyinstagram_carousel_hidebarsmobile'].'" enjoyinstagram_carousel_hidebarsdelay="'.$instance['enjoyinstagram_carousel_hidebarsdelay'].'" enjoyinstagram_carousel_moderate="'.$instance['enjoyinstagram_carousel_moderate_widget'].'" enjoyinstagram_carousel_autoreload="'.$instance['enjoyinstagram_carousel_autoreload'].'" enjoyinstagram_carousel_autoreload_value="'.$instance['enjoyinstagram_carousel_autoreload_value'].'" enjoyinstagram_user_carousel_moderate_widget="'.$instance['enjoyinstagram_user_carousel_moderate_widget'].'" enjoyinstagram_hashtag_popup_moderate_widget="'.$instance['enjoyinstagram_hashtag_popup_moderate_widget'].'"]');


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
								'first_select_enjoyinstagram_user_or_hashtag_widget' => 'user',
								'enjoyinstagram_carousel_moderate_widget' => 'false',
								'enjoyinstagram_carousel_items_number' => '4',
                'enjoyinstagram_carousel_link' => 'swipebox',
								'enjoyinstagram_carousel_link_altro'=> 'http://instagram.com',
                'enjoyinstagram_carousel_navigation' => 'true',
                'enjoyinstagram_carousel_navigation_prev' => 'prev',
                'enjoyinstagram_carousel_navigation_next' => 'next',
                'enjoyinstagram_carousel_autoplay' => 'false',
                'enjoyinstagram_carousel_stop_on_hover' => 'false',
                'enjoyinstagram_carousel_autoplay_timeout' => '3000',
                'enjoyinstagram_carousel_autoplay_speed' => '3000',
                'enjoyinstagram_carousel_slidespeed' => '2000',
                'enjoyinstagram_carousel_dots' => 'true',
                'enjoyinstagram_carousel_loop' => 'true',
                'enjoyinstagram_carousel_hidebarsdelay' => '5000',
                'enjoyinstagram_carousel_hidebarsmobile' => 'true',
                'enjoyinstagram_carousel_likes_count' => 'true',
                'enjoyinstagram_carousel_image_author' => 'true',
                'enjoyinstagram_carousel_autoreload' => 'true',
                'enjoyinstagram_carousel_autoreload_value' => '30000',
                'enjoyinstagram_carousel_margin' => '5',
								'enjoyinstagram_user_carousel_widget' => '',
								'enjoyinstagram_carousel_animatein' => '',
								'enjoyinstagram_carousel_animateout' => '',
								'enjoyinstagram_carousel_user_hashtag_widget' => ''

                    ) );

		?>
<?php
$array_utenti = get_option('enjoy_instagram_options');
$array_users_moderate = get_option('users_moderate');
$array_hashtag_moderate = get_option('hashtag_moderate');
?>

<div class="acco-block-widget">
    <div class="acco-block">
        <br />
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</div>
    <div class="acco-block zebra" style="padding-top: 20px;">
    <div class="ei_settings_float_block">
                            <img src="<?php echo plugins_url('images/moderation.png',__FILE__); ?>" width="80">
                                </div>Moderate: <br />
<select name="<?php echo $this->get_field_name( 'enjoyinstagram_carousel_moderate_widget'); ?>" class="class_enjoyinstagram_carousel_moderate_widget ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_carousel_moderate_widget'); ?>">

<option value="false" <?php if(esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='false') echo 'selected'; ?>> No </option>
<option value="true" <?php if(esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='true') echo 'selected'; ?>> Yes </option>
</select>
</div>
                 <div class="acco-block" >
                     <div class="enin-medium-header">Show Pics:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

             <div id="<?php echo $this->get_field_id( 'div_enjoyinstagram_user_or_hashtag_widget'); ?>">
<input type="radio" name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_widget'); ?>"  value="user" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='user') echo 'checked'; ?>>of Your Profile<br/>
<input type="radio"  name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_widget'); ?>"  value="hashtag" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='hashtag') echo 'checked'; ?>>by Hashtag<br />
<input type="radio"  name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_widget'); ?>"  value="likes" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='likes') echo 'checked'; ?> <?php if(esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='true') echo 'disabled = true'; ?>>Favourites<br />
                   </div>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">


            <div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_user_carousel_widget'); ?>" >

<select id="<?php echo $this->get_field_id('enjoyinstagram_user_carousel_widget'); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_user_carousel_widget'); ?>" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='true') echo 'style="display:none;"'; ?>>
                                                     <?php


                                                     foreach($array_utenti as $user) {
																										 		$singolo_utente = (array) $user;
                                                         if($singolo_utente[username]!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>" <?php if(esc_attr($instance['enjoyinstagram_user_carousel_widget']) == $singolo_utente['username']) echo 'selected'; ?>><?php echo $singolo_utente['username']; ?></option>
                                                     <?php } } ?>
</select>
<div <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='true' || (esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='likes')) echo 'style="display:none;"'; ?>>
</br>Restrict by the following hashtags (without # and separated by comma)</br>
<input type="text" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_user_hashtag_widget'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_user_hashtag_widget'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_user_hashtag_widget']) ?>"/>
</div>
</div>
<div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget'); ?>" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='false') echo 'style="display:none;"'; ?>>


<select id="<?php echo $this->get_field_id('enjoyinstagram_user_carousel_moderate_widget'); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_user_carousel_moderate_widget'); ?>">
                                                     <?php


foreach($array_users_moderate as $singolo_utente_moderate) { ?>
    <option value ="<?php echo $singolo_utente_moderate; ?>" <?php if(esc_attr($instance['enjoyinstagram_user_carousel_moderate_widget']) == $singolo_utente_moderate) echo 'selected'; ?>><?php echo $singolo_utente_moderate; ?> - Moderated</option>
<?php } ?>
                                                 </select>
                                                 <br />
You can add others moderated user going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>
</div>

<div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_hashtag_carousel_widget'); ?>" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='user' || esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='true') echo 'style="display:none;"'; ?>>
#<input type="text" id="<?php echo $this->get_field_id('enjoyinstagram_hashtag_popup_widget'); ?>" required name="<?php echo $this->get_field_name('enjoyinstagram_hashtag_popup_widget'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_hashtag_popup_widget']); ?>"/>
 						<span class="description">insert a hashtag without '#'</span>

</div>
<div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget'); ?>" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_widget'])=='user' || esc_attr($instance['enjoyinstagram_carousel_moderate_widget'])=='false') echo 'style="display:none;"'; ?>>


<select id="<?php echo $this->get_field_id('enjoyinstagram_hashtag_popup_moderate_widget'); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_hashtag_popup_moderate_widget'); ?>">
<?php
foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
<option value ="<?php echo $singolo_hashtag_moderate; ?>" <?php if(esc_attr($instance['enjoyinstagram_hashtag_popup_moderate_widget']) == $singolo_hashtag_moderate) echo 'selected'; ?>><?php echo $singolo_hashtag_moderate; ?> - Moderated</option>
<?php } ?>
</select>
                                                 <br />
You can add others moderated hashtag going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>


</div>
            </div>
            </div>

                </div>


                 <div class="acco-block zebra" >
                     <div class="enin-medium-header">GENERAL OPTIONS:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

             Images displayed at a time: <br />
             <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_items_number'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_items_number'); ?>">
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if(esc_attr($instance['enjoyinstagram_carousel_items_number'])==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
</select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Animate In: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_animatein'); ?>"  id="<?php echo $this->get_field_id('enjoyinstagram_carousel_animatein'); ?>">
          <option value="bounceIn" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='bounceIn') echo "selected='selected'";?>>bounceIn</option>
          <option value="bounceInDown" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='bounceInDown') echo "selected='selected'";?>>bounceInDown</option>
          <option value="bounceInLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='bounceInLeft') echo "selected='selected'";?>>bounceInLeft</option>
          <option value="bounceInRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='bounceInRight') echo "selected='selected'";?>>bounceInRight</option>
          <option value="bounceInUp" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='bounceInUp') echo "selected='selected'";?>>bounceInUp</option>
          <option value="fadeIn" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeIn') echo "selected='selected'";?>>fadeIn</option>
          <option value="fadeInDown" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInDown') echo "selected='selected'";?>>fadeInDown</option>
          <option value="fadeInDownBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInDownBig') echo "selected='selected'";?>>fadeInDownBig</option>
          <option value="fadeInLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInLeft') echo "selected='selected'";?>>fadeInLeft</option>
          <option value="fadeInLeftBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInLeftBig') echo "selected='selected'";?>>fadeInLeftBig</option>
          <option value="fadeInRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInRight') echo "selected='selected'";?>>fadeInRight</option>
          <option value="fadeInRightBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInRightBig') echo "selected='selected'";?>>fadeInRightBig</option>
          <option value="fadeInUp" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInUp') echo "selected='selected'";?>>fadeInUp</option>
          <option value="fadeInUpBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='fadeInUpBig') echo "selected='selected'";?>>fadeInUpBig</option>
          <option value="flipInX" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='flipInX') echo "selected='selected'";?>>flipInX</option>
          <option value="flipInY" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='flipInY') echo "selected='selected'";?>>flipInY</option>
          <option value="lightSpeedIn" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='lightSpeedIn') echo "selected='selected'";?>>lightSpeedIn</option>
          <option value="rotateIn" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='rotateIn') echo "selected='selected'";?>>rotateIn</option>
          <option value="rotateInDownLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='rotateInDownLeft') echo "selected='selected'";?>>rotateInDownLeft</option>
          <option value="rotateInDownRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='rotateInDownRight') echo "selected='selected'";?>>rotateInDownRight</option>
          <option value="rotateInUpLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='rotateInUpLeft') echo "selected='selected'";?>>rotateInUpLeft</option>
          <option value="rotateInUpRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='rotateInUpRight') echo "selected='selected'";?>>rotateInUpRight</option>
          <option value="slideInDown" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='slideInDown') echo "selected='selected'";?>>slideInDown</option>
          <option value="slideInLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='slideInLeft') echo "selected='selected'";?>>slideInLeft</option>
          <option value="slideInRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animatein'])=='slideInRight') echo "selected='selected'";?>>slideInRight</option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Animate Out: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_animateout'); ?>"  id="<?php echo $this->get_field_id('enjoyinstagram_carousel_animateout'); ?>">
          <option value="bounceOut" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='bounceOut') echo "selected='selected'";?>>bounceOut</option>
          <option value="bounceOutDown" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='bounceOutDown') echo "selected='selected'";?>>bounceOutDown</option>
          <option value="bounceOutLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='bounceOutLeft') echo "selected='selected'";?>>bounceOutLeft</option>
          <option value="bounceOutRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='bounceOutRight') echo "selected='selected'";?>>bounceOutRight</option>
          <option value="bounceOutUp" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='bounceOutUp') echo "selected='selected'";?>>bounceOutUp</option>
          <option value="fadeOut" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOut') echo "selected='selected'";?>>fadeOut</option>
          <option value="fadeOutDown" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutDown') echo "selected='selected'";?>>fadeOutDown</option>
          <option value="fadeOutDownBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutDownBig') echo "selected='selected'";?>>fadeOutDownBig</option>
          <option value="fadeOutLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutLeft') echo "selected='selected'";?>>fadeOutLeft</option>
          <option value="fadeOutLeftBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutLeftBig') echo "selected='selected'";?>>fadeOutLeftBig</option>
          <option value="fadeOutRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutRight') echo "selected='selected'";?>>fadeOutRight</option>
          <option value="fadeOutRightBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutRightBig') echo "selected='selected'";?>>fadeOutRightBig</option>
          <option value="fadeOutUp" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutUp') echo "selected='selected'";?>>fadeOutUp</option>
          <option value="fadeOutUpBig" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='fadeOutUpBig') echo "selected='selected'";?>>fadeOutUpBig</option>
          <option value="flipOutX" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='flipOutX') echo "selected='selected'";?>>flipOutX</option>
          <option value="flipOutY" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='flipOutY') echo "selected='selected'";?>>flipOutY</option>
          <option value="lightSpeedOut" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='lightSpeedOut') echo "selected='selected'";?>>lightSpeedOut</option>
          <option value="rotateOut" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='rotateOut') echo "selected='selected'";?>>rotateOut</option>
          <option value="rotateOutDownLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='rotateOutDownLeft') echo "selected='selected'";?>>rotateOutDownLeft</option>
          <option value="rotateOutDownRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='rotateOutDownRight') echo "selected='selected'";?>>rotateOutDownRight</option>
          <option value="rotateOutUpLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='rotateOutUpLeft') echo "selected='selected'";?>>rotateOutUpLeft</option>
          <option value="rotateOutUpRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='rotateOutUpRight') echo "selected='selected'";?>>rotateOutUpRight</option>
          <option value="slideOutLeft" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='slideOutLeft') echo "selected='selected'";?>>slideOutLeft</option>
          <option value="slideOutRight" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='slideOutRight') echo "selected='selected'";?>>slideOutRight</option>
          <option value="slideOutUp" <?php if (esc_attr($instance['enjoyinstagram_carousel_animateout'])=='slideOutUp') echo "selected='selected'";?>>slideOutUp</option>
                                </select>
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
            <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_link'); ?>" value="swipebox" <?php if (esc_attr($instance['enjoyinstagram_carousel_link'])=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_link'); ?>" value="instagram" <?php if (esc_attr($instance['enjoyinstagram_carousel_link'])=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_link'); ?>" value="nolink" <?php if (esc_attr($instance['enjoyinstagram_carousel_link'])=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_link'); ?>" value="altro" <?php if (esc_attr($instance['enjoyinstagram_carousel_link'])=='altro')
                                        echo "checked";?>>Altro
                                <input type="text"  name="<?php echo $this->get_field_name('enjoyinstagram_carousel_link_altro'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_link_altro']); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_link_altro'); ?>" >
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">

            </div>
            </div>
     	</div>

                  <div class="acco-block zebra" >
                      <div class="enin-medium-header">Carousel Navigation</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
               Navigation buttons:
               <br />
                                <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_navigation'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_navigation'); ?>">
<option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_navigation'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
<option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_navigation'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Prev Button Text: <br /><input type="text" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_navigation_prev']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_navigation_prev'); ?>"  id="<?php echo $this->get_field_id('enjoyinstagram_carousel_navigation_prev'); ?>">
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Next Button Text: <br /><input type="text" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_navigation_next']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_navigation_next'); ?>"  id="<?php echo $this->get_field_id('enjoyinstagram_carousel_navigation_next'); ?>">
            </div>
            </div>
                        </div>
    <div class="acco-block zebra" style="margin-top: -15px;" >
                      <div class="acco-1-3">
            <div class="ei_settings_float_block">
              Slide Speed (milliseconds):
               <br />
<input type="number" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_slidespeed'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_slidespeed']); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_slidespeed'); ?>"> ms
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Dots:
            <br />
                                <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_dots'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_dots'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_dots'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_dots'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Loop:
            <br />
                                <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_loop'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_loop'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_loop'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_loop'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
                      </div>


                 <div class="acco-block" >
                     <div class="enin-medium-header">Autoplay</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Auto Play:
            <br />
                                <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_autoplay'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_autoplay'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_autoplay'])=='true') echo "selected='selected'";?>>Yes</option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_autoplay'])=='false') echo "selected='selected'";?>>No</option>
                                </select>
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            Stop on Hover: <br />
                                        <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_stop_on_hover'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_stop_on_hover'); ?>">
<option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_stop_on_hover'])=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_stop_on_hover'])=='false') echo "selected='selected'";?>>No</option>
</select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Timeout Autoplay:<br />
<input type="number" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_autoplay_timeout'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_autoplay_timeout'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_autoplay_timeout']); ?>" class="ei_sel"><br />
            </div>
            </div>
                     <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                        Speed Autoplay:<br />
<input type="number" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_autoplay_speed'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_autoplay_speed'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_autoplay_speed']); ?>" class="ei_sel">
            </div>
            </div>
     	</div>




     <div class="acco-block" >
         <div class="enin-medium-header">LIGHTBOX OPTIONS:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                Hide Bars Delay: <br /><input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_hidebarsdelay']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_hidebarsdelay'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_hidebarsdelay'); ?>">ms <br />( 0 to always show <br />caption and action bar )

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                   Hide Bars On Mobile: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_hidebarsmobile'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_hidebarsmobile'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_hidebarsmobile'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_hidebarsmobile'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">

                Show Likes Count: <br /> <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_likes_count'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_likes_count'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_likes_count'])=='true') echo "selected='selected'";?>>Yes
                                    </option><br />
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_likes_count'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
         <div class="acco-1-4">
            <div class="ei_settings_float_block">


                Show Author: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_image_author'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_image_author'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_image_author'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_image_author'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>

      <div class="acco-block zebra" >
           <div class="enin-medium-header">AUTORELOAD</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

            Do you wanna reload content ?
            <br />
            <select name="<?php echo $this->get_field_name('enjoyinstagram_carousel_autoreload'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_autoreload'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_carousel_autoreload'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_carousel_autoreload'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Time to Reload<br /><input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_autoreload_value']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_autoreload_value'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_autoreload_value'); ?>"> ( ms )
            </div>
            </div>

     	</div>
       <div class="acco-block" >
           <div class="enin-medium-header">STYLE</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Margin of each Image:<br />
            <input type="number" name="<?php echo $this->get_field_name('enjoyinstagram_carousel_margin'); ?>" class="ei_sel" value="<?php echo esc_attr($instance['enjoyinstagram_carousel_margin']); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_carousel_margin'); ?>"> (px)
            </div>
            </div>
     	</div>


 	</div>



		<?php
	}


	public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['first_select_enjoyinstagram_user_or_hashtag_widget'] = ( ! empty( $new_instance['first_select_enjoyinstagram_user_or_hashtag_widget'] ) ) ? strip_tags( $new_instance['first_select_enjoyinstagram_user_or_hashtag_widget'] ) : '';


$instance['enjoyinstagram_user_carousel_widget'] = ( ! empty( $new_instance['enjoyinstagram_user_carousel_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_user_carousel_widget'] ) : '';

$instance['enjoyinstagram_user_carousel_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_user_carousel_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_user_carousel_moderate_widget'] ) : '';

$instance['enjoyinstagram_hashtag_popup_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_widget'] ) : '';

$instance['enjoyinstagram_hashtag_popup_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) : '';

$instance['enjoyinstagram_carousel_items_number'] = ( ! empty( $new_instance['enjoyinstagram_carousel_items_number'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_items_number'] ) : '';

$instance['enjoyinstagram_carousel_navigation'] = ( ! empty( $new_instance['enjoyinstagram_carousel_navigation'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_navigation'] ) : '';

$instance['enjoyinstagram_carousel_link'] = ( ! empty( $new_instance['enjoyinstagram_carousel_link'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_link'] ) : '';

$instance['enjoyinstagram_carousel_link_altro'] = ( ! empty( $new_instance['enjoyinstagram_carousel_link_altro'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_link_altro'] ) : '';

$instance['enjoyinstagram_carousel_navigation_prev'] = ( ! empty( $new_instance['enjoyinstagram_carousel_navigation_prev'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_navigation_prev'] ) : '';

$instance['enjoyinstagram_carousel_navigation_next'] = ( ! empty( $new_instance['enjoyinstagram_carousel_navigation_next'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_navigation_next'] ) : '';

$instance['enjoyinstagram_carousel_autoplay'] = ( ! empty( $new_instance['enjoyinstagram_carousel_autoplay'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_autoplay'] ) : '';

$instance['enjoyinstagram_carousel_autoplay_speed'] = ( ! empty( $new_instance['enjoyinstagram_carousel_autoplay_speed'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_autoplay_speed'] ) : '';

$instance['enjoyinstagram_carousel_autoplay_timeout'] = ( ! empty( $new_instance['enjoyinstagram_carousel_autoplay_timeout'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_autoplay_timeout'] ) : '';

$instance['enjoyinstagram_carousel_stop_on_hover'] = ( ! empty( $new_instance['enjoyinstagram_carousel_stop_on_hover'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_stop_on_hover'] ) : '';

$instance['enjoyinstagram_carousel_slidespeed'] = ( ! empty( $new_instance['enjoyinstagram_carousel_slidespeed'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_slidespeed'] ) : '';

$instance['enjoyinstagram_carousel_margin'] = ( ! empty( $new_instance['enjoyinstagram_carousel_margin'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_margin'] ) : '';

$instance['enjoyinstagram_carousel_loop'] = ( ! empty( $new_instance['enjoyinstagram_carousel_loop'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_loop'] ) : '';

$instance['enjoyinstagram_carousel_dots'] = ( ! empty( $new_instance['enjoyinstagram_carousel_dots'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_dots'] ) : '';

$instance['enjoyinstagram_carousel_animatein'] = ( ! empty( $new_instance['enjoyinstagram_carousel_animatein'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_animatein'] ) : '';

$instance['enjoyinstagram_carousel_animateout'] = ( ! empty( $new_instance['enjoyinstagram_carousel_animateout'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_animateout'] ) : '';

$instance['enjoyinstagram_carousel_likes_count'] = ( ! empty( $new_instance['enjoyinstagram_carousel_likes_count'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_likes_count'] ) : '';

$instance['enjoyinstagram_carousel_image_author'] = ( ! empty( $new_instance['enjoyinstagram_carousel_image_author'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_image_author'] ) : '';

$instance['enjoyinstagram_carousel_hidebarsmobile'] = ( ! empty( $new_instance['enjoyinstagram_carousel_hidebarsmobile'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_hidebarsmobile'] ) : '';

$instance['enjoyinstagram_carousel_hidebarsdelay'] = ( ! empty( $new_instance['enjoyinstagram_carousel_hidebarsdelay'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_hidebarsdelay'] ) : '';

$instance['enjoyinstagram_carousel_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_carousel_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_moderate_widget'] ) : '';

$instance['enjoyinstagram_carousel_autoreload'] = ( ! empty( $new_instance['enjoyinstagram_carousel_autoreload'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_autoreload'] ) : '';

$instance['enjoyinstagram_carousel_autoreload_value'] = ( ! empty( $new_instance['enjoyinstagram_carousel_autoreload_value'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_autoreload_value'] ) : '';

$instance['enjoyinstagram_user_carousel_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_user_carousel_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_user_carousel_moderate_widget'] ) : '';

$instance['enjoyinstagram_hashtag_popup_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) : '';

$instance['enjoyinstagram_carousel_user_hashtag_widget'] = ( ! empty( $new_instance['enjoyinstagram_carousel_user_hashtag_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_carousel_user_hashtag_widget'] ) : '';

		return $instance;
	}

}

function register_Slider_Widget() {
    register_widget( 'Slider_Widget' );
}
add_action( 'widgets_init', 'register_Slider_Widget' );



?>
