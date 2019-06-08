<?php
// Add Shortcode
function enjoyinstagram_polaroid_shortcode($atts) {

    $shortcode_content = '';

    ?>
<script type="text/javascript">
function ReloadEnjoyInstagramPolaroid(id,time_reload){




    var id = id;
    var time_reload = time_reload;

console.log('reload #photostack-'+id+' -> '+time_reload);
jQuery('#reload_enjoyinstagram_polaroid_'+id).load(document.URL + " #photostack-"+id,function() {
jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>
    });

 new Photostack( document.getElementById( 'photostack-'+id ), {
				callback : function( item ) {
					//console.log(item)
				}
			});

});




setTimeout("ReloadEnjoyInstagramPolaroid("+id+","+time_reload+")",time_reload);
}
</script>

<?php STATIC $i = 1;
if($atts['enjoyinstagram_polaroid_autoreload']=='true'){
?>
<script type="text/javascript">
 ReloadEnjoyInstagramPolaroid(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_polaroid_autoreload_value']; ?>);
</script>
<?php
}

?>


<?php

    if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {
	extract( shortcode_atts( array(
            'type_polaroid' => 'user',
            'public_account' => '',
            'user_polaroid' => 'mediabetasrl',
            'hashtag_polaroid' => 'enjoyinstagram',

	), $atts ) );





global $wpdb;

$array_utenti = get_option('enjoy_instagram_options');
$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_polaroid_moderate']."' ORDER BY id DESC");

$query_str = "SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND ";
$hashtags = explode(',',$atts['enjoyinstagram_hashtag_popup_polaroid_moderate']);
foreach($hashtags as $ht){
  $query_str .= " hashtag = '".$ht."' OR ";
}
$query_str .= " 1=2 ";

//var_dump($query_str);

$array_hashtag_accepted = $wpdb->get_results($query_str);



if($atts['type_polaroid']=='hashtag'){
if($atts['enjoyinstagram_polaroid_moderate']=='true'){

$result_accepted = array();
foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
  $image = get_media($atts['enjoyinstagram_user_polaroid_moderate'],$singolo_hashtag_accepted->image_id);
  if($image['meta']['code']==200) array_push($result_accepted,$image['data']);
}
    $code = $image['meta']['code'];
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('hashtag','',$atts['enjoyinstagram_hashtag_popup_polaroid_moderate'],'true');
   $result = json_decode(json_encode($result),FALSE);
}


}
else{

    $result = get_hash(urlencode($atts['hashtag_polaroid']),get_option('enjoyinstagram_images_captured'));

    if(!is_null($result)){
      $images_captured = get_option('enjoyinstagram_images_captured');
      $result = $result['data'];

}
else{
   $result = read_table('hashtag','',$atts['hashtag_polaroid'],'false');
   $result = json_decode(json_encode($result),FALSE);
}
}
if(count($result)>0){
    foreach ($result as $entry){

        if(!empty($entry['caption'])) {
            $caption = str_replace("\"","&quot;",$entry['caption']['text']);
        }else{
            $caption = '';
        }

add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'hashtag','',$atts['hashtag_polaroid'],$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }
}
}
else
if($atts['type_polaroid']=='user'){
if($atts['enjoyinstagram_polaroid_moderate']=='true'){


$result_accepted = array();

foreach ($array_users_accepted as $singolo_user_accepted){
    $image = get_media($atts['enjoyinstagram_user_polaroid_moderate'],$singolo_user_accepted->image_id);

    if($image['meta']['code']==200) array_push($result_accepted,$image['data']);
}
$code = $image['meta']['code'];
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('user',$atts['enjoyinstagram_user_polaroid_moderate'],'','true');
   $result = json_decode(json_encode($result),true);
}
}
else{

    $user_hashtag_polaroid = isset($atts['user_hashtag_polaroid'])? $atts['user_hashtag_polaroid'] : "";
    $result = get_user(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'),$user_hashtag_polaroid);
    $code = get_user_code(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'));

if($code == '200'){
    $images_captured = get_option('enjoyinstagram_images_captured');
    $result = $result['data'];
}else{
   $result = read_table('user',$atts['user_polaroid'],'','false');
   $result = json_decode(json_encode($result),true);
}
}
if(count($result)>0){
 foreach ($result as $entry){

     if(!empty($entry['caption'])) {
         $caption = str_replace("\"","&quot;",$entry['caption']['text']);
     }else{
         $caption = '';
     }

add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'user',$atts['user_polaroid'],'',$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
}

 }
}else if($atts['type_polaroid']=='public_account'){

  $public_account = isset($atts['public_account'])? $atts['public_account'] : "";
  $result = get_user_by_name(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'),$public_account,"");

  if(empty($result['data'])) return "<span>No user or media found for this Instagram account: ". $public_account ."</span>";

  $code = get_user_code(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'));


    if($code == '200'){

    $result = $result['data'];

  }
    else{
   $result = read_table('user',$atts['user_polaroid'],'','false');
   $result = json_decode(json_encode($result),true);
  }

}
else
if($atts['type_polaroid']=='likes'){


    $result = get_likes(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'));
    $code = get_likes_code(urlencode($array_utenti[$atts['user_polaroid']]['username']),get_option('enjoyinstagram_images_captured'));

//$code = '429';
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
   $result = read_table('likes',$atts['user_polaroid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
if(count($result)>0){
foreach ($result as $entry){
    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }else{
        $caption = '';
    }
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'likes',$atts['user_polaroid'],'',$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }
}

}


$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_polaroid_".$i."\"><section id=\"photostack-".$i."\" class=\"photostack\" style=\"background: #".$atts['enjoyinstagram_polaroid_background']."\"><div>";





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
	 switch($atts['enjoyinstagram_polaroid_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_polaroid photostack-img\" href=\"{$entry['images']['standard_resolution']['url']}\">";
                $link_close = "</a>";
                break;
                case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." class=\"photostack-img\" data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\">";
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = "";
                $link_close = "";
                break;
                case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." class=\"photostack-img\" data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_polaroid_link_altro"]."\">";
                $link_close = "</a>";
                break;


                }

                if($atts['enjoyinstagram_polaroid_back'] == 'true'){
                if($atts['enjoyinstagram_polaroid_likes_count']=='false'){
                    $entry['likes']['count'] ='';
                }
                if($atts['enjoyinstagram_polaroid_image_author']=='false'){
                    $entry['user']['username'] = '';
                }
                if(($entry['type']=='video') && (isset($entry['videos']))){
                    $video = $entry['videos']['standard_resolution']['url'];
                    $video_link = str_replace("href=\"".$entry['images']['standard_resolution']['url']."\">","href=\"{$entry['videos']['standard_resolution']['url']}\">",$link);
                    $shortcode_content .=  "<figure class=\"photostack-current photostack-flip\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\">".$video_link."<img alt=\"{$caption}\" src=\"{$entry['images']['standard_resolution']['url']}\">".$link_close."<figcaption><h2 class=\"photostack-title\"><a target=\"_blank\" href=\"{$entry['link']}\"><span id=\"likes_count\">{$entry['likes']['count']}</span></a><a href=\"http://instagram.com/{$entry['user']['username']}\" target=\"_blank\">{$entry['user']['username']}</a></h2><div class=\"photostack-back\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\"><p>{$caption}</p></div></figcaption></figure>";
                  }else{
                    $shortcode_content .=  "<figure class=\"photostack-current photostack-flip\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\">".$link."<img alt=\"{$caption}\" src=\"{$entry['images']['standard_resolution']['url']}\">".$link_close."<figcaption><h2 class=\"photostack-title\"><a target=\"_blank\" href=\"{$entry['link']}\"><span id=\"likes_count\">{$entry['likes']['count']}</span></a><a href=\"http://instagram.com/{$entry['user']['username']}\" target=\"_blank\">{$entry['user']['username']}</a></h2><div class=\"photostack-back\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\"><p>{$caption}</p></div></figcaption></figure>";
                  }
                }else{
                    $shortcode_content .=  "<figure class=\"photostack-current photostack-flip\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\">".$link."<img alt=\"{$caption}\" src=\"{$entry['images']['standard_resolution']['url']}\">".$link_close."<figcaption><h2 class=\"photostack-title\"><a target=\"_blank\" href=\"{$entry['link']}\"><span id=\"likes_count\">{$entry['likes']['count']}</span></a><a href=\"http://instagram.com/{$entry['user']['username']}\" target=\"_blank\">{$entry['user']['username']}</a></h2></figcaption></figure>";
                }
  }

$post_shortcode_content = "</div></section></div><script type=\"text/javascript\">
                        new Photostack( document.getElementById( 'photostack-".$i."' ), {
				callback : function( item ) {
					//console.log(item)
				}
			});
                       </script>";

?>


<script type="text/javascript">

			jQuery(function() {



	jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>,
        afterClose: function(){
            jQuery('#reload_enjoyinstagram_polaroid_<?php echo $i; ?>').load(document.URL + " #photostack-<?php echo $i; ?>",function() {
jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>,
    });

    new Photostack( document.getElementById( 'photostack-<?php echo $i; ?>' ), {
				callback : function( item ) {
					//console.log(item)
				}
			})


    });
        }

			});
                        });

		</script>


    <?php

}
$i++;


$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;


 }



add_shortcode( 'enjoyinstagram_polaroid', 'enjoyinstagram_polaroid_shortcode' );




?>
