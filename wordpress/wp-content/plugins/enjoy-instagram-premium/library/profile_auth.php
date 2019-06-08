<div class="grid grid-pad">
	<div class="col-1-1 mobile-col-1-1">
		<h2>Linked Instagram Profiles</h2>
 		<hr />
	</div>
</div>
<div class="grid grid-pad">

            <div class="col-2-12 mobile-col-1-1">
				<div class="enin-content-title" style="text-align:center;">

                      <img src="<?php echo plugins_url('images/users.png',__FILE__); ?>">
                      <!--div id="id_add_new_user"-->
          <input type="button" id="button_add_new_user" value="Add New User" class="button-primary ei_top"  />

            <!--/div-->
                  </div>

             </div>
             <div class="col-10-12 mobile-col-1-1" style="border-left:1px dashed #C9C9C9; padding:0.5em; padding-top:0; margin-top:0;">

                  <?php $utenti = get_option('enjoy_instagram_options');
         if(is_array($utenti) && count(($utenti))>0){
              foreach($utenti as $user){
									$singolo_utente = (array) $user;
                  if($singolo_utente['username']){
                ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row" style="align:left;">
   <div id="enjoy_user_profile">
                    	 <img class="enjoy_user_profile" src="<?php echo $singolo_utente['profile_picture']; ?>">
                           <input type="button" id="button_logout_<?php echo $singolo_utente['id']; ?>" value="Unlink User" class="button-primary ei_top button_logout" />
                         </div>
    </th>
    <td>


            <div id="enjoy_user_block" >

            <h3><?php echo $singolo_utente['username']; ?></h3>
            <p><i><?php echo $singolo_utente['bio']; ?></i></p>
            <hr/>
            Customize the plugin with our <a href="<?php echo get_admin_url(); ?>options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_advanced_settings">settings</a> tab.

            <hr />
            </div>
            </p>
    </td>
    </tr>
    </tbody>
</table>

                <?php } }
        }
        ?>
        <table class="form-table">
            <tbody>
                <tr>
         <td>
            <dl class="enjoy_accordion" id="enjoy_accordion_new_user" style="display:none;">
                <form method="post" action="options.php">
                    <?php settings_fields('enjoyinstagram_options_group_auth'); ?>
                    <p>
                       To add a new user, click the button below ( If you are logged in Instagram, remember to log out first ).
                    </p>
                    <p>
                        <input type="button" class="button-primary" id="button_autorizza_instagram" name="button_autorizza_instagram" value="Add New User" />
                    </p>

                </form>
         </dl>
        </td>
                </tr>
        </tbody>
         </table>
           </div>





              	</div>
