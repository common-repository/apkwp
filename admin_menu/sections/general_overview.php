<?php

/**
 * checking general overview for users
 *
 * @package  General Overview
 * @author   starcoklat
 */
function apkwp_general_overview() {
    $OneSignalWPSetting = get_option('OneSignalWPSetting');
    $OneSignalWPSetting_app_id = $OneSignalWPSetting['app_id'];
    $OneSignalWPSetting_rest_api_key = $OneSignalWPSetting['app_rest_api_key'];
    $pluginList = get_option('active_plugins');
    $plugin = 'onesignal-free-web-push-notifications/onesignal.php';
    if (in_array($plugin, $pluginList) && $OneSignalWPSetting_app_id && $OneSignalWPSetting_rest_api_key) {
        ?>
        <div class="bread_crumbs">
            <a href="<?php echo admin_url('admin.php?page=apkwp_general_overview'); ?>" class="active_bread">Overview</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_send_notifications'); ?>">Send Notification</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_all_notifications'); ?>">Scheduled Notifications</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_sent_notifications'); ?>">Archives</a>
        </div>
        <div class="wrap">
            <div class="icon32" id="icon-options-general">
                <br/>
            </div>
            <div class="header">
                <div class="elt">
                    <h2>General Overview</h2>
                </div>
                <!--<div class="elt srch">-->
                <?PHP
                $OneSignalWPSetting = get_option('OneSignalWPSetting');
                $OneSignalWPSetting_app_id = $OneSignalWPSetting['app_id'];
                $OneSignalWPSetting_rest_api_key = $OneSignalWPSetting['app_rest_api_key'];
                $onesignal_extra_info = get_option('apkwp_settings_page');
                ?>
                <div class="panel table-panel panel-default">

<h3 class="users_title">Welcome to ApkWp – Native Android App For WordPress Blog Site</h3>

<table>
<tr>
<td width="20"></td>
<td>

<div class="isi">

<strong>Follow these steps to presence your android app in Google play store</strong>
<ol>
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
<p style="padding-left: 30px;"><a href="https://twitter.com/starcoklat"><img src="https://starcoklat.top/wp-content/uploads/2018/02/twitter.png" alt="twitter" width="35" height="35" /></a> &nbsp;&nbsp;<a href="https://plus.google.com/110834742721777124095"><img src="https://starcoklat.top/wp-content/uploads/2018/02/google-plus.png" alt="G+" width="35" height="35" /></a>&nbsp;&nbsp;<a href="https://web.facebook.com/starcoklattop-332524080579287/"><img src="https://starcoklat.top/wp-content/uploads/2018/02/facebook.png" alt="facebook" width="35" height="35" /></a></p>
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
                    <h3 class="users_title">- APP Info -</h3>
                    <?php if ($onesignal_extra_info) { ?>             
                        <?php
                        $args2 = array(
                            'headers' => array(
                                'Authorization' => 'Basic ' . $onesignal_extra_info
                            ),
                            'timeout' => 500,
                            'sslverify'   => false,
                        );
                        $url2 = "https://onesignal.com/api/v1/apps/" . $OneSignalWPSetting_app_id;
                        $response2 = wp_remote_get($url2, $args2);

                        $response_to_arrays2 = json_decode(wp_remote_retrieve_body($response2), true);
                        $app_name = $response_to_arrays2['name'];
                        $app_players = $response_to_arrays2['players'];
                        $app_msgable_players = $response_to_arrays2['messageable_players'];
                        $app_created_at = date('d, F Y h:i:00a', strtotime($response_to_arrays2['created_at']));
                        $app_updated_at = date('d, F Y h:i:00a', strtotime($response_to_arrays2['updated_at']));
                        $app_logo_used = $response_to_arrays2['chrome_web_default_notification_icon'];
//                var_dump($response_to_arrays2);
                        if($onesignal_extra_info && $response_to_arrays2['created_at']){
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">APP name</th>
                                    <th colspan="2">Created At</th>
                                    <th colspan="2">Updated At</th>
                                    <th colspan="2">Logo Used</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2"><?php echo $app_name; ?></td>
                                    <td colspan="2"><?php echo $app_created_at; ?></td>
                                    <td colspan="2"><?php echo $app_updated_at; ?></td>
                                    <td colspan="2">
                                        <?php if($app_logo_used){ ?>
                                        <img alt="used_logo" class="used_logo" src="<?php echo $app_logo_used; ?>" />
                                        <?php }else{ ?>
                                            -
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="users_title">- Users Info -</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3">Total Users</th>
                                    <th colspan="3">Messageable Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3"><?php echo $app_players; ?></td>
                                    <td colspan="3"><?php echo $app_msgable_players; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php }else{ ?>
                            <div class="provide_user_key">
                            <h4>You entered the wrong key please Visit <a href="<?php echo admin_url('admin.php?page=apkwp_settings_page_options'); ?>">Settings page</a> and follow the steps</h4>
                        </div>
                        <?php }?>
                    <?php } else { ?>
                        <div class="provide_user_key">
                            <h4>Please provide User Authentication key to check your app's info - Visit <a href="<?php echo admin_url('admin.php?page=apkwp_settings_page_options'); ?>">Settings page</a></h4>
                        </div>
                    <?php } ?>
                    <?php
                    $args = array(
                        'headers' => array(
                            'Authorization' => 'Basic ' . $OneSignalWPSetting_rest_api_key
                        ),
                            'timeout' => 500,
                            'sslverify'   => false,
                    );
                    $url = "https://onesignal.com/api/v1/players?app_id=" . $OneSignalWPSetting_app_id . "&limit=50&offset=0";
                    $response = wp_remote_get($url, $args);

                    $response_to_arrays = json_decode(wp_remote_retrieve_body($response), true);
                    ?>
                    <h3 class="users_title">- Users Overview -<span>(Showing latest 50 users)</span></h3>
                    <table id="notifications" class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="1">Users : <?php echo count($response_to_arrays['players']); ?></th>
                                <th colspan="2">Subscribed</th>
                                <th colspan="2">First Session</th>
                                <th colspan="2">Last Active</th>
                                <th colspan="2">Device</th>
                                <th colspan="2">Sessions</th>
                                <th colspan="2">Language</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $response_counter = 0;
//                var_dump($response_to_arrays);
                            foreach (array_reverse($response_to_arrays['players']) as $response_array) {
                                if ($response_counter < 51) {
                                    $user_sessions = $response_array['session_count'];
                                    $user_language = $response_array['language'];
                                    $user_device = $response_array['device_model'];
                                    $user_status = $response_array['invalid_identifier'];
                                    $final_readable_last_active = date('d, F Y h:i:00a', $response_array['last_active']);
                                    $final_readable_first_session = date('d, F Y h:i:00a', $response_array['created_at']);
//                                echo '<pre>' . var_dump($response_array) . '</pre>'; 
                                    ?>
                                    <tr class="notification-entry">
                                        <td colspan="1" class="one action text-center">
                                            <?php echo $response_counter + 1; ?> 
                                        </td>
                                        <td colspan="2" class="submitted date">
                                            <?php
                                            if ($user_status === false) {
                                                echo 'Yes';
                                            } else {
                                                echo 'User Unsubscribed';
                                            }
                                            ?>
                                        </td>
                                        <td colspan="2" class="submitted date">
                                            <?php echo $final_readable_first_session; ?>
                                        </td>
                                        <td colspan="2" class="notification-content">
                                            <?php echo $final_readable_last_active; ?>
                                        </td>
                                        <td colspan="2" class="notification-content">
                                            <?php echo $user_device; ?>
                                        </td>
                                        <td colspan="2" class="notification-content">
                                            <?php echo $user_sessions; ?>
                                        </td>
                                        <td colspan="2" class="notification-content">
                                            <?php echo $user_language; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $response_counter++;
                            }
                            if ($response_counter == 0) {
                                ?>
                                <tr class="notification-entry">
                                    <td colspan="13" class="one action text-center no_notifications">
                                        You have no users yet.
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>       
            </div>
            <div class="clear"></div>
        </div>
        <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
    <?php } else { ?>
        <div class="bread_crumbs">
            <a href="<?php echo admin_url('admin.php?page=apkwp_general_overview'); ?>" class="active_bread">Overview</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_send_notifications'); ?>">Send Notification</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_all_notifications'); ?>">Scheduled Notifications</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_sent_notifications'); ?>">Sent Notifications</a>
        </div>
        <div class="wrap">
            <div class="icon32" id="icon-options-general">
                <br/>
            </div>
            <div class="header">
                <div class="elt">
                    <h2>Scheduled Notifications</h2>
                </div>
                <div class="elt srch">
                    <h3 class="error_notice">Please complete the OneSignal - Free Web Push Notifications setup before using this plugin.</h3>
                    <div class="notice_hr"></div>
                    <h3 class="error_notice">To do so :</h3>
                    <ul class="todo_list">
                        <li>Download <a href="https://wordpress.org/plugins/onesignal-free-web-push-notifications/">OneSignal – Free Web Push Notifications</a></li>
                        <li>Activate OneSignal - Free Web Push Notifications plugin</li>
                        <li>Go to OneSignal - Free Web Push Notifications settings page</li>
                        <li>Provide the App ID and the REST API key as mentioned</li>
                        <li>Save and get back here...</li>
                    </ul>
                </div>
				<br>
				<blockquote>
				<p align="right">
				<img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'images/onesignal.jpg' ?>"><br>
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


                <div class="clear"></div>
            </div>
        </div>
        <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
    <?php } ?>    
    <style type="text/css">
	
	div.isi {    font-size: large; line-height: 1.4;}
	
        .used_logo {
            max-width: 20%;
        }

        .provide_user_key {
            padding: 0 20px;
        }

        .provide_user_key #submit{
            background-color: #fff;
            border: 1px solid #929497;
            border-radius: 0;
            box-shadow: none;
            color: #929497;
            font-weight: 600;
            height: 40px;
            text-shadow: none;
        }

        .bread_crumbs{
            text-align: center;
            margin: 40px 0 0 0;
        }

        .the_right_path{
            color: #182b49;
            font-size: 20px;
            margin: 10px 22px 0 0;
            text-align: right;
        }

        .the_right_path a{
            color: #028482;
            text-decoration: underline;
        }

        .error_notice{
            text-align: center;
            color: #182b49;
        }

        .error_notice:nth-child(3){
            text-align: left;
            margin: 0;
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

        .notice_hr{
            height: 1px;
            width: 200px;
            background-color: rgba(0,0,0,0.15);
            margin: 32px auto;
        }

        ul.todo_list li a{
            background-color: transparent;
            text-decoration: underline !important;
            color: #000;
            border: none !important;
            box-shadow: none !important;
        }

        .bread_crumbs a {
            color: #182b49 !important;
            border: 2px solid #182b49;
            display: inline-block;
            font-size: 16px;
            min-width: 200px;
            padding: 7px 25px;
            text-decoration: none;
            margin: 0 25px 0 0;
        }

        .bread_crumbs a.active_bread{
            text-decoration: underline;
            color: #929497;
            font-weight: bold;
        }

        .schedule_date_section{
            display: none;
            position: relative;
        }

        .wrap {
            background-color: #fff;
            margin: 40px 20px 0 0;
            border: 1px solid #182b49;
            box-shadow: 0 0 3px 0 grey;
        }
        .status{
            text-align:center;
        }
        .status .loader{
            display:none;
            margin:0 auto;
        }
        .status p{
            font-weight: bold;
            font-size:16px;
        }
        .loader {
            display: none;
        }

        .widefat tbody th {
            color: #000;
        }

        .widefat tbody th a {
            color: #000;
            font-weight: bold;
        }

        .widefat tbody tr td{
            color: #000;
        }

        .clear {
            clear: both;
        }

        .header .elt {
            display: block;
        }

        .header .elt h2 {
            background: #000000; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(left, #000000 , #804000); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(right, #000000 , #804000); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(right, #000000 , #804000); /* For Firefox 3.6 to 15 */
            background: linear-gradient(to right, #000000 , #804000); /* Standard syntax */
            color: #fff;
            font-size: 25px;
            margin: 0;
            padding: 30px 0;
            text-align: center;
        }

        .header .elt.srch {
            display: block;
            text-align: left;
            padding: 30px;
        }

        .header .elt.srch form input[name="submit"]{
            background-color: #fff;
            color: #611341;
            font-weight: bold;
            margin: 25px 0 0 0;
        }

        .header .elt.srch form input[name="submit"]:hover{
            background-color: rgba(255,255,255,0.5);
        }

        .header .elt.srch form input#notification-title,
        .header .elt.srch form input#notification-url,
        .header .elt.srch form textarea{
            width: 100%;
        }

        .header .elt.srch form input[name="submit"],
        .header .elt.srch form textarea,
        .header .elt.srch form input{
            border: 1px solid #929497;
            padding: 7px;
            font-weight: 600;
            border-radius: 0;
            background-color: #fff;
            color: #929497;
        }

        .header .elt.srch a {
            -webkit-box-shadow: 1.7px 1.7px 1px #787878;
            -moz-box-shadow: 1.7px 1.7px 1px #787878;
            box-shadow: 1.7px 1.7px 1px #787878;
            padding: 5px;
            text-decoration: none;
            border: 1px solid #611431;
            background-color: #fff;
            color: #611431;
        }
        .Zebra_DatePicker{
            top: 14% !important;
        }

        .datepicker-type-wrapper{
            margin: 0 0 20px 0;
        }

        .datepicker-type-wrapper .radio-wrapper{
            display: block;
            margin: 10px 30px;
        }

        .section_title{
            color: #929497;
            font-size: 17px;
            font-weight: bold;
            line-height: normal;
            margin: 10px 0;
            display: block;
        }

        .section_title h6{
            display: inline-block;
            margin: 0;
        }

        .datepicker-type-wrapper .radio-wrapper label{
            vertical-align: top;
            min-height: 18px;
            color: #505050;
            font-size: 16px;
        }

        .ajax_result h5{
            background-color: rgba(146, 148, 151, 0.30);
            display: inline-block;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0 0;
            padding: 17px 25px;
        }

        .wppb-serial-notification{
            display: none;
        }

        .panel {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .panel > .table:last-child, .panel > .table-responsive:last-child > .table:last-child {
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            max-width: 100%;
            width: 100%;
            margin-bottom: 0;
        }

        .table thead tr, .fc-border-separate thead tr {
            background-color: #eeeeee;
            font-size: 12px;
        }

        .table > thead > tr > th {
            border-bottom: 2px solid #ddd;
        }

        .table > thead > tr > th, 
        .table > thead > tr > td, 
        .table > tbody > tr > th, 
        .table > tbody > tr > td, 
        .table > tfoot > tr > th, 
        .table > tfoot > tr > td {
            line-height: 1.42857;
            padding: 8px;
            text-align: center;
            font-weight: bold;
        }

        .table-striped > tbody > tr:nth-child(2n+1) {
            background-color: #f9f9f9;
        }

        .text-center{
            text-align: center;
        }

        .dashboard-button, .dropdown-button {
            background-color: #dedede;
            border: 1px solid #d9d9d9;
            border-radius: 3px;
            transition: none 0s ease 0s ;
            padding: 0.7em 1.1em;
            box-shadow: 0 -2px 0 rgba(0, 0, 0, 0.05) inset;
            color: #333;
            cursor: pointer;
        }

        .status-label.scheduled {
            background-color: #a082bf;
            border: 1px solid #9675b8;
            border-radius: 4px;
            color: white;
            display: inline-block;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 0.07em;
            line-height: 1;
            margin: 10px 5px;
            padding: 11px 8px;
            text-align: center;
            text-transform: uppercase;
            vertical-align: middle;
            white-space: nowrap;
            text-decoration: none;
            min-width: 70px;
        }

        .status-label.canceled{
            background-color: #caa36e;
            border: 1px solid #caa36e;
            border-radius: 4px;
            color: white;
            display: inline-block;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 0.07em;
            line-height: 1;
            margin: 10px 5px;
            padding: 11px 8px;
            text-align: center;
            text-transform: uppercase;
            vertical-align: middle;
            white-space: nowrap;
            text-decoration: none;
            min-width: 70px;
        }

        .no_notifications{
            color: #b2b2b2;
            font-size: 1.35em;
            font-weight: 300 !important;
        }

        .panel .users_title{
            font-weight: bold;
            margin: 20px 0 35px;
            text-align: center;
        }

        .panel .users_title span{
            font-size: 0.8em;
            color: #a1a1a1;
            font-weight: normal;
        }
    </style>
    <?php
}
