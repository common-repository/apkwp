<?php
/**
 * Notifications systems
 *
 * @package  Notifications
 * @author   starcoklat
 */
if (!defined('ABSPATH')) {
    exit;
}

function apkwp_send_notifications() {
    $nonce = wp_create_nonce("apkwp_sending_the_msg");
    $link = admin_url('admin-ajax.php?action=apkwp_sending_the_msg');
    $OneSignalWPSetting = get_option('OneSignalWPSetting');
    $OneSignalWPSetting_app_id = $OneSignalWPSetting['app_id'];
    $OneSignalWPSetting_rest_api_key = $OneSignalWPSetting['app_rest_api_key'];
    $pluginList = get_option('active_plugins');
    $plugin = 'onesignal-free-web-push-notifications/onesignal.php';
    if (in_array($plugin, $pluginList) && $OneSignalWPSetting_app_id && $OneSignalWPSetting_rest_api_key) {
        ?>
        <div class="bread_crumbs">
            <a href="<?php echo admin_url('admin.php?page=apkwp_general_overview'); ?>">Overview</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_send_notifications'); ?>" class="active_bread">Send Notification</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_all_notifications'); ?>">Scheduled Notifications</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_sent_notifications'); ?>">Archives</a>
        </div>
        <div class="wrap">
            <div class="icon32" id="icon-options-general">
                <br/>
            </div>
            <div class="header">
                <div class="elt">
                    <h2>Send Push Notification</h2>
                </div>
                <div class="elt srch">
                    
                    <form method="get" action="#">
                        <input type="hidden" name="page" value="property_info"/>
                        <div class="datepicker-type-wrapper">
                            <span class="section_title">SCHEDULE:</span>
                            <span class="radio-wrapper">
                                <input class="radio_selector" type="radio" name="send-time" id="send-immediately" value="send-immediately">
                                <label for="send-immediately">Send immediately</label>
                            </span>
                            <span class="radio-wrapper">
                                <input class="radio_selector" type="radio" name="send-time" id="send-scheduled" value="send-scheduled">
                                <label for="send-scheduled">Schedule Message</label>
                            </span>
                        </div>
                        <div class="schedule_date_section">
                            <span class="section_title">DATE:</span>
                            <input type="text" name="timepicker" class="timepicker"/>
        <!--                        <input id="time_picker_field" type="text" size="35" value="<?php // echo $_GET['src_date'];                                                               ?>"
                                   name="src_date" placeholder="Enter username to search"/>-->
                        </div>
                        <span class="section_title">TITLE:</span>
                        <input type="text" name="notification-title" id="notification-title" />
                        <span class="section_title">MESSAGE:</span>
                        <textarea rows="4" cols="50" name="notification-message" id="notification-message"></textarea>
                        <span class="section_title">URL: <h6>(When user clicks on the notification, then will be redirected to this URL.)</h6></span>
                        <input type="text" placeholder="(Optional)" name="notification-url" id="notification-url" />
                        <input id="send_notification" data-link="<?php echo $link; ?>" data-nonce="<?php echo $nonce; ?>" type="submit" value="Submit" name="submit"/>
                        <img alt="loader" class="loader_image" src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'images/loader.gif' ?>" />
                        <div class="ajax_result"></div>
                    </form>
<br>
* if you wanna <a href="https://starcoklat.top/onesignal-send-push-notification
" target="_blank">send push notification with emoji,</a> please send via onesignal dashboard

                </div>
                <div class="clear"></div>
            </div>
        </div>
       <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
        
    <?php } else { ?>
        <div class="bread_crumbs">
            <a href="<?php echo admin_url('admin.php?page=apkwp_general_overview'); ?>">Overview</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_send_notifications'); ?>" class="active_bread">Send Notification</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_all_notifications'); ?>">Scheduled Notifications</a>
            <a href="<?php echo admin_url('admin.php?page=apkwp_sent_notifications'); ?>">Archives</a>
        </div>
        <div class="wrap">
            <div class="icon32" id="icon-options-general">
                <br/>
            </div>
            <div class="header">
                <div class="elt">
                    <h2>New Notification Message</h2>
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


                </div>
                <div class="clear"></div>
            </div>
        </div>
           <h6 class="the_right_path">If you have any further questions about this or another Our Services then please do not hesitate to <a href="https://starcoklat.top/support" target="_blank">contact us.</a> </h6>
    <?php } ?>
    <style type="text/css">

		div.isi {    font-size: large; line-height: 3;}


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

        .general_notice h4 {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: #e50000;
            background-color: #ffcccc;
            font-style: italic;
            border-image: none;
            border-style: solid;
            border-width: 1px 1px 5px;
            font-size: 16px;
            margin: 0;
            padding: 10px;
            color: #e50000;
        }

        .close_notice_button {
            float: right;
            cursor: pointer;
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
        .loader_image {
            margin: 0 0 3px 15px;
            vertical-align: bottom;
            display: none;
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
            cursor: pointer;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .header .elt.srch form input[name="submit"]:hover{
            background-color: #182b49;
            color: #fff;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
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
    </style>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114828151-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114828151-1');
</script>




    <script type="text/javascript">
        jQuery(document).ready(function () {
            //            jQuery('#time_picker_field').Zebra_DatePicker();
            jQuery(function ($) {
                $('.timepicker').intimidatetime({
                    format: 'yyyy-MM-dd HH:mm:00',
                    previewFormat: 'yyyy-MM-dd HH:mm'
                });
            });
            //if schedule clicked open date field
            jQuery('.close_notice_button').on('click', function () {
                jQuery('.general_notice').slideUp(500);
            });
            //if clicked close general notice
            jQuery('.radio_selector').on('click', function () {
                var selected_method = jQuery(this).val();
                if (selected_method == "send-scheduled") {
                    jQuery('.schedule_date_section').slideDown();
                } else {
                    jQuery('.schedule_date_section').slideUp();
                }
            });
            //submit button notification
            jQuery('#send_notification').on('click', function (e) {
                e.preventDefault();
                var selected_method = jQuery('input[name=send-time]:checked').val();
                var notify_title = jQuery('#notification-title').val();
                var notify_message = jQuery('#notification-message').val();
                var notify_time = jQuery('.timepicker').val();
                var timestamp = moment(notify_time).format("X");
                var offset_in_min = (moment().utcOffset() * 60);
                var notify_url = jQuery('#notification-url').val();
                var nonce = jQuery(this).attr("data-nonce");
                var ajax_url = jQuery(this).attr("data-link");
                var loader = jQuery('.loader_image');
                //                    alert(selected_method);
                if (selected_method && notify_title && notify_message) {
                    if (selected_method == 'send-immediately') {
                        if (notify_title && notify_message) {
                            loader.fadeIn();
                            jQuery.ajax({
                                type: "post",
                                dataType: "json",
                                url: ajax_url,
                                data: {action: "apkwp_sending_the_msg", nonce: nonce, selected_method: selected_method,
                                    notify_title: notify_title, notify_message: notify_message, notify_time: notify_time, notify_url: notify_url},
                                success: function (response) {
                                    loader.fadeOut();
                                    if (response.type == "success") {
                                        jQuery('.ajax_result').html('<h5 style="color : green ">Message Sent. Refreshing...</h5>');
                                        function reload() {
                                            location.reload(true);
                                        }
                                        setTimeout(reload, 1000);
                                    } else {
                                        jQuery('.ajax_result').html('<h5 style="color : red ">There was an error! Please try again.</h5>');
                                    }
                                }
                            });
                        }
                    }
                    if (selected_method == 'send-scheduled') {
                        if (notify_title && notify_message && notify_time) {
                            loader.fadeIn();
                                jQuery.ajax({
                                    type: "post",
                                    dataType: "json",
                                    url: ajax_url,
                                    data: {action: "apkwp_sending_the_msg", nonce: nonce, selected_method: selected_method,
                                        notify_title: notify_title, notify_message: notify_message, notify_time: timestamp, notify_url: notify_url},
                                    success: function (response) {
                                        loader.fadeOut();
                                        if (response.type == "success") {
                                            jQuery('.ajax_result').html('<h5 style="color : green ">Message ' + response.msgstatus + '. Refreshing...</h5>');
                                                function reload() {
                                                    location.reload(true);
                                                }
                                                setTimeout(reload, 1000);
                                        } else {
                                            jQuery('.ajax_result').html('<h5 style="color : red ">There was an error! Please try again.</h5>');
                                        }
                                    }
                                });
                        } else {
                            jQuery('.ajax_result').html('<h5 style="color : red ">Please Select the schedule, fill the Date, Title and Message.</h5>');
                        }
                    }
                } else {
                    jQuery('.ajax_result').html('<h5 style="color : red ">Please Select the schedule, fill the Title and Message.</h5>');
                }
            });
        }
        );
    </script>
    <?php
}
