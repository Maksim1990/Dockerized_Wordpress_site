function init() {
    tinyMCEPopup.resizeToInnerSize();
}

function insertenjoyinstagramshortcode() {
    var tagtext;
    var shortcode = jQuery('input[name=enjoyinstagram_user_or_hashtag]:checked').val();
    var enjoyinstagram_carousel_items_number = jQuery('#enjoyinstagram_carousel_items_number option:selected').val();
    var enjoyinstagram_carousel_navigation = jQuery('#enjoyinstagram_carousel_navigation option:selected').val();
    var enjoyinstagram_carousel_link = jQuery('input[name=enjoyinstagram_carousel_link]:checked').val();
    var enjoyinstagram_carousel_link_altro = jQuery('#enjoyinstagram_carousel_link_altro').val();
    var enjoyinstagram_carousel_1024px = jQuery('#enjoyinstagram_carousel_1024px').val();
    var enjoyinstagram_carousel_768px = jQuery('#enjoyinstagram_carousel_768px').val();
    var enjoyinstagram_carousel_600px = jQuery('#enjoyinstagram_carousel_600px').val();
    var enjoyinstagram_carousel_480px = jQuery('#enjoyinstagram_carousel_480px').val();
    var enjoyinstagram_carousel_navigation_prev = jQuery('#enjoyinstagram_carousel_navigation_prev').val();
    var enjoyinstagram_carousel_navigation_next = jQuery('#enjoyinstagram_carousel_navigation_next').val();
    var enjoyinstagram_carousel_autoplay = jQuery('#enjoyinstagram_carousel_autoplay option:selected').val();
    var enjoyinstagram_carousel_autoplay_speed = jQuery('#enjoyinstagram_carousel_autoplay_speed').val();
    var enjoyinstagram_carousel_autoplay_timeout = jQuery('#enjoyinstagram_carousel_autoplay_timeout').val();
    var enjoyinstagram_carousel_stop_on_hover = jQuery('#enjoyinstagram_carousel_stop_on_hover option:selected').val();
    var enjoyinstagram_carousel_slidespeed = jQuery('#enjoyinstagram_carousel_slidespeed').val();
    var enjoyinstagram_carousel_margin = jQuery('#enjoyinstagram_carousel_margin').val();
    var enjoyinstagram_carousel_loop = jQuery('#enjoyinstagram_carousel_loop option:selected').val();
    var enjoyinstagram_carousel_dots = jQuery('#enjoyinstagram_carousel_dots option:selected').val();
    var enjoyinstagram_carousel_animatein = jQuery('#enjoyinstagram_carousel_animatein option:selected').val();
    var enjoyinstagram_carousel_animateout = jQuery('#enjoyinstagram_carousel_animateout option:selected').val();
    var enjoyinstagram_carousel_likes_count = jQuery('#enjoyinstagram_carousel_likes_count option:selected').val();
    var enjoyinstagram_carousel_image_author = jQuery('#enjoyinstagram_carousel_image_author option:selected').val();
    var enjoyinstagram_carousel_hidebarsmobile = jQuery('#enjoyinstagram_carousel_hidebarsmobile option:selected').val();
    var enjoyinstagram_carousel_hidebarsdelay = jQuery('#enjoyinstagram_carousel_hidebarsdelay').val();
    var enjoyinstagram_carousel_moderate = jQuery('#enjoyinstagram_carousel_moderate option:selected').val();
    var enjoyinstagram_carousel_autoreload = jQuery('#enjoyinstagram_carousel_autoreload option:selected').val();
    var enjoyinstagram_carousel_autoreload_value = jQuery('#enjoyinstagram_carousel_autoreload_value').val();
    var enjoyinstagram_user_carousel_moderate = jQuery('#enjoyinstagram_user_carousel_moderate option:selected').val();
    var enjoyinstagram_hashtag_popup_moderate = jQuery('input[name=enjoyinstagram_hashtag_popup_moderate]:checked').map(function(_, el) {return $(el).val();}).get();
    var show_resolution_carousel = jQuery('input[name=show_resolution_carousel]:checked').val();
    var user_hashtag_carousel = jQuery('input[name="enjoyinstagram_user_hashtag_carousel"]').val();


        //if(shortcode=='user'){
        var user = jQuery('#enjoyinstagram_user_carousel option:selected').val();
        //var hashtag = '';
        //}else if(shortcode=='hashtag'){
        var hashtag = jQuery('#enjoyinstagram_hashtag_popup').val();
        //var user = '';
        var public_account = jQuery('#enjoyinstagram_account_popup').val();
        //}


        tagtext = "[enjoyinstagram_carousel type=\""+shortcode+"\" user=\"" + user + "\" public_account=\"" + public_account + "\" hashtag=\"" + hashtag + "\" user_hashtag_carousel=\"" + user_hashtag_carousel + "\" enjoyinstagram_carousel_link=\""+ enjoyinstagram_carousel_link +"\" enjoyinstagram_carousel_link_altro=\"" + enjoyinstagram_carousel_link_altro + "\" enjoyinstagram_carousel_items_number=\""+ enjoyinstagram_carousel_items_number +"\" enjoyinstagram_carousel_navigation=\""+enjoyinstagram_carousel_navigation+"\" enjoyinstagram_carousel_1024px=\""+enjoyinstagram_carousel_1024px+"\" enjoyinstagram_carousel_768px=\""+enjoyinstagram_carousel_768px+"\" enjoyinstagram_carousel_600px=\""+enjoyinstagram_carousel_600px+"\" enjoyinstagram_carousel_480px=\""+enjoyinstagram_carousel_480px+"\" enjoyinstagram_carousel_navigation_prev=\""+enjoyinstagram_carousel_navigation_prev+"\" enjoyinstagram_carousel_navigation_next=\""+enjoyinstagram_carousel_navigation_next+"\" enjoyinstagram_carousel_autoplay=\""+enjoyinstagram_carousel_autoplay+"\" enjoyinstagram_carousel_autoplay_speed=\""+enjoyinstagram_carousel_autoplay_speed+"\" enjoyinstagram_carousel_autoplay_timeout=\""+enjoyinstagram_carousel_autoplay_timeout+"\" enjoyinstagram_carousel_stop_on_hover=\""+enjoyinstagram_carousel_stop_on_hover+"\" enjoyinstagram_carousel_slidespeed=\""+enjoyinstagram_carousel_slidespeed+"\" enjoyinstagram_carousel_margin=\""+enjoyinstagram_carousel_margin+"\" enjoyinstagram_carousel_loop=\""+enjoyinstagram_carousel_loop+"\" enjoyinstagram_carousel_dots=\""+enjoyinstagram_carousel_dots+"\" enjoyinstagram_carousel_animatein=\""+enjoyinstagram_carousel_animatein+"\" enjoyinstagram_carousel_animateout=\""+enjoyinstagram_carousel_animateout+"\" enjoyinstagram_carousel_likes_count=\""+enjoyinstagram_carousel_likes_count+"\" enjoyinstagram_carousel_image_author=\""+enjoyinstagram_carousel_image_author+"\" enjoyinstagram_carousel_hidebarsmobile=\""+enjoyinstagram_carousel_hidebarsmobile+"\" enjoyinstagram_carousel_hidebarsdelay=\""+enjoyinstagram_carousel_hidebarsdelay+"\" enjoyinstagram_carousel_moderate=\""+enjoyinstagram_carousel_moderate+"\" enjoyinstagram_carousel_autoreload=\""+enjoyinstagram_carousel_autoreload+"\" enjoyinstagram_carousel_autoreload_value=\""+enjoyinstagram_carousel_autoreload_value+"\" enjoyinstagram_user_carousel_moderate=\""+enjoyinstagram_user_carousel_moderate+"\" enjoyinstagram_hashtag_popup_moderate=\""+enjoyinstagram_hashtag_popup_moderate+"\" show_resolution_carousel=\""+show_resolution_carousel+"\"]";




   if(window.tinyMCE) {

    /* get the TinyMCE version to account for API diffs */
    var tmce_ver=window.tinyMCE.majorVersion;

    if (tmce_ver>="4") {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext);
    } else {
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
    }

    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();
    }
    return;
}

function insertenjoyinstagramshortcode_grid() {
        var tagtext_grid;
        var shortcode_grid = jQuery('input[name=enjoyinstagram_user_or_hashtag_grid]:checked').val();
        var user_grid = jQuery('#enjoyinstagram_user_grid option:selected').val();
        var hashtag_grid = jQuery('#enjoyinstagram_hashtag_popup_grid').val();
        var enjoyinstagram_grid_cols = jQuery('#enjoyinstagram_grid_cols option:selected').val();
        var enjoyinstagram_grid_rows = jQuery('#enjoyinstagram_grid_rows option:selected').val();
        var enjoyinstagram_grid_margin = jQuery('#enjoyinstagram_grid_margin').val();
        var enjoyinstagram_grid_link = jQuery('input[name=enjoyinstagram_grid_link]:checked').val();
        var enjoyinstagram_grid_link_altro = jQuery('#enjoyinstagram_grid_link_altro').val();
        var enjoyinstagram_grid_step = jQuery('#enjoyinstagram_grid_step option:selected').val();
        var enjoyinstagram_grid_animation = jQuery('#enjoyinstagram_grid_animation option:selected').val();
        var enjoyinstagram_grid_animation_speed = jQuery('#enjoyinstagram_grid_animation_speed').val();
        var enjoyinstagram_grid_interval = jQuery('#enjoyinstagram_grid_interval').val();
        var enjoyinstagram_grid_onhover = jQuery('#enjoyinstagram_grid_onhover option:selected').val();
        var enjoyinstagram_grid_cols_480px = jQuery('#enjoyinstagram_grid_cols_480px option:selected').val();
        var enjoyinstagram_grid_rows_480px = jQuery('#enjoyinstagram_grid_rows_480px option:selected').val();
        var enjoyinstagram_grid_rows_600px = jQuery('#enjoyinstagram_grid_rows_600px option:selected').val();
        var enjoyinstagram_grid_cols_600px = jQuery('#enjoyinstagram_grid_cols_600px option:selected').val();
        var enjoyinstagram_grid_rows_768px = jQuery('#enjoyinstagram_grid_rows_768px option:selected').val();
        var enjoyinstagram_grid_cols_768px = jQuery('#enjoyinstagram_grid_cols_768px option:selected').val();
        var enjoyinstagram_grid_rows_1024px = jQuery('#enjoyinstagram_grid_rows_1024px option:selected').val();
        var enjoyinstagram_grid_cols_1024px = jQuery('#enjoyinstagram_grid_cols_1024px option:selected').val();
        var enjoyinstagram_grid_likes_count = jQuery('#enjoyinstagram_grid_likes_count option:selected').val();
        var enjoyinstagram_grid_image_author = jQuery('#enjoyinstagram_grid_image_author option:selected').val();
        var enjoyinstagram_grid_hidebarsmobile = jQuery('#enjoyinstagram_grid_hidebarsmobile option:selected').val();
        var enjoyinstagram_grid_hidebarsdelay = jQuery('#enjoyinstagram_grid_hidebarsdelay').val();
        var enjoyinstagram_grid_autoreload = jQuery('#enjoyinstagram_grid_autoreload option:selected').val();
        var enjoyinstagram_grid_autoreload_value = jQuery('#enjoyinstagram_grid_autoreload_value').val();
        var enjoyinstagram_grid_moderate = jQuery('#enjoyinstagram_grid_moderate option:selected').val();
        var enjoyinstagram_user_grid_moderate = jQuery('#enjoyinstagram_user_grid_moderate option:selected').val();
        var enjoyinstagram_hashtag_popup_grid_moderate = jQuery('input[name=enjoyinstagram_hashtag_popup_grid_moderate]:checked').map(function(_, el) {return $(el).val();}).get();
        var show_resolution_grid = jQuery('input[name=show_resolution_grid]:checked').val();
        var user_hashtag_grid = jQuery('input[name="enjoyinstagram_user_hashtag_grid"]').val();
        var public_account = jQuery('#enjoyinstagram_account_grid_popup').val();


        tagtext_grid = "[enjoyinstagram_grid type_grid=\""+shortcode_grid+"\" user_grid=\""+user_grid+ "\" public_account=\""+public_account+ "\" hashtag_grid=\""+hashtag_grid+"\" user_hashtag_grid=\"" + user_hashtag_grid + "\" enjoyinstagram_grid_cols=\""+enjoyinstagram_grid_cols+"\" enjoyinstagram_grid_rows=\""+enjoyinstagram_grid_rows+"\" enjoyinstagram_grid_step=\""+enjoyinstagram_grid_step+"\" enjoyinstagram_grid_margin=\""+enjoyinstagram_grid_margin+"\" enjoyinstagram_grid_animation=\""+enjoyinstagram_grid_animation+"\" enjoyinstagram_grid_animation_speed=\""+enjoyinstagram_grid_animation_speed+"\" enjoyinstagram_grid_interval=\""+enjoyinstagram_grid_interval+"\" enjoyinstagram_grid_onhover=\""+enjoyinstagram_grid_onhover+"\" enjoyinstagram_grid_cols_480px=\""+enjoyinstagram_grid_cols_480px+"\" enjoyinstagram_grid_rows_480px=\""+enjoyinstagram_grid_rows_480px+"\" enjoyinstagram_grid_cols_600px=\""+enjoyinstagram_grid_cols_600px+"\" enjoyinstagram_grid_rows_600px=\""+enjoyinstagram_grid_rows_600px+"\" enjoyinstagram_grid_cols_768px=\""+enjoyinstagram_grid_cols_768px+"\" enjoyinstagram_grid_rows_768px=\""+enjoyinstagram_grid_rows_768px+"\" enjoyinstagram_grid_cols_1024px=\""+enjoyinstagram_grid_cols_1024px+"\" enjoyinstagram_grid_rows_1024px=\""+enjoyinstagram_grid_rows_1024px+"\" enjoyinstagram_grid_link=\""+enjoyinstagram_grid_link+"\" enjoyinstagram_grid_link_altro=\""+enjoyinstagram_grid_link_altro+"\" enjoyinstagram_grid_likes_count=\""+enjoyinstagram_grid_likes_count+"\" enjoyinstagram_grid_image_author=\""+enjoyinstagram_grid_image_author+"\" enjoyinstagram_grid_hidebarsmobile=\""+enjoyinstagram_grid_hidebarsmobile+"\" enjoyinstagram_grid_hidebarsdelay=\""+enjoyinstagram_grid_hidebarsdelay+"\" enjoyinstagram_grid_autoreload=\""+enjoyinstagram_grid_autoreload+"\" enjoyinstagram_grid_autoreload_value=\""+enjoyinstagram_grid_autoreload_value+"\" enjoyinstagram_grid_moderate=\""+enjoyinstagram_grid_moderate+"\" enjoyinstagram_user_grid_moderate=\""+enjoyinstagram_user_grid_moderate+"\" enjoyinstagram_hashtag_popup_grid_moderate=\""+enjoyinstagram_hashtag_popup_grid_moderate+"\" show_resolution_grid=\""+show_resolution_grid+"\"]";

   if(window.tinyMCE) {

    /* get the TinyMCE version to account for API diffs */
    var tmce_ver=window.tinyMCE.majorVersion;

    if (tmce_ver>="4") {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext_grid);
    } else {
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext_grid);
    }

    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();
    }
    return;
}


function insertenjoyinstagramshortcode_polaroid() {
        var tagtext_polaroid;
        var shortcode_polaroid = jQuery('input[name=enjoyinstagram_user_or_hashtag_polaroid]:checked').val();
        var user_polaroid = jQuery('#enjoyinstagram_user_polaroid option:selected').val();
        var hashtag_polaroid = jQuery('#enjoyinstagram_hashtag_popup_polaroid').val();
        var user_hashtag_polaroid = jQuery('input[name="enjoyinstagram_user_hashtag_polaroid"]').val();


        var enjoyinstagram_polaroid_back = jQuery('#enjoyinstagram_polaroid_back option:selected').val();
        var enjoyinstagram_polaroid_link = jQuery('input[name=enjoyinstagram_polaroid_link]:checked').val();
        var enjoyinstagram_polaroid_link_altro = jQuery('#enjoyinstagram_polaroid_link_altro').val();
        var enjoyinstagram_polaroid_likes_count = jQuery('#enjoyinstagram_polaroid_likes_count option:selected').val();
        var enjoyinstagram_polaroid_image_author = jQuery('#enjoyinstagram_polaroid_image_author option:selected').val();
        var enjoyinstagram_polaroid_hidebarsmobile = jQuery('#enjoyinstagram_polaroid_hidebarsmobile option:selected').val();
        var enjoyinstagram_polaroid_hidebarsdelay = jQuery('#enjoyinstagram_polaroid_hidebarsdelay').val();
        var enjoyinstagram_polaroid_autoreload = jQuery('#enjoyinstagram_polaroid_autoreload option:selected').val();
        var enjoyinstagram_polaroid_autoreload_value = jQuery('#enjoyinstagram_polaroid_autoreload_value').val();
        var enjoyinstagram_polaroid_moderate = jQuery('#enjoyinstagram_polaroid_moderate option:selected').val();
        var enjoyinstagram_user_polaroid_moderate = jQuery('#enjoyinstagram_user_polaroid_moderate option:selected').val();
        var enjoyinstagram_hashtag_popup_polaroid_moderate = jQuery('input[name=enjoyinstagram_hashtag_popup_polaroid_moderate]:checked').map(function(_, el) {return $(el).val();}).get();
        var enjoyinstagram_polaroid_border_width = jQuery('#enjoyinstagram_polaroid_border_width').val();
        var enjoyinstagram_polaroid_border_color = jQuery('#enjoyinstagram_polaroid_border_color').val();
        var enjoyinstagram_polaroid_background = jQuery('#enjoyinstagram_polaroid_background').val();
        var public_account = jQuery('#enjoyinstagram_account_polaroid_popup').val();

        tagtext_polaroid = "[enjoyinstagram_polaroid type_polaroid=\""+shortcode_polaroid+"\" public_account=\""+public_account+ "\" user_polaroid=\""+user_polaroid+"\" hashtag_polaroid=\""+hashtag_polaroid+"\" user_hashtag_polaroid=\"" + user_hashtag_polaroid + "\" enjoyinstagram_polaroid_back=\""+enjoyinstagram_polaroid_back+"\" enjoyinstagram_polaroid_link=\""+enjoyinstagram_polaroid_link+"\" enjoyinstagram_polaroid_link_altro=\""+enjoyinstagram_polaroid_link_altro+"\" enjoyinstagram_polaroid_likes_count=\""+enjoyinstagram_polaroid_likes_count+"\" enjoyinstagram_polaroid_image_author=\""+enjoyinstagram_polaroid_image_author+"\" enjoyinstagram_polaroid_hidebarsmobile=\""+enjoyinstagram_polaroid_hidebarsmobile+"\" enjoyinstagram_polaroid_hidebarsdelay=\""+enjoyinstagram_polaroid_hidebarsdelay+"\" enjoyinstagram_polaroid_autoreload=\""+enjoyinstagram_polaroid_autoreload+"\" enjoyinstagram_polaroid_autoreload_value=\""+enjoyinstagram_polaroid_autoreload_value+"\" enjoyinstagram_polaroid_moderate=\""+enjoyinstagram_polaroid_moderate+"\" enjoyinstagram_user_polaroid_moderate=\""+enjoyinstagram_user_polaroid_moderate+"\" enjoyinstagram_hashtag_popup_polaroid_moderate=\""+enjoyinstagram_hashtag_popup_polaroid_moderate+"\" enjoyinstagram_polaroid_border_width=\""+enjoyinstagram_polaroid_border_width+"\" enjoyinstagram_polaroid_border_color=\""+enjoyinstagram_polaroid_border_color+"\" enjoyinstagram_polaroid_background=\""+enjoyinstagram_polaroid_background+"\"]";




   if(window.tinyMCE) {

    /* get the TinyMCE version to account for API diffs */
    var tmce_ver=window.tinyMCE.majorVersion;

    if (tmce_ver>="4") {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext_polaroid);
    } else {
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext_polaroid);
    }

    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();
    }
    return;
}



function insertenjoyinstagramshortcode_album() {
        var tagtext_album;
        user_album_array = new Array();
        user_moderate_album_array = new Array();
        hashtag_moderate_album_array = new Array();

        var user_album = jQuery('input[name="enjoyinstagram_user_album"]:checked').each(function() {
        user_album_array.push(jQuery(this).val());
        });

        var user_hashtag_album = jQuery('input[name="enjoyinstagram_user_hashtag_album"]').val();



        var user_moderate_album = jQuery('input[name="enjoyinstagram_user_album_moderate"]:checked').each(function() {
        user_moderate_album_array.push(jQuery(this).val());
        });

        var hashtag_album = jQuery('#enjoyinstagram_hashtag_album').val();

        var public_account = jQuery('#enjoyinstagram_public_account_album').val();

        var hashtag_album_moderate = jQuery('input[name="enjoyinstagram_hashtag_album_moderate"]:checked').each(function() {
        hashtag_moderate_album_array.push(jQuery(this).val());
        });



         if(user_album_array=='' && user_moderate_album_array==''){
             user_album_array = 0;
         }

         var enjoyinstagram_album_hover = jQuery('#enjoyinstagram_album_hover option:selected').val();
         var enjoyinstagram_album_link = jQuery('input[name=enjoyinstagram_album_link]:checked').val();
         var enjoyinstagram_album_link_altro = jQuery('#enjoyinstagram_album_link_altro').val();
         var enjoyinstagram_album_hidebarsdelay = jQuery('#enjoyinstagram_album_hidebarsdelay').val();
         var enjoyinstagram_album_hidebarsmobile = jQuery('#enjoyinstagram_album_hidebarsmobile option:selected').val();
         var enjoyinstagram_album_likes_count = jQuery('#enjoyinstagram_album_likes_count option:selected').val();
         var enjoyinstagram_album_image_author = jQuery('#enjoyinstagram_album_image_author option:selected').val();
         var enjoyinstagram_album_random_angle = jQuery('#enjoyinstagram_album_random_angle option:selected').val();
         var enjoyinstagram_album_delay = jQuery('#enjoyinstagram_album_delay').val();
         var enjoyinstagram_album_margin = jQuery('#enjoyinstagram_album_margin').val();
         var enjoyinstagram_album_animation_in = jQuery('#enjoyinstagram_album_animation_in').val();
         var enjoyinstagram_album_animation_out = jQuery('#enjoyinstagram_album_animation_out').val();
         var enjoyinstagram_user_hashtag_album = jQuery('#enjoyinstagram_user_hashtag_album').val();

        tagtext_album = "[enjoyinstagram_album user_album=\""+user_album_array+"\" public_account=\""+ public_account +"\"  user_hashtag_album=\""+ user_hashtag_album +"\" user_moderate_album = \""+user_moderate_album_array+"\" hashtag_album = \""+hashtag_album+"\" hashtag_moderate_album = \""+hashtag_moderate_album_array+"\" enjoyinstagram_album_hover=\""+enjoyinstagram_album_hover+"\" enjoyinstagram_album_link=\""+enjoyinstagram_album_link+"\" enjoyinstagram_album_link_altro=\""+enjoyinstagram_album_link_altro+"\" enjoyinstagram_album_hidebarsdelay=\""+enjoyinstagram_album_hidebarsdelay+"\" enjoyinstagram_album_hidebarsmobile=\""+enjoyinstagram_album_hidebarsmobile+"\" enjoyinstagram_album_likes_count=\""+enjoyinstagram_album_likes_count+"\" enjoyinstagram_album_image_author=\""+enjoyinstagram_album_image_author+"\" enjoyinstagram_album_random_angle=\""+enjoyinstagram_album_random_angle+"\" enjoyinstagram_album_delay=\""+enjoyinstagram_album_delay+"\" enjoyinstagram_album_margin=\""+enjoyinstagram_album_margin+"\" enjoyinstagram_album_animation_in=\""+enjoyinstagram_album_animation_in+"\" enjoyinstagram_album_animation_out=\""+enjoyinstagram_album_animation_out+"\"]";




   if(window.tinyMCE) {

    /* get the TinyMCE version to account for API diffs */
    var tmce_ver=window.tinyMCE.majorVersion;

    if (tmce_ver>="4") {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext_album);
    } else {
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext_album);
    }

    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();
    }
    return;
}


function insertenjoyinstagramshortcode_badge() {
        var tagtext_badge;

        var user_badge = jQuery('#enjoyinstagram_user_badge option:selected').val();
        var show_badge_profile_picture = jQuery('#show_badge_profile_picture:checked').val();
        var show_badge_username = jQuery('#show_badge_username:checked').val();
        var show_badge_bio = jQuery('#show_badge_bio:checked').val();
        var show_badge_website = jQuery('#show_badge_website:checked').val();
        var show_badge_full_name = jQuery('#show_badge_full_name:checked').val();
        var show_badge_media = jQuery('#show_badge_media:checked').val();
        var show_badge_followed_by = jQuery('#show_badge_followed_by:checked').val();
        var show_badge_follows = jQuery('#show_badge_follows:checked').val();
        var show_badge_images = jQuery('#show_badge_images:checked').val();
        var show_badge_view_images = jQuery('#show_badge_view_images option:selected').val();
        var show_badge_number_images = jQuery('#show_badge_number_images option:selected').val();

        tagtext_badge = "[enjoyinstagram_badge user_badge=\""+user_badge+"\" show_badge_profile_picture=\""+show_badge_profile_picture+"\" show_badge_username=\""+show_badge_username+"\" show_badge_bio=\""+show_badge_bio+"\" show_badge_website=\""+show_badge_website+"\" show_badge_full_name=\""+show_badge_full_name+"\" show_badge_media=\""+show_badge_media+"\" show_badge_followed_by=\""+show_badge_followed_by+"\" show_badge_follows=\""+show_badge_follows+"\" show_badge_images=\""+show_badge_images+"\" show_badge_view_images=\""+show_badge_view_images+"\" show_badge_number_images=\""+show_badge_number_images+"\"]";




   if(window.tinyMCE) {

    /* get the TinyMCE version to account for API diffs */
    var tmce_ver=window.tinyMCE.majorVersion;

    if (tmce_ver>="4") {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext_badge);
    } else {
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext_badge);
    }

    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();
    }
    return;
}
