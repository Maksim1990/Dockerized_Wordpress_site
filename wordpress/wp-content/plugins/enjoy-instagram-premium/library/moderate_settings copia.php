<form method="post" action="options.php" novalidate>
<?php settings_fields('enjoyinstagram_options_moderate_default_group'); ?>
<?php echo realpath(home_url()); ?>
 
<?php 
$array_utenti = get_option('enjoy_instagram_options'); 
$array_hashtag_moderate = get_option('hashtag_moderate');
$array_users_moderate = get_option('users_moderate');
global $wpdb;
?>
    
<div class="grid grid-pad">
	<div class="col-1-2 mobile-col-1-2">
		<h2>Moderation</h2> 
 		
	</div>
    <div class="col-1-2 mobile-col-1-2" style="text-align:right;">
    <!--input type="submit" class="button-primary" id="button_enjoyinstagram_advanced" name="button_enjoyinstagram_advanced" value="Save Settings"/-->
    </div>
    
</div>    
 <hr/>
             <div class="grid grid-pad">
            
            <div class="col-2-12 mobile-col-1-1">
				<div class="enin-content-title">
                	 
                      <?php echo '<img src="' . plugins_url( 'images/moderation.png' , __FILE__ ) . '" > '; ?>
                </div>
                
             </div>
             <div class="col-10-12 mobile-col-1-1"> 
                 <div class="grid grid-pad">
             <div class="enin-large-header">
                General Settings for Moderation Panel: </div>         
             
             
             <div class="col-5-12 mobile-col-1-1">
				 
                	
                 AutoRefresh Moderation Panel <br/><select name="autoreload_moderate_panel" class="ei_sel" id="autoreload_moderate_panel">
				
<option value="true" <?php if (get_option('autoreload_moderate_panel')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('autoreload_moderate_panel')=='false') echo "selected='selected'";?>>No</option>
                                     </select>
                                    
                                    
                
                
             </div>
              <div class="col-4-12 mobile-col-1-1">
				 
           Timeout AutoRefresh:<br />
<input type="number" name="autoreload_moderate_panel_value" id="autoreload_moderate_panel_value" value="<?php echo get_option('autoreload_moderate_panel_value'); ?>" class="ei_sel"> ms <br />
                                   
                                   
                 
                
             </div> 
                      

             </div>
                 
          <br />
       
<br />
           <input type="submit" class="button-primary" id="button_enjoyinstagram_advanced_autoreload" name="button_enjoyinstagram_advanced_autoreload" value="Save Autoreload Settings" style="float:left;margin-left: 20px;">   
            
     
           <br /><br /><hr />
              <div class="grid grid-pad">
              
               <div class="col-6-12 mobile-col-1-1">
               <div class="enin-content">
               <div class="enin-large-header">
                Apply moderation to a linked profile: </div> 
                            <?php foreach($array_utenti as $singolo_utente=>$key){
                                if($singolo_utente !=''){ 
                            ?>
                   <div class="acco-block" style="margin-bottom:0px;" >
     		<div class="acco-1-2">
            <div class="ei_settings_float_block">
               
             <input type="checkbox" name="users_moderate[]" class="users_moderator" id="users_moderate_<?php echo $singolo_utente; ?>" value="<?php echo $singolo_utente; ?>" <?php
if($array_users_moderate){if (in_array($singolo_utente, $array_users_moderate)) {
    echo 'checked';
}}
?>><label for="users_moderate_<?php echo $singolo_utente; ?>" ><b><?php echo $singolo_utente; ?></b></label>              		 
            </div>
            </div>
                <div class="acco-1-2">
            <div class="ei_settings_float_block">
            <?php if($array_users_moderate){if (in_array($singolo_utente, $array_users_moderate)) { ?> <a class="moderate_link button" data-type="user" id="moderate_link_<?php echo $singolo_utente; ?>" href="#" style="margin-left:10px;">Moderate It</a> <?php } }?>
            </div>
            </div>
            	
     	</div>

                            <?php
                                }
                            }
                            ?>
                   <br />
                   <i>choose user's images to apply moderation (link).</i> <!-- fabio -->
               </div>
                   
               </div>
                <div class="col-6-12 mobile-col-1-1">
                <div class="enin-content">
                      <div class="enin-large-header">
                Apply moderation to a single Hashtag: </div> 
                    <div id="dynamic_pos">
<?php
$p=0;
if(!$array_hashtag_moderate[0]){
    ?>
<input type="text" class="class_hashtag_moderate" name="hashtag_moderate[]" size="25" />
<input type="submit" class="button-primary" id="button_enjoyinstagram_advanced" name="button_enjoyinstagram_advanced" value="Save">
  
      <?php
  
}else{ 
	
  foreach($array_hashtag_moderate as $hashtag){
	    if (($p % 2) == 0){
			echo '<div class="pos_dynamic_div row_1">';
		}else{
			echo '<div class="pos_dynamic_div row_2">';
			
			}
			 
  if($p==0){
	  echo '<span class="field-hash">'.esc_attr( $hashtag ) .'</span>
			<input type="hidden" class="class_hashtag_moderate" name="hashtag_moderate[]" value="' . esc_attr( $hashtag ) . '" size="25" />
			<a href="#" class="elimina_dynamic_pos button"> - </a>';	  
	  echo '<a class="moderate_link button" data-type="hashtag" id="moderate_link_'.$hashtag.'" href="#" style="margin-left:10px;">Moderate It</a>';
  }else{
	  echo '<span class="field-hash">'.esc_attr( $hashtag ) .'</span>
			<input type="hidden" class="class_hashtag_moderate" name="hashtag_moderate[]" value="'.esc_attr( $hashtag ).'" size="25" />
			<a href="#" class="elimina_dynamic_pos button"> - </a>';
	  echo '<a class="moderate_link button" data-type="hashtag" id="moderate_link_'.$hashtag.'" href="#" style="margin-left:10px;">Moderate It</a>';
  }
  
  $p++;
  echo "</div>";
 
  } 
  
   echo '<p><a href="#" class="input_hashtag_moderate button button-primary button-large"> + New hashtag </a></p>';
  }
  echo '</div>';
  
  
  ?>
                
                
                </div>
                </div>
                  
                  
              </div>
              
          

             
             </div>   
             
      <div class="grid grid-pad" style="text-align:right;">
      <div class="col-1-1 mobile-col-1-1">
             <input type="submit" class="button-primary" style="display:none;" id="button_enjoyinstagram_advanced" name="button_enjoyinstagram_advanced" value="Save Settings"/>  
             </div>
             </div>
           </div>     
  <hr/></form>
   
   <div id="ancora"></div> 
<div id="load_moderation_subpanel" >
  <?php echo '<img src="' . plugins_url( 'images/moderation-panel.png' , __FILE__ ) . '" style="width:100%"> '; ?>
         
    </div>
   
   
         
           
            