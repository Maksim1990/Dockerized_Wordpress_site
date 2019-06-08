<?php
// Add Shortcode
function enjoyinstagram_mb_shortcode_grid($atts) {
    ?>
<script type="text/javascript">







function ReloadEnjoyInstagramGrid(id,time_reload,enjoyinstagram_grid_rows_1024px,enjoyinstagram_grid_cols_1024px,enjoyinstagram_grid_rows_768px,enjoyinstagram_grid_cols_768px,enjoyinstagram_grid_rows_600px,enjoyinstagram_grid_cols_600px,enjoyinstagram_grid_rows_480px,enjoyinstagram_grid_cols_480px){
    var id = id;
    var time_reload = time_reload;

//console.log('reload #reload_enjoyinstagram_grid_'+id+' -> '+time_reload);
jQuery('#reload_enjoyinstagram_grid_'+id).load(document.URL + " #reload_enjoyinstagram_grid_"+id, {"enjoyinstagram_grid_rows_1024px":enjoyinstagram_grid_rows_1024px,"enjoyinstagram_grid_cols_1024px":enjoyinstagram_grid_cols_1024px,"enjoyinstagram_grid_rows_768px":enjoyinstagram_grid_rows_768px,"enjoyinstagram_grid_cols_768px":enjoyinstagram_grid_cols_768px,"enjoyinstagram_grid_rows_600px":enjoyinstagram_grid_rows_600px,"enjoyinstagram_grid_cols_600px":enjoyinstagram_grid_cols_600px,"enjoyinstagram_grid_rows_480px":enjoyinstagram_grid_rows_480px,"enjoyinstagram_grid_cols_480px":enjoyinstagram_grid_cols_480px},function() {
jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});

//console.log(enjoyinstagram_grid_rows_1024px);

				if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
          margin : <?php echo (isset($atts['enjoyinstagram_grid_margin']))? $atts['enjoyinstagram_grid_margin'] : "0"; ?>,
                                        step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : enjoyinstagram_grid_rows_1024px,
    columns : enjoyinstagram_grid_cols_1024px
},

w768            : {
    rows    : enjoyinstagram_grid_rows_768px,
    columns : enjoyinstagram_grid_cols_768px
},

w600            : {
    rows    : enjoyinstagram_grid_rows_600px,
    columns : enjoyinstagram_grid_cols_600px
},

w480            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
        w320            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
w150            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
}
				});

        }else{







				jQuery('#grid-'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
          margin : <?php echo (isset($atts['enjoyinstagram_grid_margin']))? $atts['enjoyinstagram_grid_margin'] : "0"; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : enjoyinstagram_grid_rows_1024px,
    columns : enjoyinstagram_grid_cols_1024px
},

w768            : {
    rows    : enjoyinstagram_grid_rows_768px,
    columns : enjoyinstagram_grid_cols_768px
},

w600            : {
    rows    : enjoyinstagram_grid_rows_600px,
    columns : enjoyinstagram_grid_cols_600px
},

w480            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
        w320            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
w150            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
}
				});


			}



});

setTimeout("ReloadEnjoyInstagramGrid("+id+","+time_reload+","+enjoyinstagram_grid_rows_1024px+","+enjoyinstagram_grid_cols_1024px+","+enjoyinstagram_grid_rows_768px+","+enjoyinstagram_grid_cols_768px+","+enjoyinstagram_grid_rows_600px+","+enjoyinstagram_grid_cols_600px+","+enjoyinstagram_grid_rows_480px+","+enjoyinstagram_grid_cols_480px+")",time_reload);
}
</script>
<?php
STATIC $i = 1;
 if($atts['enjoyinstagram_grid_autoreload']=='true'){
     if($atts['show_resolution_grid']!='on'){
            $atts['enjoyinstagram_grid_rows_1024px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_1024px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_768px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_768px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_600px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_600px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_480px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_480px'] = $atts['enjoyinstagram_grid_cols'];

        }
?>
<script type="text/javascript">
 ReloadEnjoyInstagramGrid(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_grid_autoreload_value']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>);
</script>
<?php
}

if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(
            'type_grid' => 'user',
            'user_grid' => 'mediabetasrl',
            'public_account' => '',
            'hashtag_grid' => 'enjoyinstagram',
            'enjoyinstagram_grid_rows' => '2',
            'enjoyinstagram_grid_cols' => '4',
            'enjoyinstagram_grid_link' => 'swipebox',
            'enjoyinstagram_grid_link_altro' => '#',
            'enjoyinstagram_grid_step' => 'random',
            'enjoyinstagram_grid_animation' => 'random',
            'enjoyinstagram_grid_animation_speed' => '500',
            'enjoyinstagram_grid_interval' => '3000',
            'enjoyinstagram_grid_onhover' => 'false',
            'enjoyinstagram_grid_cols_480px' => '4',
            'enjoyinstagram_grid_rows_480px' => '2',
            'enjoyinstagram_grid_cols_600px' => '4',
            'enjoyinstagram_grid_rows_600px' => '2',
            'enjoyinstagram_grid_rows_768px' => '2',
            'enjoyinstagram_grid_cols_768px' => '4',
            'enjoyinstagram_grid_rows_1024px' => '2',
            'enjoyinstagram_grid_cols_1024px' => '4',
            'enjoyinstagram_grid_image_author' => 'true',
            'enjoyinstagram_grid_likes_count' => 'true',
            'enjoyinstagram_grid_hidebarsmobile' => 'true',
            'enjoyinstagram_grid_hidebarsdelay' => '3000',
            'enjoyinstagram_grid_autoreload' => 'false',
            'enjoyinstagram_grid_autoreload' => '20000',
            'enjoyinstagram_grid_moderate' => 'false',
            'enjoyinstagram_user_grid_moderate' => '',
            'enjoyinstagram_hashtag_popup_grid_moderate' => '',
            'enjoyinstagram_grid_margin' => '3',
            'user_hashtag_grid' => ''
	), $atts ) );

if($atts['show_resolution_grid']!='on'){
            $atts['enjoyinstagram_grid_rows_1024px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_1024px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_768px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_768px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_600px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_600px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_480px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_480px'] = $atts['enjoyinstagram_grid_cols'];

        }




if($atts['enjoyinstagram_grid_likes_count']=='false'){
    ?>
<style type="text/css">
    #likes_count , #likes_count_text{
        display: none;
    }
</style>
        <?php
}
if($atts['enjoyinstagram_grid_image_author']=='false'){
    ?>
<style type="text/css">
    #author_image , #author_username{
        display: none;
    }
</style>
        <?php
}

global $wpdb;

//var_dump($atts['enjoyinstagram_hashtag_popup_grid_moderate']);

$array_utenti = get_option('enjoy_instagram_options');

$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_grid_moderate']."'");

$query_str = "SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND ";
$hashtags = explode(',',$atts['enjoyinstagram_hashtag_popup_grid_moderate']);
foreach($hashtags as $ht){
  $query_str .= " hashtag = '".$ht."' OR ";
}
$query_str .= " 1=2 ";

$array_hashtag_accepted = $wpdb->get_results($query_str);

if($atts['type_grid']=='hashtag'){

if($atts['enjoyinstagram_grid_moderate']=='true'){

  $result_accepted = array();

  foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
      $image = get_media($atts['user_grid'], $singolo_hashtag_accepted->image_id);
      if (isset($image['data'])) array_push($result_accepted,$image['data']);
  }

  $code = $image['meta']['code'];


  if($code == '200'){
    $result = $result_accepted;
//echo 'result: '; print_r($result);
  }
  else{

     $result = read_table('hashtag','',$atts['enjoyinstagram_hashtag_popup_grid_moderate'],'true');
     $result = json_decode(json_encode($result),true);
  }



  }else{

    $result = get_hash(urlencode($atts['hashtag_grid']),get_option('enjoyinstagram_images_captured'));



    if(!is_null($result)){
      $images_captured = get_option('enjoyinstagram_images_captured');
      $result = $result['data'];
      }else{
         $result = read_table('hashtag','',$atts['hashtag_grid'],'false');
         $result = json_decode(json_encode($result),true);
      }

}


foreach ($result as $entry){
    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }else{
        $caption = '';
    }
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'hashtag','',$atts['hashtag_grid'],$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }

}else if($atts['type_grid']=='public_account'){

  $public_account = isset($atts['public_account'])? $atts['public_account'] : "";
  $result = get_user_by_name(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'),$public_account,"");

  if(empty($result['data'])) return "<span>No user or media found for this Instagram account: ". $public_account ."</span>";

  $code = get_user_code(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'));


    if($code == '200'){

    $result = $result['data'];

  }
    else{
   $result = read_table('user',$atts['user'],'','false');
   $result = json_decode(json_encode($result),true);
  }

}else if($atts['type_grid']=='user'){
if($atts['enjoyinstagram_grid_moderate']=='true'){




$result_accepted = array();
foreach ($array_users_accepted as $singolo_user_accepted){
    $image = get_media($atts['user_grid'], $singolo_user_accepted->image_id);
array_push($result_accepted,$image['data']);
}
    $code = $image['meta']['code'];

if($code == '200'){
$result = $result_accepted;
}
else{
   $result = read_table('user',$atts['user_grid'],'','true');
   $result = json_decode(json_encode($result),true);
}



    }
else{

    $user_grid_hashtag = isset($atts['user_hashtag_grid'])? $atts['user_hashtag_grid'] : "";
    $result = get_user(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'),$user_grid_hashtag);
    $code = get_user_code(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'));


if($code == '200'){
    $images_captured = get_option('enjoyinstagram_images_captured');
    $result = $result['data'];
  }else{
   $result = read_table('user',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),true);
}
}
foreach ($result as $entry){

    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }else{
        $caption = '';
    }


add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'user',$atts['user_grid'],'',$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }
}
else if($atts['type_grid']=='likes'){

    $result = get_likes(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'));
    $code = get_likes_code(urlencode($array_utenti[$atts['user_grid']]['username']),get_option('enjoyinstagram_images_captured'));

if($code == '200'){
$images_captured = get_option('enjoyinstagram_images_captured');
    $rr = array();
    if($images_captured <= 20){
    $result = $result['data'];
}
else{
    $tmp = 0;
    $result = $result['data'];
do{

    foreach($result as $test) if($tmp2++ < $images_captured){
array_push($rr,$test);
    $tmp++;
    }

}while((($result['pagination']['next_url']) && $result = json_decode(file_get_contents($result['pagination']['next_url']))) && ($tmp < $images_captured));

$result = $rr;
}
}
else{
   $result = read_table('likes',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
foreach ($result as $entry){
    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }else{
        $caption = '';
    }
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'likes',$atts['user_grid'],'',$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }

}

if(count($result)>0){
    //ei-grid-loading to display a loading message before loading of all the images
    $pre_shortcode_content = "<div id=\"ei-grid-loading-".$i."\"><img src=\"".plugins_url('/../icons/loader1.gif', __FILE__)."\">Loading... </div><div id=\"reload_enjoyinstagram_grid_".$i."\" ><div id=\"grid-".$i."\" class=\"ri-grid ri-grid-size-2 ri-shadow\"><ul id=\"ei-grid-list-".$i."\" hidden=\"true\">";
    //
    $shortcode_content = '';

foreach ($result as $entry) {


    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }else{
        $caption = '';
    }


    if (isHttps()) {

        $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
        $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);

    }


	 switch($atts['enjoyinstagram_grid_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-video=\"no\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_grid\" href=\"{$entry['images']['standard_resolution']['url']}\">";                $link_close = "</a>";
                break;
                case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-video=\"no\" data-author-username=\"{$entry['caption']['from']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\">";
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = "";
                $link_close = "";
                break;
                case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-video=\"no\" data-author-username=\"{$entry['caption']['from']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_grid_link_altro"]."\">";
                $link_close = "</a>";
                break;


                }
  //For standard resolution and default format
	//$shortcode_content .=  "<li>".$link."<img  src=\"{$entry['images']['standard_resolution']['url']}\">".$link_close."</li>";

  $square_thumbnail = str_replace('s150x150/', 's320x320/', $entry['images']['thumbnail']['url']);

  //For square pictures or videos
  if(($entry['type']=='video') && (isset($entry['videos']))){
      $video_link = str_replace("href=\"".$entry['images']['standard_resolution']['url']."\">","href=\"{$entry['videos']['standard_resolution']['url']}\">",$link);
      $video_link = str_replace("data-video=\"no\"","data-video=\"yes\"",$video_link);
      $shortcode_content .=  "<li>".$video_link."<img src=\"{$square_thumbnail}\">".$link_close."</li>";
    }else{
      $shortcode_content .=  "<li>".$link."<img src=\"{$square_thumbnail}\">".$link_close."</li>";
    }
  }




$post_shortcode_content = "</ul></div></div>";

}else{
  $pre_shortcode_content = "";
  $shortcode_content = "";
  $post_shortcode_content = "";
}


?>



<script type="text/javascript">

			jQuery(function() {

	jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});

        if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
          margin : <?php echo (isset($atts['enjoyinstagram_grid_margin']))? $atts['enjoyinstagram_grid_margin'] : "0"; ?>,
                    step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                    animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                    interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                    preventClick    : false,
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>
},

w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>
},

w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>
},

w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
}
				});

        }else{

				jQuery('#grid-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
          margin : <?php echo (isset($atts['enjoyinstagram_grid_margin']))? $atts['enjoyinstagram_grid_margin'] : "0"; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>
},

w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>
},

w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>
},

w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
}
				});

			}

			});


		</script>
<?php

}
$i++;

if(!isset($pre_shortcode_content)) return null;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;
}

add_shortcode( 'enjoyinstagram_grid', 'enjoyinstagram_mb_shortcode_grid' );



?>
