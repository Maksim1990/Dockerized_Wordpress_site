<form method="post" action="options.php" novalidate>
<?php settings_fields('enjoyinstagram_options_default_group'); ?>
<?php echo realpath(home_url()); ?>



<script type="text/javascript">
jQuery(document).ready(function($){
    $("input[name$='enjoyinstagram_user_or_hashtag']").click(function() {
        var test = $(this).val();
		if(test=='user'){
		$('#enjoyinstagram_hashtag').attr('disabled',true);
		}else if(test=='hashtag'){
		$('#enjoyinstagram_hashtag').attr('disabled',false);
		}
        $("div.desc").hide();
        $("#enjoyinstagram_user_or_hashtag_" + test).show();
    });});
</script>

<div class="grid grid-pad">
	<div class="col-1-2 mobile-col-1-2">
		<h2>Set default appareance setting</h2>
     </div>
     <div class="col-1-2 mobile-col-1-2" style="text-align:right;">
        <input type="submit" class="button-primary" id="button_enjoyinstagram_advanced_default" name="button_enjoyinstagram_advanced_default" value="Save Settings"/>

	</div>

</div>
<hr />

<!-- CSS and JS defer -->
<div class="grid grid-pad">

    <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title" >
                 <label for="enjoyinstagram_code_opt" class="enfasi">JS and CSS defer</label>
                </div>
			</div>

    <div class="col-1-2 mobile-col-1-1">
				<div class="enin-content">
                <div class="ei_block">
                			<div class="enin-medium-header">JS and CSS defer toggle</div>
                                 	<div class="enin-block">
The plugin is configured to optimize page loading by deferring CSS and JS files.<br />
However, this may cause issues with thirdy party plugins or themes. If this happens, please disable this option.</b><hr />
<input name="enjoyinstagram_code_opt" type="checkbox" value="<?php if(get_option('enjoyinstagram_code_opt')){echo 'true';}else{ echo 'false';} ?>" <?php if(get_option('enjoyinstagram_code_opt')) echo "checked"; ?> /> Defer JS and CSS loading<hr />

                                        </div></div></div></div>



</div>

<hr/>

<!-- images captured -->
<div class="grid grid-pad">

    <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title" >
                 <label for="enjoyinstagram_images_captured" class="enfasi">Instagram API settings</label>
                <?php echo '<img src="' . plugins_url( 'images/carousel.png' , __FILE__ ) . '" > '; ?>
                </div>
			</div>

    <div class="col-1-2 mobile-col-1-1">
				<div class="enin-content">
                <div class="ei_block">
                			<div class="enin-medium-header">Images Captured from Instagram</div>
                                 	<div class="enin-block">
                                          <!--  Set how many images you wanna captured and show from Instagram.<br /><b>(min 20 images)</b><hr />-->
                                    <b><font style="color:#900;">BE CAREFUL.</font><br />
If you choose too many, may cause degraded performance.<br />
It is recommended not to exceed.</b><hr />
<input name="enjoyinstagram_images_captured" class="ei_sel" type="number" min="20" value="<?php echo get_option('enjoyinstagram_images_captured'); ?>" /> images<hr />
<!--<span style="font-size: 11px;"><i>This option is not available in <b>album view</b> and <b>badge view</b> for performance reasons.</i></span>-->

                                        </div></div></div></div>



</div>
<hr />
<!-- carousel -->

    	<div class="grid grid-pad">
            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title" >
                 <label for="enjoyinstagram_carousel_settings" class="enfasi">Carousel settings</label>
                <?php echo '<img src="' . plugins_url( 'images/carousel.png' , __FILE__ ) . '" > '; ?>
                </div>
			</div>
            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="ei_block">
                			<div class="enin-medium-header">General options</div>
                                 	<div class="enin-block">
                                    Images displayed at a time:

                                    <select name="enjoyinstagram_carousel_items_number_default" class="enin-full" id="enjoyinstagram_carousel_items_number_default">
				<?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_items_number_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                    </div>
                                    <div id="div_animate" >
                                   Animate In:
                                   <div class="enin-full">
                                    <select name="enjoyinstagram_carousel_animatein_default"  id="enjoyinstagram_carousel_animatein_default">
          <option value="bounceIn" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='bounceIn') echo "selected='selected'";?>>bounceIn</option>
          <option value="bounceInDown" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='bounceInDown') echo "selected='selected'";?>>bounceInDown</option>
          <option value="bounceInLeft" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='bounceInLeft') echo "selected='selected'";?>>bounceInLeft</option>
          <option value="bounceInRight" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='bounceInRight') echo "selected='selected'";?>>bounceInRight</option>
          <option value="bounceInUp" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='bounceInUp') echo "selected='selected'";?>>bounceInUp</option>
          <option value="fadeIn" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeIn') echo "selected='selected'";?>>fadeIn</option>
          <option value="fadeInDown" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInDown') echo "selected='selected'";?>>fadeInDown</option>
          <option value="fadeInDownBig" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInDownBig') echo "selected='selected'";?>>fadeInDownBig</option>
          <option value="fadeInLeft" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInLeft') echo "selected='selected'";?>>fadeInLeft</option>
          <option value="fadeInLeftBig" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInLeftBig') echo "selected='selected'";?>>fadeInLeftBig</option>
          <option value="fadeInRight" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInRight') echo "selected='selected'";?>>fadeInRight</option>
          <option value="fadeInRightBig" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInRightBig') echo "selected='selected'";?>>fadeInRightBig</option>
          <option value="fadeInUp" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInUp') echo "selected='selected'";?>>fadeInUp</option>
          <option value="fadeInUpBig" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='fadeInUpBig') echo "selected='selected'";?>>fadeInUpBig</option>
          <option value="flipInX" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='flipInX') echo "selected='selected'";?>>flipInX</option>
          <option value="flipInY" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='flipInY') echo "selected='selected'";?>>flipInY</option>
          <option value="lightSpeedIn" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='lightSpeedIn') echo "selected='selected'";?>>lightSpeedIn</option>
          <option value="rotateIn" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='rotateIn') echo "selected='selected'";?>>rotateIn</option>
          <option value="rotateInDownLeft" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='rotateInDownLeft') echo "selected='selected'";?>>rotateInDownLeft</option>
          <option value="rotateInDownRight" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='rotateInDownRight') echo "selected='selected'";?>>rotateInDownRight</option>
          <option value="rotateInUpLeft" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='rotateInUpLeft') echo "selected='selected'";?>>rotateInUpLeft</option>
          <option value="rotateInUpRight" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='rotateInUpRight') echo "selected='selected'";?>>rotateInUpRight</option>
          <option value="slideInDown" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='slideInDown') echo "selected='selected'";?>>slideInDown</option>
          <option value="slideInLeft" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='slideInLeft') echo "selected='selected'";?>>slideInLeft</option>
          <option value="slideInRight" <?php if (get_option('enjoyinstagram_carousel_animatein_default')=='slideInRight') echo "selected='selected'";?>>slideInRight</option>
                                </select>
                                     Animate Out: <select name="enjoyinstagram_carousel_animateout_default"  id="enjoyinstagram_carousel_animateout_default">
          <option value="bounceOut" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='bounceOut') echo "selected='selected'";?>>bounceOut</option>
          <option value="bounceOutDown" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='bounceOutDown') echo "selected='selected'";?>>bounceOutDown</option>
          <option value="bounceOutLeft" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='bounceOutLeft') echo "selected='selected'";?>>bounceOutLeft</option>
          <option value="bounceOutRight" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='bounceOutRight') echo "selected='selected'";?>>bounceOutRight</option>
          <option value="bounceOutUp" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='bounceOutUp') echo "selected='selected'";?>>bounceOutUp</option>
          <option value="fadeOut" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOut') echo "selected='selected'";?>>fadeOut</option>
          <option value="fadeOutDown" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutDown') echo "selected='selected'";?>>fadeOutDown</option>
          <option value="fadeOutDownBig" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutDownBig') echo "selected='selected'";?>>fadeOutDownBig</option>
          <option value="fadeOutLeft" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutLeft') echo "selected='selected'";?>>fadeOutLeft</option>
          <option value="fadeOutLeftBig" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutLeftBig') echo "selected='selected'";?>>fadeOutLeftBig</option>
          <option value="fadeOutRight" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutRight') echo "selected='selected'";?>>fadeOutRight</option>
          <option value="fadeOutRightBig" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutRightBig') echo "selected='selected'";?>>fadeOutRightBig</option>
          <option value="fadeOutUp" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutUp') echo "selected='selected'";?>>fadeOutUp</option>
          <option value="fadeOutUpBig" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='fadeOutUpBig') echo "selected='selected'";?>>fadeOutUpBig</option>
          <option value="flipOutX" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='flipOutX') echo "selected='selected'";?>>flipOutX</option>
          <option value="flipOutY" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='flipOutY') echo "selected='selected'";?>>flipOutY</option>
          <option value="lightSpeedOut" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='lightSpeedOut') echo "selected='selected'";?>>lightSpeedOut</option>
          <option value="rotateOut" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='rotateOut') echo "selected='selected'";?>>rotateOut</option>
          <option value="rotateOutDownLeft" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='rotateOutDownLeft') echo "selected='selected'";?>>rotateOutDownLeft</option>
          <option value="rotateOutDownRight" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='rotateOutDownRight') echo "selected='selected'";?>>rotateOutDownRight</option>
          <option value="rotateOutUpLeft" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='rotateOutUpLeft') echo "selected='selected'";?>>rotateOutUpLeft</option>
          <option value="rotateOutUpRight" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='rotateOutUpRight') echo "selected='selected'";?>>rotateOutUpRight</option>
          <option value="slideOutLeft" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='slideOutLeft') echo "selected='selected'";?>>slideOutLeft</option>
          <option value="slideOutRight" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='slideOutRight') echo "selected='selected'";?>>slideOutRight</option>
          <option value="slideOutUp" <?php if (get_option('enjoyinstagram_carousel_animateout_default')=='slideOutUp') echo "selected='selected'";?>>slideOutUp</option>
                                </select>

                                </div>



                            </div>

				</div>
				</div>
			</div>
            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">

                  <div class="ei_block">
                  			<div class="enin-medium-header">When you click on an image</div>
                                <label class="enin-field">
                                	Link Image to:
                                </label>
                                <div class="enin-field">
                                <input type="radio" name="enjoyinstagram_carousel_link_default" value="swipebox" <?php if (get_option('enjoyinstagram_carousel_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="enjoyinstagram_carousel_link_default" value="instagram" <?php if (get_option('enjoyinstagram_carousel_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="enjoyinstagram_carousel_link_default" value="nolink" <?php if (get_option('enjoyinstagram_carousel_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="enjoyinstagram_carousel_link_default" value="altro" <?php if (get_option('enjoyinstagram_carousel_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
                                <input type="text"  name="enjoyinstagram_carousel_link_altro_default" value="<?php echo get_option('enjoyinstagram_carousel_link_altro_default'); ?>" id="enjoyinstagram_carousel_link_altro_default" <?php if (get_option('enjoyinstagram_carousel_link_default')!='altro')
                                    echo "style=\"display: none;\"";?> >
                           		</div>
                           </div>

				</div>
			</div>
            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-medium-header">Navigation</div>
                  <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed" >
                                	Navigation buttons:
                                </div>
                                <select name="enjoyinstagram_carousel_navigation_default" class="ei_sel" id="enjoyinstagram_carousel_navigation_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_navigation_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_navigation_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
                                    <div id="div_text_navigation" <?php if (get_option('enjoyinstagram_carousel_navigation_default')=='false') echo "style=\"display:none;\"";?>>
                                    <div class="ei_settings_float_block ei_fixed" >
                                     Prev Button Text:
                                     </div>
                                     <input type="text" value="<?php echo get_option('enjoyinstagram_carousel_navigation_prev_default'); ?>" name="enjoyinstagram_carousel_navigation_prev_default"  id="enjoyinstagram_carousel_navigation_prev_default" class="ei_sel"><br/>
                                     <div class="ei_settings_float_block ei_fixed" >
                                     Next Button Text:
                                     </div>
                                      <input type="text" value="<?php echo get_option('enjoyinstagram_carousel_navigation_next_default'); ?>" name="enjoyinstagram_carousel_navigation_next_default"  id="enjoyinstagram_carousel_navigation_next_default" class="ei_sel">
                                <!-- /div fabio -->
                           		</div>
                                 <div class="ei_settings_float_block ei_fixed">
                                	Dots:
                                </div>
                                <div class="ei_settings_float_block">
                                    <select name="enjoyinstagram_carousel_dots_default" class="ei_sel" id="enjoyinstagram_carousel_dots_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_dots_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_dots_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
                                </div>
                           </div>

				</div>
			</div>
            </div>
        <div class="grid grid-pad">
           <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-empty">

                </div>
			</div>
            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                 <div class="enin-medium-header">Autoplay</div>
                          <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                	AutoPlay:
                                </div>

                                <select name="enjoyinstagram_carousel_autoplay_default" class="ei_sel" id="enjoyinstagram_carousel_autoplay_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoplay_default')=='true') echo "selected='selected'";?>>Yes</option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoplay_default')=='false') echo "selected='selected'";?>>No</option>
                                </select>
<div id="div_autoplay_yes" <?php if (get_option('enjoyinstagram_carousel_autoplay_default')=='false') echo "style=\"display:none;\"";?>>
<div class="ei_settings_float_block ei_fixed">
Timeout Autoplay:</div>
<input type="number" name="enjoyinstagram_carousel_autoplay_timeout_default" id="enjoyinstagram_carousel_autoplay_timeout_default" value="<?php echo get_option('enjoyinstagram_carousel_autoplay_timeout_default'); ?>" class="ei_sel">
<div class="ei_settings_float_block ei_fixed">
Speed Autoplay:</div>
<input type="number" name="enjoyinstagram_carousel_autoplay_speed_default" id="enjoyinstagram_carousel_autoplay_speed_default" value="<?php echo get_option('enjoyinstagram_carousel_autoplay_speed_default'); ?>" class="ei_sel">
<div class="ei_settings_float_block ei_fixed">
Stop on Hover: </div>
<select name="enjoyinstagram_carousel_stop_on_hover_default" class="ei_sel" id="enjoyinstagram_carousel_stop_on_hover_default">
<option value="true" <?php if (get_option('enjoyinstagram_carousel_stop_on_hover_default')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('enjoyinstagram_carousel_stop_on_hover_default')=='false') echo "selected='selected'";?>>No</option>
</select>
</div>

                           </div>
                </div>
			</div>



            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                 <div class="enin-medium-header">other settings</div>

                 <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                	Loop:
                                </div>
                                <div class="ei_settings_float_block">
                                    <select name="enjoyinstagram_carousel_loop_default" class="ei_sel" id="enjoyinstagram_carousel_loop_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_loop_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_loop_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
                                </div>
                           </div>

               <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                	Slide Speed (ms):
                                </div>

                                    <input type="number" name="enjoyinstagram_carousel_slidespeed_default" value="<?php echo get_option('enjoyinstagram_carousel_slidespeed_default'); ?>" class="ei_sel" id="enjoyinstagram_carousel_slidespeed_default">

                           </div>
               <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                	Margin (px):
                                </div>
                                <input type="number" name="enjoyinstagram_carousel_margin_default" class="ei_sel" value="<?php echo get_option('enjoyinstagram_carousel_margin_default'); ?>" id="enjoyinstagram_carousel_margin_default">


                           </div>

                </div>

			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                  <div class="ei_block">
                            <div class="enin-medium-header">Responsive settings</div>
                            <div class="enin-small-header">
                            Number of images showed</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    screen width 480px:
                                    </div>
                                      <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_480px_default'); ?>" name="enjoyinstagram_carousel_480px_default" class="ei_sel" id="enjoyinstagram_carousel_480px_default">
                                      <div class="ei_settings_float_block ei_fixed">

                                    600px: </div>
                                     <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_600px_default'); ?>" name="enjoyinstagram_carousel_600px_default" class="ei_sel" id="enjoyinstagram_carousel_600px_default">
                                     <div class="ei_settings_float_block ei_fixed">
                                    768px: </div>
                                     <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_768px_default'); ?>" name="enjoyinstagram_carousel_768px_default" class="ei_sel" id="enjoyinstagram_carousel_768px_default">
                                     <div class="ei_settings_float_block ei_fixed">
                                    1024px:
                                    </div>
                                    <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_1024px_default'); ?>" name="enjoyinstagram_carousel_1024px_default" class="ei_sel" id="enjoyinstagram_carousel_1024px_default">

                           </div>


                </div>
			</div>
          </div>
<hr />
<!-- Grid view -->


            <div class="grid grid-pad">

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title">
                     <label for="enjoyinstagram_carousel_grid" class="enfasi">Grid view settings:</label>  <br/> <br/>
                     <?php echo '<img src="' . plugins_url( 'images/grid-view.png' , __FILE__ ) . '" > '; ?>
                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="ei_block">
                <div class="enin-medium-header">General settings</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Columns:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_cols_default" id="enjoyinstagram_grid_cols_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                      <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Rows:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_rows_default" id="enjoyinstagram_grid_rows_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
                                </div>
                            </div>
                        <div class="ei_block">
                                         <div class="ei_settings_float_block ei_fixed">
                                         	Margin (px):
                                         </div>
                                         <input type="number" name="enjoyinstagram_grid_margin_default" class="ei_sel" value="<?php echo get_option('enjoyinstagram_grid_margin_default'); ?>" id="enjoyinstagram_grid_margin_default">


                        </div>


                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-medium-header">When you click on an image</div>

                                <label class="enin-field">
                                	Link Image to :
                                </label>
                                <div class="enin-field">
                                <input type="radio" name="enjoyinstagram_grid_link_default" value="swipebox" <?php if (get_option('enjoyinstagram_grid_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="enjoyinstagram_grid_link_default" value="instagram" <?php if (get_option('enjoyinstagram_grid_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="enjoyinstagram_grid_link_default" value="nolink" <?php if (get_option('enjoyinstagram_grid_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="enjoyinstagram_grid_link_default" value="altro" <?php if (get_option('enjoyinstagram_grid_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
                                <input type="text"  name="enjoyinstagram_grid_link_altro_default" value="<?php echo get_option('enjoyinstagram_grid_link_altro_default'); ?>" id="enjoyinstagram_grid_link_altro_default" <?php if (get_option('enjoyinstagram_grid_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
                           		</div>
                           </div>


			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-medium-header">Images alternance</div>
                <div class="ei_block">
                                <div class="enin-full-label">
                                    Number of items that are replaced at the same time:
                                </div>
                                <div class="enin-full">
                                <select name="enjoyinstagram_grid_step_default" id="enjoyinstagram_grid_step_default" class="enin-full">
<option value="random" <?php if (get_option('enjoyinstagram_grid_step_default')=='random'){ echo "selected='selected'"; }?>>random</option>
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_step_default')==$i) echo "selected='selected'";?>>
<?php echo "&nbsp;".$i;	 ?>
</option>
<?php } ?>
                                 </select>
                                </div>
                            </div>


                <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Animation Type:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_animation_default" id="enjoyinstagram_grid_animation_default" class="ei_sel">
<option value="random" <?php if (get_option('enjoyinstagram_grid_animation_default')=='random'){ echo "selected='selected'"; }?>>random</option>
<option value="fadeInOut" <?php if (get_option('enjoyinstagram_grid_animation_default')=='fadeInOut'){ echo "selected='selected'"; }?>>fadeInOut</option>
<option value="rotateLeft" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateLeft'){ echo "selected='selected'"; }?>>rotateLeft</option>
<option value="rotateRight" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateRight'){ echo "selected='selected'"; }?>>rotateRight</option>
<option value="rotateTop" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateTop'){ echo "selected='selected'"; }?>>rotateTop</option>
<option value="rotateBottom" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateBottom'){ echo "selected='selected'"; }?>>rotateBottom</option>
<option value="rotateLeftScale" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateLeftScale'){ echo "selected='selected'"; }?>>rotateLeftScale</option>
<option value="rotateRightScale" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateRightScale'){ echo "selected='selected'"; }?>>rotateRightScale</option>
<option value="rotateTopScale" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateTopScale'){ echo "selected='selected'"; }?>>rotateTopScale</option>
<option value="rotateBottomScale" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotateBottomScale'){ echo "selected='selected'"; }?>>rotateBottomScale</option>
<option value="rotate3d" <?php if (get_option('enjoyinstagram_grid_animation_default')=='rotate3d'){ echo "selected='selected'"; }?>>rotate3d</option>
<option value="showHide" <?php if (get_option('enjoyinstagram_grid_animation_default')=='showHide'){ echo "selected='selected'"; }?>>showHide</option>
<option value="slideLeft" <?php if (get_option('enjoyinstagram_grid_animation_default')=='slideLeft'){ echo "selected='selected'"; }?>>slideLeft</option>
<option value="slideRight" <?php if (get_option('enjoyinstagram_grid_animation_default')=='slideRight'){ echo "selected='selected'"; }?>>slideRight</option>
<option value="slideTop" <?php if (get_option('enjoyinstagram_grid_animation_default')=='slideTop'){ echo "selected='selected'"; }?>>slideTop</option>
<option value="slideBottom" <?php if (get_option('enjoyinstagram_grid_animation_default')=='slideBottom'){ echo "selected='selected'"; }?>>slideBottom</option>
                                 </select>
                                </div>
                            </div>

                </div>
			</div>
          </div>

             <div class="grid grid-pad">
              <div class="col-1-4 hide-on-mobile">
				<div class="enin-content-empty">

                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-block">
                <div class="enin-medium-header">Animation</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Animation Speed (ms):</div>

<input type="number" value="<?php echo get_option('enjoyinstagram_grid_animation_speed_default'); ?>" name="enjoyinstagram_grid_animation_speed_default" class="ei_sel" id="enjoyinstagram_grid_animation_speed_default">

                          </div>

                       <div class="enin-block">

                                    Time between image replace(ms):
                                <div class="enin-full">
<input type="number" min="300" value="<?php echo get_option('enjoyinstagram_grid_interval_default'); ?>" name="enjoyinstagram_grid_interval_default" class="ei_sel" id="enjoyinstagram_grid_interval_default">
								</div>

                            </div>
                            <div class="enin-block">

                                    Switch Images on mouse hover:
                                  <div class="enin-full">
<select name="enjoyinstagram_grid_onhover_default" class="ei_sel" id="enjoyinstagram_grid_onhover_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_grid_onhover_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_grid_onhover_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
                                </div>
                            </div>

                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
               <div class="ei_block">
               					<div class="enin-medium-header">Responsive settings 1/2</div>
                                <div class="enin-small-header">480px</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Columns:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_cols_480px_default" id="enjoyinstagram_grid_cols_480px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_480px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                        	<div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Rows:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_rows_480px_default" id="enjoyinstagram_grid_rows_480px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_480px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
                                </div>
                            </div>


                            <div class="ei_block">
                               <div class="enin-small-header">600px</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Columns:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_cols_600px_default" id="enjoyinstagram_grid_cols_600px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_600px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                        	<div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Rows:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_rows_600px_default" id="enjoyinstagram_grid_rows_600px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_600px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
                                </div>
                            </div>

                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                        <div class="ei_block">
                        <div class="enin-medium-header">Responsive settings 2/2</div>
                                <div class="enin-small-header">768px</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Columns:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_cols_768px_default" id="enjoyinstagram_grid_cols_768px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_768px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                        	<div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Rows:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_rows_768px_default" id="enjoyinstagram_grid_rows_768px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_768px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
                                </div>
                            </div>


                            <div class="ei_block">
                                <div class="enin-small-header">1024px</div>
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Columns:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_cols_1024px_default" id="enjoyinstagram_grid_cols_1024px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_1024px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                        	<div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Number of Rows:
                                </div>
                                <div class="ei_settings_float_block">
                                <select name="enjoyinstagram_grid_rows_1024px_default" id="enjoyinstagram_grid_rows_1024px_default" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_1024px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
                                </div>
                            </div>

                </div>
			</div>


          </div>

<hr/>
<!-- polaroid -->

		<div class="grid grid-pad">

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title">
                <label for="enjoyinstagram_carousel_polaroid" class="enfasi">Polaroid view settings:</label><br/><br/>
                      <?php echo '<img src="' . plugins_url( 'images/polaroid.png' , __FILE__ ) . '" > '; ?>
                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-medium-header">Appareance</div>
                <div class="ei_block">

                                        <div class="ei_settings_float_block ei_fixed">
                                    Background:#
                                </div>
   <input type="text" name="enjoyinstagram_polaroid_background_default" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_background_default'); ?>" id="enjoyinstagram_polaroid_background_default">



                                         </div>
                 	<div class="ei_block">

                                    Show "View Gallery" Start Button:

                                <div class="enin-full">
                                <select name="enjoyinstagram_polaroid_start_button_default" id="enjoyinstagram_polaroid_start_button_default" class="ei_sel">

<option value="true" <?php if (get_option('enjoyinstagram_polaroid_start_button_default')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('enjoyinstagram_polaroid_start_button_default')=='false') echo "selected='selected'";?>>No</option>


                                    </select>
                                </div>
                            </div>
                             Show Info on Back ( Instagram Photo Description Content )

                                <div class="enin-full">
                                <select name="enjoyinstagram_polaroid_back_default" id="enjoyinstagram_polaroid_back_default" class="ei_sel">
<option value="true" <?php if (get_option('enjoyinstagram_polaroid_back_default')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('enjoyinstagram_polaroid_back_default')=='false') echo "selected='selected'";?>>No</option>

                                 </select>
                                </div>
                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                         <div class="ei_block">
                           <div class="enin-medium-header">Polaroid border</div>





                                <div class="ei_settings_float_block ei_fixed">
Width (px): </div>  <input type="text" name="enjoyinstagram_polaroid_border_width_default" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_border_width_default'); ?>" id="enjoyinstagram_polaroid_border_width_default">
    <div class="ei_settings_float_block ei_fixed">
Color #:  </div><input type="text" name="enjoyinstagram_polaroid_border_color_default" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_border_color_default'); ?>" id="enjoyinstagram_polaroid_border_width_default">



                                         </div>
                </div>
			</div>

			<div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                <div class="enin-medium-header">When you click on an image</div>
                         <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                	Link Image to:
                                </div>
                                <div class="ei_settings_float_block">
                                <input type="radio" name="enjoyinstagram_polaroid_link_default" value="swipebox" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
                                <input type="radio" name="enjoyinstagram_polaroid_link_default" value="instagram" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
                                <input type="radio" name="enjoyinstagram_polaroid_link_default" value="nolink" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
                                <input type="radio" name="enjoyinstagram_polaroid_link_default" value="altro" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
                                <input type="text"  name="enjoyinstagram_polaroid_link_altro_default" value="<?php echo get_option('enjoyinstagram_polaroid_link_altro_default'); ?>" id="enjoyinstagram_polaroid_link_altro_default" <?php if (get_option('enjoyinstagram_polaroid_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
                           		</div>
                           </div>

                </div>
			</div>
		</div>

<hr/>
<!-- Album -->

		<div class="grid grid-pad">

            <div class="col-1-4 mobile-col-1-1">
                <div class="enin-content-title">
                        <label for="enjoyinstagram_carousel_polaroid" class="enfasi">Album view settings:</label><br/><br/>
                       <?php echo '<img src="' . plugins_url( 'images/album-view.png' , __FILE__ ) . '" > '; ?>
                </div>
            </div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
              <div class="enin-medium-header">Appareance</div>
                	<div class="ei_settings_float_block ei_fixed">
                                    Show on hover
                                </div>




                                <select name="enjoyinstagram_album_hover_default" id="enjoyinstagram_album_hover_default" class="ei_sel" style="width:140px;">
<option value="likes" <?php if (get_option('enjoyinstagram_album_hover_default')=='likes') echo "selected='selected'";?>>Likes Count</option>
<option value="exce" <?php if (get_option('enjoyinstagram_album_hover_default')=='exce') echo "selected='selected'";?>>Caption Exceprt</option>

                                 </select>


                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                       <div class="ei_block">
                       <div class="enin-medium-header">When you click on an image</div>
                                <div class="ei_settings_float_block ei_fixed">
                                	Link Image to:
                                </div>
                                <div class="ei_settings_float_block">
<input type="radio" name="enjoyinstagram_album_link_default" value="swipebox" <?php if (get_option('enjoyinstagram_album_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
<input type="radio" name="enjoyinstagram_album_link_default" value="instagram" <?php if (get_option('enjoyinstagram_album_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
<input type="radio" name="enjoyinstagram_album_link_default" value="nolink" <?php if (get_option('enjoyinstagram_album_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
<input type="radio" name="enjoyinstagram_album_link_default" value="altro" <?php if (get_option('enjoyinstagram_album_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
<input type="text"  name="enjoyinstagram_album_link_altro_default" value="<?php echo get_option('enjoyinstagram_album_link_altro_default'); ?>" id="enjoyinstagram_album_link_altro" <?php if (get_option('enjoyinstagram_album_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
                           		</div>
                           </div>
                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                        <div class="ei_block">
                                  <div class="enin-medium-header">LightBox Options:</div>


                                <div class="ei_settings_float_block ei_fixed">
                               Hide Bars Delay (ms):</div> <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_carousel_hidebarsdelay_default" class="ei_sel" id="enjoyinstagram_carousel_hidebarsdelay_default"> <br /><i>('0' shows caption and action bar )</i>
                          <div class="ei_settings_float_block ei_fixed">          Hide Bars On Mobile:
                          </div> <select name="enjoyinstagram_carousel_hidebarsmobile_default" class="ei_sel" id="enjoyinstagram_carousel_hidebarsmobile_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
                                <div class="ei_settings_float_block ei_fixed">
                                    Show Likes Count:</div> <select name="enjoyinstagram_carousel_likes_count_default" class="ei_sel" id="enjoyinstagram_carousel_likes_count_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select> <div class="ei_settings_float_block ei_fixed">
                                Show Author: </div><select name="enjoyinstagram_carousel_image_author_default" class="ei_sel" id="enjoyinstagram_carousel_image_author_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

                                </div>
                           </div>





                </div>
			</div>


		<div class="grid grid-pad">

            <div class="col-1-4 mobile-col-1-1 hide-on-mobile">
				<div class="enin-content-empty">
                </div>
            </div>


             <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">

                                 <div class="enin-medium-header">Effects:</div>
                              <div class="ei_settings_float_block ei_fixed">      Random Angle:</div>

<select name="enjoyinstagram_album_random_angle_default" class="ei_sel" id="enjoyinstagram_album_random_angle_default">
<option value="true" <?php if (get_option('enjoyinstagram_album_random_angle_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
<option value="false" <?php if (get_option('enjoyinstagram_album_random_angle_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

                         <div class="ei_settings_float_block ei_fixed">

                                    Image Delay:
                                    </div>

<input type="number" name="enjoyinstagram_album_delay_default" class="ei_sel" id="enjoyinstagram_album_delay_default" value="<?php echo get_option('enjoyinstagram_album_delay_default'); ?>">
                                <div class="ei_settings_float_block ei_fixed">

                                    Images margin:
                                    </div>

<input type="number" name="enjoyinstagram_album_margin_default" class="ei_sel" id="enjoyinstagram_album_margin_default" value="<?php echo get_option('enjoyinstagram_album_margin_default'); ?>">


                            <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Speed Animation In:
                                </div>
                                <div class="ei_settings_float_block">
<input type="number" name="enjoyinstagram_album_animation_in_default" class="ei_sel" id="enjoyinstagram_album_animation_in_default" value="<?php echo get_option('enjoyinstagram_album_animation_in_default'); ?>">
                                </div>
                            </div>

                            <div class="ei_block">
                                <div class="ei_settings_float_block ei_fixed">
                                    Speed Animation Out:
                                </div>
                                <div class="ei_settings_float_block">
<input type="number" name="enjoyinstagram_album_animation_out_default" class="ei_sel" id="enjoyinstagram_album_animation_out_default" value="<?php echo get_option('enjoyinstagram_album_animation_out_default'); ?>">
                                </div>
                            </div>
                </div>
            </div>
            </div>

<hr/>
<!-- lightbox + other settings -->

          <div class="grid grid-pad">

                <div class="col-1-4 mobile-col-1-1">
                    <div class="enin-content-title">
                     <label for="enjoyinstagram_lightbox_options" class="enfasi">LightBox Default Settings:</label><br/><br/>
                     <?php echo '<img src="' . plugins_url( 'images/lightbox.png' , __FILE__ ) . '" > '; ?>

                    </div>
                </div>

                <div class="col-1-4 mobile-col-1-1">
                    <div class="enin-content">
                      <div class="enin-medium-header">Lightbox settings:</div>
                      <div class="ei_block">
                                    <div class="ei_settings_float_block ei_fixed">
                                        Hide Bars Delay (ms):
                                    </div>

                                    <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_carousel_hidebarsdelay_default" class="ei_sel" id="enjoyinstagram_carousel_hidebarsdelay_default"><br/><i>('0' shows caption and action bar)</i>

                                </div>

                                <div class="ei_block">
                                    <div class="ei_settings_float_block ei_fixed enin-label">
                                        Hide Bars On Mobile:
                                    </div>

                                    <select name="enjoyinstagram_carousel_hidebarsmobile_default" class="ei_sel" id="enjoyinstagram_carousel_hidebarsmobile_default">
                                        <option value="true" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                        </option>
                                        <option value="false" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                        </option>
                                    </select>

                                </div>

                                <div class="ei_block">
                                    <div class="ei_settings_float_block ei_fixed enin-label">
                                        Show Likes Count:
                                    </div>

                                    <select name="enjoyinstagram_carousel_likes_count_default" class="ei_sel" id="enjoyinstagram_carousel_likes_count_default">
                                        <option value="true" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                        </option>
                                        <option value="false" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='false') echo "selected='selected'";?>>No
                                        </option>
                                    </select>

                                </div>

                                <div class="ei_block">
                                    <div class="ei_settings_float_block ei_fixed">
                                        Show Image Author:
                                    </div>

                                    <select name="enjoyinstagram_carousel_image_author_default" class="ei_sel" id="enjoyinstagram_carousel_image_author_default">
                                        <option value="true" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                        </option>
                                        <option value="false" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='false') echo "selected='selected'";?>>No
                                        </option>
                                    </select>

                                </div>
                    </div>
                </div>




            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content-title">
                 <label for="enjoyinstagram_other_options" class="enfasi">Other Settings:</label>

                </div>
			</div>

            <div class="col-1-4 mobile-col-1-1">
				<div class="enin-content">
                  <div class="enin-medium-header">Auto-refresh:</div>
                <div class="ei_block">

                                <div class="ei_settings_float_block ei_fixed enin-label">
                                    AutoReload:
                                </div>

                               <select name="enjoyinstagram_carousel_autoreload_default" class="ei_sel" id="enjoyinstagram_carousel_autoreload_default">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

                                    <div class="ei_settings_float_block ei_fixed enin-label">
                                    interval (ms)
                                    </div>
                                    <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_autoreload_value_default'); ?>" name="enjoyinstagram_carousel_autoreload_value_default" class="ei_sel" id="enjoyinstagram_carousel_autoreload_value_default">

                                </div>
                            </div>
                </div>
			</div>



<hr/>




<input type="submit" class="button-primary" id="button_enjoyinstagram_advanced_default" name="button_enjoyinstagram_advanced_default" value="Save Settings" style="float:right;   margin-bottom:1em;"/>
              </form>
