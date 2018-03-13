<?php include("../../cfg/secure.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>NowShowing Settings</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- ver1.3 -->

   <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
  
  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="../img/favicon.ico" rel="shortcut icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,990" rel="stylesheet"> 
  
  <link rel="stylesheet" href="../lib/admin/bootstrap.min.css">
  <script src="../lib/admin/jquery.min.js"></script>
  <script src="../lib/admin/bootstrap.min.js"></script>
  <!-- <script src="../lib/admin/bootbox.min.js"></script> -->
  <!-- Bootstrap CSS File -->
  
  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="../css/admin_style.css" rel="stylesheet">
  
  <?php include '/opt/php/loadadvanced.php'?>
 
</head>
<body bgcolor="#151515">
  
<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
    
<!--  link to logo -->
      <div id="logo" class="pull-left">
	  <a href="../index.html">
	  <img src="../img/nowshowing-icon2.png" alt="NowShowing-Icon" style="margin-bottom:15px;margin-top:2px;" width="66px">
      <img src="../img/nowshowing.png" alt="NowShowing" width="350px" style="margin-top:12px;"></a>
      </div>
        
      <nav id="nav-menu-container" class="pull-right">
		<img src="<?=strip_tags($adv['avatar']['url'])?>" width="60px" style="margin-top:6px;"><br>
        <font color="#e5a00d" size="5"><b></b></font>
		<!-- <button class="mybutton" data-toggle="modal" data-target="#logoutModal" style="padding:1px 4px;font-size:12px;margin-bottom:12px;">Logout</button> -->
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
    
<!--==========================
  Body Section
============================-->
 
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#welcome">Welcome</a></li>
    <li><a data-toggle="tab" href="#email">Email</a></li>
	<li><a data-toggle="tab" href="#smtp">SMTP</a></li>
    <li><a data-toggle="tab" href="#web">Web</a></li>
    <li><a data-toggle="tab" href="#plex">Plex</a></li>
	<li><a data-toggle="tab" href="#report">Report</a></li>
	<li><a data-toggle="tab" href="#tools">Tools</a></li>
	<!-- <li class="pull-right"><a class="mybutton" data-toggle="modal" href="#logoutModal">Logout</a></li> -->
	<li class="pull-right"><button class="mybutton" data-toggle="modal" data-target="#logoutModal" style="padding:2px 4px;font-size:13px;margin-top:8px;margin-right:4px;">Logout</button></li>
	<!-- <li><button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal" style="margin-top:5px;margin-left:20px;vertical-align:middle;">Save Settings</button></li> -->
	<!-- <button id="save_settings2" class="mybutton" type="submit" value="submit" name="save_settings" form="mainform" style="margin-top:4px;margin-left:50px;">Save Settings</button> -->
	<!-- onclick="return confirm('Are you sure? This will overwrite all settings.')" -->
	<li id="status_text" name="status_text" style="margin-top:10px;margin-left:10px;vertical-align:middle;font-weight:bold;"></li>
	<li class="status">
	   <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
       </div>
   </li>
</ul>

<!-- Start mainform -->
<form id="mainform" action="" method="post">

<!--==========================
  Welcome Tab
============================-->
  
<div class="tab-content">
<div id="welcome" class="tab-pane fade in active"></p>
<h3>Welcome</h3>
<hr width="440px" align="left"></p>
<p>The NowShowing docker provides a summary of new media that has recently been added to Plex.<br>
NowShowing will generate an email for your users and a webpage for them to visit.<br>
Please use the tabs to configure additional settings and customization options.</p>
- Thanks for using NowShowing!
</p>

</div>

<!--==========================
  Email Settings
============================-->
<div id="email" class="tab-pane fade"></p>
<h3>Email Settings</h3>
<hr width="440px" align="left"><br>

<label>
<span>From:</span>
<input name="from" value="<?=strip_tags($adv['mail']['from'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Display name of the sender.<br>
Required.
</span></div></label><font style="margin-left:25px;font-weight:normal;color:#990000;font-size:12px;">(Required)</font>
<br><br>

<label>
<span>Subject:</span>
<input name="subject" value="<?=strip_tags($adv['mail']['subject'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Subject of the email.<br>
Date is automatically added to end of subject.<br>
Required.
</span></div></label><font style="margin-left:25px;font-weight:normal;color:#990000;font-size:12px;">(Required)</font>
<br><br>

<label>
<span>Email Title:</span>
<input name="title" value="<?=strip_tags($adv['email']['title'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Banner title for the email body.
</span></div>
</label><br><br>

<label>
<span>Email Image:</span>
<input name="image" value="<?=strip_tags($adv['email']['image'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
URL to image.<br>
ie: https://imgur.com/image.png
</span></div>
</label><br><br>

<label>
<span>Email Footer:</span>
<input name="footer" value="<?=strip_tags($adv['email']['footer'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Email footer tagline.<br>
Optional.
</span></div>
</label><br><br>
 
<label>
<span>Additional Emails:</span>
<textarea name="recipients_email" type="text"><?=strip_tags($recipients_email_array)?></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Enter additional emails to send to, besides your Plex friends.<br>
Enter emails seperated by commas.<br>
ie: bob@example.com,sally@example.com<br>
Optional, except when 'Email Plex Users' is set to 'No'. Then at least one email address is required here.
</span></div>
</label><br><br>

<label>
<span>Additional Users:</span>
<textarea name="recipients" type="text"><?=strip_tags($recipients_array)?></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Plex usernames of any Plex friends to be notified.<br>
Used if the 'Email Plex Users' is set to 'No'.<br>
Seperate usernames with commas.<br>
ie: myFriend1,myFriend2<br>
Optional.
</span></div>
</label><br><br>

<label>
<span>Email Language:</span>
<select name="language">
  <option value="en" <?=strip_tags($adv['email']['language']) == 'en' ? ' selected="selected"' : '';?>>English</option>
  <option value="de" <?=strip_tags($adv['email']['language']) == 'de' ? ' selected="selected"' : '';?>>German</option>
  <option value="fr" <?=strip_tags($adv['email']['language']) == 'fr' ? ' selected="selected"' : '';?>>French</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Email Language. Best-effort when grabbing metadata.<br>
If language selected is not found, falls back to english.
</span></div>
</label><br><br>
<button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal">Save Settings</button>
</p>
</div>
<!--==========================
  SMTP Settings
============================-->

<div id="smtp" class="tab-pane fade"></p>
<h3>SMTP Settings</h3>
<hr width="440px" align="left"><br>

<label>
<span>SMTP Port:</span>
<input name="smtp_port" value="<?=strip_tags($adv['mail']['port'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
SMTP port <br>
ie: 587
</span></div>
</label><br><br>

<label>
<span>SMTP Server:</span>
<input name="smtp_address" value="<?=strip_tags($adv['mail']['address'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
SMTP Server for email provider<br>
ie: smtp.gmail.com
</span></div>
</label><br><br>

<label>
<span>SMTP Username:</span>
<input name="email_username" value="<?=strip_tags($adv['mail']['username'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
SMTP Username<br>
Usually your email address; ie: batman@gmail.com
</span></div>
</label><br><br>

<label>
<span>SMTP Password:</span>
<input name="email_password" value="<?=strip_tags($adv['mail']['password'])?>" type="password" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
SMTP Password<br>
Usually your Email password
</span></div>
</label><br><br>
<button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal">Save Settings</button>
</p>
</div>

<!--==========================
  Web Settings
============================-->
<div id="web" class="tab-pane fade"></p>
<h3>Web Settings</h3>
<hr width="440px" align="left"><br>

<label>
<span>Web Title Image:</span>
<input name="title_image" value="<?=strip_tags($adv['web']['title_image'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
This is the main image across the curtain background.<br>
URL or local path.<br>
ie: https://imgur.com/image.png or img/myimage.png
</span></div>
</label><br><br>

<label>
<span>Web Logo:</span>
<input name="logo" value="<?=strip_tags($adv['web']['logo'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Small logo in the left of the banner as you scroll.<br>
URL or local path.<br>
ie: https://imgur.com/image.png or img/myimage.png
</span></div>
</label><br><br>

<label>
<span>Web Headline Title:</span>
<input name="headline_title" value="<?=strip_tags($adv['web']['headline_title'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Top subtitle under main title image.<br>
This comes before the scrolling headliners below.<br>
Required.
</span></div></label><font style="margin-left:25px;font-weight:normal;color:#990000;font-size:12px;">(Required)</font>
</p>

<label>
<span>Web Headliners:</span>
<input name="headliners" value="<?=strip_tags($adv['web']['headliners'])?>" type="text" size="30"/>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Words to rotate through after the Headline Title.<br>
Seperate words by a comma.<br>
ie: Screams,Thrills,Laughs<br>
Optional.
</span></div>
</label><br><br>

<label>
<span>Web Footer:</span>
<input name="web_footer" value="<?=strip_tags($adv['web']['footer'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Web footer tagline.<br>
Optional.
</span></div>
</label><br><br>

<label>
<span>Web Language:</span>
<select name="web_language">
  <option value="en" <?=strip_tags($adv['web']['language']) == 'en' ? ' selected="selected"' : '';?>>English</option>
  <option value="de" <?=strip_tags($adv['web']['language']) == 'de' ? ' selected="selected"' : '';?>>German</option>
  <option value="fr" <?=strip_tags($adv['web']['language']) == 'fr' ? ' selected="selected"' : '';?>>French</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Webpage language for title/headlines/footer, etc.
</span></div>
</label><br><br>
<button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal">Save Settings</button>
</p>
</div>

<!--==========================
  Plex Settings
============================-->
<div id="plex" class="tab-pane fade"></p>
<h3>Plex Settings</h3>
<hr width="440px" align="left"><br>

<label>
<span>Plex Server IP:</span>
<input name="server" value="<?=strip_tags($adv['plex']['server'])?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
ie: 192.168.1.20
</span></div>
</label><br><br>

<label>
<span>Plex Token:</span>
<input id="plex_token" name="plex_token" value="<?=strip_tags($adv['token']['api_key'])?>" type="text" size="30" />
<button type="button" class="mybutton" data-toggle="modal" data-target="#tokenModal" style="margin-bottom:2px;margin-left:6px;font-weight:normal;padding: 2px 8px;">Get Token</button>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Click the Button to retrieve your token.<br>
You can also manually enter one in the field.
</span></div>
<!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tokenModal">Get Token</button> -->
</label><br><br>

<label>
<span>Email Plex Users:</span>
<select name="plex_user_emails">
  <option value="yes" <?=strip_tags($adv['plex']['plex_user_emails']) == 'yes' ? ' selected="selected"' : '';?>>Yes</option>
  <option value="no" <?=strip_tags($adv['plex']['plex_user_emails']) == 'no' ? ' selected="selected"' : '';?>>No</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
'Yes' will send to all plex users emails.<br>
'No' will <i><b>NOT</b></i> send to plex user emails and will only send to emails and users in the recipients fields below.
</span></div>
</label><br><br>

<label>
<span>Libraries To Skip:</span>
<textarea name="libraries_to_skip" type="text"><?=strip_tags($libraries_to_skip_array)?></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
List of Plex libraries to <i><b>NOT</b></i> report on.<br>
Enter library names seperated by commas. <b>Case-Sensative!</b><br>
ie: TV Shows,Kids Movies
</span></div>
</label><br><br>
<input id="avatar" name="avatar" value="<?=strip_tags($adv['avatar']['url'])?>" type="hidden">
<button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal">Save Settings</button>
</p>
</div>

<!--==========================
  Report Settings
============================-->
<div id="report" class="tab-pane fade"></p>
<h3>Report Settings</h3>
<hr width="440px" align="left"><br>

<label>
<span>Test Cron Schedule:</span>
<select name="test">
  <option value="disable" <?=strip_tags($adv['report']['test']) == 'disable' ? ' selected="selected"' : '';?>>No</option>
  <option value="enable" <?=strip_tags($adv['report']['test']) == 'enable' ? ' selected="selected"' : '';?>>Yes</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
For testing cron schedule.<br>
See Tools section for On-demand test.<br>
Will use Email Report Time to send email only to yourself<br>
and create the webpage. For testing purposes.
</span></div>
</label><br><br>

<label>
<span>Extra Details:</span>
<select name="extra_details">
  <option value="yes" <?=strip_tags($adv['report']['extra_details']) == 'yes' ? ' selected="selected"' : '';?>>Yes</option>
  <option value="no" <?=strip_tags($adv['report']['extra_details']) == 'no' ? ' selected="selected"' : '';?>>No</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Adds extra info when available like Ratings, Cast, Release Date, etc.<br>
</span></div>
</label><br><br>

<label>
<span>Days To Report On:</span>
<select name="interval">
  <option value="7" <?=strip_tags($adv['report']['interval']) == '7' ? ' selected="selected"' : '';?>>Seven</option>
  <option value="6" <?=strip_tags($adv['report']['interval']) == '6' ? ' selected="selected"' : '';?>>Six</option>
  <option value="5" <?=strip_tags($adv['report']['interval']) == '5' ? ' selected="selected"' : '';?>>Five</option>
  <option value="4" <?=strip_tags($adv['report']['interval']) == '4' ? ' selected="selected"' : '';?>>Four</option>
  <option value="3" <?=strip_tags($adv['report']['interval']) == '3' ? ' selected="selected"' : '';?>>Three</option>
  <option value="2" <?=strip_tags($adv['report']['interval']) == '2' ? ' selected="selected"' : '';?>>Two</option>
  <option value="1" <?=strip_tags($adv['report']['interval']) == '1' ? ' selected="selected"' : '';?>>One</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Number of days to search back on for reporting.<br>
1 to 7 days.
</span></div>
</label><br><br>

<label>
<span>Report Type:</span>
<select name="report_type">
  <option value="both" <?=strip_tags($adv['report']['report_type']) == 'both' ? ' selected="selected"' : '';?>>Web & Email</option>
  <option value="webonly" <?=strip_tags($adv['report']['report_type']) == 'webonly' ? ' selected="selected"' : '';?>>Web Only</option>
  <option value="emailonly" <?=strip_tags($adv['report']['report_type']) == 'emailonly' ? ' selected="selected"' : '';?>>Email Only</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Which reports to generate.
</span></div>
</label><br><br>

<label>
<span>Email Report Time:</span>
<input name="email_report_time" value="<?=strip_tags($adv['report']['email_report_time'])?>" type="text" size="15" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right" style="text-align:left">
&nbsp;&nbsp; Time to send email report. In Cron format.<br>
&nbsp;&nbsp; ie: 30 10 * * 5 [Every Friday at 10:30am]<br>
&nbsp;&nbsp; See <a href="https://crontab.guru" style="text-decoration:none; color:#e5a00d;" target="_blank">crontab.guru</a> for help.<br><br>
&nbsp;&nbsp; <u>Quick Reference:</u><br>
&nbsp;&nbsp;&nbsp; .---------------- minute (0 - 59)<br>
&nbsp;&nbsp; | &nbsp;&nbsp; .------------- hour (0 - 23)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp; .---------- day of month (1 - 31)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp; .------- month (1 - 12)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp; .---- day of week (0 - 6) (SUN = 0 or 7)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( * = all day/time )<br>
&nbsp;&nbsp; * &nbsp;&nbsp;* &nbsp;&nbsp;* &nbsp;&nbsp;* &nbsp;&nbsp;*
</span></div>
</label><br><br>

<label>
<span>Web Report Time:</span>
<input name="web_report_time" value="<?=strip_tags($adv['report']['web_report_time'])?>" type="text" size="15" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right" style="text-align:left">
&nbsp;&nbsp; Time to create webpage report. In Cron format.<br>
&nbsp;&nbsp; ie: 30 23 * * * [Every day at 11:30pm]<br>
&nbsp;&nbsp; See <a href="https://crontab.guru" style="text-decoration:none; color:#e5a00d;" target="_blank">crontab.guru</a> for help.<br><br>
&nbsp;&nbsp; <u>Quick Reference:</u><br>
&nbsp;&nbsp;&nbsp; .---------------- minute (0 - 59)<br>
&nbsp;&nbsp; | &nbsp;&nbsp; .------------- hour (0 - 23)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp; .---------- day of month (1 - 31)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp; .------- month (1 - 12)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp; .---- day of week (0 - 6) (SUN = 0 or 7)<br>
&nbsp;&nbsp; | &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( * = all day/time )<br>
&nbsp;&nbsp; * &nbsp;&nbsp;* &nbsp;&nbsp;* &nbsp;&nbsp;* &nbsp;&nbsp;*
</span></div>
</label>
<input type="text" id="save_settings" class="hidden" name="save_settings" /><br><br>
<button type="button" class="mybutton" data-toggle="modal" data-target="#settingsModal">Save Settings</button>
</p>
</div>
</form>

<!--==========================
  Token Modal
============================-->

<form action="" id="get_token_form" method="post">
<div class="container">
  <div class="modal fade" id="tokenModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><b style="color:#990000">&times;</b></button>
          <h4 class="modal-title">Get Plex Token</h4>
        </div>
        <div class="modal-body">
          <p>This will retrieve a Plex token.<br>
		  This is used for authenticating to your Plex server.<br>
		  NowShowing does not store your Plex username or password.</p>
				<label>
				<span>Plex Username:</span>
				<input id="plex_username" name="plex_username" type="text" size="30" required />
				<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
				Username or Email Address for plex server account.
				</span></div>
				</label><br><br>
		  
				<label>
				<span>Plex Password:</span>
				<input id="plex_password" name="plex_password" type="password" size="30" required />
				<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
				Password for Plex server account.
				</span></div>
				</label><br><br>
        </div>
        <div class="modal-footer">
		    <button id="gettoken" name="gettoken" type="submit" class="mybutton" value="gettoken">Get Token</button>
            <!-- removed this from above button temporarily: data-dismiss="modal" -->			
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<!--==========================
  Settings Modal
============================-->

<div class="container">
  <div class="modal fade" id="settingsModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><b style="color:#990000">&times;</b></button>
          <h4 class="modal-title">Save Settings</h4>
        </div>
        <div class="modal-body">
          Are you sure?<br>
		  This will overwrite all settings.
        </div>
        <div class="modal-footer">
		    <button id="save_settings" name="save_settings" type="submit" class="mybutton" value="save_settings" form="mainform">Save</button>
			<button id="cancel_button" name="cancel_button" type="button" class="mybuttoncancel" value="cancel" data-dismiss="modal">Cancel</button>			
        </div>
      </div>
    </div>
  </div>
</div>

<!--==========================
  Test Report Modal
============================-->

<form action="" id="test_report_form" method="post">
<div class="container">
  <div class="modal fade" id="testReportModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><b style="color:#990000">&times;</b></button>
          <h4 class="modal-title">Run Test Report?</h4>
        </div>
			<div class="modal-body">
				<input type="checkbox" name="test_details" value="test_details" style="margin-left:25px"> Include Extra Details? 
				<div class="mytooltip" style="margin-left:6px;"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
				Adds extra info when available like Ratings, Cast, Release Date, etc.
				</span></div>
			</div>
        <div class="modal-footer">
		    <button id="test_report" name="test_report" type="submit" class="mybutton" value="test_report">Send</button>
			<button id="cancel_button" name="cancel_button" type="button" class="mybuttoncancel" value="cancel" data-dismiss="modal">Cancel</button>	
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<!--==========================
  On Demand Report Modal
============================-->

<form action="" id="ondemand_report_form" method="post">
<div class="container">
  <div class="modal fade" id="ondemandReportModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><b style="color:#990000">&times;</b></button>
          <h4 class="modal-title">Run On Demand Report?</h4>
        </div>
			<div class="modal-body">
				This will immediatly run a report using all current settings.<br>
				Sends an email and/or creates the webpage based off current <a href="#report" onclick="javascript:window.location.href='#report';window.location.reload(true);">Report settings</a>.<br>
				Useful for sending a report now or updating the webpage without waiting for the normal cron schedule.
			</div>
        <div class="modal-footer">
		    <button id="ondemand_report" name="ondemand_report" type="submit" class="mybutton" value="ondemand_report">Send</button>
			<button id="cancel_button" name="cancel_button" type="button" class="mybuttoncancel" value="cancel" data-dismiss="modal">Cancel</button>	
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<!--==========================
  Logout Modal
============================-->

<div class="container">
  <div class="modal fade" id="logoutModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><b style="color:#990000">&times;</b></button>
          <h4 class="modal-title">Are you sure you want to logout?</h4>
        </div>
        <div class="modal-footer">
		    <a class="mybutton" value="logout" href="../admin/index.php?logout=1">Yes</a></a>
			<button id="cancel_button" name="cancel_button" type="button" class="mybuttoncancel" value="cancel" data-dismiss="modal">No</button>	
        </div>
      </div>
    </div>
  </div>
</div>

<!--==========================
  Tools Tab
============================-->
<div id="tools" class="tab-pane fade"></p>
<h3>Tools</h3><br>
<hr width="440px" align="left" style="padding:0px;margin:0px;">
Note: Reports can take anywhere from 30s - 5m depending on amount of recent content.</p>

<!-- Test Report -->
<button id="test_report_button" class="mybutton" type="button" value="test_report" name="test_report_button" data-toggle="modal" data-target="#testReportModal">Test Report</button>
<p>- Send a test email to yourself & create the webpage.<br>
</p>

<!--  On-Demand Report -->
<button id="ondemand_report_button" class="mybutton" type="button" value="ondemand_report" name="ondemand_report_button" data-toggle="modal" data-target="#ondemandReportModal">On Demand Report</button>
<p>- Immediatly run a report using all current settings.<br>
</p>


<button class="mybutton" type="submit" value="submit3" name="submit3" style="margin-top:4px" onclick="return confirm('Are you sure? This will reset all settings to Defaul values')">Reset to Default</button><br>
- Reset all advanced settings to default.</p><br>

<h4>Help Links</h4>
<hr width="440px" align="left">
<a href="https://github.com/ninthwalker/NowShowing" target="_blank">Github</a><br>
- Lots of helpful information on the <a href="https://github.com/ninthwalker/NowShowing/wiki" target="_blank">Wiki</a> or open an <a href="https://github.com/ninthwalker/NowShowing/issues" target="_blank">issue</a> for help.</p>

<a href="https://lime-technology.com/forums/topic/56483-support-ninthwalker-nowshowing/" target="_blank">unRAID Forums</a><br>
- Get help in the support forums.</p>

<hr width="440px" align="left">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XH9PZLLBGVK2A">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit4" alt="Donate">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
- Like NowShowing and want to donate?</p>

    </div>
  </div>
</div>
    
  <!-- Required JavaScript Libraries -->
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/morphext/morphext.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/stickyjs/sticky.js"></script>
  <script src="../lib/easing/easing.js"></script>
  
  <!-- Template Specific Custom Javascript File -->
  <script src="../js/admin_custom.js"></script>

</body>
</html>
