<?php
/*
Plugin Name: Enjoy Instagram Premium
Plugin URI: http://www.mediabeta.com/enjoy-instagram/
Description: Instagram Responsive Images Gallery and Carousel, works with Shortcodes and Widgets.
Version: 8.4
Author: F. Prestipino, F. Di Pane - Mediabeta Srl
Author URI: http://www.mediabeta.com/chi-siamo/
*/

require_once('library/enjoyinstagram_shortcode.php');
require_once('library/instagram.class.php');
class Settings_enjoyinstagram_Plugin {

	private $enjoyinstagram_general_settings_key = 'enjoyinstagram_general_settings';
	private $advanced_settings_key = 'enjoyinstagram_advanced_settings';
	private $plugin_options_key = 'enjoyinstagram_plugin_options';
  private $moderate_settings_key = 'enjoyinstagram_moderated_settings';
  private $moderate_key = 'enjoyinstagram_moderated';
  private $moderate_key_accepted = 'enjoyinstagram_moderated_accepted';
  private $moderate_key_rejected = 'enjoyinstagram_moderated_rejected';
	private $plugin_settings_tabs = array();

	function __construct() {
		add_action( 'init', array( &$this, 'load_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_enjoyinstagram_client_id' ) );
		add_action( 'admin_init', array( &$this, 'register_advanced_settings' ) );
    add_action( 'admin_init', array( &$this, 'register_enjoyinstagram_moderate_settings' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menus' ) );
	}

	function load_settings() {
		$this->general_settings = (array) get_option( $this->enjoyinstagram_general_settings_key );
		$this->advanced_settings = (array) get_option( $this->advanced_settings_key );
    $this->moderate_settings = (array) get_option( $this->moderate_settings_key );
  	$this->general_settings = array_merge( array(
			'general_option' => 'General value'
		), $this->general_settings );

		$this->advanced_settings = array_merge( array(
			'advanced_option' => 'Advanced value'
		), $this->advanced_settings );

    $this->moderate_settings = array_merge( array(
			'moderate_option' => 'Moderate Settings Value'
		), $this->moderate_settings );

	}

	function register_enjoyinstagram_client_id() {
		$this->plugin_settings_tabs[$this->enjoyinstagram_general_settings_key] = 'Users';

		register_setting( $this->enjoyinstagram_general_settings_key, $this->enjoyinstagram_general_settings_key );
		add_settings_section( 'section_general', 'General Plugin Settings', array( &$this, 'section_general_desc' ), $this->enjoyinstagram_general_settings_key );
		add_settings_field( 'general_option', 'A General Option', array( &$this, 'field_general_option' ), $this->enjoyinstagram_general_settings_key, 'section_general' );
	}


	function register_advanced_settings() {
		$this->plugin_settings_tabs[$this->advanced_settings_key] = 'Appearance Settings';  // fabio

		register_setting( $this->advanced_settings_key, $this->advanced_settings_key );
		add_settings_section( 'section_advanced', 'Advanced Plugin Settings', array( &$this, 'section_advanced_desc' ), $this->advanced_settings_key );
		add_settings_field( 'advanced_option', 'An Advanced Option', array( &$this, 'field_advanced_option' ), $this->advanced_settings_key, 'section_advanced' );
	}

        function register_enjoyinstagram_moderate_settings() {
		$this->plugin_settings_tabs[$this->moderate_settings_key] = 'Moderation Panel'; // fabio

		register_setting( $this->moderate_settings_key, $this->moderate_settings_key );
		add_settings_section( 'section_moderated_settings', 'Moderate Plugin Settings', array( &$this, 'section_moderate_settings_desc' ), $this->moderate_settings_key );
		add_settings_field( 'moderate_option', 'A Moderate Option', array( &$this, 'field_moderated_option' ), $this->moderate_settings_key, 'section_moderated_settings' );
	}


	function section_general_desc() { echo 'Instagram Settings'; }
	function section_advanced_desc() { echo 'Manage Enjoy Instagram.'; }
  function section_moderate_settings_desc() { echo 'Moderate Enjoy Instagram Settings.'; }


	function field_general_option() {
		?>
<input type="text" name="<?php echo $this->enjoyinstagram_general_settings_key; ?>[general_option]" value="<?php echo esc_attr( $this->general_settings['general_option'] ); ?>" /><?php
	}


	function field_advanced_option() { ?>
<input type="text" name="<?php echo $this->advanced_settings_key; ?>[advanced_option]" value="<?php echo esc_attr( $this->advanced_settings['advanced_option'] ); ?>" />
<?php
	}

        function field_moderated_option() { ?>
<input type="text" name="<?php echo $this->moderate_settings_key; ?>[moderated_option]" value="<?php echo esc_attr( $this->moderated_settings['moderated_option'] ); ?>" />
<?php
	}

	function add_admin_menus() {
add_options_page( 'Enjoy Instagram', 'Enjoy Instagram', 'manage_options', $this->plugin_options_key, array( &$this, 'enjoyinstagram_options_page' ) );
	}


	function enjoyinstagram_options_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->enjoyinstagram_general_settings_key;?>
	<div class="wrap">
 	<h2><div class="ei_block">
		<div class="ei_left_block">
         		<div class="ei_hard_block">
		 			<?php echo '<img src="' . plugins_url( 'images/enjoyinstagram.png' , __FILE__ ) . '" > '; ?>
                </div>

         		<div class="ei_twitter_block">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.mediabeta.com/enjoy-instagram/" data-text="I've just installed Enjoy Instagram for wordpress. Awesome!" data-hashtags="wordpress">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                    </script>
				</div>

				<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&appId=359330984151581&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
				<div class="ei_facebook_block">
					<div class="fb-like" data-href="http://www.mediabeta.com/enjoy-instagram/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
                    </div>
				</div>
		</div>

        <div id="buy_me_a_coffee" style="background:url(<?php echo  plugins_url( 'images/buymeacoffee.png' , __FILE__ )  ; ?>)#fff no-repeat; ">

          <div class="pad_coffee">
          <span class="coffee_title">Buy me a coffee!</span>
          <p><span>If you liked our work please consider to make a kind donation through Paypal.</span></p>
         <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHRwYJKoZIhvcNAQcEoIIHODCCBzQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYA2UD9nEEx7DpSJjZ9cMPpXQcwkplkngz5Om2lrCRndClH2wsLNtoW6zpt0WHv90aE8pabeHs019W7MSA/7lPiNbMr62sSV/b8+80b9wBX9ch7GTKNcgXQ3qO2Gg16+iRa0EkwFZY6wjVu1d6cjYUROR1FYziTkOwZ0rFB1BIpDOTELMAkGBSsOAwIaBQAwgcQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIxmfBLfx5kLKAgaCjqYuWhMkP5ATABAMc7wK8XgJ3TEvNz/GfgaA5eVLM1+g3CYoDo/gBat7kKhfRUh03V4NLSuk+AwDbOzHUx0M7jQZEINE9Ur0GWj2lBOipRcAFZziUvUg1cavok3gf+pkNbKdToVs51wWgQkVYu6x0rlLvXk8YX5Z5QLNNGwIkYe8wNI+NrEkYwnQ2axflISLL+BSC1yoSgasv1huhd7QUoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMTQwMzE3MTUzNDA2WjAjBgkqhkiG9w0BCQQxFgQULx/mUONLbAeob5jHfwrjw49VOi0wDQYJKoZIhvcNAQEBBQAEgYBJzOmAZY/fXJWt1EHmthZz55pvpW0T1z7F4XVAk85mH/0ZIgRrA9Bj5lsU/3YKvx3LCj4SFRRkTIb0f77/vWtN1BoZi1wWwSMODl9kdbVlQNh61FVXBp1FaKoiq1pn176D2uKGpRloQiWH2jP+TGrS81XTEI4rVai73+Tr5Ms/RQ==-----END PKCS7-----
            ">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
      	</form>
		</div>
 	</div>
	</div>
</h2>


<?php $this->plugin_options_tabs(); ?>
<?php
	if($tab == 'enjoyinstagram_general_settings') {
		if(isset($_GET['access_token']) && $_GET['access_token']!=''){
            $data = array();
            $data = get_user_info($_GET['access_token']);

    $array_utente = (array) get_option('enjoy_instagram_options');
    $array_utente[$data['data']['username']] = array(
        'access_token' => $_GET['access_token'],
        'username' => $data['data']['username'],
        'bio' => replace4byte($data['data']['bio']),
        'website' => $data['data']['website'],
        'profile_picture' => $data['data']['profile_picture'],
        'full_name' => replace4byte($data['data']['full_name']),
        'id' => $data['data']['id']
    );
    update_option('enjoy_instagram_options',$array_utente); // scrivo dati dopo autorizzazione
    delete_option('enjoyinstagram_client_id');
    delete_option('enjoyinstagram_client_secret');

    include('library/profile_auth.php');
		}else{
			$check_array_utenti = 	(array) get_option('enjoy_instagram_options');
			//var_dump(get_option('enjoy_instagram_options'));

      if(is_array($check_array_utenti)){

				$check_array_utenti = array_filter($check_array_utenti);
				/*,function($k) {
				    return is_string($k);
				}, ARRAY_FILTER_USE_KEY);*/
				//var_dump($check_array_utenti);
      	//$check_array_utenti = array_filter(array_map('array_filter', $check_array_utenti));
      }
      if(!$check_array_utenti || $check_array_utenti==''){
				include('library/autenticazione.php');
			} else {
				include('library/profile_auth.php');
			}

		}
	}
   else if($tab == 'enjoyinstagram_advanced_settings'){
		include('library/impostazioni_shortcode.php');
 	}
   else if($tab == 'enjoyinstagram_moderated_settings'){
		include('library/moderate_settings.php');
 	} ?>
	</div>
<?php
	}

	function plugin_options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->enjoyinstagram_general_settings_key;

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
		}
		echo '</h2>';
		}
	};


function get_user_info($access_token){
    $url = 'https://api.instagram.com/v1/users/self/?access_token='.$access_token;
    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

        //Data are stored in $data
        $data = json_decode(curl_exec($curl_connection), true);
        curl_close($curl_connection);
        return $data;
    } catch(Exception $e) {
        return $e->getMessage();
    }

}

function rudr_instagram_api_curl_connect( $api_url ){
	$connection_c = curl_init(); // initializing
	curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
	curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, true ); // return the result, do not print
	curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
 	curl_setopt($connection_c, CURLOPT_SSL_VERIFYPEER, false);
	$json_return = curl_exec( $connection_c ); // connect and get json data
	curl_close( $connection_c ); // close connection
	return json_decode( $json_return, true ); // decode and return
}

function shuffle_assoc(&$array) {

				if(empty($array)) return null;

        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return true;
}

//ANDREA NEW FUNC
function get_user_by_name($user,$count, $account_name, $hashtag = ""){

    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    $access_token = $user_option[$user]['access_token'];

		$user_name = strtolower($account_name); // sanitization
    $url = "https://api.instagram.com/v1/users/search?q=".$user_name."&access_token=".$access_token;
    $get = file_get_contents($url);
    $json = json_decode($get);

    foreach($json->data as $user)
    {

        if($user->username == $user_name)
        {
            $user_id = $user->id;
        }
    }

		$hashtags = explode(",", $hashtag);

    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent?count='.$count.'&access_token='.$access_token;
		try {

			$result = rudr_instagram_api_curl_connect($url);

			$res = $result;
			$res['data']=array();

			if(!isset($result['data'])) return $res;

			foreach ($result['data'] as $post) {
				if ($hashtag != ""){
					foreach($hashtags as $hash){
						if(in_array($hash,$post["tags"])){
							if(!in_array($post,$res['data'])) array_push ($res['data'], $post);
						}
					}
				}else{
					array_push ($res['data'], $post);
				}
			}


		  if($count>=33 && isset($result['pagination']['next_url'])){
				for($i=1;$i<($count/33);$i++){
				  $result = rudr_instagram_api_curl_connect($result['pagination']['next_url']);
					if(!is_null($result['data'])){
						foreach ($result['data'] as $post) {
							if(count($res['data'])==$count) break;
							if ($hashtag != ""){
								foreach($hashtags as $hash){
									if(in_array($hash,$post["tags"])){
											if(!in_array($post,$res['data'])) array_push ($res['data'], $post);
									}
								}
							}else{
								array_push ($res['data'], $post);
							}
					  }
					}
				}
		  }

		  return $res;

    } catch(Exception $e) {
        return $e->getMessage();
    }

}

function get_hash($hashtag,$count){

    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    reset($user_option);
    $first_key = key($user_option);
    $access_token = $user_option[$first_key]['access_token'];

    try {

			$hashtags = explode("%2C", $hashtag);

			$res['data'] = array();


			$i = 0;
			while(sizeof($res['data']) < $count){
				if(($i>0) && (!isset($result[$ht][$i-1]['pagination']['next_url']))) break;
				foreach($hashtags as $ht){

					if($i>0){
						$url = $result[$ht][$i-1]['pagination']['next_url'];
					}else{
						$url = 'https://api.instagram.com/v1/tags/'.$ht.'/media/recent?count='.$count.'&access_token='.$access_token;
					}

					$result[$ht][$i] = rudr_instagram_api_curl_connect($url);

					if (is_null($result[$ht][$i])){
						if (($key = array_search($ht, $hashtags)) !== false) {
						    unset($hashtags[$key]);
						}
					}else{
						foreach ($result[$ht][$i]['data'] as $post) {
							array_push ($res['data'], $post);
						}
					}
				}
				$i++;
			}

			if(is_null($res['data'])) return NULL;

			shuffle_assoc($res['data']);

			$res['data'] = array_slice($res['data'],0,$count);

		  return $res;

    } catch(Exception $e) {
        return $e->getMessage();
    }

}

function get_hash_code($hashtag,$count){

    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    reset($user_option);
    $first_key = key($user_option);
    $access_token = $user_option[$first_key]['access_token'];


    $url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?count='.$count.'&access_token='.$access_token;
    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

        //Data are stored in $data
        $result = json_decode(curl_exec($curl_connection), true);
        $code = $result['meta']['code'];
        curl_close($curl_connection);
        return $code;
    } catch(Exception $e) {
        return $e->getMessage();
    }

}

function get_user($user,$count, $hashtag = ""){

    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    $access_token = $user_option[$user]['access_token'];

		$hashtags = explode(",", $hashtag);

    $url = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$access_token;
		try {

			$result = rudr_instagram_api_curl_connect($url);

			$res = $result;
			$res['data']=array();

			if(!isset($result['data'])) return $res;

			foreach ($result['data'] as $post) {
				if ($hashtag != ""){
					foreach($hashtags as $hash){
						if(in_array($hash,$post["tags"])){
							if(!in_array($post,$res['data'])) array_push ($res['data'], $post);
						}
					}
				}else{
					array_push ($res['data'], $post);
				}
			}


		  if($count>=33 && isset($result['pagination']['next_url'])){
				for($i=1;$i<($count/33);$i++){
				  $result = rudr_instagram_api_curl_connect($result['pagination']['next_url']);
					if(!is_null($result['data'])){
						foreach ($result['data'] as $post) {
							if(count($res['data'])==$count) break;
							if ($hashtag != ""){
								foreach($hashtags as $hash){
									if(in_array($hash,$post["tags"])){
											if(!in_array($post,$res['data'])) array_push ($res['data'], $post);
									}
								}
							}else{
								array_push ($res['data'], $post);
							}
					  }
					}
				}
		  }

		  return $res;

    } catch(Exception $e) {
        return $e->getMessage();
    }

}



function get_user_code($user,$count){

    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    $access_token = $user_option[$user]['access_token'];


    $url = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$access_token;
    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

        //Data are stored in $data
        $result = json_decode(curl_exec($curl_connection), true);
        $code = $result['meta']['code'];
        curl_close($curl_connection);
        return $code;
    } catch(Exception $e) {
        return $e->getMessage();
    }

}
function get_media($user,$media){

	$user_option = get_option('enjoy_instagram_options');
	$user_option = array_filter($user_option);
	$access_token = $user_option[$user]['access_token'];


    $url = 'https://api.instagram.com/v1/media/'.$media.'?access_token='.$access_token;
    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

        //Data are stored in $data
        $result = json_decode(curl_exec($curl_connection), true);
        curl_close($curl_connection);
        return $result;
    } catch(Exception $e) {
        return $e->getMessage();
    }

}
function get_likes($user,$count){

	$user_option = get_option('enjoy_instagram_options');
	$user_option = array_filter($user_option);
	$access_token = $user_option[$user]['access_token'];


	$url = 'https://api.instagram.com/v1/users/self/media/liked?count='.$count.'&access_token='.$access_token;
	try {

		$result = rudr_instagram_api_curl_connect($url);

		$res = $result;
		$res['data']=array();

		if(!isset($result['data'])) return $res;

		foreach ($result['data'] as $post) {
			array_push ($res['data'], $post);
		}


		if($count>=33 && isset($result['pagination']['next_url'])){
			for($i=1;$i<($count/33);$i++){
				$result = rudr_instagram_api_curl_connect($result['pagination']['next_url']);
				if(!is_null($result['data'])){
					foreach ($result['data'] as $post) {
						if(count($res['data'])==$count) break;
						array_push ($res['data'], $post);
					}
				}
			}
		}

		return $res;

	} catch(Exception $e) {
			return $e->getMessage();
	}
}

function get_likes_code($user,$count){
    $user_option = get_option('enjoy_instagram_options');
		$user_option = array_filter($user_option);
    $access_token = $user_option[$user]['access_token'];
    $url = 'https://api.instagram.com/v1/users/self/media/liked?count='.$count.'&access_token='.$access_token;
    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

        //Data are stored in $data
        $result = json_decode(curl_exec($curl_connection), true);
        $code = $result['meta']['code'];
        curl_close($curl_connection);
        return $code;
    } catch(Exception $e) {
        return $e->getMessage();
    }
}
function replace4byte($string) {
    return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
}

function isHttps() {

    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        return true;
    }
}


// Initialize the plugin
add_action( 'plugins_loaded', create_function( '', '$Settings_enjoyinstagram_Plugin = new Settings_enjoyinstagram_Plugin;' ) );

function enjoyinstagram_default_option()
{
		add_option('enjoyinstagram_code_opt', 'true');
		add_option('enjoyinstagram_images_captured', 20);
		add_option('enjoyinstagram_carousel_items_number_default', 4);
    add_option('enjoyinstagram_carousel_animatein_default', 'bounceIn');
    add_option('enjoyinstagram_carousel_animateout_default', 'bounceOut');
    add_option('enjoyinstagram_carousel_link_default', 'swipebox');
		add_option('enjoyinstagram_carousel_link_altro_default', 'http://instagram.com');
    add_option('enjoyinstagram_carousel_navigation_default', 'true');
    add_option('enjoyinstagram_carousel_navigation_prev_default', 'prev');
    add_option('enjoyinstagram_carousel_navigation_next_default', 'next');
    add_option('enjoyinstagram_carousel_autoplay_default', 'true');
    add_option('enjoyinstagram_carousel_autoplay_timeout_default', '3000');
    add_option('enjoyinstagram_carousel_autoplay_speed_default', '3000');
    add_option('enjoyinstagram_carousel_stop_on_hover_default', 'false');
    add_option('enjoyinstagram_carousel_slidespeed_default', '2000');
    add_option('enjoyinstagram_carousel_dots_default', 'true');
    add_option('enjoyinstagram_carousel_loop_default', 'true');
    add_option('enjoyinstagram_carousel_480px_default', '1');
    add_option('enjoyinstagram_carousel_600px_default', '3');
    add_option('enjoyinstagram_carousel_768px_default', '5');
    add_option('enjoyinstagram_carousel_1024px_default', '5');
    add_option('enjoyinstagram_carousel_margin_default', '5');
    add_option('enjoyinstagram_carousel_image_author_default', 'true');
    add_option('enjoyinstagram_carousel_likes_count_default', 'true');
    add_option('enjoyinstagram_carousel_hidebarsmobile_default', 'true');
    add_option('enjoyinstagram_carousel_hidebarsdelay_default', '3000');
    add_option('enjoyinstagram_grid_cols_default', '4');
    add_option('enjoyinstagram_grid_step_default', 'random');
    add_option('enjoyinstagram_grid_animation_default', 'random');
    add_option('enjoyinstagram_grid_animation_speed_default', '500');
    add_option('enjoyinstagram_grid_interval_default', '3000');
    add_option('enjoyinstagram_grid_onhover_default', 'false');
    add_option('enjoyinstagram_grid_rows_480px_default', '2');
    add_option('enjoyinstagram_grid_cols_480px_default', '4');
    add_option('enjoyinstagram_grid_rows_600px_default', '2');
    add_option('enjoyinstagram_grid_cols_600px_default', '4');
    add_option('enjoyinstagram_grid_rows_768px_default', '2');
    add_option('enjoyinstagram_grid_cols_768px_default', '4');
    add_option('enjoyinstagram_grid_rows_1024px_default', '2');
    add_option('enjoyinstagram_grid_cols_1024px_default', '4');
    add_option('enjoyinstagram_grid_link_default', 'swipebox');
    add_option('enjoyinstagram_grid_link_altro_default', '#');
		add_option('enjoyinstagram_grid_margin_default', '3');
    add_option('hashtag_moderate', '');
    add_option('users_moderate', '');
    add_option('enjoyinstagram_carousel_autoreload_default', 'false');
    add_option('enjoyinstagram_carousel_autoreload_value_default', '20000');
    add_option('autoreload_moderate_panel', 'true');
    add_option('enjoyinstagram_images_captured_moderation_panel', 20);
    add_option('autoreload_moderate_panel_value', '30000');

    add_option('enjoyinstagram_polaroid_back_default', 'true');
    add_option('enjoyinstagram_polaroid_link_default', 'swipebox');
    add_option('enjoyinstagram_polaroid_link_altro_default', '#');
    add_option('enjoyinstagram_polaroid_background_default', 'fff');
    add_option('enjoyinstagram_polaroid_border_width_default', '1');
    add_option('enjoyinstagram_polaroid_border_color_default', 'ccc');

    add_option('enjoyinstagram_album_hover_default', 'likes');
    add_option('enjoyinstagram_album_link_default', 'swipebox');
    add_option('enjoyinstagram_album_link_altro_default', 'http://instagram.com');
    add_option('enjoyinstagram_album_random_angle_default', 'true');
    add_option('enjoyinstagram_album_delay_default', '50');
    add_option('enjoyinstagram_album_margin_default', '20');
    add_option('enjoyinstagram_album_animation_in_default', '400');
    add_option('enjoyinstagram_album_animation_out_default', '400');
    update_option('enjoy_instagram_options','');




}

register_activation_hook( __FILE__, 'enjoyinstagram_default_option');

function enjoyinstagram_register_default_moderate_options()
{
    register_setting('enjoyinstagram_options_moderate_default_group', 'hashtag_moderate');
    register_setting('enjoyinstagram_options_moderate_default_group', 'users_moderate');
    register_setting('enjoyinstagram_options_moderate_default_group', 'autoreload_moderate_panel');
    register_setting('enjoyinstagram_options_moderate_default_group', 'enjoyinstagram_images_captured_moderation_panel');
    register_setting('enjoyinstagram_options_moderate_default_group', 'autoreload_moderate_panel_value');

}

add_action ('admin_init', 'enjoyinstagram_register_default_moderate_options');

function enjoyinstagram_register_default_options()
{
		register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_code_opt');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_images_captured');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_rows_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_cols_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_step_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_animation_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_animation_speed_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_interval_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_onhover_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_rows_480px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_cols_480px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_rows_600px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_cols_600px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_cols_768px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_rows_768px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_cols_1024px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_rows_1024px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_link_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_link_altro_default');
		register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_grid_margin_default');

    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_autoreload_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_autoreload_value_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_items_number_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_animatein_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_animateout_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_link_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_link_altro_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_navigation_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_navigation_prev_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_navigation_next_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_autoplay_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_autoplay_timeout_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_autoplay_speed_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_stop_on_hover_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_slidespeed_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_dots_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_loop_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_480px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_600px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_768px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_1024px_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_margin_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_likes_count_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_image_author_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_hidebarsmobile_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_carousel_hidebarsdelay_default');

    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_back_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_link_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_link_altro_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_background_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_border_width_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_polaroid_border_color_default');

    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_hover_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_link_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_link_altro_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_random_angle_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_delay_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_margin_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_animation_in_default');
    register_setting('enjoyinstagram_options_default_group', 'enjoyinstagram_album_animation_out_default');
}

add_action ('admin_init', 'enjoyinstagram_register_default_options');

function aggiungi_script_instafeed_owl() {

 if(!is_admin()) {

   wp_register_script('owl', plugins_url('/js/owl.carousel.min.js', __FILE__), 'jquery');
   wp_register_script('swipebox', plugins_url('/js/jquery.swipebox.min.js', __FILE__), 'jquery', '');
	 wp_register_script('gridrotator', plugins_url('/js/jquery.gridrotator.min.js', __FILE__), 'jquery', '');
	 wp_register_script('modernizr.custom.26633', plugins_url('/js/modernizr.custom.26633.min.js', __FILE__), 'jquery', '');
   wp_register_script('orientationchange', plugins_url('/js/ios-orientationchange-fix.min.js', __FILE__), 'jquery', '');
   wp_register_script('classie', plugins_url('/js/classie.min.js', __FILE__), 'jquery', '');
   wp_register_script('modernizer', plugins_url('/js/modernizr.min.js', __FILE__), 'jquery', '');
   wp_register_script('photostack', plugins_url('/js/photostack.min.js', __FILE__), 'jquery', '');
   wp_register_script('stapel_1', plugins_url('/js/jquery.stapel.min.js', __FILE__), 'jquery', '');
   wp_register_script('stapel_2', plugins_url('/js/modernizr.custom.63321.min.js', __FILE__), 'jquery', '');

   wp_enqueue_script('jquery'); // include jQuery
   wp_enqueue_script('owl');
   wp_enqueue_script('swipebox');
   wp_enqueue_script('modernizr.custom.26633');
   wp_enqueue_script('gridrotator');
	 wp_localize_script('gridrotator', 'GridRotator', array('pluginsUrl' => plugins_url(),));

   wp_enqueue_script('orientationchange');
   wp_enqueue_script('modernizer');
   wp_enqueue_script('classie');
   wp_enqueue_script('photostack');
   wp_enqueue_script('stapel_1');
   wp_enqueue_script('stapel_2');


 }
}

function aggiungi_css_instafeed_owl() {

 if(!is_admin()) {

   wp_register_style('owl_style', plugins_url('/css/owl.carousel.min.css', __FILE__));
   wp_register_style('owl_style_2', plugins_url('/css/owl.theme.min.css', __FILE__));
   wp_register_style('owl_style_default', plugins_url('/css/owl.theme.default.min.css', __FILE__));
   wp_register_style('owl_style_3', plugins_url('/css/owl.transitions.min.css', __FILE__));
   wp_register_style('swipebox_css', plugins_url('/css/swipebox.min.css', __FILE__));
   wp_register_style('grid_fallback', plugins_url('/css/grid_fallback.min.css', __FILE__));
   wp_register_style('grid_style', plugins_url('/css/grid_style.min.css', __FILE__));
   wp_register_style('animate', plugins_url('/css/animate.min.css', __FILE__));
   wp_register_style('accordion', plugins_url('/css/accordion.min.css', __FILE__));
   wp_register_style('component', plugins_url('/css/component.min.css', __FILE__));
   wp_register_style('normalize', plugins_url('/css/normalize.min.css', __FILE__));
   wp_register_style('style_stapel_1', plugins_url('/css/custom_stapel.min.css', __FILE__));
   wp_register_style('style_stapel_3', plugins_url('/css/stapel.min.css', __FILE__));
   wp_register_style('enin_badge', plugins_url('/css/enin-badge.min.css', __FILE__));

   wp_enqueue_style('owl_style');
   wp_enqueue_style('owl_style_default');
   wp_enqueue_style('owl_style_2');
   wp_enqueue_style('owl_style_3');
   wp_enqueue_style('swipebox_css');
   wp_enqueue_style('grid_fallback');
   wp_enqueue_style('grid_style');
   wp_enqueue_style('animate');
   wp_enqueue_style('accordion');
   wp_enqueue_style('component');
   wp_enqueue_style('normalize');
   wp_enqueue_style('style_stapel_1');
   wp_enqueue_style('style_stapel_3');
   wp_enqueue_style('enin_badge');



 }
}

// Code optimization option
if(!get_option('enjoyinstagram_code_opt')){
	add_action( 'wp_enqueue_scripts', 'aggiungi_script_instafeed_owl' );
	add_action( 'wp_enqueue_scripts', 'aggiungi_css_instafeed_owl' );
}

function aggiungi_script_in_admin($hook){

    if( $hook !== 'settings_page_enjoyinstagram_plugin_options' ) {
        return;
    }

        wp_register_script('enjoy_instagram', plugins_url('/js/enjoy_instagram.min.js',__FILE__),'jquery','');

        wp_register_style( 'enjoyinstagram_settings', plugins_url('/css/enjoyinstagram_settings.min.css',__FILE__) );
        wp_register_style( 'accordion', plugins_url('/css/accordion.min.css',__FILE__) );
        wp_register_style( 'style6', plugins_url('/css/style6.min.css',__FILE__) );
		wp_register_style( 'fabio_style', plugins_url('/css/simplegrid.min.css',__FILE__) );
        wp_register_style( 'enjoy_tabs', plugins_url('/css/enjoy_tabs.min.css',__FILE__) );


        wp_enqueue_script('enjoy_instagram');

        wp_enqueue_style( 'enjoyinstagram_settings' );
        wp_enqueue_style( 'accordion' );
        wp_enqueue_style( 'style6' );
		wp_enqueue_style( 'fabio_style' );
         wp_enqueue_style( 'enjoy_tabs' );
}

add_action( 'admin_enqueue_scripts', 'aggiungi_script_in_admin' );
add_action( 'admin_head', 'aggiungo_javascript_styles_in_pannello_amministrazione' );

function aggiungo_javascript_styles_in_pannello_amministrazione() {
 ?>
     <script type="text/javascript">


     function reject(url,id){

        console.log(url);
        jQuery(this).fadeOut();
     }


     jQuery(document).ready(function(){



     jQuery('input[name="enjoyinstagram_carousel_link_default"]').change(function(){
       if(jQuery('input[name="enjoyinstagram_carousel_link_default"]:checked').val() == 'altro'){
           jQuery('#enjoyinstagram_carousel_link_altro_default').fadeIn('slow');
       }else if(jQuery('input[name="enjoyinstagram_carousel_link_default"]:checked').val() != 'altro'){
           jQuery('#enjoyinstagram_carousel_link_altro_default').fadeOut('slow');
       }
     });

     jQuery('input[name="enjoyinstagram_grid_link_default"]').change(function(){
       if(jQuery('input[name="enjoyinstagram_grid_link_default"]:checked').val() == 'altro'){
           jQuery('#enjoyinstagram_grid_link_altro_default').fadeIn('slow');
       }else if(jQuery('input[name="enjoyinstagram_grid_link_default"]:checked').val() != 'altro'){
           jQuery('#enjoyinstagram_grid_link_altro_default').fadeOut('slow');
       }
     });

     jQuery('#enjoyinstagram_carousel_navigation_default').change(function(){
       if(jQuery('#enjoyinstagram_carousel_navigation_default option:selected').val() == 'true'){
           jQuery('#div_text_navigation').fadeIn('slow');
       }else if(jQuery('#enjoyinstagram_carousel_navigation_default option:selected').val() == 'false'){
           jQuery('#div_text_navigation').fadeOut('slow');
       }
     });

     jQuery('#enjoyinstagram_carousel_autoplay_default').change(function(){
       if(jQuery('#enjoyinstagram_carousel_autoplay_default option:selected').val() == 'true'){
           jQuery('#div_autoplay_yes').fadeIn('slow');
       }else if(jQuery('#enjoyinstagram_carousel_autoplay_default option:selected').val() == 'false'){
           jQuery('#div_autoplay_yes').fadeOut('slow');
       }
     });

     jQuery('#button_cancel_add_new_user').click( function(){
   jQuery('#enjoy_accordion_new_user').fadeOut('slow');
   jQuery('#button_add_new_user').fadeIn('slow');
})

jQuery('#button_add_new_user').click(function(){
    jQuery('#enjoy_accordion_new_user').fadeIn('slow');
   jQuery('#button_add_new_user').fadeOut('slow');
})

     });



function post_to_url(path, method) {
					method = method || "get";
					var params = new Array();
					var client_id = 'cac0b53396ee466293d81c8fb86835fe';
					var client_secret = 'this_is_secret';
					params['client_id'] = client_id;
					params['redirect_uri'] = 'http://www.mediabetaprojects.com/put_access_token.php?url_redirect=<?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_general_settings'); ?>';
					params['response_type'] = 'token';
	                params['scope'] = 'public_content';

					var form = document.createElement("form");
					form.setAttribute("method", method);
					form.setAttribute("action", path);

					for(var key in params) {
						if(params.hasOwnProperty(key)) {
							var hiddenField = document.createElement("input");
							hiddenField.setAttribute("type", "hidden");
							hiddenField.setAttribute("name", key);
							hiddenField.setAttribute("value", params[key]);

							form.appendChild(hiddenField);
						 }
					}


						document.body.appendChild(form);
						form.submit();

				}


		</script>
     <style>
.enjoy_accordion dt{
	background:rgba(204,204,204,0.5);
	font-size:1.1rem;
	padding-top:1rem;
	padding-bottom:1rem;
	margin-bottom:1px;
	}
	.enjoy_accordion dt a{
	text-decoration:none; padding:1rem;
	}
	.step_number
	{width: 2rem;
height: 2rem;
border-radius: 1rem;

color: #fff;
line-height: 2rem;
text-align: center;
background: #0074a2;
display:inline-block;
}
.enjoy_accordion {
   margin: 50px;
   dt, dd {
      padding: 10px;
      border: 1px solid black;
      border-bottom: 0;
      &:last-of-type {
        border-bottom: 1px solid black;
      }
      a {
        display: block;
        color: black;
        font-weight: bold;
      }
   }
  dd {
     border-top: 0;
     font-size: 12px;
     &:last-of-type {
       border-top: 1px solid white;
       position: relative;
       top: -1px;
     }
  }
}

.enjoy_open {content: "\f347";}
.enjoy_close {content: "\f343";}
.button_accordion {display:inline-block; float:right; margin-right:1rem;}

#id_add_new_user{
margin:50px;
}
#button_cancel_add_new_user{
background:#EB3840;
border-color:#EB3840;
}
#dt_cance_add_new_user{
background: none;
}
</style>
<?php
}

  function add_in_table_thumb($image_id,$image_link,$image_url,$thumb_url,$type,$user,$hashtag,$caption,$likes,$author,$author_image,$author_url,$moderate,$timestamp){
    global $wpdb;
    $check_id = $wpdb->get_results($wpdb->prepare(
        "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_table WHERE image_id = ('%s')",
        $image_id));
    if(!$check_id){
        $wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix . "enjoy_instagram_table (`id`, `image_id`, `image_link`, `image_url`,`thumb_url`, `type`, `user`, `hashtag`, `caption`, `likes`, `author`, `author_image`, `author_url`,`moderate`, `timestamp`) VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            array(
            $image_id,
            $image_link,
            $image_url,
            $thumb_url,
            $type,
            $user,
            $hashtag,
            $caption,
            $likes,
            $author,
            $author_image,
            $author_url,
            $moderate,
            $timestamp
            )
        ));


    }else{

    $wpdb->query($wpdb->prepare(
        "UPDATE  ".$wpdb->prefix . "enjoy_instagram_table SET  likes =  %s WHERE  image_id =%s",
        $likes,
        $image_id
        ));

    }

}

function add_in_table($image_id,$image_link,$image_url,$type,$user,$hashtag,$caption,$likes,$author,$author_image,$author_url,$moderate,$timestamp){
    global $wpdb;
    $check_id = $wpdb->get_results($wpdb->prepare(
        "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_table WHERE image_id = ('%s')",
        $image_id
        ));
    if(!$check_id){
        $wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix . "enjoy_instagram_table (`id`, `image_id`, `image_link`, `image_url`, `type`, `user`, `hashtag`, `caption`, `likes`, `author`, `author_image`, `author_url`,`moderate`, `timestamp`) VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
        array(
            $image_id,
            $image_link,
            $image_url,
            $type,
            $user,
            $hashtag,
            $caption,
            $likes,
            $author,
            $author_image,
            $author_url,
            $moderate,
            $timestamp
        )
            ));


    }else{

    $wpdb->query($wpdb->prepare(
        "UPDATE  ".$wpdb->prefix . "enjoy_instagram_table SET  likes =  %s WHERE  image_id =%s",
        $likes,
        $image_id
        ));

    }

}

function read_table($type,$user,$hashtag,$moderate){
global $wpdb;
$result = '';


    if($moderate=='false'){
    $images = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_table where type = %s and user = %s and hashtag = %s",
        $type,
        $user,
        $hashtag
        ));

   foreach($images as $img){

       //$result[] = (object) array('link' => $img->image_link,'images->standard_resolution->url' => $img->image_url);
       $result[] = array(
           'link'=> $img->image_link,
           'images' => array (
               'standard_resolution' => array(
                   'url' => $img->image_url
               )
           ),
           'caption' => array(
               'text' => $img->caption
           ),
           'likes' => array(
               'count' => $img->likes
           ),
           'user' => array(
               'username' => $img->author,
               'profile_picture' => $img->author_image
           )
       );
   }

}
else
    if($moderate == 'true'){

				$query_str = "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_table inner join ".$wpdb->prefix . "enjoy_instagram_moderate_accepted on ".$wpdb->prefix . "enjoy_instagram_table.image_id = ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.image_id  where ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.type = %s and ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.user = %s and ";
				$query_args = array($type,$user);
				$hashtags = explode(',',$hashtag);

				foreach($hashtags as $ht){
				  $query_str .= $wpdb->prefix . "enjoy_instagram_moderate_accepted.hashtag = %s OR ";
					array_push($query_args,$ht);
				}
				$query_str .= " 1=2 ";

        $images = $wpdb->get_results($wpdb->prepare(
            $query_str, $query_args));

        foreach($images as $img){

       $result[] = array(
           'link'=> $img->image_link,
           'images' => array (
               'standard_resolution' => array(
                   'url' => $img->image_url
               )
           ),
           'caption' => array(
               'text' => $img->caption
           ),
           'likes' => array(
               'count' => $img->likes
           ),
           'user' => array(
               'username' => $img->author,
               'profile_picture' => $img->author_image
           )
       );
   }
    }
return $result;

}

function read_table_thumb($type,$user,$hashtag,$moderate){

global $wpdb;
$result = '';


    if($moderate=='false'){
    $images = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_table where type = %s and user = %s and hashtag = %s",
        $type,
        $user,
        $hashtag

        ));

   foreach($images as $img){

       $result[] = array(
           'link'=> $img->image_link,
           'images' => array (
               'standard_resolution' => array(
                   'url' => $img->image_url
               ),
               'thumbnail' => array(
                   'url' => $img->thumbnail
               )
           ),
           'caption' => array(
               'text' => $img->caption
           ),
           'likes' => array(
               'count' => $img->likes
           ),
           'user' => array(
               'username' => $img->author,
               'profile_picture' => $img->author_image
           )
       );
   }

}
else
    if($moderate == 'true'){
        $images = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_table inner join ".$wpdb->prefix . "enjoy_instagram_moderate_accepted on ".$wpdb->prefix . "enjoy_instagram_table.image_id = ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.image_id  where ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.type = %s and ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.user = %s and ".$wpdb->prefix . "enjoy_instagram_moderate_accepted.hashtag = %s",
            $type,
            $user,
            $hashtag
            ));

        foreach($images as $img){

       $result[] = array(
           'link'=> $img->image_link,
           'images' => array (
               'standard_resolution' => array(
                   'url' => $img->image_url
               ),
               'thumbnail' => array(
                   'url' => $img->thumbnail
               )
           ),
           'caption' => array(
               'text' => $img->caption
           ),
           'likes' => array(
               'count' => $img->likes
           ),
           'user' => array(
               'username' => $img->author,
               'profile_picture' => $img->author_image
           )
       );
   }
    }
return $result;

}

function funzioni_in_head() {
   ?>
   <script type="text/javascript">

		jQuery(function(){
		  jQuery(document.body)
			  .on('click touchend','#swipebox-slider .current img', function(e){
				  jQuery('#swipebox-next').click();
				  return false;
			  })
				.on('click touchend','video', function(e){
					jQuery('video').play();
					return false;
			  })
			  .on('click touchend','#swipebox-slider .current', function(e){
				  jQuery('#swipebox-close').trigger('click');
			  });

		});
                /* ridimensionamento immagine profilo in badge */
                jQuery(document).ready(function(){
                  jQuery('#div_shortcode_badge #badge_image_profile').height(jQuery('#div_shortcode_badge #badge_image_profile').width());
                  jQuery('#div_shortcode_badge_widget #badge_image_profile').height(jQuery('#div_shortcode_badge_widget #badge_image_profile').width());

                });
               jQuery( window ).resize(function() {
  jQuery('#div_shortcode_badge #badge_image_profile').height(jQuery('#div_shortcode_badge #badge_image_profile').width());
  jQuery('#div_shortcode_badge_widget #badge_image_profile').height(jQuery('#div_shortcode_badge_widget #badge_image_profile').width());

});

//Grid displaying after loading of images
	function display_grid(){
		jQuery('[id^="ei-grid-loading-"]').hide();
		jQuery('[id^="ei-grid-list-"]').show();
	}

	window.onload = display_grid;


</script>
   <?php




}


add_action('wp_head', 'funzioni_in_head');

function enjoyinstagram_plugin_settings_link($links) {
		  $settings_link = '<a href="options-general.php?page=enjoyinstagram_plugin_options">' . __( 'Settings' ) . '</a>';
		  $widgets_link = '<a href="widgets.php">' . __( 'Widgets' ) . '</a>';
		  $premium_link = '<a href="http://www.mediabeta.com/enjoy-instagram/">' . __( 'Premium Version' ) . '</a>';
		  array_push($links, $settings_link);
		  array_push($links, $widgets_link);
		  array_push($links, $premium_link);
		  return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'enjoyinstagram_plugin_settings_link');


add_action( 'admin_footer', 'add_option_client_ajax' );

function add_option_client_ajax() {
?>
<script type="text/javascript" >

jQuery('#button_autorizza_instagram').click(function() {

	var client_id = 'cac0b53396ee466293d81c8fb86835fe';
	var client_secret = 'this_is_secret';
	var data = {
		action: 'user_option_ajax',
		client_id_value: client_id,
		client_secret_value: client_secret
	};


	jQuery.post(ajaxurl, data, function(response) {
		post_to_url('https://api.instagram.com/oauth/authorize/','get');
	});

});
</script>
<?php
}

add_action( 'admin_footer', 'moderation_reject_image');

function moderation_reject_image(){
    ?>
<script type="text/javascript">
jQuery(document).on("click",".info_reject", function() {

        var id = jQuery(this).attr('data-link-id');
        var link = jQuery(this).attr('data-link');
        var value = jQuery(this).attr('data-value');
        var image = jQuery(this).attr('data-link-image');
        var type = jQuery(this).attr('data-moderate-type');
        var from =  jQuery(this).attr('data-from');

        var data = {
		action: 'moderation_reject_image_ajax',
		id: id,
		link: link,
                value: value,
                image: image,
                type: type,
                from: from
	};


	jQuery.post(ajaxurl, data, function(response) {
        jQuery('#tab_moderation_rejected').html(response);
        var images_rejected = jQuery('#count_rejected').text();
        images_rejected = parseInt(images_rejected) +1;
        jQuery('#count_rejected').text(images_rejected);
        if(from=='approved'){
        var images_accepted = jQuery('#count_accepted').text();
        images_accepted = parseInt(images_accepted) - 1;
        jQuery('#count_accepted').text(images_accepted);
        }

    });


        if(from=='approved'){
        jQuery('#approved_'+id).fadeOut('slow', function() { jQuery('#approved_' + id).remove(); });
        }else{
        jQuery('#main_'+id).fadeOut('slow', function() { jQuery('#main_' + id).remove(); });
        }
	return false;
	});
</script>
<?php
}

add_action( 'wp_ajax_moderation_reject_image_ajax', 'moderation_reject_image_ajax_callback' );

function moderation_reject_image_ajax_callback() {
	global $wpdb;

	$id = $_POST['id'];
        $link = $_POST['link'];
        $value = $_POST['value'];
        $image = $_POST['image'];
        $type= $_POST['type'];
        $from = $_POST['from'];





$check_reject_image = $wpdb->get_results($wpdb->prepare(
    "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE image_id = '%s' AND ".$type." = '%s' ",
    array(
        $id,
        $value
    )
));

if(!$check_reject_image){
    if($type=='user'){
$wpdb->query($wpdb->prepare(
    "INSERT INTO ".$wpdb->prefix . "enjoy_instagram_moderate_rejected (id, image_id, image_link, image_url, type, user, hashtag) VALUES (NULL, %s, %s, %s,%s, %s, '');",
array(
    $id,
    $link,
    $image,
    $type,
    $value
)
    ));

    }
    else if($type=='hashtag'){
$wpdb->query($wpdb->prepare(
    "INSERT INTO ".$wpdb->prefix . "enjoy_instagram_moderate_rejected (id, image_id, image_link, image_url, type, user, hashtag) VALUES (NULL, %s, %s, %s,%s, '', %s);",
array(
    $id,
    $link,
    $image,
    $type,
    $value
)
));
    }
$wpdb->query($wpdb->prepare(
    "DELETE FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE image_id = ('%s') AND type = '%s' ",
    array(
        $id,
    $type
    )
));
?>
<div class="display_content_tabs">

 <?php

 $array_rejected = $wpdb->get_results($wpdb->prepare(
     "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE type= ('%s') AND ".$type." = '%s' ",
     array(
         $type,
     $value
     )
     ));
 foreach ($array_rejected as $entry) { ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="rejected_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_accept" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="rejected">APPROVE</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>

				</div>
<?php

}




	die();
}

add_action( 'admin_footer', 'moderation_approve_image');

function moderation_approve_image(){
    ?>
<script type="text/javascript">
jQuery(document).on("click",".info_accept", function() {

        var id = jQuery(this).attr('data-link-id');
        var link = jQuery(this).attr('data-link');
        var value = jQuery(this).attr('data-value');
        var image = jQuery(this).attr('data-link-image');
        var type = jQuery(this).attr('data-moderate-type');
        var from =  jQuery(this).attr('data-from');

        var data = {
		action: 'moderation_approve_image_ajax',
		id: id,
		link: link,
                value: value,
                image: image,
                type: type,
                from: from
	};


	jQuery.post(ajaxurl, data, function(response) {
            jQuery('#tab_moderation_accepted').html(response);
        var images_approved = jQuery('#count_accepted').text();
        images_approved = parseInt(images_approved) +1;
        jQuery('#count_accepted').text(images_approved);
        if(from=='rejected'){
        var images_rejected = jQuery('#count_rejected').text();
        images_rejected = parseInt(images_rejected) - 1;
        jQuery('#count_rejected').text(images_rejected);
        }

    });


        if(from=='rejected'){
        jQuery('#rejected_'+id).fadeOut('slow', function() { jQuery('#rejected_' + id).remove(); });
        }else{
        jQuery('#main_'+id).fadeOut('slow', function() { jQuery('#main_' + id).remove(); });
        }
        return false;
	});
</script>
<?php
}

add_action( 'wp_ajax_moderation_approve_image_ajax', 'moderation_approve_image_ajax_callback' );

function moderation_approve_image_ajax_callback() {
	global $wpdb;

	$id = $_POST['id'];
        $link = $_POST['link'];
        $value = $_POST['value'];
        $image = $_POST['image'];
        $type= $_POST['type'];
        $from = $_POST['from'];





$check_approved_image = $wpdb->get_results($wpdb->prepare(
    "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE image_id = '%s' AND ".$type." = '%s'",
    array(
        $id,
    $value
    )

));

if(!$check_approved_image){
    if($type=='user'){
$wpdb->query($wpdb->prepare(
    "INSERT INTO ".$wpdb->prefix . "enjoy_instagram_moderate_accepted (id, image_id, image_link, image_url, type, user, hashtag) VALUES (NULL, %s, %s, %s,%s, %s, '');",
array(
    $id,
    $link,
    $image,
    $type,
    $value
)
));

    }
    else if($type=='hashtag'){
$wpdb->query($wpdb->prepare(
    "INSERT INTO ".$wpdb->prefix . "enjoy_instagram_moderate_accepted (id, image_id, image_link, image_url, type, user, hashtag) VALUES (NULL, %s, %s, %s,%s, '', %s);",
array(
    $id,
    $link,
    $image,
    $type,
    $value
)
    ));
    }
$wpdb->query($wpdb->prepare(
    "DELETE FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE image_id = '%s' AND ".$type." = '%s'",
    array(
        $id,
    $value
    )
));

?>
<!-- <div id="tab_reject_<?php echo $value; ?>"> -->
    <div class="display_content_tabs">
 <?php

 $array_accepted = $wpdb->get_results($wpdb->prepare(
     "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type=('%s') AND ".$type." LIKE '%s'",
     array(
         $type,
     $value
     )
     ));
 foreach ($array_accepted as $entry) { ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="approved_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="approved">REJECT</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>

    </div>

<!-- </div>-->
<?php

}




	die();
}


/* LOAD MODERATION STREAM */


add_action( 'admin_footer', 'load_moderation_stream');

function load_moderation_stream(){
    $autoreload = get_option('autoreload_moderate_panel');
    $autoreload_value = get_option('autoreload_moderate_panel_value');
    ?>
<script type="text/javascript">
jQuery(document).on("click",".moderate_link", function () {


        var type = jQuery(this).attr('data-type');
        var value = jQuery(this).attr('id');
        var autoreload = '<?php echo $autoreload; ?>';
        var autoreload_value = '<?php echo $autoreload_value; ?>';

        var data = {
		action: 'load_moderation_stream_ajax',
		value: value,
                type: type
        };



	jQuery.post(ajaxurl, data, function(response) {


jQuery('#load_moderation_subpanel').html(response);
jQuery('.content').height(jQuery('.display_content_tabs').height());

if(autoreload == 'true'){
var value_reload = value.replace('moderate_link_','');
	reload_moderation_panel(type,value_reload,autoreload_value);
 }


console.log(jQuery("#ancora").offset().top);




    });

       jQuery('body').animate({ scrollTop: jQuery("#ancora").offset().top}, 1000);
      return false;

	});




</script>
<?php
}

add_action( 'wp_ajax_load_moderation_stream_ajax', 'load_moderation_stream_ajax_callback' );

function load_moderation_stream_ajax_callback() {
	global $wpdb;

        $value = $_POST['value'];
        $type = $_POST['type'];
        $value = str_replace('moderate_link_','',$value);


        ?>
<div id="reload_tabs_enjoy_<?php echo $value; ?>">

 <div id="id_tabs_enjoy_<?php echo $value; ?>">
          <?php
$array_utenti = get_option('enjoy_instagram_options');


    $arrayValues = array($type,$value);
    $array_accepted = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type= ('%s') AND ".$type." LIKE '%s'",
    $arrayValues

));

    $array_rejected = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE type= ('%s') AND ".$type." = '%s'", $arrayValues

));

if($type == 'user'){
    $prefix = '@';
}else if($type == 'hashtag'){
    $prefix = '#';
}

?>




            <section class="enjoy_tabs">
	            <input id="enjoy_tab-1" type="radio" name="radio-set" class="enjoy_tab-selector-1" checked="checked" />
		        <label for="enjoy_tab-1" class="enjoy_tab-label-1"><?php echo $prefix.$value; ?> - Moderation</label>

	            <input id="enjoy_tab-2" type="radio" name="radio-set" class="enjoy_tab-selector-2" />
		        <label for="enjoy_tab-2" class="enjoy_tab-label-2"><?php echo $prefix.$value; ?> - Approved <span id="count_accepted"><?php echo $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='".$type."' AND ".$type." = '".$value."'" ); ?></span></label>

	            <input id="enjoy_tab-3" type="radio" name="radio-set" class="enjoy_tab-selector-3" />
		        <label for="enjoy_tab-3" class="enjoy_tab-label-3"><?php echo $prefix.$value; ?> - Rejected <span id="count_rejected"><?php echo $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE type='".$type."' AND ".$type." = '".$value."'" ); ?></span></label>

                        <div class="clear-shadow"></div>

		        <div class="content">
                            <div class="content-1" id="tab_moderation_stream">
                                <div class="display_content_tabs">

		<?php

foreach ($array_utenti as $singolo_utente){
    if($singolo_utente['username']!=''){
        $singolo_utente_moderate = $singolo_utente['username'];
    }
}

if($type=='user'){
    $result = get_user($value,get_option('enjoyinstagram_images_captured_moderation_panel'));
}else if($type == 'hashtag')
{
    $result = get_hash($value,get_option('enjoyinstagram_images_captured_moderation_panel'));

}

?>

                                <?php



if(is_array($result['data']) && count($result['data'])>0){


		$images_captured = get_option('enjoyinstagram_images_captured_moderation_panel');

		$result = $result['data'];


		foreach ($result as $entry) {

		    if (isHttps()) {
		        if($entry['images']){
		            $entry['link'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url'] );

		        }
		    }

		     if (!check_status_moderate_rejected($entry['id'],$type,$value) && !check_status_moderate_accepted($entry['id'],$type,$value)) {
							     ?>

							                                <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="main_<?php echo $entry['id']; ?>">
							                      <img src="<?php echo $entry['images']['standard_resolution']['url']; ?>" width="280" height="280"/>
							                    <div class="mask">

							<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry['id']; ?>" data-link="<?php echo $entry['link']; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry['images']['standard_resolution']['url']; ?>" data-from="">REJECT</a>

							<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry['id']; ?>" data-link="<?php echo $entry['link']; ?>" class="info info_accept" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry['images']['standard_resolution']['url']; ?>" data-from="">APPROVE</a>

							<a href="<?php echo $entry['link']; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
							                    </div>
							                </div>
							 <?php
				}
			}
}

 ?>
                                </div>
                            </div>


                            <div class="content-2" id="tab_moderation_accepted">
                                <div class="display_content_tabs">

                                     <?php


 foreach ($array_accepted as $entry) {
     if (isHttps()) {

         $entry->image_url = str_replace('http://', 'https://', $entry->image_url);
         $entry->image_link = str_replace('http://', 'https://', $entry->image_link);
     }

     ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="approved_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="approved">REJECT</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>
                                </div>



						</div>

                            <div class="content-3" id="tab_moderation_rejected">
                                    <div class="display_content_tabs">
                                <?php foreach ($array_rejected as $entry) {
        if (isHttps()) {
            if($entry->images){
                $url_image = $entry->images->standard_resolution->url;
            }
            $url_image = str_replace('http://', 'https://', $url_image);
        $entry['image_url'] = str_replace('http://', 'https://', $entry->image_url);
            $entry['image_link'] = str_replace('http://', 'https://', $entry->image_link);
        }
                                            ?>
                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="rejected_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_url; ?>" class="info info_accept" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="rejected">APPROVE</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>

                                </div></div>
                                     <?php

 foreach ($array_accepted as $entry) {

     if (isHttps()) {
         $entry->image_link = str_replace('http://', 'https://', $entry->image_link);
         $entry->image_url = str_replace('http://', 'https://', $entry->image_url);
     }

     ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="approved_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="approved">REJECT</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>
                                    </div>
						</div>

		        </div>
			</section>


      </div>
</div>



          <?php


	die();
}

/* LOAD MODERATION STEAM END */




/* RELOAD MODERATION STREAM */


add_action( 'admin_footer', 'reload_moderation_stream');

function reload_moderation_stream(){
    ?>
<script type="text/javascript">
function reload_moderation_panel(type,value,autoreload_value){

    var data = {
		action: 'reload_moderation_stream_ajax',
		value: value,
                type: type
        };

     jQuery.post(ajaxurl, data, function(response) {
     jQuery('#load_moderation_subpanel').hide().html(response).fadeIn();
     jQuery('.content').height(jQuery('.display_content_tabs').height());
     setTimeout(function(){
     var reload_value =  (jQuery('div[id^="reload_tabs_enjoy_"]').attr('id')).replace('reload_tabs_enjoy_','');

     //console.log(reload_value);
     //console.log(autoreload_value);
        if(reload_value == value){
         reload_moderation_panel(type,value,autoreload_value);
     }
     },autoreload_value);
     });


}
</script>
<?php
}

add_action( 'wp_ajax_reload_moderation_stream_ajax', 'reload_moderation_stream_ajax_callback' );

function reload_moderation_stream_ajax_callback() {
	global $wpdb;

        $value = $_POST['value'];
        $type = $_POST['type'];

        ?>
<div id="reload_tabs_enjoy_<?php echo $value; ?>">

 <div id="id_tabs_enjoy_<?php echo $value; ?>">
          <?php
$array_utenti = get_option('enjoy_instagram_options');
    $arrayValues = array($type,$value);
$array_accepted = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type= ('%s') AND ".$type." LIKE '%s' ",
    $arrayValues
));


$array_rejected = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE type= ('%s') AND ".$type." LIKE '%s' ",
    $arrayValues

));

if($type == 'user'){
    $prefix = '@';
}else if($type == 'hashtag'){
    $prefix = '#';
}

?>




            <section class="enjoy_tabs">
	            <input id="enjoy_tab-1" type="radio" name="radio-set" class="enjoy_tab-selector-1" checked="checked" />
		        <label for="enjoy_tab-1" class="enjoy_tab-label-1"><?php echo $prefix.$value; ?> - Moderation</label>

	            <input id="enjoy_tab-2" type="radio" name="radio-set" class="enjoy_tab-selector-2" />
		        <label for="enjoy_tab-2" class="enjoy_tab-label-2"><?php echo $prefix.$value; ?> - Approved <span id="count_accepted"><?php echo $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='".$type."' AND ".$type." = '".$value."'" ); ?></span></label>

	            <input id="enjoy_tab-3" type="radio" name="radio-set" class="enjoy_tab-selector-3" />
		        <label for="enjoy_tab-3" class="enjoy_tab-label-3"><?php echo $prefix.$value; ?> - Rejected <span id="count_rejected"><?php echo $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE type='".$type."' AND ".$type." = '".$value."'" ); ?></span></label>

                        <div class="clear-shadow"></div>

		        <div class="content">
                            <div class="content-1" id="tab_moderation_stream">
                                <div class="display_content_tabs">

		<?php

foreach ($array_utenti as $singolo_utente){
    if($singolo_utente['username']!=''){
        $singolo_utente_moderate = $singolo_utente['username'];
    }
}

if($type=='user'){
    $result = get_user($value,get_option('enjoyinstagram_images_captured_moderation_panel'));
}
else if($type == 'hashtag')
{
    $result = get_hash($value,get_option('enjoyinstagram_images_captured_moderation_panel'));

}
?>

                                <?php
if(is_array($result['data']) && count($result['data'])>0){

		$result = $result['data'];

		$images_captured = get_option('enjoyinstagram_images_captured_moderation_panel');


		foreach ($result as $entry) {


	    if (isHttps()) {
	        $entry['images']['standard_resolution']['link'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);
	        $entry['link'] = str_replace('http://', 'https://', $entry['link']);
	    }


	     if (!check_status_moderate_rejected($entry['id'],$type,$value) && !check_status_moderate_accepted($entry['id'],$type,$value)) {
				     ?>


				                                <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="main_<?php echo $entry['id']; ?>">
				                      <img src="<?php echo $entry['images']['standard_resolution']['url']; ?>" width="280" height="280"/>
				                    <div class="mask">

				<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry['id']; ?>" data-link="<?php echo $entry['link']; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry['images']['standard_resolution']['url']; ?>" data-from="">REJECT</a>

				<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry['id']; ?>" data-link="<?php echo $entry['link']; ?>" class="info info_accept" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry['images']['standard_resolution']['url']; ?>" data-from="">APPROVE</a>

				<a href="<?php echo $entry['link']; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
				                    </div>
				                </div>
	 											<?php
				}
		}
}
 ?>
                                </div>
                            </div>


                            <div class="content-2" id="tab_moderation_accepted">
                                <div class="display_content_tabs">

                                     <?php

 foreach ($array_accepted as $entry) {

     if (isHttps()) {
     $entry->image_url = str_replace('http://', 'https://', $entry->image_url);
         $entry->image_link = str_replace('http://', 'https://', $entry->image_link);
     }
     ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="approved_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="approved">REJECT</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>
                                </div>

                                      <!-- </div> -->


                                <!-- </div> -->
						</div>

                            <div class="content-3" id="tab_moderation_rejected">
                                    <div class="display_content_tabs">
                                <?php foreach ($array_rejected as $entry) {
        if (isHttps()) {
        $entry->image_url = str_replace('http://', 'https://', $entry->image_url);
        $entry->image_link = str_replace('http://', 'https://', $entry->image_link);
        }
        ?>

                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="rejected_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->id; ?>" data-link="<?php echo $entry->link; ?>" class="info info_accept" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->images->standard_resolution->url; ?>" data-from="rejected">APPROVE</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>

                                </div></div>
                                     <?php

 foreach ($array_accepted as $entry) {

     if (isHttps()) {
         $entry->image_url = str_replace('http://', 'https://', $entry->image_url);
         $entry->image_link = str_replace('http://', 'https://', $entry->image_link);
     }

     ?>


                     <div class="enjoyinstagram_view enjoyinstagram_view-sixth" id="approved_<?php echo $entry->image_id; ?>">
                      <img src="<?php echo $entry->image_url; ?>" width="280" height="280"/>
                    <div class="mask">
<a href="#" data-moderate-type="<?php echo $type; ?>" data-link-id="<?php echo $entry->image_id; ?>" data-link="<?php echo $entry->image_link; ?>" class="info info_reject" data-value="<?php echo $value; ?>" data-link-image="<?php echo $entry->image_url; ?>" data-from="approved">REJECT</a>
<a href="<?php echo $entry->image_link; ?>" target="_blank" class="info">VIEW ON INSTAGRAM</a>
                    </div>
                </div>
 <?php } ?>
                                    </div>
						</div>

		        </div>
			</section>


      </div>
</div>
          <?php


	die();
}

/* RELOAD MODERATION STEAM END */





add_action( 'wp_ajax_user_option_ajax', 'user_option_ajax_callback' );

function user_option_ajax_callback() {
	global $wpdb;

	$client_id = $_POST['client_id_value'];
$client_secret = $_POST['client_secret_value'];
echo $client_id."<br />".$client_secret;
update_option( 'enjoyinstagram_client_id', $client_id );
update_option( 'enjoyinstagram_client_secret', $client_secret );

	die();
}


add_action( 'admin_footer', 'logout_client_ajax' );

function logout_client_ajax() {
?>
<script type="text/javascript" >

jQuery('.button_logout').click(function() {
        var id_utente = jQuery(this).attr('id').replace('button_logout_','');

	var data = {
		action: 'user_logout_ajax',
                id_utente: id_utente
	};


	jQuery.post(ajaxurl, data, function(response) {
        location.href = '<?php echo get_admin_url(); ?>options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_general_settings';
	});
});
</script>
<?php
}

add_action( 'wp_ajax_user_logout_ajax', 'user_logout_ajax_callback' );

function user_logout_ajax_callback() {
	global $wpdb;
        $id_utente = $_POST['id_utente'];
        $array_utenti = get_option('enjoy_instagram_options');
        foreach($array_utenti as $singolo_utente){
            if(in_array($id_utente,$singolo_utente)){

                $username = $singolo_utente['username'];


            }
        }

        unset($array_utenti[$username]);
        update_option('enjoy_instagram_options',$array_utenti);
	die();
}



// create table on plugin activation

function enjoy_instagram_table_rejected() {
   global $wpdb;

	 $sql = '';

	 $table_name = $wpdb->prefix . "enjoy_instagram_moderate_rejected";
	 if($wpdb->get_var("show tables like '$table_name'") != $table_name){
	   $sql = "CREATE TABLE $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  image_id  varchar(225) DEFAULT '' NOT NULL,
	  image_link varchar(225) DEFAULT '' NOT NULL,
	  image_url varchar(225) DEFAULT '' NOT NULL,
	  type varchar(225) DEFAULT '' NOT NULL,
	  user varchar(225) DEFAULT '' NOT NULL,
	  hashtag varchar(225) DEFAULT '' NOT NULL,
	  UNIQUE KEY id (id)
	    );";
		}

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );

}

register_activation_hook( __FILE__, 'enjoy_instagram_table_rejected' );

function enjoy_instagram_table() {
   global $wpdb;

	 $sql = '';

   $table_name = $wpdb->prefix . "enjoy_instagram_table";
      if($wpdb->get_var("show tables like '$table_name'") != $table_name)
	{
   $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  image_id  varchar(225) DEFAULT '' NOT NULL,
  image_link varchar(225) DEFAULT '' NOT NULL,
  image_url varchar(225) DEFAULT '' NOT NULL,
  type varchar(225) DEFAULT '' NOT NULL,
  user varchar(225) DEFAULT '' NOT NULL,
  hashtag varchar(225) DEFAULT '' NOT NULL,
  caption varchar(225) DEFAULT '' NOT NULL,
  likes varchar(225) DEFAULT '' NOT NULL,
  author varchar(225) DEFAULT '' NOT NULL,
  author_image varchar(225) DEFAULT '' NOT NULL,
  author_url varchar(225) DEFAULT '' NOT NULL,
  moderate varchar(225) DEFAULT '' NOT NULL,
  timestamp varchar(225) DEFAULT '' NOT NULL,
  UNIQUE KEY id (id)
    );";
        }

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );

}

register_activation_hook( __FILE__, 'enjoy_instagram_table' );


function enjoy_instagram_table_accepted() {
   global $wpdb;

	 $sql = '';

   $table_name = $wpdb->prefix . "enjoy_instagram_moderate_accepted";
      if($wpdb->get_var("show tables like '$table_name'") != $table_name)
	{
   $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  image_id  varchar(225) DEFAULT '' NOT NULL,
  image_link varchar(225) DEFAULT '' NOT NULL,
  image_url varchar(225) DEFAULT '' NOT NULL,
  type varchar(225) DEFAULT '' NOT NULL,
  user varchar(225) DEFAULT '' NOT NULL,
  hashtag varchar(225) DEFAULT '' NOT NULL,
  UNIQUE KEY id (id)
    );";
        }

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );

}

register_activation_hook( __FILE__, 'enjoy_instagram_table_accepted' );

function check_status_moderate($id,$type,$value){
    global $wpdb;
    $check_in_rejected = $wpdb->get_results($wpdb->prepare(
        "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE image_id = ('%s') AND type = '%s' ",
        $id,
        $type,
        $value
        ));
    if(!$check_in_rejected){
        return true;
    }else{
        return false;
    }
}

function check_status_moderate_rejected($id,$type,$value){
    global $wpdb;
    $check_in_rejected = $wpdb->get_results($wpdb->prepare(
        "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_rejected WHERE image_id = ('%s')  AND type = '%s' ",
        $id,
        $type,
        $value
        ));
    if($check_in_rejected){
        return true;
    }else{
        return false;
    }
}

function check_status_moderate_accepted($id,$type,$value){
    global $wpdb;



    $check_in_accepted = $wpdb->get_results($wpdb->prepare(
        "SELECT id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE image_id = ('%s')  AND type = '%s' ",
        $id,
        $type,
        $value
        ));
    if($check_in_accepted){
        return true;
    }else{
        return false;
    }
}

include_once ('tinymce/tinymce.php');
require_once ('tinymce/ajax.php');

require_once('library/widgets.php');
require_once('library/widgets_grid.php');
require_once('library/widgets_album.php');
require_once('library/widgets_badge.php');
require_once('library/enjoyinstagram_shortcode_grid.php');
require_once('library/enjoyinstagram_shortcode_widget.php');
require_once('library/enjoyinstagram_shortcode_grid_widget.php');
require_once('library/enjoyinstagram_shortcode_polaroid.php');
require_once('library/enjoyinstagram_shortcode_stapel.php'); //album
require_once('library/enjoyinstagram_shortcode_album_widget.php');
require_once('library/enjoyinstagram_shortcode_badge.php');
require_once('library/enjoyinstagram_shortcode_badge_widget.php');

//to avoid above-the-fold blocking js

function defer_parsing_of_js ( $url ) {
		if ( FALSE === strpos( $url, '.js' )) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
		if ( FALSE === strpos($url, 'plugins/enjoy-instagram-premium')) return $url;
return "$url' defer '";
}

//Conditionally add script in case of widget
//var_dump($widgets);
$widgets = wp_get_sidebars_widgets();

if(!empty($widgets)){
	foreach($widgets as $widget){
		//var_dump($widget);
		if(!empty($widget) && strpos($widget[0],'enjoyinstagram_widget') !== false){
			add_action( 'wp_enqueue_scripts', 'aggiungi_script_instafeed_owl' );
			break;
		}
	}
}

//Conditionally add script in case of shortcode
add_filter('the_posts', 'conditionally_add_scripts_and_styles');

function conditionally_add_scripts_and_styles($posts){
	if (empty($posts)) return $posts;

	foreach ($posts as $post) {
		if (stripos($post->post_content, '[enjoyinstagram_polaroid') !== false) {
				add_action( 'wp_enqueue_scripts', 'aggiungi_script_instafeed_owl' );
				add_action( 'wp_enqueue_scripts', 'aggiungi_css_instafeed_owl' );
				break;
		}else{
			if ((stripos($post->post_content, '[enjoyinstagram_') !== false)) {
				add_action( 'wp_enqueue_scripts', 'aggiungi_script_instafeed_owl' );
				add_action( 'get_footer', 'aggiungi_css_instafeed_owl' );
				add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
				break;
			}
		}
	}
	return $posts;
}

?>
