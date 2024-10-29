<?php
/**
 * admin_menu.php
 *
 * @package  Notifications system
 * @author   starcoklat
 */
if (!defined('ABSPATH')) {
    exit;
}

function apkwp_notifications_admin_main_menu_scr() {
//    $icn = get_bloginfo('template_url') . '/includes/functions/admin_menu/images/notification-logo.png';
    $capability = 10;

    add_menu_page(__('apkwp'), __('apkwp', 'notificationssend'), $capability, "apkwp_menu", 'apkwp_general_overview', "dashicons-smartphone", null, 0);
    add_submenu_page("apkwp_menu", __('Overview', 'notifications'), __('Overview', 'notifications'), $capability, "apkwp_general_overview", 'apkwp_general_overview');
    add_submenu_page("apkwp_menu", __('Send Push Notification', 'notifications'), __('Send Push Notification', 'notifications'), $capability, "apkwp_send_notifications", 'apkwp_send_notifications');
    add_submenu_page("apkwp_menu", __('Scheduled', 'notifications'), __('Scheduled', 'notifications'), $capability, "apkwp_all_notifications", 'apkwp_all_notifications');
    add_submenu_page("apkwp_menu", __('Archives', 'notifications'), __('Archives', 'notifications'), $capability, "apkwp_sent_notifications", 'apkwp_sent_notifications');
    add_submenu_page("apkwp_menu", __('Settings', 'notifications'), __('Settings', 'notifications'), $capability, "apkwp_settings_page_options", 'apkwp_settings_page_options');
}

add_action('admin_menu', 'apkwp_notifications_admin_main_menu_scr');

/* functions */
include( plugin_dir_path(__FILE__) . 'sections/send-nots.php');
include( plugin_dir_path(__FILE__) . 'sections/all-nots.php');
include( plugin_dir_path(__FILE__) . 'sections/sent-nots.php');
include( plugin_dir_path(__FILE__) . 'sections/general_overview.php');


/* Including SRC files start */

function apkwp_onesignal_sender_src_files() {
    wp_enqueue_style('apkwp_onesignal_sender_intimidate_css', plugins_url('js/Intimidatetime-master/dist/Intimidatetime.min.css', __FILE__), array(), '1.0');
    wp_enqueue_script('apkwp_onesignal_sender_intimidate_js', plugins_url("js/Intimidatetime-master/dist/Intimidatetime.min.js", __FILE__), array('jquery'), '1.0', true);
    wp_enqueue_script('apkwp_onesignal_sender_moment', plugins_url("js/moment/moment.js", __FILE__), array('jquery'), '1.0', true);
    wp_enqueue_script('apkwp_onesignal_sender_moment_timezone', plugins_url("js/moment/moment-timezone-with-data.js", __FILE__), array('jquery'), '1.0', true);
}

add_action('admin_enqueue_scripts', 'apkwp_onesignal_sender_src_files');
/* Including SRC files end */

/* Register settings page start */

function apkwp_settings_page() {
    ?>
    <input type="text" class="apkwp_settings_page" name="apkwp_settings_page"
           value="<?php echo get_option('apkwp_settings_page'); ?>" />
           <?php
       }

       function apkwp_settings_page_fields() {
           add_settings_section("apkwp-settings-section", "Please Provide Your OneSignal User Authentication key (in order to see your app's info)", null, "apkwp-settings-options");

           add_settings_field("apkwp_settings_page", "Authenticaton key : ", "apkwp_settings_page", "apkwp-settings-options", "apkwp-settings-section");

           register_setting("apkwp-settings-section", "apkwp_settings_page");
       }

       add_action("admin_init", "apkwp_settings_page_fields");
       /* Register settings page end */

       /* Mourning Plugin page start */

       function apkwp_settings_page_options() {
           $OneSignalWPSetting = get_option('OneSignalWPSetting');
           $OneSignalWPSetting_app_id = $OneSignalWPSetting['app_id'];
           $OneSignalWPSetting_rest_api_key = $OneSignalWPSetting['app_rest_api_key'];
           $pluginList = get_option('active_plugins');
           $plugin = 'onesignal-free-web-push-notifications/onesignal.php';
           if (in_array($plugin, $pluginList) && $OneSignalWPSetting_app_id && $OneSignalWPSetting_rest_api_key) {
               ?>
        <div class="wrap apkwp_plugin_options">
            <div class="elt">
                <h2>Settings Page</h2>
            </div>
            <?php settings_errors(); ?>
            <form method="POST" action="options.php" class="settings_form">
                <?php
                settings_fields("apkwp-settings-section");
                do_settings_sections("apkwp-settings-options");
                ?>
                <h3 class="error_notice">Follow the below steps to get your OneSignal's user authentication key :</h3>
                <ul class="todo_list">
                    <li>Go to <a target="_blank" href="https://onesignal.com/">OneSignal.com</a> and log in</li>
                    <li>In the left side menu, click on Account</li>
                    <li>A popup will appear, click on Account & API keys</li>
                    <li>Scroll down to User Auth Key section</li>
                    <li>Copy and paste the key in the above field and click save options<br></li><br><br>
                    <li>Go to <a href="<?php echo admin_url('admin.php?page=apkwp_general_overview'); ?>">Overview page</a></li>
                </ul>
				<br>
				<blockquote>
				<p align="right">
				<img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'admin_menu/images/onesignal.jpg' ?>"><br>
				In the trial period, we provide access to the onesignal account<br>
				(User Auth Key, App ID, REST API Keys, Safari Web ID)</p>
				</blockquote>

				<br>
				<hr>
				<table>
				<tr>
				<td width="20"></td>
				<td>
				<div class="isi">

				<h5><strong>Follow these steps to presence your android app in Google play store<strong></h5>
				<h6><ol>
				<li>We have provided <a href="https://assets.starcoklat.top/apkwp/resources.zip" target="_blank">apkwp resources</a> for which you will further edit & modify parameter. When finished, send back the files that has been compressed to us via <a href="https://starcoklat.top/support" target="_blank">support page.</a> Please refer article <a href="https://starcoklat.top/apkwp-resources" target="_blank">here</a>
				<li>We do work based on the queue. To get priority please make order <a href="https://starcoklat.top/product/apkwp-android-app-for-wordpress-blog-site" target="_blank">here</a><br>
				Totally Free For 1 Month Trial, With terms and Conditions apply.<br>
				 In case you are not willing or not able to pay, your app will continue to work without any ads from you and instead we reserve to show few of our ads and push notifications disable.
				<li>We use <a href="https://wordpress.org/plugins/json-api/" rel="nofollow"><strong>JSON API</strong></a> plugin to make this app works, make sure <a href="https://starcoklat.top/json-api-wordpress-plugin" target="_blank">your Wordpress</a> can install this plugin.
				<li> To deliver push notification, Install <a href="https://wordpress.org/plugins/onesignal-free-web-push-notifications/"><strong>onesignal free web push notifications </strong>Plugin.</a> Please refer this <a href="https://starcoklat.top/tag/push-notification" target="_blank">articles</a><br>
				<strong>Push Notification Process Mechanism : </strong>
				<a href="https://starcoklat.top/configure-firebase-cloud-messaging-fcm" target="_blank">Configure Firebase Cloud Messaging (FCM)</a> ~> <a href="https://starcoklat.top/onesignal-setting-web-push-notification" target="_blank">Onesignal Configuration</a> ~> <a href="https://assets.starcoklat.top/apkwp/screenshots/apkwp_Setting.png" target="_blank">apkwp Setting</a> ~> <a href="https://assets.starcoklat.top/apkwp/screenshots/Send_Push_Notication.png" target="_blank">Send Push Notication</a><br>
				In the trial period, we create firebase project and provide access to the push notification account (User Auth Key, App ID, REST API Keys, Safari Web ID)
				<li>We submit your app from our account with no cost.<BR>
				We refuse to serve if your website does violate google policy. Please refer article <a href="https://starcoklat.top/google-bans-developer-account" target="_blank">here</a>
				<li>After Payment Made. We update your application in google playstore.
				<br>- If you wanna monetize, we use your <a href="https://starcoklat.top/create-admob-account" target="_blank">admob</a> ad-unit that you input from send back file strings.xml in <a href="https://assets.starcoklat.top/apkwp/resources.zip" target="_blank">apkwp resources</a> <br>
				Or, If you dont wanna monetize. We disable monetize function in android app.
				<br>- Please Open Onesignal Account, so You can full manage push notification. 
				<br>Please Refer articles about push notification <a href="https://starcoklat.top/tag/push-notification" target="_blank">here</a>.
				<br>- Please Make Good Screenshot for your android application to attract visitor. Do your best to promote, Its your obligations.<br> 
				Wish the best
				<br>- Starcoklat Obligations, update the latest technology for the best.
				</ol>
				<em>If you request other related services then there will be additional fees</em>
				<p style="padding-left: 30px;"><a href="https://twitter.com/starcoklat"><img src="https://starcoklat.top/wp-content/uploads/2018/02/twitter.png" alt="twitter" width="35" height="35" /></a> &nbsp;&nbsp;<a href="https://plus.google.com/110834742721777124095"><img src="https://starcoklat.top/wp-content/uploads/2018/02/google-plus.png" alt="G+" width="35" height="35" /></a>&nbsp;&nbsp;<a href="https://web.facebook.com/starcoklattop-332524080579287/"><img src="https://starcoklat.top/wp-content/uploads/2018/02/facebook.png" alt="facebook" width="35" height="35" /></a></p></h6>
		

				</div>  
				</td>
				<td width="20"></td>
				</tr>
				</table>
				<br>
				<hr>
				<br>


                <?php
                submit_button();
                ?>
            </form>
        </div>
        <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
    <?php } else { ?>
        <div class="wrap">
            <div class="icon32" id="icon-options-general">
                <br/>
            </div>
            <div class="header">
                <div class="elt">
                    <h2>Settings Page</h2>
                </div>
                <div class="elt srch">
                    <h3 class="error_notice">Please complete the OneSignal – Free Web Push Notifications setup before using this plugin.</h3>
                    <div class="notice_hr"></div>
                    <h3 class="error_notice">To do so :</h3>
                    <ul class="todo_list">
                        <li>Download <a href="https://wordpress.org/plugins/onesignal-free-web-push-notifications/">OneSignal – Free Web Push Notifications</a></li>
                        <li>Activate OneSignal – Free Web Push Notifications plugin</li>
                        <li>Go to OneSignal – Free Web Push Notifications settings page</li>
                        <li>Provide the App ID and the REST API key as mentioned</li>
                        <li>Save and get back here...</li>
                    </ul>
				
				<br>
				<blockquote>
				<p align="right">
				<img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'admin_menu/images/onesignal.jpg' ?>"><br>
				In the trial period, we provide access to the onesignal account<br>
				(User Auth Key, App ID, REST API Keys, Safari Web ID)</p>
				</blockquote>
				<br>
				<hr>
				
				<table>
				<tr>
				<td width="20"></td>
				<td>
				<div class="isi">

				<h5><strong>Follow these steps to presence your android app in Google play store<strong></h5>
				<h6><ol>
				<li>We have provided <a href="https://assets.starcoklat.top/apkwp/resources.zip" target="_blank">apkwp resources</a> for which you will further edit & modify parameter. When finished, send back the files that has been compressed to us via <a href="https://starcoklat.top/support" target="_blank">support page.</a> Please refer article <a href="https://starcoklat.top/apkwp-resources" target="_blank">here</a>
				<li>We do work based on the queue. To get priority please make order <a href="https://starcoklat.top/product/apkwp-android-app-for-wordpress-blog-site" target="_blank">here</a><br>
				Totally Free For 1 Month Trial, With terms and Conditions apply.<br>
				 In case you are not willing or not able to pay, your app will continue to work without any ads from you and instead we reserve to show few of our ads and push notifications disable.
				<li>We use <a href="https://wordpress.org/plugins/json-api/" rel="nofollow"><strong>JSON API</strong></a> plugin to make this app works, make sure <a href="https://starcoklat.top/json-api-wordpress-plugin" target="_blank">your Wordpress</a> can install this plugin.
				<li> To deliver push notification, Install <a href="https://wordpress.org/plugins/onesignal-free-web-push-notifications/"><strong>onesignal free web push notifications </strong>Plugin.</a> Please refer this <a href="https://starcoklat.top/tag/push-notification" target="_blank">articles</a><br>
				<strong>Push Notification Process Mechanism : </strong>
				<a href="https://starcoklat.top/configure-firebase-cloud-messaging-fcm" target="_blank">Configure Firebase Cloud Messaging (FCM)</a> ~> <a href="https://starcoklat.top/onesignal-setting-web-push-notification" target="_blank">Onesignal Configuration</a> ~> <a href="https://assets.starcoklat.top/apkwp/screenshots/apkwp_Setting.png" target="_blank">apkwp Setting</a> ~> <a href="https://assets.starcoklat.top/apkwp/screenshots/Send_Push_Notication.png" target="_blank">Send Push Notication</a><br>
				In the trial period, we create firebase project and provide access to the push notification account (User Auth Key, App ID, REST API Keys, Safari Web ID)
				<li>We submit your app from our account with no cost.<BR>
				We refuse to serve if your website does violate google policy. Please refer article <a href="https://starcoklat.top/google-bans-developer-account" target="_blank">here</a>
				<li>After Payment Made. We update your application in google playstore.
				<br>- If you wanna monetize, we use your <a href="https://starcoklat.top/create-admob-account" target="_blank">admob</a> ad-unit that you input from send back file strings.xml in <a href="https://assets.starcoklat.top/apkwp/resources.zip" target="_blank">apkwp resources</a> <br>
				Or, If you dont wanna monetize. We disable monetize function in android app.
				<br>- Please Open Onesignal Account, so You can full manage push notification. 
				<br>Please Refer articles about push notification <a href="https://starcoklat.top/tag/push-notification" target="_blank">here</a>.
				<br>- Please Make Good Screenshot for your android application to attract visitor. Do your best to promote, Its your obligations.<br> 
				Wish the best
				<br>- Starcoklat Obligations, update the latest technology for the best.
				</ol>
				<em>If you request other related services then there will be additional fees</em>
				<p style="padding-left: 30px;"><a href="https://twitter.com/starcoklat"><img src="https://starcoklat.top/wp-content/uploads/2018/02/twitter.png" alt="twitter" width="35" height="35" /></a> &nbsp;&nbsp;<a href="https://plus.google.com/110834742721777124095"><img src="https://starcoklat.top/wp-content/uploads/2018/02/google-plus.png" alt="G+" width="35" height="35" /></a>&nbsp;&nbsp;<a href="https://web.facebook.com/starcoklattop-332524080579287/"><img src="https://starcoklat.top/wp-content/uploads/2018/02/facebook.png" alt="facebook" width="35" height="35" /></a></p></h6>
				<br>
				<br>  

				</div>  
				</td>
				<td width="20"></td>
				</tr>
				</table>
				<br>
				<hr>
				<br>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
    <?php } ?>
    <style type="text/css">

		div.isi {    font-size: large; line-height: 1.4;}

        .the_right_path{
            color: #182b49;
            font-size: 20px;
            margin: 10px 22px 0 0;
            text-align: right;
        }

        .settings_form {
            padding: 0 25px;
        }

        .the_right_path a{
            color: #028482;
            text-decoration: underline;
        }
        .elt h2 {
            background: rgba(0, 0, 0, 0) linear-gradient(to right, #000000 , #804000) repeat scroll 0 0;
            color: #fff;
            font-size: 25px;
            margin: 0;
            padding: 30px 0;
            text-align: center;
        }

        .wrap.apkwp_plugin_options {
            background-color: #fff;
            padding: 0;
            border: 1px solid #929497;
        }

        .settings_form #submit{
            background-color: #fff;
            border: 1px solid #929497;
            border-radius: 0;
            box-shadow: none;
            color: #929497;
            font-weight: 600;
            height: 35px;
            padding: 0 15px;
            text-shadow: none;
        }
        ul.todo_list{
            list-style: upper-greek;
            text-align: left;
            padding: 0 17px;
        }

        ul.todo_list li{
            color: #182b49;
            font-size: 17px;
        }

        .wrap{
            background-color: #fff;
            padding: 0;
            border: 1px solid #929497;
        }
        .wrap .elt.srch{
            padding: 0 15px;
        }

        .error_notice {
            color: #182b49;
            text-align: center;
        }


        .notice_hr {
            background-color: rgba(0, 0, 0, 0.15);
            height: 1px;
            margin: 32px auto;
            width: 200px;
        }

        .error_notice:nth-child(3) {
            margin: 0;
            text-align: left;
        }
    </style>
    <?php
}
