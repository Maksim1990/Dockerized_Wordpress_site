<?php
// Add Shortcode
function enjoyinstagram_badge_shortcode_widget($atts) {


STATIC $i = 1;

if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(


	), $atts ) );




global $wpdb;





$array_utenti = get_option('enjoy_instagram_options');



$count_data = array();

$show_badge_profile_picture = $atts['show_badge_profile_picture'];
$show_badge_username = $atts['show_badge_username'];
$show_badge_bio = $atts['show_badge_bio'];
$show_badge_website = $atts['show_badge_website'];
$show_badge_full_name = $atts['show_badge_full_name'];
$show_badge_media = $atts['show_badge_media'];
$show_badge_followed_by = $atts['show_badge_followed_by'];
$show_badge_follows = $atts['show_badge_follows'];
$show_badge_images = $atts['show_badge_images'];
$show_badge_view_images = $atts['show_badge_view_images'];
$show_badge_number_images = $atts['show_badge_number_images'];



if($show_badge_media == 'on'){
    array_push($count_data,'show_badge_media');
}
if($show_badge_followed_by == 'on'){
    array_push($count_data,'$show_badge_followed_by');
}
if($show_badge_follows == 'on'){
    array_push($count_data,'$show_badge_follows');
}

    $result =  get_user_info($array_utenti[$atts['user_badge']]['access_token']);


    $badge_username = $result['data']['username'];
    $badge_bio = $result['data']['bio'];
    $badge_website = $result['data']['website'];
    $badge_profile_image = $result['data']['profile_picture'];
    $badge_full_name = $result['data']['full_name'];
    $badge_number_images = $result['data']['counts']['media'];
    $badge_followed_by = $result['data']['counts']['followed_by'];
    $badge_follows = $result['data']['counts']['follows'];


if($show_badge_images=='on'){

    $result_images = get_user(urlencode($array_utenti[$atts['user_badge']]['username']),get_option('enjoyinstagram_images_captured'));
    $code =  get_user_code(urlencode($array_utenti[$atts['user_badge']]['username']),get_option('enjoyinstagram_images_captured'));
//$code = '429';
if($code == '200'){
$result_images = $result_images['data'];
}
else{
   $result_images = read_table('user',$atts['user_badge'],'','false');
   $result_images = json_decode(json_encode($result_images),FALSE);

}

if(count($result_images)>0){
 foreach ($result_images as $entry){
     if(!empty($entry['caption'])) {
         $caption = str_replace("\"","&quot;",$entry['caption']['text']);
     }else{
         $caption = '';
     }
     add_in_table($entry['id'],$entry['link'],$entry['images']['standard_resolution']['url'],'user',$atts['user_badge'],'',$caption,$entry['likes']['count'],$entry['user']['username'],$entry['user']['profile_picture'],$entry['user']['username'],'',time());
}

 }




switch($show_badge_view_images){
        case 'grid':
        if($show_badge_number_images<6){
            $columns_number = 1;
        }else{
            $columns_number = 2;
            $show_badge_number_images = $show_badge_number_images / 2;
        }
        $pre_shortcode_content = '<div id="grid-badge-widget-'.$i.'" class="ri-grid ri-grid-size-2 ri-shadow"><ul>';
        if(count($result_images)>0){
        foreach($result_images as $entry) {
            if(!empty($entry['caption'])) {
                $caption = str_replace("\"","&quot;",$entry['caption']['text']);
            }else{
                $caption = '';
            }

            if(!empty($entry['caption']['from']['profile_picture'])) {
                $profile_picture = $entry['caption']['from']['profile_picture'];
            }else{
                $profile_picture = '';
            }
            if(!empty($entry['caption']['from']['username'])) {
                $from_username = $entry['caption']['from']['username'];
            }else{
                $from_username = '';
            }

            if (isHttps()) {

                $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
                $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);

            }

            if(!isset($shortcode_content_images)) $shortcode_content_images = '';

            $shortcode_content_images .=  '<li><a data-author-image='.
                $profile_picture.' data-likes-count='.
                $entry['likes']['count'].' data-author-username='.
                $from_username.' data-link='.
                $entry['link'].' title='.
                $caption.' target="_blank" href='.
                $entry['link'].'><img  src="'.
                $entry['images']['standard_resolution']['url'].'"></a></li>';
        }
}
        $post_shortcode_content = '</ul></div><script type="text/javascript">jQuery(function() { jQuery(\'#grid-badge-widget-'.$i.'\').gridrotator({
					rows		: 1,
					columns		: '.$show_badge_number_images.',
                                        step            : \'random\',
                                        animSpeed       : 500,
                                        interval        : 3000,
					animType	: \'fadeInOut\',
                                        preventClick    : false,
					w1024           : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},

w768            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},

w600            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},

w480            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
        w320            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
w150            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
}
				});});</script>';

        break;
    case 'carousel':
        $pre_shortcode_content = '<div id="owl-badge-widget-'.$i.'" class="owl-example" >';
        foreach($result_images as $entry) {
            if(!empty($entry['caption'])) {
                $caption = str_replace("\"","&quot;",$entry['caption']['text']);
            }else{
                $caption = '';
            }
            if(!empty($entry['caption']['from']['profile_picture'])) {
                $profile_picture = $entry['caption']['from']['profile_picture'];
            }else{
                $profile_picture = '';
            }
            if(!empty($entry['caption']['from']['username'])) {
                $from_username = $entry['caption']['from']['username'];
            }else{
                $from_username = '';
            }
            if (isHttps()) {

                $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
                $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);

            }
            $shortcode_content_images .=  '<a data-author-image='.
                $profile_picture.' data-likes-count='.$entry['likes']['count'].' data-author-username='.$from_username.' data-link='.$entry['link'].' title='.$caption.' target="_blank" href='.$entry['link'].'><img  src="'.$entry['images']['standard_resolution']['url'].'"></a>';
        }
        $post_shortcode_content = '</div>'
                . '<script type="text/javascript">'
                . 'jQuery(document).ready(function() {

jQuery("#owl-badge-widget-'.$i.'").owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed:2000,
    margin: 0,
    lazyLoad: true,
    nav: false,
    responsiveClass:true,
    loop: true,
    dots: false,
    animateOut: \'fadeOut\',
    animateIn: \'fadeIn\',
    items: '.$show_badge_number_images.',
    responsive:{
        0:{
            items:'.$show_badge_number_images.',

        },
        480:{
            items:'.$show_badge_number_images.',

        },
        600:{
            items:'.$show_badge_number_images.',

        },
        768:{
            items:'.$show_badge_number_images.',

        },
        1024:{
            items:'.$show_badge_number_images.',

        }
    }
 });

		 });</script>';
        break;

}



}






}
$i++;


if($show_badge_media=='on'){
$shortcode_content_images = $pre_shortcode_content.$shortcode_content_images.$post_shortcode_content;
}else{
    $shortcode_content_images='';
}
if($show_badge_profile_picture=='on'){
   $badge_image_profile_frontend = '<div id="badge_image_profile" style="width: 100%;height:120px;background: url(\''.$badge_profile_image.'\');background-size: cover;"></div>';
}else{
    $badge_image_profile_frontend='';
}
if($show_badge_username=='on'){
$badge_username_frontend = '<span class="name-cen">'.$badge_username.'</span>';
}
if($show_badge_profile_picture!='on' && $show_badge_username!='on'){
    $instagram_profile_frontend='';
}else{
$instagram_profile_frontend = '<div class="acco-1-4 instagram_profile">
            <div class="ei_settings_float_block" >'.$badge_image_profile_frontend.'

                <div class="element-block">'.$badge_username_frontend.'
            	</div>
            </div></div>';
}
if($show_badge_bio=='on'){
$bio_badge_frontend ='<span class="bio_badge">'.$badge_bio.'</span>';
}
if($show_badge_website=='on'){
$badge_url_frontend ='<a href="'.$badge_website.'" class="enin-url">'.$badge_website.'</a><br />';
}
if($show_badge_full_name=='on'){
    $badge_full_name_frontend = '<span style="font-size: 20px;font-weight: bold;">'.$badge_full_name.'</span><br />';
}
if($show_badge_images=='on'){
    $badge_number_images_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_number_images.'</span>
                	<span class="text-cen">posts</span>
            </div>
            </div>';
}
if($show_badge_followed_by=='on'){
    $badge_followed_by_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_followed_by.'</span>
                	<span class="text-cen">followers</span>
            </div>
            </div>';
}
if($show_badge_follows=='on'){
    $badge_follows_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_follows.'</span>
                	<span class="text-cen">following</span>
            </div>
            </div>';
}
if($show_badge_images != 'on' && $show_badge_followed_by!='on' && $show_badge_follows!='on'){
    $badge_stats = '';
}else{
$badge_stats = '<div class="acco-2-4 data_value_badge" style="border: 1px solid #ccc;padding: 3px;">
                    <div class="ei_settings_float_block">
                    '.$badge_number_images_frontend.'
                    '.$badge_followed_by_frontend.'
                    '.$badge_follows_frontend.'
                    </div>
            </div>';
}



$shortcode_badge='<div id="div_shortcode_badge_widget"><div class="enin-container">
    	<div class="enin-wall">'.$shortcode_content_images.'

            <div class="acco-block" style="margin-top: 14px;z-index: 99;
position: relative;" >'.$instagram_profile_frontend.'
            '.$badge_stats.'
                <div class="acco-2-4" style="width: 59%;padding: 10px;margin-top: 20px;">
            <div class="ei_settings_float_block">
            <div class="enin-bio">
                '.$badge_full_name_frontend.'
                '.$badge_url_frontend.'
        	'.$bio_badge_frontend.'
        </div>
            </div>
            </div>


     	</div>

        <a href="http://instagram.com/'.$entry['user']['username'].'/" target="_blank"><div style="text-align: center;"><img  src="'.plugins_url('images/followme.png',__FILE__).'"</div>
        </div>


    </div></div>';

echo $shortcode_badge;


}

add_shortcode( 'enjoyinstagram_badge_widget', 'enjoyinstagram_badge_shortcode_widget' );



?>
