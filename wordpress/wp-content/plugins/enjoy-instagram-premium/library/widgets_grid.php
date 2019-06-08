<?php


class Grid_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'enjoyinstagram_widget_grid', // Base ID
			__('EnjoyInstagram - Grid', 'text_domain'), // Name
			array( 'description' => __( 'EnjoyInstagram Widget for Grif View', 'text_domain' ), ) // Args
		);
		add_action('wp_enqueue_scripts', array(&$this, 'js'));

	}

	function js(){

		if ( is_active_widget(false, false, $this->id_base, true) ) {
			wp_register_script('swipebox', plugins_url('../js/jquery.swipebox.min.js', __FILE__), 'jquery', '');
			wp_register_script('gridrotator', plugins_url('../js/jquery.gridrotator.min.js', __FILE__), 'jquery', '');
			wp_register_script('modernizr.custom.26633', plugins_url('../js/modernizr.custom.26633.min.js', __FILE__), 'jquery', '');
			wp_register_script('orientationchange', plugins_url('../js/ios-orientationchange-fix.min.js', __FILE__), 'jquery', '');
			wp_register_script('classie', plugins_url('../js/classie.min.js', __FILE__), 'jquery', '');
			wp_register_script('modernizer', plugins_url('../js/modernizr.min.js', __FILE__), 'jquery', '');
			wp_register_script('photostack', plugins_url('../js/photostack.min.js', __FILE__), 'jquery', '');

			wp_enqueue_script('jquery'); // include jQuery
			wp_enqueue_script('swipebox');
			wp_enqueue_script('modernizr.custom.26633');
			wp_enqueue_script('gridrotator');
		 	wp_localize_script('gridrotator', 'GridRotator', array('pluginsUrl' => plugins_url(),));
			wp_enqueue_script('orientationchange');
			wp_enqueue_script('modernizer');
			wp_enqueue_script('classie');
			wp_enqueue_script('photostack');


			wp_register_style('swipebox_css', plugins_url('../css/swipebox.min.css', __FILE__));
			wp_register_style('grid_fallback', plugins_url('../css/grid_fallback.min.css', __FILE__));
			wp_register_style('grid_style', plugins_url('../css/grid_style.min.css', __FILE__));
			wp_register_style('component', plugins_url('../css/component.min.css', __FILE__));
			wp_register_style('normalize', plugins_url('../css/normalize.min.css', __FILE__));

			wp_enqueue_style('swipebox_css');
			wp_enqueue_style('grid_fallback');
			wp_enqueue_style('grid_style');
			wp_enqueue_style('component');
			wp_enqueue_style('normalize');

		}
	}


	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance['title'] );
		$first_select_enjoyinstagram_user_or_hashtag_grid_widget = apply_filters( 'widget_content', $instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'] );
		$enjoyinstagram_user_grid_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_user_grid_widget'] );
		$enjoyinstagram_user_grid_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_user_grid_moderate_widget'] );
		$enjoyinstagram_hashtag_popup_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_popup_widget'] );
		$enjoyinstagram_grid_moderate_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_moderate_widget'] );
		$enjoyinstagram_hashtag_popup_grid_moderate_widget = (isset($instance['enjoyinstagram_hashtag_popup_grid_moderate_widget'])) ? apply_filters( 'widget_content', $instance['enjoyinstagram_hashtag_popup_grid_moderate_widget'] ) : '';
		$enjoyinstagram_grid_cols = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_cols'] );
		$enjoyinstagram_grid_rows = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_rows'] );
		if(isset($enjoyinstagram_grid_margin)) $enjoyinstagram_grid_margin = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_margin'] );
		$enjoyinstagram_grid_link = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_link'] );
		$enjoyinstagram_grid_link_altro = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_link_altro'] );
		$enjoyinstagram_grid_step = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_step'] );
		$enjoyinstagram_grid_animation = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_animation'] );
		$enjoyinstagram_grid_animation_speed = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_animation_speed'] );
		$enjoyinstagram_grid_interval = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_interval'] );
		$enjoyinstagram_grid_onhover = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_onhover'] );
		$enjoyinstagram_grid_likes_count = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_likes_count'] );
		$enjoyinstagram_grid_image_author = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_image_author'] );
		$enjoyinstagram_grid_hidebarsmobile = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_hidebarsmobile'] );
		$enjoyinstagram_grid_hidebarsdelay = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_hidebarsdelay'] );
		$enjoyinstagram_grid_autoreload = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_autoreload'] );
		$enjoyinstagram_grid_autoreload_value = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_autoreload_value'] );
		$enjoyinstagram_grid_user_hashtag_widget = apply_filters( 'widget_content', $instance['enjoyinstagram_grid_user_hashtag_widget'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			do_shortcode('[enjoyinstagram_grid_widget type_grid="'.$instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'].'" user_grid="'.$instance['enjoyinstagram_user_grid_widget'].'" user_grid_hashtag="'.$instance['enjoyinstagram_grid_user_hashtag_widget'].'" hashtag_grid="'.$instance['enjoyinstagram_hashtag_popup_widget'].'" enjoyinstagram_grid_cols="'.$instance['enjoyinstagram_grid_cols'].'" enjoyinstagram_grid_rows="'.$instance['enjoyinstagram_grid_rows'].'" enjoyinstagram_grid_margin="'.$instance['enjoyinstagram_grid_margin'].'" enjoyinstagram_grid_step="'.$instance['enjoyinstagram_grid_step'].'" enjoyinstagram_grid_animation="'.$instance['enjoyinstagram_grid_animation'].'" enjoyinstagram_grid_animation_speed="'.$instance['enjoyinstagram_grid_animation_speed'].'" enjoyinstagram_grid_interval="'.$instance['enjoyinstagram_grid_interval'].'" enjoyinstagram_grid_onhover="'.$instance['enjoyinstagram_grid_onhover'].'" enjoyinstagram_grid_cols_480px="'.$instance['enjoyinstagram_grid_cols'].'" enjoyinstagram_grid_rows_480px="'.$instance['enjoyinstagram_grid_rows'].'" enjoyinstagram_grid_cols_600px="'.$instance['enjoyinstagram_grid_cols'].'" enjoyinstagram_grid_rows_600px="'.$instance['enjoyinstagram_grid_rows'].'" enjoyinstagram_grid_cols_768px="'.$instance['enjoyinstagram_grid_cols'].'" enjoyinstagram_grid_rows_768px="'.$instance['enjoyinstagram_grid_rows'].'" enjoyinstagram_grid_cols_1024px="'.$instance['enjoyinstagram_grid_cols'].'" enjoyinstagram_grid_rows_1024px="'.$instance['enjoyinstagram_grid_rows'].'" enjoyinstagram_grid_link="'.$instance['enjoyinstagram_grid_link'].'" enjoyinstagram_grid_link_altro="'.$instance['enjoyinstagram_grid_link_altro'].'" enjoyinstagram_grid_likes_count="'.$instance['enjoyinstagram_grid_likes_count'].'" enjoyinstagram_grid_image_author="'.$instance['enjoyinstagram_grid_image_author'].'" enjoyinstagram_grid_hidebarsmobile="'.$instance['enjoyinstagram_grid_hidebarsmobile'].'" enjoyinstagram_grid_hidebarsdelay="'.$instance['enjoyinstagram_grid_hidebarsdelay'].'" enjoyinstagram_grid_autoreload="'.$instance['enjoyinstagram_grid_autoreload'].'" enjoyinstagram_grid_autoreload_value="'.$instance['enjoyinstagram_grid_autoreload_value'].'" enjoyinstagram_grid_moderate_widget="'.$instance['enjoyinstagram_grid_moderate_widget'].'" enjoyinstagram_user_grid_moderate="'.$instance['enjoyinstagram_user_grid_moderate_widget'].'" enjoyinstagram_hashtag_popup_grid_moderate="'.$instance['enjoyinstagram_hashtag_popup_moderate_widget'].'"]');


		echo $args['after_widget'];
	}



	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'EnjoyInstagram', 'text_domain' );
		}
		$instance = wp_parse_args( (array) $instance, array(
						'first_select_enjoyinstagram_user_or_hashtag_grid_widget' => 'user',
						'enjoyinstagram_grid_cols' => '4',
				    'enjoyinstagram_grid_rows' => '2',
						'enjoyinstagram_grid_margin' => '0',
						'enjoyinstagram_grid_link' => 'swipebox',
				    'enjoyinstagram_grid_link_altro' => 'http://instagram.com',
				    'enjoyinstagram_grid_step' => 'random',
				    'enjoyinstagram_grid_animation' => 'random',
				    'enjoyinstagram_grid_animation_speed' => '1500',
				    'enjoyinstagram_grid_interval' => '5000',
				    'enjoyinstagram_grid_onhover' => 'false',
				    'enjoyinstagram_grid_likes_count' => 'true',
				    'enjoyinstagram_grid_image_author' => 'true',
				    'enjoyinstagram_grid_hidebarsmobile' => 'true',
				    'enjoyinstagram_grid_hidebarsdelay' => '5000',
				    'enjoyinstagram_grid_autoreload' => 'true',
				    'enjoyinstagram_grid_autoreload_value' => '30000',
						'enjoyinstagram_grid_moderate_widget' => '',
						'enjoyinstagram_user_grid_widget' => '',
						'enjoyinstagram_user_grid_moderate_widget' => '',
						'enjoyinstagram_grid_user_hashtag_widget' => ''
		 ) );
		 ?>

<?php
$array_utenti = get_option('enjoy_instagram_options');
$array_users_moderate = get_option('users_moderate');
$array_hashtag_moderate = get_option('hashtag_moderate');
?>


<div class="acco-block-widget">
            <div class="acco-block" ><br />
     	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label><br />
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
     	</div>
    <div class="acco-block zebra" style="padding-top:20px;">
     	<div class="ei_settings_float_block">
                            <img src="<?php echo plugins_url('images/moderation.png',__FILE__); ?>" width="80">
                                </div>Moderate: <br />
<select name="<?php echo $this->get_field_name( 'enjoyinstagram_grid_moderate_widget'); ?>" class="class_enjoyinstagram_grid_moderate_widget ei_sel" id="<?php echo $this->get_field_id( 'enjoyinstagram_grid_moderate_widget'); ?>">
    <option value="false" <?php if(esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='false') echo 'selected'; ?>> No </option>
<option value="true" <?php if(esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='true') echo 'selected'; ?>> Yes </option>

</select>
     	</div>

         <div class="acco-block" >
             <div class="enin-medium-header">show pics:</div>

            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <div id="<?php echo $this->get_field_id( 'div_enjoyinstagram_user_or_hashtag_widget'); ?>">
<input type="radio" name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_grid_widget'); ?>"  value="user" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='user') echo 'checked'; ?>>of Your Profile<br/>
<input type="radio"  name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_grid_widget'); ?>"  value="hashtag" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='hashtag') echo 'checked'; ?>>by Hashtag<br />
<input type="radio"  name="<?php echo $this->get_field_name( 'first_select_enjoyinstagram_user_or_hashtag_grid_widget'); ?>"  value="likes" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='likes') echo 'checked'; ?> <?php if(esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='true') echo 'disabled = true'; ?>>Favourites<br />
                   </div>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_user_grid_widget'); ?>"  >
						 &nbsp;
<select id="<?php echo $this->get_field_id('enjoyinstagram_user_grid_widget'); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_user_grid_widget'); ?>" <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='true') echo 'style="display:none;"'; ?>>
                                                     <?php


                                                     foreach($array_utenti as $user) {
																											 	 $singolo_utente = (array) $user;
                                                         if($singolo_utente[username]!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>" <?php if(esc_attr($instance['enjoyinstagram_user_grid_widget']) == $singolo_utente['username']) echo 'selected'; ?>><?php echo $singolo_utente['username']; ?></option>
                                                     <?php } } ?>
</select>
<div <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='true' || esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='likes') echo 'style="display:none;"'; ?>>
</br>Restrict by the following hashtags (without # and separated by comma)</br>
<input type="text" name="<?php echo $this->get_field_name('enjoyinstagram_grid_user_hashtag_widget'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_grid_user_hashtag_widget'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_grid_user_hashtag_widget']) ?>"/>
</div>
</div>
                               <div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_user_grid_moderate_widget'); ?>"  <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='hashtag' || esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='false') echo 'style="display:none;"'; ?>>

                                   &nbsp;
<select id="<?php echo $this->get_field_id('enjoyinstagram_user_grid_moderate_widget'); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_user_grid_moderate_widget'); ?>">
                                                     <?php


foreach($array_users_moderate as $singolo_utente_moderate) { ?>
    <option value ="<?php echo $singolo_utente_moderate; ?>" <?php if(esc_attr($instance['enjoyinstagram_user_grid_moderate_widget']) == $singolo_utente_moderate) echo 'selected'; ?>><?php echo $singolo_utente_moderate; ?> - Moderated</option>
<?php } ?>
                                                 </select>
                                                 <br />
You can add others moderated user going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>
</div>

                               <div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_hashtag_grid_widget'); ?>"  <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='user' || esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='true') echo 'style="display:none;"'; ?>>
#<input type="text" id="<?php echo $this->get_field_id('enjoyinstagram_hashtag_popup_widget'); ?>" required name="<?php echo $this->get_field_name('enjoyinstagram_hashtag_popup_widget'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_hashtag_popup_widget']); ?>"/>
 						<span class="description">insert a hashtag without '#'</span>

</div>
           <div id="<?php echo $this->get_field_id('enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget'); ?>"  <?php if(esc_attr($instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'])=='user' || esc_attr($instance['enjoyinstagram_grid_moderate_widget'])=='false') echo 'style="display:none;"'; ?>>
						 &nbsp;

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
             Number or Images<br />( COLS x ROWS )

            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">

                            Number of Columns:<br />
<select name="<?php echo $this->get_field_name('enjoyinstagram_grid_cols'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_cols'); ?>">
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if(esc_attr($instance['enjoyinstagram_grid_cols'])==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
</select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                        Number of Rows:<br />
<select name="<?php echo $this->get_field_name('enjoyinstagram_grid_rows'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_rows'); ?>">
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if(esc_attr($instance['enjoyinstagram_grid_rows'])==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
</select>
            </div>
            </div>
						<div class="acco-1-3">
					<div class="ei_settings_float_block">
											Margin (px):<br />
											<div id="<?php echo $this->get_field_id('enjoyinstagram_grid_margin'); ?>" >
											<input type="text" id="<?php echo $this->get_field_id('enjoyinstagram_grid_margin'); ?>" required name="<?php echo $this->get_field_name('enjoyinstagram_grid_margin'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_grid_margin']); ?>"/>
											</div>
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
            <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_grid_link'); ?>" value="swipebox" <?php if (esc_attr($instance['enjoyinstagram_grid_link'])=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_grid_link'); ?>" value="instagram" <?php if (esc_attr($instance['enjoyinstagram_grid_link'])=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_grid_link'); ?>" value="nolink" <?php if (esc_attr($instance['enjoyinstagram_grid_link'])=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="<?php echo $this->get_field_name('enjoyinstagram_grid_link'); ?>" value="altro" <?php if (esc_attr($instance['enjoyinstagram_grid_link'])=='altro')
                                        echo "checked";?>>Altro
                                <input type="text"  name="<?php echo $this->get_field_name('enjoyinstagram_grid_link_altro'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_grid_link_altro']); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_grid_link_altro'); ?>" >
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">

            </div>
            </div>
     	</div>



     <div class="acco-block zebra" >
         <div class="enin-medium-header">GRID OPTIONS:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Number of items that are <br />replaced at the same time:<br />
                <select name="<?php echo $this->get_field_name('enjoyinstagram_grid_step'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_grid_step'); ?>" class="ei_sel">
<option value="random" <?php if (esc_attr($instance['enjoyinstagram_grid_step'])=='random'){ echo "selected='selected'"; }?>>random</option>
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if (esc_attr($instance['enjoyinstagram_grid_step'])==$i) echo "selected='selected'";?>>
<?php echo "&nbsp;".$i;	 ?>
</option>
<?php } ?>
                                 </select>

            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Interval the images<br /> will be replaced:
                                                           <br />
<input type="number" min="300" value="<?php echo esc_attr($instance['enjoyinstagram_grid_interval']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_grid_interval'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_interval'); ?>"> ms
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Images will switch <br />when mouse on hover:
                                                                       <br />
<select name="<?php echo $this->get_field_name('enjoyinstagram_grid_onhover'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_onhover'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_grid_onhover'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_grid_onhover'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
     	</div>

      <div class="acco-block" >
          <div class="enin-medium-header">ANIMATION:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

             Animation Type:   <br />
<select name="<?php echo $this->get_field_name('enjoyinstagram_grid_animation'); ?>" id="<?php echo $this->get_field_id('enjoyinstagram_grid_animation'); ?>" class="ei_sel">
<option value="random" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='random'){ echo "selected='selected'"; }?>>random</option>
<option value="fadeInOut" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='fadeInOut'){ echo "selected='selected'"; }?>>fadeInOut</option>
<option value="rotateLeft" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateLeft'){ echo "selected='selected'"; }?>>rotateLeft</option>
<option value="rotateRight" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateRight'){ echo "selected='selected'"; }?>>rotateRight</option>
<option value="rotateTop" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateTop'){ echo "selected='selected'"; }?>>rotateTop</option>
<option value="rotateBottom" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateBottom'){ echo "selected='selected'"; }?>>rotateBottom</option>
<option value="rotateLeftScale" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateLeftScale'){ echo "selected='selected'"; }?>>rotateLeftScale</option>
<option value="rotateRightScale" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateRightScale'){ echo "selected='selected'"; }?>>rotateRightScale</option>
<option value="rotateTopScale" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateTopScale'){ echo "selected='selected'"; }?>>rotateTopScale</option>
<option value="rotateBottomScale" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotateBottomScale'){ echo "selected='selected'"; }?>>rotateBottomScale</option>
<option value="rotate3d" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='rotate3d'){ echo "selected='selected'"; }?>>rotate3d</option>
<option value="showHide" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='showHide'){ echo "selected='selected'"; }?>>showHide</option>
<option value="slideLeft" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='slideLeft'){ echo "selected='selected'"; }?>>slideLeft</option>
<option value="slideRight" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='slideRight'){ echo "selected='selected'"; }?>>slideRight</option>
<option value="slideTop" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='slideTop'){ echo "selected='selected'"; }?>>slideTop</option>
<option value="slideBottom" <?php if (esc_attr($instance['enjoyinstagram_grid_animation'])=='slideBottom'){ echo "selected='selected'"; }?>>slideBottom</option>
                                 </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Animation Speed:
                                                               <br />
 <input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_grid_animation_speed']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_grid_animation_speed'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_animation_speed'); ?>" value="<?php echo esc_attr($instance['enjoyinstagram_grid_animation_speed']); ?>"> ms
            </div>
            </div>

     	</div>



     <div class="acco-block zebra" >
         <div class="enin-medium-header">LIGHTBOX OPTIONS:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                Hide Bars Delay:<br /> <input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_grid_hidebarsdelay']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_grid_hidebarsdelay'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_hidebarsdelay'); ?>"> ms <br />( 0 to always show <br />caption and action bar )
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">


            Hide Bars On Mobile:<br /><select name="<?php echo $this->get_field_name('enjoyinstagram_grid_hidebarsmobile'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_hidebarsmobile'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_grid_hidebarsmobile'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_grid_hidebarsmobile'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Show Likes Count: <br /><select name="<?php echo $this->get_field_name('enjoyinstagram_grid_likes_count'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_likes_count'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_grid_likes_count'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_grid_likes_count'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
         <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                Show Author: <br /> <select name="<?php echo $this->get_field_name('enjoyinstagram_grid_image_author'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_image_author'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_grid_image_author'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_grid_image_author'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>


 <div class="acco-block" >
     <div class="enin-medium-header">AUTORELOAD:</div>

            <div class="acco-1-3">
            <div class="ei_settings_float_block">
                Do you want reload items ? <br />
            <select name="<?php echo $this->get_field_name('enjoyinstagram_grid_autoreload'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_autoreload'); ?>">
                                    <option value="true" <?php if (esc_attr($instance['enjoyinstagram_grid_autoreload'])=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (esc_attr($instance['enjoyinstagram_grid_autoreload'])=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Times to reload <br />
            <input type="number" value="<?php echo esc_attr($instance['enjoyinstagram_grid_autoreload_value']); ?>" name="<?php echo $this->get_field_name('enjoyinstagram_grid_autoreload_value'); ?>" class="ei_sel" id="<?php echo $this->get_field_id('enjoyinstagram_grid_autoreload_value'); ?>"> ms
            </div>
            </div>
     	</div>

     <br />
            </div>





		<?php
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'] = ( ! empty( $new_instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'] ) ) ? strip_tags( $new_instance['first_select_enjoyinstagram_user_or_hashtag_grid_widget'] ) : '';


		$instance['enjoyinstagram_user_grid_widget'] = ( ! empty( $new_instance['enjoyinstagram_user_grid_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_user_grid_widget'] ) : '';

		$instance['enjoyinstagram_user_grid_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_user_grid_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_user_grid_moderate_widget'] ) : '';

		$instance['enjoyinstagram_hashtag_popup_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_widget'] ) : '';

		$instance['enjoyinstagram_hashtag_popup_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_moderate_widget'] ) : '';

		$instance['enjoyinstagram_grid_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_grid_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_moderate_widget'] ) : '';

		$instance['enjoyinstagram_grid_cols'] = ( ! empty( $new_instance['enjoyinstagram_grid_cols'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_cols'] ) : '';

		$instance['enjoyinstagram_grid_rows'] = ( ! empty( $new_instance['enjoyinstagram_grid_rows'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_rows'] ) : '';

		$instance['enjoyinstagram_grid_margin'] = ( ! empty( $new_instance['enjoyinstagram_grid_margin'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_margin'] ) : '0';

		$instance['enjoyinstagram_grid_link'] = ( ! empty( $new_instance['enjoyinstagram_grid_link'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_link'] ) : '';

		$instance['enjoyinstagram_grid_link_altro'] = ( ! empty( $new_instance['enjoyinstagram_grid_link_altro'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_link_altro'] ) : '';

		$instance['enjoyinstagram_grid_step'] = ( ! empty( $new_instance['enjoyinstagram_grid_step'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_step'] ) : '';

		$instance['enjoyinstagram_grid_animation'] = ( ! empty( $new_instance['enjoyinstagram_grid_animation'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_animation'] ) : '';

		$instance['enjoyinstagram_grid_animation_speed'] = ( ! empty( $new_instance['enjoyinstagram_grid_animation_speed'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_animation_speed'] ) : '';

		$instance['enjoyinstagram_grid_interval'] = ( ! empty( $new_instance['enjoyinstagram_grid_interval'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_interval'] ) : '';

		$instance['enjoyinstagram_grid_onhover'] = ( ! empty( $new_instance['enjoyinstagram_grid_onhover'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_onhover'] ) : '';

		$instance['enjoyinstagram_grid_likes_count'] = ( ! empty( $new_instance['enjoyinstagram_grid_likes_count'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_likes_count'] ) : '';

		$instance['enjoyinstagram_grid_image_author'] = ( ! empty( $new_instance['enjoyinstagram_grid_image_author'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_image_author'] ) : '';

		$instance['enjoyinstagram_grid_hidebarsmobile'] = ( ! empty( $new_instance['enjoyinstagram_grid_hidebarsmobile'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_hidebarsmobile'] ) : '';

		$instance['enjoyinstagram_grid_hidebarsdelay'] = ( ! empty( $new_instance['enjoyinstagram_grid_hidebarsdelay'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_hidebarsdelay'] ) : '';

		$instance['enjoyinstagram_grid_autoreload'] = ( ! empty( $new_instance['enjoyinstagram_grid_autoreload'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_autoreload'] ) : '';

		$instance['enjoyinstagram_grid_autoreload_value'] = ( ! empty( $new_instance['enjoyinstagram_grid_autoreload_value'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_autoreload_value'] ) : '';

		$instance['enjoyinstagram_hashtag_popup_grid_moderate_widget'] = ( ! empty( $new_instance['enjoyinstagram_hashtag_popup_grid_moderate_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_hashtag_popup_grid_moderate_widget'] ) : '';

		$instance['enjoyinstagram_grid_user_hashtag_widget'] = ( ! empty( $new_instance['enjoyinstagram_grid_user_hashtag_widget'] ) ) ? strip_tags( $new_instance['enjoyinstagram_grid_user_hashtag_widget'] ) : '';



		return $instance;
	}

}

function register_Grid_Widget() {
    register_widget( 'Grid_Widget' );
}

add_action( 'widgets_init', 'register_Grid_Widget' );

?>
