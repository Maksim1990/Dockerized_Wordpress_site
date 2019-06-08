<?php
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-widget');
wp_enqueue_script('jquery-ui-position');
wp_enqueue_script('jquery');
global $wp_scripts;
?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>EnjoyInstagram Premium</title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo plugins_url('enjoyinstagramtinymce.js',__FILE__); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/css/accordion.css',__FILE__); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/css/tabs.css',__FILE__); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/css/enjoy_tabs.css',__FILE__); ?>" />
        <!-- link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../css/simplegrid.css',__FILE__); ?>" /-->

        <script type="text/javascript">


            jQuery(document).ready(function($){

                jQuery(document).on('change','#show_resolution_carousel', function(){

                if(jQuery('#show_resolution_carousel').is(':checked')){
                    console.log('check');
                       jQuery('#div_show_resolution_carousel').fadeIn('slow');
                   }else{

                       jQuery('#div_show_resolution_carousel').fadeOut('slow');
                   }
                });

                jQuery(document).on('change','#show_resolution_grid', function(){

                if(jQuery('#show_resolution_grid').is(':checked')){
                    console.log('check');
                       jQuery('#div_show_resolution_grid').fadeIn('slow');
                   }else{

                       jQuery('#div_show_resolution_grid').fadeOut('slow');
                   }
                });


    $("input[name$='enjoyinstagram_user_or_hashtag']").click(function() {
        var test = $(this).val();
		if(test=='user'){
		$('#enjoyinstagram_hashtag').attr('disabled',true);

                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_user_carousel").hide();
                $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").show();
                $('input[value="likes"]').hide();
                } else
                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_user_carousel").show();
                $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").hide();
                $("input[value='likes']").hide();
                }
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_public_account").hide();
		}else if(test=='hashtag'){
		            $('#enjoyinstagram_hashtag').attr('disabled',false);
                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").show();
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel").hide();
                }else
                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel").show();
                }
                $("#enjoyinstagram_user_or_hashtag_user_carousel").hide();
                $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_public_account").hide();

		}else if(test == 'public_account'){

      $('#enjoyinstagram_hashtag').attr('disabled',true);
      if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'true'){
      //$("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").show();
      //$("#enjoyinstagram_user_or_hashtag_hashtag_carousel").hide();
      $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").hide();
      $("#enjoyinstagram_user_or_hashtag_public_account").show();
      }else
      if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'false'){
      $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").hide();
      $("#enjoyinstagram_user_or_hashtag_public_account").show();
      }
      $("#enjoyinstagram_user_or_hashtag_user_carousel").hide();
      $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").hide();

    }else if(test=='likes'){
		$('#enjoyinstagram_hashtag').attr('disabled',true);

                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_user_carousel").hide();
                $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").show();
                } else
                if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_user_carousel").show();
                $("#enjoyinstagram_user_or_hashtag_user_carousel_moderate").hide();
                }
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_public_account").hide();

		}
    });



    $('#enjoyinstagram_carousel_moderate').change(function() {
        if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'true'){
        if($("input[name$='enjoyinstagram_user_or_hashtag']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_carousel_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_carousel').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_carousel').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag']:checked").val() == 'likes'){
          $("input[name$='enjoyinstagram_user_or_hashtag']:checked").attr('disabled',true);
          $("input[value$='user']").click();
            /*
        $('#enjoyinstagram_user_or_hashtag_user_carousel_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_carousel').fadeOut('slow');
        */
        }

        }

        else if(jQuery('#enjoyinstagram_carousel_moderate option:selected').val() == 'false'){
        if($("input[name$='enjoyinstagram_user_or_hashtag']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_carousel').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_user_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel').fadeOut('slow');
        }else
        if($("input[name$='enjoyinstagram_user_or_hashtag']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_carousel').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_carousel').fadeIn('slow');
        }

        $("input[value$='likes']").attr('disabled',false);


        }
    });

    $("input[name$='enjoyinstagram_user_or_hashtag_grid']").click(function() {

        var test = $(this).val();
		if(test=='user'){
		$('#enjoyinstagram_hashtag_grid').attr('disabled',true);
                if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_user_grid").hide();
                $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").show();
                }
                else
                if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_user_grid").show();
                $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
                }
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_grid_public_account").hide();

		}else if(test=='public_account'){
      if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'true'){
        //$("#enjoyinstagram_user_or_hashtag_user_grid").hide();
        //$("#enjoyinstagram_user_or_hashtag_user_grid_moderate").show();
        $("#enjoyinstagram_user_or_hashtag_grid_public_account").show();
        $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
        $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();
      }
      else
      if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'false'){
        $("#enjoyinstagram_user_or_hashtag_grid_public_account").show();
        $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
      }
      $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();
      $("#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate").hide();
      $("#enjoyinstagram_user_or_hashtag_user_grid").hide();
      $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
      $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();


    }else if(test=='hashtag'){
		$('#enjoyinstagram_hashtag_grid').attr('disabled',false);
                if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate").show();
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();
                }else
                if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_grid").show();
                }
                $("#enjoyinstagram_user_or_hashtag_user_grid").hide();
                $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_grid_public_account").hide();


		}else if(test=='likes'){
		    $('#enjoyinstagram_hashtag_grid').attr('disabled',true);

        if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'true'){
        $("#enjoyinstagram_user_or_hashtag_user_grid").hide();
        $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").show();
        } else
        if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'false'){
        $("#enjoyinstagram_user_or_hashtag_user_grid").show();
        $("#enjoyinstagram_user_or_hashtag_user_grid_moderate").hide();
        }
        $("#enjoyinstagram_user_or_hashtag_hashtag_grid").hide();
        $("#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate").hide();
        $("#enjoyinstagram_user_or_hashtag_grid_public_account").hide();

		}


    });

    $('#enjoyinstagram_grid_moderate').change(function() {
        if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'true'){

        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_grid_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_grid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_grid').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'likes'){
        $('#enjoyinstagram_user_or_hashtag_user_grid_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_grid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        $("input[value$='user']").click();
        }
        }else if(jQuery('#enjoyinstagram_grid_moderate option:selected').val() == 'false'){
        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_grid').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_user_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',false);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_grid').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_grid').fadeIn('slow');
        $("input[value$='likes']").attr('disabled',false);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_grid']:checked").val() == 'likes'){
        $("input[value$='likes']").attr('disabled',true);
        }


        }
    });


    $("input[name$='enjoyinstagram_user_or_hashtag_polaroid']").click(function() {

        var test = $(this).val();
		if(test=='user'){
		$('#enjoyinstagram_hashtag_polaroid').attr('disabled',true);

                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
                $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").show();
                } else
                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_user_polaroid").show();
                $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").hide();
                }
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_polaroid_public_account").hide();

		}else if(test=='public_account'){

      $('#enjoyinstagram_hashtag_polaroid').attr('disabled',true);
      if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'true'){
      //$("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
      //$("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").show();
        $("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
        $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").hide();
        $("#enjoyinstagram_user_or_hashtag_polaroid_public_account").show();

      } else if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'false'){
        $("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
        $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").hide();
        $("#enjoyinstagram_user_or_hashtag_polaroid_public_account").show();
      }
      $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid").hide();
      $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate").hide();

    }else if(test=='hashtag'){
		$('#enjoyinstagram_hashtag_polaroid').attr('disabled',false);
                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate").show();
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid").hide();
                }else
                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid").show();
                }
                $("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
                $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_polaroid_public_account").hide();


		}
                else
                if(test=='likes'){
		$('#enjoyinstagram_hashtag_polaroid').attr('disabled',true);

                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'true'){
                $("#enjoyinstagram_user_or_hashtag_user_polaroid").hide();
                $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").show();
                } else
                if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'false'){
                $("#enjoyinstagram_user_or_hashtag_user_polaroid").show();
                $("#enjoyinstagram_user_or_hashtag_user_polaroid_moderate").hide();
                }
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid").hide();
                $("#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate").hide();
                $("#enjoyinstagram_user_or_hashtag_polaroid_public_account").hide();

		}
    });

    $('#enjoyinstagram_polaroid_moderate').change(function() {
        if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'true'){

        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_polaroid_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_polaroid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_polaroid').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',true);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'likes'){
        $("input[value$='likes']").attr('disabled',true);
        $("input[value$='user']").click();
        }
        }else if(jQuery('#enjoyinstagram_polaroid_moderate option:selected').val() == 'false'){
        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'user'){
        $('#enjoyinstagram_user_or_hashtag_user_polaroid').fadeIn('slow');
        $('#enjoyinstagram_user_or_hashtag_user_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid').fadeOut('slow');
        $("input[value$='likes']").attr('disabled',false);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'hashtag'){
        $('#enjoyinstagram_user_or_hashtag_user_polaroid').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_user_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate').fadeOut('slow');
        $('#enjoyinstagram_user_or_hashtag_hashtag_polaroid').fadeIn('slow');
        $("input[value$='likes']").attr('disabled',false);
        }
        else
        if($("input[name$='enjoyinstagram_user_or_hashtag_polaroid']:checked").val() == 'likes'){
        $("input[value$='likes']").attr('disabled',false);
        }

        }
    });

    /* altezza tab */



    });
</script>
        <base target="_self" />
        <?php wp_print_scripts(); ?>
    </head>

    <body id="link">
        <?php
        $array_utenti = get_option('enjoy_instagram_options');
        $array_utenti = array_filter($array_utenti);
        /*,function($k) {
				    return is_string($k);
				}, ARRAY_FILTER_USE_KEY);*/
        $array_users_moderate = get_option('users_moderate');
        $array_hashtag_moderate = get_option('hashtag_moderate');
        ?>
        <table border="0" style="margin:20px;width: 90%;">
                <tr>
            <td colspan="2">Insert Enjoy Instagram Shortcode</td>
                    </tr>
           </table>
        <form name="enjoyinstagram" action="#">
            <div class="main">




				<section class="enjoy_tabs">
                    <input id="enjoy_tab-1" type="radio" name="radio-set" class="enjoy_tab-selector-1" checked="checked" />
		    <label for="enjoy_tab-1" class="enjoy_tab-label-1">Carousel View</label>

	            <input id="enjoy_tab-2" type="radio" name="radio-set" class="enjoy_tab-selector-2" />
		    <label for="enjoy_tab-2" class="enjoy_tab-label-2">Grid View</label>

	            <input id="enjoy_tab-3" type="radio" name="radio-set" class="enjoy_tab-selector-3" />
		    <label for="enjoy_tab-3" class="enjoy_tab-label-3">Polaroid View</label>

	            <input id="enjoy_tab-4" type="radio" name="radio-set" class="enjoy_tab-selector-4" />
		    <label for="enjoy_tab-4" class="enjoy_tab-label-4">Album View</label>

                    <input id="enjoy_tab-5" type="radio" name="radio-set" class="enjoy_tab-selector-5" />
		    <label for="enjoy_tab-5" class="enjoy_tab-label-5">User Badge</label>


			    <div class="clear-shadow"></div>

		        <div class="content">
			    <div class="content-1">
                                    <div class="display_content_tabs">
				<div id="enin-tab-content1" class="enin-tab-content">
                                    <div class="label_moderate acco-block">
                                        <div class="acco-1-4" style="width: 100px;">
                        <div class="ei_settings_float_block">
                            <img src="<?php echo plugins_url('images/moderation.png',__FILE__); ?>" width="80">
                                </div></div>
                                        <div class="acco-1-4">
                                            <div class="ei_settings_float_block" style="font-size: 18px !important;">
                                        Moderate:<br /> <select name="enjoyinstagram_carousel_moderate" id="enjoyinstagram_carousel_moderate" class="ei_sel" style="font-size: 14px !important;
margin: 5px 0px;">
<option value="true"> Yes </option>
<option value="false" selected> No </option>
                                        </select>  </div></div>
                                    </div>

			            <div class="animated  bounceInDown">
<section class="ac-container">
<!-- CAROUSEL inclusion mode -->
<div class="into_display_content_tabs">
    <input id="ac-1" name="accordion-1" type="radio" checked />
    <label for="ac-1">Inclusion Mode</label>
    <article class="ac-small">

                            <div class="acco-block">
                                <div class="enin-medium-header">Show Pics:</div>
                                <div  class="acco-1-4">
                        <div class="ei_settings_float_block">
                            <input type="radio" name="enjoyinstagram_user_or_hashtag" id="label_enjoyinstagram_user_or_hashtag" value="user" checked><label for="label_enjoyinstagram_user_or_hashtag">of Your Profile</label><br/>
                            <input type="radio" name="enjoyinstagram_user_or_hashtag" id="label_enjoyinstagram_user_or_hashtag_1" value="public_account"><label for="label_enjoyinstagram_user_or_hashtag_1">of a public account</label><br/>
                                <input type="radio"  name="enjoyinstagram_user_or_hashtag" id="label_enjoyinstagram_user_or_hashtag_2" value="hashtag"><label for="label_enjoyinstagram_user_or_hashtag_2">by Hashtag</label><br />
                                    <input type="radio"  name="enjoyinstagram_user_or_hashtag" id="label_enjoyinstagram_user_or_hashtag_3" value="likes"><label for="label_enjoyinstagram_user_or_hashtag_3">Favourites</label><br />
                            </div>
                        </div>
                        <div class="acco-1-3">
                            <div class="ei_settings_float_block">

    <div id="enjoyinstagram_user_or_hashtag_user_carousel" class="desc">
                             &nbsp;
                                                     <select id="enjoyinstagram_user_carousel">
                                                         <?php


                                                         foreach($array_utenti as $singolo_utente) {
                                                             if($singolo_utente[username]!=''){ ?>
                                                         <option value ="<?php echo $singolo_utente['username']; ?>"><?php echo $singolo_utente['username']; ?></option>
                                                         <?php } } ?>
                                                     </select></br>
                                                     Restrict by the following hashtags (without # and separated by comma)
                                                     <input type="text" name="enjoyinstagram_user_hashtag_carousel" value=""/>
    </div>
    <div id="enjoyinstagram_user_or_hashtag_user_carousel_moderate" class="desc" style="display: none;">
                             &nbsp;
    <select id="enjoyinstagram_user_carousel_moderate">
                                                         <?php


    foreach($array_users_moderate as $singolo_utente_moderate) { ?>
        <option value ="<?php echo $singolo_utente_moderate; ?>"><?php echo $singolo_utente_moderate; ?> - Moderated</option>
    <?php } ?>
                                                     </select>
                                                     <br />
    You can add others moderated user going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>
    </div>

    <div id="enjoyinstagram_user_or_hashtag_hashtag_carousel" class="desc" style="display:none;">
                            <input type="text" id="enjoyinstagram_hashtag_popup" required name="enjoyinstagram_hashtag_popup" />
                            <br/><span class="description">INSERT HASHTAGS (WITHOUT '#') SEPARATED BY COMMA</span>

    </div>

    <div id="enjoyinstagram_user_or_hashtag_public_account" class="desc" style="display:none;">
                            <input type="text" id="enjoyinstagram_account_popup" required name="enjoyinstagram_account_popup" />
                            <br/><span class="description">INSERT THE PUBBLIC INSTAGRAM ACCOUNT (WITHOUT '@')</span>

    </div>

    <div id="enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate" class="desc" style="display: none; height:100px; overflow: scroll !important;">
                             &nbsp;


  <?php
  foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
  <input type="checkbox" name="enjoyinstagram_hashtag_popup_moderate" value="<?php echo $singolo_hashtag_moderate; ?>"/><?php echo $singolo_hashtag_moderate; ?>  - moderated <br />
  <?php } ?>
                                                     <br />
    You can add others moderated hashtag going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>

    </div>
                             </div>
                        </div>



                     </div>
    </article>
</div>

<!-- CAROUSEL carousel settings -->
<div class="into_display_content_tabs">
    <input id="ac-2" name="accordion-1" type="radio" />
    <label for="ac-2">Carousel Settings</label>
    <article class="ac-medium">


     <div class="acco-block">
                <div class="enin-medium-header">GENERAL OPTIONS:</div>


                                <div class="acco-1-4">
                                <div class="ei_block">

                                <div class="ei_settings_float_block ei_fixed">
                                    Images displayed<br /> at a time:
                                    <br/>
                                     <select name="enjoyinstagram_carousel_items_number" class="ei_sel" id="enjoyinstagram_carousel_items_number">
				<?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_items_number_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
                                </div>

                            </div>
                                </div>
                                <div class="acco-1-4">
                                <div class="ei_settings_float_block">
                                    Animate In:<br/><select name="enjoyinstagram_carousel_animatein"  id="enjoyinstagram_carousel_animatein">
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

                                </div>
                                </div>
                                <div class="acco-1-4">
                                 <div class="ei_settings_float_block">
                                Animate Out: <br/>
                                <select name="enjoyinstagram_carousel_animateout"  id="enjoyinstagram_carousel_animateout">
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
                            <div class="acco-1-4">
                                <div class="ei_block">

                                <div class="ei_settings_float_block ei_fixed">
                                    Show different number of images for different screen resolution ?
                                    <br />
                                    <input type="checkbox" name="show_resolution_carousel" id="show_resolution_carousel">
                                </div>

                            </div>
                                </div>
    	</div>
    <div class="acco-block" id="div_show_resolution_carousel" style="display:none;" >
            <div class="enin-medium-header"> Select number of image for screen resolution</div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>Screen resolution ≤ 480px</b><br />
            Images displayed at a time: <br />

<select name="enjoyinstagram_carousel_480px" id="enjoyinstagram_carousel_480px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_480px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>


            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
             <b>Screen resolution ≤ 600px</b><br />
                                Images displayed at a time: <br />
                                  <select name="enjoyinstagram_carousel_600px" id="enjoyinstagram_carousel_600px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_600px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
            </div>
            </div>

            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>Screen resolution ≤ 768px</b><br />
                                    Images displayed at a time: <br />
                                     <select name="enjoyinstagram_carousel_768px" id="enjoyinstagram_carousel_768px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_768px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
            </div>
            </div>
                                         <div class="acco-1-4">
            <div class="ei_settings_float_block">

            <b>Screen resolution ≤ 1024px</b><br />
                                    Images displayed at a time: <br />
             <select name="enjoyinstagram_carousel_768px" id="enjoyinstagram_carousel_1024px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_carousel_1024px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                       </select>
            </div>
            </div>

    </div>
     	<div class="acco-block zebra" >
            <div class="enin-medium-header">WHEN YOU CLICK ON AN IMAGE</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
     	   		Link Image to:
                </div>
        	</div>
        	<div class="acco-1-4">
        	 	<div class="ei_settings_float_block">
                                <input type="radio" id="enjoyinstagram_carousel_link_1" name="enjoyinstagram_carousel_link" value="swipebox" <?php if (get_option('enjoyinstagram_carousel_link_default')=='swipebox')
                                    echo "checked";?>><label for="enjoyinstagram_carousel_link_1">LightBox Effect</label><br />
                                <input type="radio" id="enjoyinstagram_carousel_link_2" name="enjoyinstagram_carousel_link" value="instagram" <?php if (get_option('enjoyinstagram_carousel_link_default')=='instagram')
                                    echo "checked";?>><label for="enjoyinstagram_carousel_link_2">Instagram</label><br />
                                <input type="radio" id="enjoyinstagram_carousel_link_3" name="enjoyinstagram_carousel_link" value="nolink" <?php if (get_option('enjoyinstagram_carousel_link_default')=='nolink')
                                    echo "checked";?>><label for="enjoyinstagram_carousel_link_3">No Link</label><br />
                                <input type="radio" id="enjoyinstagram_carousel_link_4" name="enjoyinstagram_carousel_link" value="altro" <?php if (get_option('enjoyinstagram_carousel_link_default')=='altro')
                                    echo "checked";?>><label for="enjoyinstagram_carousel_link_4">Altro</label>
                                <input type="text"  name="enjoyinstagram_carousel_link_altro" value="<?php echo get_option('enjoyinstagram_carousel_link_altro_default'); ?>" id="enjoyinstagram_carousel_link_altro" <?php if (get_option('enjoyinstagram_carousel_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
                 </div>
        	</div>
        	<div class="acco-1-3">

        </div>

 </div>

    	<div class="acco-block">
            <div class="enin-medium-header">Carousel Navigation</div>
    <div class="acco-1-3">
         <div class="ei_settings_float_block">

                                	Navigation buttons:<br/>

                                <select name="enjoyinstagram_carousel_navigation" class="ei_sel" id="enjoyinstagram_carousel_navigation">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_navigation_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_navigation_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>



                           		</div>
        </div>
        <div class="acco-1-3">
         <div class="ei_settings_float_block">
         Previous Button Text: <input type="text" value="<?php echo get_option('enjoyinstagram_carousel_navigation_prev_default'); ?>" name="enjoyinstagram_carousel_navigation_prev"  id="enjoyinstagram_carousel_navigation_prev">
         </div>
        </div>
        <div class="acco-1-3">
         <div class="ei_settings_float_block">
        Next Button Text: <input type="text" value="<?php echo get_option('enjoyinstagram_carousel_navigation_next_default'); ?>" name="enjoyinstagram_carousel_navigation_next"  id="enjoyinstagram_carousel_navigation_next">
        </div>
        </div>
    </div>
    <div class="acco-block" >
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

                                	Slide Speed (ms):<br/>

<input type="number" name="enjoyinstagram_carousel_slidespeed" value="<?php echo get_option('enjoyinstagram_carousel_slidespeed_default'); ?>" class="ei_sel" id="enjoyinstagram_carousel_slidespeed">


            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Dots:<br/>
                                <select name="enjoyinstagram_carousel_dots" class="ei_sel" id="enjoyinstagram_carousel_dots">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_dots_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_dots_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Loop:<br/>
                                <select name="enjoyinstagram_carousel_loop" class="ei_sel" id="enjoyinstagram_carousel_loop">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_loop_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_loop_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     </div>

<div class="acco-block zebra">
                    <div class="enin-medium-header">Autoplay</div>
    <div class="acco-1-4">
    <div class="ei_settings_float_block">

                                	Auto Play:<br/>

                                <select name="enjoyinstagram_carousel_autoplay" class="ei_sel" id="enjoyinstagram_carousel_autoplay">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoplay_default')=='true') echo "selected='selected'";?>>Yes</option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoplay_default')=='false') echo "selected='selected'";?>>No</option>
                                </select>
    </div>
    </div>
     <div class="acco-1-4">
      <div class="ei_settings_float_block">
      			Stop on Hover: <br />
                                        <select name="enjoyinstagram_carousel_stop_on_hover" class="ei_sel" id="enjoyinstagram_carousel_stop_on_hover">
<option value="true" <?php if (get_option('enjoyinstagram_carousel_stop_on_hover_default')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('enjoyinstagram_carousel_stop_on_hover_default')=='false') echo "selected='selected'";?>>No</option>
</select>
    </div>
    </div>
     <div class="acco-1-4">
      <div class="ei_settings_float_block">
      		 Timeout Autoplay:<br />
<input type="number" name="enjoyinstagram_carousel_autoplay_timeout" id="enjoyinstagram_carousel_autoplay_timeout" value="<?php echo get_option('enjoyinstagram_carousel_autoplay_timeout_default'); ?>" class="ei_sel"><br/>


    </div>
    </div>

    <div class="acco-1-4">
      <div class="ei_settings_float_block">

 Speed Autoplay:<br />
<input type="number" name="enjoyinstagram_carousel_autoplay_speed" id="enjoyinstagram_carousel_autoplay_speed" value="<?php echo get_option('enjoyinstagram_carousel_autoplay_speed_default'); ?>" class="ei_sel">

    </div>
    </div>


     </div>






         <div class="acco-block" >
             <div class="enin-medium-header">LIGHTBOX OPTIONS:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

                Hide Bars Delay: <br /><input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_carousel_hidebarsdelay" class="ei_sel" id="enjoyinstagram_carousel_hidebarsdelay"> ms <br />( 0 to always show <br />caption and action bar )

            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">

                                    Hide Bars On Mobile: <br/>
                                    <select name="enjoyinstagram_carousel_hidebarsmobile" class="ei_sel" id="enjoyinstagram_carousel_hidebarsmobile">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">

                         Show Likes Count: <br />
                         <select name="enjoyinstagram_carousel_likes_count" class="ei_sel" id="enjoyinstagram_carousel_likes_count">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
             <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                Show Author: <br />
                                <select name="enjoyinstagram_carousel_image_author" class="ei_sel" id="enjoyinstagram_carousel_image_author">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
     </div>

  <div class="acco-block zebra" >
      <div class="enin-medium-header">AUTORELOAD</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Autoreload<br />
            <select name="enjoyinstagram_carousel_autoreload" class="ei_sel" id="enjoyinstagram_carousel_autoreload">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>

            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                time to reload<br />
             <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_autoreload_value_default'); ?>" name="enjoyinstagram_carousel_autoreload_value" class="ei_sel" id="enjoyinstagram_carousel_autoreload_value"> ( ms )
            </div>
            </div>

	    </div>

    <div class="acco-block" >
      <div class="enin-medium-header">STYLE</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                MARGIN OF EACH IMAGE<br />
            <input type="number" name="enjoyinstagram_carousel_margin" class="ei_sel" value="<?php echo get_option('enjoyinstagram_carousel_margin_default'); ?>" id="enjoyinstagram_carousel_margin"> px
            </div>
            </div>


     	</div>




                                        </article>
				</div>



			</section>
                                    <table class="form-table">
                                            <body>
                                                 <tr>
                    <td>
<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoyinstagram'); ?>" onClick="insertenjoyinstagramshortcode();" />

                    </td>
                    <td>
 <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoyinstagram'); ?>" onClick="tinyMCEPopup.close();" />

                    </td>
                    </tr>
                                            </body>
                                        </table>
                                    </div>
			          </div>
                                </div></div>
			    <div class="content-2">
                                    <div class="display_content_tabs">



                                        <div id="enin-tab-content2" class="enin-tab-content">

                                            <div class="label_moderate acco-block">
                                        <div class="acco-1-4" style="width: 100px;">
                        <div class="ei_settings_float_block">
                            <img src="<?php echo plugins_url('images/moderation.png',__FILE__); ?>" width="80">
                                </div></div>
                                        <div class="acco-1-4">
                                            <div class="ei_settings_float_block" style="font-size: 18px !important;">
                                        Moderate:<br /> <select name="enjoyinstagram_grid_moderate" id="enjoyinstagram_grid_moderate" class="ei_sel" style="font-size: 14px !important;
margin: 5px 0px;">
<option value="true"> Yes </option>
<option value="false" selected> No </option>
</select>   </div></div>
                                    </div>



			            <div class="animated  bounceInDown">
			              <section class="ac-container">
				<div class="into_display_content_tabs">
					<input id="ac-21" name="accordion-2" type="radio" checked />
					<label for="ac-21">Inclusion Mode</label>
					<article class="ac-small">
                                            <div class="acco-block" >
               <div class="enin-medium-header">show pics:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                <input type="radio" name="enjoyinstagram_user_or_hashtag_grid" id="enjoyinstagram_user_or_hashtag_grid_1" value="user" checked>of <label for="enjoyinstagram_user_or_hashtag_grid_1">Your Profile</label><br/>
                <input type="radio" name="enjoyinstagram_user_or_hashtag_grid" id="label_enjoyinstagram_user_or_hashtag_grid_15" value="public_account"><label for="label_enjoyinstagram_user_or_hashtag_grid_15">of a public account</label><br/>
                <input type="radio"  name="enjoyinstagram_user_or_hashtag_grid" id="enjoyinstagram_user_or_hashtag_grid_2"  value="hashtag"><label for="enjoyinstagram_user_or_hashtag_grid_2">by Hashtag</label><br />
                <input type="radio" name="enjoyinstagram_user_or_hashtag_grid" id="enjoyinstagram_user_or_hashtag_grid_3" value="likes"><label for="enjoyinstagram_user_or_hashtag_grid_3">Favourites</label><br/>

            </div>
            </div>
                <div class="acco-1-4">
            <div class="ei_settings_float_block">

            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <div id="enjoyinstagram_user_or_hashtag_user_grid" class="desc" >
						 &nbsp;
                                                 <select id="enjoyinstagram_user_grid">
                                                     <?php


                                                     foreach($array_utenti as $singolo_utente) {
                                                         if($singolo_utente[username]!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>"><?php echo $singolo_utente['username']; ?></option>
                                                     <?php } } ?>
                                                 </select></br>
                                                 Restrict by the following hashtags (without # and separated by comma)
                                                 <input type="text" name="enjoyinstagram_user_hashtag_grid" value=""/>
						</div>
<div id="enjoyinstagram_user_or_hashtag_user_grid_moderate" class="desc" style="display: none;">
						 &nbsp;
<select id="enjoyinstagram_user_grid_moderate">
                                                     <?php


foreach($array_users_moderate as $singolo_utente_moderate) { ?>
    <option value ="<?php echo $singolo_utente_moderate; ?>"><?php echo $singolo_utente_moderate; ?> - Moderated</option>
<?php } ?>
                                                 </select>
                                                 <br />
You can add others moderated user going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>
</div>



<div id="enjoyinstagram_user_or_hashtag_hashtag_grid" class="desc" style="display:none;">
<input type="text" id="enjoyinstagram_hashtag_popup_grid" required name="enjoyinstagram_hashtag_popup_grid" />
<span class="description"><br />INSERT HASHTAGS (WITHOUT '#') SEPARATED BY COMMA</span>
</div>

<div id="enjoyinstagram_user_or_hashtag_grid_public_account" class="desc" style="display:none;">
  <input type="text" id="enjoyinstagram_account_grid_popup" required name="enjoyinstagram_account_grid_popup" />
  <br/><span class="description">INSERT THE PUBBLIC INSTAGRAM ACCOUNT (WITHOUT '@')</span>
</div>


<div id="enjoyinstagram_user_or_hashtag_hashtag_grid_moderate" class="desc" style="display: none; height: 100px; overflow: scroll !important;" >
						 &nbsp;


<?php
foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
<input type="checkbox" name="enjoyinstagram_hashtag_popup_grid_moderate" value="<?php echo $singolo_hashtag_moderate; ?>"/><?php echo $singolo_hashtag_moderate; ?>  - moderated <br />
<?php } ?>



                                                 <br />
You can add others moderated hashtag going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>


</div>
            </div>
            </div>
     	</div>

                                        </article>
				</div>
				<div class="into_display_content_tabs">
					<input id="ac-22" name="accordion-2" type="radio" />
					<label for="ac-22">Grid Settings</label>
					<article class="ac-grid-2">

                                        <div class="acco-block" >
                                            <div class="enin-medium-header">GENERAL OPTIONS:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
               Number or Images<br />( COLS x ROWS )

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            Number of Columns:<br />
            <select name="enjoyinstagram_grid_cols" id="enjoyinstagram_grid_cols" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
            </div>
            </div>
                                            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            Number of Rows:<br />
            <select name="enjoyinstagram_grid_rows" id="enjoyinstagram_grid_rows" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
            </div>
            </div>
            	<div class="acco-1-4">
                                <div class="ei_block">

                                <div class="ei_settings_float_block ei_fixed">
                                    Show different number of images for different screen resolution ?
                                    <br />
                                    <input type="checkbox" name="show_resolution_grid" id="show_resolution_grid">
                                </div>

                            </div>
                                </div>

     	</div>
                                            <div class="acco-block" id="div_show_resolution_grid" style="display: none;">
                                              <div class="enin-medium-header">SELECT NUMBER OF IMAGES FOR SCREEN RESOLUTION ( COLS X ROWS ):</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>480px</b><br />
             Number of Columns:<br />
             <select name="enjoyinstagram_grid_cols_480px" id="enjoyinstagram_grid_cols_480px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_480px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select>
<br />
 Number of Rows:<br />
 <select name="enjoyinstagram_grid_rows_480px" id="enjoyinstagram_grid_rows_480px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_480px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>600px</b><br />Number of Columns:<br />
            <select name="enjoyinstagram_grid_cols_600px" id="enjoyinstagram_grid_cols_600px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_600px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select><br />
                                    Number of Rows:<br />
                                    <select name="enjoyinstagram_grid_rows_600px" id="enjoyinstagram_grid_rows_600px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_600px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>768px</b><br />Number of Columns:<br />
            <select name="enjoyinstagram_grid_cols_768px" id="enjoyinstagram_grid_cols_768px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_768px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select><br />
             Number of Rows:    <br />
             <select name="enjoyinstagram_grid_rows_768px" id="enjoyinstagram_grid_rows_768px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_rows_768px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                 </select>
            </div>
            </div>

            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <b>1024px</b><br /> Number of Columns:<br />
            <select name="enjoyinstagram_grid_cols_1024px" id="enjoyinstagram_grid_cols_1024px" class="ei_sel">
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_cols_1024px_default')==$i)
                                        echo "selected='selected'";?>>
                                        <?php echo "&nbsp;".$i;	 ?>
                                        </option>

                                    <?php } ?>
                                    </select><br />
                          Number of Rows:<br />
            <select name="enjoyinstagram_grid_rows_1024px" id="enjoyinstagram_grid_rows_1024px" class="ei_sel">
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

                                            <div class="acco-block zebra" >
                                                <div class="enin-medium-header">WHEN YOU CLICK ON AN IMAGE</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
               Link Image to:

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <input type="radio" name="enjoyinstagram_grid_link" value="swipebox" <?php if (get_option('enjoyinstagram_grid_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
<input type="radio" name="enjoyinstagram_grid_link" value="instagram" <?php if (get_option('enjoyinstagram_grid_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
<input type="radio" name="enjoyinstagram_grid_link" value="nolink" <?php if (get_option('enjoyinstagram_grid_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
<input type="radio" name="enjoyinstagram_grid_link" value="altro" <?php if (get_option('enjoyinstagram_grid_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
<input type="text"  name="enjoyinstagram_grid_link_altro" value="<?php echo get_option('enjoyinstagram_grid_link_altro_default'); ?>" id="enjoyinstagram_grid_link_altro" <?php if (get_option('enjoyinstagram_grid_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">

            </div>
            </div>
     	</div>


                                            <div class="acco-block" >
                                                <div class="enin-medium-header">GRID OPTIONS:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Number of images that <br />are replaced at the same time:
                <select name="enjoyinstagram_grid_step" id="enjoyinstagram_grid_step" class="ei_sel">
<option value="random" <?php if (get_option('enjoyinstagram_grid_step_default')=='random'){ echo "selected='selected'"; }?>>random</option>
<?php for ($i = 1; $i <= 10; $i++) { ?>
<option value="<?php echo $i?>" <?php if (get_option('enjoyinstagram_grid_step_default')==$i) echo "selected='selected'";?>>
<?php echo "&nbsp;".$i;	 ?>
</option>
<?php } ?>
                                 </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Interval the images <br /> will be replaced:<br />
             <input type="number" min="300" value="<?php echo get_option('enjoyinstagram_grid_interval_default'); ?>" name="enjoyinstagram_grid_interval" class="ei_sel" id="enjoyinstagram_grid_interval"> ms
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Images will switch <br /> when mouse on hover:<br />
            <select name="enjoyinstagram_grid_onhover" class="ei_sel" id="enjoyinstagram_grid_onhover">
                                    <option value="true" <?php if (get_option('enjoyinstagram_grid_onhover_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_grid_onhover_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>


 <div class="acco-block zebra" >
     <div class="enin-medium-header">ANIMATION:</div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Animation Speed:  <br />
             <input type="number" value="<?php echo get_option('enjoyinstagram_grid_animation_speed_default'); ?>" name="enjoyinstagram_grid_animation_speed" class="ei_sel" id="enjoyinstagram_grid_animation_speed"> ms
            </div>
            </div>

     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

              Animation Type:<br />
     <select name="enjoyinstagram_grid_animation" id="enjoyinstagram_grid_animation" class="ei_sel">
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





        <div class="acco-block" >
            <div class="enin-medium-header">LIGHTBOX OPTIONS:</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

                Hide Bars Delay:<br /> <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_grid_hidebarsdelay" class="ei_sel" id="enjoyinstagram_grid_hidebarsdelay"> ms <br />( 0 to always show <br />caption and action bar )
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">


            Hide Bars On Mobile:

            <br />
            <select name="enjoyinstagram_grid_hidebarsmobile" class="ei_sel" id="enjoyinstagram_grid_hidebarsmobile">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Show Likes Count: <br /><select name="enjoyinstagram_grid_likes_count" class="ei_sel" id="enjoyinstagram_grid_likes_count">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select> <br />

            </div>
            </div>

            <div class="acco-1-4">
            <div class="ei_settings_float_block">
Show Author: <br />
<select name="enjoyinstagram_grid_image_author" class="ei_sel" id="enjoyinstagram_grid_image_author">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>

     	</div>



        <div class="acco-block zebra" >
             <div class="enin-medium-header">AUTORELOAD:</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

            AutoReload:  <br />
            <select name="enjoyinstagram_grid_autoreload" class="ei_sel" id="enjoyinstagram_grid_autoreload">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
                TIME TO RELOAD <br />
            <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_autoreload_value_default'); ?>" name="enjoyinstagram_grid_autoreload_value" class="ei_sel" id="enjoyinstagram_grid_autoreload_value"> ( ms )
            </div>
            </div>
          </div>
            <div class="acco-block">
            <div class="enin-medium-header">STYLE</div>
              <div class="acco-1-4">
                <div class="ei_settings_float_block">
                  Margin of each Image:
                  <br />
                  <input type="number" name="enjoyinstagram_grid_margin" class="ei_sel" id="enjoyinstagram_grid_margin" value="<?php echo get_option('enjoyinstagram_grid_margin_default'); ?>"> px
                </div>
            </div>
          </div>

                         </article>
				</div>


			</section>
                                    <table class="form-table">
                                            <body>
                                                 <tr>
                    <td>
<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoyinstagram'); ?>" onClick="insertenjoyinstagramshortcode_grid();" />

                    </td>
                    <td>
 <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoyinstagram'); ?>" onClick="tinyMCEPopup.close();" />

                    </td>
                    </tr>
                                            </body>
                                        </table>
			            </div>
                                </div>
                                    </div>
				    </div>
			    <div class="content-3">
				<div class="display_content_tabs">
                                    <div id="enin-tab-content3" class="enin-tab-content">
                                        <div class="label_moderate acco-block">
                                        <div class="acco-1-4" style="width: 100px;">
                        <div class="ei_settings_float_block">
                            <img src="<?php echo plugins_url('images/moderation.png',__FILE__); ?>" width="80">
                                </div></div>
                                        <div class="acco-1-4">
                                            <div class="ei_settings_float_block" style="font-size: 18px !important;">
                                        Moderate:<br /> <select name="enjoyinstagram_polaroid_moderate" id="enjoyinstagram_polaroid_moderate" class="ei_sel" style="font-size: 14px !important;
margin: 5px 0px;">
<option value="true"> Yes </option>
<option value="false" selected> No </option>
</select>  </div></div>
                                    </div>


			            <div class="animated  bounceInDown">
			              <section class="ac-container">
				<div>
					<input id="ac-1-3" name="accordion-1-3" type="radio" checked />
					<label for="ac-1-3">Inclusion Mode</label>
					<article class="ac-small">
 <div class="acco-block" >
     <div class="enin-medium-header">Show pics: </div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                <input type="radio" name="enjoyinstagram_user_or_hashtag_polaroid" id="enjoyinstagram_user_or_hashtag_polaroid_1" value="user" checked><label for="enjoyinstagram_user_or_hashtag_polaroid_1">of Your Profile</label><br/>
                <input type="radio" name="enjoyinstagram_user_or_hashtag_polaroid" id="enjoyinstagram_user_or_hashtag_polaroid_15" value="public_account"><label for="enjoyinstagram_user_or_hashtag_polaroid_15">of a public account</label><br/>
                    <input type="radio" name="enjoyinstagram_user_or_hashtag_polaroid"  id="enjoyinstagram_user_or_hashtag_polaroid_2" value="hashtag"><label for="enjoyinstagram_user_or_hashtag_polaroid_2">by Hashtag</label><br />
                        <input type="radio" name="enjoyinstagram_user_or_hashtag_polaroid" id="enjoyinstagram_user_or_hashtag_polaroid_3" value="likes"><label for="enjoyinstagram_user_or_hashtag_polaroid_3">Favourites</label><br/>

            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
              <div id="enjoyinstagram_user_or_hashtag_user_polaroid" class="desc" >
						 &nbsp;
                                                 <select id="enjoyinstagram_user_polaroid">
                                                     <?php


                                                     foreach($array_utenti as $singolo_utente) {
                                                         if($singolo_utente[username]!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>"><?php echo $singolo_utente['username']; ?></option>
                                                     <?php } } ?>
                                                 </select></br>
                                                 Restrict by the following hashtags (without # and separated by comma)
                                                 <input type="text" name="enjoyinstagram_user_hashtag_polaroid" value=""/>
						</div>
<div id="enjoyinstagram_user_or_hashtag_user_polaroid_moderate" class="desc" style="display: none;">
						 &nbsp;
<select id="enjoyinstagram_user_polaroid_moderate">
                                                     <?php


foreach($array_users_moderate as $singolo_utente_moderate) { ?>
    <option value ="<?php echo $singolo_utente_moderate; ?>"><?php echo $singolo_utente_moderate; ?> - Moderated</option>
<?php } ?>
                                                 </select>
                                                 <br />
You can add others moderated user going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>
</div>



<div id="enjoyinstagram_user_or_hashtag_hashtag_polaroid" class="desc" style="display:none;">
<input type="text" id="enjoyinstagram_hashtag_popup_polaroid" required name="enjoyinstagram_hashtag_popup_polaroid" />
<span class="description"><br />INSERT HASHTAGS (WITHOUT '#') SEPARATED BY COMMA</span>
</div>

<div id="enjoyinstagram_user_or_hashtag_polaroid_public_account" class="desc" style="display:none;">
<input type="text" id="enjoyinstagram_account_polaroid_popup" required name="enjoyinstagram_account_polaroid_popup" />
<br/><span class="description">INSERT THE PUBBLIC INSTAGRAM ACCOUNT (WITHOUT '@')</span>

<div id="enjoyinstagram_user_or_hashtag_hashtag_polaroid_moderate" class="desc" style="display: none; height: 100px; overflow: scroll !important;">
						 &nbsp;


<?php
foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
<input type="checkbox" name="enjoyinstagram_hashtag_popup_polaroid_moderate" value="<?php echo $singolo_hashtag_moderate; ?>"/><?php echo $singolo_hashtag_moderate; ?>  - moderated <br />
<?php } ?>

                                                 <br />
You can add others moderated hashtag going to <a target="_blank" href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_moderated_settings'); ?>">setting moderate page</a>


</div>
            </div>
            </div>

     	</div>
 </article>
				</div>
				<div>
					<input id="ac-2-3" name="accordion-1-3" type="radio" />
					<label for="ac-2-3">Polaroid Settings</label>
                                        <article class="ac-polaroid-2">
                                             <div class="acco-block" >
                                                 <div class="enin-medium-header">General Options: </div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                Show Info on Back <br />( Instagram Photo Description Content )

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <select name="enjoyinstagram_polaroid_back" id="enjoyinstagram_polaroid_back" class="ei_sel">
<option value="true" <?php if (get_option('enjoyinstagram_polaroid_back_default')=='true') echo "selected='selected'";?>>Yes</option>
<option value="false" <?php if (get_option('enjoyinstagram_polaroid_back_default')=='false') echo "selected='selected'";?>>No</option>

                                 </select>
            </div>
            </div>

     	</div>

                                            <div class="acco-block zebra" >
                                                <div class="enin-medium-header">WHEN YOU CLICK ON AN IMAGE </div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
                Link Image to:

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <input type="radio" name="enjoyinstagram_polaroid_link" value="swipebox" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
<input type="radio" name="enjoyinstagram_polaroid_link" value="instagram" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
<input type="radio" name="enjoyinstagram_polaroid_link" value="nolink" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
<input type="radio" name="enjoyinstagram_polaroid_link" value="altro" <?php if (get_option('enjoyinstagram_polaroid_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
<input type="text"  name="enjoyinstagram_polaroid_link_altro" value="<?php echo get_option('enjoyinstagram_polaroid_link_altro_default'); ?>" id="enjoyinstagram_polaroid_link_altro" <?php if (get_option('enjoyinstagram_polaroid_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >

            </div>
            </div>

     	</div>

                                             <div class="acco-block" >
                                                  <div class="enin-medium-header">LightBox Options: </div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Hide Bars Delay: <br /><input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_polaroid_hidebarsdelay" class="ei_sel" id="enjoyinstagram_polaroid_hidebarsdelay"> ms<br />( 0 to always show <br /> caption and action bar )
            <br />

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            Hide Bars On Mobile:<br /> <select name="enjoyinstagram_polaroid_hidebarsmobile" class="ei_sel" id="enjoyinstagram_polaroid_hidebarsmobile">
                                    <option value="true" <?php if (get_option('enjoyinstagram_polaroid_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_polaroid_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Show Likes Count: <br /><select name="enjoyinstagram_polaroid_likes_count" class="ei_sel" id="enjoyinstagram_polaroid_likes_count">
                                    <option value="true" <?php if (get_option('enjoyinstagram_polaroid_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_polaroid_likes_count_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
                                                  <div class="acco-1-4">
            <div class="ei_settings_float_block">

                                Show Author: <br /><select name="enjoyinstagram_polaroid_image_author" class="ei_sel" id="enjoyinstagram_polaroid_image_author">
                                    <option value="true" <?php if (get_option('enjoyinstagram_polaroid_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_polaroid_image_author_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>


                                             <div class="acco-block zebra" >
                                                 <div class="enin-medium-header">LightBox Options: </div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

             AutoReload:  <br />
<select name="enjoyinstagram_polaroid_autoreload" class="ei_sel" id="enjoyinstagram_polaroid_autoreload">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_autoreload_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
                time to reload<br />
            <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_autoreload_value_default'); ?>" name="enjoyinstagram_polaroid_autoreload_value" class="ei_sel" id="enjoyinstagram_polaroid_autoreload_value"> ( ms )
            </div>
            </div>

     	</div>


                                            <div class="acco-block" >
                                                 <div class="enin-medium-header">STYLE</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

                Background:<br />
                #<input type="text" name="enjoyinstagram_polaroid_background" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_background_default'); ?>" id="enjoyinstagram_polaroid_background" style="width:60px;">
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
                Border Width:<br />
            <input type="number" name="enjoyinstagram_polaroid_border_width" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_border_width_default'); ?>" id="enjoyinstagram_polaroid_border_width" style="width:60px;"> px
    <br />


            </div>
            </div>

                                                 <div class="acco-1-4">
                                                     <div class="ei_settings_float_block">
                                                    Border Color:<br />
                                                    #<input type="text" name="enjoyinstagram_polaroid_border_color" class="ei_sel" value="<?php echo get_option('enjoyinstagram_polaroid_border_color_default'); ?>" id="enjoyinstagram_polaroid_border_color" style="width:60px;">
                                                     </div>
                                                     </div>


     	</div>

                         </article>
				</div>



			</section>
                                    <table class="form-table">
                                            <body>
                                                 <tr>
                    <td>
<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoyinstagram'); ?>" onClick="insertenjoyinstagramshortcode_polaroid();" />

                    </td>
                    <td>
 <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoyinstagram'); ?>" onClick="tinyMCEPopup.close();" />

                    </td>
                    </tr>
                                            </body>
                                        </table>
			            </div>
			          </div>
                                </div>
				    </div>
                            <div class="content-4">
                                       <div class="display_content_tabs">
                                        <div id="enin-tab-content4" class="enin-tab-content">

			            <div class="animated  bounceInDown">
			              <section class="ac-container">
				<div>
					<input id="ac-1-4" name="accordion-1-4" type="radio" checked />
					<label for="ac-1-4">Inclusion Mode</label>
                                        <article class="ac-album-1">
                                         <div class="acco-block" >
                                             <div class="enin-medium-header">SELECT USERS / HASHTAGS</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Not Moderate


            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">

          Users
      <br />
      <?php
 foreach($array_utenti as $singolo_utente) {
if($singolo_utente[username]!=''){ ?>
<input type="checkbox" name="enjoyinstagram_user_album" value="<?php echo $singolo_utente['username']; ?>"/><?php echo $singolo_utente['username']; ?><br />
<?php } } ?>
Restrict by the following hashtags (without # and separated by comma)
<input type="text" name="enjoyinstagram_user_hashtag_album" value=""/></br>


            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                Hashtag<br />
             <input type="text" id="enjoyinstagram_hashtag_album" name="enjoyinstagram_hashtag_album" style="width:100%;"/><br />
             <span class="description" style="font-size:12px;width: 150px !important;"><br />insert hashtags (without '#') separated by comma</span>

            </div>
            <div class="ei_settings_float_block">
                Public account<br />
             <input type="text" id="enjoyinstagram_public_account_album" name="enjoyinstagram_public_account_album" style="width:100%;"/><br />
             <span class="description" style="font-size:12px;width: 150px !important;"><br />Insert the public Instagram account (without '@')</span>

            </div>
            </div>
     	</div>
                                          <div class="acco-block zebra" >

     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Moderate


            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">

          Users - Moderated
      <br />
       <?php
       if(is_array($array_users_moderate) && count($array_users_moderate)>0){
foreach($array_users_moderate as $singolo_utente_moderate) { ?>
<input type="checkbox" name="enjoyinstagram_user_album_moderate" value="<?php echo $singolo_utente_moderate; ?>"/><?php echo $singolo_utente_moderate; ?>  - moderated <br />

<?php } }?>


            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
               Hashtag (Moderated)<br />
              <?php
foreach($array_hashtag_moderate as $singolo_hashtag_moderate) { ?>
<input type="checkbox" name="enjoyinstagram_hashtag_album_moderate" value="<?php echo $singolo_hashtag_moderate; ?>"/><?php echo $singolo_hashtag_moderate; ?>  - moderated <br />
<?php } ?>

            </div>
            </div>
     	</div>



                                        </article>
				</div>
				<div>
					<input id="ac-2-4" name="accordion-1-4" type="radio" />
					<label for="ac-2-4">Album Settings</label>
					<article class="ac-album-2">

                                             <div class="acco-block" >
                                                 <div class="enin-medium-header">GENERAL OPTIONS</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
                On Hover show <br />Likes Count or <br />Caption exceprt <br />
                <select name="enjoyinstagram_album_hover" id="enjoyinstagram_album_hover" class="ei_sel">
<option value="likes" <?php if (get_option('enjoyinstagram_album_hover_default')=='likes') echo "selected='selected'";?>>Likes Count</option>
<option value="exce" <?php if (get_option('enjoyinstagram_album_hover_default')=='exce') echo "selected='selected'";?>>Caption Exceprt</option>

                                 </select>
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Random Angle: <br />
            <select name="enjoyinstagram_album_random_angle" class="ei_sel" id="enjoyinstagram_album_random_angle">
<option value="true" <?php if (get_option('enjoyinstagram_album_random_angle_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
<option value="false" <?php if (get_option('enjoyinstagram_album_random_angle_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Image Delay:<br />
            <input type="number" name="enjoyinstagram_album_delay" class="ei_sel" id="enjoyinstagram_album_delay" value="<?php echo get_option('enjoyinstagram_album_delay_default'); ?>"> ( ms )
            </div>
            </div>


     	</div>

                                             <div class="acco-block zebra" >
                                                  <div class="enin-medium-header">WHEN YOU CLICK ON AN IMAGE</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Link Image to:

            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
            <input type="radio" name="enjoyinstagram_album_link" value="swipebox" <?php if (get_option('enjoyinstagram_album_link_default')=='swipebox')
                                        echo "checked";?>>LightBox Effect<br />
<input type="radio" name="enjoyinstagram_album_link" value="instagram" <?php if (get_option('enjoyinstagram_album_link_default')=='instagram')
                                        echo "checked";?>>Instagram<br />
<input type="radio" name="enjoyinstagram_album_link" value="nolink" <?php if (get_option('enjoyinstagram_album_link_default')=='nolink')
                                        echo "checked";?>>No Link<br />
<input type="radio" name="enjoyinstagram_album_link" value="altro" <?php if (get_option('enjoyinstagram_album_link_default')=='altro')
                                        echo "checked";?>>Altro<br />
<input type="text"  name="enjoyinstagram_album_link_altro" value="<?php echo get_option('enjoyinstagram_album_link_altro_default'); ?>" id="enjoyinstagram_album_link_altro" <?php if (get_option('enjoyinstagram_album_link_default')!='altro')
                                        echo "style=\"display: none;\"";?> >
            </div>
            </div>

     	</div>


                                             <div class="acco-block " >
                                                 <div class="enin-medium-header">LIGHTBOX OPTIONS</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

              Hide Bars Delay:       <br />
              <input type="number" value="<?php echo get_option('enjoyinstagram_carousel_hidebarsdelay_default'); ?>" name="enjoyinstagram_album_hidebarsdelay" class="ei_sel" id="enjoyinstagram_album_hidebarsdelay"> ( ms ) <br />
                  0 to always show <br />caption and action bar
            </div>
            </div>
            <div class="acco-1-4">
            <div class="ei_settings_float_block">
              Hide Bars On Mobile: <br />
              <select name="enjoyinstagram_album_hidebarsmobile" class="ei_sel" id="enjoyinstagram_album_hidebarsmobile">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_hidebarsmobile_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select> <br />
            </div>
            </div>
            	<div class="acco-1-4">
            <div class="ei_settings_float_block">
            Show Likes Count: <br />
            <select name="enjoyinstagram_album_likes_count" class="ei_sel" id="enjoyinstagram_album_likes_count">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_likes_count_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>

            </div>
            </div>
                                                 <div class="acco-1-4">
            <div class="ei_settings_float_block">
                                Show Author: <br />
                                <select name="enjoyinstagram_album_image_author" class="ei_sel" id="enjoyinstagram_album_image_author">
                                    <option value="true" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='true') echo "selected='selected'";?>>Yes
                                    </option>
                                    <option value="false" <?php if (get_option('enjoyinstagram_carousel_image_author_default')=='false') echo "selected='selected'";?>>No
                                    </option>
                                </select>
            </div>
            </div>
     	</div>



                                             <div class="acco-block" >
                                                 <div class="enin-medium-header">ANIMATION</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
               Speed Animation in:
                <br />
<input type="number" name="enjoyinstagram_album_animation_in" class="ei_sel" id="enjoyinstagram_album_animation_in" value="<?php echo get_option('enjoyinstagram_album_animation_in_default'); ?>"> ( ms )
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Speed Animation Out:<br />
            <input type="number" name="enjoyinstagram_album_animation_out" class="ei_sel" id="enjoyinstagram_album_animation_out" value="<?php echo get_option('enjoyinstagram_album_animation_out_default'); ?>"> ( ms )
            </div>
            </div>

     	</div>

                                             <div class="acco-block zebra" >
                                                  <div class="enin-medium-header">STYLE</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

               Margin of each Image:
<br />
<input type="number" name="enjoyinstagram_album_margin" class="ei_sel" id="enjoyinstagram_album_margin" value="<?php echo get_option('enjoyinstagram_album_margin_default'); ?>"> px
            </div>
            </div>
     	</div>





                         </article>
				</div>



			</section>
                                    <table class="form-table">
                                            <body>
                                                 <tr>
                    <td>
<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoyinstagram'); ?>" onClick="insertenjoyinstagramshortcode_album();" />

                    </td>
                    <td>
 <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoyinstagram'); ?>" onClick="tinyMCEPopup.close();" />

                    </td>
                    </tr>
                                            </body>
                                        </table>
			            </div>
			          </div>
                                       </div>
				</div>
                            <div class="content-5">
                                <div class="display_content_tabs">
				<div id="enin-tab-content5" class="enin-tab-content">

			            <div class="animated  bounceInDown">
			              <section class="ac-container">
				<div>
					<input id="ac-1-5" name="accordion-1-5" type="radio" checked />
					<label for="ac-1-5">Select User:</label>
                                        <article class="ac-badge">

                                             <div class="acco-block" >
                                                 <div class="enin-medium-header">USER</div>
     		<div class="acco-1-4">
            <div class="ei_settings_float_block">

                   <select id="enjoyinstagram_user_badge">
                       <?php
                    foreach($array_utenti as $singolo_utente) {
if($singolo_utente['username']!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>"><?php echo $singolo_utente['username']; ?></option>
<?php } } ?>
</select>
            </div>
            </div>
            <div>
            <div class="ei_settings_float_block">

                To add other user go to <a href="<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_general_settings'); ?>">Users settings page</a>


            </div>
            </div>

     	</div>

                                            <div class="acco-block zebra" >
                                                <div class="enin-medium-header">WHAT DO YOU WANNA SHOW IN YOUR BADGE</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">

                <span class="acco-title">Show:</span><br />
                <input type="checkbox" id="show_badge_profile_picture" checked="checked"/>Profile Picture<br />
                  <input type="checkbox" id="show_badge_username" checked="checked"/>Username<br />
                  <input type="checkbox" id="show_badge_bio" checked="checked"/>Bio<br />
                  <input type="checkbox" id="show_badge_website" checked="checked"/>Website<br />
            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <input type="checkbox" id="show_badge_full_name" checked="checked"/>Full Name<br />
                  <input type="checkbox" id="show_badge_media" checked="checked"/>Media<br />
                  <input type="checkbox" id="show_badge_followed_by" checked="checked"/>Followed By<br />
                  <input type="checkbox" id="show_badge_follows" checked="checked"/>Follows<br />
                  <input type="checkbox" id="show_badge_images" checked="checked"/>P<br />
            </div>
            </div>
                                                </div>

                                            <div class="acco-block" >
                                                <div class="enin-medium-header">GENERAL OPTIONS</div>
     		<div class="acco-1-3">
            <div class="ei_settings_float_block">
              Style View Images:<br />
                 <select id="show_badge_view_images">

                      <option value="grid">Grid</option>
                      <option value="carousel">Carousel</option>
                  </select>

            </div>
            </div>
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Number of Images:<br />
                  <select id="show_badge_number_images">

                      <option value="4" >4</option>
                      <option value="6" >6</option>
                      <option value="8" >8</option>
                      <option value="10" >10</option>

                  </select>
            </div>
            </div>
                                                </div>




 </article>
				</div>

			</section>
                                    <table class="form-table">

                                                 <tr>
                    <td>
<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoyinstagram'); ?>" onClick="insertenjoyinstagramshortcode_badge();" />

                    </td>
                    <td>
 <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoyinstagram'); ?>" onClick="tinyMCEPopup.close();" />

                    </td>
                    </tr>

                                        </table>
			            </div>
			          </div>
                                </div>
				    </div>
		        </div>





                                </section>
	      	</div>



        </form>

    </body>
</html>
