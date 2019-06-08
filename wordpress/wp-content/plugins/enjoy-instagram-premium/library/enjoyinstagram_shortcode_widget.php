<?php
// Add Shortcode
function enjoyinstagram_carousel_shortcode_widget($atts) {
    $shortcode_content = '';
    ?>
<script type="text/javascript">
function ReloadEnjoyInstagramCarousel(id,time_reload){
    var id = id;
    var time_reload = time_reload;

jQuery('#reload_enjoyinstagram_carousel_widget_'+id).load(document.URL + " #reload_enjoyinstagram_carousel_widget_"+id,function() {



jQuery("#owl-widget-"+id).owlCarousel({
    autoplay: <?php echo $atts['enjoyinstagram_carousel_autoplay']; ?>,
    autoplayTimeout: <?php echo $atts['enjoyinstagram_carousel_autoplay_timeout']; ?>,
    autoplayHoverPause: <?php echo $atts['enjoyinstagram_carousel_stop_on_hover']; ?>,
    autoplaySpeed:<?php echo $atts['enjoyinstagram_carousel_autoplay_speed']; ?>,
    navSpeed: <?php echo $atts['enjoyinstagram_carousel_slidespeed']; ?>,
    margin: <?php echo $atts['enjoyinstagram_carousel_margin']; ?>,
    lazyLoad: true,
    nav: <?php echo $atts['enjoyinstagram_carousel_navigation']; ?>,
    navText: ['<?php echo $atts['enjoyinstagram_carousel_navigation_prev']; ?>','<?php echo $atts['enjoyinstagram_carousel_navigation_next']; ?>'],
    responsiveClass:true,
    loop: <?php echo $atts['enjoyinstagram_carousel_loop']; ?>,
    dots: <?php echo $atts['enjoyinstagram_carousel_dots']; ?>,
    animateOut: '<?php echo $atts['enjoyinstagram_carousel_animateout']; ?>',
    animateIn: '<?php echo $atts['enjoyinstagram_carousel_animatein']; ?>',
    items: <?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
    responsive:{
        0:{
            items:<?php echo $atts['enjoyinstagram_carousel_480px']; ?>,

        },
        480:{
            items:<?php echo $atts['enjoyinstagram_carousel_600px']; ?>,

        },
        600:{
            items:<?php echo $atts['enjoyinstagram_carousel_768px']; ?>,

        },
        768:{
            items:<?php echo $atts['enjoyinstagram_carousel_1024px']; ?>,

        },
        1024:{
            items:<?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,

        }
    }
 });

jQuery(".swipebox").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_carousel_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_carousel_hidebarsdelay']; ?>
	});

});

setTimeout("ReloadEnjoyInstagramCarousel("+id+","+time_reload+")",time_reload);
}
</script>
<?php
    STATIC $i = 1;

    if($atts['enjoyinstagram_carousel_autoreload']=='true'){

?>
<script type="text/javascript">
 ReloadEnjoyInstagramCarousel(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_carousel_autoreload_value']; ?>);
</script>
<?php
}

    ?>


<?php




	if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {
	extract( shortcode_atts( array(
            'type' => 'user',
            'user' => 'mediabetasrl',
            'hashtag' => 'enjoyinstagram',
            'enjoyinstagram_carousel_items_number' => '5',
            'enjoyinstagram_carousel_1024px' => '5',
            'enjoyinstagram_carousel_navigation' => 'false',
            'enjoyinstagram_carousel_link' => 'swipebox',
            'enjoyinstagram_carousel_link_altro' => '#',
            'enjoyinstagram_carousel_navigation_prev' => 'prev',
            'enjoyinstagram_carousel_navigation_next'=> 'next',
            'enjoyinstagram_carousel_autoplay' => 'true',
            'enjoyinstagram_carousel_autoplay_speed' => '3000',
            'enjoyinstagram_carousel_autoplay_timeout' => '3000',
            'enjoyinstagram_carousel_stop_on_hover' =>'false',
            'enjoyinstagram_carousel_slidespeed' =>'3000',
            'enjoyinstagram_carousel_margin' => '10',
            'enjoyinstagram_carousel_loop' => 'false',
            'enjoyinstagram_carousel_dots' => 'true',
            'enjoyinstagram_carousel_animatein' => 'bounceIn',
            'enjoyinstagram_carousel_animateout' => 'bounceOut',
            'enjoyinstagram_carousel_image_author' => 'true',
            'enjoyinstagram_carousel_likes_count' => 'true',
            'enjoyinstagram_carousel_hidebarsmobile' => 'true',
            'enjoyinstagram_carousel_hidebarsdelay' => '3000',
            'enjoyinstagram_carousel_moderate' => 'false',
            'enjoyinstagram_carousel_autoreload_default' => 'false',
            'enjoyinstagram_carousel_autoreload_value_default' => '20000',
            'enjoyinstagram_hashtag_popup_moderate_widget' => '',
            'enjoyinstagram_user_carousel_moderate_widget' => ''
	), $atts ) );


?>
<script>
    jQuery(function(){
      jQuery(document.body)
          .on('click touchend','#swipebox-slider .current img', function(e){
              jQuery('#swipebox-next').click();
			  return false;
          })
          .on('click touchend','#swipebox-slider .current', function(e){
              jQuery('#swipebox-close').trigger('click');
          });
    });
</script>
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_carousel_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_carousel_hidebarsdelay']; ?>
	});

});
jQuery(document).ready(function() {

jQuery("#owl-widget-<?php echo $i; ?>").owlCarousel({
    autoplay: <?php echo $atts['enjoyinstagram_carousel_autoplay']; ?>,
    autoplayTimeout: <?php echo $atts['enjoyinstagram_carousel_autoplay_timeout']; ?>,
    autoplayHoverPause: <?php echo $atts['enjoyinstagram_carousel_stop_on_hover']; ?>,
    autoplaySpeed:<?php echo $atts['enjoyinstagram_carousel_autoplay_speed']; ?>,
    navSpeed: <?php echo $atts['enjoyinstagram_carousel_slidespeed']; ?>,
    margin: <?php echo $atts['enjoyinstagram_carousel_margin']; ?>,
    lazyLoad: true,
    nav: <?php echo $atts['enjoyinstagram_carousel_navigation']; ?>,
    navText: ['<?php echo $atts['enjoyinstagram_carousel_navigation_prev']; ?>','<?php echo $atts['enjoyinstagram_carousel_navigation_next']; ?>'],
    responsiveClass:true,
    loop: <?php echo $atts['enjoyinstagram_carousel_loop']; ?>,
    dots: <?php echo $atts['enjoyinstagram_carousel_dots']; ?>,
    animateOut: '<?php echo $atts['enjoyinstagram_carousel_animateout']; ?>',
    animateIn: '<?php echo $atts['enjoyinstagram_carousel_animatein']; ?>',
    items: <?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
    responsive:{
        0:{
            items:<?php echo $atts['enjoyinstagram_carousel_480px']; ?>,

        },
        480:{
            items:<?php echo $atts['enjoyinstagram_carousel_600px']; ?>,

        },
        600:{
            items:<?php echo $atts['enjoyinstagram_carousel_768px']; ?>,

        },
        768:{
            items:<?php echo $atts['enjoyinstagram_carousel_1024px']; ?>,

        },
        1024:{
            items:<?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,

        }
    }
 });

		 });
</script>

<?php



if($atts['enjoyinstagram_carousel_likes_count']=='false'){
    ?>
<style type="text/css">
    #likes_count , #likes_count_text{
        display: none;
    }
</style>
        <?php
}
if($atts['enjoyinstagram_carousel_image_author']=='false'){
    ?>
<style type="text/css">
    #author_image , #author_username{
        display: none;
    }
</style>
        <?php
}


global $wpdb;


$array_utenti = get_option('enjoy_instagram_options');
$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$atts['enjoyinstagram_hashtag_popup_moderate_widget']."' ORDER BY id DESC");

$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_carousel_moderate_widget']."' ORDER BY id DESC");


if($atts['type']=='hashtag'){
if($atts['enjoyinstagram_carousel_moderate']=='true'){


$result_accepted = array();
foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
    $image = get_media($atts['enjoyinstagram_user_carousel_moderate_widget'],$singolo_hashtag_accepted->image_id);
    if(isset($image['data'])) array_push($result_accepted,$image['data']);
}
    $code = $image['meta']['code'];
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('hashtag','',$atts['hashtag'],'true');
   $result = json_decode(json_encode($result),FALSE);
}


}

else{

    $result = get_hash(urlencode($atts['hashtag']),get_option('enjoyinstagram_images_captured'));
    //$code = get_hash_code(urlencode($atts['hashtag']),get_option('enjoyinstagram_images_captured'));
//$code = '429';
//if($code == '200'){
if(!is_null($result)){
    $result = $result['data'];
}
else{
   $result = read_table('hashtag','',$atts['hashtag'],'false');
   $result = json_decode(json_encode($result),FALSE);
   var_dump("arrivo qui");
}
}
if(count($result)>0){
//  var_dump($result);
  //var_dump(count($result));
foreach ($result as $entry){
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'hashtag','',$atts['hashtag'],$entry['caption']['text'],$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }
}
}
else
if($atts['type']=='user'){
if($atts['enjoyinstagram_carousel_moderate']=='true'){


$result_accepted = array();
foreach ($array_users_accepted as $singolo_user_accepted){
    $image = get_media($atts['enjoyinstagram_user_carousel_moderate_widget'], $singolo_user_accepted->image_id);
    array_push($result_accepted, $image['data']);
}
    $code = $image['meta']['code'];
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('user',$atts['user'],'','true');
   $result = json_decode(json_encode($result),FALSE);
}
}
else{
    $result = get_user(urlencode($array_utenti[$atts['user']]['username']),get_option('enjoyinstagram_images_captured'), $atts['user_hashtag']);
    $code = get_user_code(urlencode($array_utenti[$atts['user']]['username']),get_option('enjoyinstagram_images_captured'));

//$code = '429';
if($code == '200'){
$result = $result['data'];
}
else{
   $result = read_table('user',$atts['user'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
}
foreach ($result as $entry){
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'user',$atts['user'],'',$entry['caption']['text'],$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }
}
else
if($atts['type']=='likes'){


    $result = get_likes(urlencode($array_utenti[$atts['user']]['username']),get_option('enjoyinstagram_images_captured'));
    $code = get_likes_code(urlencode($array_utenti[$atts['user']]['username']),get_option('enjoyinstagram_images_captured'));

//$code = '429';
if($code == '200'){
$result = $result['data'];
}
else{
   $result = read_table('likes',$atts['user'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
foreach ($result as $entry){
add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'likes',$atts['user'],'',$entry['caption']['text'],$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
 }

}





$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_carousel_widget_".$i."\"><div id=\"owl-widget-".$i."\" class=\"owl-example\" >";
 if(!is_null($result)){
 foreach ($result as $entry){

     if (isHttps()) {

         $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
         $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);

     }


            switch($atts['enjoyinstagram_carousel_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"".$entry['caption']['from']['profile_picture']."\" data-likes-count=\"".$entry['likes']['count']."\" data-author-username=\"".$entry['caption']['from']['username']."\" data-link=\"".$entry['link']."\" title=\"".$entry['caption']['text']."\" rel=\"gallery_swypebox\" class=\"swipebox\" href=\"".$entry['images']['standard_resolution']['url']."\">";
                $link_close = "</a>";

                break;
                case 'instagram':
                $link = "<a data-author-image=\"".$entry['caption']['from']['profile_picture']."\" data-likes-count=\"".$entry['likes']['count']."\" data-author-username=\"".$entry['caption']['from']['username']."\" data-link=\"".$entry['link']."\" title=\"".$entry['caption']['text']."\" target=\"_blank\" href=\"".$entry['link']."\">";
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = "";
                $link_close = "";
                break;
                case 'altro':
                $link = "<a data-author-image=\"".$entry['caption']['from']['profile_picture']."\" data-likes-count=\"".$entry['likes']['count']."\" data-author-username=\"".$entry['caption']['from']['username']."\" data-link=\"".$entry['link']."\" title=\"".$entry['caption']['text']."\" target=\"_blank\" href=\"".$atts["enjoyinstagram_carousel_link_altro"]."\">";
                $link_close = "</a>";
                break;
                }
                //For standard resolution and default format
                //$shortcode_content .=  "<div class=\"box\">". $link . "<img alt=\"{$caption}\" src=\"{$entry['images']['standard_resolution']['url']}\">" . $link_close . "</div>";

    $square_thumbnail = str_replace('s150x150/', 's320x320/', $entry['images']['thumbnail']['url']);

    //For square pictures or videos
    if(($entry['type']=='video') && (isset($entry['videos']))){
        $video_link = str_replace("href=\"".$entry['images']['standard_resolution']['url']."\">","href=\"{$entry['videos']['standard_resolution']['url']}\">",$link);
        $shortcode_content .=  "<div class=\"box\">" . $video_link . "<img alt=\"{$entry['caption']['text']}\" src=\"{$square_thumbnail}\">". $link_close ."</div>";
      }else{
        $shortcode_content .=  "<div class=\"box\">" . $link . "<img alt=\"{$entry['caption']['text']}\" src=\"{$square_thumbnail}\">" . $link_close . "</div>";
      }

  }
 }
$post_shortcode_content = "</div></div>";



}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

echo $shortcode_content;

}
add_shortcode( 'enjoyinstagram_carousel_widget', 'enjoyinstagram_carousel_shortcode_widget' );


?>
