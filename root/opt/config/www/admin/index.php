<?php include("../../php/password_protect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>NowShowing Advanced Settings</title>
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> 
  
  <link rel="stylesheet" href="../lib/admin/bootstrap.min.css">
  <script src="../lib/admin/jquery.min.js"></script>
  <script src="../lib/admin/bootstrap.min.js"></script>
  <!-- Bootstrap CSS File -->
  
  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  
  <?php include '../../php/loadadvanced.php';
		include '../../php/writeadvanced.php';
  ?>
<style>

body {
  color: #282a2d;
}

.mytooltip {
    position: absolute;
    display: inline-block;
    color: #006080;
}

.mytooltip .mytooltiptext {
    visibility: hidden;
    position: absolute;
    width: 400px;
    background-color: #555;
    color: #fff;
	font-weight:normal;
	font-size: 14px;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
    z-index: 1;
    opacity: 0;
    transition: opacity .6s;
}

.mytooltip-right {
    top: -5px;
    left: 30px;
}

.mytooltip-right::after {
    content: "";
    position: absolute;
    top: 50%;
    right: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent #555 transparent transparent;
}

.mytooltip:hover .mytooltiptext {
    visibility: visible;
    opacity: 1;
}

label {
    display:block;
    position:relative;
}

label span {
    font-weight:bold;
    position:absolute;
    left: 3px;
}

label input, label select {
    margin-left: 150px;
	font-weight:normal;
}

.fa {
	color: grey;
	font-size: 18px;
    position: absolute;
    display: inline-block;
	vertical-align: middle;
	margin-left: 3px;
}

h3 {
	margin-bottom: 0px;
}

.mybutton {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  overflow: hidden;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-property: color, background-color;
  transition-property: color, background-color;
  background-color: #3f4245;
  color: white;
  padding: 5px 20px;
  border: 1px solid black;
  font-weight:bold;
}
.mybutton:hover, .mybutton:focus, .mybutton:active {
  background-color: #e5a00d;
  color: #282a2d;
}

textarea {
	width: 266px;
	height: auto;
	margin-left: 150px;
	font-weight:normal;
}

</style>
</head>
<body>  
  
<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
    
<!--  link to logo -->
      <div id="logo" class="pull-left">
        <a href="../index.html"><img src="../img/nowshowing.png" alt="NowShowing"></a>
      </div>
        
      <nav id="nav-menu-container">
        <font color="#e5a00d" size="5">ADVANCED CONFIG SETTINGS</font>
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
    <li><a data-toggle="tab" href="#web">Web</a></li>
    <li><a data-toggle="tab" href="#plex">Plex</a></li>
	<li><a data-toggle="tab" href="#report">Report</a></li>
	<li><a data-toggle="tab" href="#tools">Tools</a></li>
    <li><button class="mybutton" type="submit" value="submit" name="submit" form="myform" style="margin-top:4px;margin-left:150px;" onclick="return confirm('Are you sure? This will overwrite all settings.')">Save Settings</button></li>
  </ul>

<form id="myform" action="" method="post">

<!--==========================
  Welcome Tab
============================-->
  
<div class="tab-content">
<div id="welcome" class="tab-pane fade in active"></p>
<h3>Welcome</h3></p>
<p>The NowShowing docker provides a summary of new media that has recently been added to Plex.<br>
NowShowing can generate an email for your users and a webpage for people to visit.<br>
You can use the following tabs to configure advanced settings.</p>
- Thanks for using NowShowing!
</p>
</div>
	
<!--==========================
  Email Settings
============================-->
<div id="email" class="tab-pane fade"></p>
<h3>Email Settings</h3>
<hr width="440px" align="left" style="border-color:black";><br>

<label>
<span>Email Title:</span>
<input name="title" value="<?=$adv['email']['title']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Banner title for the email body.
</span></div>
</label><br>

<label>
<span>Email Image:</span>
<input name="image" value="<?=$adv['email']['image']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
URL to image.<br>
ie: https://imgur.com/image.png
</span></div>
</label><br>

<label>
<span>Email Footer:</span>
<input name="footer" value="<?=$adv['email']['footer']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Email footer tagline.<br>
Optional.
</span></div>
</label><br>
 
<!--==========================
  Mail Settings
============================-->

<label>
<span>From:</span>
<input name="from" value="<?=$adv['mail']['from']?>" type="text" size="30" required />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Display name of the sender.<br>
Required.
</span></div><font style="margin-left:25px;font-weight:normal;color:red;font-size:12px;">(Required)</font>
</label><br>

<label>
<span>Subject:</span>
<input name="subject" value="<?=$adv['mail']['subject']?>" type="text" size="30" required />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Subject of the email.<br>
Date is automatically added to end of subject.<br>
Required.
</span></div><font style="margin-left:25px;font-weight:normal;color:red;font-size:12px;">(Required)</font>
</label><br>

<label>
<span>Recipients Email:</span>
<textarea name="recipients_email" value="<?=$recipients_email_array]?>" type="text"></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Enter additional emails to send to, besides your Plex friends.<br>
Enter emails seperated by commas.<br>
ie: bob@example.com,sally@example.com<br>
Optional, except when 'Email Plex Users' is set to 'No'. Then at least one email address is required here.
</span></div>
</label><br>

<label>
<span>Recipients:</span>
<textarea name="recipients" value="<?=$recipients_array?>" type="text"></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Plex usernames of any Plex friends to be notified.<br>
Used if the 'Email Plex Users' is set to 'No'.<br>
Seperate usernames with commas.<br>
ie: myFriend1,myFriend2<br>
Optional.
</span></div>
</label><br>

<label>
<span>Email Language:</span>
<select name="language">
  <option value="en" <?=$adv['email']['language'] == 'en' ? ' selected="selected"' : '';?>>English</option>
  <option value="de" <?=$adv['email']['language'] == 'de' ? ' selected="selected"' : '';?>>German</option>
  <option value="fr" <?=$adv['email']['language'] == 'fr' ? ' selected="selected"' : '';?>>French</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Email Language. Best-effort when grabbing metadata.<br>
If language selected is not found, falls back to english.
</span></div>
</label><br>
</div>

<!--==========================
  Web Settings
============================-->
<div id="web" class="tab-pane fade"></p>
<h3>Web Settings</h3>
<hr width="440px" align="left" style="border-color:black";><br>

<label>
<span>Web Title Image:</span>
<input name="title_image" value="<?=$adv['web']['title_image']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
This is the main image across the curtain background.<br>
URL or local path.<br>
ie: https://imgur.com/image.png or img/myimage.png
</span></div>
</label><br>

<label>
<span>Web Logo:</span>
<input name="logo" value="<?=$adv['web']['logo']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Small logo in the left of the banner as you scroll.<br>
URL or local path.<br>
ie: https://imgur.com/image.png or img/myimage.png
</span></div>
</label><br>

<label>
<span>Web Headline Title:</span>
<input name="headline_title" value="<?=$adv['web']['headline_title']?>" type="text" size="30" required />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Top subtitle under main title image.<br>
This comes before the scrolling headliners below.<br>
Required.
</span></div><font style="margin-left:25px;font-weight:normal;color:red;font-size:12px;">(Required)</font>
</label><br>

<label>
<span>Web Headliners:</span>
<input name="headliners" value="<?=$adv['web']['headliners']?>" type="text" size="30"/>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Words to rotate through after the Headline Title.<br>
Seperate words by a comma.<br>
ie: Screams,Thrills,Laughs<br>
Optional.
</span></div>
</label><br>

<label>
<span>Web Footer:</span>
<input name="web_footer" value="<?=$adv['web']['footer']?>" type="text" size="30" />
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Web footer tagline.<br>
Optional.
</span></div>
</label><br>

<label>
<span>Web Language:</span>
<select name="web_language">
  <option value="en" <?=$adv['web']['language'] == 'en' ? ' selected="selected"' : '';?>>English</option>
  <option value="de" <?=$adv['web']['language'] == 'de' ? ' selected="selected"' : '';?>>German</option>
  <option value="fr" <?=$adv['web']['language'] == 'fr' ? ' selected="selected"' : '';?>>French</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Webpage language for title/headlines/footer, etc.
</span></div>
</label>
</div>

<!--==========================
  Plex Settings
============================-->
<div id="plex" class="tab-pane fade"></p>
<h3>Plex Settings</h3>
<hr width="440px" align="left" style="border-color:black";><br>

<label>
<span>Email Plex Users:</span>
<select name="plex_user_emails">
  <option value="yes" <?=$adv['plex']['plex_user_emails'] == 'yes' ? ' selected="selected"' : '';?>>Yes</option>
  <option value="no" <?=$adv['plex']['plex_user_emails'] == 'no' ? ' selected="selected"' : '';?>>No</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
'Yes' will send to all plex users emails.<br>
'No' will <i><b>NOT</b></i> send to plex user emails and will only send to emails and users in the recipients fields below.
</span></div>
</label></p>

<label>
<span>Libraries To Skip:</span>
<textarea name="libraries_to_skip" value="<?=$libraries_to_skip_array?>" type="text"></textarea>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
List of Plex libraries to <i><b>NOT</b></i> report on.<br>
Enter library names seperated by commas. <b>Case-Sensative!</b><br>
ie: TV Shows,Kids Movies
</span></div>
</label>
</div>

<!--==========================
  Report Settings
============================-->
<div id="report" class="tab-pane fade"></p>
<h3>Report Settings</h3>
<hr width="440px" align="left" style="border-color:black";><br>

<label>
<span>Test Email:</span>
<select name="test">
  <option value="disable" <?=$adv['report']['test'] == 'disable' ? ' selected="selected"' : '';?>>No</option>
  <option value="enable" <?=$adv['report']['test'] == 'enable' ? ' selected="selected"' : '';?>>Yes</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Creates webpage and sends email only to self.<br>
For testing purposes.<br>
Uses 'Email Report Time'
</span></div>
</label><br>

<label>
<span>Extra Details:</span>
<select name="extra_details">
  <option value="yes" <?=$adv['report']['extra_details'] == 'yes' ? ' selected="selected"' : '';?>>Yes</option>
  <option value="no" <?=$adv['report']['extra_details'] == 'no' ? ' selected="selected"' : '';?>>No</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Adds extra info when available like Ratings, Cast, Release Date, etc.<br>
</span></div>
</label><br>

<label>
<span>Days To Report On:</span>
<select name="interval">
  <option value="7" <?=$adv['report']['interval'] == '7' ? ' selected="selected"' : '';?>>Seven</option>
  <option value="6" <?=$adv['report']['interval'] == '6' ? ' selected="selected"' : '';?>>Six</option>
  <option value="5" <?=$adv['report']['interval'] == '5' ? ' selected="selected"' : '';?>>Five</option>
  <option value="4" <?=$adv['report']['interval'] == '4' ? ' selected="selected"' : '';?>>Four</option>
  <option value="3" <?=$adv['report']['interval'] == '3' ? ' selected="selected"' : '';?>>Three</option>
  <option value="2" <?=$adv['report']['interval'] == '2' ? ' selected="selected"' : '';?>>Two</option>
  <option value="1" <?=$adv['report']['interval'] == '1' ? ' selected="selected"' : '';?>>One</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Number of days to search back on for reporting.<br>
1 to 7 days.
</span></div>
</label><br>

<label>
<span>Report Type:</span>
<select name="report_type">
  <option value="both" <?=$adv['report']['report_type'] == 'both' ? ' selected="selected"' : '';?>>Web & Email</option>
  <option value="webonly" <?=$adv['report']['report_type'] == 'webonly' ? ' selected="selected"' : '';?>>Web Only</option>
  <option value="emailonly" <?=$adv['report']['report_type'] == 'emailonly' ? ' selected="selected"' : '';?>>Email Only</option>
</select>
<div class="mytooltip"><i class="fa fa-info-circle"></i><span class="mytooltiptext mytooltip-right">
Which reports to generate.
</span></div>
</label><br>

<label>
<span>Email Report Time:</span>
<input name="email_report_time" value="<?=$adv['report']['email_report_time']?>" type="text" size="15" />
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
</label><br>

<label>
<span>Web Report Time:</span>
<input name="web_report_time" value="<?=$adv['report']['web_report_time']?>" type="text" size="15" />
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
</label></p><br>
</div>
</form>
<!--==========================
  Tools Tab
============================-->
<div id="tools" class="tab-pane fade"></p>
<h3>Tools</h3>
<hr width="440px" align="left" style="border-color:black";>
<button class="mybutton" type="submit2" value="submit2" name="submit2" style="margin-top:4px" onclick="return confirm('Send test report?')">Test Report</button><br>
- Send a test email to yourself & create webpage.</p>

<button class="mybutton" type="submit3" value="submit3" name="submit3" style="margin-top:4px" onclick="return confirm('Are you sure? This will reset all settings to Defaul values')">Reset to Default</button><br>
- Reset all advanced settings to default.</p><br>

<h4>Help Links</h4>
<hr width="440px" align="left" style="border-color:black";>
<a href="https://github.com/ninthwalker/NowShowing" target="_blank">Github</a><br>
- Lots of helpful information on the <a href="https://github.com/ninthwalker/NowShowing/wiki" target="_blank">Wiki</a> or open an <a href="https://github.com/ninthwalker/NowShowing/issues" target="_blank">issue</a> for help.</p>

<a href="https://lime-technology.com/forums/topic/56483-support-ninthwalker-nowshowing/" target="_blank">unRAID Forums</a><br>
- Get help in the support forums.</p>

<hr width="440px" align="left" style="border-color:black";>

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
  
  <!-- Template Specisifc Custom Javascript File -->
  <script src="../js/custom.js"></script>

</body>
</html>
