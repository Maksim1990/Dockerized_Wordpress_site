jQuery(document).on("click",".input_hashtag_moderate", function() {
	jQuery('#dynamic_pos').append('<div class="pos_dynamic_div"><input type="text" class="class_hashtag_moderate" name="hashtag_moderate[]" value="" size="25" /><a href="#" class="elimina_dynamic_pos button"> - </a></div>');
	return false;	
});


jQuery(document).on("click",".elimina_dynamic_pos", function() {
	jQuery(this).parent().remove();
	return false;	
	});
            
            

   jQuery(document).on("click","input[name*='first_select_enjoyinstagram_user_or_hashtag_widget']",function() {
        var test = jQuery(this).val();
        var id = jQuery(this).parent().attr('id');
        id = id.replace('widget-slider_widget-','');
        id = id.replace('-div_enjoyinstagram_user_or_hashtag_widget','');
        
		if(test=='user'){
                console.log(' user select type');
		//jQuery('#enjoyinstagram_hashtag').attr('disabled',true);
                
                if(jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_carousel_moderate_widget option:selected").val() == 'true'){
                 console.log(' user select type SI ALLA MODERAZIONE');   
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeOut();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeIn();
                } else 
                if(jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_carousel_moderate_widget option:selected").val() == 'false'){
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeIn();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeOut();
                }
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeOut();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeOut();
		}else if(test=='hashtag'){
		//jQuery('#enjoyinstagram_hashtag').attr('disabled',false);
                if(jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_carousel_moderate_widget option:selected").val() == 'true'){
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeIn();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeOut();
                }else 
                if(jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_carousel_moderate_widget option:selected").val() == 'false'){
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeOut();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeIn();    
                }
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeOut();
                jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeOut();
                    
		}
       
    });
   
   
   
   
    jQuery(document).on("change",".class_enjoyinstagram_carousel_moderate_widget",function() {
        var id = jQuery(this,'option:selected').attr('id');
        id = id.replace('widget-slider_widget-','');
        id = id.replace('-enjoyinstagram_carousel_moderate_widget','');
        
        if(jQuery(this,'option:selected').val() == 'true'){
        console.log('si alla moderazione')    ;
        
       
        if(jQuery("#widget-slider_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_widget']:checked").val() == 'user'){
            console.log('user');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeIn('slow'); 
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeOut('slow');
        }else
        if(jQuery("#widget-slider_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_widget']:checked").val() == 'hashtag'){
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeOut('slow'); 
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeIn('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeOut('slow');
        }    
    
        }else if(jQuery(this,'option:selected').val() == 'false'){
            console.log('no alla moderazione')    ;
        if(jQuery("#widget-slider_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_widget']:checked").val() == 'user'){
            console.log('no alla moderazione - USER');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeIn('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeOut('slow');
        }else 
        if(jQuery("#widget-slider_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_widget']:checked").val() == 'hashtag'){
            console.log('no alla moderazione - HASHTAG');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_widget").fadeOut('slow');  
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_moderate_widget").fadeOut('slow');
        jQuery("#widget-slider_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_carousel_widget").fadeIn('slow');
        }
        
        
        }
    });    
    
    
    
  jQuery(document).on("click","input[name*='first_select_enjoyinstagram_user_or_hashtag_grid_widget']",function() {
        var test = jQuery(this).val();
        var id = jQuery(this).parent().attr('id');
        id = id.replace('widget-grid_widget-','');
        id = id.replace('-div_enjoyinstagram_user_or_hashtag_widget','');
        
		if(test=='user'){
                console.log(' user select type');
		//jQuery('#enjoyinstagram_hashtag').attr('disabled',true);
                
                if(jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_grid_moderate_widget option:selected").val() == 'true'){
                 console.log(' user select type SI ALLA MODERAZIONE');   
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeOut();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeIn();
                } else 
                if(jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_grid_moderate_widget option:selected").val() == 'false'){
                
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeOut();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeIn();
                }
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeOut();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeOut();
		}else if(test=='hashtag'){
		//jQuery('#enjoyinstagram_hashtag').attr('disabled',false);
                if(jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_grid_moderate_widget option:selected").val() == 'true'){
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeIn();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeOut();
                }else 
                if(jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_grid_moderate_widget option:selected").val() == 'false'){
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeOut();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeIn();    
                }
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeOut();
                jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeOut();
                    
		}
       
    });
   
   
   
   
    jQuery(document).on("change",".class_enjoyinstagram_grid_moderate_widget",function() {
        var id = jQuery(this,'option:selected').attr('id');
        id = id.replace('widget-grid_widget-','');
        id = id.replace('-enjoyinstagram_grid_moderate_widget','');
        
        if(jQuery(this,'option:selected').val() == 'true'){
        console.log('si alla moderazione')    ;
        
       
        if(jQuery("#widget-grid_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_grid_widget']:checked").val() == 'user'){
            console.log('user');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeIn('slow'); 
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeOut('slow');
        }else
        if(jQuery("#widget-grid_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_grid_widget']:checked").val() == 'hashtag'){
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeOut('slow'); 
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeIn('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeOut('slow');
        }    
    
        }else if(jQuery(this,'option:selected').val() == 'false'){
            console.log('no alla moderazione')    ;
        if(jQuery("#widget-grid_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_grid_widget']:checked").val() == 'user'){
            console.log('no alla moderazione - USER');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeIn('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeOut('slow');
        }else 
        if(jQuery("#widget-grid_widget-"+id+"-div_enjoyinstagram_user_or_hashtag_widget input[name*='first_select_enjoyinstagram_user_or_hashtag_grid_widget']:checked").val() == 'hashtag'){
            console.log('no alla moderazione - HASHTAG');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_widget").fadeOut('slow');  
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_user_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_moderate_widget").fadeOut('slow');
        jQuery("#widget-grid_widget-"+id+"-enjoyinstagram_user_or_hashtag_hashtag_grid_widget").fadeIn('slow');
        }
        
        
        }
    }); 


    jQuery(document).on("click",".moderate_reload", function(){
        var id = jQuery(this).attr('id');
        id = id.replace('moderate_reload_','');
        jQuery('#article_reload_'+id).load(document.URL + " #article_reload_"+id,function() { 
            
        });
       return false;
    });