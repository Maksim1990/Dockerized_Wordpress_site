<?php
// Add Shortcode
function enjoyinstagram_shortcode_album($atts) {

STATIC $i = 1;
$link = '';
$result = '';


if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(


	), $atts ) );




global $wpdb;

$users = array_map('trim', explode(',',$atts['user_album']));
$users_moderate = explode(',',$atts['user_moderate_album']);
$hashtag = array_map('trim', explode(',',$atts['hashtag_album']));
$hashtag_moderate = explode(',',$atts['hashtag_moderate_album']);
$public_account = $atts['public_account'];


$array_utenti = get_option('enjoy_instagram_options');

foreach($array_utenti as $user){
		$singolo_utente = (array) $user;
    if($singolo_utente['username']!=''){
        $access_token = $singolo_utente['access_token'];
    }
}




$pre_shortcode_content = '<div class="topbar">
						<span id="close-'.$i.'" class="album_back">&larr;</span>
						<h4 id="name-'.$i.'"></h4>
					</div><ul id="tp-grid-'.$i.'" class="tp-grid">';




if(!empty($users[0])){
foreach($users as $user){

    if(isset($array_utenti[$user]['id']))
      $user_hashtag_album = isset($atts['user_hashtag_album'])? $atts['user_hashtag_album'] : "";
      $result = get_user(urlencode($array_utenti[$user]['username']),get_option('enjoyinstagram_images_captured'),$user_hashtag_album);
    if(!empty($result['meta'])) {
      $code = get_user_code(urlencode($array_utenti[$user]['username']),get_option('enjoyinstagram_images_captured'));
    }
    else{
        $code = '';
    }

 //$code = '429';
if($code == '200'){
$result = $result['data'];
}
else{
    if(isset($array_utenti[$user])) {
        $result = read_table_thumb('user', $array_utenti[$user], '', 'false');
        $result = json_decode(json_encode($result), FALSE);
    }
}

if(count($result)>0 && $result!=''){
 foreach ($result as $entry){
     if(!empty($entry['caption'])) {
         $caption = str_replace("\"","&quot;",$entry['caption']['text']);
     }else{
         $caption = '';
     }

}
}



    if(!in_array($user,$users_moderate)){


if(count($result)>0 && $result != ''){
foreach ($result as $entry) {
    if(!empty($entry['caption'])) {
        $caption = str_replace("\"","&quot;",$entry['caption']['text']);
    }
    else{
        $caption = '';
    }
    if (isHttps()) {

        $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
        $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);

    }

if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry['likes']['count']."</span>";
}
else{
    if($caption!='' && strlen($caption)>20){
        $hover = substr($caption,0,20).' [..]';
    }else{
        $hover = $caption;
    }

}





switch($atts['enjoyinstagram_album_link']) {



                case 'swipebox' :
                $link .= "<li data-pile=\"@".$user."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['images']['standard_resolution']['url']}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"@".$user."\"><a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";

                break;
                case 'nolink':
                $link .= "<li data-pile=\"@".$user."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</li>";

                break;
                case 'altro':
                $link .= "<li data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-pile=\"@".$user."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
                break;


                }






}
}
}
}
}





if(!empty($public_account)){

  $public_account = isset($atts['public_account'])? $atts['public_account'] : "";
  $result = get_user_by_name(urlencode($singolo_utente['username']),get_option('enjoyinstagram_images_captured'),$public_account,"");

  if(empty($result['data'])) return "<span>No user or media found for this Instagram account: ". $public_account ."</span>";

  $code = get_user_code(urlencode($singolo_utente['username']),get_option('enjoyinstagram_images_captured'));


    if($code == '200'){

    $result = $result['data'];

  }
    else{
   $result = read_table('user',$atts['user'],'','false');
   $result = json_decode(json_encode($result),true);
  }
	if(count($result)>0 && $result!=''){
	 foreach ($result as $entry){
	     if(!empty($entry['caption'])) {
	         $caption = str_replace("\"","&quot;",$entry['caption']['text']);
	     }else{
	         $caption = '';
	     }
	 }
	}

	 if(count($result)>0 && $result!=''){
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
	if($atts['enjoyinstagram_album_hover']=='likes'){
	    $hover = "<span id=\"likes_count\">".$entry['likes']['count']."</span>";
	}else{
	    if($caption!='' && strlen($caption)>20){
	        $hover = substr($caption,0,20).' [..]';
	    }else{
	        $hover = $caption;
	    }

	}

	switch($atts['enjoyinstagram_album_link']) {

	                case 'swipebox' :
									if(($entry['type']=='video') && (isset($entry['videos']))){
	                  $video = $entry['videos']['standard_resolution']['url'];
	                  $video_link = str_replace("href=\"".$entry['images']['standard_resolution']['url']."\">","href=\"{$entry['videos']['standard_resolution']['url']}\">",$link);
	                  $link .= "<li data-pile=\"#".$hash."\">
	  							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['videos']['standard_resolution']['url']}\">
	  <span class=\"tp-info\"><span>".$hover."</span></span>
	  								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
	  							</a></li>";

	                }else{
	                  $link .= "<li data-pile=\"#".$hash."\">
	  							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['images']['standard_resolution']['url']}\">
	  <span class=\"tp-info\"><span>".$hover."</span></span>
	  								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
	  							</a></li>";
	                }
	              break;
	                case 'instagram':
	                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\"><span class=\"tp-info\"><span>".$hover."</span></span>
									<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
								</a></li>";

	                break;
	                case 'nolink':
	                $link .= "<li data-pile=\"#".$hash."\"><span class=\"tp-info\"><span>".$hover."</span></span>
									<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
								</li>";

	                break;
	                case 'altro':
	                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
									<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
								</a></li>";
	                break;


	                }


	}
	}

}


$hashtag_empty = array_filter($hashtag);
if(!empty($hashtag_empty)){
foreach($hashtag as $hash){
if(!in_array($hash,$hashtag_moderate)){

    $result = get_hash(urlencode($hash),get_option('enjoyinstagram_images_captured'));
    $code = get_hash_code(urlencode($hash),get_option('enjoyinstagram_images_captured'));
//$code = '429';
if($code == '200'){
$result = $result['data'];
}
else{
   $result = read_table_thumb('hashtag','',$hash,'false');
   $result = json_decode(json_encode($result),FALSE);
}

if(count($result)>0 && $result!=''){
 foreach ($result as $entry){
     if(!empty($entry['caption'])) {
         $caption = str_replace("\"","&quot;",$entry['caption']['text']);
     }else{
         $caption = '';
     }
 }
}

 if(count($result)>0 && $result!=''){
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
if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry['likes']['count']."</span>";
}else{
    if($caption!='' && strlen($caption)>20){
        $hover = substr($caption,0,20).' [..]';
    }else{
        $hover = $caption;
    }

}

switch($atts['enjoyinstagram_album_link']) {

                case 'swipebox' :
								if(($entry['type']=='video') && (isset($entry['videos']))){
                  $video = $entry['videos']['standard_resolution']['url'];
                  $video_link = str_replace("href=\"".$entry['images']['standard_resolution']['url']."\">","href=\"{$entry['videos']['standard_resolution']['url']}\">",$link);
                  $link .= "<li data-pile=\"#".$hash."\">
  							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['videos']['standard_resolution']['url']}\">
  <span class=\"tp-info\"><span>".$hover."</span></span>
  								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
  							</a></li>";

                }else{
                  $link .= "<li data-pile=\"#".$hash."\">
  							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['images']['standard_resolution']['url']}\">
  <span class=\"tp-info\"><span>".$hover."</span></span>
  								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
  							</a></li>";
                }
              break;
                case 'instagram':
                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";

                break;
                case 'nolink':
                $link .= "<li data-pile=\"#".$hash."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</li>";

                break;
                case 'altro':
                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
                break;


                }


}
}
}
}
}



if($users_moderate[0]!='') foreach($users_moderate as $user_moderate) {

    $array_users_accepted = $wpdb->get_results("SELECT image_id FROM " . $wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '" . $user_moderate . "'");

    $result_accepted = array();

    //var_dump($result_accepted);

    foreach ($array_users_accepted as $singolo_user_accepted) {

        //$result = get_user(urlencode($array_utenti[$user_moderate]['username']),get_option('enjoyinstagram_images_captured'));
        $image = get_media($user_moderate,$singolo_user_accepted->image_id);
        array_push($result_accepted, $image['data']);
    }
    if(!empty($image['meta'])){
    $code = $image['meta']['code'];
//$code = '429';
    if ($code == '200') {
        $result = $result_accepted;
//echo 'result: '; print_r($result);
    } else {

        $result = read_table_thumb('user', $user_moderate, '', 'true');
        $result = json_decode(json_encode($result), FALSE);
        // echo '<pre>'; print_r($result); echo '</pre>';
    }
}
   if(count($result)>0 && $result!=''){
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
    if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry['likes']['count']."</span>";
}else{
    if($caption!='' && strlen($caption)>20){
        $hover = substr($caption,0,20).' [..]';
    }else{
        $hover = $caption;
    }

}
switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :
                $link .= "<li data-pile=\"@".$user_moderate."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['images']['standard_resolution']['url']}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"@".$user_moderate."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";

                break;
                case 'nolink':
                $link .= "<li data-pile=\"@".$user_moderate."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</li>";

                break;
                case 'altro':
                $link .= "<li data-pile=\"@".$user_moderate."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
                break;


                }

}
}
}

foreach($hashtag_moderate as $hash_moderate){
$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$hash_moderate."'");

$result_accepted = array();




foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
    $users_for_hashtag_moderate = get_option('enjoy_instagram_options');
    reset($users_for_hashtag_moderate);
    $user_for_hashtag_moderate = key($users_for_hashtag_moderate);

$image = get_media($user_for_hashtag_moderate,$singolo_hashtag_accepted->image_id);
array_push($result_accepted,$image['data']);
}
$result = $result_accepted;

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
   if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry['likes']['count']."</span>";
}else{
    if($caption!='' && strlen($caption)>20){
        $hover = substr($caption,0,20).' [..]';
    }else{
        $hover = $caption;
    }

}

switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :

                $link .= "<li data-pile=\"#".$hash_moderate."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" class=\"swipebox_album\" href=\"{$entry['images']['standard_resolution']['url']}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"{$entry['link']}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";

                break;
                case 'nolink':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</li>";

                break;
                case 'altro':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><a data-author-image=\"{$entry['user']['profile_picture']}\" data-likes-count=\"{$entry['likes']['count']}\" data-author-username=\"{$entry['user']['username']}\" data-link=\"{$entry['link']}\" title=\"{$caption}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$caption}\" src=\"{$entry['images']['thumbnail']['url']}\" />
							</a></li>";
                break;


                }

}

}
$shortcode_content =  $link;

$post_shortcode_content = '</ul>';




?>



<script type="text/javascript">


    jQuery(function() {



	jQuery(".swipebox_album").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_album_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_album_hidebarsdelay']; ?>
	});
        });


    jQuery(function($) {

				var $grid = $( '#tp-grid-<?php echo $i; ?>' ),
					$name = $( '#name-<?php echo $i; ?>' ),
					$close = $( '#close-<?php echo $i; ?>' ),
					$loader = $( '<div class="loader"><i></i><i></i><i></i><i></i><i></i><i></i><span>Loading...</span></div>' ).insertBefore( $grid ),
					stapel = $grid.stapel( {
						randomAngle : <?php echo $atts['enjoyinstagram_album_random_angle']; ?>,
						delay : <?php echo $atts['enjoyinstagram_album_delay']; ?>,
						gutter : <?php echo $atts['enjoyinstagram_album_margin']; ?>,
						pileAngles : 0,
                                                pileAnimation : {
                                                openSpeed : <?php echo $atts['enjoyinstagram_album_animation_in']; ?>,
                                                closeSpeed : <?php echo $atts['enjoyinstagram_album_animation_out']; ?>
                                                },
						onLoad : function() {
							$loader.remove();
						},
						onBeforeOpen : function( pileName ) {
							$name.html( pileName );
						},
						onAfterOpen : function( pileName ) {
							$close.show();
						}
					} );

				$close.on( 'click', function() {
					$close.hide();
					$name.empty();
					stapel.closePile();
				} );

			} );
		</script>
<?php

}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return  $shortcode_content;

}

add_shortcode( 'enjoyinstagram_album', 'enjoyinstagram_shortcode_album' );



?>
